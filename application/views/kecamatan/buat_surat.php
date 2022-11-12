<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="card">
        <?php echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>'); ?>

      <div class="card-header pb-0">
        <h5><?php switch ($tipe) {
          case 'adk':
            if ($jenis == 'sp') {
              echo "Buat Surat Pengantar Kecamatan (ADK)";
              $action = 'surat_proses/sp/adk';
            }
            if ($jenis == 'sr') {
              echo "Buat Surat Rekomendasi Kecamatan (ADK)";
              $action = 'surat_proses/sr/adk';
              $pajak = TRUE;
            }
            if ($jenis == 'spv') {
              echo "Buat Surat Pernyataan Verifikasi Kecamatan (ADK)";
              $action = 'surat_proses/spv/adk';
              $pajak = TRUE;
              $anggaran = TRUE;
            }
            break;
          case 'dds':
            if ($jenis == 'sp') {
              echo "Buat Surat Pengantar Kecamatan (DDS)";
              $action = 'surat_proses/sp/dds';
            }
            if ($jenis == 'sr') {
              echo "Buat Surat Rekomendasi Kecamatan (DDS)";
              $action = 'surat_proses/sr/dds';
            }
            if ($jenis == 'spv') {
              echo "Buat Surat Pernyataan Verifikasi Kecamatan (DDS)";
              $action = 'surat_proses/spv/dds';
              $output = TRUE;
            }
            break;


        } ?></h5>
      </div>
      <?php if ($tipe == 'adk') { ?>
        <div class="card-body">
          <form class="theme-form mega-form" id="myForm" method="POST" action="<?= base_url($action) ?>" enctype="multipart/form-data">
            <div class="mb-3 row">
              <div class="<?php if ($jenis != 'spv') {
                echo "col-sm-4";
              }else {
                echo "col-sm-6";
              } ?>">
                <label class="col-form-label">Gampong</label>
                <select class="form-control" name="gampong">
                  <option value="" selected>-- Pilih Gampong --</option>
                  <?php foreach ($db as $q) {?>
                    <option value="<?= $q->idG ?>"><?= $q->namaG ?></option>
                  <?php } ?>
                </select>
              </div>
              <?php if ($jenis != 'spv') { ?>
                <div class="col-sm-4 ">
                  <label class="col-form-label">Nomor Surat</label>
                  <div class="input-group">
                    <input class="form-control" type="number" name="nomor" maxlength="3" value="<?= set_value('nomor') ?>">
                  </div>
                </div>
              <?php } ?>
              <div class="<?php if ($jenis != 'spv') {
                echo "col-sm-4";
              }else {
                echo "col-sm-6";
              } ?>">
                <label class="col-form-label">Tahun Anggaran</label>
                <input class="form-control" type="text" id="" name="tahun" value="<?= date('Y') ?>" readonly>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-6">
                <label class="col-form-label">Tahapan ADK</label>
                <select class="form-control" name="tahapan_adk">
                  <option value="">-- Pilih Tahapan --</option>
                  <option value="1">I</option>
                  <option value="2">II</option>
                  <option value="3">III</option>
                  <option value="4">IV</option>
                  <option value="5">V</option>
                </select>
              </div>
              <div class="col-sm-6 ">
                <label class="col-form-label">Pesentase *<code>(dalam persen)</code></label>
                <div class="input-group">
                  <input class="form-control" type="number" name="persen_adk" maxlength="3"  value="<?= set_value('persen_adk') ?>">
                  <span class="input-group-text btn btn-white" >%</span>
                </div>
              </div>
            </div>
            <?php if (isset($pajak) && $pajak == TRUE) { ?>
              <div class="mb-3 row">
              <div class="col-sm-6">
                <label class="col-form-label">Pajak dan Restribusi Daerah</label>
                <select class="form-control" name="tahapan_pajak">
                  <option value="">-- Pilih Tahapan --</option>
                  <option value="1">I</option>
                  <option value="2">II</option>
                  <option value="3">III</option>
                  <option value="4">IV</option>
                  <option value="5">V</option>
                </select>
              </div>
              <div class="col-sm-6 ">
                <label class="col-form-label">Pesentase Pajak *<code>(dalam persen)</code></label>
                <div class="input-group">
                  <input class="form-control" type="number" name="persentase_pajak" maxlength="3" value="<?= set_value('persentase_pajak') ?>">
                  <span class="input-group-text btn btn-white" >%</span>
                </div>
              </div>
            </div>
            <?php } ?>
            <?php if (isset($anggaran) && $anggaran == TRUE) {?>
              <div class="mb-3 row">
                <div class="col-sm-6 ">
                  <label class="col-form-label">Nilai Anggaran </label>
                  <div class="input-group">
                    <span class="input-group-text btn btn-white" >Rp.</span>
                    <input class="form-control" type="number" name="anggaran" value="<?= set_value('anggaran') ?>">
                  </div>
                </div>
                <div class="col-sm-6 ">
                  <label class="col-form-label">Nilai Pajak Anggaran </label>
                  <div class="input-group">
                    <span class="input-group-text btn btn-white" >Rp.</span>
                    <input class="form-control" type="number" name="nilai_pajak_anggaran" value="<?= set_value('nilai_pajak_anggaran') ?>">
                  </div>
                </div>
              </div>
            <?php } ?>
            <div class="mb-3">
              <button class="btn btn-primary" type="submit">Simpan</button>
              <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
          </form>
        </div>
      <?php }elseif ($tipe == 'dds') {?>
        <div class="card-body">
          <form class="theme-form mega-form" id="myForm" method="POST" action="<?= base_url($action) ?>" enctype="multipart/form-data">
            <div class="mb-3 row">
              <div class="<?php if ($jenis != 'spv') {
                echo "col-sm-4";
              }else {
                echo "col-sm-6";
              } ?>">
                <label class="col-form-label">Gampong</label>
                <select class="form-control" name="gampong">
                  <option value="" selected>-- Pilih Gampong --</option>
                  <?php foreach ($db as $q) {?>
                    <option value="<?= $q->idG ?>"><?= $q->namaG ?></option>
                  <?php } ?>
                </select>
              </div>
              <?php if ($jenis != 'spv') { ?>
                <div class="col-sm-4 ">
                  <label class="col-form-label">Nomor Surat</label>
                  <div class="input-group">
                    <input class="form-control" type="number" name="nomor" maxlength="3" value="<?= set_value('nomor') ?>">
                  </div>
                </div>
              <?php } ?>
              <div class="<?php if ($jenis != 'spv') { echo "col-sm-4"; }else { echo "col-sm-6"; } ?>">
                <label class="col-form-label">Tahun Anggaran</label>
                <input class="form-control" type="text" id="" name="tahun" value="<?= date('Y') ?>" readonly>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-6">
                <label class="col-form-label">Tahapan DDS</label>
                <select class="form-control" name="tahapan_dds">
                  <option value="">-- Pilih Tahapan --</option>
                  <option value="1">I</option>
                  <option value="2">II</option>
                  <option value="3">III</option>
                  <option value="4">IV</option>
                  <option value="5">V</option>
                </select>
              </div>
              <div class="col-sm-6 ">
                <label class="col-form-label">Pesentase *<code>(dalam persen)</code></label>
                <div class="input-group">
                  <input class="form-control" type="number" name="persentase_dds" maxlength="3" value="<?= set_value('persentase_dds') ?>">
                  <span class="input-group-text btn btn-white" >%</span>
                </div>
              </div>
            </div>
            <?php if (isset($output) && $output == TRUE) { ?>
              <div class="mb-3 row">
                <div class="col-sm-6 ">
                  <label class="col-form-label">Penyerapan Paling Sedikit Sebelumnya *<code>(dalam persen)</code></label>
                  <div class="input-group">
                    <input class="form-control" type="number" name="ddsPenyerapanRk" maxlength="3" value="<?= set_value('ddsPenyerapanRk') ?>">
                    <span class="input-group-text btn btn-white" >%</span>
                  </div>
                </div>
              <div class="col-sm-6 ">
                <label class="col-form-label">Capaian Output Sebelumnya *<code>(dalam persen)</code></label>
                <div class="input-group">
                  <input class="form-control" type="number" name="outputDdsRk" maxlength="3" value="<?= set_value('outputDdsRk') ?>">
                  <span class="input-group-text btn btn-white" >%</span>
                </div>
              </div>
            </div>
            <?php } ?>
            <div class="mb-3">
              <button class="btn btn-primary" type="submit">Simpan</button>
              <button class="btn btn-secondary" type="reset">Reset</button>
            </div>
          </form>
        </div>
      <?php } ?>

      </div>
    </div>
  </div>
</div>
