<?php
require_once("include/process_include.php");
require_once("include/header.php");

include_once('include/session.php');
include_once('include/connection.php');
include_once('include/functions.php');
require_once("./include/pagination.php"); 

$ac_token=isset($_GET['token'])?purifier($_GET['token']):"";
$id=isset($_GET['id'])?purifier($_GET['id']):"";
$page_no=isset($_GET['page'])?purifier($_GET["page"]):"";
$gallery=isset($_GET['gallery'])?purifier($_GET['gallery']):"";
if (isset($ac_token) && !empty($ac_token)) {
    $token = $ac_token;
}else {
    $token = "";
}

$gallery = strtolower(htmlspecialchars(trim($gallery)));

$limit = config("pagination","photos"); 
$offset = 0;

// Count of all records 
$query   = "SELECT COUNT(*) as rowNum FROM photo where isdeleted = '0' and collection_id = :id "; 
$stmt = $dbh->prepare($query);
$stmt->execute(array(":id" =>  $id));
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

global $dbh;
$sql = "SELECT * from photo where isdeleted = '0' and collection_id = :id ORDER BY photo_id DESC LIMIT $offset, $limit";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(":id" =>  $id));
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="wrapper">
    <div class="page-content">
        <div class="content">
            <div class="container-fluid">
                <!--new breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div data-test-id="security awareness" class="breadcrumb-title pe-3"><em class="bi bi-shield-lock-fill"></em><?php echo " ";
                                                                        echo " ";
                                                                        echo _Security;
                                                                        echo " ";
                                                                        echo _Awarness; ?>
                    </div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <!-- <li class="breadcrumb-item"><i class="bi bi-shield-lock-fill"></i>
                                </li> -->
                                <!-- <li class="breadcrumb-item active" ><?php echo " ";
                                                                        echo " ";
                                                                        echo _Security;
                                                                        echo " ";
                                                                        echo _Awarness; ?></li> -->
                                <li class="breadcrumb-item active"><a href="./index.php?page=resource-space"><?php echo _Featured_collections ?></a></li>                                        
                                <li class="breadcrumb-item active" aria-current="page"><?php echo  $gallery ?></li>
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
                                    <li class="breadcrumb-item active"><a href="./resource-space.php"><?php echo _Featured_collections ?></a></li>
                                    <li class="breadcrumb-item active"><a href=""><?php echo  $gallery ?></a></li>
                                </ol>
                            </div>
                            <h4 class="page-title"><?php echo _Gallery ?></h4>
                        </div>
                    </div>
                </div> -->
                <!-- end page title -->
                <div class="main-title card p-2">
                    <div class="">
                        <div class="d-flex align-items-center">
                            <h2 class="text-success"><?php echo  $gallery ?></h2>
                            <?php
                            if($_SESSION['role']!=0)
                            {
                                ?>
                                <div class="ms-auto position-relative">
                                    <form action="image-upload.php" method="post" enctype="multipart/form-data">
                                        <div><strong><?php echo _Upload_Collection_Here ?></strong></div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <div class="input-group">
                                                    <input type="file" name="image" id="image" class="form-control form-control-sm" placeholder="Upload photo" accept="image/jpeg">
                                                    <input type="hidden" name="hidden_token" value="<?php echo purifier($token); ?>">
                                                    <input type="hidden" name="galleryName" value="<?php echo purifier($gallery); ?>">
                                                    <input type="hidden" name="collection_id" value="<?php echo purifier($id); ?>">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="submit" onclick="return validate_data();"><?php echo _Upload ?></button>
                                                    </span>
                                                </div><!-- /input-group -->
                                            </div><!-- /.col-lg-6 -->
                                        </div><!-- /.row -->
                                    </form>
                                </div>
                                <?php
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <hr>
                <!--start main grid-->
                <?php
                $per_page_record = 8;  // Number of entries to show in a page.   
                // Look for a GET variable page if not found default is 1.        
                $page = 1;
                if (isset($page_no) && !empty($page_no)) {
                    $page  = $page_no;
                }

                // $start_from = ($page - 1) * $per_page_record;

                $rs_result = 'Gallery_Folder.$gallery."/".$photo';
                if (!$rs_result) {
                    printf("Error: %s\n not found");
                    exit();
                }
                ?>

                <div class="card ">
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

                    <div class="card-body " id="dataContainer">


                        <div class="product-grid">
                            <div class="row row-cols-1 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-5 g-3">
                                <?php if ($gallery == "videos") { ?>


                                <?php } ?>

                                <?php
                                if (!empty($result)) {
                                    foreach($result as $key => $row){
                                        //foreach($result as $x => $photo) {
                                ?>
                                    <div class="col-4">
                                        <div class="card border shadow-none mb-0">
                                            <div class="card-body text-center">

                                                <?php if ($gallery == "videos") { ?>

                                                    <a class="fancybox fancybox-media fancybox.iframe" href="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>" data-fancybox="gallery">
                                                        <video class="img-responsive" src="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>" height="" width="" style="width:100%;  object-fit:cover;  height:200px"></video>
                                                        <p style=""><?php echo  $row['title'] ?></p>
                                                        <title><?php echo  $gallery ?></title>
                                                    </a>
                                                <?php } elseif ($gallery == "PDF") { ?>
                                                    <a class="thumbnail" href="javascript:void(0)">
                                                        <img class="img-responsive" src="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>" alt="" height="" width="">
                                                        <p style=""><?php echo  $row['title'] ?></p>
                                                        <title><?php echo  $gallery ?></title>
                                                    </a>
                                                <?php } else { ?>
                                                    <a class="thumbnail" href="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>" data-fancybox="gallery" data-imgsrc="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>">
                                                        <img class="img-responsive img-fluid mb-3" src="<?php echo  Gallery_Folder . $gallery . "/" . Thumbnail_Folder . $row['thumb_image'] ?>" alt="" height="" width="" style="">
                                                        <p style=""><?php echo  $row['title'] ?></p>
                                                        <title><?php echo  $gallery ?></title>
                                                    </a>
                                                <?php } ?>
                                                    <!--<a class="preview" data-fancybox-trigger="gallery" href="javascript:;" data-imgsrc="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>">
                                                        <img class="img-responsive img-fluid mb-3" style="display:none" src="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>" alt="" width="20" height="23" >
                                                            <img class="img-fluid mb-3" src="./images/previewsvg.svg" style="" alt="" width="20" height="23">
                                                        </a>
                                                        <a class="downloadbtn" href="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>" download><img src="./images/download.svg" width="20" height="23" style="float: right;"></a>-->

                                                    <!--<img src="assets/images/products/01.png" class="img-fluid mb-3" alt=""/>
                                                    <h6 class="product-title">Men White Polo T-shirt</h6>-->
                                                    <!--<p class="product-price fs-5 mb-1"><span>$250.99</span></p>-->

                                                    <!-- <div class="rating mb-0">
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                        <i class="bi bi-star-fill text-warning"></i>
                                                    </div>-->

                                                    <!-- <small><a class="preview" data-fancybox-trigger="gallery" href="javascript:;" data-imgsrc="<?php echo  Gallery_Folder . $gallery . "/" . $result[$i]['image'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Views"> -->
                                                    <!--<img class="img-responsive img-fluid mb-3" style="display:none" src="<?php echo  Gallery_Folder . $gallery . "/" . $result[$i]['image'] ?>" alt="" width="20" height="23" >-->
                                                    <!-- <img class="img-fluid mb-3" src="./images/previewsvg.svg" style="" alt="" width="20" height="23">
                                                        </a></small> -->

                                                <div class="actions d-flex align-items-center justify-content-center gap-1">
                                                    <!--<a class="downloadbtn" href="<?php echo  Gallery_Folder . $gallery . "/" .$row['image'] ?>" ><img src="./images/download.svg" width="20" height="23" style="float: right;"></a>-->
                                                    <a class="btn btn-sm btn-outline-primary downloadbtn d-flex align-items-center gap-1" href="<?php echo  Gallery_Folder . $gallery . "/" . $row['image'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download" download><em class="lni lni-download"></em> Download</a>
                                                    <?php
                                                    if($_SESSION['role']!=0)
                                                    {
                                                        ?>
                                                        <a href="javascript:;" class="btn btn-sm btn-outline-danger  d-flex align-items-center gap-1" data-galleryname="<?php echo  $gallery ?>" data-photoname="<?php echo  $row['image'] ?>" data-photoid="<?php echo  $row['photo_id'] ?>" onClick="deleteFunc(event)" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete"><em class="bi bi-trash-fill"></em> Delete</a>
                                                        <?php
                                                    }
                                                    ?>
                                                    

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php

                                    }
                                } else {
                                    echo '<div class="col-sm-3"><p class="alert alert-info">No Collection Found</p></div>';
                                }
                                ?>
                                <?php if ($gallery == "PDF") { ?>





                                    <!--end row-->
                            </div>
                        </div>



                    <?php } ?>
                    <?php if ($gallery == "videos") { ?>
                    </div>
                </div>
            </div>

        <?php } ?>
        <!-- end main grid-->
        </div><?php echo $pagination->createLinks(); ?>
        <!--<nav class="float-end mt-4" aria-label="Page navigation">
                                            <ul class="pagination">
                                                <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                            </ul>
                                            </nav>-->
        

        <br>
        <div id="imagemodal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="" id="imagepreview" class="img-responsive" alt="invinsense">
                    </div>
                </div>
            </div>
        </div>
    </div>
                    </div>
                    </div>
                    <!-- <?php echo $pagination->createLinks(); ?> -->
    <!-- Footer Start >
<footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2021 - 2022 &copy; by <a href="">Invinsense</a>
                        </div>
                    </div>
                </div>
            </footer>
            <-- end Footer -->

    
    
    <script>
        function columnSorting(page_num){
    page_num = page_num?page_num:0;
    
    $.ajax({
        type: 'POST',
        url: 'domain/index.php?page=photos-process',
        data:'page='+page_num+'&id=<?php echo $id;?>&action=list&gallery=<?php echo $gallery;?>',
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

function validate_data() {
    var file = document.getElementById("image");
    if (file.files.length == 0) {
        alert('Please Select Image File');
        return false;
    }
}

</script>