<?php   
  
  include_once('./include/session.php');
  include_once('include/connection.php');
  
$position = $_POST['position'];  
  
$i=1;  
foreach($position as $k=>$v){  
    $sql = "Update topic SET position_order=".$i." WHERE topic_id=".$v;  
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
  
    $i++;  
}  
  
?>  