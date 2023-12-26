<?php
require_once('include/session.php');

require_once("include/header.php");
require_once('include/connection.php');
// error_reporting(E_ERROR | E_PARSE);//to avoid warning while user login first time on these page

?>
<?php
$id = $_SESSION["id"];
// $role = $_SESSION["role"];
// // $auth = $_SESSION["authorization"];
// // $priv = $_SESSION["Privilege"];
// $priv=$_SESSION['privilege']['War'];
// // echo $id;
// // echo $auth;
// // echo $p11."///";
// // echo $id;
// $Quiz = '0';
// $Security = '0';
// $Tabletop = '0';
// $Compliance = '0';
// $Simplerisk = '0';
// if (isset($_SESSION['authorization'])) {
//   $auth = json_decode($_SESSION['authorization'], true);
//   $Quiz = $auth['Quiz'];
//   $Security = $auth['Security'];
//   $Tabletop = $auth['Tabletop'];
//   $Compliance = $auth['Compliance'];
//   $Simplerisk = $auth['Simplerisk'];
// }
// echo "---";
// echo $_SESSION['privilege']['Vission'];
// echo $_SESSION['privilege']['War'];
// echo "---";
?>
<?php
$sql = "SELECT notification_preference FROM users WHERE id=:id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
  ":id" => $id
));
$status = $stmt->fetchAll(PDO::FETCH_ASSOC);

$arr = json_decode($status[0]['notification_preference'], true);


?>

<div class="wrapper">
  <div class="page-content">


    <div class="main-title card p-2" >
      <h2 class="text-success" style=""><em class="bi bi-bell-fill"></em> Notification Preferences</h2>
    </div>

    <!--new -->
    <form method="post">
      <div class="card radius-10">
        <div class="card-body">

          <h5 class="card-title">All Notification</h5>
          <div class="py-3 border-top">
            <button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingzero">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsezero" aria-expanded="true" aria-controls="collapsezero">
                <?php echo BADGE_USER_MANAGEMENT; ?>
                </button>
              </h2>
              <div id="collapsezero" class="accordion-collapse collapse show" aria-labelledby="headingzero" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                <?php if ($_SESSION['role'] == 1) { ?>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Add User</label></div>
                      <div class="form-check form-switch col-sm-1">

                        <input name="add_user" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['add_user'] == 1 ? "checked" : "") ?>>
                        <!-- <input type="checkbox" name="vision_mission" data-toggle="toggle" data-on="Enabled" data-off="Disabled" <?php echo ($arr['preferences']['vision-mission'] == 1 ? "checked" : "") ?>> -->

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Delete User</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="delete_user" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['delete_user'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >SMTP config</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="smtp_config" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['smtp_config'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                <?php } ?>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Submit Profile</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="submit_profile" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['submit_profile'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                  
                </div>
              </div>
            </div>
            <!-- <?php print_r($_SESSION['privilege']); ?> -->
            <?php if($_SESSION['privilege']['Vission'] == "1"){?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingzero">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                  Vision Mission
                </button>
              </h2>
              <div id="collapseone" class="accordion-collapse collapse" aria-labelledby="headingone" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >Update Vision Mission</label></div>
                    <div class="form-check form-switch col-sm-1">

                      <input name="vision_mission" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['vision-mission'] == 1 ? "checked" : "") ?>>
                      <!-- <input type="checkbox" name="vision_mission" data-toggle="toggle" data-on="Enabled" data-off="Disabled" <?php echo ($arr['preferences']['vision-mission'] == 1 ? "checked" : "") ?>> -->

                    </div>
                  </div>
                </div>
              </div>
            </div>
           <?php }?>
           <?php if($_SESSION['privilege']['Polices'] == "1"){?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingtwo">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                    Compliance
                  </button>
                </h2>
                <div id="collapsetwo" class="accordion-collapse collapse " aria-labelledby="headingtwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" ><?php echo DD_ADD_POLICY; ?></label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="add_policy" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['add_policy'] == 1 ? "checked" : "") ?>>
                        <!-- <input type="checkbox" name="compliance" data-toggle="toggle" data-on="Enabled" data-off="Disabled" <?php echo ($arr['preferences']['add_policy'] == 1 ? "checked" : "") ?>> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Review Policy</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="review_policy" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['review_policy'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Approve Policy</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="approve_policy" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['approve_policy'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Policy Lifecycle</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="policy_lifecycle" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['policy_lifecycle'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" ><?php echo DD_ADD_PROCEDURE; ?></label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="add_procedure" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['add_procedure'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Review Procedure</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="review_procedure" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['review_procedure'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Approve Procedure</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="approve_procedure" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['approve_procedure'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-11"><label class="form-check-label" >Procedure Lifecycle</label></div>
                      <div class="form-check form-switch col-sm-1">
                        <input name="procedure_lifecycle" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['procedure_lifecycle'] == 1 ? "checked" : "") ?>>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php }?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingthree">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                  Simplerisk
                </button>
              </h2>
              <div id="collapsethree" class="accordion-collapse collapse " aria-labelledby="headingthree" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >Simplerisk</label></div>
                    <div class="form-check form-switch col-sm-1">
                      <input name="simplerisk" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['simplerisk'] == 1 ? "checked" : "") ?>>
                      <!-- <input type="checkbox" name="simplerisk" data-toggle="toggle" data-on="Enabled" data-off="Disabled" <?php echo ($arr['preferences']['simplerisk'] == 1 ? "checked" : "") ?>> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingfour">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                  security
                </button>
              </h2>
              <div id="collapsefour" class="accordion-collapse collapse " aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >security</label></div>
                    <div class="form-check form-switch col-sm-1">
                      <input name="security" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['security'] == 1 ? "checked" : "") ?>>
                      <!-- <input type="checkbox" name="security" data-toggle="toggle" data-on="Enabled" data-off="Disabled" <?php echo ($arr['preferences']['security'] == 1 ? "checked" : "") ?>> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php if($_SESSION['privilege']['Awarness'] == "1"){?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingfive">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                <?php echo CARDS_SECURITY_AWARENESS; ?>
                </button>
              </h2>
              <div id="collapsefive" class="accordion-collapse collapse " aria-labelledby="headingfive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >Add Topic</label></div>
                    <div class="form-check form-switch col-sm-1">
                      <input name="add_topic" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['add_topic'] == 1 ? "checked" : "") ?>>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >Upload Quiz</label></div>
                    <div class="form-check form-switch col-sm-1">
                      <input name="upload_quiz" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['upload_quiz'] == 1 ? "checked" : "") ?>>
                      <!-- <input type="checkbox" name="quiz" data-toggle="toggle" data-on="Enabled" data-off="Disabled" <?php echo ($arr['preferences']['quiz'] == 1 ? "checked" : "") ?>> -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >Update Quiz</label></div>
                    <div class="form-check form-switch col-sm-1">
                      <input name="update_quiz" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['update_quiz'] == 1 ? "checked" : "") ?>>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >Delete Quiz</label></div>
                    <div class="form-check form-switch col-sm-1">
                      <input name="delete_quiz" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['delete_quiz'] == 1 ? "checked" : "") ?>>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >Complete Quiz</label></div>
                    <div class="form-check form-switch col-sm-1">
                      <input name="complete_quiz" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['complete_quiz'] == 1 ? "checked" : "") ?>>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php if($_SESSION['privilege']['War'] == "1"){?>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingsix">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesix" aria-expanded="true" aria-controls="collapsesix">
                  Tabletop Execrise
                </button>
              </h2>
              <div id="collapsesix" class="accordion-collapse collapse " aria-labelledby="headingsix" data-bs-parent="#accordionExample">
                <div class="accordion-body">

                  <div class="row">
                    <div class="col-sm-11"><label class="form-check-label" >Complete Execrise</label></div>
                    <div class="form-check form-switch col-sm-1">
                      <input name="complete_execrise" class="form-check-input" type="checkbox" role="switch"  <?php echo ($arr['preferences']['complete_execrise'] == 1 ? "checked" : "") ?>>
                      <!-- <input type="checkbox" name="tabletop" data-toggle="toggle" data-on="Enabled" data-off="Disabled" <?php echo ($arr['preferences']['tabletop'] == 1 ? "checked" : "") ?>> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <?php } ?>
          </div>
        </div>
      </div>
    </form>

    <!--end new-->

  </div>
</div>

<?php
if (isset($_POST['submit'])) {
  $add_user = isset($_POST['add_user']) ? 1 : 0;
  $delete_user = isset($_POST['delete_user']) ? 1 : 0;
  $smtp_config = isset($_POST['smtp_config']) ? 1 : 0;
  $submit_profile = isset($_POST['submit_profile']) ? 1 : 0;

  $vision_mission = isset($_POST['vision_mission']) ? 1 : 0;

  $add_policy = isset($_POST['add_policy']) ? 1 : 0;
  $review_policy = isset($_POST['review_policy']) ? 1 : 0;
  $approve_policy = isset($_POST['approve_policy']) ? 1 : 0;
  $policy_lifecycle = isset($_POST['policy_lifecycle']) ? 1 : 0;
  $add_procedure = isset($_POST['add_procedure']) ? 1 : 0;
  $review_procedure = isset($_POST['review_procedure']) ? 1 : 0;
  $approve_procedure = isset($_POST['approve_procedure']) ? 1 : 0;
  $procedure_lifecycle = isset($_POST['procedure_lifecycle']) ? 1 : 0;

  $simplerisk = isset($_POST['simplerisk']) ? 1 : 0;
  $security = isset($_POST['security']) ? 1 : 0;

  $add_topic = isset($_POST['add_topic']) ? 1 : 0;
  $upload_quiz = isset($_POST['upload_quiz']) ? 1 : 0;
  $update_quiz = isset($_POST['update_quiz']) ? 1 : 0;
  $delete_quiz = isset($_POST['delete_quiz']) ? 1 : 0;
  $complete_quiz = isset($_POST['complete_quiz']) ? 1 : 0;

  $complete_execrise = isset($_POST['complete_execrise']) ? 1 : 0;

  $preference = [];

  $preference["preferences"] = [
    'add_user' => $add_policy,
    'delete_user' => $delete_user,
    'smtp_config' => $smtp_config,
    'submit_profile' => $submit_profile,

    'vision-mission' => $vision_mission,

    'add_policy' => $add_policy,
    'review_policy' => $review_policy,
    'approve_policy' => $approve_policy,
    'policy_lifecycle' => $policy_lifecycle,
    'add_procedure' => $add_procedure,
    'review_procedure' => $review_procedure,
    'approve_procedure' => $approve_procedure,
    'procedure_lifecycle' => $procedure_lifecycle,

    'simplerisk' => $simplerisk,
    'security' => $security,

    'add_topic' => $add_topic,
    'upload_quiz' => $upload_quiz,
    'update_quiz' => $update_quiz,
    'delete_quiz' => $delete_quiz,
    'complete_quiz' => $complete_quiz,

    'complete_execrise' => $complete_execrise
  ];


  try {
    $id = $_SESSION["id"];
    $sql = "UPDATE users SET notification_preference = :not_status WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
      ":not_status" => json_encode($preference),
      ":id" => $id
    ));
    header("location: notification-preference.php;");
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  // $arr = json_decode(json_encode($preference), true);
  // print_r($arr);

  // echo "<pre>";
  // echo "------------------" . $arr['preferences']['vision-mission'] . "------------------";

  exit;
}
?>