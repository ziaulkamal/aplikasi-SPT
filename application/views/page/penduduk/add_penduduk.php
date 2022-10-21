<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5><?php if (!isset($set)) {
              echo $title;
            }else {
              echo $title .' ['.ucwords($set).']';
            } ?></h5>
            <span>Silahkan mengisi formulir sesuai dengan label yang tertera. Dan pastikan anda sudah mengisi dengan benar.</span>
          </div>
          <?php
          echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
          if (isset($set) && $set == 'lokal') { ?>
            <div class="card-body">
              <form class="theme-form" method="POST" action="<?= base_url('penduduk/_process/tambah') ?>" enctype="multipart/form-data">
                <input type="hidden" name="tipe" value="<?= $set; ?>">
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">NIK</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="nik" maxlength="16" onkeypress="return onlyNumberKey(event)" value="<?= set_value('nik'); ?>" required>
                  </div>
                </div>

                <fieldset class="mb-3">
                  <div class="row">
                    <label class="col-form-label col-sm-3 pt-0">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <div class="form-check radio radio-primary">
                        <input class="form-check-input" id="jk1" type="radio" name="jenisKelamin" value="1">
                        <label class="form-check-label" for="jk1">Laki-laki</label>
                      </div>
                      <div class="form-check radio radio-primary">
                        <input class="form-check-input" id="jk2" type="radio" name="jenisKelamin" value="2">
                        <label class="form-check-label" for="jk2">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Kelurahan</label>
                  <div class="col-sm-9">
                    <select class="js-example-disabled-results col-sm-12" name="gampong">
                      <option value="" selected>-- Pilih --</option>
                      <?php foreach ($db as $q) {?>
                        <option value="<?= $q->idG ?>"><?= $q->namaG ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Nomor HP</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="hp" onkeypress="return onlyNumberKey(event)" maxlength="16" value="<?= set_value('hp'); ?>" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat'); ?>" required>
                  </div>
                </div>

                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-outline-secondary" onclick="pendudukBack()" type="button">Kembali</button>
                </div>

              </form>
            </div>

          <?php }elseif (isset($set) && $set == 'luar') { ?>
            <div class="card-body">
              <form class="theme-form" method="POST" action="<?= base_url('penduduk/_process/tambah') ?>" enctype="multipart/form-data">
                <input type="hidden" name="tipe" value="<?= $set; ?>">
                <input type="hidden" name="last" value="<?= $count; ?>">
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">NIK</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="nik" onkeypress="return onlyNumberKey(event)" maxlength="16" value="<?= set_value('nik'); ?>">
                  </div>
                </div>

                <fieldset class="mb-3">
                  <div class="row">
                    <label class="col-form-label col-sm-3 pt-0">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <div class="form-check radio radio-primary">
                        <input class="form-check-input" id="jk1" type="radio" name="jenisKelamin" value="1">
                        <label class="form-check-label" for="jk1">Laki-laki</label>
                      </div>
                      <div class="form-check radio radio-primary">
                        <input class="form-check-input" id="jk2" type="radio" name="jenisKelamin" value="2">
                        <label class="form-check-label" for="jk2">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Kelurahan</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="gampong" value="<?= set_value('gampong'); ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Nomor HP</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="hp" onkeypress="return onlyNumberKey(event)" maxlength="16" value="<?= set_value('hp'); ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat'); ?>">
                  </div>
                </div>

                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-outline-secondary" onclick="pendudukBack()" type="button">Kembali</button>
                </div>

              </form>
            </div>

          <?php }else { ?>
            <div class="card-body btn-showcase">
                <button class="btn btn-square btn-primary" type="button" onclick="lokalSelect()">Penduduk Lokal Kecamatan Singkil</button>
                <button class="btn btn-square btn-secondary" type="button" onclick="luarSelect()">Penduduk Luar Kecamatan Singkil</button>
              </div>

          <?php } ?>
        </div>
      </div>
      <?php if ($this->session->flashdata('msg')) { ?>
        <div class="alert alert-success outline alert-dismissible fade show" role="alert">
          <p><b> <?= $this->session->flashdata('msg') ?>! </b>Data sudah di update.</p>
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
