<?php

require_once("include/header.php");
require_once('include/session.php');
require_once('include/connection.php');
require_once('include/functions.php');

$email_template_path = APPLICATION_PATH . '/assets_new/email_templates/';

$templates = scandir($email_template_path);
?>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<div class="wrapper">
    <div class="page-content">
        <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-info-square-fill"></em>
                <?php echo "Email Templates"; ?>
            </div>
        </div> -->

        <div class="main-title card p-2" >
                <h2 class="text-success"><em class="bi bi-file-earmark-richtext"></em> <?php echo "Email Templates";?></h2>
        </div>

        <div class="content card card-body">

            <!-- Start Content-->
            <div class="container-fluid">
                <form class="inline" action="email-template.php" method="post">
                    <label for="template">Select a template:</label>
                    <div class="row">
                        <div class="col-3">
                            <select class="form-control form-control-sm" name="template" id="template">
                                <option>Select Template</option>
                                <?php
                                foreach ($templates as $template) {
                                    if ($template !== '.' && $template !== '..' && stristr($template, '.html') !== false) {
                                        echo '<option value="' . $template . '">' . $template . '</option>';
                                    }
                                }
                                ?> 
                            </select>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">Edit Template</button>
                        </div>
                    </div>
                </form>

                <?php
                    if($_POST){
                        $selectedTemplate = purifier($_POST['template']);
                        $templateContent = file_get_contents($email_template_path. $selectedTemplate);
                        
                        echo '<form action="template_editor.php" method="post">';
                        echo '<textarea style="width:70%;" id="editor"  name="content">' . htmlspecialchars($templateContent) . '</textarea>';
                        echo '<input type="hidden" name="template" value="' . $selectedTemplate . '">';
                        echo '<button type="submit" class="btn btn-danger">Cancel</button>';
                        echo '<button type="submit" class="btn btn-primary">Save</button>';
                        echo '</form>';
                    }
                ?>                                

            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function(){
        ClassicEditor.create( document.querySelector( '#editor' ))
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    });
</script>