<?php
require_once("include/process_include.php");

// structure JSON response
$response = array();
$response['success']  = false;
$response['messages'] = array();

if (!array_key_exists("action", $_POST)) {
    $response["messages"][] = 'Invalid action';
    echo json_encode($response);
    exit();
}

$galleryOBJ = new Gallery();

if ( $_SERVER["REQUEST_METHOD"] == "POST" ) {
    $action = $_POST['action'];

    switch($action) {
        case 'addGallery':
                $galleryName = htmlspecialchars(trim($_POST['galleryName']));

                $result = $galleryOBJ->addGallery($galleryName);

                if($result == true){
                    $response['success'] = true;
                }

            echo json_encode($response);
            break; //END 'saveCart'

        case "deleteGallery":
                $galleryName = htmlspecialchars(trim($_POST['galleryName']));
                
                $result = $galleryOBJ->deleteGallery($galleryName);
                
                if($result == true){
                    $response['success'] = true;
                }
            else {
                $response['success'] = false;
            }

            echo json_encode($response);
            break;

        case "editGallery":
                $galleryName = htmlspecialchars(trim($_POST['galleryName']));
                $newGalleryName = htmlspecialchars(trim($_POST['newName']));
                
                $result = $galleryOBJ->editGalleryName($galleryName,$newGalleryName);
                
                if($result == true){
                    $response['success'] = true;
                }
            else {
                $response['success'] = false;
            }
            
            echo json_encode($response);
            break;
        default:
            break; // END 'default'

    } // End Switch
}
?>