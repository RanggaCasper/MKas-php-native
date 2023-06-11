<?php 
if ($_POST) {
	require_once "../../inc/config.php";
	$nim = $_POST['nim'];
	$jumlah_pembayaran = $_POST['jumlah_pembayaran'];
	$data = mysqli_query($conn,"INSERT INTO history_pembayaran (nim, jumlah_pembayaran, jenis_pembayaran, status, bukti_pembayaran) VALUES ('$nim','$jumlah_pembayaran','Tunai','Success','langsung.jpg')");
	if ($data) {
		session_start();
		$queryKas = mysqli_query($conn,"SELECT * FROM uang_kas WHERE id_kas = '1'");
		$dataKas = mysqli_fetch_array($queryKas);
		$kas = $dataKas['kas_sekarang'] + $jumlah_pembayaran;
		mysqli_query($conn,"UPDATE uang_kas SET kas_sekarang='$kas' WHERE id_kas = '1'");
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Pembayaran berhasil ditambahkan.
		</div>';
		header("Location: ./");
	}else{
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fas fa-ban"></i> Maaf, Pembayaran gagal di Inputkan.
		</div>';
		header("Location: ./");
	}
}else{
	session_start();
	$_SESSION['flash'] = '<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-ban"></i> Tidak ada method <b>POST</b>.
	</div>';
	header("Location: index.php");
}
?>