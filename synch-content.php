<?php
require_once("include/header.php");
?>
<div class="wrapper">
    <div class="page-content">
        <div class="content">
            <div class="container-fluid">
                <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="fs-5"><em class="bi bi-envelope-fill"></em>Synch Security Awareness Content</div>
                </div> -->

                <div class="main-title card p-2">
                    <h2 class="text-success" style=""><em class="bi bi-arrow-repeat"></em> AWS S3 Credentials</h2>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <div class="p-4">
                            <div class="card-title d-flex align-items-center">
                                <h5 class="mb-0">
                                    <?php echo "S3 Credentials"; ?>
                                </h5>
                            </div>
                            <hr>
                            <div>
                                <form method="post" action="download-content.php" autocomplete="off">
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Access Key</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" name="access_key" required
                                                placeholder="Access Key">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Secret Access Key</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" name="secret_access_key" required
                                                placeholder="Secret Access Key">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label  class="col-sm-3 col-form-label">Bucket Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" name="bucket_name" required
                                                placeholder="Bucket Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label">Region</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" name="region" required
                                                placeholder="Region">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button name="submit" value="submit" type="submit" class="btn btn-primary px-5" onClick="displayLoader()">
                                                <?php echo _Submit; ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>