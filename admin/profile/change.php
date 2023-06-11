<div class="content-wrapper">
  <!-- Header -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Change Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          	<li class="breadcrumb-item"><a href="<?php echo thisSite(); ?>" style="text-transform: capitalize;"><?php echo $_SESSION['role']; ?></a></li>
          	<li class="breadcrumb-item"><a href="../profile">Profile</a></li>
            <li class="breadcrumb-item active">Change</li>
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

  <?php 
	$id_user = $_SESSION['id_user'];
	$queryProfile = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
	while ($dataProfile = mysqli_fetch_array($queryProfile)) {
  ?>
  <!-- Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
      	<div class="col-12">
	  	  <div class="card card-widget widget-user">
			  <div class="widget-user-header bg-gradient-success">
			    <h3 class="widget-user-username" style="text-transform: capitalize;"><?php echo $dataProfile['username']; ?></h3>
			    <h5 class="widget-user-desc" style="text-transform: capitalize;"><?php echo $dataProfile['nim']; ?></h5>
			  </div>
			 <div class="widget-user-image">
			  	<div class="img-circle-profile">
			  		<img src="<?php echo thisSite(); ?>profile/<?php echo $dataProfile['gambar']; ?>" alt="User Image">
			  	</div>
			  </div>
			  <div class="card-footer">
				<div class="col-12">
				<form action="update.php" method="POST" enctype="multipart/form-data">
				  		<div class="form-group">
								<label for="exampleInputFile">Ganti Gambar</label>
								<div class="input-group">
									<div class="custom-file">
										<input name="profile" type="file" class="custom-file-input" id="exampleInputFile">
										<label class="custom-file-label" for="exampleInputFile">Choose file</label>
									</div>	
								</div>
							</div>
		          <div class="form-group">
		            <label for="exampleInputEmail1">Username</label>
		            <input name="username" type="text" class="form-control" value="<?php echo $dataProfile['username']; ?>" id="exampleInputEmail1" required>
		          </div>
		          <div class="form-group">
		            <label for="exampleInputPassword1">Password</label>
		            <input name="password" type="text" class="form-control" value="<?php echo $dataProfile['password']; ?>" id="exampleInputPassword1" required>
		          </div>
		          <div class="form-group">
		            <label for="exampleInputPassword1">NIM</label>
		            <input name="nim" type="text" class="form-control" value="<?php echo $dataProfile['nim']; ?>" id="exampleInputPassword1" disabled>
		          </div>
		          <div class="form-group">
		          	<label>Role</label>
		          	<input name="role" type="text" class="form-control" style="text-transform: capitalize;" value="<?php echo $dataProfile['role']; ?>" id="exampleInputPassword1" disabled>
		          </div>
				  <button type="submit" class="btn btn-primary col-12">Submit</button>
				</form>
				</div>
		    </div>
	      </div>
      	</div>
      </div>
    </div>
  </section>
  <?php } ?>
  <!-- End Content -->
</div>