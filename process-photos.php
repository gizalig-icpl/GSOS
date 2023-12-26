<?php
require_once("include/process_include.php");
require_once('include/session.php');
require_once('include/connection.php');

// structure JSON response
$response = array();
$response['success']  = false;
$response['messages'] = array();

if (!array_key_exists("action", $_POST)) {
    $response["messages"][] = 'Invalid action';
    echo json_encode($response);
    exit();
}

$photosOBJ = new Photos();

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $action = $_POST['action'];

    switch($action) {
        case 'deletePhoto':
                $galleryName = htmlspecialchars(trim($_POST['galleryName']));
                $photoName   = htmlspecialchars(trim($_POST['photoName']));

                $result = $photosOBJ->deleteGalleryPhotos($galleryName,$photoName);
				
				try {
					$sql = "update photo set isdeleted = '1' WHERE photo_id=:id";
					$stmt = $dbh->prepare($sql);
					$stmt->execute(array(
						":id" => $_POST['photo_id']
					));
					
					if($stmt->rowCount()>0){
						//echo "Deleted";
					}
					
				}
				catch(PDOException $e) {
				  echo $sql . "<br>" . $e->getMessage();
				}

                if($result == true){
                    $response['success'] = true;
                }               
            else{
                $response['success'] = false;
            }
            echo json_encode($response);
            break; //END 'saveCart'

        default:
            break; // END 'default'

    } // End Switch
}
?>