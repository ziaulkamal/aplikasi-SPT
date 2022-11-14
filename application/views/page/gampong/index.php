<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">

      <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
              <h5><?= $title; ?></h5>
              <span>Data Aparatur Desa</span>
              <?php
              if ($this->session->flashdata('msg')) { ?>
                <div class="alert alert-success outline alert-dismissible fade show" role="alert">
                  <p><?= $this->session->flashdata('msg') ?></p>
                  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>
            </div>
          <div class="card-body">
            <a class="btn btn-square btn-secondary" href="<?= base_url('gampong_pengaturan/_tambah_aparatur') ?>" >Tambah Aparatur</a>
            <a class="btn btn-square btn-success" href="<?= base_url('gampong_pengaturan/_atur') ?>" >Atur Aparatur</a>
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama </th>
                      <th>Jabatan Desa</th>
                      <th>NIK</th>
                      <th>No HP</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($db as $q) {?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $q->namaP ?></td>
                        <td><?php if ($q->jabatanPid != null) {
                          $q->jabatanPid;
                        }elseif ($q->jabatanPid == '0') {
                          echo "Belum ada Jabatan";
                        } {
                          echo "Belum ada Jabatan";
                        } ?></td>
                        <td><?= $q->nikP ?></td>
                        <td><?= $q->nomorHpP ?></td>
                        <td><a class="btn btn-outline-danger" href="<?= base_url('gampong_pengaturan/_hapus_penduduks/'). $q->idP ?>">Hapus</a></td>
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
