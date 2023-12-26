<?php 

require_once("include/header.php");

$cat_id = $_GET['id'];

$sql = "SELECT * FROM category_master WHERE category_id = $cat_id";
$stmt = $dbh->query($sql);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$video_query = "SELECT * FROM video_details WHERE video_id = :cat_id AND user_id = :id";
$stmt = $dbh->prepare($video_query);
$stmt->execute(array(
    ":cat_id" => $cat_id,
    ":id" => $_SESSION['id']
));
$video_array = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="wrapper">
    <div class="page-content quiz-desc">
        <div class="main-title card p-2">
            <h2 class="text-success"><?php echo $result['category_title']; ?></h2>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            What You'll Learn
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <?php 
                                $i = 1;
                                $points = explode("  ", $result['learning']);
                                $output = '';
                                // Display the points
                                $output .= "<ul>";
                                foreach ($points as $point) {
                                    $point_head = explode(": ", $point);
                                    $output .= "<li>";
                                    $output .= "$i. " . $point_head[0] . ":<br>";
                                    $output .= "<p>".$point_head[1]."</p>";
                                    $output .= "</li>";
                                    $i++;
                                }
                                $output .= "</ul>";
                                echo $output;
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Quiz Description
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <?php echo $result['description']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Rewards and Recognition
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <?php echo $result['rewards']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    if(isset($_COOKIE['quiz'.$result['category_id']])) {
                        if($_COOKIE['quiz'.$result['category_id']]==$result['category_id'])
                        {
                            $quizurl="index.php?page=quiz&id=".$_COOKIE['quiz'.$result['category_id']];
                            $take_quiz='<a href="'.$quizurl.'" class="btn btn-success">Take Quiz</a>';
                        }
                       
                    }
                    else {
                        $quizurl="javascript: void(0);";
                        $take_quiz='';
                    }
                    echo "<div class='take'>".$take_quiz."</div>";
                ?>
            </div>
            <div class="col-md-3">
                <div class="lightboxContainer" onclick="image(<?php echo $result['category_id']; ?>)">
                    <img id="myImg" class="img-fluid h-100 w-100 quizimg" src="./photos/quiz/<?php echo $result['category_image']; ?>">
                </div>
                <div id="myModal_<?php echo $result['category_id']; ?>" class="xyz">
                    <span class="close" onclick="closeModal(<?php echo $result['category_id'] ?>)">&times;</span>
                    <video id="video_<?php echo $result['category_id']; ?>" data-curr-time=<?php echo $video_array[0]['curr_time']; ?> class="video" controls>
                        <source src="<?php echo $result['video_url'] ?>" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/user-session.js"></script>

<?php require_once('include/footer.php'); ?>