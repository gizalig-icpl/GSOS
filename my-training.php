<?php
     
    require_once("include/header.php");
    include_once('./include/session.php');
	include_once('include/connection.php');
?>

<!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
        <div class="page-content">
             <!--new breadcrumb-->
					<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="fs-5"><em class="bi bi-file-font"></em><?php echo " "; echo _Training;?></div>
                    <div class="ps-3 text-end w-50">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $status=1;
                            $sql = "SELECT (SELECT COUNT(*) FROM user_training_detail WHERE status=:status AND training_id=:training_id)as total_complete,(SELECT COUNT(*) FROM topic  WHERE training_id=:training_id) as total_topic";
                            $stmt = $dbh->prepare($sql);
                            $stmt->bindParam(':status',$status,PDO::PARAM_INT);
                            $stmt->bindParam(':training_id',$_GET['id'],PDO::PARAM_INT);
                            $stmt->execute();
                            
                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            echo $result[0]['total_complete']." of ".$result[0]['total_topic']." complete.";
                        }
                        ?>
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><i class="bi bi-info-square-fill"></i>
                                </li>
                                
                                 <li class="breadcrumb-item active" aria-current="page">Training</li>

                            </ol>
                        </nav> -->
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
                               
                                <h4 class="page-title"><?php echo _Training;?></h4>
                            </div>
                        </div>
                    </div> -->
            <div class="main-title card p-2">
                <h2 class="mb-0 text-success"><?php echo MY_TRAINING; ?></h2>
            </div>
            <div class="content card card-body">

                <!-- Start Content-->
                <div class="container-fluid" >
                <?php
                if(!isset($_GET['id'])){
                ?>
                <div class="table-responsive mt-3">
                     <table class="table align-middle table-hover">
                       <thead class="table-secondary">
                         <tr>
                          <th>No</th>
                          <th>Training</th>
                          <th>Time</th>
                          <th>Status</th>
                         </tr>
                       </thead>
                       <tbody>
                        <?php
                        $sql = "SELECT t.*,ta.* FROM training as t,training_assign as ta where t.training_id=ta.training_id and ta.user_id=$_SESSION[id] and ta.start_date<=CURDATE() and ta.end_date>=CURDATE() order by ta.id desc";
                        $stmt = $dbh->prepare($sql);
                        $stmt->execute();
                        
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        for($i=0;$i<count($result);$i++){
                        ?>
                         <tr onclick="redirect(<?php echo $result[$i]['training_id'] ?>)">
                          <td><?php echo $i+1 ?></td>
                           <td>
                             <?php echo $result[$i]['title']; ?>
                           </td>
                           <?php
                            $sql1 = "SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(training_time))) AS totaltime FROM topic where training_id = '".$result[$i]['training_id']."' ";
                            $stmt1 = $dbh->prepare($sql1);
                            $stmt1->execute();
                            
                            $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
                           ?>
                           <td><?php echo $result1[0]['totaltime']; ?></td>
                           <?php
                           $topic_sql = "SELECT * FROM topic where training_id=:training_id";
                           $topic_stmt = $dbh->prepare($topic_sql);
                           $topic_stmt->bindParam(':training_id',$result[$i]['training_id'],PDO::PARAM_INT);
                           $topic_stmt->execute();
                           $topic_result = $topic_stmt->fetchAll(PDO::FETCH_ASSOC);

                            $user_sql = "SELECT count(*) as total,count(case when status = 1 then 1 end) as done,count(case when status = 0 then 1 end) as pending FROM user_training_detail where user_id = :user_id and training_id=:training_id";
                            $user_stmt = $dbh->prepare($user_sql);
                            $user_stmt->bindParam(':user_id',$_SESSION['id'],PDO::PARAM_INT);
                            $user_stmt->bindParam(':training_id',$result[$i]['training_id'],PDO::PARAM_INT);
                            $user_stmt->execute();
                            $user_result = $user_stmt->fetchAll(PDO::FETCH_ASSOC);

                            if($user_result[0]['total']==0){$statuss="Start";$class="btn-primary";}
                            elseif(count($topic_result)==$user_result[0]['done']){$statuss="Done";$class="btn-success";}else{$statuss="Pending";$class="btn-warning";};
                           ?>
                           <td><a onclick="redirect(<?php echo $result[$i]['training_id'] ?>)" class="btn btn-sm <?php echo $class; ?>"><?php echo $statuss; ?></a></td>
                         </tr>
                         <?php
                         }
                         ?>
                       </tbody>
                     </table>
                   </div>

                   <?php
                   }
                   if(isset($_GET['id'])){
                   ?>
                   <div style="width:80%;">

                   <div id="video_div" style="display: none;">
                   <video height="100%" width="100%" id="myVideo1" style="display: none;" controls>
                        <source src="" id="mp4Source" type="video/mp4">
                    </video>
                    <embed src="" id="pdf_content" style="display: none;" class="w-100" height= "400"></embed>
                   </div>
                   </div>
               <div style = "float: right;width: 19%;">
                           <div class="left-side-menu" >

                <div class="slimscroll-menu">
    
                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
    
                    <div class="table-responsive mt-3">
                     <table class="table align-middle table-hover" id="topictable">
                       <!-- <thead class="table-secondary">
                         <tr>
                          <th>NO</th>
                          <th>Topic</th>
                          <th>Time</th>
                         </tr>
                       </thead> -->
                       <tbody class="row_position">
                        <?php
                        $sql = "SELECT * FROM topic where training_id = :training_id order by position_order";
                        $stmt = $dbh->prepare($sql);
                        $stmt->bindParam(':training_id',$_GET['id'],PDO::PARAM_INT);
                        $stmt->execute();
                        
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        $auto_content=1;
                        for($i=0;$i<count($result);$i++){
                            $topic_id=$result[$i]['topic_id'];
                        ?>
                         <tr id="<?php echo $result[$i]['topic_id'] ?>" onclick="content('<?php echo $result[$i]['path'] ?>','<?php echo $result[$i]['type'] ?>','<?php echo $_SESSION['id'] ?>','<?php echo $_GET['id'] ?>','<?php echo $result[$i]['topic_id'] ?>',1);completed_training('<?php echo $_SESSION['id'] ?>','<?php echo $_GET['id'] ?>','<?php echo $result[$i]['topic_id'] ?>',0);" class="cursor-pointer">
                          <!-- <td><?php echo $i+1 ?></td> -->
                          <td class="text-white">
                            <?php
                            $status=1;
                            $user_sql = "SELECT * FROM user_training_detail where user_id = :user_id and training_id=:training_id and topic_id=:topic_id and status=:status";
                            $user_stmt = $dbh->prepare($user_sql);
                            $user_stmt->bindParam(':user_id',$_SESSION['id'],PDO::PARAM_INT);
                            $user_stmt->bindParam(':training_id',$_GET['id'],PDO::PARAM_INT);
                            $user_stmt->bindParam(':topic_id',$topic_id,PDO::PARAM_INT);
                            $user_stmt->bindParam(':status',$status,PDO::PARAM_INT);
                            $user_stmt->execute();
                            
                            $user_result = $user_stmt->fetchAll(PDO::FETCH_ASSOC);
                            if(count($user_result)>0)
                            {
                                ?>
                                <i class="bi bi-check-circle-fill text-success"></i>
                                <?php
                            }
                            else{
                                if($auto_content==1)
                                {
                                    ?>
                                    <script>
                                    window.onload = (event) => {
                                        content('<?php echo $result[$i]['path'] ?>','<?php echo $result[$i]['type'] ?>','<?php echo $_SESSION['id'] ?>','<?php echo $_GET['id'] ?>','<?php echo $result[$i]['topic_id'] ?>',1);
                                    };  
                                    </script>
                                    <?php
                                    $auto_content=0;
                                }

                            ?>
                             <input type="checkbox" title="Not Completed" <?php if($result[$i]['type']!=3){ ?>onclick="sweet('<?php echo $_SESSION['id'] ?>','<?php echo $_GET['id'] ?>','<?php echo $result[$i]['topic_id'] ?>',1) "<?php } ?>>
                             <?php
                             }
                             ?>
                           </td>
                           <td class="text-white" title="<?php echo $result[$i]['title']; ?>">
                             <span class="d-inline-block overflow-hidden" style="text-overflow: ellipsis; width:100px;"><?php echo $result[$i]['title']; ?></span>
                           </td>
                           <td class="text-white"><?php echo $result[$i]['training_time']; ?></td>
                         </tr>
                         <?php
                         }
                         ?>
                         <!-- <tr onclick="redirect_quiz('quiz.php')" class="cursor-pointer">
                          <td><?php echo $i+1 ?></td>
                           <td>
                             Quiz
                           </td>
                           <td>--</td>
                         </tr> -->
                       </tbody>
                     </table>
                   </div>
    
                    </div>
                    <!-- End Sidebar -->
    
                   
    
                </div>
                <!-- Sidebar -left -->
    
            </div>
               <?php
               }
               ?>
               
               <!-- new video player -->
              <!-- <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                </div> -->
             <!-- end new video player -->
				</div>
				
                <!-- end container-fluid -->
                
                    <div id="div_vid" style="display:none;float:left;width: 82%;margin-top:-18% ">
                    <video height="550" width="540" id="myVideo1" controls>
                        <source src="./photos/training/SIDBI-IS Awareness Training.mp4" id="mp4Source" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
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

function sweet(user_id,training_id,topic_id,status)
{
    swal({
            title: "Are you sure?",
            text: "Do you want to complete the topic?",
            type: "success",
            showCancelButton: true,
            // confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            showclosebutton: true
            }).then(function(result){
            if (result.value) {
                completed_training(user_id,training_id,topic_id,status);
            } else {
                return false;
            }
            });
}

function openFullscreen() {
    var elem = document.getElementById("video_div");
  if (elem.requestFullscreen) {
    elem.requestFullscreen();
  } else if (elem.webkitRequestFullscreen) { /* Safari */
    elem.webkitRequestFullscreen();
  } else if (elem.msRequestFullscreen) { /* IE11 */
    elem.msRequestFullscreen();
  }
}

function redirect(id){
    window.location='index.php?page=training&id='+id;
}
function content(path,type,user_id,training_id,topic_id,status){

    if(type==1)
    {
        var player=document.getElementById('myVideo1');
        var mp4Vid = document.getElementById('mp4Source');
        $('#video_div').css("display", "block");
        $('#myVideo1').css("display", "block");
        $('#pdf_content').css("display", "none");
        $(mp4Vid).attr('src', path);
        player.load();
        player.play();
        player.addEventListener('ended', function () {
        
        completed_training(user_id,training_id,topic_id,status);
        
        });
    }
    if(type==2)
    {
        var player=document.getElementById('myVideo1');
        var pdf = document.getElementById('pdf_content');
        $('#video_div').css("display", "block");
        $('#myVideo1').css("display", "none");
        $('#pdf_content').css("display", "block");
        $(pdf).attr('src', path+"#toolbar=0");
        player.pause();
    }
    if(type==3)
    {
        swal({
            title: "Are you sure?",
            text: "do you want to start quiz?",
            type: "success",
            showCancelButton: true,
            // confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            showclosebutton: true
            }).then(function(result){
            if (result.value) {
                completed_training(user_id,training_id,topic_id,0);
                var url="index.php?page=quiz&id="+path;
                redirect_quiz(url);
            } else {
                return false;
            }
        });
    }
    
}
function redirect_quiz(path){
    window.location=path;
}
function playvideo(path) {
var player=document.getElementById('myVideo1');
   var mp4Vid = document.getElementById('mp4Source');
   $('#div_vid').css("display", "block");
   $(mp4Vid).attr('src', path);
      player.load();
      player.play();
}
</script>
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

<script>
function completed_training(user_id,training_id,topic_id,status)
{
    $.ajax({
        url: 'user-training-details.php',
        type: 'POST',
        data: {user_id:user_id,training_id:training_id,topic_id:topic_id,status:status},
        success: function() {
            if(status==1)
            {
                location.reload();
            }
           
        }
    });
}
</script>