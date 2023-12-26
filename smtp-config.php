<?php
 
require_once("include/header.php");
include_once('./include/session.php');
include_once('./domain/smtp-config-fetch.php');

$final_result = json_decode(getSMTPConfig(), true);
// print_r($final_result);
// $provider = $_POST['provider'];
if(isset($_POST['provider'])){
    $provider = $_POST['provider'];
    global $dbh;
    $sql = "UPDATE smtp_config SET selected = CASE WHEN provider = :provider THEN :selected ELSE 0 END";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":selected" => 1,
        ":provider" => $provider
    ));
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
                    <!--start newbreadcrum-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <!-- <div class="fs-5"><em class="bi bi-envelope-fill"></em><?php echo " "; echo _Configuration; echo " "; echo _Form;?></div> -->
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item active" aria-current="page">SMTP <?php echo _Config;?></li> -->
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
                    <!--end new breadcrum-->
                    <!-- <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">GSOS</a></li>
										<li class="breadcrumb-item active">SMTP <?php echo _Config;?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo _Configuration; echo " "; echo _Form;?></h4>
                            </div>
                        </div>
                    </div> -->
                    <!-- end page title -->
                <div class="main-title card p-2" >
                    <h2 class="text-success" style=""><em class="bi bi-envelope-fill"></em> SMTP <?php echo _Configuration;?></h2>
	        	</div>
                <!--new theme form-->
                
						<div class="card">
							<div class="card-body">
								<div class="p-4">
									<div class="card-title d-flex align-items-center">
										<h5 class="mb-0">
                                            <!-- <div  class="kpi-form-heading" style=""> -->
                                                <?php echo _Configuration; echo " "; echo _Form;?>
                                            <!-- </div> -->
                                        </h5>
									</div>
									<hr>

                                    <div class="kpi-form">
				                    <form class="smtp-form" autocomplete="off">

                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">SMTP Provider</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" aria-label="Provider Select">
                                                <?php 
                                                    for ($i=0; $i < count($final_result); $i++) {
                                                        if($final_result[$i]['selected'] == 1){
                                                            ?>
                                                            <option value="<?php echo $final_result[$i]['provider']; ?>" selected><?php echo $final_result[$i]['provider']; ?></option> 
                                                            <?php
                                                        } else{
                                                            ?>
                                                            <option value="<?php echo $final_result[$i]['provider']; ?>"><?php echo $final_result[$i]['provider']; ?></option> 
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
									
                                    <?php 
                                        global $dbh;
                                        $sql = "SELECT * FROM smtp_config WHERE selected = :selected";
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->execute(array(
                                            ":selected" => 1
                                        ));
                                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    ?>

                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">SMTP <?php echo _Server?></label>
										<div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" name="smtp_server" required placeholder="<?php echo _Server; echo " "; echo _Name?>" value="<?php echo ($data)?$data[0]['server']:""?>" >
										</div>
									</div>
                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">SMTP <?php echo _Port?></label>
										<div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" name="smtp_port" required placeholder="3000" value="<?php echo ($data)?$data[0]['port']:""?>" >
										</div>
									</div>
                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">SMTP <?php echo _Encryption;?></label>
										<div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" name="smtp_encryption" required placeholder="<?php echo _Encryption; echo " "; echo _Text;?>" value="<?php echo ($data)?$data[0]['encryption']:""?>" >
										</div>
									</div>
                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">From Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" name="from_name" required value="<?php echo ($data)?$data[0]['from_name']:""?>" >
										</div>
									</div>
                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">From Email</label>
										<div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" name="from_email" required value="<?php echo ($data)?$data[0]['from_email']:""?>" >
										</div>
									</div>
                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">Reply To Name</label>
										<div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" name="reply_to_name" required value="<?php echo ($data)?$data[0]['reply_to_name']:""?>" >
										</div>
									</div>
                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">Reply To Email</label>
										<div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" name="reply_to_email" required value="<?php echo ($data)?$data[0]['reply_to_email']:""?>" >
										</div>
									</div>
                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">SMTP <?php echo _Login;?></label>
										<div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" name="smtp_login" required placeholder="<?php echo _Login; echo " "; echo _Id;?>" value="<?php echo ($data)?$data[0]['login']:""?>" >
										</div>
									</div>
                                    <div class="row mb-3">
										<label class="col-sm-3 col-form-label">SMTP <?php echo _Password;?></label>
										<div class="col-sm-9">
											<input type="password" class="form-control form-control-sm" name="smtp_password" placeholder="<?php echo _Password;?>" required>
										</div>
									</div>
									
									<div class="row">
										<label class="col-sm-3 col-form-label"></label>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary px-5"><?php echo _Submit; ?></button>
										</div>
									</div>
                                    </form>
                                    </div>


                                    <form class="test-form" autocomplete="off">
                                        <div class="card-title d-flex align-items-center mt-5">
                                            <h5 class="mb-0">Send a test email</h5>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label">Test Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" class="form-control form-control-sm" name="test_email" placeholder="test@test.com">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-9">
                                                <button type="submit" class="btn btn-primary px-5">Send</button>
                                            </div>
                                        </div>
                                    </form>

								</div>
							</div>
						</div>
					
                <!--end new theme form-->
                <!-- <div  class="kpi-form-heading"><?php echo _Configuration; echo " "; echo _Form;?></div>
                <div class="kpi-form">
				  <form class="smtp-form">
			
				  	
                      <label class="form-label">
				  		
				  		<span class="input-span">SMTP <?php echo _Server?></span>
				  		<input type="text" name="smtp_server" placeholder="<?php echo _Server; echo " "; echo _Name?>" value="<?php echo ($final_result)?$final_result['server']:""?>" />
				  	</label>
					
				  	<label class="form-label">
				  		<span class="input-span">SMTP <?php echo _Port?></span>
				  		<input type="text" name="smtp_port" placeholder="3000" value="<?php echo ($final_result)?$final_result['port']:""?>" />
				  	</label>
				  	
                    <label class="form-label">
				  		<span class="input-span">SMTP <?php echo _Encryption;?></span>
				  		<input type="text" name="smtp_encryption" placeholder="<?php echo _Encryption; echo " "; echo _Text;?>" value="<?php echo ($final_result)?$final_result['encryption']:""?>" />
				  	</label>
 
				  	<label class="form-label">
				  		<span class="input-span">SMTP <?php echo _Login;?></span>
				  		<input type="text" name="smtp_login" placeholder="<?php echo _Login; echo " "; echo _Id;?>" value="<?php echo ($final_result)?$final_result['login']:""?>" />
				  	</label>

                    <label class="form-label">
				  		<span class="input-span">SMTP <?php echo _Password;?></span>
				  		<input type="text" name="smtp_password" placeholder="<?php echo _Password;?>" value="<?php echo ($final_result)?$final_result['password']:""?>"/>
				  	</label>

				  	<button type="submit" class="submit-btn"><?php echo _Submit; ?></button>
				  </form>
				</div> -->
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
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    

    <?php 

?>

<script>
    $('.smtp-form select').on('change', function(){
        let provider = $('.smtp-form').find(':selected').val();
        $.ajax({
            type: 'POST',
            url: './smtp-config.php',
            data: {
                provider: provider
            }
        });
        location.reload();
    });

    $('form.test-form').on('submit', function(event){
        $('.test-form button').attr('disabled', true);
        event.preventDefault();
        let testemail = $('.test-form input').val();
        console.log(testemail);
        $.ajax({
            url: "./test-email.php",
            type: "post", 
            data: {
                testemail: testemail
            },
            success: function(){
                swal({
                    title: "Please check your inbox!",
                    type: "success",
                })
                $('.test-form input').val('');
                $('.test-form button').attr('disabled', false);
            }
        });
    })
</script>