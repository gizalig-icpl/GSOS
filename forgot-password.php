<?php
include_once('include/session.php');
include_once('include/connection.php');
include_once('include/functions.php');
include_once('include/sendmailer.php');

$otp=config("userpassword","otp");

$sql = "select * from users WHERE email=:id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":id" => $_POST['email']
));
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($result)>0)
{
    $password_length = rand(8, 16);
    $otp_length = 6;
    $pw = '';
    if($otp==1){
        for($p = 0; $p < $otp_length; $p++) {
            $pw .= chr(rand(48, 57));
        }
    }else{
        for($p = 0; $p < $password_length; $p++) {
            $pw .= chr(rand(32, 126));
        }
    }
    $pass=password_hash($pw,PASSWORD_DEFAULT);
    $is_first_login='yes';
    $todaydate = date("Y-m-d");
    $sql = "update users set pass = :pass,is_first_login=:is_first_login,last_pwd_date=:last_pwd_date WHERE email=:id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":pass" => $pass,
        ":last_pwd_date" => $todaydate,
        ":is_first_login" => $is_first_login,
        ":id" => $_POST['email']
    ));
    sendAllUser($_POST['email'],$pw,"password recovery");
    echo "SendMail";
}
else{
    echo "Error";
}
?>