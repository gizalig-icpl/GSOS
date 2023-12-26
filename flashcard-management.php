<?php
     
    require_once("include/header.php");
    include_once('./include/session.php');
    include_once('include/connection.php');

    $processFile = 'flashcard-process.php';
?>

<div class="wrapper">
    <div class="page-content">
        
        <!-- Start Content-->
        <div class="content">
            <div class="container-fluid">
                <!-- start page title -->
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="fs-5"><em class="bi bi-wallet"></em><?php echo" "; echo TITLE_FLASHCARDS;?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-award-fill"></i>
                                </li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo _Quiz;?></li> -->

                            </ol>
                        </nav>
                    </div>
                    <!-- <div class="ms-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Settings</button>
                            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item" href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <!--end new bread crumb-->


                        <!-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">GSOS</a></li>
                                            <li class="breadcrumb-item active"><?php echo _Quiz;?></li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php echo _Quiz;?></h4>
                                </div>
                            </div>
                        </div> -->
                        <!-- end page title -->
                    <!--<div class="main-title card p-2" >
                        <h2 style="color:#0CB04A;">Quiz Management</h2>
                    </div>-->


                <!--new theme-->
                <div class="main-title card p-2" >
                    <div class="d-flex align-items-center">
                        <h3 class="mb-0 text-success"><?php echo FLASHCARD_MANAGEMENT; ?></h3>
                        <!--<form class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                            <input class="form-control ps-5" type="text" placeholder="search">
                        </form>-->
                        <div class="ms-auto position-relative">
                            <div class="dropdown d-inline d-none" id="bulk_flashcard">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo "Bulk Action"; ?>
                                </button>
                                <ul class="dropdown-menu">
                                    <li onClick="statusUpdate('enable', 'flashcard_ids', '<?php echo $processFile;?>')"><a class="dropdown-item" href="#"><?php echo "Enable"; ?></a></li>
                                    <li onClick="statusUpdate('disable', 'flashcard_ids', '<?php echo $processFile;?>')"><a class="dropdown-item" href="#"><?php echo "Disable"; ?></a></li>
                                </ul>
                            </div>
                            <!-- <span > <button  class="btn bg-primary text-light" data-bs-toggle="modal" data-bs-target="#add_training_modal"><?php //echo BTN_ADD_TRAINING; ?></button> </span> -->
                        </div>
                    </div>
                </div>
                <!--end new theme-->
            
                <!--new theme-->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">

                            <!-- <h5 class="mb-0">Customer Details</h5>
                            <form class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                                <input class="form-control ps-5" type="text" placeholder="search">
                            </form>--> 

                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table align-middle" id="war-game-sim-list">
                            <thead class="table-secondary">
                                <tr>
                                    <th scope="col">
                                        <input type="checkbox" class="checkbox" id="flashcardCheckAll">
                                    </th>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $deleted=0;
                                    $sql = "SELECT * FROM flash_card_master where deleted=:deleted order by id desc";
                                    $stmt = $dbh->prepare($sql);
                                    $stmt->bindParam(':deleted', $deleted, PDO::PARAM_INT);
                                    $stmt->execute();
                                    
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    for($i=0;$i<count($result);$i++){
                                ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" value="<?php echo $result[$i]["id"]; ?>" name="flashcard_ids" class="checkbox flashcard_check">        
                                    </td>
                                    <td><?php echo $i+1 ?></td>
                                    <td><?php echo $result[$i]['category_title']; ?></td>
                                    <td><img style="height:100px;" src="<?php echo "photos/flashcard/".$result[$i]['category_image'] ?>"></td>
                                    <td><?php echo $result[$i]['status'] == 0 ? "Inactive" : "Active"; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" onclick="createQModal(<?php echo $i ?>,<?php echo $result[$i]['id'] ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Flashcard">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        <button data-test-id="delete" type="button" class="btn btn-sm btn-outline-danger" onclick="deleteCategory(<?php echo $result[$i]['id'] ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                        <i class="bi bi-trash-fill"></i>
                                        </button>
                                        <a href="index.php?page=flash-question-management&id=<?php echo $result[$i]['id'] ?>" class="btn btn-sm btn-outline-primary" title="Update Flashcard Question">
                                            <i class="bi bi-gear-fill"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </div>
                    </div>
                </div>
                
                <!--end new theme-->

                
                <div id="modal-box-container"> </div>
                
            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->

        <?php //  include("include/copyright-footer.php"); ?>

    </div>
</div>


    
<!-- Right Sidebar -->

<script>
    
    // $('#createQModal').on('show.bs.modal', function(event) {
    //     console.log('test');
    //     let modal = $(this);
    //     let btn = $(event.relatedTarget);
        
    //     let Id = btn.data('id');
    //     switchOnChange = $('.switch input').attr('onchange').replace('id', Id);
    //     $('.switch input').attr('onchange', switchOnChange);

    //     saveOnClick = $('.save').attr('onclick').replace('id', Id);
    //     $('.save').attr('onclick', saveOnClick);
        
    //     let catId = btn.data('catid');
    //     fileOnChange = $('#file-input').attr('onChange').replace('cat_id', catId);
    //     $('#file-input').attr('onChange', fileOnChange);

    //     let catTitle = btn.data('cattitle');
    //     $("#category_title").val(catTitle);

    //     let catImage = btn.data('catimage');
    //     $("#modal_cat_img").attr('src', './photos/flashcard/'+catImage);

    //     let catStatus = btn.data('catstatus'); 
    //     if(catStatus == '1'){
    //         $('.switch input').attr('checked', true);    
    //     } else{
    //         $('.switch input').attr('checked', false);
    //     }
    // });

let categoryData;

const createQModal = (i,id) => {
    let html = `
        <div class="modal fade" id="createQModal" tabindex="-1" role="dialog" aria-labelledby="createQModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createQModalLabel">Update Flashcard</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="modal-body">
                        <form id="info-form" method="post">
                            <div class="form-group">
                                <label for="category_title">Category Name</label>
                                <input type="text" class="form-control" id="category_title" placeholder="John" value="${categoryData[i]['category_title']}" required>
                            </div>
                            <div class="form-group">
                                <label for="file-input">Category Image</label>
                                <img id="model_cat_img" style="height:100px;display:block" src="./photos/flashcard/${categoryData[i]['category_image']}">
                            
                                <input id="file-input" onChange="uploadFile(event,${id});displayLoader();" style="margin-top:10px;" type="file">
                            </div>
                            <div>
                                <label>Status</label>
                                <label class="switch">
                                    <input type="checkbox" id="status" ${categoryData[i]['status']=="1"?"checked":""}>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onClick="updateQInfo(${id}); displayLoader();" data-target="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        `;
    $("#modal-box-container").html("");
    $("#modal-box-container").html(html);
    let myModal = new bootstrap.Modal($('#createQModal'), {});
    myModal.show();
}

const updateQInfo = (id) => {
    let category_title = $("#category_title").val()
    let status = document.getElementById('status');

    if(status.checked) {
        status=1;
    }else{
        status=0;
    }
    
    function move_quiz()
    {
        $('#exampleModal').modal('hide')
        window.location.href="./index.php?page=flashcard-management"
    }

    $.ajax({
        method: 'POST',
        url: './domain/flashcard-management.php',
        data: { action: 'all', id:id, category_title,status},
        success: function(res) {
            if (res == "Changed") {
                success_toast("Successfully Updated Data");
                var tmpData = categoryData.map(function(value) {
                    if(value.category_id == id){
                        value.category_title=category_title;
                    }
                    return value;
                });
                categoryData = tmpData;
                $('#createQModal').modal('hide')
                location.reload();
                constructCategoryTable();
                

            } else {
                error_toast("Something went wrong!!");
            }
        },
        error: function(res) {
            console.log(res);
        },
    });
            

}

const uploadFile = (event,id) =>{
    let files = event.target.files;
    var formData = new FormData();
    formData.append("file", files[0]);
    formData.append("action", "image");
    formData.append("id", id);

    $.ajax({
        method: 'POST',
        url: './domain/flashcard-management.php',
        processData: false,
        contentType: false,
        mimeType: "multipart/form-data",
        data: formData,
        success: function(res) {
            if (res == "Uploaded") {
                success_toast("Successfully Uploaded File");

                $('#model_cat_img').attr("src",`./photos/flashcard/${files[0]['name']}`)

                var tmpData = categoryData.map(function(value) {
                    if(value.category_id == id){
                        value.category_image=files[0]['name'];
                    }
                    return value;
                });
                categoryData = tmpData;
                location.reload();
                constructCategoryTable()


            } else {
                error_toast("Something went wrong!!");
            }
            
        },
        error: function(res) {
            console.error(res)
        },
    });
}

const deleteCategory = (id) =>{
    $.ajax({
        method: 'POST',
        url: './domain/flashcard-management.php',
        data: { action: 'delete', id:id },
        success: function(res) {
            if (res == "Deleted") {
                success_toast("Successfully Deleted Data");
                location.reload();
                var tmpData = categoryData.filter(function(value) {
                    return value.category_id != id;
                });
                categoryData = tmpData;

                constructCategoryTable()


            } else {
                error_toast("Something went wrong!!");
            }
            
        },
        error: function(res) {
            console.error(res)
        },
    });
}

const changeCategory = (event,id) =>{
    let status = event.target.checked?1:0;
    $.ajax({
        method: 'POST',
        url: './domain/flashcard-management.php',
        data: { action: 'status', id:id, status},
        success: function(res) {
            if (res == "Changed") {

                var tmpData = categoryData.map(function(value) {
                    if(value.category_id == id){
                        value.status=value.status=="1"?"0":"1";
                    }
                    return value;
                });
                categoryData = tmpData;

                constructCategoryTable()


            } else {
                
            }
            
        },
        error: function(res) {
            console.error(res)
        },
    });
}

const getCategory = () => {
    $.ajax({
        method: 'POST',
        url: './domain/index.php?page=fetch-category',
        data: { action: 'flashcard-fetch' },
        success: function(res) {
            let response = JSON.parse(res)
            categoryData = response
            console.log(categoryData);
            // constructCategoryTable()
        },
        error: function(res) {
            console.error(res)
        },
    });
}

$(document).ready(() => {
    bulkAction('#flashcardCheckAll', '.flashcard_check', '#bulk_flashcard');
    getCategory();
})

// const fetchTimerData = (id) => {
//     let time_val = $("#time_val").val()
//     return $.ajax({
//       method: 'POST',
//       url: './domain/flashcard-management.php',
//       data: { action: 'GetTimer', id: id ,time_val},
//       dataType: 'json'
//     });
//   }
  
// //   // use arrow function to loop through each timer element and fetch its data
//   $('#timer').each((index, timerElement) => {
//     const categoryId = $(timerElement).data('id');
//     fetchTimerData(categoryId).done((data) => {
//       const timerData = { categoryId: categoryId, timeVal: data.time_val };
//       timers.push(timerData);
//       // set timers array to local storage after fetching data for all timers
//       if (timers.length === $('#timer').length) {
//         localStorage.setItem('timers', JSON.stringify(timers));
//       }
//     });
//   })

    
</script>
    

<?php  // include "include/footer.php"; ?>
<?php // include "include/theame-cutomizer.php"; ?>