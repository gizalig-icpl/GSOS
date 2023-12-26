<?php
require_once("include/session.php");
require_once("include/log.php");
require_once("include/config.php");
require_once("include/functions.php");
//Include Configuration File
//require_once("include/google-config.php");

//Reset OAuth access token
//$google_client->revokeToken();

//Destroy entire session data.
$current_timestamp = date('Y-m-d H:i:s');
$sql = "update users set last_login=:last_login WHERE id=:id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":last_login" => $current_timestamp,
    ":id" => $_SESSION['id']
));
$id=$_SESSION['id'];
$filepath=__FILE__;
$file=basename($filepath);
logGenerate(LOGOUT_TITLE,LOGOUT_DESC,$file,$id,LOGOUT_ACTION,"info");
clean_cache();
session_destroy();
session_unset();

unset($_SESSION['id']);
unset($_SESSION['first_name']);
unset($_SESSION['email']);
setcookie("PHPSESSID",'',time()-60,"/");
// Redirect to homepage
header("Location:index.php");
?>