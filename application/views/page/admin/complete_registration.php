<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row m-10">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header pb-0">
              <h5><?= $title ?></h5>
            </div>
            <?php
            if (validation_errors()) {
              echo '<div class="card-body">';
              echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
              echo '</div>';
            }

            if ($this->session->flashdata('wellcome')) {?>
              <div class="card-body">
                <div class="alert alert-primary" role="alert">
                  <h4 class="alert-heading">Login Berhasil !</h4>
                  <p><?= $this->session->flashdata('wellcome'); ?></p>
                  <hr>
                  <p class="mb-0">Untuk dapat melanjutkan menggunakan aplikasi, silahkan lengkapi profil anda terlebih dahulu</p>
                </div>

              </div>
            <?php } ?>
            <div class="card-body">
              <form class="f1" method="POST" enctype="multipart/form-data" action="<?= base_url('complete/success') ?>">
                <div class="f1-steps">
                  <div class="f1-progress">
                    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
                  </div>
                  <div class="f1-step active">
                    <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    <p>Langkah Ke 1</p>
                  </div>
                  <div class="f1-step">
                    <div class="f1-step-icon"><i class="fa fa-pencil"></i></div>
                    <p>Langkah Ke 2</p>
                  </div>
                  <div class="f1-step">
                    <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                    <p>Langkah Ke 3</p>
                  </div>
                </div>
                <fieldset>
                  <div class="form-group">
                    <label for="f1-first-name">Nama Lengkap</label>
                    <input class="form-control" name="nama_lengkap" type="text" value="<?= set_value('nama_lengkap'); ?>">
                  </div>
                  <div class="form-group">
                    <label for="f1-first-name">NIK</label>
                    <input class="form-control" name="nik" maxlength="16" onkeypress="return onlyNumberKey(event)" type="text" value="<?= set_value('nik'); ?>">
                  </div>
                  <div class="form-group">
                    <label for="f1-first-name">Jenis Kelamin</label>
                    <select class="js-example-disabled-results col-sm-12" name="jenisKelamin" type="text">
                      <option value="" selected>-- Pilih --</option>
                      <option value="L">Laki-laki</option>
                      <option value="P">Perempuan</option>

                    </select>
                  </div>

                  <div class="f1-buttons">
                    <button class="btn btn-primary btn-next" type="button">Selanjutnya</button>
                  </div>
                </fieldset>
                <fieldset>
                  <div class="form-group">
                    <label for="f1-first-name">Jabatan Di Desa / Gampong</label>
                    <select class="js-example-disabled-results col-sm-12" name="jabatan" type="text">
                      <option value="" selected>-- Pilih --</option>
                      <?php foreach ($dbJ as $r) {?>
                        <option value="<?= $r->idJ ?>"><?= $r->label ?>
                          <?php $check = preg_replace("/[^A-Z]/","",$r->idJ); if ($check =='G') { echo " - Untuk Kebutuhan Gampong"; }else { echo " - Untuk Kebutuhan Kecamatan"; } ?>
                        </option>
                      <?php } ?>

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="f1-first-name">Desa / Gampong</label>
                    <select class="js-example-disabled-results col-sm-12" name="gampong">
                      <option value="" selected>-- Pilih --</option>
                      <?php foreach ($dbG as $q) {?>
                        <option value="<?= $q->idG ?>"><?= $q->namaG ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="f1-first-name">Alamat</label>
                    <input class="form-control" name="alamat" type="text" value="<?= set_value('alamat'); ?>">
                  </div>
                  <div class="f1-buttons">
                    <button class="btn btn-primary btn-previous" type="button">Sebelumnya</button>
                    <button class="btn btn-primary btn-next" type="button">Selanjutnya</button>
                  </div>
                </fieldset>
                <fieldset>
                  <div class="form-group">
                    <label for="f1-first-name">Nomor Telepon</label>
                    <input class="form-control" name="hp" maxlength="16" onkeypress="return onlyNumberKey(event)" type="text" required value="<?= set_value('hp'); ?>">
                  </div>
                  <div class="f1-buttons">
                    <button class="btn btn-primary btn-previous" type="button">Sebelumnya</button>
                    <button class="btn btn-primary btn-submit" type="submit">Simpan</button>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
