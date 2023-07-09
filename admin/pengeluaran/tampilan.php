<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengeluaran Kas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo thisSite(); ?>" style="text-transform: capitalize;"><?php echo $_SESSION['role']; ?></a></li>
            <li class="breadcrumb-item active">Pengeluaran Kas</li>
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
	      	<div class="col-12">
		        <div class="card">
		          <div class="card-header">
		            <h3 class="card-title">Data Pengeluaran</h3>
		          </div>
		          <!-- /.card-header -->
		          <div class="card-body">
		            <table id="example1" class="table table-striped">
		              <thead>
		              <tr>
		                <th>ID</th>
		                <th>Bendahara</th>
		                <th>Jumlah Pengeluaran</th>
		                <th>Deskripsi</th>
		                <th>Waktu Pengeluaran</th>
                        <th>Action</th>
		              </tr>
		              </thead>
		              <tbody>
		              	<?php
		              	$queryViewPengeluaran = mysqli_query($conn, "SELECT * FROM history_pengeluaran");
		              	while ($dataViewPengeluaran = mysqli_fetch_array($queryViewPengeluaran)) {
		              	?>
		              	<tr>
		              		<td><?php echo $dataViewPengeluaran['id_pengeluaran']; ?></td>
		              		<td><?php echo $dataViewPengeluaran['bendahara']; ?></td>
		              		<td>Rp. <?php echo number_format($dataViewPengeluaran['pengeluaran']); ?></td>
		              		<td><span class="badge bg-primary p-2" style="cursor: pointer;" data-toggle="modal" data-target="#modalDesc-<?php echo $dataViewPengeluaran['id_pengeluaran']; ?>">Detail</span></td>
		              		<td><?php echo $dataViewPengeluaran['time']; ?></td>
                      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUpdate-<?php echo $dataViewPengeluaran['id_pengeluaran']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
		              			<a href="hapus.php?id=<?php echo $dataViewPengeluaran['id_pengeluaran']; ?>" id="hapus" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
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

<?php 
$queryModalPengeluaran = mysqli_query($conn, "SELECT * FROM history_pengeluaran");
while ($dataModalDesc = mysqli_fetch_array($queryModalPengeluaran)) {
?>
<!-- Detail -->
<div class="modal fade" id="modalDesc-<?php echo $dataModalDesc['id_pengeluaran']; ?>">
	<div class="modal-dialog modal-dialog-scrollable">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Detail Deskripsi</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <span><?php echo $dataModalDesc['deskripsi']; ?></span>
	    </div>
	  </div>
	</div>
</div>
<!-- Pengeluaran -->
<div class="modal fade" id="modalUpdate-<?php echo $dataModalDesc['id_pengeluaran']; ?>">
	<div class="modal-dialog modal-dialog-scrollable">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Detail Deskripsi</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <div class="modal-body">
		      <form action="update.php" method="POST">
		          <div class="form-group">
		            <label for="exampleInputEmail1">ID</label>
		            <input type="number" name="id" value="<?php echo $dataModalDesc['id_pengeluaran']; ?>" class="form-control" readonly>
		          </div>
		          <div class="form-group">
		          	<label>Deskripsi</label>
		          	<textarea id="summernote-<?php echo $dataModalDesc['id_pengeluaran']; ?>" name="deskripsi"><?php echo $dataModalDesc['deskripsi']; ?>
	              </textarea>
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
</div>
<?php } ?>