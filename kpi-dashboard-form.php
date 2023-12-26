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

        <!-- start page title -->
        <!--new breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3"><em class="bi bi-speedometer2"></em><?php echo " ";
                                                                            echo _Dashboard; ?></div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <!-- <li class="breadcrumb-item"><i class="bx bx-home-alt"></i>
                </li> -->
                <li class="breadcrumb-item active" aria-current="page"><?php echo TITLE_GENERATE; ?></li>
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
                  <li class="breadcrumb-item"><a href="kpi-dashboard.php"><?php echo _Dashboard; ?></a></li>
                  <li class="breadcrumb-item active"><?php echo _Form; ?></li>
                </ol>
              </div>
              <h4 class="page-title"><?php echo _Dashboard; ?></h4>
            </div>
          </div>
        </div> -->
        <!-- end page title -->
        <div class="main-title card p-2">
            <div class="d-flex align-items-center">
              <h2 class="mb-0 text-success"><?php echo _KPI;
                                        echo "-";
                                        echo _Form; ?></h2>
              <div class="ms-auto position-relative">
                <!-- <button class=""><a href="./kpi-dashboard-list.php"><?php echo _Report; ?></a></button> -->

                <a href="./kpi-dashboard-list.php"><button type="button" class="btn btn-primary bsize"><?php echo _Report; ?></button></a>
              </div>
            </div>
          <!-- <h4 class="p-1"><?php echo _Your_Customized_Dashboard; ?></h4> -->
        </div>
        <!-- <div  class="kpi-form-heading"><?php echo _KPI;
                                            echo "-";
                                            echo _Form; ?></div>
                 <div class="kpi-form">
				  <form class="kpi-dashboard-form">
			
				  	<h5 class="form-section-heading"><?php echo _Questions; ?></h5>
				  	
                      <label class="form-label">
				  		
				  		<span class="input-span"><?php echo _Objective; ?></span>
				  		<input type="text" name="objective" placeholder="" />
				  	</label>
					
				  	<label class="form-label">
				  		<span class="input-span"><?php echo _Sub_Objective; ?></span>
				  		<input type="text" name="subObjective" placeholder="" />
				  	</label>
				  	
                    <label class="form-label">
				  		<span class="input-span"><?php echo _KPI; ?></span>
				  		<input type="text" name="kpi" placeholder="" />
				  	</label>

				  	<label class="form-label">
				  		<span><?php echo _Representative_Activity_and_Corresponding_Approches; ?></span><br>
				  		<textarea name="activity" class="form-textarea" rows="4"  placeholder=""></textarea>
				  	</label>

				  	<label class="form-label">
				  		<span><?php echo _Remarks; ?></span><br>
				  		<textarea name="remarks" class="form-textarea" rows="4"  placeholder=""></textarea>
				  	</label>

				  	<label class="form-label">
				  		<span><?php echo _Month; ?></span><br> -->
        <!--<select name="month">
                            <?php
                            // $month_arr = ['01-Jan','02-Feb','03-Mar','04-Apr','05-May','06-Jun','07-Jul','08-Aug','09-Sep','10-Oct','11-Nov','12-Dec'];

                            // for($i=0;$i<count($month_arr);$i++){
                            //     echo "<option value=".($i+1).">".$month_arr[$i]."</option>";
                            // }
                            ?>
                        </select> -->
        <!-- <input type="text" id="month_year" name="month_year" placeholder="" />
				  	</label>

                    <label class="form-label">
				  		<span><?php echo _Representation; ?></span><br>
				  		<select name="representation">
                            <option value="line chart"><?php echo _Chart; ?></option>
                            <option value="trend"><?php echo _Trend; ?></option>
                            <option value="doughnut chart"><?php echo _Doughnut_Chart; ?></option>
                            <option value="pie chart"><?php echo _Value; ?></option>
                            <option value="yesno"><?php echo _Yes_or_NO; ?></option>
                            <option value="table"><?php echo _Table; ?></option>
                        </select>
				  	</label> -->

        <!-- <button type="submit" class="submit-btn"><?php echo _Submit; ?></button>
				  </form>
				</div>
				</div> -->
        <!-- end container-fluid -->
        <div class="card">
          <div class="card-body">
            <div class="border p-3 rounded">
              <div class="">
                <!-- <h3 class="mb-0 text-uppercase"><?php echo _KPI;
                                                      echo "-";
                                                      echo _Form; ?></h3> -->
                <h3 class=""><?php echo _Your_Customized_Dashboard; ?></h3>

              </div>
              <!-- <hr /> -->
              <form class="kpi-dashboard-form">
			
				  	<h5 class="form-section-heading"><?php echo _Questions; ?></h5>
				  	
                      <label class="form-label">
				  		
				  		<span class="input-span"><?php echo _Objective; ?></span>
				  		<input type="text" class="form-control form-control-sm" name="objective" placeholder="">
				  	</label>
					<br>
				  	<label class="form-label">
				  		<span class="input-span"><?php echo _Sub_Objective; ?></span>
				  		<input type="text" class="form-control form-control-sm" name="subObjective" placeholder="">
				  	</label>
				  	<br>
                    <label class="form-label">
				  		<span class="input-span"><?php echo _KPI; ?></span>
				  		<input type="text"  class="form-control form-control-sm" name="kpi" placeholder="">
				  	</label>
<br>
				  	<label class="form-label">
				  		<span><?php echo _Representative_Activity_and_Corresponding_Approches; ?></span><br>
				  		<textarea name="activity" class="form-textarea" rows="4"  placeholder=""></textarea>
				  	</label>
<br>
				  	<label class="form-label">
				  		<span><?php echo _Remarks; ?></span><br>
				  		<textarea name="remarks" class="form-textarea" rows="4"  placeholder=""></textarea>
				  	</label>
<br>
				  	<label class="form-label">
				  		<span><?php echo _Month; ?></span><br>
				  		<!--<select name="month">
                            <?php
                                $month_arr = ['01-Jan','02-Feb','03-Mar','04-Apr','05-May','06-Jun','07-Jul','08-Aug','09-Sep','10-Oct','11-Nov','12-Dec'];

                                for($i=0;$i<count($month_arr);$i++){
                                    echo "<option value=".($i+1).">".$month_arr[$i]."</option>";
                                }
                            ?>
                        </select> -->
                        <input type="month" id="month_year" name="month_year" placeholder="">
				  	</label>
<br>
                    <label class="form-label">
				  		<span><?php echo _Representation; ?></span><br/>
				  		<select name="representation">
                            <option value="line chart"><?php echo _Chart; ?></option>
                            <option value="trend"><?php echo _Trend; ?></option>
                            <option value="doughnut chart"><?php echo _Doughnut_Chart; ?></option>
                            <option value="pie chart"><?php echo _Value; ?></option>
                            <option value="yesno"><?php echo _Yes_or_NO; ?></option>
                            <option value="table"><?php echo _Table; ?></option>
                            <option value="horizontalBarChart">horizontalBarChart</option>
                            <option value="BubbleChart">BubbleChart</option>
                        </select>
				  	</label>
<br>
				  	<button type="submit" class="submit-btn btn btn-sm bg-primary text-light"><?php echo _Submit; ?></button>
				  </form>
            </div>
          </div>
        </div>

      </div>
      <!-- end content -->




      <!-- Footer Start -->
      <?php
      //  include("include/copyright-footer.php");
      ?>
      <!-- end Footer -->

    </div>
    <div>

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

  </div>
  <!-- END wrapper -->
</div>
<!-- Right Sidebar -->
<!-- <?php include("./thre") ?> -->

<script>
  // $("#month_year").flatpickr({
  //   defaultDate: "",
  //   maxDate: 'today',
  //   plugins: [
  //     new monthSelectPlugin({
  //       shorthand: true, //defaults to false
  //       dateFormat: "M Y", //defaults to "F Y"
  //       altFormat: "F Y"
  //     })
  //   ]
  // });
</script>



<?php
// include "include/footer.php";
?>