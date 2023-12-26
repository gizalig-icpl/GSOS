<?php

require_once("include/header.php");
include_once('./include/session.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
?>

<?php
// $target_dir = "./kpi_import/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
// echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
// } else {
// if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//     echo "<p class='alert alert-success'>The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.</p>";
// } else {
//     echo "Sorry, there was an error uploading your file.";
// }
// }
?>
<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
    
                <div class="main-title card p-2">
                    <h2 class="text-success">KPI - Import</h2>
                </div>

                <?php
                $target_dir = "./kpi_import/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    $response = fileUpload($_FILES["fileToUpload"], $target_dir,"doc"); 
                    if ($response->msg==="success") {
                         $target_file = $target_dir . $response->filename;
                         echo "<div class='alert alert-success alert-dismissible'>
                         <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                         The file <strong>". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "</strong> has been uploaded.
                        </div>";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                ?>

                <table class="table align-middle" id="war-game-sim-list" aria-label="Semantic Elements">
                       <thead class="table-secondary">
                    <tr>
                        <th scope="col">KPI_Id</th>
                        <th scope="col">Objective</th>
                        <th scope="col">Sub Objective</th>
                        <th scope="col">KPI</th>
                        <th scope="col">Activity</th>
                        <th scope="col">Remarks</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                        <th scope="col">Representation</th>
                    </tr>
                       </thead>
                    <?php
                    $spreadsheet = new Spreadsheet();

                    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($target_file);

                    $sheet = $spreadsheet->getSheet(0);

                    // Store data from the activeSheet to the varibale in the form of Array
                    $data = array(1, $sheet->toArray(null, true, true, true));

                    $data = $data[1];

                    $final_arr = [];
                    $end_row  = $sheet->getHighestRow();
                    $secondary_arr = [];

                    for ($i = 1; $i <= $end_row; $i++) {
                        if (is_numeric($data[$i]['A'])) {

                            $tmpArr = [];
                            $tmpArr['KPI_id'] = $data[$i]['B'];
                            $tmpArr['Objective'] = $data[$i]['C'];
                            $tmpArr['Sub_Objective'] = $data[$i]['D'];
                            $tmpArr['KPI'] = $data[$i]['E'];
                            $tmpArr['Activity'] = $data[$i]['F'];
                            $tmpArr['Remarks'] = $data[$i]['G'];
                            $tmpArr['Month'] = $data[$i]['H'];
                            $tmpArr['Year'] = $data[$i]['I'];
                            $tmpArr['Representation'] = $data[$i]['J'];
                            array_push($final_arr, $tmpArr);
                        }
                    }

                    for ($i = 0; $i < count($final_arr); $i++) {
                        echo "<tr>";
                        echo "<td scope='row'>" . $final_arr[$i]['KPI_id'] . "</td>";
                        echo "<td>" . $final_arr[$i]['Objective'] . "</td>";
                        echo "<td>" . $final_arr[$i]['Sub_Objective'] . "</td>";
                        echo "<td>" . $final_arr[$i]['KPI'] . "</td>";
                        echo "<td>" . $final_arr[$i]['Activity'] . "</td>";
                        echo "<td>" . $final_arr[$i]['Remarks'] . "</td>";
                        echo "<td>" . $final_arr[$i]['Month'] . "</td>";
                        echo "<td>" . $final_arr[$i]['Year'] . "</td>";
                        echo "<td>" . $final_arr[$i]['Representation'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
                <br>
                <div style="text-align:right" class="mr-5">
                    <form action="./domain/index.php?page=kpi-import-db" method="POST">
                        <input hidden type="text" name="fileName" value="<?php echo $target_file ?>">
                        <button type="submit" class="submit-btn btn btn-sm bg-primary text-light" name="send" value=" Submit">Upload</button>
                        <button type="button" class="submit-btn btn btn-sm bg-primary text-light"><a style="color:#fff" href="./index.php?page=kpi-dashboard-import"><?php echo BTN_BACK; ?></a></button>
                    </form>
                </div>



            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->



        <?php
        //  include("include/copyright-footer.php"); 
        ?>


    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->
</div>
<!-- Right Sidebar -->


<?php
// include "include/footer.php"; 
?>
