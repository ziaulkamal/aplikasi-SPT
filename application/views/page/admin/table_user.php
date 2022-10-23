<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <?php
      if ($part == 'pending') { ?>

        <div class="col-sm-12 m-5">
          <div class="card">
            <div class="card-header">
              <h5><?= $title.' - '.$title2; ?></h5>
              <span>Lihat data user yang perlu di lakukan aktivasi.</span>
            </div>
            <?php if ($this->session->flashdata('msg')) { ?>
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
                      <th>IP</th>
                      <th>Negara</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $numlo = 1;
                    foreach ($db as $resPendding) { ?>
                      <tr>
                        <td><?= $numlo++ ?></td>
                        <td><?= ucwords($resPendding->nama_lengkap); ?></td>
                        <td><?= $resPendding->emailL; ?></td>
                        <td><?= $resPendding->ip; ?></td>
                        <td><?= $resPendding->wilayahL; ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#approve<?= $resPendding->idL ?>">Setujui</a>
                          <a class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#reject<?= $resPendding->idL ?>">Hapus</a>
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

      <?php }elseif ($part == 'aktif') { ?>

        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h5><?= $title.' - '.$title2; ?></h5>
              <span>Lihat data penduduk yang sudah terdata di aplikasi, data di tabel bawah ini merupakan data penduduk Luar kecamatan singkil </span>
            </div>
            <?php if ($this->session->flashdata('msg')) { ?>
            <div class="card-body">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert"> <p><?= $this->session->flashdata('msg') ?></p> </div>
            </div>
          <?php }elseif ($this->session->flashdata('err')) { ?>
          <div class="card-body">
            <div class="alert alert-danger outline alert-dismissible fade show" role="alert"> <p><?= $this->session->flashdata('err') ?></p> </div>
          </div>
          <?php } ?>
            <div class="card-body">
              <div class="dt-ext table-responsive">
                <table class="display" id="responsive">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Level Operator</th>
                      <th>Nama Lengkap</th>
                      <th>NIK</th>
                      <th>Kelurahan / Gampong</th>
                      <th>Alamat</th>
                      <th>No HP</th>
                      <th>Terdaftar</th>
                      <th>Pilih Tindakan Lanjutan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $numlu = 1;
                    foreach ($db as $userActive) { ?>
                      <tr>
                        <td><?= $numlu++ ?></td>
                        <td><?php if ($userActive->lvl == 1) {
                          echo "Super Admin";
                        }elseif ($userActive->lvl == 2) {
                          echo "Operator Kecamatan";
                        }else{
                          echo "Operator Gampong";
                        } ?></td>
                        <td><?= $userActive->namaP ?></td>
                        <td><?= substr($userActive->nikP,6).'<b>XXXXXXX</b>' ?></td>
                        <td><?php if ($userActive->namaG == 'default') {
                          echo "-";
                        }else {
                          echo $userActive->namaG;
                        } ?></td>
                        <td><?php if ($userActive->alamatA == 'default') {
                          echo "-";
                        }else {
                          echo $userActive->alamatA;
                        } ?></td>
                        <td><?= $userActive->nomorHpP ?></td>
                        <td><?= $userActive->createdAt ?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                          <a class="btn btn-outline-primary" type="button" data-bs-toggle="modal" data-bs-target="#reset<?= $userActive->idU ?>">Reset Password</a>
                          <a class="btn btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $userActive->idU ?>">Edit</a>
                          <a class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#susspend<?= $userActive->idU ?>">Blokir</a>
                        </div></td>
                      </tr>
                    <?php } ?>

                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>


      <?php } ?>


    </div>
  </div>
</div>

<?php if ($part == 'pending') {
  foreach ($db as $resPendding) { ?>
    <div class="modal fade" id="reject<?= $resPendding->idL ?>" tabindex="-1" role="dialog" aria-labelledby="reject<?= $resPendding->idL ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Penolakan!</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>User dengan nama <b>[ <?= ucwords($resPendding->nama_lengkap); ?> ]</b> dan email <b>[ <?= $resPendding->emailL; ?> ]</b> akan ditolak, dan nantinya email tersebut akan tetap bisa didaftarkan kembali melalui halaman pendaftaran. <br /> <br />Apakah anda yakin ingin melakukan penolakan ?</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batalkan</button>
            <a href="<?= base_url('reject/user/') . $resPendding->idL ?>" class="btn btn-primary" type="button">Yakin</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="approve<?= $resPendding->idL ?>" tabindex="-1" role="dialog" aria-labelledby="approve<?= $resPendding->idL ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Persetujuan!</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Apakah anda yakin ingin menyetujui pengguna dengan email <b><?= $resPendding->emailL; ?></b> ?</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batalkan</button>
            <a href="<?= base_url('aktivasi/user/') . $resPendding->idL ?>" class="btn btn-primary" type="button">Yakin</a>
          </div>
        </div>
      </div>
    </div>
  <?php }
}elseif ($part == 'aktif') {
  foreach ($db as $userActive) { ?>
    <div class="modal fade" id="reset<?= $userActive->idU ?>" tabindex="-1" role="dialog" aria-labelledby="reset<?= $userActive->idU ?>" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Konfirmasi Pengajuan Reset !</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>User dengan nama <b>[ <?= ucwords($userActive->namaP); ?> ]</b> dan email <b>[ <?= $userActive->email; ?> ]</b> akan dikirim token untuk reset password <br /> <br />Apakah anda yakin ingin melakukan penolakan ?</p>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batalkan</button>
            <a href="<?= base_url('resetPassword/') . $userActive->idU ?>" class="btn btn-primary" type="button">Yakin</a>
          </div>
        </div>
      </div>
    </div>
      <?php }
} ?>
