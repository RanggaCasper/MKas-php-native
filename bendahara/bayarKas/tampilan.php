<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pembayaran Kas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo thisSite(); ?>" style="text-transform: capitalize;"><?php echo $_SESSION['role']; ?></a></li>
            <li class="breadcrumb-item active">Pembayaran Kas</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
  	<div class="container-fluid">
  	  <div class="row">
  	  	<div class="col-12">
  	  	 <?php showFlashdata(); ?>
  	  	</div>
	  	</div>
  	</div>
  </section>

  <!-- Content -->
  <section class="content">
  	<div class="container-fluid">
  	  <div class="row">
  	  	<div class="col-sm-12 col-lg-8 mb-3">
  	  	  <button class="btn btn-success" data-toggle="modal" data-target="#modal-pembayaran"><i class="fa-solid fa-sack-dollar"></i> Tambah Pembayaran</button>
  	  	</div>
  	  	<div class="col-sm-12 col-lg-4 mb-3">
  	  		<form method="POST">
	  	  		<div class="d-flex">
	  	  			<div class="input-group-prepend">
		            <span class="input-group-text"><i class="far fa-clock"></i></span>
		          </div>
		          <input type="text" name="daterange" class="form-control float-right" id="reservationtime">	
		          <button type="submit" class="btn btn-primary">Filter</button>
		          <a href="" class="btn btn-danger">Reset</a>
	  	  		</div>
	  	  	</form>
  	  	</div>
	  	</div>
  	</div>
  </section>

  <section class="content">
    <div class="container-fluid">
      	<div class="row">
	      	<div class="col-12">
		        <div class="card">
		          <div class="card-header">
		            <h3 class="card-title">Data Pembayaran <?php if ($_POST) {
		            	echo "- ".$_POST['daterange'];
		            } ?></h3>
		          </div>
		          <!-- /.card-header -->
		          <div class="card-body">
		            <table id="example1" class="table table-striped">
		              <thead>
		              <tr>
		                <th>ID</th>
		                <th>NIM</th>
		                <th>Jumlah Pembayaran</th>
		                <th>Time</th>
		                <th>Jenis Pembayaran</th>
		                <th>Status Pembayaran</th>
		                <th>Bukti Pembayaran</th>
		                <th>Action</th>
		              </tr>
		              </thead>
		              <tbody>
		              	<?php
		              	if ($_POST) {
		              		$dateRange = $_POST['daterange'];
											$date_parts = explode(" - ", $dateRange);
											$start_date = date("Y-m-d H:i:s", strtotime($date_parts[0]));
											$end_date = date("Y-m-d H:i:s", strtotime($date_parts[1]));
		              		$queryViewPembayaran = mysqli_query($conn, "SELECT * FROM history_pembayaran WHERE time >= '$start_date' AND time <= '$end_date'");
		              	}else{
		              		$queryViewPembayaran = mysqli_query($conn, "SELECT * FROM history_pembayaran");
		              	}
		              	while ($dataViewPembayaran = mysqli_fetch_array($queryViewPembayaran)) {
		              	?>
		              	<tr>
		              		<td><?php echo $dataViewPembayaran['id_kas']; ?></td>
		              		<td><?php echo $dataViewPembayaran['nim']; ?></td>
		              		<td>Rp. <?php echo number_format($dataViewPembayaran['jumlah_pembayaran']); ?></td>
		              		<td><?php echo $dataViewPembayaran['time']; ?></td>
		              		<td><?php
		              				if ($dataViewPembayaran['jenis_pembayaran']=='Transfer') {
		              					?>
		              					<span class="badge bg-primary p-2" style="padding: 4px;"><?php echo $dataViewPembayaran['jenis_pembayaran']; ?></span>
		              					<?php
		              				}else{
		              					?>
		              					<span class="badge bg-success p-2" style="padding: 4px;"><?php echo $dataViewPembayaran['jenis_pembayaran']; ?></span>
		              					<?php
		              				}
		              		?></td>
		              		<td><?php
		              				if ($dataViewPembayaran['status']=='Success') {
		              					?>
		              					<span class="badge bg-success p-2" style="padding: 4px;"><?php echo $dataViewPembayaran['status']; ?></span>
		              					<?php
		              				}else if ($dataViewPembayaran['status']=='Cancled') {
		              					?>
		              					<span class="badge bg-danger p-2" style="padding: 4px;"><?php echo $dataViewPembayaran['status']; ?></span>
		              					<?php
		              				}else{
		              					?>
		              					<span class="badge bg-warning p-2" style="padding: 4px;"><?php echo $dataViewPembayaran['status']; ?></span>
		              					<?php
		              				}
		              		?></td>
		              		<td><span class="badge bg-primary p-2" style="cursor: pointer;" data-toggle="modal" data-target="#modal-<?php echo $dataViewPembayaran['id_kas']; ?>">Check Bukti Pembayaran</span></td>
		              		<td>
		              			<?php 
		              			if ($dataViewPembayaran['status']=='Pending') {
		              				?>
		              				<a href="konfirmasi.php?id=<?php echo $dataViewPembayaran['id_kas']; ?>" id="konfirmasi" class="badge bg-primary p-2" style="padding: 4px;">Konfirmasi</a>
		              				<a href="batalkan.php?id=<?php echo $dataViewPembayaran['id_kas']; ?>" id="batalkan" class="badge bg-danger p-2" style="padding: 4px;">Tolak</a>
		              				<?php
		              			}
		              			?>
		              		</td>
		              	</tr>
		              	<?php } ?>
		              </tbody>
		            </table>
		          </div>
		          <!-- /.card-body -->
		        </div>
	        </div>
      	</div>
    </div>
  </section>
  <!-- End Content -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-pembayaran">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Form Pembayaran</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <form action="tambah.php" method="POST">
	          <div class="form-group">
	            <label for="exampleInputEmail1">NIM</label>
	            <select name="nim" class="custom-select form-control-border" id="exampleSelectBorder">
	            	<?php 
	            	$queryNim = mysqli_query($conn,"SELECT * FROM user WHERE role = 'user'");
	            	while ($dataNim = mysqli_fetch_array($queryNim)) {
	            	?>
						<option value="<?php echo $dataNim['nim']; ?>"><?php echo $dataNim['nim'] ." - ". $dataNim['username']; ?></option>
						<?php } ?>
					</select>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">Jumlah Pembayaran</label>
	            <input name="jumlah_pembayaran" type="text" class="form-control" id="exampleInputPassword1" required>
	          </div>
	          <div class="d-flex justify-content-between">
			    		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    		<button type="submit" class="btn btn-primary">Submit</button>
			  		</div>
		  	</form>
	    </div>
	  </div>
	</div>
</div>
<!-- End Modal Tambah -->

<?php 
$queryModalBukri = mysqli_query($conn, "SELECT * FROM history_pembayaran");
while ($dataModalBukti = mysqli_fetch_array($queryModalBukri)) {
?>
<div class="modal fade" id="modal-<?php echo $dataModalBukti['id_kas']; ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Bukti Pembayaran</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <img src="../../bukti_pembayaran/<?php echo $dataModalBukti['bukti_pembayaran']; ?>" width="100%">
	    </div>
	  </div>
	</div>
</div>
<?php } ?>