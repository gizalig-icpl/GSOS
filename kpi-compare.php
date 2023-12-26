<?php

require_once("include/header.php");
?>

<!-- Begin page -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"><em class="bi bi-speedometer2"></em><?php echo" ";  echo _Dashboard; ?> </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bx bx-home-alt"></i>
                                </li>-->
                                <li class="breadcrumb-item active" aria-current="page"><?php 
                                                                        echo _Compare; ?>

                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><i class="bx bx-home-alt"></i></li>
                                    <li class="breadcrumb-item active"><?php echo _KPI;
                                                                        echo "-";
                                                                        echo _Compare; ?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo _Comparison ?></h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title -->
                <div class="main-title card p-2">
                    <h2 class="mb-0 text-success"><?php echo _KPI;
                                                echo "-";
                                                echo _Comparison; ?></h2>
                </div>
                <div class="card p-2">
                    <div class='selectMonths'>
                        <label class="form-label" style="display:flex;font-size:120%">
                            <div class="lead"><?php echo _KPI ?>: </div><br>
                            <select class="form-control form-control-sm ml-2" name="kpi" id="kpi_dropdown" >

                            </select>
                        </label>
                        <br>
                        <div class="d-flex">
                        <div class="pt-1 lead">From:</div> &nbsp;
                        <input class=""  type='month' name="date1" id="date1"> <br> &nbsp;&nbsp;
                        <div class="pt-1 lead" >To:</div>&nbsp;
                        <input class=""  type='month' name="date2" id="date2"> <br> &nbsp; &nbsp;    
                        <button type="button" class="submit-btn btn btn-sm bg-primary text-light" onClick="compare_kpi()"><?php echo _Compare; ?></button>
                        </div>
                    </div>
                </div>
                <div id="comparision_container" style="height:350px">
                    <canvas id="kpi_comp"></canvas>
                </div>



                <!-- end row -->

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->



        <!-- Footer Start -->
        <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2021 - 2022 &copy; by <a href="">Invinsense</a>
                        </div>
                    </div>
                </div>
            </footer> -->
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->


<?php
require_once("include/footer.php");
?>