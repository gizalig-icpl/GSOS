<?php   
  
  include_once('./include/session.php');
  include_once('include/connection.php');
  date_default_timezone_set('Asia/Kolkata');
$user_id = $_POST['user_id'];  
$training_id = $_POST['training_id'];  
$topic_id = $_POST['topic_id'];  
$start_time=date('Y-m-d H:i:s');
$end_time=date('Y-m-d H:i:s');
$status=$_POST['status'];

$user_sql = "SELECT * FROM user_training_detail where user_id = :user_id and training_id=:training_id and topic_id=:topic_id";
$user_stmt = $dbh->prepare($user_sql);
$user_stmt->bindParam(':user_id',$_SESSION['id'],PDO::PARAM_INT);
$user_stmt->bindParam(':training_id',$training_id,PDO::PARAM_INT);
$user_stmt->bindParam(':topic_id',$topic_id,PDO::PARAM_INT);
$user_stmt->execute();
$user_result = $user_stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($user_result)>0)
{
    $id=$user_result[0]['id'];
    if($status==1)
    {
        $update_user_sql = "update user_training_detail set end_time=:end_time,status=:status where id=:id";
        $update_user_stmt = $dbh->prepare($update_user_sql);
        $update_user_stmt->execute(array(
            ":end_time" => $end_time,
            ":status" => $status,
            ":id" => $id
        ));
    }
    
}
else{

    if($status==0)
    {
        $sql = "INSERT INTO user_training_detail(user_id,training_id,topic_id,start_time,status) values (:user_id,:training_id,:topic_id,:start_time,:status) ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":user_id"=>$user_id,
            ":training_id"=>$training_id,
            ":topic_id" => $topic_id,
            ":start_time" => $start_time,
            ":status" => $status
        ));
    }
    if($status==1)
    {
        $sql = "INSERT INTO user_training_detail(user_id,training_id,topic_id,start_time,end_time,status) values (:user_id,:training_id,:topic_id,:start_time,:end_time,:status) ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":user_id"=>$user_id,
            ":training_id"=>$training_id,
            ":topic_id" => $topic_id,
            ":start_time" => $start_time,
            ":end_time" => $end_time,
            ":status" => $status
        ));
    }
    
}
?>  