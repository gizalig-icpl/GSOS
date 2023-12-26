<?php

require_once("include/header.php");
include_once('./include/session.php');
include_once('./domain/vision-mission-fetch.php');

$final_result = json_decode(getVMText());
if ($final_result) {
    $final_result = $final_result[0];
    $final_result = (array) $final_result;
}

?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="fs-5 breadcrumb-title pe-3"><em class="bi bi-lightbulb-fill"></em><?php  echo " "; echo _Vision;
                                                        echo " ";
                                                        echo "&";
                                                        echo " ";
                                                        echo _Mission; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                
                                

                                <li class="breadcrumb-item active" aria-current="page"><?php echo _Form; ?></li>

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
										<li class="breadcrumb-item"><a href="kpi-dashboard.php"><?php echo _Vision;
                                                                                                echo "-";
                                                                                                echo _Mission; ?></a></li>
                                        <li class="breadcrumb-item active"><?php echo _Form; ?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo _Vision;
                                                        echo "-";
                                                        echo _Mission; ?></h4>
                            </div>
                        </div>
                    </div> -->
                <!-- end page title -->



                <!--new form-->
                
                    <div class="main-title card p-2">
                            <h2 class="mb-0 text-success"><?php echo _Generation;
                                                                        echo " - ";
                                                                        echo _Form; ?></h2>
                    </div>


                <div class="card">
                            <div class="card-body">
                                <!-- <div class="border p-1 rounded"> -->
                                    <div class="main-title card p-2">
                                        <!--<h6 class="mb-0 text-uppercase">Contact Form</h6>-->
                                        <!-- <h4>
                                            <div class="kpi-form-heading"><?php echo _Form; ?></div>
                                        </h4> -->
                                        <div class="kpi-form container-fluid">
                                            
                                            <form class="row g-3 form-group" enctype="multipart/form-data"  onSubmit="submitForm(event)">
                                                <!-- <h5 class="form-section-heading"><?php echo _Vision;
                                                                                        echo " ";
                                                                                        echo _Text; ?></h5>-->



                                                <div class="col-12">
                                                    <h5 class="form-section-heading"><?php echo _Vision;
                                                                                        echo " ";
                                                                                        echo _Text; ?></h5>
                                                    <label class="form-label file-upload"> <?Php echo _Vision;
                                                                                            echo " ";
                                                                                            echo _Summary; ?></label>
                                                    <textarea name="vission-summary" class="form-control form-control-sm" rows="4" cols="4"><?php echo ($final_result) ? $final_result['vision_text'] : "" ?></textarea>

                                                </div>

                                                <?php if ($final_result) { ?>
                                                    <div class="col-3">
                                                        <label class="form-label file-upload">
                                                            <span class="input-span">
                                                                <?php echo _Current;
                                                                echo " ";
                                                                echo _Vision;
                                                                echo " ";
                                                                echo _File;
                                                                echo ":" ?>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <!-- <div class="d-grid">-->
                                                    <div class="col-9"><?php echo substr($final_result['vision_file'], (strripos($final_result['vision_file'], "/") + 1)) ?></div>
                                                    <!--</div>-->

                                                <?php } ?>

                                                <div class="col-3">
                                                    <label class="form-label file-upload">
                                                        <span class="input-span">
                                                            <?php echo ($final_result) ? "Update " : "" ?><?php echo _Vision;
                                                                                                        echo " ";
                                                                                                        echo _File;
                                                                                                        echo ":"; ?>

                                                </div>
                                                <div class="col-9">
                                                    <input type="file" class="form-control form-control-sm" name="fileToUpload1" id="fileToUpload1" value="<?php echo $final_result['vision_file'] ?>" accept="application/pdf">
                                                    </span>
                                                    </label>
                                                </div>

                                                <!--<div class="col-12">
                    <label class="form-label">Message</label>
                    <textarea class="form-control form-control-sm" rows="4" cols="4"></textarea>
                  </div>-->

                                                <div class="col-12">
                                                    <h5 class="form-section-heading"><?php echo _Mission;
                                                                                        echo " ";
                                                                                        echo _Text; ?></h5>
                                                    <label class="form-label file-upload"> <?php echo _Mission;
                                                                                            echo " ";
                                                                                            echo _Summary; ?></label>
                                                    <textarea name="mission-summary" class="form-control form-control-sm" rows="4" cols="4" placeholder="Few lines of your mission"><?php echo ($final_result) ? $final_result['mission_text'] : "" ?></textarea>
                                                </div>

                                                <?php if ($final_result) { ?>

                                                    <div class="col-3">
                                                        <label class="form-label file-upload">
                                                            <span class="input-span">
                                                                <?php echo _Current;
                                                                echo " ";
                                                                echo _Mission;
                                                                echo " ";
                                                                echo _File;
                                                                echo ":"; ?>
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <!--<div class="d-grid">-->
                                                    <!-- <label class="form-label file-upload" >-->

                                                    <div class="col-9"><?php echo substr($final_result['mission_file'], (strripos($final_result['vision_file'], "/") + 1)) ?></div>
                                                    <!--</label>  -->
                                                    <!-- </div>-->

                                                <?php } ?>

                                                <div class="col-3">
                                                    <label class="form-label file-upload">
                                                        <span class="input-span">
                                                            <?php echo ($final_result) ? "Update " : "" ?><?php echo _Mission;
                                                                                                        echo " ";
                                                                                                        echo _File;
                                                                                                        echo ":"; ?>

                                                </div>
                                                <div class="col-9">
                                                    <input type="file" class="form-control form-control-sm" name="fileToUpload2" id="fileToUpload2" value="<?php echo $final_result['mission_file'] ?>" accept="application/pdf">
                                                    </span>
                                                    </label>
                                                </div>

                                                <!--<button type="submit" class="btn btn-primary">Send</button>-->
                                                <button type="submit" id="visson-mission-submit" class="submit-btn btn btn-primary" onclick="displayLoader();"><?php echo _Submit; ?></button>

                                            </form>
                                        </div>
                                    </div>
                                <!-- </div> -->
                            </div>

                            <!--end new form-->
                        <!-- </div>
                    </div> -->
                    <!-- end container-fluid -->

                </div>
                <!--card end-->
            </div>
        </div>
        <!-- end content -->



        <!-- Footer Start ->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2021 - 2022 &copy; by <a href="">Invinsense</a>
                        </div>
                    </div>
                </div>
            </footer>
            <-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->


