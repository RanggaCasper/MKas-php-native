<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Informasi Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo thisSite(); ?>">Admin</a></li>
            <li class="breadcrumb-item active">User</li>
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
  	  	  <button class="btn btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa-solid fa-user-plus"></i> Tambah Pengguna</button>
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
		            <h3 class="card-title">Data Pengguna</h3>
		          </div>
		          <!-- /.card-header -->
		          <div class="card-body">
		            <table id="example1" class="table table-striped">
		              <thead>
		              <tr>
		                <th>ID</th>
		                <th>Username</th>
		                <th>Password</th>
		                <th>NIM</th>
		                <th>Role</th>
		                <th>Action</th>
		              </tr>
		              </thead>
		              <tbody>
		              	<?php 
		              	$queryViewUser = mysqli_query($conn, "SELECT * FROM user WHERE role != 'admin'");
		              	while ($dataViewUser = mysqli_fetch_array($queryViewUser)) {
		              	?>
		              	<tr>
		              		<td><?php echo $dataViewUser['id_user']; ?></td>
		              		<td><?php echo $dataViewUser['username']; ?></td>
		              		<td><?php echo $dataViewUser['password']; ?></td>
		              		<td><?php echo $dataViewUser['nim']; ?></td>
		              		<td><?php echo $dataViewUser['role']; ?></td>
		              		<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-<?php echo $dataViewUser['id_user']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
		              			<a href="hapus.php?id=<?php echo $dataViewUser['id_user']; ?>" id="hapus" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
<div class="modal fade" id="modal-tambah">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Tambah Pengguna</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <form action="tambah.php" method="POST">
	          <div class="form-group">
	            <label for="exampleInputEmail1">Username</label>
	            <input name="username" type="text" class="form-control" id="exampleInputEmail1" required>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">Password</label>
	            <input name="password" type="text" class="form-control" id="exampleInputPassword1" required>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">NIM</label>
	            <input name="nim" type="text" class="form-control" id="exampleInputPassword1" required>
	          </div>
	          <div class="form-group">
	          	<label>Role</label>
	          	<select name="role" class="custom-select form-control-border" id="exampleSelectBorder">
					<option value="user">User</option>
					<option value="bendahara">Bendahara</option>
				</select>
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
$queryModalUser = mysqli_query($conn, "SELECT * FROM user WHERE role != 'admin'");
while ($dataModalUser = mysqli_fetch_array($queryModalUser)) {
?>
<div class="modal fade" id="modal-<?php echo $dataModalUser['id_user']; ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Update Pengguna</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <form action="update.php" method="POST">
	      		<div class="form-group">
	            <label for="exampleInputEmail1">ID User</label>
	            <input name="id_user" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $dataModalUser['id_user']; ?>" readonly>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputEmail1">Username</label>
	            <input name="username" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $dataModalUser['username']; ?>" required>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">Password</label>
	            <input name="password" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $dataModalUser['password']; ?>" required>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">NIM</label>
	            <input name="nim" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $dataModalUser['nim']; ?>" required>
	          </div>
	          <div class="form-group">
	          	<label>Role</label>
	          	<select name="role" class="custom-select form-control-border" id="exampleSelectBorder">
							<option value="user">User</option>
							<option value="bendahara">Bendahara</option>
						</select>
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
<?php } ?>