<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Execption;

require_once("var/www/html/vendor/phpmailer/phpmailer/src/Execption.php");
require_once("var/www/html/vendor/phpmailer/phpmailer/src/PHPMailer.php");
require_once("var/www/html/vendor/phpmailer/phpmailer/src/SMTP.php");

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host="smtp.google.com";
$mail->SMTPAuth=true;
$mail->Username="msangh.devloper@gmail.com";
$mail->Password="lojtcpgxyehgawgl";
$mail->SMTPSecure='ssl';
$mail->port=465;

$mail->setFrom("msangh.devloper@gmail.com","Mandar Sanghavi");
$mail->addAddress('amitk@infopercept.com','Amitk');
$mail->Subject="Test Mail";
$mail->Body="This is a testmail for cronjob";
if($mail->send()){
    echo "Email sent";
}
else{
    echo "Email failed to send due to ". $mail->ErrorInfo;
}
?>