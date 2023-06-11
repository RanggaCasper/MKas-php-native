<?php

if ($_POST) {
	session_start();
	require_once "../../inc/config.php";
	$id = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sessUsername = $_SESSION['username'];
	$queryCek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND username = '$sessUsername'");
	$queryCek2 = mysqli_query($conn, "SELECT * FROm user WHERE username = '$username' AND username != '$sessUsername'");
	$cek = mysqli_num_rows($queryCek);
	$cek2 = mysqli_num_rows($queryCek2);

	if ($cek == 1) {
		$data = mysqli_query($conn, "UPDATE user SET username='$username',password ='$password' WHERE id_user='$id'");
		if ($data) {
			session_start();
			$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa-regular fa-circle-check"></i></i> Data berhasil diupdate.
			</div>';
			header("Location: ../profile");
		}else{
			session_start();
			$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa-regular fa-circle-check"></i></i> Data gagal diupdate.
			</div>';
			header("Location: ../profile");
		}
	}else{
		if($cek2 == 0){
			$data = mysqli_query($conn, "UPDATE user SET username='$username',password ='$password' WHERE id_user='$id'");
			if ($data) {
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa-regular fa-circle-check"></i></i> Data berhasil diupdate.
				</div>';
				header("Location: ../profile");
			}else{
				session_start();
				$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="fa-regular fa-circle-check"></i></i> Data gagal diupdate.
				</div>';
				header("Location: ../profile");
			}
		}else{
			session_start();
			$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="fa-regular fa-circle-check"></i></i> Username <b>'.$username.'</b> sudah ada.
			</div>';
			header("Location: ../profile");
		}
	}
}else{
	session_start();
	$_SESSION['flash'] = '<div class="alert alert-warning alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-ban"></i> Tidak ada method <b>POST</b>.
	</div>';
	header("Location: ../profile");
}

?>