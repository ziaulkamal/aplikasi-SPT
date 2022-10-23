<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
          <div class="col-sm-12 m-5">
          <div class="card">
            <div class="card-header">
              <h5><?= $title;?></h5>
              <span>Lihat data user yang perlu di lakukan Update Pengguna Khusus Kecamatan.</span>
            </div>
            <?php
            if ($this->session->flashdata('msg')) { ?>
              <div class="alert alert-success outline alert-dismissible fade show" role="alert"> <p><?= $this->session->flashdata('msg') ?></p> </div>
            <?php } ?>
            <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Email</th>
                      <th>Level Sekarang</th>
                      <th>Jabatan</th>
                      <th>Sedang Login</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $numlo = 1;
                    foreach ($db as $setAccounts) { ?>
                      <tr>
                        <td><?= $numlo++ ?></td>
                        <td><?= ucwords($setAccounts->namaP); ?></td>
                        <td><?= $setAccounts->email; ?></td>
                        <td><?= $setAccounts->lvl; ?></td>
                        <td><?= $setAccounts->label; ?></td>
                        <td><?php if ($setAccounts->isLogin == 1) {
                          echo "Ya";
                        }else {
                          echo "Tidak";
                        } ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#setAccounts<?= $setAccounts->idU ?>">Update Level</a>
                        </div>
                      </td>


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

<?php
  foreach ($db as $setAccounts) { ?>
    <div class="modal fade" id="setAccounts<?= $setAccounts->idU ?>" tabindex="-1" role="dialog" aria-labelledby="setAccounts<?= $setAccounts->idU ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Persetujuan !</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>User dengan nama <b>[ <?= ucwords($setAccounts->namaP); ?> ]</b> dan email <b>[ <?= $setAccounts->email; ?> ]</b> akan dinaikan ke level Operator Kecamatan. Untuk pengguna tersebut nantinya harus melakukan update Jabatan kembali di fitur update profil <br /> <br />Apakah anda yakin ingin melakukannya ?</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batalkan</button>
            <a href="<?= base_url('admin/_process/') . $setAccounts->idU ?>" class="btn btn-primary" type="button">Yakin</a>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>
