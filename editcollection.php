<?php
require_once('include/process_include.php');
require_once('include/session.php');
require_once('include/connection.php');
require_once('include/functions.php');
$galleryOBJ = new Gallery();

$editgalleryName = htmlspecialchars(trim($_POST['editgalleryName']));


$oldgalleryName = htmlspecialchars(trim($_POST['oldGalleryName']));
                
if(isset($_POST['status'])) {
		
	$status = $_POST['status'];
}
else {
	$status = '0';
}
$image = $_FILES['editimage'];

if($_POST['edit_token'] == '') {
	$goBackLink = "<a href='index.php?page=resource-space'>Go back to Gallery</a>";
}
else {
	$goBackLink = "<a href='index.php?page=resource-space?token=".$_POST['edit_token']."'>Go back to Gallery</a>";
}

/*if(!file_exists(Gallery_Folder."/thumbnail")) {
            if(mkdir(Gallery_Folder."/thumbnail")){
               
            }
        }*/

$target_dir = Gallery_Folder."/";

$target_file = $target_dir . basename($image["name"]);

$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);



if(isset($image) && $image["name"] != '') {
    
    /*if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        echo "<br>".$goBackLink;
        exit;
    }*/

    // if (move_uploaded_file($image["tmp_name"], $target_file)) {
        
    // } else {
    //     echo "Sorry, there was an error uploading your file.";
    //     echo "<br>".$goBackLink;
    //     exit;
    // }
	$response = fileUpload($image, $target_dir); 
    if ($response->msg==="success") {
        //header("location: ".Photos_Page_Link."?gallery=".$galleryName);

        $title = explode('.',$image["name"]);
        $filename = $response->filename;
	
	try {
	    $sql = "UPDATE collection SET title=:title,thumbnail=:thumbnail,status=:status,user_id=:user_id WHERE collection_id=:collection_id ";
	    $stmt = $dbh->prepare($sql);
	    $stmt->execute(array(
            ":title"=>$editgalleryName,
            ":thumbnail"=>$filename,
	    	":status" => $status,
            ":user_id" => $_SESSION['id'],
			":collection_id" => $_POST['collection_id']
	    ));
	    
			
			if($_POST['edit_token'] == '') {
			header("location: index.php?page=resource-space");
					}
		else {
			header("location: index.php?page=resource-space?token=".$_POST['edit_token']);
		}
	}
    catch(PDOException $e) {
	  echo $sql . "<br>" . $e->getMessage();
	}
} else {
	echo "Sorry, there was an error uploading your file.";
	echo "<br>".$goBackLink;
	exit;
}
	
	$result = $galleryOBJ->editGalleryName($oldgalleryName,$editgalleryName);
                
	if($result == true){
		$response['success'] = true;
	}
}
else {
	try {
	    $sql = "UPDATE collection SET title=:title,status=:status,user_id=:user_id WHERE collection_id=:collection_id ";
	    $stmt = $dbh->prepare($sql);
	    $stmt->execute(array(
            ":title"=>$editgalleryName,
	    	":status" => $status,
            ":user_id" => $_SESSION['id'],
			":collection_id" => $_POST['collection_id']
	    ));
	    
			
       if($_POST['edit_token'] == '') {
	header("location: index.php?page=resource-space");
			}
else {
	header("location: index.php?page=resource-space?token=".$_POST['edit_token']);
}
	}
    catch(PDOException $e) {
	  echo $sql . "<br>" . $e->getMessage();
	}
	
	$result = $galleryOBJ->editGalleryName($oldgalleryName,$editgalleryName);
                
	if($result == true){
		$response['success'] = true;
	}
}


           
?>