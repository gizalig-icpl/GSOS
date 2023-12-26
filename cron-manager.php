<?php
require 'vendor/autoload.php';
require_once("include/header.php");
include_once('./include/session.php');
require_once("./include/pagination.php"); 
use Cron\CronExpression;
// Set some useful configuration 
$limit = config("pagination","cron_manager"); 
$offset = 0;

// Count of all records 
$query   = "SELECT COUNT(*) as rowNum FROM cron_job"; 
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
$query = $dbh->query("SELECT * FROM cron_job ORDER BY created DESC LIMIT $offset, $limit"); 
?>
<div class="wrapper">
    <div class="page-content">
        <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-bell"></em>
                <?php echo " ";
                echo _ViewAllCron; ?>
            </div>

        </div> -->
        <div class="main-title card p-2">
            <div class="d-flex align-items-center">
                <h3 class="mb-0 text-success">
                    <em class="bi bi-alarm"></em> <?php echo _ViewAllCron; ?>
                </h3>
                <div class="ms-auto position-relative">
                <div class="dropdown">
                        <button class="btn btn-primary" type="button"
                        data-bs-toggle="modal"
                                    data-bs-target="#createModal" onClick="createModalAdd();script();">
                            <?php echo "Add Cron"; ?>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="show-entries" class="form-label">
                            <?php echo _Show;
                            echo " ";
                            echo _Entries; ?>
                        </label>
                        <select class="form-control form-control-sm" id="show-entries" onchange="location = this.value;">
                            <?php
                            $options = array(10, 25, 50, 100);
                            $selected = isset($_GET['per_page']) ? (int) $_GET['per_page'] : $options[0];
                            foreach ($options as $option) {
                                echo '<option value="?per_page=' . $option . '" ' . ($selected == $option ? 'selected' : '') . '>' . $option . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <?php
                // Pagination settings
                $all_cron = shell_exec('crontab -l');

                if ($all_cron != NULL) {

                    $cron_jobs = explode("\n", $all_cron);

                    $cronCount = count($cron_jobs);

                    $perPage = isset($_GET['per_page']) ? (int) $_GET['per_page'] : 10;
                    $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $perPage;
                    $totalPages = ceil($cronCount / $perPage);

                    ?>
                    <table class="table mb-0 table-striped" aria-label="Semantic Elements">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <?php echo _Id; ?>
                                </th>
                                <th scope="col">
                                    <?php echo _Name; ?>
                                </th>
                                <th scope="col">
                                    <?php echo _Actions; ?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
                            $offset = ($currentPage - 1) * $perPage;
                            $paginated_cron = array_slice($cron_jobs, $offset, $perPage);

                            foreach ($paginated_cron as $index => $cron_job) {
                                echo '<tr>
                                <th scope="row">' . ($offset + $index + 1) . '</th>
                                <td>' . $cron_job . '</td>
                                <td>
                                    <a href="editcronjob.php?index=' . $index . '">Edit</a>
                                    <a href="deletecronjob.php?index=' . $index . '">Delete</a>
                                </td>
                            </tr>';
                            }
                            ?>
                            <div class="row">
                                <div class="col-6">
                                    <p class="mb-0 mt-3">
                                        <?php echo _Showing; ?>
                                        <?php echo ($offset + 1) . '-' . ($offset + $perPage > $cronCount ? $cronCount : $offset + $perPage) ?>
                                        <?php echo _Of; ?>
                                        <?php echo $cronCount ?>
                                        <?php echo _Entries; ?>
                                    </p>
                                </div>
                                <div class="col-6">
                                    <?php
                                    $totalPages = ceil($cronCount / $perPage);
                                    if ($totalPages > 1) {
                                        echo '<nav class="float-end">
                                        <ul class="pagination">';
                                        if ($currentPage > 1) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
                                        }
                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            if ($i == $currentPage) {
                                                echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                                            } else {
                                                echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                            }
                                        }
                                        if ($currentPage < $totalPages) {
                                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                                        }
                                        echo '</ul>
                                </nav>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </tbody>
                    </table>
                <?php } ?>

                <div id="dataContainer">

                <table class="table align-middle table-hover sortable">
                    <thead class="table-secondary">
                            <tr>
                                <th scope="col">
                                    <input type="checkbox"  class="checkbox">
                                </th>
                                <th scope="col">
                                    ID
                                </th>
                                <th scope="col" class="sorting" coltype="command" colorder="">Command</th>
                                <th scope="col">Cron Time</th>
                                <th scope="col" class="sorting" coltype="created" colorder="">Created</th>
                                <th scope="col" class="sorting" coltype="updated" colorder="">Updated</th>
                                <th scope="col">Next Cron</th>
                                <th scope="col" class="sorting" coltype="status" colorder="">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php 
                        if($query->rowCount() > 0){
                            $i = 1; 
                            $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($rows as $key => $row){
                                $time=$row['minute']." ".$row['hour']." ".$row['day']." ".$row['month']." ".$row['weekday'];  
                                $cron = CronExpression::factory($time);
                                $nextExecutionTime = $cron->getNextRunDate();
                                $utcDateTime = new DateTime($nextExecutionTime->format('Y-m-d H:i:s'), new DateTimeZone('UTC'));
                                $utcDateTime->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                $istTime = $utcDateTime->format('Y-m-d H:i:s');
                        ?>
                            <tr>
                                <th scope="row">
                                    <input type="checkbox" value="<?php echo $row["id"]; ?>" name="user_ids[]" class="checkbox">    
                                </th>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $row["command"]; ?></td>
                                <td><?php echo $time; ?></td>
                                <td><?php echo $row["created"]; ?></td>
                                <td><?php echo $row["updated"]; ?></td>
                                <td><?php echo $istTime." IST"; ?></td>
                                <td><?php echo ($row["status"] == 1)?'Active':'Inactive'; ?></td>
                                <td>
                            <button data-test-id="update_cron" type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createModel" onClick="getcron(<?php echo $row["id"]; ?>);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Cron">
                                <i class="bi bi-pencil-fill"></i>
                            </button>
                            <button data-test-id="delete_cron" type="button" class="btn btn-sm btn-outline-danger" onClick="displayLoader();deleteCron(<?php echo $row["id"]; ?>);" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" >
                            <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                            </tr>
                        <?php 
                            } 
                        }else{ 
                            echo '<tr><td colspan="6">No records found...</td></tr>'; 
                        } 
                        ?>
                    </tbody>
                </table>

                <!-- Display pagination links -->
                <?php echo $pagination->createLinks(); ?>

                </div>
                <div id="modal-box-container">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function createModalAdd() {
    let html = `
            <div class="modal fade" id="createModelAdd" tabindex="-1" role="dialog" aria-labelledby="createModelAddLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModelLabel">Add Cron</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form id="info-form" autocomplete="off" method="post">
                    
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Common settings</label>
                        <div class="col-sm-12">
                            <select class="form-select form-select-sm" id="common">
                            <option value="[0,0,0,0,0]">
                                -- Common Settings --
                            </option>
                            <option value="[3,1,1,1,1]">
                                Twice Per Hour (0,30 * * * *)
                            </option>
                            <option value="[4,1,1,1,1]">
                                Once Per Hour (0 * * * *)
                            </option>
                            <option value="[4,7,1,1,6]">
                                Once Per Week (0 0 * * 0)
                            </option>
                            <option value="[4,7,1,1,6]">
                                Once Per Month (0 0 * * 0)
                            </option>
                            <option value="[4,7,2,2,1]">
                                Once Per Year (0 0 1 1 *)
                            </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Minute</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="minute" name="minute" required >
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="minutes">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*/10">
                                    Once Per Ten Minutes (*/10)
                                </option>
                                <option value="*/15">
                                    Once Per Fifteen Minutes (*/15)
                                </option>
                                <option value="0,30">
                                    Once Per Thirty Minutes (0,30)
                                </option>
                                <option value="0">
                                    :00 (At the beginning of the hour.) (0)
                                </option>
                                <option value="custom" class="custom-minute">
                                    Choose Minutes                                </option> 
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Hour</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="hour" name="hour" required >
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="hours">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*">
                                    Every Hour (*)
                                </option>
                                <option value="*/2">
                                    Every Other Hour (*/2)
                                </option>
                                <option value="*/3">
                                    Every Third Hour (*/3)
                                </option>
                                <option value="*/4">
                                    Every Fourth Hour (*/4)
                                </option>
                                <option value="*/6">
                                    Every Sixth Hour (*/6)
                                </option>
                                <option value="0,12">
                                    Every Twelve Hours (0,12)
                                </option>
                                <option value="0">
                                    12:00 a.m Midnight (0)
                                </option>
                                <option value="custom" class="custom">
                                    Choose Hour                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Day</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="day" name="day" required >
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="days">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*">
                                    Every Day (*)
                                </option>
                                <option value="1">
                                    First day of month (1)
                                </option>
                                <option value="*/2">
                                    Every Other Day (*/2)
                                </option>
                                <option value="custom" class="custom">
                                    Choose Day                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Month</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="month" name="month" required >
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="months">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*">
                                    Every Month (*)
                                </option>
                                <option value="1">
                                    January (1)
                                </option>
                                <option value="*/2">
                                    Every Other Month (*/2)
                                </option>
                                <option value="*/3">
                                    Every Third Month (*/3)
                                </option>
                                <option value="*/6">
                                    Every Sixth Month (*/6)
                                </option>
                                <option value="custom" class="custom">
                                    Choose Month                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Weekday</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="weekday" name="weekday" required >
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="weekdays">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*">
                                    Every Day (*)
                                </option>
                                <option value="1-5">
                                    Every Weekday (1-5)
                                </option>
                                <option value="0,6">
                                    Every Weekend Day (6,0)
                                </option>
                                <option value="1,3,5">
                                    Every Monday, Wednesday, and Friday (1,3,5)
                                </option>
                                <option value="2,4">
                                    Every Tuesday and Thursday (2,4)
                                </option>
                                <option value="0">
                                    Sunday (0)
                                </option>
                                <option value="1">
                                    Monday (1)
                                </option>
                                <option value="custom" class="custom">
                                    Choose Weekday                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Command</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control form-control-sm" id="command" name="command" required >
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onClick="displayLoader();addInfo()"><?php echo SAVE_CHANGES; ?></button>
                </div>
                </div>
            </div>
            </div>

            `;
    $("#modal-box-container").html(html);
    let createModelAdd = new bootstrap.Modal(document.getElementById('createModelAdd'), {});
    createModelAdd.show();
    console.log("Create Model");
}

function createModal(id) {
    let common=data[0]['minute']+" "+data[0]['hour']+" "+data[0]['day']+" "+data[0]['month']+" "+data[0]['weekday'];
    let html = `
            <div class="modal fade" id="createModelUpdate" tabindex="-1" role="dialog" aria-labelledby="createModelUpdateLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModelUpdateLabel">Update Cron</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                <form id="info-form" autocomplete="off" method="post">
                    
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Common settings</label>
                        <div class="col-sm-12">
                            <select class="form-select form-select-sm" id="common">
                            <option value="[0,0,0,0,0]">
                                -- Common Settings --
                            </option>
                            <option value="[3,1,1,1,1]" ${(common == "0,30 * * * *" ? "selected" : "")}>
                                Twice Per Hour (0,30 * * * *)
                            </option>
                            <option value="[4,1,1,1,1]" ${(common == "0 * * * *" ? "selected" : "")}>
                                Once Per Hour (0 * * * *)
                            </option>
                            <option value="[4,7,1,1,6]" ${(common == "0 0 * * 0" ? "selected" : "")}>
                                Once Per Week (0 0 * * 0)
                            </option>
                            <option value="[4,7,1,1,6]" ${(common == "0 0 * * 0" ? "selected" : "")}>
                                Once Per Month (0 0 * * 0)
                            </option>
                            <option value="[4,7,2,2,1]" ${(common == "0 0 1 1 *" ? "selected" : "")}>
                                Once Per Year (0 0 1 1 *)
                            </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Minute</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="minute" name="minute" required value="${data[0]['minute']}">
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="minutes">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*/10" ${(data[0]['minute'] == "*/10" ? "selected" : "")}>
                                    Once Per Ten Minutes (*/10)
                                </option>
                                <option value="*/15" ${(data[0]['minute'] == "*/15" ? "selected" : "")}>
                                    Once Per Fifteen Minutes (*/15)
                                </option>
                                <option value="0,30" ${(data[0]['minute'] == "0,30" ? "selected" : "")}>
                                    Once Per Thirty Minutes (0,30)
                                </option>
                                <option value="0" ${(data[0]['minute'] == "0" ? "selected" : "")}>
                                    :00 (At the beginning of the hour.) (0)
                                </option>
                                <option value="custom" class="custom-minute">
                                    Choose Minutes                                </option> 
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Hour</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="hour" name="hour" required value="${data[0]['hour']}">
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="hours">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*" ${(data[0]['hour'] == "*" ? "selected" : "")}>
                                    Every Hour (*)
                                </option>
                                <option value="*/2" ${(data[0]['hour'] == "*/2" ? "selected" : "")}>
                                    Every Other Hour (*/2)
                                </option>
                                <option value="*/3" ${(data[0]['hour'] == "*/3" ? "selected" : "")}>
                                    Every Third Hour (*/3)
                                </option>
                                <option value="*/4" ${(data[0]['hour'] == "*/4" ? "selected" : "")}>
                                    Every Fourth Hour (*/4)
                                </option>
                                <option value="*/6" ${(data[0]['hour'] == "*/6" ? "selected" : "")}>
                                    Every Sixth Hour (*/6)
                                </option>
                                <option value="0,12" ${(data[0]['hour'] == "*/12" ? "selected" : "")}>
                                    Every Twelve Hours (0,12)
                                </option>
                                <option value="0" ${(data[0]['hour'] == "0" ? "selected" : "")}>
                                    12:00 a.m Midnight (0)
                                </option>
                                <option value="custom" class="custom">
                                    Choose Hour                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Day</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="day" name="day" required value="${data[0]['day']}">
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="days">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*" ${(data[0]['day'] == "*" ? "selected" : "")}>
                                    Every Day (*)
                                </option>
                                <option value="1" ${(data[0]['day'] == "1" ? "selected" : "")}>
                                    First day of month (1)
                                </option>
                                <option value="*/2" ${(data[0]['day'] == "*/2" ? "selected" : "")}>
                                    Every Other Day (*/2)
                                </option>
                                <option value="custom" class="custom">
                                    Choose Day                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Month</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="month" name="month" required value="${data[0]['month']}">
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="months">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*" ${(data[0]['month'] == "*" ? "selected" : "")}>
                                    Every Month (*)
                                </option>
                                <option value="1" ${(data[0]['month'] == "1" ? "selected" : "")}>
                                    January (1)
                                </option>
                                <option value="*/2" ${(data[0]['month'] == "*/2" ? "selected" : "")}>
                                    Every Other Month (*/2)
                                </option>
                                <option value="*/3" ${(data[0]['month'] == "*/3" ? "selected" : "")}>
                                    Every Third Month (*/3)
                                </option>
                                <option value="*/6" ${(data[0]['month'] == "*/6" ? "selected" : "")}>
                                    Every Sixth Month (*/6)
                                </option>
                                <option value="custom" class="custom">
                                    Choose Month                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Weekday</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control form-control-sm" id="weekday" name="weekday" required value="${data[0]['weekday']}">
                        </div>
                        <div class="col-sm-8">
                            <select class="form-select form-select-sm" id="weekdays">
                            <option value="--">
                                    -- Common Settings --
                                </option>
                                <option value="*" ${(data[0]['weekday'] == "*" ? "selected" : "")}>
                                    Every Day (*)
                                </option>
                                <option value="1-5" ${(data[0]['weekday'] == "1-5" ? "selected" : "")}>
                                    Every Weekday (1-5)
                                </option>
                                <option value="0,6" ${(data[0]['weekday'] == "0,6" ? "selected" : "")}>
                                    Every Weekend Day (6,0)
                                </option>
                                <option value="1,3,5" ${(data[0]['weekday'] == "1,3,5" ? "selected" : "")}>
                                    Every Monday, Wednesday, and Friday (1,3,5)
                                </option>
                                <option value="2,4" ${(data[0]['weekday'] == "2,4" ? "selected" : "")}>
                                    Every Tuesday and Thursday (2,4)
                                </option>
                                <option value="0" ${(data[0]['weekday'] == "0" ? "selected" : "")}>
                                    Sunday (0)
                                </option>
                                <option value="1" ${(data[0]['weekday'] == "1" ? "selected" : "")}>
                                    Monday (1)
                                </option>
                                <option value="custom" class="custom">
                                    Choose Weekday                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-12 col-form-label">Command</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control form-control-sm" id="command" name="command" required value="${data[0]['command']}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="status" class="col-sm-12 col-form-label">Status</label>
                        <div class="col-sm-12">
                            <select class="form-select form-select-sm" id="status">
                                <option value="0" ${(data[0]['status'] == 0 ? "selected" : "")}>Inactive</option>
                                <option value="1" ${(data[0]['status'] == 1 ? "selected" : "")}>Active</option>
                            </select>
                        </div>
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

const getcron = (id,modal) => {
    $.ajax({
        method: 'POST',
        url: './domain/fetch-cron.php',
        data: { action: 'fetch',id:id },
        success: function (res) {
            let response = JSON.parse(res)
            data = response[0]
            previlege = response[1]
            createModal(id);
            script();
        },
        error: function (res) { },
    });
}

function addInfo(id) {
    let minute = $("#minute").val()
    let hour = $("#hour").val()
    let day = $("#day").val()
    let month = $("#month").val()
    let weekday = $("#weekday").val()
    let command = $("#command").val()

    let data_obj = {
        minute,
        hour,
        day,
        month,
        weekday,
        command,
    }

    $.ajax({
        method: 'POST',
        url: 'cron-db.php',
        data: data_obj,
        success: function (res) {
            if (res == "success") {
                success_toast("Successfully Inserted Data");

                $('#createModelAdd').modal('hide')
                location.reload();
            } else {
                error_toast("Something went wrong!!");
                hideLoader();
            }
        },
        error: function (res) {
            console.log(res);
        },
    });

}
function updateInfo(id) {
    let minute = $("#minute").val()
    let hour = $("#hour").val()
    let day = $("#day").val()
    let month = $("#month").val()
    let weekday = $("#weekday").val()
    let command = $("#command").val()
    let status = $("#status").val()

    let data_obj = {
        info: "Data",
        id: id,
        minute,
        hour,
        day,
        month,
        weekday,
        command,
        status
    }

    $.ajax({
        method: 'POST',
        url: './domain/update-cron.php',
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

function deleteCron(id){
    let data_id = id
    let data_arr = { id: data_id }
    $.ajax({
        method: 'POST',
        url: './domain/delete-corn.php',
        data: data_arr,
        success: function (res) {
            hideLoader()
            if (res == "Deleted") {
                success_toast("Successfully Deleted Data");
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

function script(){
$('#common').change(function(){
    var id=["#minutes","#hours","#days","#months","#weekdays"];
    var value=JSON.parse($(this).children("option:selected").val());
    for(var i=0;i<id.length;i++)
    {
        $(id[i]).prop("selectedIndex", value[i]);
        $(id[i].slice(0,-1)).val($(id[i]).val());
    }
})
$('#minutes').change(function(){
    $('#minute').val($(this).val());
    $("#common").prop("selectedIndex", 0);
})
$('#hours').change(function(){
    $('#hour').val($(this).val());
    $("#common").prop("selectedIndex", 0);
})
$('#days').change(function(){
    $('#day').val($(this).val());
    $("#common").prop("selectedIndex", 0);
})
$('#months').change(function(){
    $('#month').val($(this).val());
    $("#common").prop("selectedIndex", 0);
})
$('#weekdays').change(function(){
    $('#weekday').val($(this).val());
    $("#common").prop("selectedIndex", 0);
})
$("#minute").on("keyup paste", function() {
    $("#minutes").val($("#minute").val()).attr("selected",true);
    $("#common").prop("selectedIndex", 0);
})
$("#hour").on("keyup paste", function() {
    $("#hours").val($("#hour").val()).attr("selected",true);
    $("#common").prop("selectedIndex", 0);
})
$("#day").on("keyup paste", function() {
    $("#days").val($("#day").val()).attr("selected",true);
    $("#common").prop("selectedIndex", 0);
})
$("#month").on("keyup paste", function() {
    $("#months").val($("#month").val()).attr("selected",true);
    $("#common").prop("selectedIndex", 0);
})
$("#weekday").on("keyup paste", function() {
    $("#weekdays").val($("#weekday").val()).attr("selected",true);
    $("#common").prop("selectedIndex", 0);
})
$(function(){
    var id= $("#minute,#hour,#day,#month,#weekday");
   id.keypress(function (e) {
    var ascii=[42,44,45,47,48,49,50,51,52,53,54,55,56,57];
        if (jQuery.inArray(e.which,ascii)<0) {
            return false;
        }
   });
});
}

function columnSorting(page_num){
    page_num = page_num?page_num:0;
	
    let coltype='',colorder='',classAdd='',classRemove='';
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
        url: 'domain/cron-process.php',
        data:'page='+page_num+'&coltype='+coltype+'&colorder='+colorder+'&action=list',
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

</script>