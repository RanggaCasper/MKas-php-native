<?php 
if ($_POST) {
	require_once "../../inc/config.php";
	$menu = $_POST['menu'];
	$access = $_POST['access'];
	$dataTambah = mysqli_query($conn, "INSERT INTO user_menu (menu) VALUES ('$menu')");

	if ($dataTambah) {
		$queryMenu =mysqli_query($conn, "SELECT * FROM user_menu WHERE menu='$menu'");
		$dataMenu = mysqli_fetch_array($queryMenu);
		$menuId = $dataMenu['id_menu'];
		mysqli_query($conn, "INSERT INTO user_access_menu (level, menu_id) VALUES ('$access','$menuId')");
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