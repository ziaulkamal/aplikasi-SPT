

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
        <span>Lihat data surat rekomendasi bantuan secara keseluruhan </span>
      </div>
      <div class="card-body">
        <div class="dt-ext table-responsive">
          <table class="display" id="responsive">
            <thead>
            <tr>
            <th>No</th>
            <th>Jenis</th>
            <th>Penerima</th>
            <th>Perihal</th>
            <th>Desa / Gampong</th>
            <th>Status Dokumen</th>
            <th>Tanggal Pengajuan</th>
            <th>Opsi</th>

            </tr>
            </thead>
          <tbody>
            <?php $no = 1;
            foreach ($db as $q) {?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?php switch ($q->jenisRb) {
                  case '1':
                    echo "Perorangan";
                    break;
                  case '2':
                    echo "Kelompok";
                    break;
                } ?></td>
                <td><?= $q->penerimaRb ?></td>
                <td><?= $q->perihalBantuanRb ?></td>
                <td><?= $q->namaG ?></td>
                <td><a href="<?= base_url('download_rekomendasi/').$q->idRb; ?>" class="btn btn-square btn-primary btn-sm">Download</a></td>
                <td><?= date_indo($q->createdAtRb) ?></td>
                <td><a href="<?= base_url('hapus_rekomendasi/').$q->idRb; ?>" class="btn btn-square btn-outline-danger btn-sm">Hapus</a></td>

              </tr>
            <?php }


             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

</div>


    </div>
  </div>
</div>
