<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Health Check</title>
        <style>
            .alert{
                padding: 15px;
                margin-bottom: 20px;
                border: 1px solid transparent;
                border-radius: 4px;
            }
            .alert-danger {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
            }
            .alert-success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
            }
.server_info{font-size: 10px;}
.server_info .p {text-align: left;}
.server_info .e {background-color: #ccccff; font-weight: bold; border-bottom: 1px solid Gray;}
.server_info .h {background-color: #9999cc; font-weight: bold; border-bottom: 1px solid Gray;}
.server_info .v {background-color: #cccccc; border-bottom: 1px solid Gray;}
.server_info i {color: #666666;}
.server_info hr {display: none;}
.server_info h1 {font-size: 18px;}
.server_info h2 {font-size: 16px;}

        </style>
    </head>
    <body>
    <h2 style="margin:auto;text-align:center">Compliance Health Check</h2>

<?php

    $conn = new mysqli('localhost', 'root', '');
    $dbname = 'gsos_db';
    $moveForward = 1;
    $kpiImportFolder = "kpi_import";
    $quizImportFolder = "quiz_import";


    if (empty (mysqli_fetch_array(mysqli_query($conn,"SHOW DATABASES LIKE '$dbname'")))) 
    {
        echo "<p class='alert alert-danger'>".$dbname." database does not exist</p>"; 
        $moveForward = 0;
    }
    else{
        echo "<p class='alert alert-success'>".$dbname." database exist</p>";
    }
    if(!is_dir($kpiImportFolder)){
        echo "<p class='alert alert-danger'>".$kpiImportFolder . ' folder Does Not exist!!!</p>';
        $moveForward = 0;
    }
    else{
        if ( ! is_writable($kpiImportFolder)) {
            echo "<p class='alert alert-danger'>".$kpiImportFolder. ' folder must writable!!!</p>';
            $moveForward = 0;
        } else {
            echo "<p class='alert alert-success'>".$kpiImportFolder . ' folder exist and writable</p>';
        }
    }

    if(!is_dir($quizImportFolder)){
        echo "<p class='alert alert-danger'>".$quizImportFolder . ' folder Does Not exist!!!</p>';
        $moveForward = 0;
    }
    else{
        if ( ! is_writable($quizImportFolder)) {
            echo "<p class='alert alert-danger'>".$quizImportFolder. ' folder must writable!!!</p>';
            $moveForward = 0;
        } else {
            echo "<p class='alert alert-success'>".$quizImportFolder . ' folder exist and writable</p>';
        }
    }
    ob_start();
    phpinfo();
    $phpinfo = ob_get_contents();
    ob_end_clean();
  
    $phpinfo = str_replace('border: 1px', '', $phpinfo);
    preg_match('/<body>(.*)<\/body>/is', $phpinfo, $regs);
    echo '<div class="server_info">' . $regs[1] . '<div>';
?>

</body>
</html>