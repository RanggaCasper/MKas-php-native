<?php
$title = "MKas - Dashboard User";
require "../inc/config.php";
require "../inc/session.php";
isUser();
require "../view/head.php";
require "../view/navbar.php";
require "../view/sidebar.php";
require "dashboard.php";
require "../view/footer.php"; 
?>