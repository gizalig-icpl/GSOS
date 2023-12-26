<?php
include_once('include/session.php');
include_once('include/connection.php');
// retrieve token
if (isset($_GET["token"])) {
    $token = $_GET["token"];
    $sql = "SELECT * FROM users WHERE token = :token and TIMESTAMPDIFF(SECOND, created, NOW()) <= 259200";
    // In this case we can use the account ID to get the account info.

    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":token" => $token
    ));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($result['id']) && $result['id'] != '') {
        $_SESSION['id'] = $result['id'];
        $_SESSION['role'] = $result['role'];
        $_SESSION['first_name'] = $result['first_name'];
        $_SESSION['temp'] = '1';
    } else {
        echo "Valid token not provided. Please contact to Admin.";
        exit;
    }
} else {
    $token = '';
}



require_once("include/header.php");
require_once("include/process_include.php");
include_once('include/functions.php');
require_once("./include/pagination.php"); 

$limit = config("pagination","resource_space"); 
$offset = 0;

// Count of all records 
$query   = "SELECT COUNT(*) as rowNum FROM collection where isdeleted = '0'"; 
$stmt = $dbh->prepare($query);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rowCount= $data[0]['rowNum']; 

// Initialize pagination class 
$pagConfig = array( 
    'totalRows' => $rowCount, 
    'perPage' => $limit, 
    'contentDiv' => 'dataContainer', 
    'link_func' => 'columnSorting' 
); 
$pagination =  new Pagination($pagConfig); 

// Fetch records based on the limit 
// $query = $dbh->query("SELECT * from collection where isdeleted = '0' ORDER BY collection_id DESC LIMIT $offset, $limit"); 

$galleryObj = new Gallery();
$result = $galleryObj->getAllGallery();

global $dbh;
$sql = "SELECT * from collection where isdeleted = '0' ORDER BY collection_id DESC LIMIT $offset, $limit";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="wrapper">
    <div class="page-content">
        <div class="content">
            <div class="container-fluid">
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-2"><em class="bi bi-shield-lock-fill"></em><?php echo " ";
                                                        echo " ";
                                                        echo _Security;
                                                        echo " ";
                                                        echo _Awarness; ?></div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item">
                                </li> -->
                                <!-- <li class="breadcrumb-item active"><?php echo " ";
                                                                    echo " ";
                                                                    echo _Security;
                                                                    echo " ";
                                                                    echo _Awarness; ?></li> -->
                                <li class="breadcrumb-item" aria-current="page"><?php echo _Featured_collections ?></li>



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
                                    <li class="breadcrumb-item active"><?php echo _Cyber;
                                                                        echo " ";
                                                                        echo _Security;
                                                                        echo " ";
                                                                        echo _Awarness; ?></li>
                                    <li class="breadcrumb-item active"><a href=""><?php echo _Featured_collections ?></a></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo _Cyber;
                                                    echo " ";
                                                    echo _Security;
                                                    echo " ";
                                                    echo _Awarness; ?></h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title -->
                <div class="main-title card p-2">
                    <div class="d-flex align-items-center">
                        <h2 class="mb-0 text-success" style=""><?php echo _Featured_collections ?></h2>
                        <?php
                        if($_SESSION['role']!=0)
                        {
                            ?>
                            <div class="ms-auto position-relative">
                                <a id="addGallerybtn" data-name="addform" data-bs-toggle="modal" data-bs-target="#myModaladd">
                                    <button class="btn bg-primary text-light" type="submit" id="addGallerybtn1" style=""><?php echo _Add ?></button>
                                </a>
                            </div>
                            <?php
                        }
                        ?>
                        

                    </div>
                </div>

                <!-- Modal -->
                <div id="myModaladd" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><?php echo _Add_Collection ?></h4>
                                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form action="addcollection.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12">


                                            <div class="form-group">
                                                <label for="title"><?php echo _Title ?></label>
                                                <input type="text" id="galleryName" name="galleryName" class="form-control form-control-sm" placeholder="<?php echo _Title ?>">
                                            </div>



                                            <div class="form-group">
                                                <input type="hidden" name="hidden_token" id="hidden_token" value="<?php echo filter($token); ?>">
                                                <label for="thumbnail"><?php echo _Thumbnail ?></label>
                                                <input type="file" name="image" class="form-control form-control-sm" placeholder="<?php echo _Upload;
                                                                                                                    echo _Thumbnail ?>" accept="image/jpeg">
                                            </div>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input theme-choice" id="status" name="status" value="1" checked="">

                                                <label class="custom-control-label" for="status"><?php echo _Status ?></label>

                                            </div>
                                            <br>
                                            <!--<span class="input-group-btn">-->
                                            <div class="form-group">
                                                <button class="btn btn-primary add-btn" type="submit" id="addGallerybtn1" style="align='center'" onclick="return validatedata();"><?php echo _Add ?></button>
                                            </div>
                                            <!--</span>-->
                                            <div id="loader"></div>

                                        </div><!-- /.col-lg-6 -->
                                    </div><!-- /.row -->
                                </form>
                            </div>
                        </div>

                    </div>
                </div>



                <?php
                $per_page_record = 8;  // Number of entries to show in a page.   
                // Look for a GET variable page if not found default is 1.        
                if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                } else {
                    $page = 1;
                }

                // $start_from = ($page - 1) * $per_page_record;

                $rs_result = 'Gallery_Folder.$photo';
                if (!$rs_result) {
                    printf("Error: %s\n not found");
                    exit();
                }
                ?>






                <!--<div id="galleriesList" >
-->
                <!--new gallery list-->

                <div class="card p-3" id="dataContainer">
                    <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-4 row-cols-xl-3 row-cols-xxl-5 g-3">
                        <!-- <div class="card-header py-3"> 
                                    <div class="row g-3 align-items-center">
                                        <div class="col-lg-3 col-md-6 me-auto">
                                        <div class="ms-auto position-relative">
                                            <div class="position-absolute top-50 translate-middle-y search-icon px-3"><i class="bi bi-search"></i></div>
                                            <input class="form-control ps-5" type="text" placeholder="search produts">
                                        </div>
                                        </div>
                                        <div class="col-lg-2 col-6 col-md-3">
                                        <select class="form-select form-select-sm">
                                            <option>All category</option>
                                            <option>Fashion</option>
                                            <option>Electronics</option>
                                            <option>Furniture</option>
                                            <option>Sports</option>
                                        </select>
                                        </div>
                                        <div class="col-lg-2 col-6 col-md-3">
                                        <select class="form-select form-select-sm">
                                            <option>Latest added</option>
                                            <option>Cheap first</option>
                                            <option>Most viewed</option>
                                        </select>
                                        </div>
                                    </div>
                                    </div>-->
                        <!-- <div class="card-body"> -->
                        <!-- <div class="product-grid">
                                        <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3"> -->

                        <?php
                        if (!empty($result)) {
                            foreach($result as $key => $row){
                                //foreach($result as $x => $photo) {
                                // $start = (($page - 1) * 8) - 1;
                                // if ($i == $page * 8) {
                                //     break;
                                // }
                                // if ($page > 1 && $i <= $start) {
                                //     continue;
                                // }
                                if ($row['thumbnail'] == '') {
                                    $thumbnail = "./images/imagedefult.png";
                                } else {
                                    $thumb_image = $row['thumbnail'];
                                    $thumbnail = "photos/$thumb_image";
                                }
                        ?>

                                <div>
                                    <div class="card border shadow-none mb-0">
                                        <div class="card-body text-center">
                                            <div class="product-grid">
                                                <?php if ($token == '') { ?>
                                                    <a class="thumbnail" href="<?= Photos_Page_Link ?>&gallery=<?= $row['title'] ?>&id=<?= $row['collection_id'] ?>">
                                                    <?php } else { ?>
                                                        <a class="thumbnail" href="<?= Photos_Page_Link ?>&gallery=<?= $row['title'] ?>&id=<?= $row['collection_id'] ?>&token=<?= $token ?>">
                                                        <?php } ?>

                                                        <img src="<?= $thumbnail ?>">
                                                        <!--<h6 class="product-title">Men White Polo T-shirt</h6>-->
                                                        <p class="product-price mb-1 pt-3 px-3"><?= $row['title'] ?></p>
                                                        <!--<div class="rating mb-0">
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                    </div>-->
                                                        <!-- <small>74 Reviews</small>-->
                                                        <?php
                                                        if($_SESSION['role']!=0)
                                                        {
                                                            ?>
                                                            <div class="actions d-flex align-items-center justify-content-center gap-2 pb-3 px-3">
                                                                <!--<a href="javascript:;" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-fill"></i> Edit</a>
                                                            <a href="javascript:;" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> Delete</a>-->
                                                                <a class="btn btn-outline-primary btn-sm" id="editGallerybtn" data-name="<?= $row['title'] ?>" data-bs-toggle="modal" data-bs-target="#myModal" onclick="filleditform('<?php echo $row['title']; ?>','<?= $row['collection_id'] ?>','<?= $row['status'] ?>','<?= $row['thumbnail'] ?>');">
                                                                    <em class="bi bi-pencil-fill"></em>
                                                                    <!--<img class="editbtn" src="./images/edit.svg" width="35" style="">-->
                                                                </a>
                                                                <a class="btn btn-outline-danger btn-sm" onClick="deleteCollection('<?= $row['collection_id'] ?>','<?= $row['title'] ?>','<?= $token ?>')" data-name="<?= $row['collection_id'] ?>" data-galleryname="<?= $row['collection_id'] ?>">
                                                                    <em class="bi bi-trash-fill"></em>
                                                                    <!-- <img class="delbtn" src="./images/delete.svg" width="35" style="">-->
                                                                </a>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        

                                                        </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- </div>
                                        </div> -->
                        <?php
                            }
                        } else {
                            echo '<div class="col-lg-3"><p class="alert alert-info">No Galleries Found</p></div>';
                        }
                        ?>


                        <!--end row-->
                    </div>
                    <?php echo $pagination->createLinks(); ?> 
                                    <!-- <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul> -->

                </div>

            </div>
        </div>

    </div>
</div>

<!--end new gallery list-->
</div> <!-- End row -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo _Edit_Collection ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <form action="editcollection.php" method="post" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <input type="hidden" name="edit_token" id="edit_token" value="<?php echo $token; ?>">
                            <input type="hidden" id="collection_id" name="collection_id" class="form-control form-control-sm">
                            <input type="hidden" id="oldGalleryName" name="oldGalleryName" class="form-control form-control-sm">

                            <div class="form-group">
                                <label for="title"><?php echo _Title ?></label>
                                <input type="text" id="editgalleryName" name="editgalleryName" class="form-control form-control-sm" placeholder="Title" value="df">
                            </div>

                            <div class="form-group
		<label for=" thumbnail"><?php echo _Thumbnail ?></label>
                                <input type="file" name="editimage" class="form-control form-control-sm" placeholder="Upload Thumbnail" accept="image/jpeg">
                                <img src="" id="imgthumbnail" name="imgthumbnail" width="75" height="75">
                            </div>

                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input theme-choice" id="editstatus" name="editstatus">

                                <label class="custom-control-label" for="editstatus"><?php echo _Status ?></label>

                            </div>
                            <br>
                            <!--<span class="input-group-btn">-->
                            <div class="form-group">
                                <button class="add-btn btn btn-primary" type="submit" id="editGallerybtn1" style="align='center'" onclick="return validatedata1();"><?php echo _Edit ?></button>
                            </div>
                            <!--</span>-->
                            <div id="loader"></div>

                        </div><!-- /.col-lg-6 -->
                    </form>
                </div><!-- /.row -->
            </div>
        </div>

    </div>
</div>

<!-- Footer Start -->
<?php
//  include("include/copyright-footer.php");
?>
<!-- end Footer -->

</div>
<script>
    function filleditform(title, id, status, img) {
        $('#oldGalleryName').val(title);
        $('#editgalleryName').val(title);
        $('#collection_id').val(id);
        if (status == '1') {
            $('#editstatus').prop('checked', true);
        }

        if (img != '') {
            $("#imgthumbnail").attr("src", "photos/" + img);
        } else {
            $("#imgthumbnail").attr("src", "images/imagedefult.png");
        }

    }
</script>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->

</div>
<!-- END wrapper -->
</div>
<!-- Right Sidebar -->

<br>
<!--<center>
    <nav class="float-end m-5" aria-label="Page navigation">

        <div class="pagination">
            <?php
            //$rs_result = 'Gallery_Folder.$gallery."/".$photo'; 
            $row = round(count($result) / 8);
            $total_records = count($result);
            echo "</br>";
            // Number of pages required.   
            $total_pages = ceil($total_records / $per_page_record);
            $pagLink = "";

            if ($page >= 2) {
                echo "<a class='page-link' href='resource-space.php?page=" . ($page - 1) . "'>  Prev </a>";
            }

            for ($i = 1; $i <= $total_pages; $i++) {
                if ($i == $page) {
                    $pagLink .= "<a class = 'active page-link' href='resource-space.php?page="
                        . $i . "'>" . $i . " </a>";
                } else {
                    $pagLink .= "<a  class='page-link' href='resource-space.php?page=" . $i . "'>   
                                                  " . $i . " </a>";
                }
            };
            echo $pagLink;

            if ($page < $total_pages) {
                echo "<a  class='page-link' href='resource-space.php?page=" . ($page + 1) . "'>  Next </a>";
            }

            ?>
        </div>
    </nav>
</center>-->
<br>

<?php
// include "include/footer.php";
?>
<?php
// 

?>
<script>
function columnSorting(page_num){
    page_num = page_num?page_num:0;
    
    $.ajax({
        type: 'POST',
        url: 'domain/index.php?page=resourcespace-process',
        data:'page='+page_num+'&action=list',
        beforeSend: function () {
            displayLoader();
        },
        success: function (html) {
            $('#dataContainer').html(html);
            
            // if(coltype != '' && colorder != ''){
            //     $( "th.sorting" ).each(function() {
            //         if($(this).attr('coltype') == coltype){
            //             $(this).attr("colorder", colorder);
            //             $(this).removeClass(classRemove);
            //             $(this).addClass(classAdd);
            //         }
            //     });
            // }
            
            hideLoader();
        }
    });
}

    function validatedata() {
        if ($('#galleryName').val() == '') {
            alert('Please Enter Collection Title');
            return false;
        }
    }

    function validatedata1() {
        if ($('#editgalleryName').val() == '') {
            alert('Please Enter Collection Title');
            return false;
        }
    }

    const deleteCollection = (id, title, token) => {
        let data_id = id
        let data_title = title
        let data_arr = {
            id: data_id,
            title: data_title
        }
        $.ajax({
            method: 'POST',
            url: 'deletecollection.php',
            data: data_arr,
            success: function(res) {
                if (res == "Deleted") {
                    success_toast("Successfully Deleted Data");
                    if (token == '') {
                        window.location = "index.php?page=resource-space";
                    } else {
                        window.location = "index.php?page=resource-space?token=" + token;
                    }


                } else {
                    error_toast("Something went wrong!!");
                }
            },
            error: function(res) {
                console.log(res);
            },
        });
    }
</script>
