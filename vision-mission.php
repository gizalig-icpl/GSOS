<?php

require_once("include/header.php");
include_once('./domain/vision-mission-fetch.php');

$final_result = json_decode(getVMText());
if ($final_result) {
    $final_result = $final_result[0];
    $final_result = (array) $final_result;
}
// $path = substr($_SERVER['SCRIPT_FILENAME'],0,strpos($_SERVER['SCRIPT_FILENAME'],"vision"))."vision-mission/"; //For Server

$path = APPLICATION_URL."vision-mission/";
?>


<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="main-title card p-2" >
                    <h2 class="mb-0 text-success"><?php echo _Vision." & ". _Mission; ?></h2>
	        	</div>

                <!-- start page title -->
                <!--new breadcrumb-->
                <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="fs-5"><em class="bi bi-lightbulb-fill"></em><?php  echo " "; echo _Vision;
                                                        echo " ";
                                                        echo "&";
                                                        echo " ";
                                                        echo _Mission; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                </li>

                                <li class="breadcrumb-item active" aria-current="page"><?php echo _Vision;
                                                                                        echo " ";
                                                                                        echo "&";
                                                                                        echo " ";
                                                                                        echo _Mission; ?></li>

                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
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
                    </div>
                </div> -->
                <!--end new bread crumb-->

                <!-- <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">GSOS</a></li>
                                        <li class="breadcrumb-item active"><?php echo _Vision;
                                                                            echo " ";
                                                                            echo "&";
                                                                            echo " ";
                                                                            echo _Mission; ?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo _Vision;
                                                        echo " ";
                                                        echo "&";
                                                        echo " ";
                                                        echo _Mission; ?></h4>
                            </div>
                        </div>
                    </div> -->
                <div class="visionmision_main">
                    <!--<div class="row">

                        <div class="col-lg-6">
                            <div class="vison_box card">
                                <div class="vision_title card-header bg-info">
                                    <h3 class="card-title text-white mb-0 p-1 "><?php echo _Vision; ?></h3>
                                    <?php if ($final_result) { ?>
                                        
                                    <li class="dropdown" style="list-style-type:none">
                                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" style="color:#fff">
                                        
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right profile-dropdown " style="width: auto;">

                                            <!- item->
                                            <a href="<?php echo $path . substr($final_result['vision_file'], (strripos($final_result['vision_file'], "/") + 1)) ?>" target="_blank" rel="noreferrer" class="dropdown-item notify-item" style="color:#0CB04A;">
                                                <span><?php echo substr($final_result['vision_file'], (strripos($final_result['vision_file'], "/") + 1)) ?></span>
                                            </a>

                                        </div>
                                    </li>
                                    <?php } else { ?>
                                        <a href="#"><i class="fas fa-ellipsis-h" style="color:#fff"></i></a>
                                    <?php } ?>
                                </div>
                                
                                <?php if ($final_result) { ?>
                                    <div class="content-container card-body">
                                        <p><?php echo ($final_result) ? $final_result['vision_text'] : "" ?></p>
                                    </div>
                                <?php } else { ?>
                                <div class="content-container card-body" style="min-height:500px">
                                <p><?php echo _Data_Security_as_an_on_going_organized_practice; ?></p><p><?php echo _That_conveys_savvy_insurance_of_the_Business; ?></p><p><?php echo _Not_similarly_as_a_progression_of_check_in_the_crate_projects; ?></p> 
                                <p>
									<ul class="list-container>
										<li><?php echo _Establish_an_unmistakable_working_model_across_IT;
                                            echo ", ";
                                            echo _Security;
                                            echo ", ";
                                            echo  _the_Business;
                                            echo _and_other_control_capacities;
                                            echo "(";
                                            echo _Risk_Compliance_Audit;
                                            echo ").";  ?></li>
										<li><?php echo _Ensure_security_jobs;
                                            echo ", ";
                                            echo _duties_and_announcing_lines_are_clear_and_at_the_correct_level; ?></li>
										<li><?php echo _Establish_genuine_possession_and_responsibility_for_data_security_controls_and_business_insurance_across_the_Enterprise; ?></li>
									</ul>
								</p>
								</div>
                                <?php } ?>
                                
                                <div class="vision_img">
                                    <img src="images/vision_img.png">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="vison_box card">
                                <div class="vision_title card-header bg-info">
                                    <h3 class="card-title text-white mb-0 p-1 "><?php echo _Mission; ?></h3>
                                    <?php if ($final_result) { ?>
                                    <li class="dropdown " style="list-style-type:none">
                                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" style="color:#fff">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

                                            <!- item->
                                            <a href="<?php echo $path . substr($final_result['mission_file'], (strripos($final_result['mission_file'], "/") + 1)) ?>" target="_blank" rel="noreferrer" class="dropdown-item notify-item" style="color:#0CB04A;">
                                                <span><?php echo substr($final_result['mission_file'], (strripos($final_result['mission_file'], "/") + 1)) ?></span>
                                            </a>

                                        </div>
                                    </li>
                                    <?php } else { ?>
                                        <a href="#"><i class="fas fa-ellipsis-h" style="color:#fff"></i></a>
                                    <?php } ?>
                                </div>
								
                                <?php if ($final_result) { ?>
                                    <div class="content-container card-body">
                                    <p><?php echo ($final_result) ? $final_result['mission_text'] : "" ?></p>
                                    </div>
                                <?php } else { ?>
                                    <div class="content-container card-body" style="min-height:500px">
                                    <p><?php echo _Breaking_silos_is_the_key_to_success; ?></p>

                                    <p><?php echo _For_the_implementation_of_business_processes_and_technical_solutions; ?></p>

                                    <p><?php echo _Look_beyond_pure_IT_security_issues; ?></p>

                                    <p><?php echo _Technical_information_security_initiatives_are_often_complex_and_interdisciplinary_and_require_a_focus_on_IT_and_security_management; ?></p>

                                    <p><?php echo _Engage_and_engage_all_stakeholders_from_the_start_by_creating_meaningful_and_useful_indicators; ?></p>

                                    <p><?php echo _The_key_to_success_is_breaking_the_silo_between_security;
                                        echo ", ";
                                        echo _information_technology_and_business_to_provide_a_truly_effective_and_efficient_control_platform_and_ongoing_support;
                                        echo "."; ?></p>
                                    </div>
                                <?php } ?>
									
								
                                
                                <div class="vision_img">
                                    <img src="images/vision_img.png">
                                </div>
                            </div>
                        </div>
                        
                    </div>-->
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="col">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="bg-primary text-white p-2">
                                            <h6 data-test-id="vision-head" class="card-title text-white d-flex"><?php echo _Vision; ?>

                                                <div class="pe-3"><!--link-->

                                                    <?php if ($final_result) { ?>
                                                        <div class="btn-group">
                                                          
                                                            <li style="list-style: none;" class="dropdown"><!--style="list-style-type:none"-->
                                                                <a class="nav-link dropdown-toggle nav-user mb-3" style="" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">

                                                                    <!-- <i class="fas fa-ellipsis-h"></i> -->
                                                                </a>
                                                                <div style="" class="dropdown-menu dropdown-menu-right  dropdown-menu-lg-end">

                                                                    <!-- item-->
                                                                    <a class="dropdown-item" href="<?php echo $path . substr($final_result['vision_file'], (strripos($final_result['vision_file'], "/") + 1)) ?>" target="_blank" rel="noreferrer" class="dropdown-item notify-item">
                                                                        <!-- <span><?php echo substr($final_result['vision_file'], (strripos($final_result['vision_file'], "/") + 1)) ?></span> -->
                                                                        <span>Download</span>

                                                                    </a>




                                                                </div>
                                                            </li>
                                                        </div>

                                                    <?php } else { ?>
                                                        <a href="#"><em class="fas fa-ellipsis-h"></em></a>
                                                    <?php } ?>
                                                </div>
                                                </h5>
                                        </div>

                                        <?php if ($final_result) { ?>
                                            <div class="container-fluid p-2">
                                                <p class="text-justify"><?php echo ($final_result) ? $final_result['vision_text'] : "" ?></p>
                                            </div>
                                        <?php } else { ?>

                                            <p class="card-text">
                                                <?php echo _Data_Security_as_an_on_going_organized_practice; ?></p>
                                            <p><?php echo _That_conveys_savvy_insurance_of_the_Business; ?></p>
                                            <p><?php echo _Not_similarly_as_a_progression_of_check_in_the_crate_projects; ?>

                                            </p>
                                            <p class="card-text">
                                            <ul class="list-container">
                                                <li><?php echo _Establish_an_unmistakable_working_model_across_IT;
                                                    echo ", ";
                                                    echo _Security;
                                                    echo ", ";
                                                    echo  _the_Business;
                                                    echo _and_other_control_capacities;
                                                    echo "(";
                                                    echo _Risk_Compliance_Audit;
                                                    echo ").";  ?></li>
                                                <li><?php echo _Ensure_security_jobs;
                                                    echo ", ";
                                                    echo _duties_and_announcing_lines_are_clear_and_at_the_correct_level; ?></li>
                                                <li><?php echo _Establish_genuine_possession_and_responsibility_for_data_security_controls_and_business_insurance_across_the_Enterprise; ?></li>
                                            </ul>
                                            </p>
                                        <?php } ?>
                                        <div class="vision_img">
                                            <img alt="vision images" class="img-fluid" src="images/vision_img.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="bg-primary text-white p-2   ">
                                            <h6 data-test-id="mission-head" class="card-title text-white d-flex"><?php echo _Mission; ?>
                                                <div class="pe-3"><!--link-->
                                                    <?php if ($final_result) { ?>
                                                        <div class="btn-group">
                                                            <li style="list-style: none;" class="dropdown">
                                                                <a class="nav-link dropdown-toggle nav-user ml-0 mb-3" style="" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                                                    <!-- <i class="fas fa-ellipsis-h"></i> -->
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right  dropdown-menu-lg-end">

                                                                    <!-- item-->
                                                                    <a class="dropdown-item" href="<?php echo $path . substr($final_result['mission_file'], (strripos($final_result['mission_file'], "/") + 1)) ?>" target="_blank" rel="noreferrer" class="dropdown-item notify-item">
                                                                        <!-- <span><?php echo substr($final_result['mission_file'], (strripos($final_result['mission_file'], "/") + 1)) ?></span> -->
                                                                        <span>Download</span>
                                                                    </a>

                                                                </div>
                                                            </li>
                                                        </div>
                                                    <?php } else { ?>
                                                        <a href="#"><em class="fas fa-ellipsis-h"></em></a>
                                                    <?php } ?>
                                                </div>
                                                </h5>
                                        </div>

                                        <?php if ($final_result) { ?>
                                            <div class="container-fluid p-2">
                                                <p class="text-justify"><?php echo ($final_result) ? $final_result['mission_text'] : "" ?></p>
                                            </div>
                                        <?php } else { ?>

                                            <p class="card-text">
                                                <?php echo _Data_Security_as_an_on_going_organized_practice; ?></p>
                                            <p><?php echo _That_conveys_savvy_insurance_of_the_Business; ?></p>
                                            <p><?php echo _Not_similarly_as_a_progression_of_check_in_the_crate_projects; ?>

                                            </p>
                                            <p class="card-text">
                                            <p><?php echo _Breaking_silos_is_the_key_to_success; ?></p>

                                            <p><?php echo _For_the_implementation_of_business_processes_and_technical_solutions; ?></p>

                                            <p><?php echo _Look_beyond_pure_IT_security_issues; ?></p>

                                            <p><?php echo _Technical_information_security_initiatives_are_often_complex_and_interdisciplinary_and_require_a_focus_on_IT_and_security_management; ?></p>

                                            <p><?php echo _Engage_and_engage_all_stakeholders_from_the_start_by_creating_meaningful_and_useful_indicators; ?></p>

                                            <p><?php echo _The_key_to_success_is_breaking_the_silo_between_security;
                                                echo ", ";
                                                echo _information_technology_and_business_to_provide_a_truly_effective_and_efficient_control_platform_and_ongoing_support;
                                                echo "."; ?></p>

                                            </p>
                                        <?php } ?>
                                        <div class="vision_img">
                                            <img alt="vision image" class="img-fluid" src="images/vision_img.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container-fluid -->
</div>
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


<?php
// include "include/footer.php"; 


// include "include/theame-cutomizer.php";
?>