<?php 
if ($_POST) {
	require_once "../../inc/config.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nim = $_POST['nim'];
	$role = $_POST['role'];
	$data = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
	$cek = mysqli_num_rows($data);

	if ($cek > 0) {
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="icon fas fa-ban"></i> Maaf, Username <b>'.$username.'</b> sudah terdaftar.
		</div>';
		header("Location: ./");
	}else{
		mysqli_query($conn, "INSERT INTO user (username, password, nim, role) VALUES ('$username','$password','$nim','$role')");
		session_start();
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i> Data berhasil ditambahkan.
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