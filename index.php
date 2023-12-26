<?php
require_once('include/config.php');
require_once(APPLICATION_PATH . "include/session.php");
require_once(APPLICATION_PATH . "include/functions.php");


if (!file_exists("include//connection.php")) {
  header('Location: install/index.php');
  exit;
}

if((isset($_SESSION['email']) && $_SESSION['email'] != '')||isset($_SESSION['access_token'])||isset($_SESSION['facebook_access_token']))
{
  require_once("include/header.php");
  $page = isset($_GET['page']) ? $_GET['page'] : 'kpi-dashboard';
  if (!file_exists($page . ".php")) {
    require_once('404.html');
  } else {
    require_once($page . '.php');
  }
  if (isset($_GET['page']) && str_contains($_GET["page"], "project")) {
    require_once(APPLICATION_PATH . "/project/footer.php");
  }
    exit;
}

// if (isset($_SESSION['email']) && $_SESSION['email'] != '') {
//   header('Location: kpi-dashboard.php');
//   exit;
// }
// if (isset($_SESSION['access_token'])) {
//   header('Location: kpi-dashboard.php');
//   exit;
// }
// if (isset($_SESSION['facebook_access_token'])) {
//   header('Location: kpi-dashboard.php');
//   exit;
// }
$ini_array = parse_ini_file(APPLICATION_PATH . "/config.ini", true);
$branding=config("logo","branding");
if($branding==0)
{
  $logo=config("logo","infopercept_image");
  $logo_small=config("logo","infopercept_images_small");
}
else{
  $logo=config("logo","branding_image");
  $logo_small=config("logo","branding_image_small");
}

if (isset($ini_array['config']['sso']) && config("config","sso") == 1) {
  // require_once(APPLICATION_PATH . "/keycloak.php");
  // require_once(APPLICATION_PATH . "/sso.php");
  require 'keycloak/auth.php';
  authorize();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invinsense</title>
  <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">

  <!-- New Bootstrap Added -->
  <link rel="stylesheet" href="assets_new/css/bootstrap-extended.css">
  <link rel="stylesheet" href="assets_new/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets_new/css/bootstrap.min.css.map">
  <link rel="stylesheet" href="assets_new/css/dark-theme.css">
  <link rel="stylesheet" href="assets_new/css/header-colors.css">
  <link rel="stylesheet" href="assets_new/css/icons.css">
  <link rel="stylesheet" href="assets_new/css/light-theme.css">
  <link rel="stylesheet" href="assets_new/css/pace.min.css">
  <link rel="stylesheet" href="assets_new/css/semi-dark.css">
  <link rel="stylesheet" href="assets_new/css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">




  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet"> -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <!-- Script -->
  <script src="js/jquery-3.4.1.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/all.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <!-- Bootstrap bundle JS -->
  <script src="assets_new/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets_new/js/jquery.min.js"></script>
  <script src="assets_new/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets_new/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets_new/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets_new/js/pace.min.js"></script>
  <!--app-->
  <script src="assets_new/js/app.js"></script>
</head>

<body>

  <section class="login_pagemian">
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-lg-6 position-relative h-100">
          <div class="d-flex align-items-center">
            <a href="#">
              <img alt="invinsense" class="w-300px me-2rem" src=<?php echo APPLICATION_URL . $logo ?>>
            </a>

          </div>
          <div class="gsos_management position-absolute fixed-bottom">
            <h2 class="text-white fw-400">
              G-SOS<br> Management
            </h2>
            <p class="text-white fw-200 lh-s max-width-500">Where the world manage Security. Millions of businesses use G-SOS to turn their Security into reality</p>

            <h6 class="m-0 text-white fw-300 fs-14px ">Update the latest security and services from INFOPERCEPT. <a href="https://www.infopercept.com/contact" target="_blank" rel="noreferrer">Contact us</a></h6>
          </div>
        </div>
        <div class="col-lg-6 align-self-center">
          <div class="gsoslogin_right bg-light py-2rem pl-2 mb-1rem rounded-3">
            <h2 class="text-secondary fw-600 fs-30px mb-4px pt-2">Get more thing done with us</h2>
            <!-- <p>Choose one of the following  methods.</p>
                    <div class="gsos_fblogin">
                        <a href="<?php echo $facebookLoginURL; ?>">
                            <i class="fab fa-facebook-f"></i>
                            Signin With Facebook
                        </a>
                        <a href="<?php echo $googleLoginURL; ?>" class="g-signin2" data-onsuccess="onSignIn">
                            <i class="fab fa-google"></i>
                            Signin With Google 
                        </a>
                    </div> -->
            <div class="loging_signin">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" id="pills-Sign-up-tab" data-toggle="pill" href="#pills-Sign-up" role="tab" aria-controls="pills-Sign-up" aria-selected="false">Sign Up</a>
                </li> -->
              </ul>
              <div class="tab-content ml-2" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                <label class="form-label">Email ID</label>  
                <form id="login_form" autocomplete="off">
                    <div class="form-group">
                      <input class="radius-30 border border-dark border border-5 w-100 pl-2" type="email" placeholder="Email Address" name="email_address" id="email_address" value="<?php if(isset($_COOKIE['cemail'])){ echo $_COOKIE['cemail'];} ?>" autocomplete="off">
                    </div>
                    <label class="form-label">Password</label> 
                    <div class="form-group m-0" style="position: relative;">
                      <input class="rounded-pill w-100 border border-dark" id="password-field" type="password" placeholder="Password" name="password" value="<?php if(isset($_COOKIE['cpassword'])){ echo $_COOKIE['cpassword'];} ?>" autocomplete="off">
                      <div class="eyeion toggle-password" toggle="#password-field">
                        <em class="fas fa-eye "></em>
                      </div>
                    </div>
                    <a class="forgetpass align-items-center cursor-pointer" data-bs-toggle="modal" data-bs-target="#forgot_password">Forgot password ?</a>
                    <div class="form-group remember_input">
                      <input type="checkbox" id="remember" name="remember" value="remem" <?php if(isset($_COOKIE['cemail'])){ echo "checked";} ?>>
                      <label for="remember">Remember me</label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1.4rem pb-1.7rem border border-white border-bottom-1px">
                      <button data-test-id="login" class="btn btn-primary btn-lg  text-white fw-500  rounded " type="submit">Login</button>
                      <!-- <h6 class="m-0 text-dark fw-400 fs-16px">Don't have sign account ? <a class="fw-600 text-primary" id="pills-Sign-up-tab" data-toggle="pill" href="#pills-Sign-up" role="tab" aria-controls="pills-Sign-up" aria-selected="false">Sign up</a></h6> -->
                    </div>
                  </form>

                </div>
                <!-- <form class="row g-3">
                  <div class="col-12" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                    <label class="form-label">Email ID</label>
                    <input type="text" class="form-control form-control-sm" name="email_address" id="email_address" value="" autocomplete="off">
                  </div>
                  <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control form-control-sm" id="password-field" type="password" placeholder="Password" name="password" value="" autocomplete="off">
                    <div class="eyeion toggle-password" toggle="#password-field">
                        <i class="fas fa-eye "></i>
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="gridCheck1" id="remember" name="remember" value="remem">
                      <label class="form-check-label" for="gridCheck1">
                        Remember me
                      </label>
                    </div>
                  </div>
                  <div class="col-6 text-end">
                    <a href="javascript:;">Forgot Password?</a>
                  </div>
                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                  </div>
                </form> -->
                <div class="tab-pane fade" id="pills-Sign-up" role="tabpanel" aria-labelledby="pills-Sign-up-tab">
                  <form id="signup_form" autocomplete="off">
                    <div class="form-group">
                    <label class="form-label">Email</label> 
                      <input type="email" placeholder="Email Address" name="email_address" id="email_address_signup" autocomplete="off">
                    </div>
                    <div class="form-row mb-3 d-flex">
                      <div class="col-md-6 col-12">
                      <label class="form-label">First Name</label> 
                        <input class="" type="text" placeholder="First Name" name="first_name" id="first_name" autocomplete="off">
                      </div>
                      <div class="col-md-6 col-12">
                      <label class="form-label">Last Name</label> 
                        <input type="text" placeholder="Last Name" name="last_name" id="last_name" autocomplete="off">
                      </div>
                    </div>
                    <div class="form-group m-0" style="position: relative;">
                    <label class="form-label">Password</label> 
                      <input id="password-field2" type="password" placeholder="Password" name="password" autocomplete="off">
                      <div class="eyeion toggle-password2" toggle="#password-field2">
                        <em class="fas fa-eye"></em>
                      </div>
                    </div>
                    <!-- <a href="#" class="forgetpass">Forgot password ?</a> -->
                    <div class="form-group remember_input mt-2">
                      <input type="checkbox" id="newsletter" name="newsletter" value="newsletter">
                      <label for="newsletter">I would like to receive weekly and monthly newsletters from Loignks</label>
                    </div>

                    <p class="by_acepting text-dark fs-16px ">
                      By registering you confirm that you accept the <a href="#">Terms and Conditions</a> and <a href="#"> Privacy Policy</a>
                    </p>
                    <div class="d-flex justify-content-between align-items-center mb-1.4rem pb-1.7rem border border-white border-bottom-1px">
                      <button class="btn btn-primary btn-lg pb-10 text-white fw-500  rounded " type="submit">Create Account</button>
                      <h6 class="m-0">Already User? <a id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a></h6>
                    </div>
                  </form>
                </div>
              </div>
              <!-- <h6 class="">Protected by reCAPTCHA and subject to the Google <br><a href="#">Privacy Policy</a> and <a href="#">Terms of Service</a></h6> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php require_once("include/loader.php"); ?>

<div class="modal fade" id="forgot_password" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Forgot Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="forgotpass" method="post">
          <div class="form-group m-0" style="position: relative;">
              <label class="form-label">Email Id</label>
              <input name="email" id="email" required class="form-control form-control-sm" type="email" placeholder="Email Address" autocomplete="off"> 
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button data-test-id="forgot_password" type="submit" class="btn btn-primary" onclick="forgotpass();displayLoader();">Forgot Password</button>
      </div>
    </div>
  </div>
</div>

  <script>
    function forgotpass() {
    // displayLoader();
    let email = $("#email").val()

    let data_obj = {
        info: "forgotpass",
        email: email
    }

    $.ajax({
        method: 'POST',
        url: './forgot-password.php',
        data: data_obj,
        success: function (res) {
            hideLoader();
            if (res == "SendMail") {
                success_toast("Successfully Updated Data");
                $('#forgot_password').modal('hide')

            } else {
                error_toast("Something went wrong!!");
            }
        },
        error: function (res) {
            hideLoader();
            console.log(res);
        },
    });

}
    $(".toggle-password").hover(function() {
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
    $(".toggle-password2").hover(function() {
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
  </script>
  <script src="./adapters/login.js"></script>
  <script src="./js/loader.js"></script>
  <script src="./assets_new/js/toastify.js"></script>  
</body>

</html>
