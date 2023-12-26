<?php

require_once("include/header.php");
require_once("domain/quiz-report.php");
include_once('./include/session.php');
include_once('./domain/fetch-category.php');

$display_correct_ans=config("display","correct_ans");

$id = $_GET['id'];
$result = getreviewquiz($id);

global $dbh; 
$sql = "SELECT * FROM category_master WHERE category_id = :id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":id" => $result[0]['category_id']
));

$category_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$question_sql = "SELECT count(category_id) from question_master WHERE category_id = :id";
$stmt = $dbh->prepare($question_sql);
$stmt->execute(array(
    ":id" => $result[0]['category_id']
));

$question_result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['HTTP_HOST']!="localhost"){
?>
<!-- <script>
    document.addEventListener("contextmenu", (event) => {
         event.preventDefault();
      });
</script> -->
<script> 
const disabledKeys = ["a","A","c", "C", "x","X","v","V", "J", "u","U", "I","i","p","P"]; // keys that will be disabled 
const showAlert = e => { e.preventDefault(); // preventing its default behaviour 
    return alert("Sorry, you can't view or copy source codes this way!");
 }
  document.addEventListener("contextmenu", e => { 
    showAlert(e); // calling showAlert() function on mouse right click 
}); document.addEventListener("keydown", e => { 
    // calling showAlert() function, if the pressed key matched to disabled keys 
    if((e.ctrlKey && disabledKeys.includes(e.key)) || e.key === "F12") {
         showAlert(e);
          } });
           </script>
           <style> 
body {
  -webkit-user-select: none; /* Safari */
  -ms-user-select: none; /* IE 10 and IE 11 */
  user-select: none; /* Standard syntax */
}
</style>
<?php
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
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"><em class="bi bi-award-fill"></em><?php echo " "; echo _Quiz; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-award-fill"></i>
                                </li> -->
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo _Quiz; ?></a></li> -->
                                 <li class="breadcrumb-item active" aria-current="page"><?php echo $category_result[0]['category_title']; ?></li>

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
                
                <?php

                ?>
                <div class="card">
                    <div class="card-body">
                    
                                <?php
                                
                                //$data = getSpecificData();
                                for ($i = 0; $i < count($result); $i++) {
                                    
                                     $arr=json_decode($result[$i]['question'], true);
                                     $arr1=json_decode($result[$i]['answer'], true);
                                    //  echo $arr[0]['question_id'];
                                    // echo print_r($arr);
                                    // echo count($arr);
                                    // $option;

                                    $total_question=config("quiz", "number_of_questions");
                                    $total_attempt=count($arr1)-1;
                                    $unattempted= config("quiz", "number_of_questions")-$total_attempt;
                                    $correct_ans=$result[$i]['correct_ans'];
                                    $wrong_ans=$result[$i]['total_question']-$result[$i]['correct_ans'];
                                    ?>
                                    <div class="col d-flex">
                                        <div class="w-100">
                                        <!-- <div class="card-body"> -->
                                            <div class="d-flex align-items-center mb-3">
                                            <h6 class="mb-0">Quiz Result</h6>
                                            </div>
                                            <div id="chart8"></div>
                                        <!-- </div> -->
                                        <!-- <div class="d-flex flex-column"> -->
                                        <div class="position-absolute top-0 end-0 pt-3" style="padding-right: 1rem;">
                                            <strong>Total Question : </strong><?php echo xss_safe($total_question); ?><br>
                                            <strong>Total Attempt : </strong><?php echo xss_safe($total_attempt); ?><br>
                                            <strong>Unattempted : </strong><?php echo xss_safe($unattempted); ?><br>
                                            <strong>Correct Answer : </strong><text id="correct_ans"></text><br>
                                            <strong>Wrong Answer : </strong><text id="wrong_ans"></text><br>
                                        </div>
                                    <!-- </div> -->
                                        </div>
                                        </div>
                                    <table class="table mb-0">
                                    <?php
                                    for ($j = 0; $j < count($arr); $j++) {
                                        $results='<i class="bi bi-x-circle-fill fs-5 text-danger"></i>';
                                        $correct_sql = "SELECT correct_ans from question_master WHERE question_id = :id";
                                        $stmt = $dbh->prepare($correct_sql);
                                        $stmt->execute(array(
                                            ":id" => $arr[$j]["question_id"]
                                        ));

                                        $correct_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            $option="option".$correct_result[0]["correct_ans"];
                                            $question="question".$j;
                                            $chr=97;
                                            if(!isset($arr1[array_search($question,array_column($arr1,'name'))]["value"]))
                                            {
                                                $arr1[array_search($question,array_column($arr1,'name'))]["value"]=" ";
                                            }
                                            if($arr[$j][$option]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                                            {
                                                $results='<i class="bi bi-check-circle-fill fs-5 text-success"></i>';
                                                $correct_ans+=1;
                                            }
                                            if(array_search($question,array_column($arr1,'name'))==NULL){
                                                $results='<i class="bi bi-exclamation-circle-fill fs-5 text-warning"></i>';
                                            }
                                        echo '<tr><td></td><td></td></tr><tr><td>'.$results.'</td><td><span class="fw-bold">'.($j+1) .') '.$arr[$j]["question_title"].'</span></td></tr>';
                                        for ($k = 1; $k <= 4; $k++) {
                                        $options="option".$k;

                                            if($display_correct_ans==0 && isset($arr[$j][$options])){
                                                if($arr[$j][$options]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                                                {
                                                    if($correct_result[0]["correct_ans"]==$k && $arr[$j][$options]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                                                    {
                                                        echo '<tr><td>'.chr($chr).' )</td><td><span class="text-success">'.$arr[$j][$options].'</span></td></tr>';
                                                    }
                                                    else{
                                                        echo '<tr><td>'.chr($chr).' )</td><td><span class="text-danger">'.$arr[$j][$options].'</span></td></tr>';
                                                    }
                                                }
                                                else
                                                {
                                                    echo '<tr><td>'.chr($chr).' )</td><td><span>'.$arr[$j][$options].'</span></td></tr>';
                                                }
                                            }
                                            if($display_correct_ans==1 && isset($arr[$j][$options]))
                                            {
                                                if($correct_result[0]["correct_ans"]==$k)
                                                {
                                                    echo '<tr><td>'.chr($chr).' )</td><td><span class="text-success">'.$arr[$j][$options].'</span></td></tr>';
                                                }
                                                else
                                                {
                                                    if($arr[$j][$options]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                                                    {
                                                        echo '<tr><td>'.chr($chr).' )</td><td><span class="text-danger">'.xss_safe($arr[$j][$options]).'</span><br></td></tr>';
                                                    }
                                                    else
                                                    {
                                                        echo '<tr><td>'.chr($chr).' )</td><td><span>'.xss_safe($arr[$j][$options]).'</span><br></td></tr>';
                                                    }
                                                }
                                            }
                                            $chr++;
                                    }
                                        // if($arr[$j]["correct_ans"]==2)
                                        // {
                                        //     echo '<p class="text-success">'.$arr[$j]["option2"].'</p><br>';
                                        // }else
                                        // {
                                        //     if($arr[$j]["option2"]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                                        //     {
                                        //         echo '<p class="text-danger">'.$arr[$j]["option2"].'</p><br>';
                                        //     }
                                        //     else
                                        //     {
                                        //         echo '<p>'.$arr[$j]["option2"].'</p><br>';
                                        //     }
                                        // }
                                        // if($arr[$j]["correct_ans"]==3)
                                        // {
                                        //     echo '<p class="text-success">'.$arr[$j]["option3"].'</p><br>';
                                        // }else
                                        // {
                                        //     if($arr[$j]["option3"]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                                        //     {
                                        //         echo '<p class="text-danger">'.$arr[$j]["option3"].'</p><br>';
                                        //     }
                                        //     else
                                        //     {
                                        //         echo '<p>'.$arr[$j]["option3"].'</p><br>';
                                        //     }
                                        // }
                                        // if($arr[$j]["correct_ans"]==4)
                                        // {
                                        //     echo '<p class="text-success">'.$arr[$j]["option4"].'</p><br>';
                                        // }else
                                        // {
                                        //     if($arr[$j]["option4"]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
                                        //     {
                                        //         echo '<p class="text-danger">'.$arr[$j]["option4"].'</p><br>';
                                        //     }
                                        //     else
                                        //     {
                                        //         echo '<p>'.$arr[$j]["option4"].'</p><br>';
                                        //     }
                                        // }
                                        
                                        // echo '<p>'.$arr[$j]["option1"].'</p><br><p>'.$arr[$j]["option2"].'</p><br><p>'.$arr[$j]["option3"].'</p><br><p>'.$arr[$j]["option4"].'</p><br>';
                                    }
                                }

                                ?>
                                </table>
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
    let correct_ans= document.getElementById("correct_ans").innerHTML=<?php echo $correct_ans; ?>;
    let wrong_ans=document.getElementById("wrong_ans").innerHTML=<?php echo $total_attempt-$correct_ans; ?>;
    let unattempted=<?php echo $unattempted?>;
    chart8(correct_ans,wrong_ans,unattempted);
</script>

    
    