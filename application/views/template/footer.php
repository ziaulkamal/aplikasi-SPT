<?php if (!isset($err)) { ?>
  <footer class="footer footer-fix">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 footer-copyright">
          <p class="mb-0">Copyright 2022 © SiBatuah Apps.</p>
        </div>
        <div class="col-md-6">
          <p class="pull-right mb-0">Develop By Ziaul Kamal </p>
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
<script src="<?= base_url('assets_sys/') ?>/js/datatable/datatables/jquery.dataTables.min.js"></script>
<?php } ?>
<?php if (isset($opt) && $opt == 'form') { ?>
<script src="<?= base_url('assets_sys/') ?>js/select2/select2.full.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/select2/select2-custom.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/extra-select.js"></script>
<?php } ?>
<script src="<?= base_url('assets_sys/') ?>js/bootstrap/popper.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/tooltip-init.js"></script>
<script src="<?= base_url('assets_sys/') ?>js/script.js"></script>
</body>
</html>
