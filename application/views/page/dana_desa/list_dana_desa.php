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
          <div class="card-body">
            <div class="dt-ext table-responsive">
              <table class="display" id="responsive">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Surat</th>
                    <th>Tahapan Anggaran</th>
                    <th>Tahun Anggaran</th>
                    <th>Download Template Surat</th>
                    <th>Unggah Surat</th>
                    <th>Tanggal Di Buat</th>
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
                        $jenis = "Surat Pernyataan";
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
                      <td><?= $tahapan ?></td>
                      <td><?= $q->tahunDd ?></td>
                      <td><a href="#" class="btn btn-square btn-primary btn-sm">Download</a></td>
                      <td><a href="#" class="btn btn-square btn-outline-success btn-sm">Unggah</a></td>
                      <td><?= $q->createdAtDD ?></td>

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
