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
        $activeSheet = $spreadsheet->getActiveSheet()->setTitle('Sheet1');
        
        if($_POST['data']){
        
            $arr = json_decode($_POST['data']);
            $activeSheet->setCellValue('A1', 'No.');
            $activeSheet->setCellValue('B1', 'KPI id.');
            $activeSheet->setCellValue('C1', 'Objective');
            $activeSheet->setCellValue('D1', 'Sub Objective');
            $activeSheet->setCellValue('E1', 'KPI');
            $activeSheet->setCellValue('F1', 'Activity');
            $activeSheet->setCellValue('G1', 'Remarks');
            $activeSheet->setCellValue('H1', 'Month');
            $activeSheet->setCellValue('I1', 'Year');
            $activeSheet->setCellValue('J1', 'Representation');
            
           
            if (count($arr)>0) {
                for($i=0;$i<count($arr);$i++){
                    $final_result = (array) $arr[$i];
                    
                    $activeSheet->setCellValue('A'.($i+2), ($i+1));
                    $activeSheet->setCellValue('B'.($i+2), $final_result['kpi_id']);
                    $activeSheet->setCellValue('C'.($i+2), $final_result['objective']);
                    $activeSheet->setCellValue('D'.($i+2), $final_result['sub_objective']);
                    $activeSheet->setCellValue('E'.($i+2), $final_result['kpi']);
                    $activeSheet->setCellValue('F'.($i+2), $final_result['activity']);
                    $activeSheet->setCellValue('G'.($i+2), $final_result['remarks']);
                    $activeSheet->setCellValue('H'.($i+2), $final_result['month']);
                    $activeSheet->setCellValue('I'.($i+2), $final_result['year']);
                    $activeSheet->setCellValue('J'.($i+2), $final_result['representation']);
                    
                }
            }
        }
        // $writer = new Xlsx($spreadsheet);
        // $name = './kpi_export/kpi'.time();
        // $writer->save($name.'.xlsx');
        // header('Location: '.$name.'.xlsx');

        $filename = "kpi".date('Y-m-d').'.xlsx';;
        
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename='. $filename);
        header('Cache-Control: max-age=0');
        $Excel_writer->save('php://output');

?>