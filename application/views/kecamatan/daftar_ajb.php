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
              <span>Lihat data surat AJB keseluruhan </span>
            </div>
          <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nomor AJB</th>
                      <th>Gampong</th>
                      <th>Penjual</th>
                      <th>Total Luas</th>
                      <th>Status Dokumen</th>
                      <th>Tanggal Dibuat</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($db as $q) { ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $q->nomorAjb.'/'.$q->tahunAjb ?></td>
                        <td><?= $q->namaG ?></td>
                        <td><?= $q->nmPs_p1 ?></td>
                        <td><?= $q->totalLuas_a ?> m²</td>
                        <td><?php switch ($q->statusAjb) {
                          case '1':
                            echo "<a href='' class='btn btn-square btn-success btn-sm'>Upload</a>";
                            break;

                          default:
                          ?>
                            <a href='<?= base_url('downloads_ajb/').$q->idAjb."/".$q->lokasiDesa."/".$q->tahunAjb ?>' class='btn btn-square btn-primary btn-sm'>Download Template</a>
                          <?php  break;
                        } ?></td>
                        <td><?= longdate_indo($q->createdAtAjb) ?></td>
                        <td><a href='<?= base_url('hapus_ajb/').$q->idAjb ?>' class='btn btn-square btn-outline-danger btn-sm'>Hapus</a></td>
                      </tr>
                    <?php } ?>

                  </tbody>

                </table>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
