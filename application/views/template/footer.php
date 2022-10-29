<?php if (!isset($err)) { ?>
  <footer class="footer footer-fix">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 footer-copyright">
          <p class="mb-0">Copyright 2022 © SiBatuah Apps.</p>
        </div>
        <div class="col-md-6">
          <p class="pull-right mb-0">Develop By <a href="https://www.linkedin.com/in/ziaulkamal/"><strong>Ziaul Kamal</strong></a> </p>
        </div>
      </div>
    </div>
  </footer>
  </div>
  </div>
<?php } ?>
<script src="<?= base_url('assets_sys/') ?>js/jquery-3.5.1.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/icons/feather-icon/feather.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/icons/feather-icon/feather-icon.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/sidebar-menu.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/config.js"></script>
<?php if (isset($opt) && $opt == 'table') { ?>
<script src="<?= base_url('assets_sys/') ?>js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/datatable/datatable-extension/custom.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/height-equal.js"></script>

<?php } ?>
<?php if (isset($opt) && $opt == 'form') { ?>
<script src="<?= base_url('assets_sys/') ?>js/form-wizard/form-wizard-three.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/form-wizard/jquery.backstretch.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/select2/select2.full.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/select2/select2-custom.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

<script type="text/javascript">

function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
<?php


switch ($this->uri->segment(1)) {
  case 'penduduk':
      ?>
      function luarSelect() {
        location.replace('<?= base_url('penduduk') ?>' + '/_tambah/' + 'luar');
      }

      function lokalSelect() {
        location.replace('<?= base_url('penduduk') ?>' + '/_tambah/' + 'lokal');
      }

      function pendudukBack() {
        location.replace('<?= base_url('penduduk') ?>' + '/_tambah');
      }
      <?php
    break;


  default:
    // code...
    break;
}
?>



</script>
<?php } ?>
<script type="text/javascript">
function exit() {
  location.replace('<?= base_url('log_out') ?>');
}
<?php
if ($this->uri->segment(1) == 'dana_desa') { ?>
  function adk() {
    location.replace('<?= base_url('dana_desa/adk') ?>');
  }

  function dds() {
    location.replace('<?= base_url('dana_desa/dds') ?>');
  }
<?php } ?>
</script>

<?php if ($this->uri->segment(1) == 'upload_dokumen') {?>
<script src="<?= base_url('assets_sys/') ?>js/dropzone/dropzone.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/dropzone/dropzone-script.js"></script>
<?php } ?>
<script src="<?= base_url('assets_sys/') ?>js/bootstrap/popper.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/tooltip-init.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/script.js"></script>
</body>
</html>
