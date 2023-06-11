<?php
$title = "MKas - Dashboard Admin";
require_once "../inc/config.php";
require_once "../inc/session.php";
isAdmin();
require_once "../view/head.php";
require_once "../view/navbar.php";
require_once "../view/sidebar.php"; 
require_once "dashboard.php";
require_once "../view/footer.php"; 
?>