<?php

require_once("include/header.php");
include_once('./include/session.php');
require_once('./include/notification.php');
?>
<div class="wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="fs-5"><em class="bi bi-bell"></em><?php echo " ";
                                                        echo _ViewAllNotification; ?></div>

        </div>
        <div class="main-title card p-2">
            <h2 class="text-success"><?php echo _ViewAllNotification ?></h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="show-entries" class="form-label"><?php echo _Show; echo " "; echo _Entries; ?></label>
                        <select id="show-entries" class="form-control form-control-sm" onchange="location = this.value;">
                            <?php
                            $options = array(10, 25, 50, 100);
                            $selected = isset($_GET['per_page']) ? (int)$_GET['per_page'] : $options[0];
                            foreach ($options as $option) {
                                echo '<option value="?page=viewAllNotification&per_page=' . $option . '" ' . ($selected == $option ? 'selected' : '') . '>' . $option . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <?php
                        // Pagination settings
                        $allNotifications = getAllNotifications();
                        $notificationCount = count($allNotifications);
                        $perPage = isset($_GET['per_page']) ? (int)$_GET['per_page'] : 10;
                        $currentPage = isset($_GET['pages']) ? (int)$_GET['pages'] : 1;
                        $offset = ($currentPage - 1) * $perPage;
                        $totalPages = ceil($notificationCount / $perPage);

                        if ($totalPages > 1) {
                            echo '<nav class="float-end">
                            <ul class="pagination">';

                            // Prev button
                            if ($currentPage > 1) {
                                echo '<li class="page-item"><a class="page-link" href="?page=viewAllNotification&per_page=' . xss_safe($perPage) . '&pages=' . xss_safe($currentPage - 1) . '">Prev</a></li>';
                            }

                            for ($i = 1; $i <= $totalPages; $i++) {
                                if ($i == $currentPage) {
                                    echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="?page=viewAllNotification&per_page=' . xss_safe($perPage) . '&pages=' . $i . '">' . $i . '</a></li>';
                                }
                            }

                            // Next button
                            if ($currentPage < $totalPages) {
                                echo '<li class="page-item"><a class="page-link" href="?page=viewAllNotification&per_page=' . xss_safe($perPage) . '&pages=' . ($currentPage + 1) . '">Next</a></li>';
                            }

                            echo '</ul>
                        </nav>';
                        }
                        ?>
                    </div>
                </div>
                <table class="table mb-0 table-striped" aria-label="Semantic Elements">
                    <thead>
                        <tr>
                            <th scope="col"><?php echo _Id; ?></th>
                            <th scope="col"><?php echo _Name; ?></th>
                            <th scope="col"><?php echo _Description; ?></th>
                            <th scope="col"><?php echo _DATE; ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // $allNotifications = getAllNotifications();
                        // $notificationCount = count($allNotifications);
                        //                 $perPage = 10;
                        $currentPage = isset($_GET['pages']) ? (int)$_GET['pages'] : 1;
                        $offset = ($currentPage - 1) * $perPage;
                        $paginatedNotifications = array_slice($allNotifications, $offset, $perPage);

                        foreach ($paginatedNotifications as $key => $notification) {
                            $title = $notification['title'];
                            $description = $notification['description'];
                            $id =  $notification['id'];
                            $time =  $notification['notification_time'];


                            ?>
                            <tr>
                                <th scope="row"><?php echo filter($offset + $key + 1); ?></th>
                                <td><?php echo filter($title); ?></td>
                                <td><?php echo filter($description); ?></td>
                                <td><?php echo filter(date(config('date_time','date_format')." ".config('date_time','time_format'),strtotime($time))); ?></td>
                            </tr>
                            <?php
            //                 echo '<tr>
            // <th scope="row">' . ($offset + $key + 1) . '</th>
            // <td>' . $title . '</td>
            // <td>' . $description . '</td>
            // <td>' . $time . '</td>
            //  </tr>';
                        }

                        //                 $totalPages = ceil($notificationCount / $perPage);
                        //                 if ($totalPages > 1) {
                        //                     echo '<nav>
                        //     <ul class="pagination">';
                        //                     if ($currentPage > 1) {
                        //                         echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
                        //                     }
                        //                     for ($i = 1; $i <= $totalPages; $i++) {
                        //                         if ($i == $currentPage) {
                        //                             echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
                        //                         } else {
                        //                             echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        //                         }
                        //                     }
                        //                     if ($currentPage < $totalPages) {
                        //                         echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                        //                     }
                        //                     echo '</ul>
                        // </nav>';
                        //                 }

                        ?>
            </div>
        </div>
        <!-- <div class="card">
            <div class="card-body">
                <table class="table mb-0 table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Desc</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $allNotifications = getAllNotifications();
                            $notificationCount = count($allNotifications);
                            for ($i = 0; $i < $notificationCount; $i++) {
                                $title = $allNotifications[$i]['title'];
                                $description = $allNotifications[$i]['description'];
                                $id =  $allNotifications[$i]['id'];
                                $time =  $allNotifications[$i]['notification_time'];

                                echo '<th scope="row">' . ($i + 1) . '</th>
                                     <td>' . filter($title) . '</td>
                                     <td>' . filter($description) . '</td>
                                     <td>' . filter($time) . '</td>
                        </tr>';
                            }
                            ?>

                    </tbody>
                </table>
            </div>
        </div> -->
    </div>
</div>