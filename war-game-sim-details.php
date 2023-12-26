<?php
 
require_once("include/header.php");
require_once("domain/war-game-sim-data.php");

	$id = $_GET['id'];
	$id= (int)$id;
	if($id == 0){
		echo "<script>window.location.href = 'index.php';</script>";
	}

	$result = getSingleFormData($id);
	$result=$result[0];
	if(!$result){
		echo "<script>window.location.href = 'index.php';</script>";
	}
	$res = $result['exercise_question_answer'];
	$res = (array)json_decode($res);
	
	$scenarios=array(
				"The Quick Fix" => '<p>Joe, your network administrator, is overworked and underpaid. His bags are packed and ready for a family vacation to Disney World when he is tasked with deploying a critical patch. In order to make his flight, Joe quickly builds an installation file forthe patch and deploys it before leaving for his trip. Next, Sue, the on-call service desktechnician, begins receiving calls that nobody can log in. It turns out that no testing was done for the recently-installed critical patch.</p>',
					
				"A Malware Infection" => '<p>An employee within your organization used the company’s digital camera for business purposes. In the course of doing so, they took a scenic photograph that they then loaded onto their personal computer by inserting the SD card. The SD card was infectedwith malware while connected to the employee’s personal computer. When re-inserted into a company machine, it infected the organization’s system with the same malware.</p>',
				
				"The Unplanned Attack" => '<p>A hacktivist group threatens to target your organization following an incident involving an allegation of use of excessive force by law enforcement. You do not know the nature of the attack they are planning. How can you improve your posture to best protect your organization?</p>',
				
				"The Cloud Compromise" => '<p> One of your organization’s internal departments frequently uses outside cloud storage to store large amounts of data, some of which may be considered sensitive. You have recently learned that the cloud storage provider that is being used has been publicly compromised and large amounts of data have been exposed. All user passwords and data stored in the cloud provider’s infrastructure may have been compromised.</p>',
				
				"Financial Break-in" => '<p>A routine financial audit reveals that several people receiving paychecks are not, and have never been, on payroll. A system review indicates they were added to the payroll approximately one month prior, at the same time, via a computer in the financial department.</p>
				<h5 class="form-section-heading">INJECT</h5>
				<p>You confirm the computer in the payroll department was used to make the additions. Approximately two weeks prior to the addition of the new personnel, there was a physical break-in to the finance department in which several laptops without sensitive data were taken.</p>
				<h5 class="form-section-heading">OPTIONAL INJECT</h5>
				<p>Further review indicates that all employees are paying a new "fee" of $20 each paycheck and that money is being siphoned to an off-shore bank account.</p>',
				
				"The Flood Zone" => '<p> Your organization is located within a flood zone. Winter weather combined with warming temperatures has caused flooding throughout the area. Local authorities have declared a state of emergency. In the midst of managing the flooding, a ransomware attack occurs on your facility, making computer systems inoperable.</p>',

				"Audit Playbook" => [["Initial Audit Planning",5],["Risk and Process Subject Matter Expertise",4],["Initial Document Request List",4],["Preparing for a Planning Meeting",3],["Preparing the Audit Program",5],["Audit Program and Planning Review",1]],
			);

	
	
?>
 <div class="wrapper">
<div class="page-content">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
					<!--new breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"><?php echo _War_Game_details;?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="kpi-dashboard.php">GSOS</a>
                                </li>
                                <li class="breadcrumb-item"><a href="index.php?page=war-game-sim"><?php echo _War_Game; ?></a></li>
                                 <li class="breadcrumb-item active" aria-current="page"><?php echo _War_Game_details;?></li>

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
										<li class="breadcrumb-item"><a href="war-game-sim.php"><?php echo _War_Game;?></a></li>
                                        <li class="breadcrumb-item active"><?php echo _War_Game_details;?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo _War_Game_details;?></h4>
                            </div>
                        </div>
                    </div> -->
				<div class="card"> 
					<div class="container-fluid ">
						<div class="card-body">
							<div class="border p-2 rounded">
				<div class="detail-info">
					<div class="row">
				<h4 class="text-success"><?php echo xss_safe($result['exercise_title']);?></h4>
				<hr>
				<h5 class="form-section-heading"><?php echo (($result['exercise_title']=="Audit Playbook")?"":"scenario")?></h5>
				<?php echo (($result['exercise_title']=="Audit Playbook")?"":$scenarios[$result['exercise_title']]) ?>
				
				<h5 class="form-section-heading">questions</h5>
				<label class="form-label">
					<span>Name of the member performing exercise?</span><br>
					<textarea disabled name="members_name" class="form-control form-control-sm" rows="4"><?php echo xss_safe($result['members_name']);?></textarea>
				</label>
					<?php
						$k = 0;
						if($result['exercise_title']=="Audit Playbook"){
							echo '<h5 class="form-section-heading">'.htmlentities($scenarios[$result['exercise_title']][$k][0]).'</h5>';
							$k++;
						}
						$i=0;
						foreach($res as $x => $val) {
							/*
							if($scenarios[$result['exercise_title']][$k-1][0]==$i){
								echo '<h5 class="form-section-heading">'.$scenarios[$result['exercise_title']][$k][0].'</h5>';
								$k++;
								$i=0;
							}*/
							if($val=="no_need_answer_required")
							{
								?><br>
										<label class="form-label">
								  		<h5 class="form-section-heading"><?php echo $x; ?></h5>
								  		
										</label>
										<?php
							}
							elseif($x == "Processes tested" || $x == "Threat actor" || $x=="Asset impacted"){
								echo '<br>
										<label class="form-label">
								  		<span class="input-span">'.$x.'</span>
								  		<input type="text" class="form-control form-control-sm" name="a4" placeholder="" value="'.$val.'" disabled></textarea>
								  		
										</label>';
							}
							else{
							  	echo '<br>
									<label class="form-label">
								  		<span>'.$x.'</span><br>
								  		<textarea disabled name="a1" class="form-control form-control-sm" rows="4" >'.$val.'</textarea>
								  	</label>';
							}
							$i++;
						}
					?>
				</div>
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
		//   include("include/copyright-footer.php"); 
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