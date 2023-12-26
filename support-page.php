<?php

require_once("include/header.php");
include_once('./include/session.php');
?>

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
            <div class="main-title card p-2">
                    <h2 class="text-success">Support - Form</h2>
                </div>

                <!-- start page title -->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="kpi-dashboard.php">GSOS</a></li>
                                    <li class="breadcrumb-item active">Support Page</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Support</h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title -->
        <div class="card">
            <div class="card-body">
            <h4>We are here to help you</h4>
               <hr>
                <div class="kpi-form">
                    <form class="support-form">

                        <!-- <h5 class="form-section-heading">questions</h5> -->

                        <label class="form-label dropdown">
                            <span>Support Category: </span>
                            <select  class="form-select form-select-sm" name="category">
                                <option value="SOC">SOC</option>
                                <option value="TOC">TOC</option>
                                <option value="COC">COC</option>
                                <option value="AOC">AOC</option>
                                <option value="MSS">MSS</option>
                                <option value="SERVICES">SERVICES</option>
                                <option value="SOLUTIONS">SOLUTIONS</option>
                            </select>
                        </label>
                        <br>
                        <label class="form-label">
                            <span>Query</span><br>
                            <textarea name="query" class="form-textarea form-control" rows="4" placeholder=""></textarea>
                        </label>
                        <br>
                        <button type="submit" class="submit-btn btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->


        <?php
        // include("include/copyright-footer.php"); 
        ?>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->
</div>
<!-- Right Sidebar -->



