<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">List Anggota</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo thisSite(); ?>" style="text-transform: capitalize;"><?php echo $_SESSION['role']; ?></a></li>
            <li class="breadcrumb-item active">List Anggota</li>
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

  <section class="content">
    <div class="container-fluid">
      	<div class="row">
	      	<div class="col-12">
		        <div class="card">
		          <div class="card-header">
		            <h3 class="card-title">List Anggota</h3>
		          </div>
		          <!-- /.card-header -->
		          <div class="card-body">
		            <table id="example1" class="table table-striped">
		              <thead>
		              <tr>
		                <th>ID</th>
		                <th>Username</th>
		                <th>NIM</th>
		                <th>Action</th>
		              </tr>
		              </thead>
		              <tbody>
		              	<?php
		              	$queryViewUser = mysqli_query($conn, "SELECT * FROM user WHERE role='user'");
		              	while ($dataViewUser = mysqli_fetch_array($queryViewUser)) {
		              	?>
		              	<tr>
		              		<td><?php echo $dataViewUser['id_user']; ?></td>
		              		<td><?php echo $dataViewUser['username']; ?></td>
		              		<td><?php echo $dataViewUser['nim']; ?></td>
		              		<td><span class="badge bg-primary p-2" style="cursor: pointer;" data-toggle="modal" data-target="#modal-<?php echo $dataViewUser['id_user']; ?>">Detail</span></td>
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
</div>

<?php 
$queryModalUser = mysqli_query($conn, "SELECT * FROM user WHERE role='user'");
while ($dataModalUser = mysqli_fetch_array($queryModalUser)) {
?>
<div class="modal fade" id="modal-<?php echo $dataModalUser['id_user']; ?>">
	<div class="modal-dialog modal-dialog-scrollable">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Detail - <span style="text-transform: capitalize;"><?php echo $dataModalUser['username']; ?></span></h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <form action="tambah.php" method="POST">
	      		<div class="row">
	      			<div class="col-3">
	      				<label class="d-flex justify-content-center">Photo</label>
			      		<div class="widget-user-image mb-3">
					  		<div class="img-rectangle-profile">
					  			<img src="<?php echo thisSite(); ?>profile/<?php echo $dataModalUser['gambar']; ?>" alt="User Image">
					  		</div>
					  	</div>	
	      			</div>
	      			<div class="col-9">
	      				<div class="form-group">
				            <label for="exampleInputEmail1">Username</label>
				            <input type="text" value="<?php echo $dataModalUser['username']; ?>" class="form-control" disabled>
				        </div>
				        <div class="form-group">
				            <label for="exampleInputEmail1">NIM</label>
				            <input type="text" value="<?php echo $dataModalUser['nim']; ?>" class="form-control" disabled>
				        </div>
				        <div class="form-group">
				            <label for="exampleInputEmail1">Role</label>
				            <input type="text" value="<?php echo $dataModalUser['role']; ?>" class="form-control" disabled>
				        </div>
	      			</div>
	      		</div>
		  	</form>
	    </div>
	  </div>
	</div>
</div>
<?php } ?>