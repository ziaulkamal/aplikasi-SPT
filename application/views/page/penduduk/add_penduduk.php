<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header pb-0">
            <h5><?php if (!isset($set)) {
              echo $title;
            }else {
              echo $title .' ['.ucwords($set).']';
            } ?></h5>
            <span>Silahkan mengisi formulir sesuai dengan label yang tertera. Dan pastikan anda sudah mengisi dengan benar.</span>
          </div>
          <?php
          if (isset($set) && $set == 'lokal') { ?>
            <div class="card-body">
              <form class="theme-form">
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">NIK</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" required>
                  </div>
                </div>

                <fieldset class="mb-3">
                  <div class="row">
                    <label class="col-form-label col-sm-3 pt-0">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <div class="form-check radio radio-primary">
                        <input class="form-check-input" type="radio" name="radio1" value="L">
                        <label class="form-check-label" for="laki-laki">Laki - Laki</label>
                      </div>
                      <div class="form-check radio radio-primary">
                        <input class="form-check-input" type="radio" name="radio1" value="P">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Kelurahan</label>
                  <div class="col-sm-9">
                    <select class="js-example-disabled-results col-sm-12">
                      <option value="1" selected>-- Pilih --</option>
                      <option value="1">Lokal Kecamatan Singkil</option>
                      <option value="2">Luar Kecamatan Singkil</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Nomor HP</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" required>
                  </div>
                </div>

                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-outline-secondary" type="reset">Reset</button>
                </div>

              </form>
            </div>

          <?php }elseif (isset($set) && $set == 'luar') { ?>
            <div class="card-body">
              <form class="theme-form">
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">NIK</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" required>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Status Penduduk</label>
                  <div class="col-sm-9">
                    <select class="js-example-disabled-results col-sm-12">
                      <option value="1" selected>-- Pilih --</option>
                      <option value="1">Lokal Kecamatan Singkil</option>
                      <option value="2">Luar Kecamatan Singkil</option>
                    </select>
                  </div>
                </div>
                <fieldset class="mb-3">
                  <div class="row">
                    <label class="col-form-label col-sm-3 pt-0">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <div class="form-check radio radio-primary">
                        <input class="form-check-input" type="radio" name="radio1" value="L">
                        <label class="form-check-label" for="laki-laki">Laki - Laki</label>
                      </div>
                      <div class="form-check radio radio-primary">
                        <input class="form-check-input" type="radio" name="radio1" value="P">
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Kelurahan</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text">
                  </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-outline-secondary" type="reset">Reset</button>
                </div>

              </form>
            </div>

          <?php }else { ?>
            <div class="card-body btn-showcase">
                <button class="btn btn-square btn-primary" type="button" onclick="lokal()">Penduduk Lokal Kecamatan Singkil</button>
                <button class="btn btn-square btn-secondary" type="button" onclick="luar()">Penduduk Luar Kecamatan Singkil</button>
              </div>

          <?php } ?>
        </div>
      </div>

    </div>
  </div>
</div>
