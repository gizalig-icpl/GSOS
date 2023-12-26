<?php

require_once("include/header.php");
require_once("domain/quiz-report.php");
include_once('./include/session.php');
include_once('./domain/fetch-category.php');
require_once("./include/pagination.php"); 

// Set some useful configuration 
$limit = config("pagination","quiz_report"); 
$offset = 0;

// Count of all records 
$query   = "SELECT COUNT(*) as rowNum FROM quiz_master"; 
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
$query = $dbh->query("SELECT * FROM quiz_master ORDER BY id DESC LIMIT $offset, $limit"); 

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
                    <div class="breadcrumb-title pe-3"><em class="bi bi-body-text"></em><?php echo " "; echo _Quiz; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-award-fill"></i>
                                </li> -->
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo _Quiz; ?></a></li> -->
                                 <li class="breadcrumb-item active" aria-current="page"><?php echo _Report; ?></li>

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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo _Quiz; ?></a></li>
                                    <li class="breadcrumb-item active"><?php echo _Report; ?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo _Quiz; ?></h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title -->
                <div class="main-title card p-2">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0 text-success"><?php echo _Quiz_Report; ?></h2>
                        <div class="ms-auto position-relative">
                            <?php
                            echo "<a  href='downloadAll.php'><button class='btn btn-primary submit-btn'>".BTN_DOWNLOAD_ALL."</button></a>";
                            ?>
                            <button class='btn btn-primary submit-btn' form='quizexcel'><?php echo BTN_GENERATE_EXCEL_FILE; ?></button>
                        </div>
                    </div>
                </div>
                <?php

                ?>
                <div class="card card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0"><?php echo "Report"; ?></h5>
                    <div class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3"><em
                                class="bi bi-search"></em></div>
                        <input class="form-control ps-5" type="text" placeholder="search" onkeyup="search(this.value);">
                    </div>
                </div>
                <form class="mt-20" id="quizexcel" action="quiz-report-excel.php" method="post">
                    </form>
                    <div class="table-responsive mt-3" id="dataContainer">
                    <table class="table align-middle table-hover sortable" id="" aria-label="Semantic Elements">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox"  class="checkbox">
                                    </th>
                                    <th scope="col">
                                    <?php echo _SR;
                                        echo ". ";
                                        echo _No; ?>
                                    </th>
                                    <th scope="col" class="sorting" coltype="user_fname" colorder=""><?php echo _Name; ?></th>
                                    <th scope="col" class="sorting" coltype="user_email" colorder=""><?php echo _Email; ?></th>
                                    <th scope="col" class="sorting" coltype="quiz_time" colorder=""><?php echo _DATE; ?></th>
                                    <th scope="col" class="sorting" coltype="category_id" colorder=""><?php echo _Category; ?></th>
                                    <th scope="col" class="sorting" coltype="total_question" colorder=""><?php echo _Attempted_Question; ?></th>
                                    <th scope="col" class="sorting" coltype="correct_ans" colorder=""><?php echo _CORRECT_ANSWER; ?></th>
                                    <th scope="col"><?php echo _Status; ?></th>
                                    <th scope="col" class="sorting" coltype="certificate" colorder=""><?php echo _Certificate; ?></th>
                                    <th><?php echo _Review; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // $result = getAllData();
                                // $data = getSpecificData();
                                // for ($i = 0; $i < count($result); $i++) {
                                    if($query->rowCount() > 0){
                                    $i = 1; 
                                    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($rows as $key => $result){ 
                                    $category_id= $result['category_id'];
                                    $question_sql = "SELECT count(category_id) from question_master WHERE category_id = :id";
                                    $stmt = $dbh->prepare($question_sql);
                                    $stmt->execute(array(
                                        ":id" => $category_id
                                    ));
                                    
                                    $question_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    $total_question=$question_result[0]['count(category_id)'];

                                    $arr=json_decode($result['question'], true);
                                    $arr1=json_decode($result['answer'], true);
                                    $correct_ans=0;
                                    for ($j = 0; $j < count($arr); $j++) {
                                        $correct_sql = "SELECT correct_ans from question_master WHERE question_id = :id";
                                        $stmt = $dbh->prepare($correct_sql);
                                        $stmt->execute(array(
                                            ":id" => $arr[$j]["question_id"]
                                        ));

                                        $correct_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                        $option="option".$correct_result[0]["correct_ans"];
                                        $question="question".$j;
                                        if($arr[$j][$option]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                                        {
                                            $correct_ans+=1;
                                        }
                                    }

                                    $stmt = $dbh->prepare("SELECT * FROM category_master WHERE category_id = :category_id");
                                    $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
                                    $stmt->execute();
                                    $result1 = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $per=($correct_ans*100)/count($arr);
                                    if($per>=$result1['min_score']){ $status="Pass";}else{$status="Fail";}
                                    ?>
                                    
                                    <tr>
                                        <th scope="row">
                                            <input type="checkbox" value="<?php echo $result["id"]; ?>" name="user_ids[]" class="checkbox">    
                                        </th>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $result['user_fname']." ".$result['user_lname']; ?></td>
                                        <td><?php echo $result['user_email'];?></td>
                                        <td><?php echo ($result['quiz_time'])?date(config('date_time','date_format')." ".config('date_time','time_format'),strtotime($result['quiz_time'])):"-" ?></td>
                                        <td><?php echo $result1['category_title'];?></td>
                                        <td><?php echo count($arr);?></td>
                                        <td><?php echo $correct_ans;?></td>
                                        <td><?php echo $status;?></td>
                                        <td><?php echo ($status=="Pass")?"<a href='generate-certificate.php?id=" . $result['id'] . "' target='_blank' >Download</a>":'-'; ?></td>
                                        <td><a href='index.php?page=review-quiz&id=<?php echo $result['id']; ?>'>Review</a></td>
                                    </tr>
                                    <?php 
                            } 
                        }else{ 
                            echo '<tr><td colspan="6">No records found...</td></tr>'; 
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
        url: 'domain/index.php?page=quiz-report-process',
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

function search(value){
    page_num=0;
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
        url: 'domain/index.php?page=quiz-report-process',
        data:'page='+page_num+'&coltype='+coltype+'&colorder='+colorder+'&action=search&value='+value,
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