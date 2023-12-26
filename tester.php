<?php
// In another PHP file
require_once 'keycloak/auth.php';
// session_start();

authorize();
if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    // User is authenticated
    // Your code here
    // echo "User is authenticated1";
    header("Location: kpi-dashboard.php");
    exit;
} else {
    // User is not authenticated
    // Redirect or handle accordingly
    echo "User is not authenticated1";
}
?>
