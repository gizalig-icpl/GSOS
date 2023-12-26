<?php
require_once("include/process_include.php");
require_once('include/session.php');
require_once('include/connection.php');
require_once('include/functions.php');

$galleryName = purifier($_POST['galleryName']);
$collection_id = purifier($_POST['collection_id']);
$hidden_token = purifier($_POST['hidden_token']);
$image       = $_FILES['image'];

$goBackLink = "<a href='".Photos_Page_Link."&gallery=".$galleryName."&id=".$collection_id."'>Go back to Gallery</a>";

$target_dir = Gallery_Folder.$galleryName."/";

if(isset($galleryName)) {

    $response = fileUpload($image, $target_dir); 
    if ($response->msg==="success") {
        //header("location: ".Photos_Page_Link."?gallery=".$galleryName);

        $title = explode('.',$image["name"]);
        $filename = $response->filename;

        try {
                $sql = "INSERT INTO photo(title,image,collection_id,user_id) values (:title,:image,:collection_id,:user_id) ";
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array(
                    ":title"=>$title[0],
                    ":image"=>$filename,
                    ":collection_id" => $collection_id,
                    ":user_id" => $_SESSION['id']
                ));
                
                if($hidden_token == '') {
                    header("location: ".Photos_Page_Link."&gallery=".$galleryName."&id=".$collection_id);
                }
                else {
                    header("location: ".Photos_Page_Link."&gallery=".$galleryName."&id=".$collection_id."&token=".$hidden_token);
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
}
?>