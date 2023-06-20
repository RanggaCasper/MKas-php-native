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
        <div class="col-lg-3 col-md-6 col-sm-12">
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
            <a href="<?php echo thisSite(); ?>bendahara/bayarKas/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
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
            <a href="<?php echo thisSite(); ?>bendahara/pengeluaranKas/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
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
            <a href="<?php echo thisSite(); ?>bendahara/listAnggota/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?php
              $queryPending = mysqli_query($conn, "SELECT * FROM history_pembayaran WHERE status='Pending'");
              echo mysqli_num_rows($queryPending);
              ?></h3>

              <p>Transfer Pending</p>
            </div>
            <div class="icon">
              <i class="fa-solid fa-credit-card"></i>
            </div>
            <a href="<?php echo thisSite(); ?>bendahara/bayarKas/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <!-- Timelime example  -->
      <div class="card card-outline card-success">
        <div class="card-header">
          <h3 class="card-title">Timeline Pengeluaran Kas</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <!-- The time line -->
              <div class="timeline">
                <?php 
                $queryPengeluaran = mysqli_query($conn, "SELECT * FROM history_pengeluaran");
                while ($dataPengeluaran = mysqli_fetch_array($queryPengeluaran)) {
                  list($tanggal, $jam) = explode(" ", $dataPengeluaran['time']);
                ?>
                <!-- timeline time label -->
                <div class="time-label">
                  <span class="bg-red"><?php echo $tanggal; ?></span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                  <i class="fas fa-envelope bg-blue"></i>
                  <div class="timeline-item">
                    <span class="time"><i class="fas fa-clock"></i> <?php echo $jam; ?></span>
                    <h3 class="timeline-header" style="text-transform: capitalize;"><?php echo $dataPengeluaran['bendahara']; ?></h3>

                    <div class="timeline-body">
                      <?php echo $dataPengeluaran['deskripsi']; ?>
                    </div>
                    <div class="timeline-footer">
                      <a class="badge p-2 bg-primary" style="cursor: pointer;" data-toggle="modal" data-target="#modal-<?php echo $dataPengeluaran['id_pengeluaran']; ?>">Read more</a>
                      <span class="badge p-2 bg-danger">Kas Keluar - Rp. <?php echo $dataPengeluaran['pengeluaran']; ?></span>
                    </div>
                  </div>
                </div>
                <?php } ?>
                <!-- END timeline item -->
              </div>
            </div>
            <!-- /.col -->
          </div>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  <!-- End Content -->
</div>

<?php 
$queryModalTimeline = mysqli_query($conn, "SELECT * FROM history_pengeluaran");
while ($dataModalTimeline = mysqli_fetch_array($queryModalTimeline)) {
?>
<div class="modal fade" id="modal-<?php echo $dataModalTimeline['id_pengeluaran']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Pengeluaran - <?php echo $dataModalTimeline['time']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo $dataModalTimeline['deskripsi']; ?></p>
      </div>
    </div>
  </div>
</div>
<?php } ?>