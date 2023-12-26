<?php
require_once("include/header.php");
require_once("domain/war-game-sim-data.php");
include_once('./include/session.php');
require_once("./include/pagination.php"); 

$processFile = 'domain/index.php?page=war-game-sim-list-process';
// Set some useful configuration 
$limit = config("pagination","war_game_sim_list"); 
$offset = 0;

// Count of all records 
$query   = "SELECT COUNT(*) as rowNum FROM exercise_table WHERE author = :id"; 
$stmt = $dbh->prepare($query);
$stmt->execute(array(
    ":id" => $_SESSION['id']
));
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
    $sql = "SELECT * FROM exercise_table WHERE author = :id ORDER BY id desc LIMIT $offset, $limit";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":id" => $_SESSION['id']
    ));

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <!--new breadcrumb-->
                <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="fs-5"><em class="bi bi-dice-5-fill"></em><?php echo " "; echo _War_Game_List; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                
                                </li>
                                <li class="breadcrumb-item"><a href="war-game-sim.php"><i class="bi bi-dice-5-fill"></i></a></li>
                                 <li class="breadcrumb-item active" aria-current="page"><?php echo _War_Game_List; ?></li>

                            </ol>
                        </nav>
                    </div>
                    <div class="ms-auto">
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
                    </div>
                </div> -->
                <!--end new bread crumb-->
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">GSOS</a></li>
                                    <li class="breadcrumb-item"><a href="war-game-sim.php"><?php echo _War_Game; ?></a></li>
                                    <li class="breadcrumb-item active"><?php echo _War_Game_List; ?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo _War_Game_List; ?></h4>
                        </div>
                    </div>
                </div> -->
                <div class="main-title card p-2">
                    <h2 class="mb-0 text-success">
                        <?php echo _War_Game_List; ?>
                    </h2>
                    <div class="ms-auto position-relative">
                        <div class="dropdown d-inline d-none" id="bulk_war">
                            <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo "Bulk Action"; ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li onClick="statusUpdate('enable', 'war_ids', '<?php echo $processFile;?>')"><a class="dropdown-item"><?php echo "Enable"; ?></a></li>
                                <li onClick="statusUpdate('disable', 'war_ids', '<?php echo $processFile;?>')"><a class="dropdown-item"><?php echo "Disable"; ?></a></li>
                            </ul>
                        </div>
                        <!-- <span > <button  class="btn bg-primary text-light" data-bs-toggle="modal" data-bs-target="#add_training_modal"><?php //echo BTN_ADD_TRAINING; ?></button> </span> -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" id="dataContainer">
                        <table class="table mb-0 table-striped" id="war-game-sim-list" aria-label="Semantic Elements">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox"  class="checkbox" id="warCheckAll">
                                    </th>
                                    <th scope="col">
                                    <?php echo _SR;
                                        echo ". ";
                                        echo _No; ?>
                                    </th>
                                    <th scope="col" class="sorting" coltype="exercise_title" colorder=""><?php echo _EXCERCISE_TITLE; ?></th>
                                    <th scope="col" class="sorting" coltype="members_name" colorder=""><?php echo _AUTHORS; ?></th>
                                    <th scope="col" class="sorting" coltype="created_date" colorder=""><?php echo _DATE; ?></th>
                                    <th scope="col"><?php echo _VIEW; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1; 
                                foreach($result as $key => $row){
                                    ?>
                                    <tr>
                                        <th scope="row">
                                            <input type="checkbox" value="<?php echo $row["id"]; ?>" name="war_ids" class="checkbox war_check">    
                                        </th>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row["exercise_title"]; ?></td>
                                        <td><?php echo $row["members_name"]; ?></td>
                                        <td><?php echo ($row["created_date"])?date(config('date_time','date_format'),strtotime($row["created_date"])):"-" ?></td>
                                        <td><a class="table-link" href="./war-game-sim-details.php?id=<?php echo $row["id"] ?>" target="_blank" rel="noreferrer"><span class="material-icons md-36"><i class="bi bi-eye-fill"></i></span></a></td>
                                    </tr>
                                    <?php
                                }

                                ?>
                            </tbody>
                        </table>
                        <?php echo $pagination->createLinks(); ?> 
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


    
    
    <script>

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
        url: 'domain/index.php?page=war-game-sim-list-process',
        data:'page='+page_num+'&coltype='+coltype+'&colorder='+colorder+'&action=list',
        beforeSend: function () {
            displayLoader();
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
            
            hideLoader();
        }
    });
}

$(document).ready(() => {
    bulkAction('#warCheckAll', '.war_check', '#bulk_war');
})
</script>