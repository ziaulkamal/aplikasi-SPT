<?php if ($this->session->flashdata('msg')) { ?>

  <div class="alert alert-success outline alert-dismissible fade show" role="alert">
    <p><b> <?= $this->session->flashdata('msg') ?>! </b></p>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<?php } ?>

<div class="page-body">
  <div class="container-fluid">

      <div class="row">
        <div class="col-xl-6">
          <div class="page-header">
            <div class="card">
            <div class="div">
              <div class="card-body">
                <div class="media-body mb-5">
                  <h6 class="f-w-600">Dokumen Kebutuhan Alokasi Dana Kampung (ADK)</h6>
                  <ul class="list-group">
                      <li class="list-group-item active"><b>Kebutuhan Berkas dokumen :</b></li>
                      <li class="list-group-item">Database <?= date('Y') ?></li>
                      <li class="list-group-item">laporan realisasi tahununan</li>
                      <li class="list-group-item">Validasi pajak daerah yang dikeluarkan bidang pendapatan BPKK.</li>
                      <li class="list-group-item">Infografis awal tahun <?= date('Y') ?></li>
                      <li class="list-group-item">Lembar konfirmasi transfer</li>
                      <li class="list-group-item">LPJ tahap 1 tahun <?= date('Y')-1 ?></li>
                      <li class="list-group-item">SK Kepala Kampung, Sekretaris kampung dan Kaur Keuangan</li>
                      <li class="list-group-item">Berkas Pengajuan ADK
                        <ol>
                          <li>Surat Pengantar dari Kampung dan Camat</li>
                          <li>Surat Pengantar Hasil Verifikasi Kampung dan Kecamatan</li>
                          <li>Surat Pernyataan Tanggung Jawab Kepala Kampung</li>
                          <li>Surat Fakta Integritas</li>
                          <li>Surat Rekomendasi dari Kecamatan</li>
                          <li>Surat Permohonan Pencairan ADK tahun <?= date('Y') ?></li>
                          <li>Rekening Koran <?= date('Y') ?></li>
                        </ol>
                      </li>
                    </ul>
                </div>
                <a class="btn btn-primary btn-sm" href="<?= base_url('upload_dokumen/adk') ?>"><span class="fa fa-edit"></span> Mulai Upload Dokumen ADK</a>
              </div>
            </div>
          </div>
          </div>
        </div>

        <div class="col-xl-6">
          <div class="page-header">
            <div class="card">
            <div class="div">
              <div class="card-body">
                <div class="media-body">
                  <h6 class="f-w-600">Dokumen Kebutuhan Dana Desa (DDS)</h6>
                  <ul class="list-group mb-5">
                      <li class="list-group-item active"><b>Kebutuhan Berkas dokumen :</b></li>
                      <li class="list-group-item">Laporan Penyerapan Dana Desa Tahun <?= date('Y'); ?> Versi Omspan dan Versi Siskeudes </li>
                      <li class="list-group-item">Laporan Penyerapan Tahap Sebelumnya  Paling Sedikit 90% dan Capaian Keluaran  Paling Sedikit 75% Versi Omspan dan Versi Siskeudes</li>
                      <li class="list-group-item">Laporan Kovenvergensi Pencegahan Stunting tingkat Desa tahun <?= date('Y')-1; ?>.</li>
                      <li class="list-group-item">Daftar Refrensi Kas Desa dan rincian Penyaluran Beserta Pengantar Diketahui Camat yang ditujukan Kepada Bupati c.q Pejabat Pengelola Keuangan Daerah</li>
                      <li class="list-group-item">Data Realisasi Pembayaran BLT Kampung Tahun <?= date('Y'); ?></li>
                      <li class="list-group-item">Berkas Penarikan Pengajuan DDS
                        <ol>
                          <li>Surat Pengantar dari Kampung dan Camat</li>
                          <li>Surat Pengantar Hasil Verifikasi Kecamatan</li>
                          <li>Surat Pernyataan Tanggung Jawab Kepala Kampung</li>
                          <li>Surat Fakta Integritas</li>
                          <li>Surat Rekomendasi dari Kecamatan</li>
                          <li>Surat Permohonan Pencairan Dana Desa tahun  <?= date('Y'); ?></li>
                          <li>Rekening Koran <?= date('Y'); ?></li>
                        </ol>
                      </li>
                    </ul>
                </div>
                <a class="btn btn-primary btn-sm" href="<?= base_url('upload_dokumen/dds') ?>"><span class="fa fa-edit"></span> Mulai Upload Dokumen DDS</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
