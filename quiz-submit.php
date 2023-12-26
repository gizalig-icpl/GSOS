<?php

require_once("include/header.php");
include_once('./include/session.php');
include_once('./include/connection.php');
include_once('./include/functions.php');
global $dbh; 

$quiz_data = $dbh->prepare("SELECT * FROM quiz_master;");
$quiz_data->execute();

$last_id_query = $dbh->prepare("SELECT id FROM quiz_master ORDER BY id DESC LIMIT 1");
$last_id_query->execute();
$id = $last_id_query->fetch(PDO::FETCH_ASSOC)['id'];

if($quiz_data->rowCount() > 0){
    $i = 1; 
    $rows = $quiz_data->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $key => $result){ 
        $category_id= $result['category_id'];
        $question_sql = "SELECT count(category_id) from question_master WHERE category_id = :id";
        $stmt = $dbh->prepare($question_sql);
        $stmt->execute(array(
            ":id" => $category_id
        ));
        
        $question_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $total_question= config("quiz", "number_of_questions");

        $arr=json_decode($result['question'], true);
        $arr1=json_decode($result['answer'], true);
        $correct_ans=0;
        for ($j = 0; $j < count($arr); $j++) {
            $correct_sql = "SELECT correct_ans from question_master WHERE question_id = :id";
            $stmt = $dbh->prepare($correct_sql);
            $stmt->execute(array(
                ":id" => $arr[$j]["question_id"]
            ));

            $correct_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $option="option".$correct_result[0]["correct_ans"];
            $question="question".$j;
            if($arr[$j][$option]==$arr1[array_search($question,array_column($arr1,'name'))]["value"])
            {
                $correct_ans+=1;
            }
        }

        $total_attempt = count($arr1)-1;
        $unattempted = config("quiz", "number_of_questions")-$total_attempt;
        $wrong_ans = $total_attempt-$correct_ans;
        // array_push($name_score,array('name'=>$result['user_fname'],'ans'=>$correct_ans));
        
    }
}

$stmt = $dbh->prepare("SELECT * FROM category_master WHERE category_id = :category_id");
$stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);
$stmt->execute();
$result1 = $stmt->fetch(PDO::FETCH_ASSOC);
$per=($correct_ans*100)/$total_question;

// $sql = "SELECT * FROM quiz_master WHERE author_id = :id ORDER BY id desc limit 1";
// $stmt = $dbh->prepare($sql);
// $stmt->execute(array(
//     ":id" => $_SESSION['id']
// ));

// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// include('./include/sendmailer.php');
// if(isset($_POST['profileSubmit'])){
//   echo "<script>alert('ok')</script>";
//   sendMail();
// }
?>
<div class="wrapper">
    <div class="page-content">
        <div class="row">

            <?php 
                if($per >= $result1['min_score']){
                    ?>
                        <div class="container card p-5">
                            <div class='d-flex-inline'>
                                <h2>You have passed the quiz.</h2>
                                <?php
                                echo "<button class='btn bg-primary'><a class='text-white' href='index.php?page=review-quiz&id=". $id ."'>Review</a></button>";
                                ?>
                                <?php
                                echo "<button class='btn bg-primary'><a class='text-white' href='generate-certificate.php?id=". $id ."'>Download Certificate</a></button>";
                                ?>
                            </div>
                            <table class="table table-striped table-bordered table-responsive mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Total Question</th>
                                        <th scope="col">Total Attempt</th>
                                        <th scope="col">Unattempted</th>
                                        <th scope="col">Correct Answer</th>
                                        <th scope="col">Wrong Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo xss_safe($total_question); ?></td>
                                        <td><?php echo xss_safe($total_attempt); ?></td>
                                        <td><?php echo xss_safe($unattempted); ?></td>
                                        <td><?php echo xss_safe($correct_ans); ?></td>
                                        <td><?php echo xss_safe($wrong_ans); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <img src="images/Successfull.gif" alt="Successful" style="display: block;
                                margin-left: auto;
                                margin-right: auto;
                                width: 50%;">
                        </div>
                    <?php
                } else{
                    ?>
                        <div class="container card p-5">
                            <div class='d-flex-inline'>
                                <h2 class="text-align-center">You have failed the quiz.</h2>
                                <?php
                                echo "<button class='btn bg-primary'><a class='text-white' href='index.php?page=review-quiz&id=". $id ."'>Review</a></button>";
                                ?>
                                <?php
                                echo "<button class='btn bg-primary'><a class='text-white' href='index.php?page=quiz&id=". $category_id ."'>Take Again</a></button>";
                                ?>
                            </div>
                            <table class="table table-striped table-bordered table-responsive mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Total Question</th>
                                        <th scope="col">Total Attempt</th>
                                        <th scope="col">Unattempted</th>
                                        <th scope="col">Correct Answer</th>
                                        <th scope="col">Wrong Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo xss_safe($total_question); ?></td>
                                        <td><?php echo xss_safe($total_attempt); ?></td>
                                        <td><?php echo xss_safe($unattempted); ?></td>
                                        <td><?php echo xss_safe($correct_ans); ?></td>
                                        <td><?php echo xss_safe($wrong_ans); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php
                }
            ?>            

        </div>
    </div>
</div>