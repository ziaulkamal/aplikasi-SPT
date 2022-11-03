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
              <form class="theme-form" method="POST" action="<?= base_url('proses_upload/adk') ?>" enctype="multipart/form-data">
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Pilih Tahapan ADK</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="tahapan_adk">
                      <option value="">-- Pilih Tahapan --</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Persentase Penggunaan ADK</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase_adk" value="<?= set_value('persentase_adk') ?>" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nilai Penggunaan ADK</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" type="number" name="jumlah_adk" value="<?= set_value('jumlah_adk') ?>" maxlength="3">
                    </div>
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Pilih Tahapan PDRB</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="tahapan_pdrb">
                      <option value="">-- Pilih Tahapan --</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Persentase PDRB</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase_pdrb" value="<?= set_value('persentase_pdrb') ?>" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nilai PDRB</label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" type="number" name="jumlah_pdrb" value="<?= set_value('jumlah_pdrb') ?>" maxlength="3">
                    </div>
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Jumlah Pengajuan </label>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp.</span>
                      <input class="form-control" type="number" name="jumlah_pengajuan" value="<?= set_value('jumlah_pengajuan') ?>" maxlength="3">
                    </div>
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Database 2022  s.d Tahap Sebelumnya</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f1">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Laporan Realisasi Tahun <?= date('Y') ?> Tahap Sebelumnya [Lap. Realisasi Apbdes, Realisasi Anggaran Desa Dan Realisasi Anggaran Desa Per Kegiatan Masing-masing Cap Basah]<code>(PDF)</code></label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f2">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Validasi  Pajak Daerah Yang Dikeluarkan Bidang Pendapatan BPKK</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f3">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Infografis Awal Tahun <?= date('Y') ?></label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f4">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Lembar Konfirmasi Transfer Atas Dana Desa Tahap Sebelumnya dan BLT Dana Desa Tahun <?= date('Y') ?></label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f5">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">LPJ Tahap I  Tahun <?= date('Y')-1 ?></label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f6">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">SK Kepala Kampung, Sekretaris kampung dan Kaur Keuangan <code>(PDF)</code></label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f7">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Surat Pengantar dari Kampung dan Camat<code>(PDF)</code></label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f8">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Surat Pengantar Hasil Verifikasi Kampung dan Kecamatan</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f9">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Surat Pernyataan Tanggung Jawab Kepala Kampung</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f10">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Surat Fakta Integritas</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f11">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Surat Rekomendasi dari Kecamatan</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f12">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Surat Permohonan Pencairan ADK tahun <?= date('Y') ?></label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f13">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Rekening Koran Tahun <?= date('Y') ?></label>
                  <div class="col-sm-6">
                    <input class="form-control" type="file" name="f14">
                  </div>
                </div>

                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <a class="btn btn-outline-secondary" href="<?= base_url('upload_dokumen') ?>">Kembali</a>
                </div>

              </form>
            </div>
