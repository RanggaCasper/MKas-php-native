  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://mkas.casperproject.masuk.id">Mkas</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script src="<?php echo thisSite(); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo thisSite(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo thisSite(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo thisSite(); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo thisSite(); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo thisSite(); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo thisSite(); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo thisSite(); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo thisSite(); ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo thisSite(); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo thisSite(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo thisSite(); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo thisSite(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo thisSite(); ?>dist/js/adminlte.js"></script>
<script src="<?php echo thisSite(); ?>dist/js/pages/dashboard.js"></script>
<script src="<?php echo thisSite(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo thisSite(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo thisSite(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo thisSite(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo thisSite(); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo thisSite(); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
    });
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm'
      }
    });
    bsCustomFileInput.init();
  });
</script>
</body>
</html>