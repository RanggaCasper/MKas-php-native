<?php 
if ($_GET) {
	require_once '../../inc/config.php';
	$id = $_GET['id'];
	$data = mysqli_query($conn, "UPDATE history_pembayaran SET status='Success' WHERE id_kas = $id");
	$queryPembayaran = mysqli_query($conn, "SELECT * FROM history_pembayaran WHERE id_kas = $id");
	$dataPembayaran = mysqli_fetch_array($queryPembayaran);
	$jumlah_pembayaran = $dataPembayaran['jumlah_pembayaran'];
	if ($data) {
		session_start();
		$queryKas = mysqli_query($conn,"SELECT * FROM uang_kas WHERE id_kas = '1'");
		$dataKas = mysqli_fetch_array($queryKas);
		$kas = $dataKas['kas_sekarang'] + $jumlah_pembayaran;
		mysqli_query($conn,"UPDATE uang_kas SET kas_sekarang='$kas' WHERE id_kas = '1'");
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Pembayaran berhasil dikonfirmasi.
		</div>';
		header("Location: ./");
	}else{
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Pembayaran gagal dikonfirmasi.
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