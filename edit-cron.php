<?php

require_once("include/header.php");
require_once('include/session.php');

if(isset($_POST['submit'])) {
  $command = $_POST['command'];
  $schedule = $_POST['schedule'];
  $index = $_POST['index'];
  
  // Use the crontab command to edit the existing cron job
  shell_exec('(crontab -l | sed -e "'.$index.'s/.*/'.$schedule.' '.$command.'/") | crontab -');
  
  // Redirect back to the cron job manager UI
  header('Location: cron-manager.php');
  exit;
}

$index = $_GET['index'];
$cron_job = shell_exec('(crontab -l | sed -n "'.$index.'p")');

// Display a form to edit the cron job
?>
<form method="post" action="editcronjob.php">
  <input type="hidden" name="index" value="<?php echo $index; ?>">
  <label for="command">Command:</label>
  <input type="text" name="command" id="command" value="<?php echo $command; ?>"><br>
  <label for="schedule">Schedule:</label>
  <input type="text" name="schedule" id="schedule" value="<?php echo $schedule; ?>"><br>
  <input type="submit" name="submit" value="submit">
</form>