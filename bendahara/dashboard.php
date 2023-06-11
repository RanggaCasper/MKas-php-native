<div class="content-wrapper">
	<!-- Header -->
	<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Bendahara</li>
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
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>Rp. <?php
              $queryUangKas = mysqli_query($conn, "SELECT * FROM uang_kas WHERE id_kas = '1'");
              $dataUangKas = mysqli_fetch_array($queryUangKas);
              echo number_format($dataUangKas['kas_sekarang']);
              ?>
              </h3>

              <p>Kas Terkumpul</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-money-bill-wave"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>Rp. <?php
              echo number_format($dataUangKas['kas_terpakai']);
              ?>
              </h3>

              <p>Kas Terpakai</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-money-bill-trend-up"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php
              $queryUser = mysqli_query($conn, "SELECT * FROM user WHERE role='user'");
              echo mysqli_num_rows($queryUser);
              ?></h3>

              <p>Jumlah Anggota</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-user-group"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>65</h3>

              <p>Transfer Pending</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-credit-card"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Content -->
</div>