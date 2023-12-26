<?php
include_once('include/session.php');
include_once('include/connection.php');

if(isset($_POST['change_question']))
{
    $sql = "update question_master set question_title = :question_title,option1=:option1,option2=:option2,option3=:option3,option4=:option4,correct_ans=:correct_ans,status=:status where question_id=:id";
    // echo $sql;exit;
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":id" => $_POST['id'],
        ":question_title" => $_POST['Question'],
        ":option1" => $_POST['option1'],
        ":option2" => $_POST['option2'],
        ":option3" => $_POST['option3'],
        ":option4" => $_POST['option4'],
        ":correct_ans" => $_POST['correct_ans'],
        ":status" => $_POST['Status']
    ));
    header('location:index.php?page=quiz-management');
}

if(isset($_POST['change_flash_question']))
{
    $sql = "update flash_card_question set question = :question,answer=:answer,status=:status where id=:id";
    // echo $sql;exit;
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":id" => $_POST['id'],
        ":question" => $_POST['Question'],
        ":answer" => $_POST['answer'],
        ":status" => $_POST['status']
    ));
    header('location:index.php?page=flashcard-management');
}

?>