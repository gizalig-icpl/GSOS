<?php
require_once("include/header.php");
include_once('./include/session.php');
?>
<div class="wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
            <div class="col d-flex">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <!-- <p class="mb-1">Total Orders</p> -->
                                <h4 class="mb-0"> <?php
                                                    if ($_SESSION['role'] == 1) {
                                                        echo ' 
                                <a  data-test-id="users" href="' . USER . '" class="d-flex text-success">
                                <i class="bi bi-person-lines-fill"></i> &nbsp;
                                <div class="menu-title">' . _Users . '</div>
                                                    </a>
                                    </li>';
                                                    }
                                                    ?></h4>
                                <!-- <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>22.5% from last week</span></p> -->
                            </div>
                            <!-- <div class="ms-auto widget-icon bg-primary text-white">
                  <i class="bi bi-basket2"></i>
                </div> -->
                        </div>
                        
        
                            <p class="card-text text-muted mt-3"> Configure user default account setting, including fields, update user, user panel, user 
                                authorization.
                                                </p>
                   
                    </div>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <!-- <p class="mb-1">Total Income</p> -->
                                <h4 class="mb-0"> <?php if ($_SESSION['role'] == 1) { ?>
                                        <a href="<?php echo SMTP_CONFIG; ?>" class="d-flex text-success">
                                       <em class="bi bi-envelope-fill"></em>
                                       &nbsp;<div class="menu-title"><?php echo _SMTP_Config; ?></div>
                                        </a>
                                    <?php } ?>
                                </h4>
                                <!-- <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p> -->
                            </div>
                            
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                        <p class="card-text text-muted mt-3">Tailor the  email settings to align with the compliance needs seamlessly.</p>
                    </div>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <!-- <p class="mb-1">Total Income</p> -->
                                <h4 class="mb-0"> <?php if ($_SESSION['role'] == 1) { ?>
                                        <a href="logAnalytics.php" class="d-flex text-success">
                                       <em class="bi bi-card-text"></em>
                                       &nbsp;<div class="menu-title"><?php echo _Log_Analysis; ?></div>
                                        </a>
                                    <?php } ?>
                                </h4>
                                <!-- <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p> -->
                            </div>
                            
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                        <p class="card-text text-muted mt-3"> Dive deep into your system's activity logs to identify patterns, anomalies, and trends.</p>
                    </div>
                </div>
            </div>
            <div class="col d-flex">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <!-- <p class="mb-1">Total Income</p> -->
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a href="notification-preference.php" class="d-flex text-success">
                                       <em class="bi bi-bell-fill"></em>
                                       &nbsp;<div class="menu-title"><?php echo "Notification Config"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <!-- <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p> -->
                            </div>
                            
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                        <p class="card-text text-muted mt-3">Stay informed and in control with the Notification Menu which manage compliance-related alerts and updates tailored to the  preferences</p>
                    </div>
                </div>
            </div>

            <div class="col d-flex">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <!-- <p class="mb-1">Total Income</p> -->
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a data-test-id="jobs" href="cron-manager.php" class="d-flex text-success">
                                       <em class="bi bi-alarm"></em>
                                       &nbsp;<div class="menu-title"><?php echo "Jobs"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <!-- <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p> -->
                            </div>
                        
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                        <p class="card-text text-muted mt-3">Take control of automated tasks and scheduled processes that ensure the compliance activities are executed precisely and on time.</p>
                    </div>
                </div>
            </div>


            <div class="col d-flex">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <!-- <p class="mb-1">Total Income</p> -->
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a data-test-id="configuration" href="config-manager.php" class="d-flex text-success">
                                       <em class="bi bi-tools"></em>
                                       &nbsp;<div class="menu-title"><?php echo "Configuration"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <!-- <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p> -->
                            </div>
                            
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                        <p class="card-text text-muted mt-3">Tailor the compliance environment to match the organization's needs, ensuring seamless integration and optimal performance.</p>
                    </div>
                </div>
            </div>

            <div class="col d-flex">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <!-- <p class="mb-1">Total Income</p> -->
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a href="email-template.php" class="d-flex text-success">
                                       <em class="bi bi-file-earmark-richtext"></em>
                                       &nbsp;<div class="menu-title"><?php echo "Email Templates"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <!-- <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p> -->
                            </div>
                            
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                        <p class="card-text text-muted mt-3">Simplify compliance correspondence by accessing a library of professionally designed email templates tailored for the companies regulations.</p>
                    </div>
                </div>
            </div>

            <div class="col d-flex">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <?php if ($_SESSION['role'] == 1 && $_SESSION['id'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a href="synch-content.php" class="d-flex text-success">
                                       <em class="bi bi-arrow-repeat"></em>
                                       &nbsp;<div class="menu-title"><?php echo "Sync"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <!-- <p class="mb-0 mt-2 font-13"><i class="bi bi-arrow-up"></i><span>13.2% from last week</span></p> -->
                            </div>
                            
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                        <p class="card-text text-muted mt-3">Keep compliance effortlessly up-to-date across all platforms and systems. </p>
                    </div>
                </div>
            </div>

            <div class="d-none col d-flex" id="error_manager">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a href="error-log.php" class="d-flex text-success">
                                       <em class="bi bi-exclamation-triangle"></em>
                                       &nbsp;<div class="menu-title"><?php echo "Error Log"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <p class="card-text text-muted mt-3">Diagnose and troubleshoot issues, monitor system health, and improve the reliability and performance of systems.</p>
                            </div>
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none col d-flex" id="update_manager">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a href="update.php" class="d-flex text-success">
                                       <em class="bi bi-arrow-repeat"></em>
                                       &nbsp;<div class="menu-title"><?php echo "Update GSOS"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <p class="card-text text-muted mt-3">Sync code from git repo anytime with the branch you specify and take latest code at your environment runtime.</p>
                            </div>
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- This is secret feature. -->
            <div class="d-none col d-flex" id="query_manager">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a href="query-manager.php" class="d-flex text-success">
                                       <em class="bi bi-filetype-sql"></em>
                                       &nbsp;<div class="menu-title"><?php echo "Query Manager"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <p class="card-text text-muted mt-3">Take control of database, use it for optimization, for checking database runtime, for runtime queries related to data retrieval, insertion, modification, or deletion.</p>
                            </div>
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none col d-flex" id="file_manager">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <?php if ($_SESSION['role'] == 1) { ?>
                                    <h4 class="mb-0">
                                        <a href="file-manager.php" class="d-flex text-success">
                                       <em class="bi bi-filetype-php"></em>
                                       &nbsp;<div class="menu-title"><?php echo "File Manager"; ?></div>
                                        </a>
                                    </h4>
                                <?php } ?>
                                <p class="card-text text-muted mt-3"></p>
                            </div>
                            <!-- <div class="ms-auto widget-icon bg-success text-white">
                                <i class="bi bi-currency-dollar"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    </div>
</div>
<script>
    $(document).ready(function() {
        let queryKey = 0, errorKey = 0, updateKey = 0, fileKey = 0;
        $(document).keypress(function(event) {
            if (event.keyCode == 113) {
                queryKey++;
                if (queryKey == 3) {
                    $("#query_manager").removeClass("d-none");
                }
            }
            if (event.keyCode == 101) {
                errorKey++;
                if (errorKey == 3) {
                    $("#error_manager").removeClass("d-none");
                }
            }
            if (event.keyCode == 117) {
                updateKey++;
                if (updateKey == 3) {
                    $("#update_manager").removeClass("d-none");
                }
            }
            if (event.keyCode == 102) {
                fileKey++;
                if (fileKey == 3) {
                    $("#file_manager").removeClass("d-none");
                }
            }
        });
    });
</script>