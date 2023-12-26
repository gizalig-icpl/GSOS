<?php
require_once("include/session.php");

if(isset($_SESSION['id'])){
    header('Location: index.php?page=vision-mission');
    exit;
}

//Include Configuration File
//require_once("include/google-config.php");
//require_once("include/facebook-config.php");

?>
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Invinsense</title>
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Poppins:wght@200;300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/all.css"> -->

    <!-- Script -->
    <!-- <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/all.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <meta name="google-signin-client_id" content="<?php echo GOOGLE_CLIENT_ID;?>">
    <style>
      .abcRioButtonLightBlue{
        background-color: transparent !important;
        color: white !important;
        height: 21px !important;
        width: 100% !important;
        margin: auto !important;
        border-radius: 30px;
        box-shadow:none !important;
      }
      .abcRioButtonContentWrapper{
        display: flex;
        justify-content: center;
      }
      .abcRioButtonIcon{
      padding:0px !important;
    }
    .abcRioButtonContents{
    font-size:14px !important;
    line-height:initial !important;
  }
    </style>
</head>
<body> -->

<!-- <section class="login_pagemian">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-6 login_leftmain h-100">
                <div class="login_logo">
                    <a href="#">
                        <img src="images/login_logo.png">
                    </a>
                    <h5>
                        THE BEST <br>CYBERSECURITY SYSTEM
                    </h5>
                </div>
                <div class="gsos_management">
                    <h1>
                        G-SOS<br> Management
                    </h1>
                    <p>Where the world manage Security. Millions of  businesses use G-SOS to turn their Security into reality</p>
                    <form>
                        <input type="text" name="" placeholder="Write us your requirement in security">
                        <button class="gsosbtn_con">CONTACT US</button>
                    </form>
                    <h6>Update the latest security and services from INFOPERCEPT. <a href="https://www.infopercept.com/contact" target="_blank" rel="noreferrer">Contact us</a></h6>
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="gsoslogin_right">
                    <h2>Get more thing done with us</h2>
                    <p>Choose one of the following  methods.</p>
                    <div class="gsos_fblogin">
                        <a  href="javascript:void(0);" onclick="fbLogin();" id="fbLink">
                            <i class="fab fa-facebook-f"></i>
                            Signin With Facebook
                        </a>
                        <a href="#" class="g-signin2" data-onsuccess="onSignIn">
                            <i class="fab fa-google"></i>
                            Signin With Google 
                        </a>
                    </div>
                    <div class="loging_signin">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" id="pills-Sign-up-tab" data-toggle="pill" href="#pills-Sign-up" role="tab" aria-controls="pills-Sign-up" aria-selected="false">Sign Up</a>
                          </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                          <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                <form id="login_form">
                                  <div class="form-group">
                                      <input type="email" placeholder="Email Address" name="email_address" id="email_address">
                                  </div>
                                  <div class="form-group m-0" style="position: relative;">
                                      <input id="password-field" type="password" placeholder="Password" name="password">
                                      <div class="eyeion toggle-password" toggle="#password-field">
                                          <i class="fas fa-eye "></i>
                                      </div>
                                  </div>
                                  <a href="#" class="forgetpass">Forgot password ?</a>
                                  <div class="form-group remember_input">
                                        <input type="checkbox" id="remember" name="remember" value="remem">
                                        <label for="remember">Remember me</label>
                                  </div>
                                  <div class="login_btn">
                                      <button type="submit">Login</button>
                                      <h6 class="m-0">Don't have sign account ? <a id="pills-Sign-up-tab" data-toggle="pill" href="#pills-Sign-up" role="tab" aria-controls="pills-Sign-up" aria-selected="false">Sign up</a></h6>
                                  </div>
                                </form>
                              
                          </div>
                          <div class="tab-pane fade" id="pills-Sign-up" role="tabpanel" aria-labelledby="pills-Sign-up-tab">
                              <form id="signup_form">
                                  <div class="form-group">
                                      <input type="email" placeholder="Email Address" name="email_address" id="email_address_signup">
                                  </div>
                                  <div class="form-row mb-3">
                                      <div class="col-md-6 col-12">
                                          <input type="text" placeholder="First Name" name="first_name" id="first_name">
                                      </div>
                                      <div class="col-md-6 col-12">
                                          <input type="text" placeholder="Last Name" name="last_name" id="last_name">
                                      </div>
                                  </div>
                                  <div class="form-group m-0" style="position: relative;">
                                      <input id="password-field2" type="password" placeholder="Password" name="password">
                                      <div class="eyeion toggle-password2" toggle="#password-field2">
                                          <i class="fas fa-eye"></i>
                                      </div>
                                  </div> -->
                                  <!-- <a href="#" class="forgetpass">Forgot password ?</a> -->
                                  <!-- <div class="form-group remember_input mt-2">
                                        <input type="checkbox" id="newsletter" name="newsletter" value="newsletter">
                                        <label for="newsletter">I would like to receive weekly and monthly newsletters from Loignks</label>
                                  </div>
                                  <p class="by_acepting">
                                      By registering you confirm that you accept the <a href="#">Terms and Conditions</a> and <a href="#"> Privacy Policy</a>
                                  </p>
                                  <div class="login_btn">
                                      <button type="submit" >Creat Account</button>
                                      <h6 class="m-0">Already User? <a id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a></h6>
                                  </div>
                                </form> -->
                                <!-- Display login status -->




<!-- Display user's profile info -->
<!-- <div class="ac-data" id="userData"></div>
                          </div>
                        </div>
                        <h6>Protected by reCAPTCHA and subject to the Google <br><a href="#">Privacy Policy</a> and <a href="#">Trems of Service</a></h6>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</section> -->


<script>
    // $(".toggle-password").hover(function() {
    //   var input = $($(this).attr("toggle"));
    //   if (input.attr("type") == "password") {
    //     input.attr("type", "text");
    //   } else {
    //     input.attr("type", "password");
    //   }
    // });
    // $(".toggle-password2").hover(function() {
    //   var input = $($(this).attr("toggle"));
    //   if (input.attr("type") == "password") {
    //     input.attr("type", "text");
    //   } else {
    //     input.attr("type", "password");
    //   }
    // });


    
</script>
</body>
</html>