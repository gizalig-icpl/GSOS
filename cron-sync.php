<?php

require_once("include/header.php");
include_once('./include/session.php');
require_once("./include/pagination.php"); 

// Set some useful configuration 
$limit = config("pagination","cron_manager"); 
$offset = 0;

// Count of all records 
$query   = "SELECT COUNT(*) as rowNum FROM cron_job"; 
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
$query = $dbh->query("SELECT * FROM cron_job ORDER BY created DESC LIMIT $offset, $limit"); 

foreach ($paginated_cron as $index => $cron_job) {
    echo $cron_job;
}

?>