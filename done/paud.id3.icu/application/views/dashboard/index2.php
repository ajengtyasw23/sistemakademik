<style>
  table.lightgrey-weekends tbody td:nth-child(n+6) {
    background-color: #f3f3f3;
  }
</style>
<main id="main" class="main">

  <div class="pagetitle ">
    <h1>DASHBOARD SISWA</h1>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12">

      </div>
      <div class="col-4 col-md-4 col-sm-10 card p-2">
        <div id="demo-calendar-apppearance"></div>
      </div>
    </div>
  </section>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer mt-5 fixed-bottom bg-footer">
  <div class="copyright">
    &copy; Copyright <strong><span>SI PAUD</span></strong>. All Rights Reserved
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/chart.js/chart.umd.js"></script>
<script src="<?= base_url() ?>assets/vendor/echarts/echarts.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/quill/quill.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="<?= base_url() ?>assets/vendor/tinymce/tinymce.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/js/main.js"></script>

<!-- <script src="<?= base_url() ?>assets/vendor/datatables/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendor/datatables/jquery-3.5.1.js"></script>
     -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/calendar/dist/zabuto_calendar.min.js"></script>
<script>
  $(document).ready(function() {
    $('#tabelku').dataTable();
  });
</script>

<script>
  $(document).ready(function() {
    $("#demo-calendar-apppearance").zabuto_calendar({
      header_format: '[year] // [month]',
      week_starts: 'sunday',
      show_days: true,
      today_markup: '<span class="badge bg-primary">[day]</span>',
      navigation_markup: {
        prev: '<i class="bi bi-arrow-left-circle-fill"></i>',
        next: '<i class="bi bi-arrow-right-circle-fill"></i>'
      }
    });
  });
</script>
</body>

</html>