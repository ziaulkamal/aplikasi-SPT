<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="card col-sm-12 m-5">
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
        <form class="form theme-form" action="<?= base_url('rekomendasi_bantuan/_proses') ?>" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nomor Surat Rekomendasi</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="number" onclick="onlyNumberKey()" name="noSurat" value="<?= set_value('noSurat') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Desa / Gampong</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="gampong">
                      <option value="">-- Pilih Gampong --</option>
                      <?php foreach ($db as $q) { ?>
                        <option value="<?= $q->idG ?>"><?= $q->namaG ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Jenis Rekomendasi</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="jenis">
                      <option value="">-- Pilih Jenis --</option>
                      <option value="1">Perorangan</option>
                      <option value="2">Kelompok</option>

                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Penerima Bantuan</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="penerima" value="<?= set_value('penerima') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Perihal Bantuan</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="perihal" value="<?= set_value('perihal') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Tanggal Pengajuan</label>
                  <div class="col-sm-6">
                    <input class="form-control digits" type="date" name="tanggal" value="<?= set_value('tanggal') ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="col-sm-9 offset-sm-3">
              <button class="btn btn-primary" type="submit">Proses Bantuan</button>
              <input class="btn btn-light" type="reset" value="Reset Form">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
