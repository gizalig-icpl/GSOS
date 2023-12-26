<?php
require_once("include/process_include.php");
require_once('include/session.php');
require_once('include/connection.php');
require_once('include/functions.php');
$galleryOBJ = new Gallery();

$status = 0;
$status=purifier($_POST['status']);
$hidden_token=purifier($_POST['hidden_token']);

$galleryName = htmlspecialchars(trim($_POST['galleryName']));
$image= $_FILES['image'];

if($hidden_token == '') {
	$goBackLink = "<a href='index.php?page=resource-space'>Go back to Gallery</a>";
}
else {
	$goBackLink = "<a href='index.php?page=resource-space?token=".$hidden_token."'>Go back to Gallery</a>";
}

/*if(!file_exists(Gallery_Folder."/thumbnail")) {
            if(mkdir(Gallery_Folder."/thumbnail")){
               
            }
        }*/

$target_dir = Gallery_Folder."/";

$target_file = $target_dir . basename($image["name"]);

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



// if(isset($image) && $image["name"] != '') {
    
    /*if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        echo "<br>".$goBackLink;
        exit;
    }*/

//     if (move_uploaded_file($image["tmp_name"], $target_file)) {
        
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//         echo "<br>".$goBackLink;
//         exit;
//     }
// }

if(isset($image)) {

    $response = fileUpload($image, $target_dir); 
    if ($response->msg==="success") {
        //header("location: ".Photos_Page_Link."?gallery=".$galleryName);

        $title = explode('.',$image["name"]);
        $filename = $response->filename;

        try {
            $sql = "INSERT INTO collection(title,thumbnail,status,user_id) values (:title,:thumbnail,:status,:user_id) ";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":title"=>$galleryName,
                ":thumbnail"=>$filename,
                ":status" => $status,
                ":user_id" => $_SESSION['id']
            ));
            
            if($hidden_token == '') {
                header("location: index.php?page=resource-space");
            }
            else {
                header("location: index.php?page=resource-space?token=".$hidden_token);
            }
            
        }
        catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
        echo "<br>";
        echo xss_safe($goBackLink);
        exit;
    }
}

	$result = $galleryOBJ->addGallery($galleryName);

                if ($result) {
                    $response['success'] = $result;
                }

?>