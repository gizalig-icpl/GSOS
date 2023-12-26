<?php
require_once('./include/config.php');
?>
<script>
    function pushNotify(title,body,icon,url) {
        	if (!("Notification" in window)) {
                // checking if the user's browser supports web push Notification
                alert("Web browser does not support desktop notification");
            }
            if (Notification.permission !== "granted")
                Notification.requestPermission();
            else {
                $.ajax({
                url : "index.php?page=push-notify",
                type: "POST",
                data: {title:title,body:body,icon:icon,url:url},
                success: function(data, textStatus, jqXHR) {
                    // if PHP call returns data process it and show notification
                    // if nothing returns then it means no notification available for now
                	if ($.trim(data)){
                        var data = jQuery.parseJSON(data);
                        console.log(data);
                        notification = createNotification( data.title,  data.icon,  data.body, data.url);

                        // closes the web browser notification automatically after 5 secs
                        // setTimeout(function() {
                        // 	notification.close();
                        // }, 5000);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {}
                });
            }
        };

        function createNotification(title, icon, body, url) {
            var notification = new Notification(title, {
                icon: icon,
                body: body,
            });
            // url that needs to be opened on clicking the notification
            // finally everything boils down to click and visits right
            notification.onclick = function() {
                window.open(url);
            };
            return notification;
        }
</script>