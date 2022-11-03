<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">

      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5><?php if(!$this->uri->segment(2)){
              echo $title;
            }else {
              echo $title . " - " . $part;
            } ?></h5>
            <span>Lihat data surat secara keseluruhan </span>
            <button class="btn btn-square btn-secondary" type="button" onclick="dds()">DDS</button>
            <button class="btn btn-square btn-primary" type="button" onclick="adk()">ADK</button>
          </div>
          <?php if ($this->uri->segment(2) == 'dds') {?>
            <div class="card-body">
              <?php
              if ($this->session->flashdata('msg')) { ?>
                <div class="alert alert-success outline alert-dismissible fade show" role="alert">
                  <p><?= $this->session->flashdata('msg') ?></p>
                  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Surat</th>
                      <th>Tahapan Anggaran</th>
                      <th>Tahun Anggaran</th>
                      <th>Download Template Surat</th>
                      <th>Tanggal Di Buat</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($db as $q) {
                      switch ($q->jenisDd) {
                        case 'FI':
                          $jenis = "Surat Fakta Integritas";
                          break;

                        case 'SP':
                          $jenis = "Surat Pengantar";
                          break;

                        case 'SPP':
                          $jenis = "Surat Permohonan Pencairan";
                          break;

                        case 'SPTJ':
                          $jenis = "Surat Pernyataan Tanggung Jawab";
                          break;

                        case 'SPV':
                          $jenis = "Surat Pernyataan Verifikasi";
                          break;
                      }
                      switch ($q->gelombangDd) {
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

                        default:
                          $tahapan = "";
                          break;
                      }

                      ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $jenis ?></td>
                        <td>Tahap <?= $tahapan ?></td>
                        <td><?= $q->tahunDd ?></td>
                        <td><a href="<?= base_url('download/').$this->session->userdata('gampong').'/'.$this->uri->segment(2).'/'.$q->idDd  ?>" class="btn btn-square btn-primary btn-sm">Download</a></td>
                        <td><?= date_indo($q->createdAtDD) ?></td>
                        <td><a href="<?= base_url('hapus_berkas_surat/').$this->uri->segment(2).'/'.$q->idDd ?>" class="btn btn-square btn-danger btn-sm">Hapus</a></td>

                      </tr>
                    <?php }?>

                  </tbody>

                </table>
              </div>
            </div>
          <?php }elseif ($this->uri->segment(2) == 'adk') { ?>
            <div class="card-body">
              <?php
              if ($this->session->flashdata('msg')) { ?>
                <div class="alert alert-success outline alert-dismissible fade show" role="alert">
                  <p><?= $this->session->flashdata('msg') ?></p>
                  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Jenis Surat</th>
                      <th>Tahapan Anggaran</th>
                      <th>Tahun Anggaran</th>
                      <th>Download Template Surat</th>
                      <th>Tanggal Di Buat</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($db as $r) {
                      switch ($r->jenisAdk) {
                        case 'FI':
                          $jenis = "Surat Fakta Integritas";
                          break;

                        case 'SP':
                          $jenis = "Surat Pengantar";
                          break;

                        case 'SPP':
                          $jenis = "Surat Permohonan Pencairan";
                          break;

                        case 'SPTJ':
                          $jenis = "Surat Pernyataan Tanggung Jawab";
                          break;

                        case 'SPV':
                          $jenis = "Surat Pernyataan Verifikasi";
                          break;
                      }
                      switch ($r->tahapanAdk) {
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

                        default:
                          $tahapan = "";
                          break;
                      }

                      ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $jenis ?></td>
                        <td>Tahap <?= $tahapan ?></td>
                        <td><?= $r->tahunAdk ?></td>
                        <td><a href="<?= base_url('download/').$this->session->userdata('gampong').'/'.$this->uri->segment(2).'/'.$r->idAdk ?>" class="btn btn-square btn-primary btn-sm">Download</a></td>
                        <td><?= date_indo($r->createdAtDk) ?></td>
                        <td><a href="<?= base_url('hapus_berkas_surat/').$this->uri->segment(2).'/'.$r->idAdk ?>" class="btn btn-square btn-danger btn-sm">Hapus</a></td>

                      </tr>
                    <?php }?>

                  </tbody>

                </table>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
