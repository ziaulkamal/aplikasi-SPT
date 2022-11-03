<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5><?= $title . ' - (ADK)' ?></h5>
            <span>Upload File Dokumen</span>
          </div>
          <?= validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>'); ?>
            <div class="card-body">
              <form class="theme-form" method="POST" action="<?= base_url('prosesEdit_upload_dokumen/adk/').$db->idUd ?>" enctype="multipart/form-data">
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Tahapan ADK</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input class="form-control"  value="<?php switch ($db->adkTahapAdk) { case '1': echo "I"; break; case '2': echo "II"; break; case '3': echo "III"; break; case '4': echo "IV"; break; case '5': echo "V"; break; } ?> " readonly>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Persentase Penggunaan ADK</label>
                  <div class="col-sm-6">
                    <input class="form-control"  value="<?= $db->persentaseAdk ?>%" readonly>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nilai Penggunaan ADK</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" value="<?= number_format($db->jumlahPengajuanAdk,2,',','.') ?>" readonly>
                    </div>
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Pilih Tahapan PDRB</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input class="form-control"  value="<?php switch ($db->pdrbTahapAdk) { case '1': echo "I"; break; case '2': echo "II"; break; case '3': echo "III"; break; case '4': echo "IV"; break; case '5': echo "V"; break; } ?> " readonly>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Persentase PDRB</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input class="form-control"  value="<?= $db->persentasePdrb ?>%" readonly>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nilai PDRB</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" value="<?= number_format($db->jumlahPengajuanPdrb,2,',','.') ?>" readonly>                    </div>
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Jumlah Pengajuan </label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" value="<?= number_format($db->jumlahPengajuanUd,2,',','.') ?>" readonly>                      </div>
                  </div>
                </div>
                <hr />

                <?php if ($db->udAdkF1 == NULL) { ?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Database 2022  s.d Tahap Sebelumnya</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f1">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF2 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Laporan Realisasi Tahun <?= date('Y') ?> Tahap Sebelumnya [Lap. Realisasi Apbdes, Realisasi Anggaran Desa Dan Realisasi Anggaran Desa Per Kegiatan Masing-masing Cap Basah]<code>(PDF)</code></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f2">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF3 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Validasi  Pajak Daerah Yang Dikeluarkan Bidang Pendapatan BPKK</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f3">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF4 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Infografis Awal Tahun <?= date('Y') ?></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f4">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF5 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Lembar Konfirmasi Transfer Atas Dana Desa Tahap Sebelumnya dan BLT Dana Desa Tahun <?= date('Y') ?></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f5">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF6 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">LPJ Tahap I  Tahun <?= date('Y')-1 ?></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f6">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF7 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">SK Kepala Kampung, Sekretaris kampung dan Kaur Keuangan <code>(PDF)</code></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f7">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF8 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Pengantar dari Kampung dan Camat<code>(PDF)</code></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f8">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF9 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Pengantar Hasil Verifikasi Kampung dan Kecamatan</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f9">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF10 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Pernyataan Tanggung Jawab Kepala Kampung</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f10">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF11 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Fakta Integritas</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f11">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF12 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Rekomendasi dari Kecamatan</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f12">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF13 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Permohonan Pencairan ADK tahun <?= date('Y') ?></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f13">
                    </div>
                  </div>
                  <hr />
                <?php } ?>
                <?php if ($db->udAdkF14 == NULL) {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Rekening Koran Tahun <?= date('Y') ?></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f14">
                    </div>
                  </div>
                <?php } ?>

                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Update Data</button>
                  <a class="btn btn-outline-secondary" href="<?= base_url('upload_dokumen') ?>">Kembali</a>
                </div>

              </form>
            </div>
