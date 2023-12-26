<?php

require_once("include/header.php");
include_once('./include/session.php');



$id = $_GET['id'];


global $dbh; 
$sql = "SELECT * FROM flash_card_master WHERE id = :id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":id" => $id
));

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM flash_card_question WHERE card_id = :id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":id" => $id
));

$category_result = $stmt->fetchAll(PDO::FETCH_ASSOC);



if($_SERVER['HTTP_HOST']!="localhost"){
?>
<!-- <script>
    document.addEventListener("contextmenu", (event) => {
         event.preventDefault();
      });
</script> -->
<script>
const disabledKeys = ["a", "A", "c", "C", "x", "X", "v", "V", "J", "u", "U", "I", "i", "p",
"P"]; // keys that will be disabled 
const showAlert = e => {
    e.preventDefault(); // preventing its default behaviour 
    return alert("Sorry, you can't view or copy source codes this way!");
}
document.addEventListener("contextmenu", e => {
    showAlert(e); // calling showAlert() function on mouse right click 
});
document.addEventListener("keydown", e => {
    // calling showAlert() function, if the pressed key matched to disabled keys 
    if ((e.ctrlKey && disabledKeys.includes(e.key)) || e.key === "F12") {
        showAlert(e);
    }
});
</script>
<style>
body {
    -webkit-user-select: none;
    /* Safari */
    -ms-user-select: none;
    /* IE 10 and IE 11 */
    user-select: none;
    /* Standard syntax */
}
</style>
<?php
}
?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="wrapper">
    <div class="page-content">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3"><em class="bi bi-award-fill"></em><?php echo " "; echo TITLE_FLASHCARDS; ?>
                    </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-award-fill"></i>
                                </li> -->
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);"><?php echo _Quiz; ?></a></li> -->
                                <li class="breadcrumb-item active" aria-current="page">
                                    <?php echo $result[0]['category_title']; ?></li>

                            </ol>
                        </nav>
                    </div>

                </div>

                <div class="main-title card p-2">
                    <h2 class="text-success"><?php echo _Questions." "._Manager; ?></h2>
                </div>
                <?php

                ?>
                <div class="card">
                    <div class="card-body">
                        <table class="table mb-0">
                            <?php
                                
                                //$data = getSpecificData();
                                for ($i = 0; $i < count($category_result); $i++) 
                                {
                                    if($category_result[$i]['status']=='0'){
                                        $style='style="color:red"';
                                    }else{
                                        $style='style="color:green"';
                                    }
                                    echo '<tr><td></td><td></td></tr><tr><td><a href="javascript:;" data-editid="'.$category_result[$i]['id'].'" data-question="'.$category_result[$i]['question'].'" data-correct_ans="'.$category_result[$i]['answer'].'" data-status="'.$category_result[$i]['status'].'" data-bs-toggle="modal" data-bs-target="#editmodal"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Edit"><i class="bi bi-pencil-fill fs-5" '.$style.'></i></i></a></td><td><span class="fw-bold">'.($i+1) .') '.$category_result[$i]["question"].'</span></td></tr>';
                                    echo '<tr><td>Ans</td><td>'.$category_result[$i]["answer"].'</td></tr>';
                                }

                                ?>
                        </table>
                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->



                <?php
                // include("include/copyright-footer.php"); 
                ?>


            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
    </div>
    <!-- Right Sidebar -->

    <div class="modal fade" id="editmodal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modify Question</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body form-body">
                <form class="mt-20" action="edit-question.php" method="post">
                    <input type="hidden" name="id">
                    <div class="form-group">
                        <label for="Question">Question</label>
                        <input type="text" class="form-control form-control-sm" name="Question" placeholder="Question" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="answer">answer</label>
                        <input type="text" class="form-control form-control-sm" name="answer" placeholder="answer" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo BTN_CLOSE ; ?></button>
                        <button type="submit" class="btn btn-primary" name="change_flash_question" value="Edit_Pro">change</button>
                    </div>
                    


                </form>
            </div>

        </div>
    </div>
</div>
    <script>
$('#editmodal').on('show.bs.modal', function(e) {
    var editid = $(e.relatedTarget).data('editid');
    var Question = $(e.relatedTarget).data('question');
    var answer = $(e.relatedTarget).data('correct_ans');
    var status = $(e.relatedTarget).data('status');
    $(e.currentTarget).find('input[name="id"]').val(editid);
    $(e.currentTarget).find('input[name="Question"]').val(Question);
    $(e.currentTarget).find('input[name="answer"]').val(answer);
    $(e.currentTarget).find('select[name="status"]').val(status);
});
</script>