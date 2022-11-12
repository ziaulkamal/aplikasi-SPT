<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <?php
      if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success outline alert-dismissible fade show" role="alert">
          <p><?= $this->session->flashdata('msg') ?></p>
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
      <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
              <h5><?= $title; ?></h5>
              <span>Lihat data surat secara keseluruhan </span>
            </div>
          <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Surat</th>
                      <th>Diperuntukan</th>
                      <th>Tahapan Anggaran</th>
                      <th>Tahun Anggaran</th>
                      <th>Tanggal Di Buat</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($db as $q) {
                      if ($q->nomorSuratRk == NULL || $q->nomorSuratRk == '') {
                        $nomorSurat = '';
                      }else {
                          $nomorSurat = '( Nomor Surat : '.$q->nomorSuratRk.' )';
                      }
                      switch ($q->jenisSuratRk) {
                          case 'sp':
                            $jenis = "Surat Pengantar";
                            break;

                          case 'sr':
                            $jenis = "Surat Rekomendasi";
                            break;

                          case 'spv':
                            $jenis = "Surat Pernyataan Verifikasi";
                            break;
                        }
                      switch ($q->kategoriSuratRk) {
                        case 'dds':
                          switch ($q->tahapanDdsRk) {
                            case '1':
                              $tahapan = "I";
                              break;

                            case '2':
                              $tahapan = "II";
                              break;

                            case '3':
                              $tahapan = "III";
                              break;

                            case '4':
                              $tahapan = "IV";
                              break;

                            case '5':
                              $tahapan = "V";
                              break;
                          }
                          break;
                        case 'adk':
                          switch ($q->tahapanAdkRk) {
                            case '1':
                              $tahapan = "I";
                              break;

                            case '2':
                              $tahapan = "II";
                              break;

                            case '3':
                              $tahapan = "III";
                              break;

                            case '4':
                              $tahapan = "IV";
                              break;

                            case '5':
                              $tahapan = "V";
                              break;
                          }
                          break;
                      } ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $jenis.' ( <code>'.strtoupper($q->kategoriSuratRk).'</code> ) '. $nomorSurat ?></td>
                        <td>Untuk Gampong <?= $q->namaG ?></td>
                        <td>Tahap <?= $tahapan ?></td>
                        <td><?= $q->tahunAnggaranRk ?></td>
                        <td><?= date_indo($q->createdAtRk) ?></td>
                        <td><a href="<?= base_url('downloads/').$q->idRk; ?>" class="btn btn-square btn-outline-primary btn-sm">Download</a><a href="<?= base_url('hapus_berkas_surat/').$q->idRk ?>" class="btn btn-square btn-danger btn-sm">Hapus</a></td>

                      </tr>
                    <?php }?>

                  </tbody>

                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
