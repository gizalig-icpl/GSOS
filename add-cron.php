<?php

require_once("include/header.php");
require_once('include/session.php');
require_once('include/functions.php');

if(isset($_POST['submit'])) {
  $command = purifier($_POST['command']);
  $schedule = purifier($_POST['schedule']);
  $index = purifier($_POST['index']);
  
  // Use the crontab command to edit the existing cron job
  shell_exec('(crontab -l | sed -e "'.$index.'s/.*/'.$schedule.' '.$command.'/") | crontab -');
  
  // Redirect back to the cron job manager UI
  header('Location: cron-manager.php');
  exit;
}

$index = $_GET['index'];
$cron_job = shell_exec('(crontab -l | sed -n "'.$index.'p")');

// Display a form to add the cron job
?>
<form method="post" action="cronjob.php">
  <label for="command">Command:</label>
  <input type="text" name="command" id="command"><br>
  <label for="schedule">Schedule:</label>
  <input type="text" name="schedule" id="schedule"><br>
  <input type="submit" name="submit" value="Add Cron Job">
</form>