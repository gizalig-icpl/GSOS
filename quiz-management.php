<?php
     
    require_once("include/header.php");
    include_once('./include/session.php');
    include_once('include/connection.php');

    $processFile = 'quiz-process.php';
?>

        <div class="wrapper">
            <div class="page-content">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <!--new breadcrumb-->
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <div class="fs-5"><em class="bi bi-file-earmark-bar-graph"></em><?php echo" "; echo _Quiz;?></div>
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
                                <h2 class="mb-0 text-success"><?php echo _Quiz_Management; ?></h2>
                                <!--<form class="ms-auto position-relative">
                                    <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                                    <input class="form-control ps-5" type="text" placeholder="search">
                                </form>-->
                                <div class="ms-auto position-relative">
                                    <div class="dropdown d-inline d-none" id="bulk_quiz">
                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo "Bulk Action"; ?>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li onClick="statusUpdate('enable', 'quiz_ids', '<?php echo $processFile;?>')"><a class="dropdown-item" href="#"><?php echo "Enable"; ?></a></li>
                                            <li onClick="statusUpdate('disable', 'quiz_ids', '<?php echo $processFile;?>')"><a class="dropdown-item" href="#"><?php echo "Disable"; ?></a></li>
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
                                                <input type="checkbox" class="checkbox" id="quizCheckAll">
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
                                            $sql = "SELECT * FROM category_master WHERE deleted = 0 order by category_id desc";
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute();
                                            
                                            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            for($i=0;$i<count($result);$i++){
                                        ?>
                                        <tr>
                                            <td scope="row">
                                                <input type="checkbox" value="<?php echo $result[$i]["category_id"]; ?>" name="quiz_ids" class="checkbox quiz_check">        
                                            </td>
                                            <td><?php echo $i+1 ?></td>
                                            <td><?php echo $result[$i]['category_title']; ?></td>
                                            <td><img style="height:100px;" src="<?php echo "photos/quiz/".$result[$i]['category_image'] ?>"></td>
                                            <td><?php echo $result[$i]['status'] == 0 ? "Inactive" : "Active"; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" onclick="createQModal(<?php echo $i; ?>,<?php echo $result[$i]['category_id'] ?>)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update Quiz">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </button>
                                                <button data-test-id="delete" type="button" class="btn btn-sm btn-outline-danger" onclick="deleteCategory(<?php echo $result[$i]['category_id'] ?>,'<?php echo $result[$i]['category_title'] ?>'); displayLoader();" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete">
                                                <i class="bi bi-trash-fill"></i>
                                                </button>
                                                <a href="index.php?page=question-management&id=<?php echo $result[$i]['category_id'] ?>" class="btn btn-sm btn-outline-primary" title="Update Quiz Question">
                                                    <i class="bi bi-gear-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </div>
                            </div>
                        </div>
                        
                        <div id="modal-box-container"> </div>
                        
                        </div>
                        <!-- end container-fluid -->

                    </div>
                    <!-- end content -->

                    <?php //  include("include/copyright-footer.php"); ?>

                </div>

            </div>
            <!-- END wrapper -->
        </div>
        <!-- Right Sidebar -->
    

        <?php // include "include/footer.php"; ?>
        <?php // include "include/theame-cutomizer.php"; ?>
        

        <script>
            let quizData
            const createQModal = (i,id) => {
                console.log(quizData);
                let html = `
                        <div class="modal fade" id="createQModal" tabindex="-1" role="dialog" aria-labelledby="createQModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createQModalLabel">Update Quiz</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="info-form">
                                            <div class="form-group">
                                                <label for="category_title">Category Name</label>
                                                <input type="text" class="form-control" id="category_title" placeholder="John" value="${quizData[i]['category_title']}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="file-input">Category Image</label>
                                                <img id="model_cat_img" style="height:100px;display:block" src="./photos/quiz/${quizData[i]['category_image']}">
                                            
                                                <input id="file-input" onChange="uploadFile(event,${id});displayLoader();" style="margin-top:10px;" type="file">
                                            </div>
                                            <div class="form-group">
                                                <label for="video_url">Video URL</label>
                                                <input type="text" class="form-control" id="video_url" placeholder="https://youtube.com" value="${quizData[i]['video_url']}" required>
                                            </div>
                                            <div>
                                                <label for="Time">Time</label>
                                                <input type="text" class="form-control" placeholder="time" id="time_val" value="${quizData[i]['time_val']}" required>
                                            </div>
                                            <div>
                                                <label for="min_score">Min Score</label>
                                                <input type="number" class="form-control" name="" placeholder="Min Score" id="min_score_val" value="${quizData[i]['min_score']}" required>
                                            </div>
                                            <div>
                                                <label>Status</label>
                                                <label class="switch">
                                                    <input type="checkbox" id="status" ${quizData[i]['status']=="1"?"checked":""}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onClick="updateQInfo(${id});" data-target="modal">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        `;

                        $("#modal-box-container").html('');
                        $("#modal-box-container").html(html);
                        let myModel = new bootstrap.Modal(document.getElementById('createQModal'), {});
                        myModel.show();
            }

            const updateQInfo = (id) => {
                let category_title = $("#category_title").val()
                let video_url = $("#video_url").val()
                let time_val = $("#time_val").val()
                let min_score_val=$('#min_score_val').val()
                let status = document.getElementById('status');
                
                if(status.checked) {
                    status=1;
                }else{
                    status=0;
                }
                
                localStorage.setItem('time_val',time_val);
                console.log(time_val);
                    // console.log(categoryData[i]['time_val']);
                //     category_id_local = {};
                //     category_id_local={
                //         category_id_key=[],
                //         timer_id_key =[]
                //     };
                    
                //    data.forEach()=> {
                    
                //    });
                function move_quiz()
                {
                    $('#createQModal').modal('hide')
                    location.reload();
                }

                $.ajax({
                    method: 'POST',
                    url: './domain/index.php?page=category-management',
                    data: { action: 'all', id:id, category_title,video_url,time_val,min_score_val,status },
                    success: function(res) {
                        if (res == "Changed") {
                            success_toast('Successfully Updated Data');
                            // $('#createQModal').modal('hide');
                            // console.log(categoryData[i]['time_val']);
                            // alert(categoryData[i]['time_val']);
                            // for (let i = 1; i <=categoryData.length; i++) {
                            //     console.log(categoryData[id]['time_val']);
                            //     timer.append(categoryData[i]['time_val']);
                            // }
                            // for (let i = 1; i <= categoryData.length; i++) {
                            //     localStorage.setItem(i,$timer[i]);
                            
                            // }
                            setTimeout(move_quiz, 500);
                            var tmpData = categoryData.map(function(value) {
                                if(value.category_id == id){
                                    value.category_title=category_title;
                                    value.video_url=video_url;
                                    value.time_val=time_val.val;
                                }
                                return value;
                            });
                            categoryData = tmpData;
                            constructCategoryTable();
                        

                        } else {
                            error_toast('Something went wrong!!');
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
                    url: './domain/index.php?page=category-management',
                    processData: false,
                    contentType: false,
                    mimeType: "multipart/form-data",
                    data: formData,
                    success: function(res) {
                        if (res == "Uploaded") {
                            Toastify({
                                text: `Successfully Uploaded File`,
                                duration: 3000,
                                close: true,
                                gravity: "bottom", // `top` or `bottom`
                                position: "left", // `left`, `center` or `right`
                                backgroundColor: "#5cb85c", // #5cb85c - For Success
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                            }).showToast();

                            $('#model_cat_img').attr("src",`./photos/quiz/${files[0]['name']}`)
                            location.reload();
                            var tmpData = categoryData.map(function(value) {
                                if(value.category_id == id){
                                    value.category_image=files[0]['name'];
                                }
                                return value;
                            });
                            categoryData = tmpData;
                            
                            constructCategoryTable()


                        } else {
                            Toastify({
                                text: `Something went wrong!!`,
                                duration: 3000,
                                close: true,
                                gravity: "bottom", // `top` or `bottom`
                                position: "left", // `left`, `center` or `right`
                                backgroundColor: "#d9534f", // #5cb85c - For Success
                                stopOnFocus: true, // Prevents dismissing of toast on hover
                            }).showToast();
                        }
                        
                    },
                    error: function(res) {
                        console.error(res)
                    },
                });
            }

            const deleteCategory = (id,category_title) =>{
                $.ajax({
                    method: 'POST',
                    url: './domain/index.php?page=category-management',
                    data: { action: 'delete', id:id , category_title:category_title},
                    success: function(res) {
                        if (res == "Deleted") {
                            success_toast('Successfully Deleted Data');

                            // var tmpData = categoryData.filter(function(value) {
                            //     return value.category_id != id;
                            // });
                            // categoryData = tmpData;
                            // constructCategoryTable();
                            window.location.reload();


                        } else {
                            error_toast('Something went wrong!!');
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
                    url: './domain/index.php?page=category-management',
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
                    data: { action: 'fetch' },
                    success: function(res) {
                        let response = JSON.parse(res)
                        quizData = response
                        console.log(quizData);
                    },
                    error: function(res) {
                        console.error(res)
                    },
                });
            }

            $(document).ready(() => {
                bulkAction('#quizCheckAll', '.quiz_check', '#bulk_quiz');
                getCategory()
            })

            const fetchTimerData = (id) => {
                let time_val = $("#time_val").val()
                return $.ajax({
                method: 'POST',
                url: './domain/index.php?page=category-management',
                data: { action: 'GetTimer', id: id ,time_val},
                dataType: 'json'
                });
            }
            
            //   // use arrow function to loop through each timer element and fetch its data
            $('#timer').each((index, timerElement) => {
                const categoryId = $(timerElement).data('id');
                fetchTimerData(categoryId).done((data) => {
                const timerData = { categoryId: categoryId, timeVal: data.time_val };
                timers.push(timerData);
                // set timers array to local storage after fetching data for all timers
                if (timers.length === $('#timer').length) {
                    localStorage.setItem('timers', JSON.stringify(timers));
                }
                });
            })
            
        </script>

