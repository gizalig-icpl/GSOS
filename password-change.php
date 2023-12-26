<?php
include_once('include/session.php');
include_once('include/connection.php');

if(isset($_POST['info']))
{
    if($_POST['password']==$_POST['confirm_password'])
    {
        $password = $_POST['password']; 
        // Validate password strength
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('@[^\w]@', $password);
        if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
        //   echo '<script>alert("Password is not Strong");</script>';
        } else {
            $todaydate = date("Y-m-d");
            $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
            $is_first_login='yes';
            $sql = "update users set pass = :pass,is_first_login=:is_first_login,last_pwd_date=:last_pwd_date WHERE id=:id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":pass" => $pass,
                ":last_pwd_date" => $todaydate,
                ":is_first_login" => $is_first_login,
                ":id" => $_POST['id']
            ));
            echo "Inserted";
            // echo "<script>window.location = 'logout.php'</script>";
            // header('Location: logout.php');
        } 
        // echo $_SESSION['id'];
        
    }
}
if(isset($_POST['changepass']))
{
    if($_POST['password']==$_POST['comfirmpassword'])
    {
        $password = $_POST['password']; 
        // Validate password strength
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('@[^\w]@', $password);
        if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
        //   echo '<script>alert("Password is not Strong");</script>';
          echo "<script>window.location = 'kpi-dashboard.php'</script>";
        } else {
            $todaydate = date("Y-m-d");
            $pass=password_hash($_POST['password'],PASSWORD_DEFAULT);
            $is_first_login='no';
            $sql = "update users set pass = :pass,is_first_login=:is_first_login,last_pwd_date=:last_pwd_date WHERE id=:id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":pass" => $pass,
                ":last_pwd_date" => $todaydate,
                ":is_first_login" => $is_first_login,
                ":id" => $_SESSION['id']
            ));
            echo "<script>window.location = 'logout.php'</script>";
            // header('Location: logout.php');
        } 
        // echo $_SESSION['id'];
        
    }
}

if(isset($_POST['changepassword']))
{
    // $pwd = md5($_POST['password']);
    $sql = "SELECT pass FROM users WHERE id=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":id" => $_SESSION['id']
    ));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if(password_verify($_POST['password'],$result['pass'])){
        if($_POST['newpassword']==$_POST['confirmpassword'])
        {
            $password = $_POST['newpassword']; 
            // Validate password strength
            $uppercase    = preg_match('@[A-Z]@', $password);
            $lowercase    = preg_match('@[a-z]@', $password);
            $number       = preg_match('@[0-9]@', $password);
            $specialchars = preg_match('@[^\w]@', $password);
            if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
                ?>
                <script>
                    error_toast("Password is not Strong");
                </script>
                <?php
            } else {
                // echo $_SESSION['id'];
            $todaydate = date("Y-m-d");
            $pass=password_hash($_POST['newpassword'],PASSWORD_DEFAULT);
            $sql = "update users set pass = :pass,last_pwd_date=:last_pwd_date WHERE id=:id";
            // echo $sql;exit;
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":pass" => $pass,
                ":last_pwd_date" => $todaydate,
                ":id" => $_SESSION['id']
            ));
            ?>
            <script>
                success_toast("Successfully Change Password");
                setInterval(logout,500);
                function logout() {
                    document.location.href = "logout.php";
                }
            </script>
            <?php
            } 
            
        }
        else{
            ?>
        <script>
            error_toast("Something went wrong!!");
        </script>
        <?php
        }
    }else{
        ?>
        <script>
            error_toast("Something went wrong!!");
        </script>
        <?php
    }
}
?>
