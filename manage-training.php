<?php
     
    require_once("include/header.php");
    include_once('include/session.php');
	include_once('include/connection.php');

    $processFile = 'training-process.php';
?>

<div class="wrapper">
    <div class="page-content">
        <!--new breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-file-font"></em><?php echo " "; echo _Training;?></div>
                <!-- <div class="ps-3 text-end w-50"> </div> -->
        </div>
        
        <div class="main-title card p-2" >
            <div class="d-flex align-items-center">
                <h3 class="mb-0 text-success"><?php echo TITLE_TRAINING." "._Management; ?></h3>
                <div class="ms-auto position-relative">
                    <div class="dropdown d-inline d-none" id="bulk_training">
                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo "Bulk Action"; ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li onClick="statusUpdate('enable', 'training_ids', '<?php echo $processFile;?>')"><a class="dropdown-item" href="#"><?php echo "Enable"; ?>
                                </a>
                            </li>
                            <li onClick="statusUpdate('disable', 'training_ids', '<?php echo $processFile;?>')"><a class="dropdown-item" href="#"><?php echo "Disable"; ?></a>
                            </li>
                        </ul>
                    </div>
                    <span > <button  class="btn bg-primary text-light" data-bs-toggle="modal" data-bs-target="#add_training_modal"><?php echo BTN_ADD_TRAINING; ?></button> </span>
                </div>
            </div>
        </div>
    
        <div class="content card card-body">

            <!-- Start Content-->
            <div class="container-fluid" >
                <?php if(!isset($_GET['id'])){ ?>
                    <div class="table-responsive mt-3">
                        <table class="table align-middle table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox" class="checkbox" id="trainingCheckAll">
                                    </th>
                                    <th>No</th>
                                    <th>Training</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM training order by training_id desc";
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute();
                                
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                for($i=0;$i<count($result);$i++){
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" value="<?php echo $result[$i]["training_id"]; ?>" name="training_ids" class="checkbox training_check">        
                                    </td>
                                    <td><?php echo $i+1 ?></td>
                                    <td> <?php echo $result[$i]['title']; ?> </td>
                                    <?php
                                        $sql1 = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(training_time))) AS totaltime FROM topic where training_id = '".$result[$i]['training_id']."' ";
                                        $stmt1 = $dbh->prepare($sql1);
                                        $stmt1->execute();
                                        
                                        $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <td><?php echo $result[$i]['assign_status'] == 0 ? "Inactive" : "Active"; ?></td>
                                    <td><?php echo $result1[0]['totaltime']; ?></td>
                                    <td>
                                        <i class="bi bi-people btn btn-sm btn-outline-primary" title="Assign department" data-bs-toggle="modal" data-bs-target="#departmentmodal" data-id=<?php echo $result[$i]['training_id'] ?>></i>
                                        <i class="bi bi-person-plus btn btn-sm btn-outline-primary" title="Assign Training" data-bs-toggle="modal" data-bs-target="#usermodal" data-trainingid=<?php echo $result[$i]['training_id'] ?>></i>
                                        <a href="index.php?page=topic&id=<?php echo $result[$i]['training_id'] ?>"><i title="View Topic" class="bi bi-eye-fill btn btn-sm btn-outline-primary"></i></a>
                                        <i class="bi bi-plus btn btn-sm btn-outline-primary" title="Add Topic" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="createModalAdd(<?php echo $result[$i]['training_id'] ?>)"></i>
                                        <i class="bi bi-pencil-fill btn btn-sm btn-outline-primary" title="Edit Training" data-bs-toggle="modal" data-bs-target="#edit_training_modal" data-id=<?php echo $result[$i]['training_id'] ?> data-title='<?php echo $result[$i]['title']; ?>' data-status=<?php echo $result[$i]['assign_status'] ?>></i>
                                        <i class="bi bi-trash-fill btn btn-sm btn-outline-danger" title="Delete Training" onclick="deletetraining(<?php echo $result[$i]['training_id'] ?>);"></i>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>
            
            <div id="modal-box-container"> </div>
        
        </div>
    </div>
</div>

    <div class="modal fade" id="add_training_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo BTN_ADD_TRAINING; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body form-body">
                    <form class="mt-20" action="assign-training.php" method="post">
                        <div class="form-group">
                            <label for="option2">Training Title</label>
                            <input type="text" class="form-control form-control-sm" name="title" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Training Assign</label>
                            <select class="form-control form-control-sm" name="training_assign">
                                <option value="0">Not Assign Training</option>
                                <option value="1">Assign Training</option>
                            </select>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo BTN_CLOSE ; ?></button>
                            <button type="submit" class="btn btn-primary" name="add_training" value="Edit_Pro"><?php echo BTN_SAVE ; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_training_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body form-body">
                    <form class="mt-20" action="assign-training.php" method="post">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="option2">Training Title</label>
                            <input type="text" class="form-control form-control-sm" name="title" value="" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Training Assign</label>
                            <select class="form-control form-control-sm" name="training_assign">
                                <option value="0">Not Assign Training</option>
                                <option value="1">Assign Training</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo BTN_CLOSE ; ?></button>
                            <button type="submit" class="btn btn-primary" name="edit_training" value="Edit_Pro"><?php echo BTN_SAVE ; ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="departmentmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Department Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body form-body">
                    <form class="mt-20" action="assign-training.php" method="post">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="Question">Department</label>
                            <!-- <div class="row">
                                <div class="col-xs-5"> -->
                                <?php
                                    $sql = "SELECT DISTINCT department FROM users where department IS NOT NULL";
                                    $stmt = $dbh->prepare($sql);
                                    $stmt->execute();
                                    
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <select name="from[]" id="lstview" class="form-control form-control-sm" size="8" multiple="multiple">
                                    <?php
                                    for($i=0;$i<count($result);$i++)
                                    {
                                        echo "<option value=".$result[$i]['department'].">".$result[$i]['department']."</option>";
                                    }
                                    ?>
                                </select>
                                <!-- </div> -->
                    
                                <!-- <div class="col-xs-2"> -->
                                <button type="button" id="lstview_undo" class="btn btn-danger btn-block">undo</button>
                                <button type="button" id="lstview_rightAll" class="btn btn-default btn-block"><i class="bi bi-chevron-double-right"></i></button>
                                <button type="button" id="lstview_rightSelected" class="btn btn-default btn-block"><i class="bi bi-chevron-right"></i></button>
                                <button type="button" id="lstview_leftSelected" class="btn btn-default btn-block"><i class="bi bi-chevron-left"></i></button>
                                <button type="button" id="lstview_leftAll" class="btn btn-default btn-block"><i class="bi bi-chevron-double-left"></i></button>
                                <button type="button" id="lstview_redo" class="btn btn-warning btn-block">redo</button>
                                <!-- </div> -->
                    
                                <!-- <div class="col-xs-5"> -->
                                <select name="to[]" id="lstview_to" class="form-control form-control-sm" size="8" multiple="multiple"></select>
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                        <div class="form-group">
                            <label for="option1">Start Date</label>
                            <input type="date" class="form-control form-control-sm" name="start_date" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="option2">End Date</label>
                            <input type="date" class="form-control form-control-sm" name="end_date" value="" required>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo BTN_CLOSE ; ?></button>
                            <button type="submit" class="btn btn-primary" onclick="displayLoader();" name="assign_department" value="Edit_Pro">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="usermodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign Training</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body form-body">
                    <form class="mt-20" action="assign-training.php" method="post">
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="Question">Users</label>
                            <!-- <div class="row">
                                <div class="col-xs-5"> -->
                                <?php
                                
                                $sql = "SELECT id,concat(first_name,' ',last_name) AS name FROM users ";
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute();
                                
                                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                ?>
                                <select name="from[]" id="lstview1" class="form-control form-control-sm" size="8" multiple="multiple">
                                    <?php
                                    for($i=0;$i<count($result);$i++)
                                    {
                                        echo "<option value=".$result[$i]['id'].">".$result[$i]['name']."</option>";
                                    }
                                    ?>
                                </select>
                                <!-- </div> -->

                                <!-- <div class="col-xs-2"> -->
                                <button type="button" id="lstview1_undo" class="btn btn-danger btn-block">undo</button>
                                <button type="button" id="lstview1_rightAll" class="btn btn-default btn-block"><i class="bi bi-chevron-double-right"></i></button>
                                <button type="button" id="lstview1_rightSelected" class="btn btn-default btn-block"><i class="bi bi-chevron-right"></i></button>
                                <button type="button" id="lstview1_leftSelected" class="btn btn-default btn-block"><i class="bi bi-chevron-left"></i></button>
                                <button type="button" id="lstview1_leftAll" class="btn btn-default btn-block"><i class="bi bi-chevron-double-left"></i></button>
                                <button type="button" id="lstview1_redo" class="btn btn-warning btn-block">redo</button>
                                <!-- </div> -->
                        
                                <!-- <div class="col-xs-5"> -->
                                <select name="to[]" id="lstview1_to" class="form-control form-control-sm" size="8" multiple="multiple"></select>
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>
                        <div class="form-group">
                            <label for="option1">Start Date</label>
                            <input type="date" class="form-control form-control-sm" name="start_date" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="option2">End Date</label>
                            <input type="date" class="form-control form-control-sm" name="end_date" value="" required>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo BTN_CLOSE ; ?></button>
                            <button type="submit" class="btn btn-primary" onclick="displayLoader();" name="assign_user" value="Edit_Pro">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    $('#usermodal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('trainingid');
    $(e.currentTarget).find('input[name="id"]').val(id);

});
    $('#departmentmodal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    $(e.currentTarget).find('input[name="id"]').val(id);

});
    $('#edit_training_modal').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    var title = $(e.relatedTarget).data('title');
    var status = $(e.relatedTarget).data('status');
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="title"]').val(title);
    $(e.currentTarget).find('select[name="training_assign"]').val(status);

});

$(document).ready(() => {
    bulkAction('#trainingCheckAll', '.training_check', '#bulk_training');
});

function deletetraining(id)
{
    let data_arr={ id: id };
    $.ajax({
        method: 'POST',
        url: './domain/index.php?page=delete-training',
        data: data_arr,
        success: function(res) {
            if (res == "Deleted") {
                success_toast("Successfully Deleted Data");
                location.reload();
            } else {
                error_toast("Something went wrong!!");
            }
        },
        error: function(res) {
            console.log(res);
        },
    });
}

</script>