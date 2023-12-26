<?php

require_once("include/header.php");
include_once('./include/session.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
?>

<?php
// $target_dir = "./quiz_import/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
//     // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "<p class='alert alert-success'>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.</p>";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }
?>
<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <?php
                $target_dir = "./quiz_import/";
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
                        echo "<script>window.history.back()</script>";
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                ?>

                <!-- start page title -->
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"><?php echo TITLE_DASHBOARD; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="kpi-dashboard.php">GSOS</a>
                                </li>
                                <li class="breadcrumb-item"><a href="kpi-dasboard-import.php">Import</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data</li>

                            </ol>
                        </nav>
                    </div>
                    <!-- <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Settings</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!--end new bread crumb-->
                <!-- <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">GSOS</a></li>
                                        <li class="breadcrumb-item"><a href="kpi-dasboard-import.php">Import</a></li>
                                        <li class="breadcrumb-item active">Data</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                        </div>
                    </div> -->
                <div class="main-title card p-2">
                    <h2 class="text-success"><?php echo _Quiz."-"._Import; ?></h2>
                </div>
                <div class="table-responsive mt-3">
                    <table class="table align-middle" id="war-game-sim-list" aria-label="Semantic Elements">
                        <thead class="table-secondary">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Question</th>
                                <th scope="col">Category</th>
                                <th scope="col">Option1</th>
                                <th scope="col">Option2</th>
                                <th scope="col">Option3</th>
                                <th scope="col">Option4</th>
                                <th scope="col">Correct Ans</th>
                            </tr>
                            <?php
                            $spreadsheet = new Spreadsheet();

                            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($target_file);

                            $names = $spreadsheet->getSheetNames();
                            $k = 1;
                            for ($l = 0; $l < count($names); $l++) {

                                $sheet = $spreadsheet->getSheetByName($names[$l]);

                                // Store data from the activeSheet to the varibale in the form of Array
                                $data = array(1, $sheet->toArray(null, true, true, true));

                                $data = $data[1];

                                $final_arr = [];
                                $end_row  = $sheet->getHighestRow();
                                $secondary_arr = [];

                                for ($i = 1; $i <= $end_row; $i++) {
                                    if (is_numeric($data[$i]['A'])) {

                                        $tmpArr = [];

                                        $tmpArr['Question'] = $data[$i]['B'];
                                        $tmpArr['Category'] = $data[$i]['C'];
                                        $tmpArr['Option1'] = (gettype($data[$i]['D']) == "boolean" ? json_encode($data[$i]['D']) : $data[$i]['D']);
                                        $tmpArr['Option2'] = (gettype($data[$i]['E']) == "boolean" ? json_encode($data[$i]['E']) : $data[$i]['E']);
                                        $tmpArr['Option3'] = (gettype($data[$i]['F']) == "boolean" ? json_encode($data[$i]['F']) : $data[$i]['F']);
                                        $tmpArr['Option4'] = (gettype($data[$i]['G']) == "boolean" ? json_encode($data[$i]['G']) : $data[$i]['G']);
                                        $tmpArr['Correct_Ans'] = $data[$i]['H'];
                                        array_push($final_arr, $tmpArr);
                                    }
                                }

                                for ($i = 0; $i < count($final_arr); $i++) {
                                    echo "<tr>";
                                    echo "<td scope='row'>" . ($k++) . "</td>";
                                    echo "<td>" . $final_arr[$i]['Question'] . "</td>";
                                    echo "<td>" . $final_arr[$i]['Category'] . "</td>";
                                    echo "<td>" . $final_arr[$i]['Option1'] . "</td>";
                                    echo "<td>" . $final_arr[$i]['Option2'] . "</td>";
                                    echo "<td>" . $final_arr[$i]['Option3'] . "</td>";
                                    echo "<td>" . $final_arr[$i]['Option4'] . "</td>";
                                    echo "<td>" . $final_arr[$i]['Correct_Ans'] . "</td>";
                                    echo "</tr>";
                                }
                            }


                            ?>
                    </table>
                </div>
                <br>
                <div style="text-align:right" class="mr-5">
                    <form action="./domain/index.php?page=quiz-import-db" method="POST">
                        <input hidden type="text" name="fileName" value="<?php echo filter($target_file); ?>">
                        <button data-test-id="upload" type="submit" class="submit-btn btn btn-sm bg-primary" style="color:#fff" name="send" value=" Submit">Upload</button>
                        <button type="button" class="submit-btn btn btn-sm bg-primary"><a style="color:#fff" href="./index.php?page=quiz-import"><?php echo BTN_BACK; ?></a></button>
                    </form>
                </div>



            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->




        <!-- Footer Start -->
        <?php
        //  include("include/copyright-footer.php");
        ?>
        <!-- end Footer -->

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
