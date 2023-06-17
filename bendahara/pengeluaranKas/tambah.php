<?php 
session_start();
if ($_POST) {
	require_once "../../inc/config.php";
	$username = $_SESSION['username'];
	$desc = $_POST['deskripsi'];
	$pengeluaran = $_POST['pengeluaran'];
	$queryKas = mysqli_query($conn,"SELECT * FROM uang_kas WHERE id_kas = '1'");
	$dataKas = mysqli_fetch_array($queryKas);
	$dataKas['kas_sekarang'];
	$dataKas['kas_terpakai'];
	$kas = $dataKas['kas_sekarang'] - $pengeluaran;
	$terpakai = $dataKas['kas_terpakai'] + $pengeluaran;
	if ($dataKas['kas_sekarang'] >= $pengeluaran) {
		$data = mysqli_query($conn,"INSERT INTO history_pengeluaran (bendahara, pengeluaran, deskripsi) VALUES ('$username','$pengeluaran','$desc')");
		if ($data) {
			mysqli_query($conn,"UPDATE uang_kas SET kas_sekarang='$kas', kas_terpakai='$terpakai' WHERE id_kas = '1'");
			$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa-regular fa-circle-check"></i></i> Pembayaran berhasil ditambahkan.
			</div>';
			header("Location: ./");
		}else{
			$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fas fa-ban"></i> Maaf, Pembayaran gagal di Inputkan.
			</div>';
			header("Location: ./");	
		}
	}else{
		$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fas fa-ban"></i> Maaf, Uang kas tidak cukup.
		</div>';
		header("Location: ./");
	}
}else{
	$_SESSION['flash'] = '<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-ban"></i> Tidak ada method <b>POST</b>.
	</div>';
	header("Location: index.php");
}
?>