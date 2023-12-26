<?php 
require_once('./include/config.php');
require_once('./include/session.php');
require_once('./include/connection.php');
require_once('./include/functions.php');
require_once('./include/certificates.php');

global $dbh;
$quiz_id= $_GET['id'];
$sql = "SELECT q.*, c.category_title FROM quiz_master q inner join category_master c ON q.category_id = c.category_id WHERE q.id = :id limit 1";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":id" => $quiz_id
));
$row_users = $stmt->fetch(PDO::FETCH_ASSOC);

$arr=json_decode($row_users['question'], true);
$arr1=json_decode($row_users['answer'], true);
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

$first_name = $row_users['user_fname'];
$last_name = $row_users['user_lname'];
$correct_ans = $correct_ans;
$total_question = count(json_decode($row_users['question'], true));
$quiz_time = $row_users['quiz_time'];
$category_title = $row_users['category_title'];

$branding=config("logo","branding");
if($branding==0)
{
$logo=config("logo","infopercept_image");
$logo_small=config("logo","infopercept_images_small");
}
else{
$logo=config("logo","branding_image");
$logo_small=config("logo","branding_image_small");
}

if($row_users['certificate'] == "") {
    $certi_type = config("logo", "certi_type");
    $generate_certi = [
        1 => 'certiOne',
        2 => 'certiTwo',
        3 => 'certiThree',
        4 => 'certiFour',
        5 => 'certiFive',
        6 => 'certiSix',
        7 => 'certiSeven',
        8 => 'certiEight',
        9 => 'certiNine'
    ];
    $certi_type = ($certi_type > 0 && $certi_type <=9)?$certi_type:1;
    call_user_func($generate_certi[$certi_type], $dbh, $first_name, $last_name, $correct_ans, $total_question, $quiz_time, $category_title, $quiz_id, $logo_small);
} else {
    $filename="./quiz_certificate/".$row_users['certificate'];
}

if($filename){
    // Header content type
    header('Content-type: application/pdf');

    header('Content-Disposition: inline; filename="' . $filename . '"');

    header('Content-Transfer-Encoding: binary');

    header('Accept-Ranges: bytes');

    // Read the file
    @readfile($filename);
}

?>