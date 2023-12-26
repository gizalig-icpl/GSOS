<?php
require_once("./include/config.php");
require_once("./include/header.php");
require_once("./include/session.php");
require_once("./include/pagination.php"); 

// Set some useful configuration 
$limit = pagination_list()[0]; 
$offset = 0;
$processFile = './domain/user-process.php';

// Count of all records 
if($_SESSION['id']==1){
    $query = "SELECT COUNT(*) as rowNum FROM users"; 
}
else{
    $query = "SELECT COUNT(*) as rowNum FROM users where org_id=$_SESSION[id]"; 
}
$stmt = $dbh->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rowCount= $data[0]['rowNum']; 

// Initialize pagination class 
$pagConfig = array( 
    'totalRows' => $rowCount, 
    'perPage' => $limit, 
    'contentDiv' => 'dataContainer', 
    'link_func' => 'columnSorting' 
); 
$pagination =  new Pagination($pagConfig); 

// Fetch records based on the limit 
if($_SESSION['id']==1){
    $query = $dbh->query("SELECT * FROM users ORDER BY created DESC LIMIT $offset, $limit"); 
}
else{
    $query = $dbh->query("SELECT * FROM users where org_id=$_SESSION[id] ORDER BY created DESC LIMIT $offset, $limit"); 
}

$role=array(0=>"User",1=>"Admin",2=>"Compliance",3=>"Reviewer",4=>"Approver",5=>"Project Manager",6=>"Project Member",7=>"Temp User",8=>"Blogger",9=>"Auditor");
$status=array(1=>'Active',0=>'Inactive');
$is_test=array(1=>'Live',0=>'Test');
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
                    <!-- <div class="fs-5"><em class="bi bi-person-lines-fill"></em>
                        <?php //echo _User; ?>
                    </div> -->
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-person-lines-fill"></i>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo _User; ?></li> -->

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
                    <div class="d-flex align-items-center">
                        <h2 class="text-success">
                            <em class="bi bi-person-lines-fill"></em> <?php echo _User_Management; ?>
                        </h2>
                        <div class="ms-auto position-relative">
                            
                            <div class="dropdown d-inline d-none" id="bulk_user">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo "Bulk Action"; ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li onClick="statusUpdate('enable', 'user_ids', '<?php echo $processFile;?>')"><a class="dropdown-item" href="#"><?php echo "Enable"; ?>
                                        </a>
                                    </li>
                                    <li onClick="statusUpdate('disable', 'user_ids', '<?php echo $processFile;?>')"><a class="dropdown-item" href="#"><?php echo "Disable"; ?></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="dropdown d-inline">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo _User; ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#createModal" onClick="createModalAdd()"
                                            href="#">
                                            <?php echo _Add;
                                            echo "-";
                                            echo _User; ?>
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="import-user.php">
                                            <?php echo _Import;
                                            echo "-";
                                            echo _User; ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- <button data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#createModal" onClick="createModalAdd()">Add User</button> -->
                            <!--<form class="">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                            </form>-->
                        </div>
                    </div>
                </div>
                <!-- end new theme-->

                <!-- <div class="search-panel">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control form-control-sm" id="keywords" placeholder="Type keywords..." onkeyup="searchFilter();">
                        </div>
                        <div class="form-group col-md-4">
                            <select class="form-control form-control-sm" id="filterBy">
                                <option value="">Filter by Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div> -->

                <div class="card card-body">
                <div class="d-flex align-items-center">
                    <!-- <h5 class="mb-0"><?php echo _User; ?></h5> -->
                        <?php echo pagination(); ?>
                    <!-- <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><em
                                class="bi bi-search"></em></div>
                        <input class="form-control ps-5" type="text" placeholder="search" onkeyup="search(this.value);">
                    </div> -->
                </div>
                <div class="table-responsive mt-3">

                <table class="table align-middle table-hover sortable">
                    <thead class="table-secondary">
                            <tr>
                                <th scope="col" rowspan="2">
                                    <input type="checkbox" class="form-check-input" id="userCheckAll">
                                </th>
                                <th scope="col" rowspan="2">
                                    ID
                                </th>
                                <th scope="col" class="sorting" coltype="first_name" colorder="">First Name</th>
                                <th scope="col" class="sorting" coltype="last_name" colorder="">Last Name</th>
                                <th scope="col" class="sorting" coltype="email" colorder="">Email</th>
                                <th scope="col" class="sorting" coltype="created" colorder="">Created</th>
                                <th scope="col" class="sorting" coltype="last_login" colorder="">Last Login</th>
                                <th scope="col" class="sorting" coltype="role" colorder="">Role</th>
                                <th scope="col" class="sorting" coltype="location" colorder="">Location</th>
                                <th scope="col" class="sorting" coltype="status" colorder="">Status</th>
                                <th scope="col" class="sorting" coltype="is_test" colorder="">User Type</th>
                                <th scope="col" rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th><input class="form-control filtering" scope="col" coltype="first_name" type="text" value="" ></th>
                                <th><input class="form-control filtering" scope="col" coltype="last_name" type="text" value=""></th>
                                <th><input class="form-control filtering" scope="col" coltype="email" type="text" value=""></th>
                                <th>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" id="created_filter_range_date" aria-haspopup="true" aria-expanded="false">
                                        Select Date
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="auth_items">
                                            <li class="dropdown-item">
                                            Start Date
                                            <input class="form-control filtering" scope="col" coltype="created" type="date" value="" id="created_start">
                                            </li>
                                            <li class="dropdown-item">
                                                End Date
                                            <input class="form-control filtering" scope="col" coltype="created" type="date" value="" id="created_end">
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                </th>
                                <th>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" id="last_login_filter_range_date" aria-haspopup="true" aria-expanded="false">
                                        Select Date
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="auth_items">
                                            <li class="dropdown-item">
                                            Start Date
                                            <input class="form-control filtering" scope="col" coltype="last_login" type="date" value="" id="last_login_start">
                                            </li>
                                            <li class="dropdown-item">
                                                End Date
                                            <input class="form-control filtering" scope="col" coltype="last_login" type="date" value="" id="last_login_end">
                                            </li>
                                        </div>
                                    </div>
                                </div>
                                </th>
                                <th><select class="form-control filtering" scope="col" coltype="role" value="">
                                    <option value="">-- Select --</option>
                                    <?php
                                        foreach ($role as $key => $value) {
                                            echo '<option value="' . $key . '">' . $value . '</option>';
                                        }
                                    ?>
                                </select></th>
                                <th><input class="form-control filtering" scope="col" coltype="location" type="text" value=""></th>
                                <th><select class="form-control filtering" scope="col" coltype="status" value="">
                                    <option value="">-- Select --</option>
                                    <?php
                                        foreach ($status as $key => $value) {
                                            echo '<option value="' . $key . '">' . $value . '</option>';
                                        }
                                    ?>
                                </select></th>
                                <th><select class="form-control filtering" scope="col" coltype="is_test" value="">
                                    <option value="">-- Select --</option>
                                    <?php
                                        foreach ($is_test as $key => $value) {
                                            echo '<option value="' . $key . '">' . $value . '</option>';
                                        }
                                    ?>
                                </select></th>
                            </tr>
                        </thead>

                        <tbody id="dataContainer">
                        <?php 
                        if($query->rowCount() > 0){
                            $i = 1; 
                            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $key => $row){    
                        ?>
                            <tr>
                                <th scope="row">
                                    <?php if($row['id']!=1 || $_SESSION['id']!=$row['id']){?><input type="checkbox" value="<?php echo $row["id"]; ?>" name="user_ids" class="form-check-input user_check"><?php } ?>
                                </th>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row["first_name"]; ?></td>
                                <td><?php echo $row["last_name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo date(config('date_time','date_format')." ".config('date_time','time_format'),strtotime($row["created"])); ?></td>
                                <td><?php echo ($row["last_login"])?date(config('date_time','date_format')." ".config('date_time','time_format'),strtotime($row["last_login"])):"never" ?></td>
                                <td><?php echo $role[$row['role']]; ?></td>
                                <td><?php echo $row['location']; ?></td>
                                <td>
                                    <?php 
                                        $checked = ($row["status"] == 1)?'checked':''; 
                                        $disable = ($row["id"] == $_SESSION['id'])?'disabled':'';
                                        $disabled = ($row['role'] == 1)?'disabled':'';
                                        $status = ($row['status'] == 1)?0:1;
                                    ?>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" <?php echo $checked; ?>  <?php echo $disable; ?> onclick="singleStatusUpdate(<?php echo $row['id']; ?>,'<?php echo $status; ?>','<?php echo $processFile;?>')">
                                    </div>
                                </td>
                                <td><?php echo ($row["is_test"] == 1)?'Live':'Test'; ?></td>
                                <td>
                            <button type="button" onClick="changepassword(<?php echo $row["id"]; ?>)" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModel" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change Password">
                                <i class="bi bi-lock-fill"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModel" onClick="getUsers(<?php echo $row["id"]; ?>,'createModal')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update User">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button data-test-id="delete_user" <?php echo $disabled; ?> type="button"  class="btn btn-sm btn-outline-danger" onClick="deleteUser(<?php echo $row["id"]; ?>,<?php echo $row["role"]; ?>);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" >
                            <i class="bi bi-trash-fill"></i>
                            </button>
                            
                             <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModel" onClick="getUsers(<?php echo $row["id"]; ?>,'settingUser')" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update User Authorization">
                                <i class="lni lni-user"></i>
                            </button>
                             <button type="button" class="btn btn-sm btn-outline-primary" onClick="mailUser(<?php echo $row["id"]; ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Invitation Mail">
                                <i class="bi bi-envelope"></i>
                            </button>
                             <button data-test-id="user_panel" type="button" class="btn btn-sm btn-outline-primary"  onClick="userPanel(<?php echo $row["id"]; ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="User Panel">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModel" onClick="getUsersinfo(<?php echo $row["id"]; ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update User">
                                <i class="bi bi-info-lg"></i>
                            </button>
                        </td>
                            </tr>
                        <?php 
                            } 
                        ?>
                        <tr>
                                <td colspan="50%">
                                <?php echo $pagination->createLinks(); ?>
                                </td>
                            </tr>
                        <?php
                        }else{ 
                            echo '<tr><td colspan="6">No records found...</td></tr>'; 
                        } 
                        ?>
                    </tbody>
                </table>

                <!-- Display pagination links -->

                </div>

                <div id="modal-box-container">

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

<!-- Right Sidebar -->



<script>
function columnSorting(page_num){
    page_num = page_num?page_num:0;
	
    let coltype='',colorder='',classAdd='',classRemove='';
    let perpage=$('#show-entries').children("option:selected").val();
    $( "th.sorting" ).each(function() {
        if($(this).attr('colorder') != ''){
            coltype = $(this).attr('coltype');
            colorder = $(this).attr('colorder');
			
            if(colorder == 'asc'){
                classAdd = 'asc';
                classRemove = 'desc';
            }else{
                classAdd = 'desc';
                classRemove = 'asc';
            }
        }
    });
    
    $.ajax({
        type: 'POST',
        url: 'domain/user-process.php',
        data:'page='+page_num+'&coltype='+coltype+'&colorder='+colorder+'&perpage='+perpage+'&action=list',
        beforeSend: function () {
            //displayLoader();
        },
        success: function (html) {
            $('#dataContainer').html(html);
            
            if(coltype != '' && colorder != ''){
                $( "th.sorting" ).each(function() {
                    if($(this).attr('coltype') == coltype){
                        $(this).attr("colorder", colorder);
                        $(this).removeClass(classRemove);
                        $(this).addClass(classAdd);
                    }
                });
            }
            
            //hideLoader();
        }
    });
}


function search(value){
    page_num=0;
    let coltype='',colorder='',classAdd='',classRemove='';
    let perpage=$('#show-entries').children("option:selected").val();
    $( "th.sorting" ).each(function() {
        if($(this).attr('colorder') != ''){
            coltype = $(this).attr('coltype');
            colorder = $(this).attr('colorder');
			
            if(colorder == 'asc'){
                classAdd = 'asc';
                classRemove = 'desc';
            }else{
                classAdd = 'desc';
                classRemove = 'asc';
            }
        }
    });
    
    $.ajax({
        type: 'POST',
        url: 'domain/user-process.php',
        data:'page='+page_num+'&coltype='+coltype+'&colorder='+colorder+'&perpage='+perpage+'&action=search&value='+value,
        beforeSend: function () {
            //displayLoader();
        },
        success: function (html) {
            $('#dataContainer').html(html);
            
            if(coltype != '' && colorder != ''){
                $( "th.sorting" ).each(function() {
                    if($(this).attr('coltype') == coltype){
                        $(this).attr("colorder", colorder);
                        $(this).removeClass(classRemove);
                        $(this).addClass(classAdd);
                    }
                });
            }
            
            //hideLoader();
        }
    });
}
function filter(){
    page_num=0;
    let coltype='',colorder='',classAdd='',classRemove='';
    let perpage=$('#show-entries').children("option:selected").val();
    value=filtering();
    $.ajax({
        type: 'POST',
        url: 'domain/user-process.php',
        data:'page='+page_num+'&coltype='+coltype+'&colorder='+colorder+'&perpage='+perpage+'&action=filter&value='+JSON.stringify(value),
        beforeSend: function () {
            //displayLoader();
        },
        success: function (html) {
            $('#dataContainer').html(html);
            
            if(coltype != '' && colorder != ''){
                $( "th.sorting" ).each(function() {
                    if($(this).attr('coltype') == coltype){
                        $(this).attr("colorder", colorder);
                        $(this).removeClass(classRemove);
                        $(this).addClass(classAdd);
                    }
                });
            }
            
            //hideLoader();
        }
    });
}

const getUsers = (id,modal) => {
    $.ajax({
        method: 'POST',
        url: './domain/fetch-users.php',
        data: { action: 'fetch',id:id },
        success: function (res) {
            let response = JSON.parse(res)
            data = response[0]
            previlege = response[1]
            if(modal=="settingUser")
            {
                settingUser(id)
            }
            if(modal=="createModal")
            {
                createModal(id)
            }
        },
        error: function (res) { },
    });
}
const getUsersinfo = (id) => {
    $.ajax({
        method: 'POST',
        url: './domain/fetch-users.php',
        data: { action: 'fetch-info',id:id },
        success: function (res) {
                infoUser(res)

        },
        error: function (res) { },
    });
}

const getDepartment = () => {
    $.ajax({
        method: 'POST',
        url: './domain/fetch-dept.php',
        data1: { action: 'fetch' },
        success: function (res1) {
            let response = JSON.parse(res1)
            data1 = response[0]
        },
        error: function (res1) { },
    });
}

const getDepartment1 = () => {
    $.ajax({
        method: 'POST',
        url: './domain/fetch-dept.php',
        data1: { action: 'fetch' },
        success: function (res1) {
            let response = JSON.parse(res1)
            data2 = response[0]
        },
        error: function (res1) {
            console.log(res1);
        },
    });
}


$(document).ready(() => {
    getDepartment();
    getDepartment1();

    bulkAction('#userCheckAll', '.user_check','#bulk_user');
    
});


let depthtml = '';

function changepassword(id) {
    //console.log(depthtml)
    let html = `
    <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="createModelUpdateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            </div>
            <form id="info-form">
                <div class="modal-body">
                <label class="form-label">Please change temporary password and login with new password.</label>   
                <div class="form-group m-0" style="position: relative;">
                    <label class="form-label">Password</label>&nbsp
                    <span data-bs-toggle="tooltip" data-bs-placement="right" title="The password should be at least 8 characters long.&#010;The password should contain at least one uppercase letter.&#010;The password should contain at least one lowercase letter.&#010;The password should contain at least one special character.The password should contain at least one one number."><i class="bi bi-info-circle-fill"></i></span>
                    <input data-test-id="password1" id="password" onkeyup="passwordStrength(this.value,${id},true)" class="form-control form-control-sm" type="password" placeholder="Password" autocomplete="off"> 
                </div>
                <div class="progress" id="passwordDescription"></div>
                <div class="form-group m-0" style="position: relative;">
                    <label class="form-label">Comfirm Password</label>
                    <input data-test-id="password2" id="confirm_password" onkeyup="passwordStrength(this.value,${id},false)" class="form-control form-control-sm" type="password" placeholder="Password" name="confirm_password" autocomplete="off"> 
                </div>
                </div>
                </form>
                <div class="modal-footer" id="changepassword2">
                    <input type="button" name="close" class="btn btn-primary" data-bs-dismiss="modal" value="close">
                    <input type="submit" name="changepassword2" disabled onClick="change(${id})" class="btn btn-primary" value="change">
                    <!-- <button type="button" name="changepass" class="btn btn-primary">change</button> -->
                </div>
            
        </div>
    </div>
</div>
                
            `;

    $("#modal-box-container").html("");
    $("#modal-box-container").html(html);
    let myModal = new bootstrap.Modal(document.getElementById('changepassword'), {});
    myModal.show();
}

function createModal(id) {
    //console.log(depthtml)
    let html = `
            <div class="modal fade" id="createModelUpdate" tabindex="-1" role="dialog" aria-labelledby="createModelUpdateLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModelUpdateLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                <form id="info-form">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control form-control-sm" id="firstname" placeholder="John" value="${data[0]['first_name']}" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control form-control-sm" id="lastname" placeholder="Dow" value="${data[0]['last_name']}"required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control form-control-sm" id="email" placeholder="name@example.com" value="${data[0]['email']}" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role Type</label>
                        <select class="form-control form-control-sm" id="role">
                            <option value="0" ${(data[0]['role'] == 0 ? "selected" : "")}>User</option>
                            <option value="1" ${(data[0]['role'] == 1 ? "selected" : "")}>Admin</option>
							<option value="2" ${(data[0]['role'] == 2 ? "selected" : "")}>Compliance</option>
							<option value="3" ${(data[0]['role'] == 3 ? "selected" : "")}>Reviewer</option>
							<option value="4" ${(data[0]['role'] == 4 ? "selected" : "")}>Approver</option>
							<option value="5" ${(data[0]['role'] == 5 ? "selected" : "")}>Project Manager</option>
							<option value="6" ${(data[0]['role'] == 6 ? "selected" : "")}>Project Member</option>
                            <option value="7" ${(data[0]['role'] == 7 ? "selected" : "")}>Temp User</option>
							<option value="5" ${(data[0]['role'] == 8 ? "selected" : "")}>Blogger</option>
							<option value="6" ${(data[0]['role'] == 9 ? "selected" : "")}>Auditor</option>
                        </select>
                    </div>
                    <div class="form-group">
                <label for="status">Status</label>
                <select class="form-select form-select-sm" id="status">
                    <option value="0" ${(data[0]['status'] == 0 ? "selected" : "")}>Inactive</option>
                    <option value="1" ${(data[0]['status'] == 1 ? "selected" : "")}>Active</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">User Type</label>
                <select class="form-select form-select-sm" id="type">
                    <option value="0" ${(data[0]['is_test'] == 0 ? "selected" : "")}>Test</option>
                    <option value="1" ${(data[0]['is_test'] == 1 ? "selected" : "")}>Live</option>
                </select>
            </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onClick="updateInfo(${id})"><?php echo SAVE_CHANGES; ?></button>
                </div>
                </div>
            </div>
            </div>
                
            `;

    $("#modal-box-container").html("");
    $("#modal-box-container").html(html);
    let myModal = new bootstrap.Modal(document.getElementById('createModelUpdate'), {});
    myModal.show();
}

function settingUser(id) {
    let pr = previlege.filter(obj => obj.user_id == id)
    // console.log(pr)
    for (let i = 0; i < data1.length; i++) {
        depthtml += "<option value='" + data1[i]['dep'] + "' " + (data[id]['department'] == data1[i]['dep'] ? 'selected' : '') + ">" + data1[i]['dep'] + "</option>";

    }
    quiz = 0;
    security = 0;
    tabletop = 0;
    compliance = 0;
    simplerisk = 0;
    if (data[0]['authorization'] != null) {
        let auth = JSON.parse(data[0]['authorization']);
        quiz = auth['Quiz'];
        security = auth['Security'];
        tabletop = auth['Tabletop'];
        compliance = auth['Compliance'];
        simplerisk = auth['Simplerisk'];
    }
    //console.log(depthtml)
    let html = `
            <div class="modal fade" id="createModelSetting" tabindex="-1" role="dialog" aria-labelledby="createModelSettingLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModelSettingLabel">User Authorization</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>
                        <div class="modal-body">
                            <form id="info-form">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Privilege</label><br/>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="multiSelectPriv" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select Privilege(s)
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="multiSelectPriv">
                                            <div class="priv_search">
                                                <input type="text" placeholder="Search Privilege(s)">
                                            </div>
                                            <p id="privCheckAll">Select All</p>
                                            <div class="priv_items">
                                                <li class="dropdown-item">
                                                    <input type="checkbox" name="privilege" id="privilege1" class="form-check-input" value="vision" ${pr.find(obj => obj.privilege == "vision" && obj.status == 1) ? "checked" : ""} > Vission & Mission
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" name="privilege" id="privilege3" class="form-check-input" value="Enterprise" ${pr.find(obj => obj.privilege == "Enterprise" && obj.status == 1) ? "checked" : ""}> Enterprise Assessment
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" name="privilege" id="privilege4" class="form-check-input" value="Polices" ${pr.find(obj => obj.privilege == "Polices" && obj.status == 1) ? "checked" : ""}> Polices Procedure
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" name="privilege" id="privilege5" class="form-check-input" value="Awarness" ${pr.find(obj => obj.privilege == "Awarness" && obj.status == 1) ? "checked" : ""}> Awarness
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" name="privilege" id="privilege6" class="form-check-input" value="War" ${pr.find(obj => obj.privilege == "War" && obj.status == 1) ? "checked" : ""}> War Game
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" name="privilege" id="privilege7" class="form-check-input" value="Quiz" ${pr.find(obj => obj.privilege == "Quiz" && obj.status == 1) ? "checked" : ""}> Quiz
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" name="privilege" id="privilege8" class="form-check-input" value="Project" ${pr.find(obj => obj.privilege == "Project" && obj.status == 1) ? "checked" : ""}> Project Management
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Authorization</label><br>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="multiSelectAuth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select Authorization(s)
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="multiSelectAuth">
                                            <div class="auth_search">
                                                <input type="text" placeholder="Search Authorization(s)">
                                            </div>
                                            <p id="authCheckAll">Select All</p>
                                            <div class="auth_items">
                                                <li class="dropdown-item">
                                                    <input type="checkbox" class="form-check-input" ${(compliance == 1 ? "checked" : "")} name="authorization11" id="authorization111" value="1"> Compliance
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" class="form-check-input" ${(simplerisk == 1 ? "checked" : "")} name="authorization11" id="authorization211" value="1"> Simplerisk
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" class="form-check-input" ${(security == 1 ? "checked" : "")} name="authorization11" id="authorization311" value="1"> Security
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" class="form-check-input" ${(quiz == 1 ? "checked" : "")} name="authorization11" id="authorization411" value="1"> Quiz
                                                </li>
                                                <li class="dropdown-item">
                                                    <input type="checkbox" class="form-check-input" ${(tabletop == 1 ? "checked" : "")} name="authorization11" id="authorization511" value="1"> Table Top Exercise
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control form-control-sm" id="designation" placeholder="Designation" value="${data[0]['desig']}">
                                </div>
                                <div class="form-group">
                                    <label for="emp_id">Employee ID</label>
                                    <input type="text" class="form-control form-control-sm" id="emp_id" placeholder="Employee ID" value="${data[0]['emp_id']}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="Department">Department</label>
                                    <select class="form-control form-control-sm" id="department">
                                            ` + depthtml + `
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control form-control-sm" id="location" placeholder="Location" value="${data[0]['location']}">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onClick="updateAuthInfo(${id})"><?php echo SAVE_CHANGES; ?></button>
                        </div>
                    </div>
                </div>
            </div>
            `;

    $("#modal-box-container").html("");
    $("#modal-box-container").html(html);
    let AuthModel = new bootstrap.Modal(document.getElementById('createModelSetting'), {});
    AuthModel.show();
    // console.log("setting Model");

    $(document).on('focus', '.dropdown', function(){
        let $authchecked = $('#info-form .auth_items li input:checked').length;
        let $authtotalinputs = $('#info-form .auth_items li input').length;
        $('#authCheckAll').text($authchecked == $authtotalinputs ? 'Unselect All' : 'Select All');
        let $privchecked = $('#info-form .priv_items li input:checked').length;
        let $privtotalinputs = $('#info-form .priv_items li input').length;
        $('#privCheckAll').text($privchecked == $privtotalinputs ? 'Unselect All' : 'Select All');
    });

    $('#info-form .auth_search input').on('keyup', function(){
        let value = $(this).val().toLowerCase();
        $('#info-form .auth_items li').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    });

    $('#info-form .auth_items li input').on('change', function(){
        let $checked = $('#info-form .auth_items li input:checked').length;
        let $totalinputs = $('#info-form .auth_items li input').length;
        $('#multiSelectAuth').text($checked > 0 ? $checked + ' selected' : 'Select Authorization(s)');
        $('#authCheckAll').text($checked == $totalinputs ? 'Unselect All' : 'Select All');
    })

    $('#info-form #authCheckAll').on('click', function(){
        let $checked = $('#info-form .auth_items li input:checked').length;
        let $totalinputs = $('#info-form .auth_items li input').length;
        let $selectAllText = $checked == 0 ? 'Unselect All' : 'Select All';

        $('#info-form .auth_items li input').prop('checked', $checked == 0);
        $checked = $('#info-form .auth_items li input:checked').length;
        $('#multiSelectAuth').text($checked > 0 ? $checked + ' selected' : 'Select Authorization(s)');
        $(this).text($selectAllText);

        $(this).closest('.dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
    });

    $('#info-form .priv_search input').on('keyup', function(){
        let value = $(this).val().toLowerCase();
        $('#info-form .priv_items li').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    });

    $('#info-form .priv_items li input').on('change', function(){
        let $checked = $('#info-form .priv_items li input:checked').length;
        let $totalinputs = $('#info-form .priv_items li input').length;
        $('#multiSelectPriv').text($checked > 0 ? $checked + ' selected' : 'Select Privilege(s)');
        $('#privCheckAll').text($checked == $totalinputs ? 'Unselect All' : 'Select All');
    })

    $('#info-form #privCheckAll').on('click', function(){
        let $checked = $('#info-form .priv_items li input:checked').length;
        let $totalinputs = $('#info-form .priv_items li input').length;
        let $selectAllText = $checked == 0 ? 'Unselect All' : 'Select All';

        $('#info-form .priv_items li input').prop('checked', $checked == 0);
        $checked = $('#info-form .priv_items li input:checked').length;
        $('#multiSelectPriv').text($checked > 0 ? $checked + ' selected' : 'Select Privilege(s)');
        $(this).text($selectAllText);

        $(this).closest('.dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
    });
    
}
function infoUser(id) {
    
    let html = `
            <div class="modal fade" id="createModelInfo" tabindex="-1" role="dialog" aria-labelledby="createModelSettingLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModelSettingLabel">User Info</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                        </div>
                        <div class="modal-body overflow-auto">
                        <table class="table align-middle" id="war-game-sim-list">
                            <thead class="table-secondary">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Attempted Question</th>
                                    <th>CORRECT ANSWER</th>
                                    <th>Status</th>
                                    <th>Certificate</th>
                                    <th>Review</th>
                                </tr>
                            </thead>
                            <tbody>
                            ` + id + `
                            </tbody>
                        </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            `;

    $("#modal-box-container").html("");
    $("#modal-box-container").html(html);
    let AuthModel = new bootstrap.Modal(document.getElementById('createModelInfo'), {});
    AuthModel.show();
    // console.log("setting Model");
    
}

let depthtml1 = '';
function createModalAdd() {
    for (let i = 0; i < data2.length; i++) {
        depthtml1 += "<option value='" + data2[i]['dep'] + "'>" + data2[i]['dep'] + "</option>";

    }
    let html = `
            <div class="modal fade" id="createModelAdd" tabindex="-1" role="dialog" aria-labelledby="createModelAddLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModelLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                <form id="info-form" onsubmit="displayLoader();addInfo()">
                <div id="tokenHide">
                    <div class="form-group pt-2">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control form-control-sm" id="firstname1" placeholder="First Name" required>
                    </div>
                    <div class="form-group pt-2">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control form-control-sm" id="lastname1" placeholder="Last Name" required>
                    </div>
                    <div class="form-group pt-2">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control form-control-sm" id="exampleFormControlInput2" placeholder="Email" required>
                    </div>
					<div class="form-group pt-2">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" class="form-control form-control-sm" id="pwd" placeholder="Password" required>
                    </div>
                    </div>
                    <div class="form-group pt-2">
                        <label for="exampleFormControlSelect1">Role Type</label>
                        <select class="form-control form-control-sm" onchange="displayToken('tokenHide', this)" id="exampleFormControlSelect2" required>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
							<option value="2">Compliance</option>
							<option value="3">Reviewer</option>
							<option value="4">Approver</option>
							<option value="5">Project Manager</option>
							<option value="6">Project Member</option>
                            <option value="7">Temp User</option>
							<option value="8">Blogger</option>
							<option value="9">Auditor</option>
                        </select>
                    </div>
                    <div class="form-group pt-2">
                        <label for="exampleFormControlSelect1">Authorization</label><br/>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="multiSelectAuth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Authorization(s)
                            </button>
                            <div class="dropdown-menu" aria-labelledby="multiSelectAuth">
                                <div class="auth_search">
                                    <input type="text" placeholder="Search Authorization(s)">
                                </div>
                                <p id="authCheckAll">Select All</p>
                                <div class="auth_items">
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="authorization1" id="authorization11" value="1">
                                        Compliance
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="authorization1" id="authorization21" value="1">
                                        Simplerisk
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="authorization1" id="authorization31" value="1">
                                        Security
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="authorization1" id="authorization41" value="1">
                                        Quiz
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="authorization1" id="authorization51" value="1">
                                        Table Top Exercise
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="form-group pt-2">
                        <label for="designation">Designation</label>
                        <input type="text" class="form-control form-control-sm" id="designation1" placeholder="Designation">
                    </div>
					<div class="form-group pt-2">
                        <label for="emp_id">Employee ID</label>
                        <input type="text" class="form-control form-control-sm" id="emp_id1" placeholder="Employee ID">
                    </div>
					
					<div class="form-group pt-2">
                        <label for="Department">Department</label>
                        <select class="form-control form-control-sm" id="department1">
								` + depthtml1 + `
                        </select>
                    </div>
                    <div class="form-group pt-2">
                        <label for="location">Location</label>
                        <input type="text" class="form-control form-control-sm" id="location" placeholder="Location">
                    </div>
                    <div class="form-group pt-2">
                        <label for="exampleFormControlSelect1">Privilege</label><br/>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="multiSelectPriv" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Privilege(s)
                            </button>
                            <div class="dropdown-menu" aria-labelledby="multiSelectPriv">
                                <div class="priv_search">
                                    <input type="text" placeholder="Search Privilege(s)">
                                </div>
                                <p id="privCheckAll">Select All</p>
                                <div class="priv_items">
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="privilege1" id="privilege11" value="vision"> Vision & Mission
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="privilege1" id="privilege31" value="Enterprise"> Enterprise Assessment
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="privilege1" id="privilege41" value="Polices"> Polices Procedure
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="privilege1" id="privilege51" value="Awarness"> Awarness
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="privilege1" id="privilege61" value="War"> War Game
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="privilege1" id="privilege71" value="Quiz"> Quiz
                                    </li>
                                    <li class="dropdown-item">
                                        <input type="checkbox" class="form-check-input" name="privilege1" id="privilege81" value="Project"> Project Management
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button data-test-id="save_changes" type="submit" class="btn btn-primary"><?php echo SAVE_CHANGES; ?></button>
                </div>
                </form>
                </div>
                
                </div>
            </div>
            </div>

            `;
    $("#modal-box-container").html(html);
    let createModelAdd = new bootstrap.Modal(document.getElementById('createModelAdd'), {});
    createModelAdd.show();

    $('#info-form .auth_search input').on('keyup', function(){
        let value = $(this).val().toLowerCase();
        $('#info-form .auth_items li').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    });

    $('#info-form .auth_items li input').on('change', function(){
        let $checked = $('#info-form .auth_items li input:checked').length;
        let $totalinputs = $('#info-form .auth_items li input').length;
        $('#multiSelectAuth').text($checked > 0 ? $checked + ' selected' : 'Select Authorization(s)');
        $('#authCheckAll').text($checked == $totalinputs ? 'Unselect All' : 'Select All');
    })

    $('#info-form #authCheckAll').on('click', function(){
        let $checked = $('#info-form .auth_items li input:checked').length;
        let $totalinputs = $('#info-form .auth_items li input').length;
        let $selectAllText = $checked == 0 ? 'Unselect All' : 'Select All';

        $('#info-form .auth_items li input').prop('checked', $checked == 0);
        $checked = $('#info-form .auth_items li input:checked').length;
        $('#multiSelectAuth').text($checked > 0 ? $checked + ' selected' : 'Select Authorization(s)');
        $(this).text($selectAllText);

        $(this).closest('.dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
    });

    $('#info-form .priv_search input').on('keyup', function(){
        let value = $(this).val().toLowerCase();
        $('#info-form .priv_items li').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        })
    });

    $('#info-form .priv_items li input').on('change', function(){
        let $checked = $('#info-form .priv_items li input:checked').length;
        let $totalinputs = $('#info-form .priv_items li input').length;
        $('#multiSelectPriv').text($checked > 0 ? $checked + ' selected' : 'Select Privilege(s)');
        $('#privCheckAll').text($checked == $totalinputs ? 'Unselect All' : 'Select All');
    })

    $('#info-form #privCheckAll').on('click', function(){
        let $checked = $('#info-form .priv_items li input:checked').length;
        let $totalinputs = $('#info-form .priv_items li input').length;
        let $selectAllText = $checked == 0 ? 'Unselect All' : 'Select All';

        $('#info-form .priv_items li input').prop('checked', $checked == 0);
        $checked = $('#info-form .priv_items li input:checked').length;
        $('#multiSelectPriv').text($checked > 0 ? $checked + ' selected' : 'Select Privilege(s)');
        $(this).text($selectAllText);

        $(this).closest('.dropdown-menu').on('click', function(e) {
            e.stopPropagation();
        });
    });
}

function change(id) {
    // displayLoader();
    let password = $("#password").val()
    let confirm_password = $("#confirm_password").val()

    let data_obj = {
        info: "password",
        id: id,
        password,
        confirm_password
    }

    $.ajax({
        method: 'POST',
        url: './password-change.php',
        data: data_obj,
        success: function (res) {
            hideLoader();
            if (res == "Inserted") {
                success_toast("Successfully Updated Data");
                $('#changepassword').modal('hide')

            } else {
                error_toast("Something went wrong!!");
            }
        },
        error: function (res) {
            hideLoader();
            console.log(res);
        },
    });

}
function updateInfo(id) {
    let first_name = $("#firstname").val()
    let last_name = $("#lastname").val()
    let email = $("#email").val()
    let role = Number($("#role").val())
    let status = Number($("#status").val())
    let type = Number($("#type").val())
    let token = $("#token").val()
    let date_time_button = $("#date_time_button").val()

    let data_obj = {
        info: "Data",
        id: id,
        first_name,
        last_name,
        email,
        role,
        status,
        type,
        token,
        date_time_button
    }

    $.ajax({
        method: 'POST',
        url: './domain/update-users.php',
        data: data_obj,
        success: function (res) {
            if (res == "Inserted") {
                success_toast("Successfully Updated Data");

                $('#createModelUpdate').modal('hide')
                location.reload();

            } else {
error_toast("Something went wrong!!");
            }
        },
        error: function (res) {
            console.log(res);
        },
    });

}

function updateAuthInfo(id) {
    let vission = ($("#privilege1")[0].checked) ? 1 : 0
    let enterprise = ($("#privilege3")[0].checked) ? 1 : 0
    let polices = ($("#privilege4")[0].checked) ? 1 : 0
    let awarness = ($("#privilege5")[0].checked) ? 1 : 0
    let war = ($("#privilege6")[0].checked) ? 1 : 0
    let quiz = ($("#privilege7")[0].checked) ? 1 : 0
    let project = ($("#privilege8")[0].checked) ? 1 : 0
    let desig = $("#designation").val()
    let department = $("#department").val()
    let location = $("#location").val()
    let emp_id = $("#emp_id").val()
    let compliance = ($("#authorization111")[0].checked) ? 1 : 0
    let simplerisk = ($("#authorization211")[0].checked) ? 1 : 0
    let security = ($("#authorization311")[0].checked) ? 1 : 0
    let quiz1 = ($("#authorization411")[0].checked) ? 1 : 0
    let tabletop = ($("#authorization511")[0].checked) ? 1 : 0
    let token = $("#token").val()
    let date_time_button = $("#date_time_button").val()

    let data_obj = {
        info: "Auth",
        id: id,
        vission,
        enterprise,
        polices,
        awarness,
        war,
        quiz,
        desig,
        department,
        location,
        emp_id,
        project,
        compliance,
        simplerisk,
        security,
        quiz1,
        tabletop,
        token,
        date_time_button
    }

    $.ajax({
        method: 'POST',
        url: './domain/update-users.php',
        data: data_obj,
        success: function (res) {
            if (res == "Inserted") {
                success_toast("Successfully Updated Data");

                $('#createModelSetting').modal('hide')

            } else {
error_toast("Something went wrong!!");
            }
        },
        error: function (res) {
            console.log(res);
        },
    });

}

function addInfo(id) {
    let first_name = $("#firstname1").val()
    let last_name = $("#lastname1").val()
    let email = $("#exampleFormControlInput2").val()
    let role = Number($("#exampleFormControlSelect2").val())
    let vision = ($("#privilege11")[0].checked) ? 1 : 0
    let enterprise = ($("#privilege31")[0].checked) ? 1 : 0
    let polices = ($("#privilege41")[0].checked) ? 1 : 0
    let awarness = ($("#privilege51")[0].checked) ? 1 : 0
    let war = ($("#privilege61")[0].checked) ? 1 : 0
    let quiz = ($("#privilege71")[0].checked) ? 1 : 0
    let project = ($("#privilege81")[0].checked) ? 1 : 0
    let desig = $("#designation1").val()
    let department = $("#department1").val()
    let location = $("#location").val()
    let emp_id = $("#emp_id1").val()
    let pwd = $("#pwd").val()
    let token = $("#token").val()
    let compliance = ($("#authorization11")[0].checked) ? 1 : 0
    let simplerisk = ($("#authorization21")[0].checked) ? 1 : 0
    let security = ($("#authorization31")[0].checked) ? 1 : 0
    let quiz1 = ($("#authorization41")[0].checked) ? 1 : 0
    let tabletop = ($("#authorization51")[0].checked) ? 1 : 0

    let data_obj = {
        first_name,
        last_name,
        email,
        role,
        vision,
        enterprise,
        polices,
        awarness,
        war,
        quiz,
        desig,
        department,
        location,
        emp_id,
        pwd,
        project,
        compliance,
        simplerisk,
        security,
        quiz1,
        tabletop,
        token,
    }

    $.ajax({
        method: 'POST',
        url: './domain/add-users.php',
        data: data_obj,
        success: function (res) {
            if (res == "Inserted") {
                success_toast("Successfully Inserted Data");
                $('#createModelAdd').modal('hide')
                location.reload();
            } else {
                error_toast("Something went wrong!!");
                location.reload();
            }
        },
        error: function (res) {
            error_toast("Something went wrong!!");
        },
    });
}

function deleteUser(id,role){
    swal({
        title: "Are you sure?",
        text: "You want to Delete a User!",
        type: "success",
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        showclosebutton: true
        }).then(function(result){
        if (result.value) {
            displayLoader();
            let data_id = id
            let data_role = role
            let data_arr = { id: data_id,role: data_role }
            if (data_id == sessionId) {
                error_toast("Cannot Delete this user!!");
                return false
            }
            $.ajax({
                method: 'POST',
                url: './domain/delete-users.php',
                data: data_arr,
                success: function (res) {
                    hideLoader()
                    if (res == "Deleted") {
                        success_toast("Successfully Deleted Data");
                        location.reload();
                        var tmpdata = data.filter(function (value) {
                            return value.id != data_id;
                        });
                        data = tmpdata;
                    } else {
                        error_toast("Something went wrong!!");
                    }
                },
                error: function (res) {
                    console.log(res);
                },
            });
            location.reload();
        } else {
            return false;
        }
    });
}
function mailUser(id) {
    swal({
        title: "Are you sure?",
        text: "You want to send an invitation mail!",
        type: "success",
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        showclosebutton: true
        }).then(function(result){
        if (result.value) {
            displayLoader();
            $.ajax({
                method: 'POST',
                url: './domain/invitation-users.php',
                data: {id:id},
                success: function (res) {
                    hideLoader();
                    if (res == "Sendemail") {
                        success_toast("Successfully Send Invitation");
        
                        var tmpdata = data.filter(function (value) {
                            return value.id != data_id;
                        });
                        data = tmpdata;
        
                        
        
        
                    } else {
                        error_toast("Something went wrong!!");
                    }
                },
                error: function (res) {
                    console.log(res);
                },
            });
        } else {
            return false;
        }
    });
    
}
function userPanel(id) {
    swal({
        title: "Are you sure?",
        text: "You want to go to another panel!",
        type: "success",
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        showclosebutton: true
        }).then(function(result){
        if (result.value) {
            displayLoader();
            $.ajax({
                method: 'POST',
                url: './domain/user-panel.php',
                data: {id:id},
                success: function (res) {
                    if (res == "Found") {
                        window.open('index.php?page=dashboard');  
                    } else {
                        error_toast("Something went wrong!!");
                    }
                    hideLoader();
                },
                error: function (res) {
                    console.log(res);
                },
            });
        } else {
            return false;
        }
    });
    
}

function userPanel(id) {
    swal({
        title: "Are you sure?",
        text: "You want to go to another panel!",
        type: "success",
        showCancelButton: true,
        // confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes",
        cancelButtonText: "No",
        closeOnConfirm: false,
        showclosebutton: true
        }).then(function(result){
        if (result.value) {
            displayLoader();
            $.ajax({
                method: 'POST',
                url: './domain/user-panel.php',
                data: {id:id},
                success: function (res) {
                    if (res == "Found") {
                        window.open('index.php?page=dashboard');  
                    } else {
                        error_toast("Something went wrong!!");
                    }
                    hideLoader();
                },
                error: function (res) {
                    console.log(res);
                },
            });
        } else {
            return false;
        }
    });
}

// function StatusUpdate(status){
//     let selectedUsers = [];
//     $.each($("input[name='user_ids']:checked"), function(){
//         selectedUsers.push($(this).val());
//     });

//     let data_arr = { user_ids: selectedUsers, action: status };
//     $.ajax({
//         method: 'POST',
//         url: './domain/user-process.php',
//         data: data_arr,
//         success: function (res) {
//             if (res == "success") {
//                 success_toast("User status successfully updated.");
//             } else {
//                 error_toast("Something went wrong!!");
//             }
//         },
//         error: function (res) {
//             console.log(res);
//         },
//     });
// }


</script>