<?php
require_once('include/config.php');
require_once(APPLICATION_PATH."/vendor/autoload.php");
require_once(APPLICATION_PATH."/include/connection.php");
require_once(APPLICATION_PATH.'/include/functions.php');
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$spreadsheet = new Spreadsheet();
$Excel_writer = new Xlsx($spreadsheet);
 
$spreadsheet->setActiveSheetIndex(0);
$activeSheet = $spreadsheet->getActiveSheet();
 
$activeSheet->setCellValue('A1', 'No');
$activeSheet->setCellValue('B1', 'Name');
$activeSheet->setCellValue('C1', 'Email');
$activeSheet->setCellValue('D1', 'Date');
$activeSheet->setCellValue('E1', 'Category');
$activeSheet->setCellValue('F1', 'ATTEMPTED QUESTION');
$activeSheet->setCellValue('G1', 'CORRECT ANSWER');
$activeSheet->setCellValue('H1', 'Status');
 
$sql = "SELECT * FROM quiz_master ORDER BY id desc";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    for ($i = 0; $i < count($result); $i++) {
        $category_id= $result[$i]['category_id'];
        $question_sql = "SELECT count(category_id) from question_master WHERE category_id = :id";
        $stmt = $dbh->prepare($question_sql);
        $stmt->execute(array(
            ":id" => $category_id
        ));

        $question_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total_question=$question_result[0]['count(category_id)'];

        $arr=json_decode($result[$i]['question'], true);
        $arr1=json_decode($result[$i]['answer'], true);
        $correct_ans=0;
        for ($j = 0; $j < count($arr); $j++) {
            $correct_sql = "SELECT correct_ans from question_master WHERE question_id = :id";
            $stmt = $dbh->prepare($correct_sql);
            $stmt->execute(array(
                ":id" => $arr[$j]["question_id"]
            ));

            $correct_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $option="option".$correct_result[0]["correct_ans"];
            $question="question".$j;
            if($arr[$j][$option]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
            {
                $correct_ans+=1;
            }
        }

        $stmt = $dbh->query("SELECT * FROM category_master WHERE category_id = $category_id");
        $result1 = $stmt->fetch(PDO::FETCH_ASSOC);
        $per=($correct_ans*100)/$total_question;
        if($per>=$result1['min_score']){ $status="Pass";}else{$status="Fail";}

        $activeSheet->setCellValue('A'.($i+2) ,($i + 1));
        $activeSheet->setCellValue('B'.($i+2) , $result[$i]['user_fname'] .' '. $result[$i]['user_lname']);
        $activeSheet->setCellValue('C'.($i+2) , $result[$i]['user_email']);
        $activeSheet->setCellValue('D'.($i+2) , $result[$i]['quiz_time']);
        $activeSheet->setCellValue('E'.($i+2) , $result1['category_title']);
        $activeSheet->setCellValue('F'.($i+2) , $result[$i]['total_question']);
        $activeSheet->setCellValue('G'.($i+2) , $correct_ans);
        $activeSheet->setCellValue('H'.($i+2) , $status);
    }
 
$filename = 'quiz_report'.date('Y-m-d').'.xlsx';;
 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='. $filename);
header('Cache-Control: max-age=0');
$Excel_writer->save('php://output');
?>