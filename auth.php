<?php 
require_once("include/session.php"); 
require_once("include/connection.php");
require_once("include/google-config.php");

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
	//It will Attempt to exchange a code for an valid authentication token.
	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

	//This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
	if(!isset($token['error']))
	{
		//Set the access token used for requests
		$google_client->setAccessToken($token['access_token']);

		//Store "access_token" value in $_SESSION variable for future use.
		$_SESSION['access_token'] = $token['access_token'];

		//Create Object of Google Service OAuth 2 class
		$google_service = new Google_Service_Oauth2($google_client);

		//Get user profile data from google
		$data = $google_service->userinfo->get();
	  
		// Storing data into database
		$id = $data['id'];
		$oauth_provider = "google";
		$first_name = trim($data['given_name']);
		$last_name = trim($data['family_name']);
		$email = $data['email'];
		$picture = $data['picture'];
	  
		// checking user already exists or not
		$stmt = $dbh->query("SELECT * FROM `users` WHERE `oauth_uid`='$id'");
		if($stmt->rowCount() > 0){
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['login_id'] = $id;
			$_SESSION['id'] = $result['id'];
			$_SESSION['first_name'] = $result['first_name'];
			$_SESSION['email'] = $result['email'];
			$_SESSION['picture'] = $result['picture'];
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
	} else {
		header('Location: index.php');
		exit;
	}
}