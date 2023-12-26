<?php
require_once("include/header.php");
require_once('include/session.php');
?>
<div class="wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
            <div class="col">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0">
                                    <p class="mb-0"><span class="text-info"><em class="bi bi-discord"></em></span>
                                        <a target="_blank" rel="noreferrer" class="support-links text-info"
                                            href="https://www.infopercept.com/">
                                            <?php echo _Discord; ?>
                                        </a>
                                    </p>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0">
                                    <p class="mb-0"><span class="text-dark"><em class="bi bi-github"></em></span>
                                        <a target="_blank" rel="noreferrer" class="support-links text-dark"
                                            href="https://github.com/Infopercept">
                                            <?php echo _Github; ?>
                                        </a>
                                    </p>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="">
                                <h4 class="mb-0">
                                    <p class="mb-0">
                                        <span class="text-success">
                                            <em class="bi bi-question-circle-fill"></em>
                                        </span>
                                        <a target="_blank" rel="noreferrer" class="support-links text-success"
                                            href="./index.php?page=support-page">
                                            <?php echo _Support_Page; ?>
                                        </a>
                                    </p>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>