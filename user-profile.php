<?php
require_once("include/header.php");
require_once(APPLICATION_PATH."include/session.php");
require_once(APPLICATION_PATH."password-change.php");
?>
<div class="wrapper">
  <div class="page-content">
    <div class="main-title card p-2" >
      <h2 class="mb-0 text-success"><?php echo _User." "._Profile; ?></h2>
    </div>
    <div class="row">
      <?php
      $id = $row_users[0]['id'];
    
      ?>
      <div class="col-12 col-lg-8">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <h5 class="mb-0"><?php echo _My_Account; ?></h5>
            <hr>
            <div class="card shadow-none border">
              <div class="card-header">
                <h6 class="mb-0"><?php echo _USER_INFORMATION; ?></h6>
              </div>
              <div class="card-body">
                <form class="row g-3 info-form" action="#" method="post">
                  <!-- <div class="col-6">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $row_users[0]['first_name'] ?>" />
                      </div> -->
                  <div class="col-6">
                    <label class="form-label"><?php echo _Email_Address; ?></label>
                    <input type="text" class="form-control form-control-sm" name="email" value="<?php echo $row_users[0]['email'] ?>" disabled>
                  </div>
                  <div class="col-6">
                    <label class="form-label"><?php echo _First_Name; ?></label>
                    <input type="text" class="form-control form-control-sm" name="first_name" id="profile_firstname" value="<?php echo $row_users[0]['first_name'] ?>" required>
                  </div>
                  <div class="col-6">
                    <label class="form-label"><?php echo _Last_Name; ?></label>
                    <input type="text" class="form-control form-control-sm" name="last_name" id="profile_lastname" value="<?php echo $row_users[0]['last_name'] ?>" required>
                  </div>

                  <div class="text-start">

                    <button data-test-id="save_changes" type="button" name="submit" class="btn btn-primary px-4" onclick="updateUserProfile(<?php echo $id ?>);displayLoader();">
                    <?php echo _Save_Changes; ?>
                    </button>
                    
                </form>
                <button data-test-id="change_password" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changepassword"><?php echo _Change_Password; ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card shadow-sm border-0 overflow-hidden">
        <div class="card-body">
          <div class="user-setting d-flex">
            <?php
            if (isset($row_users['picture'])) {
            ?>
              <img src=<?php echo APPLICATION_URL . "/assets_new/images/avatars/avatar-1.png" ?> alt="" class="user-img">
            <?php
            } else {
            ?>
              <div class="profileimage user-img1" id="profilecolor2" style="background-color:<?php echo $_SESSION['profilecolor'];?>"><?php echo $defaultProfile; ?></div>
            <?php
            }
            ?>
            <!-- <img src=<?php echo APPLICATION_URL . "/assets_new/images/avatars/avatar-1.png" ?> class="user-img" alt=""> -->
          </div>
          <!-- <div class="profile-avatar text-center">
                  <img
                  src=<?php echo $defaultProfile; ?>
                    class="rounded-circle shadow"
                    width="120"
                    height="120"
                    alt=""
                  />
                </div> -->

          <div class="text-center mt-4">
            <h4 class="mb-1"><?php echo $row_users[0]['first_name'] . ' ' . $row_users[0]['last_name']; ?></h4>
          </div>
          <div class="text-center mt-4">
            <h6 class="mb-1 text-secondary"><?php echo _Last_Login; ?>: <?php echo ($row_users[0]['last_login'])?date(config('date_time','date_format')." ".config('date_time','time_format'),strtotime($row_users[0]['last_login'])):"-" ?></h6>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo _Change_Password; ?></h5>
            </div>
            <form method="post">
                <div class="modal-body">
                <div class="form-group m-0" style="position: relative;">
                    <label class="form-label"><?php echo _Old_Password; ?></label>
                    <input id="password-field1" class="form-control form-control-sm" type="password" placeholder="Password" name="password" autocomplete="off"> 
                </div>   
                <div class="form-group m-0" style="position: relative;">
                    <label class="form-label"><?php echo _New_Password; ?></label>&nbsp
                    <span data-bs-toggle="tooltip" data-bs-placement="right" title="The password should be at least 8 characters long.&#010;The password should contain at least one uppercase letter.&#010;The password should contain at least one lowercase letter.&#010;The password should contain at least one special character.The password should contain at least one one number."><em class="bi bi-info-circle-fill"></em></span>
                    <input data-test-id="password1" id="password-field2" onkeyup="passwordStrength(this.value,0,true)" class="form-control form-control-sm" type="password" placeholder="Password" name="newpassword" autocomplete="off"> 
                </div>
                <div class="progress" id="passwordDescription"></div>
                <div class="form-group m-0" style="position: relative;">
                    <label class="form-label"><?php echo _Confirm_New_Password; ?></label>
                    <input data-test-id="password2" id="password-field3" onkeyup="passwordStrength(this.value,0,false)" class="form-control form-control-sm" type="password" placeholder="Password" name="confirmpassword" autocomplete="off"> 
                </div>
                <!-- <div> -->
                <!-- Password strength <span class="mandatoryStar">*</span> -->
                <!-- <div id="passwordDescription">Password not entered</div> -->
                <!-- <div class="progress" id="passwordDescription"></div> -->
                <!-- <div id="passwordStrength" class="strength0"></div> -->
                <!-- </div> -->
                </div>
                <div class="modal-footer" id="changepassword1">
                    <input data-test-id="change" type="submit" name="changepassword" disabled class="btn btn-primary" value="<?php echo _Change; ?>">
                    <!-- <button type="button" name="changepass" class="btn btn-primary">change</button> -->
                </div>
            </form>
        </div>
    </div>
</div>
<script>
  function updateUserProfile(id) {
    let first_name = $("#profile_firstname").val();
    let last_name = $("#profile_lastname").val();
    if (first_name == "") {
      error_toast("First name is required");
    } else if (last_name == "") {
      error_toast("Last name is required");
    } else {
      let data_obj = {
        "id": id,
        "first_name":first_name,
        "last_name":last_name,
      }

      $.ajax({
        method: 'POST',
        url: './domain/index.php?page=update-profile',
        data: data_obj,
        
        success: function(res) {
          if (res == "Updated") {
            success_toast("Successfully Updated Data");
            location.reload();
          }
        },
        error: function(res) {
          error_toast("Error in updating profile. Please try after sometime.");
        },
      });
    }
  }
</script>