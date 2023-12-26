<?php
 
require_once("include/header.php");
require_once("domain/kpi-form-data.php");
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
                    <div class="fs-5"> <em class="bi bi-speedometer2"></em> <?php echo" "; echo _Dashboard;?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><a href="kpi-dashboard.php">GSOS</a>
                                </li>
                                <li class="breadcrumb-item"><a href="kpi-dashboard.php"><?php echo _Dashboard;?></a></li>
                                 <li class="breadcrumb-item active" aria-current="page">Report</li> -->

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
										<li class="breadcrumb-item"><a href="kpi-dashboard.php"><?php echo _Dashboard;?></a></li>
                                        <li class="breadcrumb-item active">Report</li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo _Dashboard;?></h4>
                            </div>
                        </div>
                    </div> -->
                    <div class="card">
                    <div class="card-body">
                        <table class="table mb-0 table-striped" id="war-game-sim-list" aria-label="Semantic Elements">
                            <thead>
                                <tr>
	        			<th>Sr.NO</th>
	        			<th>Objective</th>
	        			<th>Sub-Objective</th>
	        			<th>Activity and Approches</th>
	        			<th>Remarks</th>
                        <th>Month</th>
                        <th>Representation</th>
                        <th>Created On</th>
	        		</tr>
                    </thead>
                    <tbody>
	        	<?php
				$month_arr = ['01-Jan','02-Feb','03-Mar','04-Apr','05-May','06-Jun','07-Jul','08-Aug','09-Sep','10-Oct','11-Nov','12-Dec'];
	        		$result = getData();
	        		for($i=0;$i<count($result);$i++){
	        			echo "<tr>";
	        				echo "<td>".($i+1)."</td>";
	        				echo "<td>".$result[$i]['objective']."</td>";
	        				echo "<td>".$result[$i]['kpi']."</td>";
                            echo "<td>".$result[$i]['activity']."</td>";
                            echo "<td>".$result[$i]['remarks']."</td>";
                            echo "<td>".$month_arr[$result[$i]['month']-1]."</td>";
                            echo "<td>".$result[$i]['representation']."</td>";
	        				echo "<td>".$result[$i]['created_on']."</td>";
	        			echo "</tr>";
	        		}
	        		
	        	?>
                    </tbody>
	        	</table>
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
    

    <?php 
// include "include/footer.php"; 
?>
<?php 
    // include "include/theame-cutomizer.php";
    ?>
