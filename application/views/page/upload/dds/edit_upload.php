<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5><?= $title . ' - (DDS)' ?></h5>
            <span>Upload File Dokumen</span>
          </div>
          <?= validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>'); ?>
            <div class="card-body">
              <form class="theme-form" method="POST" action="<?= base_url('proses_upload/dds') ?>" enctype="multipart/form-data">
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Pilih Tahapan DDS</label>
                  <div class="col-sm-6">
                    <input class="form-control" value="<?php switch ($db->ddsTahap) { case '1': echo "I"; break; case '2': echo "II"; break; case '3': echo "III"; break; case '4': echo "IV"; break; case '5': echo "V"; break; } ?>"readonly>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Persentase Penggunaan DDS</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input class="form-control" value="<?= $db->persentaseDds ?>"readonly>
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Jumlah Pengajuan</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" value="<?= number_format($db->jumlahPengajuanUd,2,',','.') ?>"readonly>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Jumlah BLT 3 Bulan</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" value="<?= number_format($db->jumlahBltDds,2,',','.') ?>"readonly>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Jumlah non BLT</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" value="<?= number_format($db->bltDds,2,',','.') ?>"readonly>
                    </div>
                  </div>
                </div>
                <?php if ($db->udDdsF1 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Laporan Penyerapan Dana Desa Tahun <?= date('Y') ?> tahap Sebelumnya Versi Omspan dan Versi Siskeudes</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f1">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF2 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Laporan Penyerapan Tahap Sebelumnya  Paling Sedikit 90% dan Capaian Keluaran  Paling Sedikit 75% Versi Omspan dan Versi Siskeudes<code>(PDF)</code></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f2">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF3 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Laporan Kovenvergensi Pencegahan Stunting Tingkat Desa Tahun <?= date('Y')-1 ?></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f3">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF4 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Daftar Refrensi Kas Desa dan rincian Penyaluran Beserta Pengantar Diketahui Camat yang ditujukan Kepada Bupati c.q Pejabat Pengelola Keuangan Daerah</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f4">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF5 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Data Realisasi Pembayaran BLT Kampung bulan Januari s.d September Tahun <?= date('Y') ?></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f5">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF6 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Pengantar Hasil Verifikasi Kecamatan</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f6">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF7 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Pernyataan Tanggung Jawab Kepala Kampung <code>(PDF)</code></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f7">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF8 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Fakta Integritas</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f8">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF9 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Rekomendasi dari Kecamatan</label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f9">
                    </div>
                  </div>

                <?php } ?>
                <?php if ($db->udDdsF10 == NULL) {?>
                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Surat Permohonan Pencairan Dana Desa tahun  <?= date('Y') ?></label>
                    <div class="col-sm-6">
                      <input class="form-control" type="file" name="f10">
                    </div>
                  </div>

                <?php } ?>

                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Update Dokumen</button>
                  <a class="btn btn-outline-secondary" href="<?= base_url('upload_dokumen') ?>">Kembali</a>
                </div>

              </form>
            </div>
