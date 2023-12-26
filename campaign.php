<?php

require_once("include/header.php");
include_once('./include/session.php');
include_once('include/connection.php');

$deleted = 0;
// SQL INSERTION
global $dbh;
$sql = "SELECT * FROM category_master WHERE deleted=:deleted";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":deleted" => $deleted
));

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

global $dbh;
$sql = "SELECT id,email,concat(first_name,' ',last_name) AS name FROM users ";
$stmt1 = $dbh->prepare($sql);
$stmt1->execute();

$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);


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
                    <div class="fs-5"><em class="bi bi-ui-checks"></em><?php echo " "; echo _Quiz_Campaign; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                </li>

                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="main-title card p-2">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0 text-success "><?php echo _Quiz_Campaign; ?></h2>
                        <!--<span style="align:right">-->
                        <div class="ms-auto position-relative">
                            <button type="button" class="btn btn-primary" data-target="#modal" data-toggle="modal">
                            <?php echo _Send_Campaign; ?>
                            </button>
                        </div>
                        <!--</span>-->
                    </div>
                </div>

                
                <div id="user-management-table1">
                        
            </div>

            <div id="modal-box-container">

            </div>



            <!-- Modal -->
            <div class="modal fade" id="modal" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel"><?php echo _Send_Campaign; ?></h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="info-form">
                                <div>
                                    <div class="form-group">
                                        <label for="Category"><?php echo _Quiz; echo " "; echo _Category?></label>
                                        <select class="form-control form-control-sm" id="category_id">
                                            <?php
                                            for ($i = 0; $i < count($result); $i++) {
                                            ?>
                                                <option value='<?php echo $result[$i]['category_id']; ?>_<?php echo $result[$i]['category_title']; ?>'><?php echo $result[$i]['category_title']; ?></option>
                                            <?php
                                                $_SESSION['camp-title']=$result[$i]['category_title'];
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="Users"><?php echo _Users; ?></label>
                                        <select class="form-control form-control-sm" id="user_id" multiple="multiple">
                                            <?php
                                            for ($i = 0; $i < count($result1); $i++) {
                                            ?>
                                                <option value='<?php echo $result1[$i]['id']; ?>_<?php echo $result1[$i]['email']; ?>'><?php echo $result1[$i]['name']; ?></option>
                                                
                                            <?php
                                                 $_SESSION['camp-user']= $result1[$i]['name'];
                                            }
                                            ?>
                                        </select>
                                        <span id="span_users" style="color:red"></span>
                                    </div>

                                    <div class="form-group">
                                        <label><?php echo _Start; echo " "; echo _DATE; ?>[YYYY-MM-DD]</label>
                                        <input type="text" class="form-control form-control-sm" data-toggle="datepicker" name="startdate" id="startdate" readonly>
                                        <span id="span_start" style="color:red"></span>

                                    </div>
                                    <div class="form-group">
                                        <label><?php echo _End; echo " "; echo _DATE; ?>[YYYY-MM-DD]</label>
                                        <input type="text" class="form-control form-control-sm" data-toggle="datepicker1" name="enddate" id="enddate" readonly>
                                        <span id="span_end" style="color:red"></span>
                                    </div>


                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo _Close; ?></button>
                            <button type="button" class="btn btn-primary" onClick="return addInfo()"><?php echo _Save_Changes; ?></button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->



    <?php 
    ?>

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

    <!-- Right Sidebar -->



    <?php
    ?>
    <?php
    ?>
    <link rel="stylesheet" href="css/datepicker.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="js/datepicker.js"></script> 
    <script>
        $(function() {


            $('[data-toggle="datepicker"]').datepicker({
                autoHide: true,
                zIndex: 2048,
                format: "yyyy-mm-dd"
            });

            $('[data-toggle="datepicker1"]').datepicker({
                autoHide: true,
                zIndex: 2048,
                format: "yyyy-mm-dd"
            });


        });
    </script>