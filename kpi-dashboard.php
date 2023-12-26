<?php
include_once('include/session.php');

require_once("include/header.php");
include_once('include/connection.php');
require_once('password-change.php');
?>

<?php
if ($_SESSION['role'] == 0) {
    // header('location: dashboard.php');
    ?>
    <script>
        window.location = 'index.php?page=dashboard';
    </script>
    <?php
}
?>
<?php
$from_date = date('Y-01');
$to_date = date('Y-m', strtotime("last day of this month"));

$sql = "SELECT is_first_login FROM users WHERE id=:id";
$stmt = $dbh->prepare($sql);
$stmt->execute(
    array(
        ":id" => $_SESSION['id']
    )
);
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result['is_first_login'] == 'yes') {
    ?>
    <script>
        $(window).on('load', function () {
            $('#changepassword').modal('show');
        });
    </script>
    <?php
}

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
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="fs-5"><em class="bi bi-speedometer2"></em>
                        <?php echo " ";
                        echo _Dashboard; ?>
                    </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bx bx-home-alt"></i>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo _Dashboard; ?> -->

                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><i class="bx bx-home-alt"></i></li>
                                    <li class="breadcrumb-item active"><?php echo _Dashboard; ?></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo _Dashboard; ?></h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title -->
                <div class="main-title card p-2">
                    <h2 class="mb-0 text-success">
                        <?php echo _KPI;
                        echo "-";
                        echo _Dashboard; ?>
                    </h2>
                </div>
                <div class="card gap-3 p-2">
                    <div style="display:flex;justify-content:space-between">
                        <h4>
                            <?php echo _Your_Customized_Dashboard; ?>
                        </h4>
                        <button type="button" class="submit-btn btn btn-sm bg-primary text-light" name="send"
                            value=" Submit" onClick="dwpdf()">
                            <?php echo _Export;
                            echo " ";
                            echo _as;
                            echo " ";
                            echo "PDF"; ?>
                        </button>
                    </div>
                    <div class="d-sm-inline-flex">
                        <div class="align-item-center pt-1" style="font-size:140%">From:</div> &nbsp;
                        <input value="<?php echo $from_date; ?>" type='month' name="date1" id="date1" style="font-size:120%"> &nbsp;&nbsp;
                        <div class="align-item-center pt-1" style="font-size:140%" style="font-size:140%">To:</div>
                        &nbsp;
                        <input value="<?php echo $to_date; ?>" type='month' name="date2" id="date2" style="font-size:120%"> &nbsp;&nbsp;
                        <button type="button" class="submit-btn btn btn-sm bg-primary text-light" id="generate_kpi"
                            onclick=""><?php echo BTN_APPLY; ?></button>
                    </div>
                </div>
                <!-- <div class='selectMonths'>
                        <input type='text' placeholder='Select Range' value='' readonly />
                        <i>&#128197;</i>
                    </div> -->
            </div>
            <br>
            <div class="row">
                <div id="kpi_dash_cont">
                    <div class="grid-stack representation-container">
                        <div id="chart101"></div>
                    </div>
                </div>

                <div class="col-4 cols-lg-3">
                    <?php include("widgets/widget-1.php"); ?>
                </div>
                <div class="col-4 cols-lg-3">
                    <?php include("widgets/widget-2.php"); ?>
                </div>
                <div class="col-4 cols-lg-3">
                    <?php include("widgets/widget-3.php"); ?>
                </div>
                <!-- end row -->

                <div class="row">
                    <?php include("widgets/widget-4.php"); ?>
                </div>
                <div class="row cal">
                    <?php include("widgets/calendar-widget.php"); ?>
                </div>

                <div class="col-6 cols-lg-2" id="news-widget">
                    <?php include("widgets/news-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="securityawareness-widget">
                    <?php include("widgets/securityawareness-widget.php"); ?>
                </div>

                <div class="col-6 cols-lg-2" id="policy-widget">
                    <?php include("widgets/policy-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="procedure-widget">
                    <?php include("widgets/procedure-widget.php"); ?>
                </div>

                <div class="col-6 cols-lg-2" id="top-performer-widget">
                    <?php include("widgets/top-performer-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="non-performer-widget">
                    <?php include("widgets/non-performer-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="quizstatus-widget">
                    <?php include("widgets/quizstatus-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="quiz-percentage-widget">
                    <?php include("widgets/quiz-percentage-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="training-status-widget">
                    <?php include("widgets/training-status-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="browser-widget">
                    <?php include("widgets/browser-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="awareness-risk-widget">
                    <?php include("widgets/awareness-risk-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="training-widget">
                    <?php include("widgets/training-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2">
                    <?php include("widgets/sidbi-quiz-report-widget.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="distraction">
                    <?php include("widgets/distraction.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="leaderboard">
                    <?php include("widgets/leaderboard.php"); ?>
                </div>
                <div class="col-6 cols-lg-2" id="awareness-count-widget">
                    <?php include("widgets/awareness-count-widget.php"); ?>
                </div>
            </div>


        </div>
        <!-- end container-fluid -->

    </div>
    <!-- end content -->

    <!-- Footer Start -->
    <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2021 - 2022 &copy; by <a href="">Invinsense</a>
                        </div>
                    </div>
                </div>
            </footer> -->
    <!-- end Footer -->

</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
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
                        <span data-bs-toggle="tooltip" data-bs-placement="right"
                            title="The password should be at least 8 characters long.&#010;The password should contain at least one uppercase letter.&#010;The password should contain at least one lowercase letter.&#010;The password should contain at least one special character.The password should contain at least one one number."><em
                                class="bi bi-info-circle-fill"></em></span>
                        <input data-test-id="password1" id="password-field1" onkeyup="passwordStrength(this.value,0,true)" class="form-control form-control-sm"
                            type="password" placeholder="Password" name="password" autocomplete="off"> 
                    </div>
                    <div class="progress" id="passwordDescription"></div>
                    <div class="form-group m-0" style="position: relative;">
                        <label class="form-label">Confirm Password</label>
                        <input data-test-id="password2" id="password-field2" onkeyup="passwordStrength(this.value,0,false)" class="form-control form-control-sm" type="password" placeholder="Password"
                            name="comfirmpassword" autocomplete="off"> 
                    </div>
                </div>
                <div class="modal-footer" id="changepass">
                    <input data-test-id="change" type="submit" name="changepass" disabled class="btn btn-primary" value="Change">
                    <!-- <button type="button" name="changepass" class="btn btn-primary">change</button> -->
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("document").ready(function () {
        let date1 = $("#date1").val()
        let date2 = $("#date2").val()
        let month1 = new Date(date1).getMonth() + 1;
        let month2 = new Date(date2).getMonth() + 1;
        let year1 = new Date(date1).getFullYear();
        let year2 = new Date(date2).getFullYear();
        kpiFilter(year1, month1, year2, month2);
    });
    $(document).on('click', '#generate_kpi', function () {
        let date1 = $("#date1").val()
        let date2 = $("#date2").val()
        let month1 = new Date(date1).getMonth() + 1;
        let month2 = new Date(date2).getMonth() + 1;
        let year1 = new Date(date1).getFullYear();
        let year2 = new Date(date2).getFullYear();
        kpiFilter(year1, month1, year2, month2);
    });
</script>
<?php
require_once("include/footer.php");
?>