<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5><?= $title; ?></h5>
            <span>Silahkan mengisi formulir sesuai dengan label yang tertera. Dan pastikan anda sudah mengisi dengan benar.</span>
          </div>
          <?php
          echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
       ?>
            <div class="card-body">
              <form class="theme-form" method="POST" action="<?= base_url('gampong_pengaturan/_proses_aparatur') ?>" enctype="multipart/form-data">

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


        </div>
      </div>
    </div>
  </div>
</div>
