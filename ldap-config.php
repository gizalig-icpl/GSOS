<?php
 
require_once("include/header.php");
include_once('./include/session.php');
include_once("./domain/ldap-config-fetch.php");

 $final_result = json_decode(getLdapConfig());
 if($final_result){
     $final_result = $final_result[0];
     $final_result = (array) $final_result;
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
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">GSOS</a></li>
										<li class="breadcrumb-item active">IDAP <?php echo _Config;?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo _Configuration; echo " "; echo _Form;?></h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                <div class="main-title card p-2" >
		        	<h2 style="color:#0CB04A;">LDAP <?php echo _Configuration;?></h2>
	        	</div>
                <div  class="kpi-form-heading"><?php echo _Configuration; echo " "; echo _Form;?></div>
                <div class="kpi-form">
				  <form class="ldap-form"><label class="form-label">
				  		<span class="input-span">LDAP <?php echo _Server?></span>
				  		<input type="text" name="ldap_server" placeholder="<?php echo _Server; echo " "; echo _Name?>" value="<?php echo ($final_result)?$final_result['server']:""?>">
				  	</label>
				  	<label class="form-label">
				  		<span class="input-span">LDAP <?php echo _Port?></span>
				  		<input type="text" name="ldap_port" placeholder="3000" value="<?php echo ($final_result)?$final_result['port']:""?>">
				  	</label>
				  	<button type="submit" class="submit-btn"><?php echo _Submit; ?></button>
				  </form>
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