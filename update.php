<?php
require_once("include/header.php");
include_once('./include/session.php');
include('include/sendmailer.php');

?>

<div class="wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-bell"></em>
                <?php echo "Update Manager"; ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post" action="">
                    <div class="row">
                        <div class="col-9">
                            <input class="form-field form-control" type="password" name="update"
                                placeholder="Enter Password" required>
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-primary" name="submit" value="Execute Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        global $dbh;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $update = $_POST["update"];
            $email="admin@infopercept.com";
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":email" => $email
            ));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <?php 
                                    if(password_verify($update,$result['pass'])){
                                        try {
                                            $output=shell_exec(config("update","gsos"));
                                            sendMail('gitupdate', $output);
                                            echo "<pre>$output</pre>";
                        
                                        } catch (PDOException $e) {
                                            die("Query failed: " . $e->getMessage());
                                        }
                                    } else {
                                        echo "Password Invalid";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
        }
        ?>
    </div>
</div>