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
        <form class="form theme-form" action="<?= base_url('ajb/_proses_ajb') ?>" method="POST" enctype="multipart/form-data">
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nomor AJB</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="number" onclick="onlyNumberKey()" name="no_ajb" value="<?= set_value('no_ajb') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Lokasi Tanah</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="gampong_ph1">
                      <option value="">-- Pilih Gampong --</option>
                      <?php foreach ($db as $q) { ?>
                        <option value="<?= $q->idG ?>"><?= $q->namaG ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <hr />
                <h6>Data Pihak Pertama</h6>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">NIK </label>
                  <div class="col-sm-6">
                    <input class="form-control" type="number" name="nik_ph1" value="<?= set_value('nik_ph1') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nama </label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="nama_ph1" value="<?= set_value('nama_ph1') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="tpl_ph1" value="<?= set_value('tpl_ph1') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-6">
                    <input class="form-control digits" type="date" name="tgl_ph1" value="<?= set_value('tgl_ph1') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Desa Tempat Tinggal</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="tpt_ph1">
                      <option value="">-- Pilih Gampong --</option>
                      <?php foreach ($db as $q) { ?>
                        <option value="<?= $q->idG ?>"><?= $q->namaG ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Kecamatan Tempat Tinggal</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" value="Singkil" name="kc_ph1" readonly>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Pekerjaan</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="pk_ph1" value="<?= set_value('pk_ph1') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nomor HP</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="number" name="nmr_ph1" value="<?= set_value('nmr_ph1') ?>">
                  </div>
                </div>
                <hr />
                <h6>Data Pasangan Pihak Pertama</h6>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">NIK </label>
                  <div class="col-sm-6">
                    <input class="form-control" type="number" name="nik_ph1_ps1" value="<?= set_value('nik_ph1_ps1') ?>" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nama </label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="nama_ph1_ps1" value="<?= set_value('nama_ph1_ps1') ?>" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="tpl_ph1_ps1" value="<?= set_value('tpl_ph1_ps1') ?>" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-6">
                    <input class="form-control digits" type="date" name="tgl_ph1_ps1" value="<?= set_value('tgl_ph1_ps1') ?>" >
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Desa Tempat Tinggal</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="tpt_ph1_ps1">
                      <option value="">-- Pilih Gampong --</option>
                      <?php foreach ($db as $q) { ?>
                        <option value="<?= $q->idG ?>"><?= $q->namaG ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Kecamatan Tempat Tinggal</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" value="Singkil"  name="kc_ph1_ps1" readonly>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Pekerjaan</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="pk_ph1_ps1" value="<?= set_value('pk_ph1_ps1') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nomor HP</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="number" name="nmr_ph1_ps1" value="<?= set_value('nmr_ph1_ps1') ?>">
                  </div>
                </div>
                <hr />
                <h6>Data Pihak Kedua</h6>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">NIK </label>
                  <div class="col-sm-6">
                    <input class="form-control" type="number" name="nik_ph2" value="<?= set_value('nik_ph2') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nama </label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="nama_ph2" value="<?= set_value('nama_ph2') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Tempat Lahir</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="tpl_ph2" value="<?= set_value('tpl_ph2') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="date" name="tgl_ph2" value="<?= set_value('tgl_ph2') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Desa Tempat Tinggal</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="tpt_ph2" value="<?= set_value('tpt_ph2') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Kecamatan Tempat Tinggal</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="kc_ph2" value="<?= set_value('kc_ph2') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Pekerjaan</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="pk_ph2" value="<?= set_value('pk_ph2') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nomor HP</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="number" name="nmr_ph2" value="<?= set_value('nmr_ph2') ?>">
                  </div>
                </div>
                <hr />
                <h6>Rincian Data Tanah</h6>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Lebar Depan</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <input class="form-control" type="text" name="lbd_a" placeholder="130.34" value="<?= set_value('lbd_a') ?>">
                      <span class="input-group-text btn btn-white">Meter</span>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">Sebutan Bilangan</label>
                  <div class="col-sm-5">
                    <input class="form-control" type="text" name="lbd_s" placeholder="seratus tiga puluh koma tiga empat" value="<?= set_value('lbd_s') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Lebar Belakang</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <input class="form-control" type="text" name="lbb_a" placeholder="130.34" value="<?= set_value('lbb_a') ?>">
                      <span class="input-group-text btn btn-white" >Meter</span>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">Sebutan Bilangan</label>
                  <div class="col-sm-5">
                    <input class="form-control" type="text" name="lbb_s" placeholder="seratus tiga puluh koma tiga empat" value="<?= set_value('lbb_s') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Total Luas</label>
                  <div class="col-sm-2">
                    <div class="input-group">
                      <input class="form-control" type="text" name="lta_a" placeholder="130.34" value="<?= set_value('lta_a') ?>">
                      <span class="input-group-text btn btn-white" >M² </span>
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">Sebutan Bilangan</label>
                  <div class="col-sm-5">
                    <input class="form-control" type="text" name="lta_s" placeholder="seratus tiga puluh koma tiga empat" value="<?= set_value('lta_s') ?>">
                  </div>
                </div>
                <hr>
                <h6>Batasan Tanah</h6>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Batas Utara</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="bt_u" placeholder="berbatasan dengan . . . . . . . " value="<?= set_value('bt_u') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Batas Selatan</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="bt_s" placeholder="berbatasan dengan . . . . . . . " value="<?= set_value('bt_s') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Batas Timur</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="bt_t" placeholder="berbatasan dengan . . . . . . . " value="<?= set_value('bt_t') ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Batas Barat</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" name="bt_b" placeholder="berbatasan dengan . . . . . . . " value="<?= set_value('bt_b') ?>">
                  </div>
                </div>
                <hr />
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Harga Tanah</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-text btn btn-white">Rp.</span>
                      <input class="form-control" type="number" name="harga_tanah" value="<?= set_value('harga_tanah') ?>">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-end">
            <div class="col-sm-9 offset-sm-3">
              <button class="btn btn-primary" type="submit">Proses AJB</button>
              <input class="btn btn-light" type="reset" value="Reset Form">
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
