<?php
include_once('include/session.php');
include_once('include/connection.php');
include_once('include/functions.php');
require_once("include/constants.php");
include('include/sendmailer.php');

$id=purifier($_POST['id']);
$training_id = ":training_id";
$assign_user_id = ":assign_user_id";
$user_id = ":user_id";
$start_date = ":start_date";
$end_date = ":end_date";
$assign_user_id = ":assign_user_id";
$assign_user_id = ":assign_user_id";

if(isset($_POST['edit_training']) || isset($_POST['add_training']))
{
    $title=purifier($_POST['title']);
    $training_assign=purifier($_POST['training_assign']);
}
if(isset($_POST['assign_user']))
{
    foreach($_POST['to'] as $value){

        $sql = "select * from training_assign where user_id=:user_id and training_id=:training_id and assign_user_id=:assign_user_id";
        // print_r($_POST['to']);exit;
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":training_id" => $id,
            ":assign_user_id" => $_SESSION['id'],
            ":user_id" => $value
        ));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result))
        {
            $sql = "update training_assign set start_date=:start_date,end_date=:end_date where user_id=:user_id and training_id=:training_id and assign_user_id=:assign_user_id";
            // print_r($_POST['to']);exit;
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":training_id" => $id,
                ":assign_user_id" => $_SESSION['id'],
                ":user_id" => $value,
                ":start_date" => $_POST['start_date'],
                ":end_date" => $_POST['end_date']
            ));
        }else{
            $sql = "insert into training_assign(assign_user_id,user_id,training_id,start_date,end_date) values(:assign_user_id,:user_id,:training_id,:start_date,:end_date)";
            // print_r($_POST['to']);exit;
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":training_id" => $id,
                ":assign_user_id" => $_SESSION['id'],
                ":user_id" => $value,
                ":start_date" => $_POST['start_date'],
                ":end_date" => $_POST['end_date']
            ));

            $sql = "SELECT ta.assign_user_id,t.title,u.email FROM training_assign as ta,training as t,users as u WHERE ta.training_id=t.training_id and ta.user_id=u.id and ta.assign_user_id=:assign_user_id and ta.user_id=:user_id and ta.training_id=:training_id";
            // print_r($_POST['to']);exit;
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":assign_user_id" => $_SESSION['id'],
                ":user_id" => $value,
                ":training_id" => $id
            ));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $auid=$result[0]['assign_user_id'];
            $sql1 = "SELECT concat(u.first_name,' ',u.last_name) AS name FROM training_assign as ta,users as u WHERE ta.assign_user_id=u.id and ta.assign_user_id=:assign_user_id";
            // print_r($_POST['to']);exit;
            $stmt1 = $dbh->prepare($sql1);
            $stmt1->execute(array(
                ":assign_user_id" => $auid
            ));
            $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            SendAssignTraining('sendassigntraining',$result[0]['title'],$_POST['start_date'],$_POST['end_date'],$result[0]['email'],$result1[0]['name']);	
        }
    }
    header('location:index.php?page=manage-training');
}
if(isset($_POST['assign_department']))
{
    foreach($_POST['to'] as $value){

        $sql2 = "select id from users where department=:department";
        // print_r($_POST['to']);exit;
        $stmt2 = $dbh->prepare($sql2);
        $stmt2->execute(array(
            ":department" => $value
        ));
        $result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        for($i=0;$i<count($result2);$i++)
        {

        $userid=$result2[$i]['id'];
        $sql = "select * from training_assign where user_id=:user_id and training_id=:training_id and assign_user_id=:assign_user_id";
        // print_r($_POST['to']);exit;
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":training_id" => $id,
            ":assign_user_id" => $_SESSION['id'],
            ":user_id" => $userid
        ));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(!empty($result))
        {
            $sql = "update training_assign set start_date=:start_date,end_date=:end_date where user_id=:user_id and training_id=:training_id and assign_user_id=:assign_user_id";
            // print_r($_POST['to']);exit;
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":training_id" => $id,
                ":assign_user_id" => $_SESSION['id'],
                ":user_id" => $userid,
                ":start_date" => $_POST['start_date'],
                ":end_date" => $_POST['end_date']
            ));
        }else{
            $sql = "insert into training_assign(assign_user_id,user_id,training_id,start_date,end_date) values(:assign_user_id,:user_id,:training_id,:start_date,:end_date)";
            // print_r($_POST['to']);exit;
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":training_id" => $id,
                ":assign_user_id" => $_SESSION['id'],
                ":user_id" => $userid,
                ":start_date" => $_POST['start_date'],
                ":end_date" => $_POST['end_date']
            ));

            $sql = "SELECT ta.assign_user_id,t.title,u.email FROM training_assign as ta,training as t,users as u WHERE ta.training_id=t.training_id and ta.user_id=u.id and ta.assign_user_id=:assign_user_id and ta.user_id=:user_id and ta.training_id=:training_id";
            // print_r($_POST['to']);exit;
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":assign_user_id" => $_SESSION['id'],
                ":user_id" => $userid,
                ":training_id" => $id
            ));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $auid=$result[0]['assign_user_id'];
            $sql1 = "SELECT concat(u.first_name,' ',u.last_name) AS name FROM training_assign as ta,users as u WHERE ta.assign_user_id=u.id and ta.assign_user_id=:assign_user_id";
            // print_r($_POST['to']);exit;
            $stmt1 = $dbh->prepare($sql1);
            $stmt1->execute(array(
                ":assign_user_id" => $auid
            ));
            $result1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
            SendAssignTraining('sendassigntraining',$result[0]['title'],$_POST['start_date'],$_POST['end_date'],$result[0]['email'],$result1[0]['name']);	
        }
    }
    }
    header('location:index.php?page=manage-training');
}

if(isset($_POST['add_training']))
{
    $created_date=date('Y-m-d H:i:s');
    $sql = "insert into training(title,created_date,assign_status) values(:title,:created_date,:training_assign)";
    // print_r($_POST['to']);exit;
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":title" => $title,
        ":training_assign" => $training_assign,
        ":created_date" => $created_date
    ));
    header('location:index.php?page=manage-training');
}
if(isset($_POST['edit_training']))
{
    $sql = "update training set title=:title,assign_status=:training_assign where training_id=:id";
    // print_r($_POST['to']);exit;
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":title" => $title,
        ":training_assign" => $training_assign,
        ":id" => $id
    ));
    header('location:index.php?page=manage-training');
}

?>