<?php
    require_once("include/meta.php"); 
    require_once("include/header.php");
    include_once('./include/session.php');
    include_once('include/connection.php');
    require_once("./include/pagination.php"); 

    // include_once('./domain/fetch-category1.php');
    // $data = getSpecificData();
    if(isset($_GET['id'])){

    $cid = purifier($_GET['id']);

    global $dbh;

    $sql = "SELECT category_master.*,campaign_manager.id as campaign_id from category_master,campaign_manager WHERE category_master.category_id = campaign_manager.category_id and campaign_manager.user_id = :user_id and date(NOW()) between campaign_manager.startdate and campaign_manager.enddate and campaign_manager.id not in (select quiz_master.campaign_id from quiz_master where quiz_master.author_id = :user_id) and category_master.deleted='0' and category_master.category_id = :cid";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(array(
        ":cid" => $cid,
        ":user_id" => $_SESSION['id']
    ));
    $stmt->execute();

    $result1 = $stmt->fetch(PDO::FETCH_ASSOC);
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

    $limit = config("pagination","campaignquiz"); 
    $offset = 0;
    $deleted = 0;
    // Count of all records 
    $query   = "SELECT distinct count(*) as rowNum FROM category_master,campaign_manager WHERE category_master.category_id = campaign_manager.category_id and campaign_manager.user_id = :user_id and date(NOW()) between campaign_manager.startdate and campaign_manager.enddate and campaign_manager.id not in (select quiz_master.campaign_id from quiz_master where quiz_master.author_id = :user_id) and category_master.deleted=:deleted"; 
    $stmt = $dbh->prepare($query);
    $stmt->execute(array(
        ":deleted" => $deleted,
        ":user_id" => $_SESSION['id']
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
    $sql = "SELECT distinct category_master.category_id,category_title,category_image,video_url FROM category_master,campaign_manager WHERE category_master.category_id = campaign_manager.category_id and campaign_manager.user_id = :user_id and date(NOW()) between campaign_manager.startdate and campaign_manager.enddate and campaign_manager.id not in (select quiz_master.campaign_id from quiz_master where quiz_master.author_id = :user_id) and category_master.deleted=:deleted order by category_master.category_id desc LIMIT $offset, $limit";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":deleted" => $deleted,
        ":user_id" => $_SESSION['id']
    ));

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    <div class="fs-5"><em class="bi bi-ui-checks-grid"></em>
                        <?php echo " ";
                        echo _Campaign_Quiz; ?>
                    </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="main-title card p-2">
                    <h2 class="mb-0 text-success">
                        <?php if (isset($_GET['id'])) {
                            echo $result1['category_title'];
                        } else{
                            echo _Assigned_Campaign;
                        } ?>
                    </h2>
                    <button class="btn btn-danger" id="end-btn">
                        <?php echo _End;
                        echo " ";
                        echo _Quiz; ?>
                    </button>
                </div>
                <br>
                <?php if (isset($_GET['id'])) { ?>
                    <div class="kpi-form-heading">
                        <?php echo _Personal;
                        echo " ";
                        echo _Details; ?>
                    </div>
                    <div class="kpi-form">

                        <form class="quiz-form">
                            <input type="hidden" name="campaign_id" id="campaign_id"
                                value="<?php echo $result1['campaign_id']; ?>">

                            <div id="quiz-component">

				  </form>
                  
				</div>
				</div>
               
                <?php }else{ ?>
                    <div class="quiz-gallery" id="dataContainer">
                    <div class="container">
                        <div class="row">
                            <?php

								if(!empty($result)) {
                                    foreach($result as $key => $row){
                                   echo '  <div class="col-4">
                                   <a href="./index.php?page=quiz&id=' . $row['category_id'] . '">
                                       <img class="img-fluid h-75 w-100" src="./photos/quiz/' . $row['category_image'] . '">
                                   </a>
                                   <div>
                                   <a href="./index.php?page=quiz&id=' . $row['category_id'] . '">' . $row['category_title'] . '</a>&emsp;&emsp;<a href="javascript: void(0);" onclick="openVideoBox(' . $row['category_id'] . ',\'' . $row['video_url'] . '\')">
                                       <img class="m-30" src="videos/videoicon.gif" style="max-width:30px; max-height:30px;">
                                   </a>
                                   </div>
                               </div>
                           ';
                                }
                            } else {
                                ?>
                                <h4>
                                    <?php echo _Currently_there_are_no_Campaign_Quiz_for_you; ?>
                                </h4>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php echo $pagination->createLinks(); ?> 
                    </div>
                    </div>
                    <!-- <div class="quizvideo">
                        <video id="myVideo" style="width:500px;" src="videos/demo.mp4" controls="true"></video>
                        <img src="images/close.png" class="close" onclick="closeVideoBox()">
                        <?php echo '' ?>
                        <input type="hidden" name="quiz_category_id" id="quiz_category_id">
                    </div> -->
                    <?php } ?>
                <!-- end container-fluid -->

            </div>
            <!-- end content -->

            

            <!-- Footer Start -->
            <?php 
            // include("include/copyright-footer.php"); 
            ?>
            <!-- end Footer -->

        </div>
        <!-- end content -->



        <!-- Footer Start -->
        <?php
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
?>
<?php 
    // include "include/theame-cutomizer.php";
    ?>
    <script>
        function columnSorting(page_num){
    page_num = page_num?page_num:0;
    
    $.ajax({
        type: 'POST',
        url: 'domain/index.php?page=campaignquiz-process',
        data:'page='+page_num+'&action=list',
        beforeSend: function () {
            displayLoader();
        },
        success: function (html) {
            $('#dataContainer').html(html);
            hideLoader();
        }
    });
}
</script>