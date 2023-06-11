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
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i><b style="text-transform: capitalize;"> Hallo '.$data['username'].'!</b> Role anda adalah <b style="text-transform: capitalize;">'.$data['role'].'.</b>
		</div>';
		header("Location: ../admin/");
	}else if ($data['role']=='bendahara') {
		$_SESSION['username'] = $data['username'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i><b style="text-transform: capitalize;"> Hallo '.$data['username'].'!</b> Role anda adalah <b style="text-transform: capitalize;">'.$data['role'].'.</b>
		</div>';
		header("Location: ../bendahara/");
	}else{
		$_SESSION['username'] = $data['username'];
		$_SESSION['id_user'] = $data['id_user'];
		$_SESSION['role'] = $data['role'];
		$_SESSION['flash'] = '<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		<i class="fa-regular fa-circle-check"></i></i><b style="text-transform: capitalize;"> Hallo '.$data['username'].'!</b> Role anda adalah <b style="text-transform: capitalize;">'.$data['role'].'.</b>
		</div>';
		header("Location: ../user/");
	}
}else{
	$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<i class="icon fas fa-ban"></i> Login Failed!
	</div>';
	header("Location: ../");
}
?>