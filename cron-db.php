<?php
include_once('include/session.php');
include_once('include/config.php');
include_once('include/connection.php');
include_once('include/functions.php');
require_once("include/constants.php");
include('include/sendmailer.php');

$created = date('Y-m-d H:i:s');
$sql = "insert into cron_job(minute,hour,day,month,weekday,command,created) values(:minute,:hour,:day,:month,:weekday,:command,:created)";
$stmt = $dbh->prepare($sql);
$stmt->execute(
    array(
        ":minute" => $_POST['minute'],
        ":hour" => $_POST['hour'],
        ":day" => $_POST['day'],
        ":month" => $_POST['month'],
        ":weekday" => $_POST['weekday'],
        ":command" => $_POST['command'],
        ":created" => $created,
    )
);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
$stmt = $dbh->query("SELECT * FROM cron_job WHERE status = 1");
$cronJobs = '';
if ($stmt->rowCount() > 0) {
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $key => $row) {

        //      print_r($result);
        $cronJobs .= "{$row['minute']} {$row['hour']} {$row['day']} {$row['month']} {$row['weekday']} {$row['command']}\n";
    }
}
file_put_contents(APPLICATION_PATH . 'cron_jobs.txt', $cronJobs);
if ($count > 0) {
    echo "success";
} else {
    echo "error";
}
?>