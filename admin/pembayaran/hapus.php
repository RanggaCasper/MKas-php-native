<?php
require_once "../../inc/config.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$delete = mysqli_query($conn, "DELETE FROM history_pembayaran WHERE id_kas=$id");

	if ($delete) {
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Data berhasil dihapus.
		</div>';
		header("Location: ./");
	}else{
		echo "Data gagal di inputkan";
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