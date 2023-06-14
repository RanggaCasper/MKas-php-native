<?php 
if ($_GET) {
	require_once '../../inc/config.php';
	$id = $_GET['id'];
	$data = mysqli_query($conn, "UPDATE history_pembayaran SET status='Cancled' WHERE id_kas = $id");
	if ($data) {
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Pembayaran berhasil dibatalkan.
		</div>';
		header("Location: ./");
	}else{
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Pembayaran gagal dibatalkan.
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