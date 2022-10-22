<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">

      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h5><?= $title;  ?></h5>
            <span>Silahkan mengisi formulir sesuai dengan label yang tertera. Dan pastikan anda sudah mengisi dengan benar.</span>
          </div>
          <?php
          if ($this->session->flashdata('msg')) { ?>
            <div class="alert alert-success outline alert-dismissible fade show" role="alert">
              <p><?= $this->session->flashdata('msg') ?></p>
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php }
          echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>'); ?>
          <div class="card-body">
            <div class="row">
              <form method="POST" enctype="multipart/form-data" action="<?= base_url('jabatan/_process') ?>">
              <div class="col-sm-12">
                  <div class="mb-3 input-group-square">
                    <label class="form-label">Jenis Jabatan</label>
                    <div class="input-group">
                      <input class="form-control" type="text" name="jabatan" placeholder="Contoh: Kaur Keuangan">
                    </div>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="mb-3 input-group-square">
                    <label class="form-label">Kebutuhan</label>
                    <div class="input-group">
                      <select class="js-example-disabled-results col-sm-12" name="kebutuhan" type="text" required>
                        <option value="" selected>-- Pilih --</option>
                        <option value="G">Gampong</option>
                        <option value="K">Kecamatan</option>

                      </select>
                    </div>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="mb-3 input-group-square">
                    <button class="btn btn-primary btn-next" type="submit">Simpan</button>
                  </div>
              </div>
            </form>
            </div>
          </div>

        </div>
      </di>
    </div>
  </div>
</div>
