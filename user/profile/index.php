<?php
$title = "MKas - Profile User";
require_once "../../inc/config.php";
require_once "../../inc/session.php";
isUser();
require_once "../../view/head.php";
require_once "../../view/navbar.php";
require_once "../../view/sidebar.php";
if (isset($_GET['change'])) {
	require_once "change.php";
}else{
	require_once "../../view/profile.php";
}
require_once "../../view/footer.php"; 
?>