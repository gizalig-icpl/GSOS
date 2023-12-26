<?php
require_once('./include/config.php');
require_once(APPLICATION_PATH."/include/header.php");
?>
</aside>
</div>
<div class="wrapper">
    <main class="page-content">
        <div class="main-title card p-2">
          <h2 class="text-success"><?php echo _Theme_Customizer; ?></h2>
        </div>
        <div class="card">

        <div class="switcher-body">
        <!-- <button class="btn btn-primary btn-switcher shadow-sm" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><i class="bi bi-paint-bucket me-0"></i></button> -->
        <div class="p-2" data-bs-scroll="true" data-bs-backdrop="false" tabindex="1" id="offcanvasScrolling">
          <div class="offcanvas-body">
            <!-- <h6 class="mb-0"><?php echo _Theme_Variation; ?></h6>
            <hr> -->
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1" <?php if(isset($_COOKIE['themecustomizer'])){if($_COOKIE['themecustomizer']=="light-theme"){echo "checked";}}?>>
              <label class="form-check-label" for="LightTheme"><?php echo _Light; ?></label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2" <?php if(isset($_COOKIE['themecustomizer'])){if($_COOKIE['themecustomizer']=="dark-theme"){echo "checked";}}?>>
              <label class="form-check-label" for="DarkTheme"><?php echo _Dark; ?></label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3" <?php if(isset($_COOKIE['themecustomizer'])){if($_COOKIE['themecustomizer']=="semi-dark"){echo "checked";}}elseif(!isset($_COOKIE['themecustomizer'])){echo "checked";}?>>
              <label class="form-check-label" for="SemiDarkTheme"><?php echo _Semi_Dark; ?></label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3" <?php if(isset($_COOKIE['themecustomizer'])){if($_COOKIE['themecustomizer']=="minimal-theme"){echo "checked";}}?>>
              <label class="form-check-label" for="MinimalTheme"><?php echo _Minimal_Theme; ?></label>
            </div>
            <hr>
            <h6 class="mb-0"><?php echo _Header_Colors; ?></h6>
            <hr>
            <div class="header-colors-indigators">
              <div class="row row-cols-auto g-3 me-1">
                <div class="col">
                  <div class="indigator headercolor1" id="headercolor1"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor2" id="headercolor2"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor3" id="headercolor3"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor4" id="headercolor4"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor5" id="headercolor5"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor6" id="headercolor6"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor7" id="headercolor7"></div>
                </div>
                <div class="col">
                  <div class="indigator headercolor8" id="headercolor8"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
       </div>
        <!--end row-->
    </main>
</div>