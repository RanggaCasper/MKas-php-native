<?php
$title = "MKas - Dashboard Bendahara";
require_once "../inc/config.php";
require_once "../inc/session.php";
isBendahara();
require_once "../view/head.php";
require_once "../view/navbar.php";
require_once "../view/sidebar.php"; 
require_once "dashboard.php";
require_once "../view/footer.php"; 
?>