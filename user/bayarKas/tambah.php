<?php 
if ($_POST) {
	session_start();
	require_once "../../inc/config.php";
	$target_dir = "../../bukti_pembayaran/"; 
	$target_file = $target_dir . basename($_FILES["bukti"]["name"]); 
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$newName = uniqid().".".$imageFileType;
	$target_path = $target_dir . $newName;
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
			if ($_FILES["bukti"]["size"] > 625000) {
			  	session_start();
				$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<i class="icon fas fa-ban"></i> Maaf, Size gambar pembayaran tidak boleh lebih dari 5MB.
				</div>';
				header("Location: ./");
			}else{
				if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_path)) {
					$fileBukti = $newName;
					$nim = $_SESSION['nim'];
					$jumlah_pembayaran = $_POST['jumlah_pembayaran'];
					$data = mysqli_query($conn,"INSERT INTO history_pembayaran (nim, jumlah_pembayaran, jenis_pembayaran, status,bukti_pembayaran) VALUES ('$nim','$jumlah_pembayaran','Transfer','Pending','$fileBukti')");

					if ($data) {
						session_start();
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
					$_SESSION['flash'] = '<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<i class="icon fas fa-ban"></i> Maaf, Gambar gagal di Upload.
					</div>';
					header("Location: ./");
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
	header("Location: index.php");
}
?>