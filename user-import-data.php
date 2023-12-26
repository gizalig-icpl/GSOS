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

                

                <!-- Alert Message -->

                <?php
                $target_dir = "./user_import/";
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
                <!-- start page title -->
                <div class="main-title card p-2">
                    <div class="d-flex align-items-center">
                        <h2 class="text-success"><?php echo _User."-"._Import; ?></h2>
                        <div class="ms-auto">
                            <form action="./user-import-db.php" method="POST">
                                <input hidden type="text" name="fileName" value="<?php echo filter($target_file); ?>">
                                <button type="submit" class="submit-btn btn btn-sm bg-primary text-light" name="send" value=" Submit" onclick="displayLoader()">Upload</button>
                                <button type="button" class="submit-btn btn btn-sm bg-primary text-light"><a style="color:#fff" href="./import-user.php"><?php echo BTN_BACK; ?></a></button>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="table align-middle" id="war-game-sim-list" aria-label="Semantic Elements">
                       <thead class="table-secondary">
                    <tr>
                        <th scope="col">First_name</th>
                        <th scope="col">Last_name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Desig</th>
                        <th scope="col">Department</th>
                        <th scope="col">Location</th>
                        <th scope="col">Emp_id</th>
                        <!-- <th scope="col">Month</th>
                        <th scope="col">Year</th>
                        <th scope="col">Representation</th> -->
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
                            $tmpArr['first_name'] = $data[$i]['B'];
                            $tmpArr['last_name'] = $data[$i]['C'];
                            $tmpArr['email'] = $data[$i]['D'];
                            $tmpArr['desig'] = $data[$i]['E'];
                            $tmpArr['department'] = $data[$i]['F'];
                            $tmpArr['location'] = $data[$i]['H'];
                            $tmpArr['emp_id'] = $data[$i]['G'];
                            // $tmpArr['Month'] = $data[$i]['H'];
                            // $tmpArr['Year'] = $data[$i]['I'];
                            // $tmpArr['Representation'] = $data[$i]['J'];
                            array_push($final_arr, $tmpArr);
                        }
                    }
                   
                    for ($i = 0; $i < count($final_arr); $i++) {
                        echo "<tr>";
                        echo "<td scope='row'>" . $final_arr[$i]['first_name'] . "</td>";
                        echo "<td>" . $final_arr[$i]['last_name'] . "</td>";
                        echo "<td>" . $final_arr[$i]['email'] . "</td>";
                        echo "<td>" . $final_arr[$i]['desig'] . "</td>";
                        echo "<td>" . $final_arr[$i]['department'] . "</td>";
                        echo "<td>" . $final_arr[$i]['location'] . "</td>";
                        echo "<td>" . $final_arr[$i]['emp_id'] . "</td>";
                        // echo "<td>" . $final_arr[$i]['Month'] . "</td>";
                        // echo "<td>" . $final_arr[$i]['Year'] . "</td>";
                        // echo "<td>" . $final_arr[$i]['Representation'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
                <br>



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



