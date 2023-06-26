<?php
require_once "../../inc/config.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$delete = mysqli_query($conn, "DELETE FROM user_menu WHERE id_menu = '$id'");

	if ($delete) {
		mysqli_query($conn, "DELETE FROM user_access_menu WHERE id_menu = '$id'");
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Data berhasil dihapus.
		</div>';
		header("Location: ./");
	}else{
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Data gagal dihapus.
		</div>';
		header("Location: ./");
	}
}else{
	session_start();
	$_SESSION['flash'] = '<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-ban"></i> Tidak ada method <b>GET</b>.
	</div>';
	header("Location: ./");
}

?>