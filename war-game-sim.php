<?php
require_once("include/header.php");
$status = 1;
$sql = "select * from tabletop where status=:status";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(':status', $status, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="wrapper">
	<div class="page-content">
		<div class="content">

			<!-- Start Content-->
			<div class="container-fluid">

				<!-- start page title -->
				<!-- <div class="row">
					<div class="col-12">
						<div class="page-title-box">
							<div class="page-title-right">
								<ol class="breadcrumb m-0">
									<li class="breadcrumb-item"><a href="javascript: void(0);">GSOS</a></li>
									<li class="breadcrumb-item active"><?php echo _War_Game; ?></li>
								</ol>
							</div>
							<h4 class="page-title"><?php echo _War_Game; ?></h4>
						</div>
					</div>
				</div> -->

				<!--new breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="fs-5"><em class="bi bi-dice-5-fill"></em>
						<?php echo _TableTop_Exercise; ?>
					</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<!-- <li class="breadcrumb-item"><i class="bi bi-dice-5-fill"></i>
								</li> -->
								<!-- <li class="breadcrumb-item active" aria-current="page"><?php echo _War_Game; ?></li> -->

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
				<div class="main-title card p-2">
					<h2 class="mb-0 text-success">
						<?php echo _Tabletop_Exercises; ?>
					</h2>
				</div>
				<!-- <div class="my-3 border-top"></div> -->
				<div class="card p-3">
					<h4 class="">
						<?php echo _Six_Scenarios_to_Help_Prepare_Your_Cybersecurity_Team; ?>
					</h4>
					<div class="accordion" id="accordionExample">
						<?php
						for ($i = 0; $i < count($result); $i++) {
							$question = json_decode($result[$i]['question'], true);
							?>
							<div class="accordion-item">
								<h2 class="accordion-header" id="heading<?php echo $i; ?>">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
										data-bs-target="#collapse<?php echo $i; ?>" aria-expanded="false"
										aria-controls="collapse<?php echo $i; ?>">
										<?php echo $result[$i]['title']; ?>
									</button>
								</h2>
								<div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse"
									aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
									<div class="accordion-body">

										<form class="exercise-form">
											<h5 class="form-section-heading">
												<?php echo _SCENARIO; ?>
											</h5>
											<p>
												<?php echo $result[$i]['scenario']; ?>
											</p>
											<h5 class="form-section-heading">
												<?php echo _Questions; ?>
											</h5>
											<input type="text" hidden name="title"
												value="<?php echo $result[$i]['title']; ?>">

											<label class="form-label">
												<span>
													Name of the member performing exercise?
												</span><br>
												<textarea name="members_name" class="form-control" rows="4" placeholder="<?php echo _Enter_the_name_of_the_members_seperated_by_comma;
												echo "."; ?>"></textarea>
											</label>
											<br>
											<?php
											// echo "<pre>";
											// print_r($question['questions']);
											for ($j = 0; $j < count($question['questions']); $j++) {
												$q = "q" . $j + 1;
												$a = "a" . $j + 1;
												?>
												<label class="form-label">
													<?php
													$question_type = $question['questions'][$j]['type'];
													$questions = $question['questions'][$j]['question'];
													if ($question_type == "") {
														?>
														<input type="text" hidden name="<?php echo $q; ?>"
															value="<?php echo $questions; ?>">
														<input type="text" hidden name="<?php echo $a; ?>"
															value="no_need_answer_required">
														<h5 class="form-section-heading">
															<?php echo $questions; ?>
														</h5><br>
														<?php
													}
													if ($question_type != "") {
														?>
														<input type="text" hidden name="<?php echo $q; ?>"
															value="<?php echo $questions; ?>">
														<span>
															<?php echo $questions; ?>
														</span><br>
														<?php
													}
													if ($question_type == "textarea") {
														?>
														<textarea name="<?php echo $a; ?>" class="form-control" rows="4"></textarea>
														<?php
													}
													if ($question_type == "textbox") {
														?>
														<input class="form-control" type="text" name="<?php echo $a; ?>" />
														<?php
													}
													?>
												</label>
												<br>
												<?php
											}
											?>
											<button type="submit" class="btn bg-primary text-light" onclick="displayLoader();">
												<?php echo _Submit ?>
											</button>
										</form>
									</div>
								</div>
							</div>
							<?php
						}
						?>

					</div>
				</div>
				<!-- </div>
				</div> -->


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