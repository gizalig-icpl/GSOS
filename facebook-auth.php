<?php 
require_once("include/session.php");
require_once("include/connection.php");
require_once("include/facebook-config.php");

try {
	if(isset($_SESSION['access_token'])){
		$access_token = $_SESSION['access_token'];
	} else {
		$access_token = $facebook_helper->getAccessToken();
		$_SESSION['access_token'] = $access_token;
	}
}
catch(Facebook\Exceptions\facebookResponseException $e) {
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}
	
if (isset($access_token)) {
	if (isset($_SESSION['access_token'])) {
		$fb->setDefaultAccessToken($_SESSION['access_token']);
	} else {
		// OAuth 2.0 client handler
		$oAuth2Client = $fb->getOAuth2Client();
		// Exchanges a short-lived access token for a long-lived one
		$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['access_token']);
		$_SESSION['access_token'] = (string) $longLivedAccessToken;
		// setting default access token to be used in script
		$fb->setDefaultAccessToken($_SESSION['access_token']);
	}
}

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
	try {
		$profile_request = $fb->get('/me?fields=name,first_name,last_name,email');
		$requestPicture = $fb->get('/me/picture?redirect=false&height=200');
		$picture = $requestPicture->getGraphUser();
		$profile = $profile_request->getGraphUser();
		$fbid = $profile->getProperty('id');
		$first_name = $profile->getProperty('first_name');
		$last_name = $profile->getProperty('last_name'); 
		$fbemail = $profile->getProperty('email');
		$fbpic = $picture['url'];
		
		// Storing data into database
		$id = $fbid;
		$oauth_provider = "facebook";
		$first_name = $first_name;
		$last_name = $last_name;
		$email = $fbemail;
		$picture = $fbpic;
	  
		// checking user already exists or not
		$stmt = $dbh->query("SELECT `oauth_uid` FROM `users` WHERE `oauth_uid`='$id'");
		if($stmt->rowCount() > 0){
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['login_id'] = $id;
			$_SESSION['id'] = $result['id'];
			$_SESSION['first_name'] = $result['first_name'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['picture'] = $picture;
			$_SESSION['role'] = $result['role'];

			$sql1 = "SELECT * FROM privilege_table WHERE user_id=:id";
			$stmt1 = $dbh->prepare($sql1);
			$stmt1->execute(array(
				":id" => $result['id']
			));
			$result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
			$array_refactor=[];
			for($i=0;$i<count($result1);$i++){
				$name = $result1[$i]['privilege'];
				$status = $result1[$i]['status'];
				$array_refactor[$name] = $status;
			}
			$_SESSION['privilege'] = $array_refactor;

			header('Location: index.php?page=vision-mission');
			exit;
		} else {
		  echo $sql = "INSERT INTO users(oauth_provider,
					oauth_uid,
					first_name,
					last_name,
					email,
					picture) VALUES (
					:oauth_provider, 
					:oauth_uid, 
					:first_name, 
					:last_name, 
					:email, 
					:picture)";
												  
			$stmt = $dbh->prepare($sql);
														  
			$stmt->bindParam(':oauth_provider', $oauth_provider, PDO::PARAM_STR);$stmt->bindParam(':oauth_uid', $id, PDO::PARAM_STR); 
			$stmt->bindParam(':first_name', $first_name, PDO::PARAM_STR);
			$stmt->bindParam(':last_name', $last_name, PDO::PARAM_STR); 
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);   
			$stmt->bindParam(':picture', $picture, PDO::PARAM_STR);
												  
			$stmt->execute();
			$insertedId = $dbh->lastInsertId();	
			if($insertedId){
				$_SESSION['login_id'] = $id;
				$_SESSION['id'] = $insertedId;
				$_SESSION['first_name'] = $first_name;
				$_SESSION['email'] = $email;
				$_SESSION['picture'] = $picture;
				$_SESSION['role'] = 0;
				$_SESSION['privilege'] = [];
				
				header('Location: index.php?page=vision-mission');
				exit;
			}
		}
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		header('Location: logout.php');
		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
} else {
	header('Location: logout.php');
	exit;
}