<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Menu Sidebar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo thisSite(); ?>">Admin</a></li>
            <li class="breadcrumb-item active">Menu Sidebar</li>
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
  	  	  <button class="btn btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa-solid fa-list-check"></i> Tambah Menu</button>
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
		            <h3 class="card-title">Data Menu</h3>
		          </div>
		          <!-- /.card-header -->
		          <div class="card-body">
		            <table id="example1" class="table table-striped">
		              <thead>
		              <tr>
		                <th>ID</th>
		                <th>Menu</th>
		                <th>Action</th>
		              </tr>
		              </thead>
		              <tbody>
		              	<?php 
		              	$queryViewMenu = mysqli_query($conn, "SELECT * FROM user_menu");
		              	while ($dataViewMenu = mysqli_fetch_array($queryViewMenu)) {
		              	?>
		              	<tr>
		              		<td><?php echo $dataViewMenu['id_menu']; ?></td>
		              		<td><?php echo $dataViewMenu['menu']; ?></td>
		              		<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-<?php echo $dataViewMenu['id_menu']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
		              			<a href="hapus.php?id=<?php echo $dataViewMenu['id_menu']; ?>" id="hapus" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
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
	      <h4 class="modal-title">Tambah Menu</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <form action="tambah.php" method="POST">
	          <div class="form-group">
	            <label for="exampleInputPassword1">Nama Menu</label>
	            <input name="menu" type="text" class="form-control" id="exampleInputPassword1" required>
	          </div>
	          <div class="form-group">
	          	<label>Akses Role</label>
		          <select name="access" class="custom-select form-control-border" id="exampleSelectBorder">
					<option value="admin">Admin</option>
					<option value="bendahara">Bendahara</option>
					<option value="user">User</option>
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
$queryModalMenu = mysqli_query($conn, "SELECT * FROM user_menu");
while ($dataModalMenu = mysqli_fetch_array($queryModalMenu)) {
?>
<div class="modal fade" id="modal-<?php echo $dataModalMenu['id_menu']; ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Update Menu</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <form action="update.php" method="POST">
	      		<div class="form-group">
	            <label for="exampleInputEmail1">ID Menu</label>
	            <input name="id_menu" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $dataModalMenu['id_menu']; ?>" readonly>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputEmail1">Menu</label>
	            <input name="menu" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $dataModalMenu['menu']; ?>" required>
	          </div>
	          <div class="form-group">
	          	<label>Akses Role</label>
		          <select name="access" class="custom-select form-control-border" id="exampleSelectBorder">
					<option value="admin">Admin</option>
					<option value="bendahara">Bendahara</option>
					<option value="user">User</option>
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