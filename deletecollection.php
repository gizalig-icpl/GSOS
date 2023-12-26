<?php 
	include_once('include/session.php');
	include_once('include/connection.php');
	include_once('include/functions.php');
	require_once("include/process_include.php");
	$name = $_POST['title'];
    
    try {
	    $sql = "update collection set isdeleted = '1' WHERE collection_id=:id";
	    $stmt = $dbh->prepare($sql);
	    $stmt->execute(array(
            ":id" => $_POST['id']
	    ));
	    
	    if($stmt->rowCount()>0){
            echo "Deleted";
	    }
	    else{
	    	echo "Error";
	    }
	}
    catch(PDOException $e) {
	  echo $sql . "<br>" . $e->getMessage();
	}
	
	 $dir = Gallery_Folder.$name;

         if(file_exists($dir)) {
            foreach(scandir($dir) as $file) {
                if ('.' === $file || '..' === $file) continue;
                if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
                else unlink("$dir/$file");
            }
            
            if(rmdir($dir))
                return true;
        }
        return false;
?>