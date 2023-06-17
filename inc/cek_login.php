<?php 
require_once "session.php";
require_once "config.php";
$username = $_POST['username'];
$password = $_POST['password'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE (username = '$username' OR nim = '$username') AND password = '$password'");
$cek = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
if($cek > 0){
	if ($data['role']=='admin') {
		$_SESSION['username'] = $data['username'];
		$_SESSION['nim'] = $data['nim'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i><b style="text-transform: capitalize;"> Hallo '.$data['username'].'!</b> Role anda adalah <b style="text-transform: capitalize;">'.$data['role'].'.</b>
		</div>';
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Login Success</title>
			<style>
				@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

				*{
					font-family: 'Poppins', sans-serif;
				}
			</style>
		</head>
		<body>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		</body>
		<script>
			Swal.fire(
			'Login Berhasil!',
			'Selamat, Session anda sudah dimulai!',
			'success'
			).then((result) => {
				if (result.isConfirmed) {
					window.location = '../admin';
				}else{
					window.location = '../admin';
				}
			});
		</script>
		</html>
		<?php
	}else if ($data['role']=='bendahara') {
		$_SESSION['username'] = $data['username'];
		$_SESSION['nim'] = $data['nim'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i><b style="text-transform: capitalize;"> Hallo '.$data['username'].'!</b> Role anda adalah <b style="text-transform: capitalize;">'.$data['role'].'.</b>
		</div>';
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Login Success</title>
			<style>
				@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

				*{
					font-family: 'Poppins', sans-serif;
				}
			</style>
		</head>
		<body>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		</body>
		<script>
			Swal.fire(
			'Login Berhasil!',
			'Selamat, Session anda sudah dimulai!',
			'success'
			).then((result) => {
				if (result.isConfirmed) {
					window.location = '../bendahara';
				}else{
					window.location = '../bendahara';
				}
			});
		</script>
		</html>
		<?php
	}else{
		$_SESSION['username'] = $data['username'];
		$_SESSION['nim'] = $data['nim'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i><b style="text-transform: capitalize;"> Hallo '.$data['username'].'!</b> Role anda adalah <b style="text-transform: capitalize;">'.$data['role'].'.</b>
		</div>';
		?>
		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Login Success</title>
			<style>
				@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

				*{
					font-family: 'Poppins', sans-serif;
				}
			</style>
		</head>
		<body>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		</body>
		<script>
			Swal.fire(
			'Login Berhasil!',
			'Selamat, Session anda sudah dimulai!',
			'success'
			).then((result) => {
				if (result.isConfirmed) {
					window.location = '../user';
				}else{
					window.location = '../user';
				}
			});
		</script>
		</html>
		<?php
	}
}else{
	$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-ban"></i> Login Failed!
	</div>';
	?>
	<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>Login Failed</title>
			<style>
				@import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

				*{
					font-family: 'Poppins', sans-serif;
				}
			</style>
		</head>
		<body>
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		</body>
		<script>
			Swal.fire(
			'Login Gagal!',
			'Maaf, Password atau password yang anda masukan ssalah!',
			'error'
			).then((result) => {
				if (result.isConfirmed) {
					window.location = '../';
				}else{
					window.location = '../';
				}
			});
		</script>
		</html>
	<?php
}
?>