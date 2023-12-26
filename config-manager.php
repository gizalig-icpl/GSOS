<?php

require_once("include/header.php");
include_once('./include/session.php');
?>
<div class="wrapper">
    <div class="page-content">

        <div class="main-title card p-2" >
            <h2 class="text-success"><em class="bi bi-tools"></em> <?php echo "Configuration";?></h2>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">


        <div class="row row-cols-12 row-cols-lg-12 row-cols-xl-12">
            <div class="col-12">
                <?php

                $configFile = 'config.ini';

                $configString = file_get_contents($configFile);
                $configBlocks = parse_ini_string($configString, true);

                // Group the config blocks by category
                $configByCategory = array();

                foreach ($configBlocks as $blockName => $blockSettings) {
                    // Extract the category from the block name (assuming the category is the first part of the block name before a separator character)
                    $separatorPos = strpos($blockName, '_');

                    if ($separatorPos !== false) {
                        $category = substr($blockName, 0, $separatorPos);
                    } else {
                        $category = $blockName;
                    }

                    // Add the block to the appropriate category
                    if (!isset($configByCategory[$category])) {
                        $configByCategory[$category] = array();
                    }

                    $configByCategory[$category][$blockName] = $blockSettings;
                }

                // Generate the HTML for the form
                $formHtml = '<form method="post" action="config-update.php">';
                // Generate the tabs for each category
                $formHtml .= '<ul class="nav nav-tabs">';
                foreach (array_keys($configByCategory) as $index => $category) {
                    $firstTab = (!isset($firstTab)) ? $category : $firstTab;
                    $isActive = ($index == 0) ? 'active' : '';
                    $formHtml .= "<li class='nav-item'><a class='nav-link {$isActive}' data-bs-toggle='tab' href='#{$category}'>{$category}</a></li>";
                }
                $formHtml .= '</ul>';

                // Generate the tabbed sections for each category
                $formHtml .= '<div class="tab-content card card-body d-md-block">';
                foreach ($configByCategory as $index => $blocks) {
                    $isActiveTab = ($firstTab == $index) ? 'show active' : '';
                    $formHtml .= "<div id='{$index}' class='tab-pane fade {$isActiveTab}'>";

                    foreach ($blocks as $blockName => $blockSettings) {
                        // Generate an input field for each setting in the block
                        $formHtml .= "<h3>{$blockName}</h3>";

                        foreach ($blockSettings as $key => $value) {
                            $formHtml .= "<div class='mb-3'>";
                            $formHtml .= "<label for='{$key}' class='form-label'>{$key}:</label>";
                            if($key=='date_format'||$key=='time_format'){
                                $formHtml .= date_formats($blockName,$key,$value);
                            }else{
                                $formHtml .= "<input type='text' data-test-id='{$blockName}[{$key}]' class='form-control' name='{$blockName}[{$key}]' value='{$value}'>";
                            }
                            $formHtml .= "</div>";
                        }
                    }

                    $formHtml .= '</div>';
                }

                $formHtml .= '<button data-test-id="save_changes" type="submit" class="btn btn-primary">Save Changes</button>';
                $formHtml .= '</div>';
                $formHtml .= '</form>';

                // Render the HTML form
                echo $formHtml;

                ?>

            </div>
        </div>

            </div></div></div>
    </div><!--end row-->
</div>
</div>

<?php
function date_formats($blockName,$key,$value){
    if($key=='date_format'){
        $date=array('d-F-Y','d-F-y','d-m-Y','d-m-y','d-M-Y','d-M-y','d-n-Y','d-n-y','j-F-Y','j-F-y','j-m-Y','j-m-y','j-M-Y','j-M-y','j-n-y','j-n-Y','d/F/Y','d/F/y','d/m/Y','d/m/y','d/M/Y','d/M/y','d/n/Y','d/n/y','j/F/Y','j/F/y','j/m/Y','j/m/y','j/M/Y','j/M/y','j/n/y','j/n/Y','Y-d-F','y-d-F','Y-d-m','y-d-m','Y-d-M','y-d-M','Y-d-n','y-d-n','Y-j-F','y-j-F','Y-j-m','y-j-m','Y-j-M','y-j-M','y-j-n','Y-j-n','Y/d/F','y/d/F','Y/d/m','y/d/m','Y/d/M','y/d/M','Y/d/n','y/d/n','Y/j/F','y/j/F','Y/j/m','y/j/m','Y/j/M','y/j/M','y/j/n','Y/j/n','F-Y-d','F-y-d','m-Y-d','m-y-d','M-Y-d','M-y-d','n-Y-d','n-y-d','F-Y-j','F-y-j','m-Y-j','m-y-j','M-Y-j','M-y-j','n-y-j','n-Y-j','F/Y/d','F/y/d','m/Y/d','m/y/d','M/Y/d','M/y/d','n/Y/d','n/y/d','F/Y/j','F/y/j','m/Y/j','m/y/j','M/Y/j','M/y/j','n/y/j','n/Y/j','F-d-Y','F-d-y','m-d-Y','m-d-y','M-d-Y','M-d-y','n-d-Y','n-d-y','F-j-Y','F-j-y','m-j-Y','m-j-y','M-j-Y','M-j-y','n-j-y','n-j-Y','F/d/Y','F/d/y','m/d/Y','m/d/y','M/d/Y','M/d/y','n/d/Y','n/d/y','F/j/Y','F/j/y','m/j/Y','m/j/y','M/j/Y','M/j/y','n/j/y','n/j/Y','Y-F-d','y-F-d','Y-m-d','y-m-d','Y-M-d','y-M-d','Y-n-d','y-n-d','Y-F-j','y-F-j','Y-m-j','y-m-j','Y-M-j','y-M-j','y-n-j','Y-n-j','Y/F/d','y/F/d','Y/m/d','y/m/d','Y/M/d','y/M/d','Y/n/d','y/n/d','Y/F/j','y/F/j','Y/m/j','y/m/j','Y/M/j','y/M/j','y/n/j','Y/n/j','d-Y-F','d-y-F','d-Y-m','d-y-m','d-Y-M','d-y-M','d-Y-n','d-y-n','j-Y-F','j-y-F','j-Y-m','j-y-m','j-Y-M','j-y-M','j-y-n','j-Y-n','d/Y/F','d/y/F','d/Y/m','d/y/m','d/Y/M','d/y/M','d/Y/n','d/y/n','j/Y/F','j/y/F','j/Y/m','j/y/m','j/Y/M','j/y/M','j/y/n','j/Y/n');
    }elseif($key=='time_format'){
        $date=array('g:i:s a','g:i:s A','h:i:s a','h:i:s A','G:i:s','H:i:s','s:g:i a','s:g:i A','s:h:i a','s:h:i A','s:G:i','s:H:i','i:s:g a','i:s:g A','i:s:h a','i:s:h A','i:s:G','i:s:H','g:i a','g:i A','h:i a','h:i A','G:i','H:i','i:g a','i:g A','i:h a','i:h A','i:G','i:H');
    }
    $html = "<select class='single-select form-select form-select-sm' name='{$blockName}[{$key}]' value='{$value}'>";
    foreach($date as $values){
        $show_date=date($values);
        $sd=" ( ".$show_date." )";
        if($values==$value){
            $html.="<option value='{$values}' selected>{$values}{$sd}</option>";
        }
        else{
            $html.="<option value='{$values}'>{$values}{$sd}</option>";
        }
    }
    $html.="</select>";
    return $html;
}
?>