<?php
$path = "quiz_certificate/";
$files = scandir($path);
$newArr = array_slice($files, 2);
$certificate_files=json_encode($newArr);

    if(!empty($certificate_files)){
      $arr = json_decode($certificate_files);
      
        $zipname = 'quiz_certificate.zip';
        $zip = new ZipArchive;
        $zip->open($zipname,(ZipArchive::CREATE | ZipArchive::OVERWRITE));
    
        foreach ($arr as $file) {
          $zip->addFile('quiz_certificate/'.$file);
        }
        $zip->close();

        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename='.$zipname);
        header('Content-Length: ' . filesize($zipname));
        readfile($zipname);
    }

?>