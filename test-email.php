<?php 
	require_once('include/config.php');
	require_once(APPLICATION_PATH.'/include/sendmailer.php');

    try {
			if(isset($_POST['testemail'])){
                $testEmail = $_POST['testemail'];
                print_r($testEmail);
            }
            sendTestEmail($testEmail);
		}
    catch(PDOException $e) {
	  echo $sql . "<br>" . $e->getMessage();
	}
?>