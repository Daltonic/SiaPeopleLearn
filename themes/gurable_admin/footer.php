</main>
  
  <!--   Core JS Files   -->
  <script type="text/javascript" src="<?=BURL?>assets/lga.js"></script>
  <script src="<?=BURL?>themes/gurable_admin/assets/js/core/popper.min.js"></script>
  <script src="<?=BURL?>themes/gurable_admin/assets/js/core/bootstrap.min.js"></script>
  <script src="<?=BURL?>assets/croppie.js"></script>
  <script src="<?=BURL?>themes/gurable_admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?=BURL?>themes/gurable_admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?=BURL?>themes/gurable_admin/assets/js/plugins/chartjs.min.js"></script>
  <script src="<?=BURL?>assets/bootstrap-notify/bootstrap-notify.min.js"></script>
  
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?=BURL?>themes/gurable_admin/assets/js/soft-ui-dashboard.js?v=1.0.3"></script>
  <script src="<?=BURL?>assets/ckeditor/ckeditor.js"></script>
<?php if(isset($use_cke)): ?>
  <script>
    CKEDITOR.replace( 'editor' );
  </script>
<?php endif;?>
  <?php $this->alert->get();?>
</body>

</html>