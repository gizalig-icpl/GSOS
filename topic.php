<?php
     
    require_once("include/header.php");
    include_once('include/session.php');
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
                    <div class="fs-5"><em class="bi bi-info-square-fill"></em><?php echo " "; echo _Topic;?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-info-square-fill"></i>
                                </li>
                                 <li class="breadcrumb-item active" aria-current="page"><?php echo _Topic;?></li> -->

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
                                        <li class="breadcrumb-item active"><?php echo _Topic;?></li>
                                    </ol>
                                </div>
                                <h4 class="page-title"><?php echo _Topic;?></h4>
                            </div>
                        </div>
                    </div> -->
                    <!-- end page title -->
                    <div class="main-title card p-2" >
                        <div class="d-flex align-items-center">
                            <h2 class="text-success"><?php echo _Topic_Management;?></h2>
                            <div class="ms-auto position-relative">
                                <span > <button  class="btn bg-primary text-light" data-bs-toggle="modal" data-bs-target="#exampleModal" onClick="createModalAdd(<?php echo $_GET['id']; ?>)"><?php echo ADD_TOPIC ; ?></button> </span>
                            </div>
                        </div>
                    </div>
                
                <div id="user-management-table">
                </div>
                
                
                <div id="modal-box-container">

                
                </div>
				</div>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->

            

            <!-- Footer Start -->
            <?php 
            // include("include/copyright-footer.php");
             ?>
            <!-- end Footer -->

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
<script>
    $( ".row_position" ).sortable({  
    delay: 150,  
    stop: function() {  
        var selectedData = new Array();  
        $('.row_position>tr').each(function() {  
            selectedData.push($(this).attr("id"));  
        });  
        updateTopic(selectedData);  
    }  
});  

function updateTopic(aData) {
    $.ajax({
        url: 'topic-position-update.php',
        type: 'POST',
        data: {position:aData},
        success: function() {
            success_toast("Your change successfully saved");
        }
    });
}
</script>