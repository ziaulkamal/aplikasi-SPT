

<div class="page-body">
  <div class="container-fluid">

  <?php if($this->session->flashdata('msg')) { ?>

    <div class="alert alert-success outline alert-dismissible fade show" role="alert">
      <p><b> <?= $this->session->flashdata('msg') ?>! </b></p>
      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

  <?php } ?>
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h5><?= $title ?></h5>
        </div>
        <div class="card-body">
          <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Dokumen</th>
                  <th>Tahapan</th>
                  <th>Persentase Pengajuan</th>
                  <th>Desa / Gampong</th>
                  <th>Jumlah Pengajuan Anggaran</th>

                  <th>Keterangan</th>
                  <th>Opsi</th>
                  <th>Tanggal Pengajuan</th>
                </tr>
              </thead>
              <tbody>
                <?php $no =1;
                foreach ($db as $d) {?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= strtoupper($d->jenisDokumenUd) ?></td>
                    <td><?php
                    switch ($d->jenisDokumenUd) {
                      case 'Adk':
                        switch ($d->adkTahapAdk) {
                          case '1':
                            echo "I";
                            break;

                          case '2':
                            echo "II";
                            break;

                          case '3':
                            echo "III";
                            break;

                          case '4':
                            echo "IV";
                            break;

                          case '5':
                            echo "V";
                            break;

                        }
                        break;

                      case 'Dds':
                        switch ($d->ddsTahap) {
                          case '1':
                            echo "I";
                            break;

                          case '2':
                            echo "II";
                            break;

                          case '3':
                            echo "III";
                            break;

                          case '4':
                            echo "IV";
                            break;

                          case '5':
                            echo "V";
                            break;

                        }
                        break;

                    }
                     ?></td>
                    <td><?php
                    switch ($d->jenisDokumenUd) {
                      case 'Adk':
                        echo $d->persentaseAdk.'%';
                        break;

                      case 'Dds':
                          echo $d->persentaseDds.'%';
                        break;

                    }
                     ?></td>
                    <td><?= $d->namaG ?></td>
                    <td>Rp. <?= number_format($d->jumlahPengajuanUd,2,',','.') ?></td>
                    <td><?php
                    switch ($d->statusUd) {
                      case '0':
                        echo "Perlu Tindakan Verifikasi Dan Cek Kelengkapan";
                        break;
                      case '1':
                        echo "Selesai Di Proses Verifikasi Secara Keseluruhan";
                        break;

                    }

                     ?></td>

                     <td>
                       <div class="btn-group" role="group" aria-label="Basic example">
                         <a href='javascript:void(0)' data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg-<?= $d->idUd ?>" class='btn btn-square btn-outline-primary btn-sm'>Periksa</a>
                         <a href='<?= base_url('delete_berkas/').$d->idUd ?>' class='btn btn-square btn-outline-danger btn-sm'>Hapus</a>
                        </div>

                    </td>
                    <td><?= longdate_indo($d->createdAtUd) ?></td>

                  </tr>
                <?php }

                 ?>
              </tbody>
            </table>
            <?php
            foreach ($db as $d) {?>
              <div class="modal fade bd-example-modal-lg-<?= $d->idUd ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">Berkas Dokumen Pemohon <?= $d->namaG ?></h4>
                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <ul class="list-group">




                      <?php switch ($d->jenisDokumenUd) {
                        case 'Adk':

                        if ($d->udAdkF1	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF2	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF3	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF4	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF5	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF6	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF7	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF8	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF9	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF10	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF11	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF12	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF13	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                        if ($d->udAdkF14	!= '') { ?>
                        <li class="list-group-item">Database 2022  s.d Tahap Sebelumnya <a target="_blank" href="<?= base_url('assets_sys/files/adk/').$d->path_file.'/ADK_'.$d->udAdkF1 ?>"> <code>Lihat</code> </a> </li>
                        <?php }
                          break;
                        case 'Dds':
                          ?>
                          <li class="list-group-item">Cras justo odio</li>
                          <li class="list-group-item">Dapibus ac facilisis in</li>
                          <li class="list-group-item">Morbi leo risus</li>
                          <li class="list-group-item">Porta ac consectetur ac</li>
                          <li class="list-group-item">Vestibulum at eros</li>
                          <?php
                          break;

                      } ?>


                    </ul></div>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>

  </div>


    </div>

  </div>
</div>
