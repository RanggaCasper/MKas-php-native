<?php 
if ($_POST) {
	require_once "../../inc/config.php";
	$id = $_POST['id_menu'];
	$menuId = $_POST['menu_id'];
	$title = $_POST['title'];
	$url = $_POST['url'];
	$icon = $_POST['icon'];
	$active = $_POST['active'];
	$dataUpdate = mysqli_query($conn, "UPDATE user_sub_menu SET menu_id='$menuId',title='$title',url='$url',icon='$icon',is_active='$active' WHERE id_menu = '$id'");

	if ($dataUpdate) {
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fas fa-ban"></i> Data berhasil diupdate.
		</div>';
		header("Location: ./");
	}else{
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Data gagal diupdate.
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