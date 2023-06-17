<?php

if ($_POST) {
	session_start();
	require_once "../../inc/config.php";
	$target_dir = "../../profile/";
	$target_file = $target_dir . basename($_FILES["profile"]["name"]); 
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$newName = uniqid().".".$imageFileType;
	$target_path = $target_dir . $newName;
	if($_FILES["profile"]["name"]==NULL){
		$id = $_SESSION['id_user'];
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
				$data = mysqli_query($conn, "UPDATE user SET username='$username',password ='$password',gambar ='$fileGambar' WHERE id_user='$id'");
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
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			session_start();
			$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<i class="icon fas fa-ban"></i> Maaf, Hanya menerima file JPG, JPEG, PNG & GIF.
			</div>';
			header("Location: ./");
		}else{
			if (file_exists($target_path)) {
				session_start();
				$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="icon fas fa-ban"></i> Maaf, Sudah ada gambar yang sebelumnya anda Upload.
				</div>';
				header("Location: ./");
			}else{
				if ($_FILES["profile"]["size"] > 625000) {
				  	session_start();
					$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="icon fas fa-ban"></i> Maaf, Size gambar pembayaran tidak boleh lebih dari 5MB.
					</div>';
					header("Location: ./");
				}else{
					if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_path)) {
						$fileGambar = $newName;
						$id = $_SESSION['id_user'];
						$username = $_POST['username'];
						$password = $_POST['password'];
						$sessUsername = $_SESSION['username'];
						$queryCek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND username = '$sessUsername'");
						$queryCek2 = mysqli_query($conn, "SELECT * FROm user WHERE username = '$username' AND username != '$sessUsername'");
						$cek = mysqli_num_rows($queryCek);
						$cek2 = mysqli_num_rows($queryCek2);

						if ($cek == 1) {
							$data = mysqli_query($conn, "UPDATE user SET username='$username',password ='$password',gambar ='$fileGambar' WHERE id_user='$id'");
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
								$data = mysqli_query($conn, "UPDATE user SET username='$username',password ='$password',gambar ='$fileGambar' WHERE id_user='$id'");
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
						$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<i class="icon fas fa-ban"></i> Maaf, Gambar gagal di Upload.
						</div>';
						header("Location: ../profile");
					}
				}
			}
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