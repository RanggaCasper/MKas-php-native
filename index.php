<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MKas | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <?php 
    require_once 'inc/config.php';
    require_once 'inc/session.php';
    isLogin();
    showFlashdata();
  ?>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>M</b>Kas</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="inc/cek_login.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Username / NIM</label>
            <div class="input-group mb-3">
            <input type="text" name="username" class="form-control">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fa-solid fa-user"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
            <div class="input-group mb-3">
            <input type="password" name="password" class="form-control">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- Button submit -->
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        <!-- End button submit -->
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
