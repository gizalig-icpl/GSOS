<?php
include_once('include/session.php');

require_once("include/header.php");
include_once('include/connection.php');
require_once("domain/quiz-report.php");
include_once('./domain/fetch-category.php');
require_once('password-change.php');

$certificate_count=0;
$user_id=$_SESSION['id'];
$results = getData($user_id);
// $data = getSpecificData();
$notifications = getcountNotifications($user_id);
$unread_notifications = count($notifications);
$notifications = readNotifications($user_id);
$read_notifications = count($notifications);

  foreach($results as $key => $result){ 
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
  if($per>=$result1['min_score']){ $certificate_count++;}
} 
// $category_id= $result[$i]['category_id'];
// $stmt = $dbh->query("SELECT min_score FROM category_master WHERE category_id = $category_id");
// $result1 = $stmt->fetch(PDO::FETCH_ASSOC);
// $stmt1 = $dbh->query("SELECT COUNT(*) AS total_questions FROM question_master WHERE category_id = $category_id");
// $result2 = $stmt1->fetch(PDO::FETCH_ASSOC);
// $per=($result[$i]['correct_ans']*100)/$result2['total_questions'];
// if($per>=$result1['min_score']){ $certificate_count++;}

?>

<?php
$sql = "SELECT is_first_login FROM users WHERE id=:id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":id" => $user_id
));
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if($result['is_first_login']=='yes'){
?>
<script>
    $(window).on('load', function() {
        $('#changePassword').modal('show');
    });
</script>
<?php
}

?>
<!-- Begin page -->
<title><?php echo TITLE_DASHBOARD?></title>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Total Certificate</p>
                          <a href="index.php?page=user-quiz-report"><h4 class="mb-0 count"><?php echo $certificate_count; ?></h4></a>
                          <p class="mb-0 mt-2 font-13"></i><span>0.0% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-primary text-white">
                          <em class="bi bi-award"></em>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Total Training</p>
                          <h4 class="mb-0 count">0</h4>
                          <p class="mb-0 mt-2 font-13"></i><span>0.0% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                          <em class="bi bi-mortarboard-fill"></em>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Total Course</p>
                          <h4 class="mb-0 count">0</h4>
                          <p class="mb-0 mt-2 font-13"></i><span>0.0% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-orange text-white">
                          <em class="bi bi-card-text"></em>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Read Notification</p>
                          <h4 class="mb-0 count"><?php echo $read_notifications; ?></h4>
                          <p class="mb-0 mt-2 font-13"></i><span>0.0% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-success text-white">
                          <em class="bi bi-bell-fill"></em>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
                 <div class="col">
                  <div class="card rounded-4">
                    <div class="card-body">
                      <div class="d-flex align-items-center">
                        <div class="">
                          <p class="mb-1">Un-Read Notification</p>
                          <h4 class="mb-0 count"><?php echo $unread_notifications; ?></h4>
                          <p class="mb-0 mt-2 font-13"></i><span>0.0% from last week</span></p>
                        </div>
                        <div class="ms-auto widget-icon bg-orange text-white">
                          <em class="bi bi-bell-fill"></em>
                        </div>
                      </div>
                    </div>
                  </div>
                 </div>
             </div><!--end row-->
             <div class="row row-cols-1 row-cols-lg-2">
              <div class="col d-flex">
                 <div class="card rounded-4 w-100">
                  <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                      <h6 class="mb-0"><?php echo CARDS_LATEST_NEWS; ?></h6>
                     </div>
                     <div class="social-leads">
                     <div class="d-flex align-items-center gap-3">
                          <!-- <div class="widget-icon bg-facebook text-white">
                            <i class="bi bi-facebook"></i>
                          </div> -->
						  <div class="flex-grow-1"><p class="mb-0"><?php echo BTN_NEWS; ?>
</p></div>
                          <div class="leads-count">
                             <p class="mb-0">Author</p>
                          </div>
                         </div>
                         <hr>
                         <?php
                         $sql = "SELECT * FROM news ORDER BY id desc limit 5";
                         $stmt = $dbh->prepare($sql);
                         $stmt->execute();
                       
                         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                         for ($i = 0; $i < count($result); $i++) {
                         ?>
                         <div class="d-flex align-items-center gap-3">
                          <div class="widget-icon">
                            <!-- <i class="bi bi-newspaper"></i> -->
                            <img src="<?php echo "compliance/images/".$result[$i]['image']?>"	 class="d-block w-100 widget-icon">
                          </div>
						  <div class="flex-grow-1"><p class="mb-0 text-truncate fw-semibold" style='max-width: 280px'><?php echo $result[$i]['title']; ?></p></div>
                          <div class="leads-count">
                             <p class="mb-0 text-wrap" style='max-width: 58px'><?php echo $result[$i]['author']; ?></p>
                          </div>
                         </div>
                         <hr>
                         <?php
                         }
                         ?>
                        <div class="d-flex align-items-center gap-3">
                                  <!-- <div class="widget-icon bg-light-primary text-primary">
                                    <i class="bi bi-newspaper"></i>
                                  </div> -->
                      <div class="flex-grow-1"><p class="mb-0 text-truncate fw-semibold" style='max-width: 280px'></p></div>
                          <div class="leads-count">
                             <p class="mb-0 text-wrap" style='max-width: 58px'><a href="index.php?page=compliance/newspage">More News</a></p>
                          </div>
                         </div>
                     </div>
                  </div>
                 </div>
              </div>
              <div class="col d-flex">
                <div class="card rounded-4 w-100">
                 <div class="card-body">
                   <div class="d-flex align-items-center mb-3">
                     <h6 class="mb-0">Quiz History</h6>
                    </div>
                    <?php
                    $sql = "SELECT * FROM quiz_master WHERE author_id = :id ORDER BY id desc limit 5";
                    $stmt = $dbh->prepare($sql);
                    $stmt->execute(array(
                      ":id" => $_SESSION["id"]
                    ));
                  
                    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <div class="table-responsive">
                      <table class="table align-items-center">
                        <thead>
                          <tr>
                            <th>Quiz</th>
                            <th>Date</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                      <tbody>
                        <?php
                        foreach($results as $key => $result){ 
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
                          echo "<tr>";
                          echo "<td class='text-truncate' style='max-width: 200px'>" . $result1['category_title'] . "</td>";

                          echo "<td>" . $result['quiz_time'] . "</td>";
                          echo "<td>" . $status . "</td>"; 
            
                          echo "</tr>";
                  } 
                        ?>
                     

                    </tbody></table>
                    </div>
                 </div>
                </div>
             </div>

            </div><!--end row-->
            <!-- <div class="row row-cols-1 row-cols-lg-2">
                <?php //include("widgets/leaderboard.php"); ?>
            </div> -->
            <br><br>
   
            <div id="kpi_dash_cont">
                <div class="grid-stack representation-container">
                    <!-- <div id="chart1"></div> -->
                </div>
             </div>



            <!-- end row -->

        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            </div>
            <form method="post">
                <div class="modal-body">
                <label class="form-label">Please change temporary password and login with new password.</label>   
                <div class="form-group m-0" style="position: relative;">
                    <label class="form-label">Password</label>&nbsp
                    <span data-bs-toggle="tooltip" data-bs-placement="right" title="The password should be at least 8 characters long.&#010;The password should contain at least one uppercase letter.&#010;The password should contain at least one lowercase letter.&#010;The password should contain at least one special character.The password should contain at least one one number."><em class="bi bi-info-circle-fill"></em></span>
                    <input data-test-id="password1" id="password-field1" onkeyup="passwordStrength(this.value,0,true)" class="form-control form-control-sm" type="password" placeholder="Password" name="password" autocomplete="off"> 
                </div>
                <div class="progress" id="passwordDescription"></div>
                <div class="form-group m-0" style="position: relative;">
                    <label class="form-label">Confirm Password</label>
                    <input data-test-id="password2" id="password-field2" onkeyup="passwordStrength(this.value,0,false)" class="form-control form-control-sm" type="password" placeholder="Password" name="comfirmpassword" autocomplete="off"> 
                </div>
                </div>
                <div class="modal-footer" id="changepass">
                    <input data-test-id="change" type="submit" name="changepass" disabled class="btn btn-primary" value="Change">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#generate_kpi').click(function() {
        let date1 = $("#date1").val()
        let date2 = $("#date2").val()
        let month1 = new Date(date1).getMonth() + 1;
        let month2 = new Date(date2).getMonth() + 1;
        let year1 = new Date(date1).getFullYear();
        let year2 = new Date(date2).getFullYear();
        // console.log(month1,year1,month2,year2);
        kpiFilter(year1, month1, year2, month2);
    });
</script>
<?php
require_once("include/footer.php");
?>