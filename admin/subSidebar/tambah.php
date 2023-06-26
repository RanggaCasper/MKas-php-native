<?php 
if ($_POST) {
	require_once "../../inc/config.php";
	$menuId = $_POST['menu_id'];
	$title = $_POST['title'];
	$url = $_POST['url'];
	$icon = $_POST['icon'];
	$active = $_POST['active'];
	$dataTambah = mysqli_query($conn, "INSERT INTO user_sub_menu (menu_id, title, url, icon, is_active) VALUES ('$menuId','$title','$url','$icon','$active')");

	if ($dataTambah) {
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fas fa-ban"></i> Data berhasil ditambahkan.
		</div>';
		header("Location: ./");
	}else{
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Data gagal ditambahkan.
		</div>';
		header("Location: ./");
	}
}else{
	session_start();
	$_SESSION['flash'] = '<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-ban"></i> Tidak ada method <b>POST</b>.
	</div>';
	header("Location: ./");
}
?>