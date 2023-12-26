<?php

require_once("include/header.php");
include_once('./include/session.php');
//include_once('include/connection.php');
require_once("./include/pagination.php"); 

// $data = getSpecificData();
if (isset($_GET['id'])) {

    $cid = $_GET['id'];
    $status=1;
    global $dbh;
    $sql = "SELECT * from flash_card_master where id = :cid";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':cid', $cid, PDO::PARAM_INT);
    $stmt->execute();
    $result1 = $stmt->fetch(PDO::FETCH_ASSOC);

    $sql_que = "SELECT id from flash_card_question where card_id = :cid and status = :status";
    $stmt_que = $dbh->prepare($sql_que);
    $stmt_que->bindParam(':cid',$cid,PDO::PARAM_INT);
    $stmt_que->bindParam(':status',$status,PDO::PARAM_INT);
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

    $limit = config("pagination","flashcard"); 
    $offset = 0;
    $deleted = 0;
    $status = 1;
    // Count of all records 
    $query   = "SELECT distinct count(*) as rowNum FROM flash_card_master WHERE deleted=:deleted and status=:status"; 
    $stmt = $dbh->prepare($query);
    $stmt->execute(array(
        ":deleted" => $deleted,
        ":status" => $status
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
    $sql = "SELECT * FROM flash_card_master WHERE deleted=:deleted and status=:status ORDER BY id desc LIMIT $offset, $limit";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":deleted" => $deleted,
        ":status" => $status
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
                    <div class="fs-5"><em class="bi bi-wallet2"></em><?php echo " ";
                                                                        echo TITLE_FLASHCARDS; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-award-fill"></i>
                                </li> -->
                                <!-- <li class="breadcrumb-item active" aria-current="page"><?php echo _Quiz; ?></li> -->

                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- end page title -->
                <div class="main-title card p-2">
                        <h2 class="mb-0 text-success" style="color:#0CB04A;">
                            <?php if (isset($_GET['id'])) {
                                echo $result1['category_title'];
                                } else{
                                    echo FLASHCARD_PANEL;
                                }
                            ?>
                        </h2>
                </div>  
            <div class="quiz-gallery" id="dataContainer">
                <div class="container">
                    <div class="row">
                        <?php
                        foreach($result as $key => $row){
                            ?>
                            <?php

                            echo '
                                <div class="col-4" onclick="card(' . $row['id'] . ')">
                                        <div class="lightboxContainer h-75 w-100">
                                        <img id="myImg" class="img-fluid h-100 w-100 quizimg" src="./photos/flashcard/' . $row['category_image'] . '">
                                        </div>
                                
                                    <a href="javascript: void(0);">' . $row['category_title'].'</a>
                                    <div>
                                </div>
                                </div>
                            ';
                        }
                        ?>
                    </div>
                    <?php echo $pagination->createLinks(); ?> 
                </div>
            </div>
        
        </div>

    </div>

</div>
</div>

<script>
function card(id){
    window.location.href = "index.php?page=flashcard&id="+id;
}
function columnSorting(page_num){
    page_num = page_num?page_num:0;
    
    $.ajax({
        type: 'POST',
        url: 'domain/index.php?page=flashcard-process',
        data:'page='+page_num+'&action=list',
        beforeSend: function () {
            displayLoader();
        },
        success: function (html) {
            $('#dataContainer').html(html);
            
            // if(coltype != '' && colorder != ''){
            //     $( "th.sorting" ).each(function() {
            //         if($(this).attr('coltype') == coltype){
            //             $(this).attr("colorder", colorder);
            //             $(this).removeClass(classRemove);
            //             $(this).addClass(classAdd);
            //         }
            //     });
            // }
            
            hideLoader();
        }
    });
}

</script>