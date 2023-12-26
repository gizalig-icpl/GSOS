<?php

    
require_once('include/config.php');
require_once(APPLICATION_PATH."/vendor/autoload.php");
require_once(APPLICATION_PATH."/include/connection.php");
require_once(APPLICATION_PATH.'/include/functions.php');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

excelreport();
function excelreport($save='dynamic'){
global $dbh;
$deleted = 0;
$is_test = 1;
$status = 1;
    $sql = "SELECT * FROM category_master WHERE deleted=:deleted ORDER BY category_id desc";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":deleted" => $deleted
    ));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $passexcel=array();
    $failexcel=array();
    for($i=0; $i<count($result); $i++){
        $pass=0;
        $fail=0;
        $passuser=array();
        $category_id= $result[$i]['category_id'];
        $question_sql = "SELECT count(category_id) from question_master WHERE category_id = :id";
        $stmt = $dbh->prepare($question_sql);
        $stmt->execute(array(
            ":id" => $category_id
        ));
        $question_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total_question=$question_result[0]['count(category_id)'];

        $min_score_sql = "SELECT min_score, category_title FROM category_master WHERE category_id = :id";
        $stmt = $dbh->prepare($min_score_sql);
        $stmt->execute(array(
            ":id" => $category_id
        ));
        $min_score_result = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql = "SELECT qm.* FROM quiz_master as qm,users as u WHERE qm.category_id = :category_id and u.is_test=:is_test and u.status=:status and qm.author_id=u.id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":category_id" => $category_id,
            ":is_test" => $is_test,
            ":status" => $status
        ));
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $passdup=array();
        for($j=0; $j<count($result1); $j++){
            if(!in_array($result1[$j]['user_email'],$passdup))
            {
                $arr=json_decode($result1[$j]['question'], true);
                $arr1=json_decode($result1[$j]['answer'], true);
                $correct_ans=0;
                for ($k = 0; $k < count($arr); $k++) {
                    $correct_sql = "SELECT correct_ans from question_master WHERE question_id = :id";
                    $stmt = $dbh->prepare($correct_sql);
                    $stmt->execute(array(
                        ":id" => $arr[$k]["question_id"]
                    ));

                    $correct_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $option="option".$correct_result[0]["correct_ans"];
                    $question="question".$k;
                    if($arr[$k][$option]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                    {
                        $correct_ans+=1;
                    }
                }
                $per=($correct_ans*100)/count($arr);
                if($per>=$min_score_result['min_score']){ $pass+=1; array_push($passuser,$result1[$j]['user_email']);array_push($passdup,$result1[$j]['user_email']);array_push($passexcel,$result1[$j]['user_email']);}
            }
        }
        $pu=implode("','",$passuser);
        $sql = "SELECT qm.* FROM quiz_master as qm,users as u WHERE not qm.user_email in ('$pu') and qm.category_id = :category_id and u.is_test=:is_test and u.status=:status and qm.author_id=u.id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":category_id" => $category_id,
            ":is_test" => $is_test,
            ":status" => $status
        ));
        $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $faildup=array();
        for($j=0; $j<count($result1); $j++){
            if(!in_array($result1[$j]['user_email'],$faildup))
            {
                $arr=json_decode($result1[$j]['question'], true);
                $arr1=json_decode($result1[$j]['answer'], true);
                $correct_ans=0;
                for ($k = 0; $k < count($arr); $k++) {
                    $correct_sql = "SELECT correct_ans from question_master WHERE question_id = :id";
                    $stmt = $dbh->prepare($correct_sql);
                    $stmt->execute(array(
                        ":id" => $arr[$k]["question_id"]
                    ));

                    $correct_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $option="option".$correct_result[0]["correct_ans"];
                    $question="question".$k;
                    if($arr[$k][$option]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                    {
                        $correct_ans+=1;
                    }
                }
                $per=($correct_ans*100)/count($arr);
                if($per<$min_score_result['min_score']){$fail+=1;array_push($faildup,$result1[$j]['user_email']);array_push($failexcel,$result1[$j]['user_email']);}
            }
        }
        $total=$pass+$fail;
        
    }

    $role=0;
    $sql1 = "SELECT email FROM `users` WHERE role=:role and last_login is null and is_test=:is_test;";
    $stmt1 = $dbh->prepare($sql1);
    $stmt1->execute(array(
        ":role"=>$role,
        ":is_test"=>$is_test
    ));
    $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    $user=array();
    for($i=0;$i<count($result1);$i++)
    {
        array_push($user,$result1[$i]['email']);
    }
    $starttraining=array();
    $starteduser=array();
    $starttraining=array_merge($passexcel,$failexcel,$user);

    $st=implode("','",$starttraining);
    $sql = "SELECT email FROM users WHERE not email in ('$st') and role = :role and is_test=:is_test and status=:status";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":role"=>$role,
        ":is_test"=>$is_test,
        ":status"=>$status
    ));
    $result1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for($i=0;$i<count($result1);$i++)
    {
        array_push($starteduser,$result1[$i]['email']);
    }

    $spreadsheet = new Spreadsheet();
        $Excel_writer = new Xlsx($spreadsheet);
        
        $spreadsheet->setActiveSheetIndex(0);
        $activeSheet = $spreadsheet->getActiveSheet()->setTitle('Passed');
        
        $activeSheet->setCellValue('A1', 'No');
        $activeSheet->setCellValue('B1', 'Email');
        
        if(!empty($passexcel))
        {
            for ($j = 0; $j < count($passexcel); $j++) {

                $activeSheet->setCellValue('A'.($j+2) ,($j + 1));
                $activeSheet->setCellValue('B'.($j+2) , $passexcel[$j]);
            }
        }
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(1);
        $activeSheet = $spreadsheet->getActiveSheet()->setTitle('Failed');
        
        $activeSheet->setCellValue('A1', 'No');
        $activeSheet->setCellValue('B1', 'Email');
        
        if(!empty($failexcel))
        {
            for ($j = 0; $j < count($failexcel); $j++) {

                $activeSheet->setCellValue('A'.($j+2) ,($j + 1));
                $activeSheet->setCellValue('B'.($j+2) , $failexcel[$j]);
            }
        }
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(2);
        $activeSheet = $spreadsheet->getActiveSheet()->setTitle('Not Started training');
        
        $activeSheet->setCellValue('A1', 'No');
        $activeSheet->setCellValue('B1', 'Email');
        if(!empty($user))
        {
            for ($j = 0; $j < count($user); $j++) {

                $activeSheet->setCellValue('A'.($j+2) ,($j + 1));
                $activeSheet->setCellValue('B'.($j+2) , $user[$j]);
            }
        }
        $spreadsheet->createSheet();
        $spreadsheet->setActiveSheetIndex(3);
        $activeSheet = $spreadsheet->getActiveSheet()->setTitle('Started training');
        
        $activeSheet->setCellValue('A1', 'No');
        $activeSheet->setCellValue('B1', 'Email');

            if(!empty($starteduser))
            {
                for ($j = 0; $j < count($starteduser); $j++) {

                    $activeSheet->setCellValue('A'.($j+2) ,($j + 1));
                    $activeSheet->setCellValue('B'.($j+2) , $starteduser[$j]);
                }
            }
        
            
        
        $filename = "Report".date('Y-m-d').'.xlsx';;
        if($save=='dynamic'){
            $save='php://output';
        }elseif($save=='root'){
            $save=$filename;
        }else{
            $save='php://output';
        }
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='. $filename);
        header('Cache-Control: max-age=0');
        $Excel_writer->save($save);
        return $filename;
}
?>