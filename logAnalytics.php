<?php
require_once("include/header.php");
include_once('./include/session.php');
include_once('./include/log.php');
require_once("./include/functions.php");
?>
<div class="wrapper">
    <div class="page-content">
        <!-- <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-bell"></em><?php echo _ViewallLog; ?></div>
        </div> -->
        <div class="main-title card p-2">
            <h3 class="text-success" style=""><em class="bi bi-card-text"></em> <?php echo _ViewallLog;?></h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <label for="show-entries" class="form-label"><?php echo _Show;  echo " ";  echo _Entries; ?></label>
                        <select id="show-entries" class="form-control form-control-sm" onchange="location = this.value;">
                            <?php
                            $options = pagination();
                            $selected = isset($_GET['per_page']) ? purifier($_GET['per_page']) : $options[0];
                            foreach ($options as $option) {
                                echo '<option value="?per_page=' . $option . '" ' . ($selected == $option ? 'selected' : '') . '>' . $option . '</option>';
                            }
                            ?>
                        </select>
                    </div>  
                    <!-- <div class="col-6">
                        <?php
                        // Pagination settings
                        $alllogs = allGetLog();
                        $logCount = count($alllogs);
                        $perPage = isset($_GET['per_page']) ? purifier($_GET['per_page']) : 100;
                        $currentPage = isset($_GET['page']) ? purifier($_GET['page']) : 1;
                        $offset = ($currentPage - 1) * $perPage;
                        $totalPages = ceil($logCount / $perPage);

                        // if ($totalPages > 1) {
                        //     echo '<nav class="float-end">
                        //     <ul class="pagination">';

                        //     // Prev button
                        //     if ($currentPage > 1) {
                        //         echo '<li class="page-item"><a class="page-link" href="?per_page=' . $perPage . '&page=' . ($currentPage - 1) . '">Prev</a></li>';
                        //     }

                        //     for ($i = 1; $i <= $totalPages; $i++) {
                        //         if ($i == $currentPage) {
                        //             echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                        //         } else {
                        //             echo '<li class="page-item"><a class="page-link" href="?per_page=' . $perPage . '&page=' . $i . '">' . $i . '</a></li>';
                        //         }
                        //     }

                        //     // Next button
                        //     if ($currentPage < $totalPages) {
                        //         echo '<li class="page-item"><a class="page-link" href="?per_page=' . $perPage . '&page=' . ($currentPage + 1) . '">Next</a></li>';
                        //     }

                        //     echo '</ul>
                        // </nav>';
                        // }
                        ?>
                    </div> -->
                </div>
                <table class="table mb-0 table-striped" aria-label="Semantic Elements">
                    <thead>
                        <tr>
                            <th scope="col"><?php echo _Id; ?></th>
                            <th scope="col"><?php echo _Name; ?></th>
                            <th scope="col"><?php echo _Description; ?></th>
                            <th scope="col"><?php echo _DateTime; ?></th>
                            <th scope="col"><?php echo _Filename; ?></th>
                            <th scope="col"><?php echo _Actions; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $alllogs = getalllogs();
                        // $logCount = count($alllogs);
                        //                 $perPage = 10;
                        $currentPage = isset($_GET['page']) ? purifier($_GET['page']) : 1;
                        $offset = ($currentPage - 1) * $perPage;
                        $paginatedlogs = array_slice($alllogs, $offset, $perPage);

                        foreach ($paginatedlogs as $key => $log) {
                            $title = $log['title'];
                            $description = $log['description'];
                            $id =  $log['id'];
                            $time =  date(config('date_time','date_format')." ".config('date_time','time_format'),strtotime($log["datetime"]));
                            $filename = $log['filename'];
                            $action =$log['action'];

                            ?>
                            <tr>
                                <th scope="row"><?php echo ($offset + $key + 1); ?></th>
                                <td><?php echo $title; ?></td>
                                <td><?php echo $description; ?></td>
                                <td><?php echo $time; ?></td>
                                <td><?php echo $filename; ?></td>
                                <td><?php echo $action; ?></td>
                            </tr>
                            <?php
            //                 echo '<tr>
            // <th scope="row">' . ($offset + $key + 1) . '</th>
            // <td>' . $title . '</td>
            // <td>' . $description . '</td>
            // <td>' . $time . '</td>
            // <td>' . $filename . '</td>
            // <td>' . $action . '</td>
            //  </tr>';
                        }
                        ?>
                        <div class="row">
                        <div class="col-6">
                            <p class="mb-0 mt-3"><?php echo _Showing; ?> <?php echo ($offset + 1) . '-' . ($offset + $perPage > $logCount ? $logCount : $offset + $perPage) ?> <?php echo _Of;?> <?php echo $logCount ?> <?php echo _Entries; ?></p>
                        </div>
                        <div class="col-6">
                            <?php
                            $totalPages = ceil($logCount / $perPage);
                            if ($totalPages > 1) {
                                echo '<nav class="float-end">
                                        <ul class="pagination">';
                                if ($currentPage > 1) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
                                }
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    if ($i == $currentPage) {
                                        echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                                    } else {
                                        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                                    }
                                }
                                if ($currentPage < $totalPages) {
                                    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                                }
                                echo '</ul>
                                </nav>';
                            }
                        ?>
                      
            </div>
        </div>
       
    </div>
</div>