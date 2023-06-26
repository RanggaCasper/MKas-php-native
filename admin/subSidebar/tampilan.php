<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">SubMenu Sidebar</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo thisSite(); ?>">Admin</a></li>
            <li class="breadcrumb-item active">SubMenu Sidebar</li>
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
  	  	  <button class="btn btn-success" data-toggle="modal" data-target="#modal-tambah"><i class="fa-solid fa-list-check"></i> Tambah SubMenu</button>
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
		            <h3 class="card-title">Data SubMenu</h3>
		          </div>
		          <!-- /.card-header -->
		          <div class="card-body">
		            <table id="example1" class="table table-striped">
		              <thead>
		              <tr>
		                <th>ID</th>
		                <th>Menu ID</th>
		                <th>Title</th>
		                <th>URL</th>
		                <th>Icon</th>
		                <th>Active</th>
		                <th>Action</th>
		              </tr>
		              </thead>
		              <tbody>
		              	<?php 
		              	$queryViewMenu = mysqli_query($conn, "SELECT * FROM user_sub_menu");
		              	while ($dataViewMenu = mysqli_fetch_array($queryViewMenu)) {
		              	?>
		              	<tr>
		              		<td><?php echo $dataViewMenu['id_menu']; ?></td>
		              		<td><?php echo $dataViewMenu['menu_id']; ?></td>
		              		<td><?php echo $dataViewMenu['title']; ?></td>
		              		<td><?php echo $dataViewMenu['url']; ?></td>
		              		<td><span class="badge bg-info p-2"><i class="<?php echo $dataViewMenu['icon']; ?>"></i></span> <?php echo $dataViewMenu['icon']; ?></td>
		              		<td><?php
		              		if ($dataViewMenu['is_active'] == 1) {
		              			?>
		              			<span class="badge bg-success p-2">Active</span>
		              			<?php
		              		} else {
		              			?>
		              			<span class="badge bg-danger p-2">Disabled</span>
		              			<?php
		              		}
		              		?>
		              		</td>
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
	      <h4 class="modal-title">Tambah SubMenu</h4>
	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        <span aria-hidden="true">&times;</span>
	      </button>
	    </div>
	    <div class="modal-body">
	      <form action="tambah.php" method="POST">
	      		<div class="form-group">
	      			<label>Menu ID</label>
	      			<select name="menu_id" class="custom-select form-control-border" id="exampleSelectBorder">
	      				<?php
	      				$queryMenu = mysqli_query($conn, "SELECT * FROM user_menu");
	      				while ($dataMenu = mysqli_fetch_array($queryMenu)) {
	      				?>
								<option value="<?php echo $dataMenu['id_menu']; ?>"><?php echo $dataMenu['id_menu']." - ".$dataMenu['menu']; ?></option>
								<?php } ?>
						  </select>
	      		</div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">Title</label>
	            <input name="title" type="text" class="form-control" id="exampleInputPassword1" required>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">URL</label>
	            <input name="url" type="text" class="form-control" id="exampleInputPassword1" required>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">Icon</label>
	            <input name="icon" type="text" class="form-control" id="exampleInputPassword1" required>
	          </div>
	          <div class="form-group">
	            <label>Active</label>
		          <select name="active" class="custom-select form-control-border" id="exampleSelectBorder">
								<option value="1">Active</option>
								<option value="0">Disabled</option>
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
$queryModalMenu = mysqli_query($conn, "SELECT * FROM user_sub_menu");
while ($dataModalMenu = mysqli_fetch_array($queryModalMenu)) {
?>
<div class="modal fade" id="modal-<?php echo $dataModalMenu['id_menu']; ?>">
	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	      <h4 class="modal-title">Update SubMenu</h4>
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
	      			<label>Menu ID</label>
	      			<select name="menu_id" class="custom-select form-control-border" id="exampleSelectBorder">
	      				<?php
	      				$queryMenu = mysqli_query($conn, "SELECT * FROM user_menu");
	      				while ($dataMenu = mysqli_fetch_array($queryMenu)) {
	      				?>
								<option value="<?php echo $dataMenu['id_menu']; ?>"><?php echo $dataMenu['id_menu']." - ".$dataMenu['menu']; ?></option>
								<?php } ?>
						  </select>
	      		</div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">Title</label>
	            <input name="title" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $dataModalMenu['title']; ?>" required>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">URL</label>
	            <input name="url" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $dataModalMenu['url']; ?>" required>
	          </div>
	          <div class="form-group">
	            <label for="exampleInputPassword1">Icon</label>
	            <input name="icon" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $dataModalMenu['icon']; ?>" required>
	          </div>
	          <div class="form-group">
	            <label>Active</label>
		          <select name="active" class="custom-select form-control-border" id="exampleSelectBorder">
								<option value="1">Active</option>
								<option value="0">Disabled</option>
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