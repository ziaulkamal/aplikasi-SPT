<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="card col-sm-8 m-5">
        <?php if ($this->session->flashdata('msg')) {?>
          <div class="card-body">
          <div class="alert alert-success outline alert-dismissible fade show" role="alert">
            <p><?= $this->session->flashdata('msg') ?></p>
          </div>
        </div>
      <?php }
        echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>'); ?>
        <div class="card-header pb-0">
          <h5><?= $title ?></h5>
        </div>
        <?php if ($this->uri->segment(1) == 'edit_petugas') { ?>
          <form class="form theme-form" action="<?= base_url('edit_petugas/_proses/').$db->petugasIdP ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="email" name="email" value="<?=$db->email ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="password" name="password" value="">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="col-sm-9 offset-sm-3">
                <button class="btn btn-primary" type="submit">Edit</button>
                <input class="btn btn-light" type="reset" value="Reset">
              </div>
            </div>
          </form>
        <?php } ?>

        <?php if ($this->uri->segment(1) == 'atur_petugas_baru') { ?>
          <form class="form theme-form" action="<?= base_url('atur_petugas_baru/_proses') ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="email" name="email" value="<?= set_value('email') ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="password" name="password" value="<?= set_value('password') ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="col-sm-9 offset-sm-3">
                <button class="btn btn-primary" type="submit">Buat Baru</button>
                <input class="btn btn-light" type="reset" value="Reset">
              </div>
            </div>
          </form>

        <?php } ?>
        <?php if ($this->uri->segment(1) == 'pengaturan_kecamatan') { ?>
          <form class="form theme-form" action="<?= base_url('pengaturan_kecamatan/_proses') ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                      <input class="form-control" type="number" name="nip" value="<?= set_value('nip') ?>">
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control col-sm-12" name="status" type="text">
                        <option value="" selected>-- Pilih Status --</option>
                        <option value="camat">Kepala Kecamatan</option>
                        <option value="sekcam">Sekretaris Kecamatan</option>
                        <option value="kaurcam">Kaur Keuangan</option>
                        <option value="verifikasi">Bagian Verifikasi</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer text-end">
              <div class="col-sm-9 offset-sm-3">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <input class="btn btn-light" type="reset" value="Reset">
              </div>
            </div>
          </form>

        <?php } ?>
      </div>
        <?php if ($this->uri->segment(1) == 'pengaturan_kecamatan') { ?>
      <br>
      <div class="card col-sm-12 m-5">
        <div class="card-header pb-0">
          <h5>Data Kecamatan</h5>
        </div>
        <div class="card-body">
          <div class="dt-ext table-responsive">
            <table class="display" id="responsive">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>NIP</th>
                  <th>Status </th>
                  <th>Tindakan</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($db as $r) {?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $r->namaPetugasK ?></td>
                    <td><?= $r->nipPetugasK ?></td>
                    <td><?php switch ($r->statusKecamatan) {
                      case 'camat':
                        echo "Kepala Kecamatan";
                        break;
                      case 'sekcam':
                        echo "Sekretaris Kecamatan";
                        break;
                      case 'kaurcam':
                        echo "Kaur Keuangan";
                        break;
                      case 'verifikasi':
                        echo "Bagian Verifikasi";
                        break;
                    } ?></td>
                    <td><a href='<?= base_url('pengaturan_kecamatan/_hapus/').$r->idK ?>' class='btn btn-square btn-outline-danger btn-sm'>Hapus</a></td>

                  </tr>
                <?php }

                 ?>


              </tbody>

            </table>
          </div>
        </div>

      </div>
    <? } ?>
    <?php if ($this->uri->segment(1) == 'atur_petugas_baru') { ?>
  <br>
  <div class="card col-sm-12 m-5">
    <div class="card-header pb-0">
      <h5>Data Akun Penggunaan Untuk Kecamatan</h5>
    </div>
    <div class="card-body">
      <div class="dt-ext table-responsive">
        <table class="display" id="responsive">
          <thead>
            <tr>
              <th>No</th>
              <th>Email</th>

              <th>Login Terakhir</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($db as $r) {?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $r->email ?></td>

                <td><?= $r->loginTerakhir ?></td>
                <td><a href='<?= base_url('edit_petugas/').$r->petugasIdP ?>' class='btn btn-square btn-outline-warning btn-sm'>Edit</a>
                  <a href='<?= base_url('petugas/_hapus/').$r->petugasIdP ?>' class='btn btn-square btn-outline-danger btn-sm'>Hapus</a>
                </td>

              </tr>
            <?php }

             ?>


          </tbody>

        </table>
      </div>
    </div>

  </div>
<? } ?>
  </div>
  </div>
</div>

<script>

function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
</script>
