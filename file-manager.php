<?php
require_once("include/header.php");
include_once('./include/session.php');

if($_SESSION['id']==1){
?>
<div class="wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-bell"></em>
                <?php echo "Query Manager"; ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-9">
                            <input class="form-field form-control" type="text" name="file"
                                placeholder="Enter your File Name" required>
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-primary" name="submit" value="Open File">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        global $dbh;
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $file = APPLICATION_PATH.$_POST["file"];
            $myfile = fopen($file, "r") or die("Unable to open file!");
            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                            <form method="post">
                                <input type="hidden" name="file_name" value="<?php echo $file; ?>">
                                <textarea class="form-control" id="change_file" name="change_file" rows="50" style="width: 100%;"><?php 
                                echo fread($myfile,filesize($file));
                                ?></textarea>
                                <button class="btn btn-primary" name="file_change">Save Changes</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            fclose($myfile);
        }
        if(isset($_POST['file_change'])){
            chmod($_POST['file_name'],0777);
            $write_file = fopen($_POST['file_name'],"w");
            fwrite($write_file,$_POST['change_file']);
            fclose($write_file);
            chmod($_POST['file_name'],0755);
        }
        ?>
    </div>
</div>
<?php
}
?>