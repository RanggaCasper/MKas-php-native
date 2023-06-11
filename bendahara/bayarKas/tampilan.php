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
  	  	<div class="col-12 mb-3">
  	  	  <button class="btn btn-success" data-toggle="modal" data-target="#modal-pembayaran"><i class="fa-solid fa-sack-dollar"></i> Tambah Pembayaran</button>
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
		            <h3 class="card-title">Data Pembayaran</h3>
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
		                <th>Bukti Pembayaran</th>
		              </tr>
		              </thead>
		              <tbody>
		              	<?php 
		              	$queryViewPembayaran = mysqli_query($conn, "SELECT * FROM history_pembayaran");
		              	while ($dataViewPembayaran = mysqli_fetch_array($queryViewPembayaran)) {
		              	?>
		              	<tr>
		              		<td><?php echo $dataViewPembayaran['id_kas']; ?></td>
		              		<td><?php echo $dataViewPembayaran['nim']; ?></td>
		              		<td>Rp. <?php echo number_format($dataViewPembayaran['jumlah_pembayaran']); ?></td>
		              		<td><?php echo $dataViewPembayaran['time']; ?></td>
		              		<td><span class="badge bg-primary p-2" style="padding: 4px;"><?php echo $dataViewPembayaran['jenis_pembayaran']; ?></span></td>
		              		<td><span class="badge bg-primary p-2" data-toggle="modal" data-target="#modal-<?php echo $dataViewPembayaran['id_kas']; ?>">Check Bukti Pembayaran</span></td>
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
	      <img src="https://casperproject.masuk.id/topup/a823d700ad5e76d968f703aa6a58d1e0.jpg" width="100%">
	    </div>
	  </div>
	</div>
</div>
<?php } ?>