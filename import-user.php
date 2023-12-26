<?php

require_once("include/header.php");
include_once('./include/session.php');
?>

<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"><em class="bi bi-speedometer2"></em><?php echo " "; echo _User; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bx bx-home-alt"></i>
                                </li> -->
                                <li class="breadcrumb-item active" aria-current="page"><?php echo _Import; ?></li>

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
                                        <li class="breadcrumb-item active"><?php echo _Import; ?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo _Dashboard; ?></h4>
                            </div>
                        </div>
                    </div> -->
                <div class="main-title card p-2">
                        <h2 class="text-success"><?php echo _User;
                                                    echo "-";
                                                    echo _Import; ?></h2>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="border p-3 rounded">

                            <div>
                                <?php
                                if (isset($_SESSION['kpi-status']) && !empty($_SESSION['kpi-status'])) {
                                    if ($_SESSION['kpi-status'] == "success") {
                                        echo "<p class='alert alert-success'>Successfully Uploaded the Data</p>";
                                    } else {
                                        echo "<p class='alert alert-danger'>Successfully Uploaded the Data</p>";
                                    }
                                    $_SESSION['kpi-status'] = "";
                                }
                                ?>
                            </div>

                            <!-- <div  class="bg-success text-dark h-100 text-center"style="font-size: 24px;"><?php echo _Excel; ?> <?php echo _Import; ?></div> -->
                            <h4><?php echo _Your_Customized_Dashboard; ?></h4>
                            <hr>
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0"><?php echo _Excel; ?> <?php echo _Import; ?></h5>
                            </div>
                            <div class="kpi-form">
                                <div class="row">
                                    <form action="user-import-data.php" method="POST" enctype="multipart/form-data">
                                        <ul class="mt-2">
                                            <li>
                                                <?php echo _Please_upload_the_excel_file_in_the_given_format_only; ?> <a href="./user_import/user.xlsx">(user.xlsx)</a>
                                            </li>
                                            <li>
                                                <?php echo _Dont_Alter_the_order_of_the_column_in_excel_file; ?>
                                            </li>
                                            <li>
                                                <?php echo _The_first_sheet_of_the_excel_file_will_be_taken_into_consideration; ?>
                                            </li>
                                            <li>
                                                <?php echo _After_uploading_the_Intermediate_stage_will_be_opened_through_which_you_can_procced_to_upload_to_Database; ?>
                                            </li>
                                        </ul>
                                        <label class="form-label file-upload"><?php echo _Add_File;
                                                                                echo ":"; ?></label>
                                        <input class="form-control form-control-sm" type="file" name="fileToUpload" id="fileToUpload" required>
                                        </label>
                                        <!-- <button type="submit" class="submit-btn"><?php echo _Submit; ?></button> -->
                                        <button type="submit" class="btn bg-primary btn submit-btn mt-3 text-light"><?php echo _Submit; ?></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
<?php
// include "include/theame-cutomizer.php";
?>