<?php
// if there is anything to notify, then return the response with data for
// push notification else just exit the code
$webNotificationPayload['title'] = $_POST['title'];
$webNotificationPayload['body'] = $_POST['body'];
$webNotificationPayload['icon'] = $_POST['icon'];
$webNotificationPayload['url'] = $_POST['url'];
echo json_encode($webNotificationPayload);
?>