<?php

if ($_POST) {
	require_once "../../inc/config.php";
	$id = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nim = $_POST['nim'];
	$role = $_POST['role'];
	$data = mysqli_query($conn, "UPDATE user SET username='$username',password ='$password',nim='$nim', role ='$role' WHERE id_user='$id'");

	if ($data) {
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Data berhasil diupdate.
		</div>';
		header("Location: index.php");
	}else{
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Data gagal diupdate.
		</div>';
		header("Location: index.php");
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