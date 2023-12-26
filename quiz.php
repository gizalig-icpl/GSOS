<?php

require_once("include/header.php");

global $dbh;

if (isset($_GET['id'])) {

    $cid = $_GET['id'];
    $status=1;
    $sql = "SELECT * from category_master where category_id = :cid";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_INT);
    $stmt->execute();
    $result1 = $stmt->fetch(PDO::FETCH_ASSOC);

    $number_of_questions = config("quiz", "number_of_questions");
    $sql_que = "SELECT question_id from question_master where category_id = :cid and status = :status ORDER BY RAND() LIMIT :number";
    $stmt_que = $dbh->prepare($sql_que);
    $stmt_que->bindParam(':cid',$cid,PDO::PARAM_INT);
    $stmt_que->bindParam(':status',$status,PDO::PARAM_INT);
    $stmt_que->bindParam(':number', $number_of_questions,PDO::PARAM_INT);
    $stmt_que->execute();
    $totalQuestionsCount = $stmt_que->rowCount();
    echo "<script>localStorage.setItem('totalque', '$totalQuestionsCount');</script>";
}

$imgArr = [];
$imgArr['Cybersecurity Basics Quiz'] = "./assets/images/quiz/Basic-Cyber-Security.webp";
$imgArr['Physical Security Quiz'] = "./assets/images/quiz/OIP.jpg";
$imgArr['Ransomware Quiz'] = "./assets/images/quiz/Ransomware.jpg";
$imgArr['Phishing Quiz'] = "./assets/images/quiz/phishing.jpg";
$imgArr['Ransomware'] = "./assets/images/quiz/Ransomware.jpg";
$imgArr['Phishing'] = "./assets/images/quiz/phishing.jpg";
$imgArr['Tech Support scams quiz'] = "./assets/images/quiz/scam.jpg";
$imgArr['Vendor Security quiz'] = "./assets/images/quiz/vendor-security.jpg";
$imgArr['Secure Remote Access Quiz'] = "./assets/images/quiz/Remote.jpg";

    $limit = config("pagination","quiz"); 
    $offset = 0;
    $deleted = 0;
    // Count of all records 
    $query   = "SELECT distinct count(*) as rowNum FROM category_master WHERE deleted=:deleted"; 
    $stmt = $dbh->prepare($query);
    $stmt->execute(array(
        ":deleted" => $deleted
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

    global $dbh;
    $sql = "SELECT * FROM category_master WHERE deleted=:deleted ORDER BY category_id desc LIMIT $offset, $limit";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":deleted" => $deleted
    ));

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
<title><?php echo $heading ?></title>
<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="fs-5"><em class="bi bi-camera-video-fill"></em><?php echo " ";
                                                                        echo TITLE_SECURITY_VIDEOS; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-award-fill"></i>
                                </li> -->
                                <!-- <li class="breadcrumb-item active" aria-current="page"><?php echo _Quiz; ?></li> -->

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
                                    <li class="breadcrumb-item active"><?php echo _Quiz; ?></li>
                                </ol>
                            </div>
                            <h4 class="page-title">Quiz Panel</h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title -->
                <div class="main-title card p-2">
                    <h2 class="mb-0 text-success"
                    style="color:#0CB04A;">
                        <?php if (isset($_GET['id'])) {
                            echo $result1['category_title'];
                            } else{
                                echo _Quiz." "._Panel;
                            }
                        ?>
                    </h2>
                </div> 
            
                <?php if (isset($_GET['id'])) { ?>

                    <div class="card">

                    <div class="card-header border-0">
                    <div class="float-end">
                            <h5 class='danger d-inline-block' id="timerdisplay"></h5><h5 id='timer' class='danger d-inline-block'></h5>
                        </div>
                    </div>

                        <!-- Timeleft -->
                        <!-- <h5 id="timer" class="hide"></h5> -->
                      
                        <div class="card-body row">
                            <!-- <div class="kpi-form-heading"><?php echo _Personal;
                                                            echo " ";
                                                            echo _Details; ?></div> -->

                            <div class="kpi-form col-9">

                        

                                <form class="quiz-form" id='quiz-form'>
                                
                                <!-- <div id="totalQue" class="text-end"><?php echo "Total Question:$totalQuestionsCount"; ?></div> -->

                                    <div id="quiz-component">

                                        <h5 class="form-section-heading"><?php echo _Personal;
                                                                            echo " ";
                                                                            echo _Details; ?></h5>


                                

                                        <label class="form-label">

                                            <span class="input-span"><?php echo _First_Name; ?></span>

                                            <input type="text" class="form-control form-control-sm" class="form-control form-control-sm" name="user_fname" placeholder="">

                                        </label>



                                        <label class="form-label">

                                            <span class="input-span"><?php echo _Last_Name; ?></span>

                                            <input type="text" class="form-control form-control-sm" name="user_lname" placeholder="">

                                        </label>



                                        <label class="form-label">

                                            <span class="input-span"><?php echo _Email_Address; ?></span>

                                            <input type="text" class="form-control form-control-sm" name="user_email" placeholder="">

                                        </label>



                                        <label class="form-label">

                                            <span class="input-span"><?php echo _Phone; ?></span>

                                            <input type="text" class="form-control form-control-sm" name="user_phone" placeholder="">

                                        </label>
                                     
                                    </div>
                                    
                                    

                                  

                                </form>


                                <button type="submit" class="btn bg-primary submit-btn text-light" id="prev-quiz-btn"><?php echo "Previous"; ?> </button>
                                <button type="submit" class="btn bg-primary submit-btn text-light" id="quiz-btn" form='quiz-form'><?php echo _Start_Quiz; ?></button>
                            </div>
                            <div id="quiz-navigator" class="col-3 d-none d-lg-block"></div>
                        </div>
                    </div>

            </div>

        <?php } else { ?>
            <div class="quiz-gallery" id="dataContainer">
                    <div class="row">
                    <!-- <img id="myImg" src="img_snow.jpg" alt="Snow" style="width:100%;max-width:300px"> -->

<!-- The Modal -->
<!-- <div id="myModal" class="xyz">
  <span class="close">×</span>
  <video id="video" controls autoplay>
  <source src="./photos/training/SIDBI-IS Awareness Training.mp4" type="video/mp4">
</video>
</div> -->
                        <?php
                        $video_query = "SELECT * FROM video_details";
                        $stmt = $dbh->prepare($video_query);
                        $stmt->execute();
                        $video_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        foreach($result as $key => $row){
                            // echo '<div class="quiz-photo-container"><a href="./quiz.php?id=' . $data[$i]['category_id'] . '"><img src="./assets/images/quiz/' . $data[$i]['category_image'] . '"/></a><div><a href="./quiz.php?id=' . $data[$i]['category_id'] . '">' . $data[$i]['category_title'] . '</a>  <a href="javascript: void(0);" onclick="openVideoBox(' . $data[$i]['category_id'] . ',\'' . $data[$i]['video_url'] . '\')"><img src="videos/videoicon.gif" class="videoicon"></a></div></div>';
                            // <a  class="popup-youtube" href="' . $data[$i]['video_url'] . '">
                            // </a>

                            $current_time = 0;
                            foreach ($video_array as $v) {
                                if($v["video_id"] == $row["category_id"] && $v['user_id'] == $_SESSION['id']){
                                    $current_time = $v['curr_time'];
                                }
                            }    

                            if(isset($_COOKIE['quiz'.$row['category_id']])) {
                                if($_COOKIE['quiz'.$row['category_id']]==$row['category_id'])
                                {
                                    $quizurl="index.php?page=quiz&id=".$_COOKIE['quiz'.$row['category_id']];
                                    // $play_video = '<img class="m-30" src="videos/videoicon.gif" style="max-width:30px; max-height:30px;">';
                                    $play_video = '<a href="javascript: void(0);" class="btn btn-success" onclick="image('.$row['category_id'].')">Play Video</a>';
                                    $take_quiz='<a href="'.$quizurl.'" class="btn btn-success">Take Quiz</a>';
                                } 
                            }
                            else {
                                $quizurl="javascript: void(0);";
                                $play_video = '<a href="javascript: void(0);" class="btn btn-success" onclick="image('.$row['category_id'].')">Play Video</a>';
                                $take_quiz='';
                            }

                            // $quiz = '<script>document.write(localStorage.getItem("quiz1"));</script>';
                            // echo $data[$i]['category_id'];exit;
                            // echo var_dump((int)$quiz);exit;
                            // $qq=trim($quiz,' ');
                            //  var_dump((int)$qq);
                            // echo $quiz;exit;
                            // echo "<pre>$quiz</pre>";exit;
                            // if($data[$i]['category_id']==$quiz)
                            // {
                            //     $quizurl="quiz.php?id=".$quiz;
                            //     echo $quizurl;exit;
                            // }
                            // else{
                            //     $quizurl="javascript: void(0);";
                            // }
                            echo '
                                <div class="col-xxl-3 col-md-6 tour_3">
                                    <div class="card">
                                        <div class="lightboxContainer" onclick="image(' . $row['category_id'] . ')">
                                            <img id="myImg" class="img-fluid h-100 w-100 quizimg" src="./photos/quiz/' . $row['category_image'] . '">
                                        </div>
                                        <div id="myModal_'.$row['category_id'].'" class="xyz">
                                            <span class="close" onclick="closeModal(' . $row['category_id'] . ')">×</span>
                                            <video id="video_'.$row['category_id'].'" data-curr-time="'.$current_time.'" class="video" controls>
                                                <source src="' . $row['video_url'] . '" type="video/mp4">
                                            </video>
                                        </div>
                                        <div class="card-body">
                                            <h4 class="card-title">'.$row['category_title'].'</h4>
                                            <h6 class="card-text text-muted">'.substr($row['description'],0,100).'... <a href="'.APPLICATION_URL.'index.php?page=quiz-description&id='.$row['category_id'].'">Read More</a></h6>
                                            <div class="links">
                                                '.$play_video.'
                                                '.$take_quiz.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                        ?>
                    </div>
                    <?php 

                    echo $pagination->createLinks(); ?> 
            </div>
        <?php } ?>
        <!-- end container-fluid -->
        
        </div>
        <!-- end content -->

        <?php
        // include("include/copyright-footer.php");
        ?>



        <!-- Footer Start -->

        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->
</div>
<!-- Right Sidebar -->

<div class="modal fade" id="userConfirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to submit quiz?</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onClick="submitQuiz()">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
    $("#userConfirmationModal").modal();
</script>
<script src="js/user-session.js"></script>

<?php require_once('include/footer.php'); ?>