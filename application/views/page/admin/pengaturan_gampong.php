<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row">

      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header">
            <h5><?= $title;  ?></h5>
            <span>Bagian Ini Untuk Melakukan Konfigurasi Atas Kepemilikan Penggunaan Jabatan Perangkat Desa.</span>
          </div>
          <?php
          if ($this->session->flashdata('msg')) { ?>
            <div class="card-body">
            <div class="alert alert-success outline alert-dismissible fade show" role="alert">
              <p><?= $this->session->flashdata('msg') ?></p>
              
            </div>
          </div>
          <?php }
          echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>'); ?>
          <div class="card-body">
            <ul class="list-group mb-5">
              <li class="list-group-item">Nomor Rekening Desa : <?= $db->rekeningG ?> </li>
                <li class="list-group-item">Kepala Desa / Geuchik : <b><?php if ($geuchik->num_rows() > 0 ) {
                echo $geuchik->row()->namaPenduduk;
                }else {
                  echo "Kosong";
                }?></b></li>
                <li class="list-group-item">Kaur Desa : <b><?php if ($kaur->num_rows() > 0 ) {
                  echo $kaur->row()->namaPenduduk;
                  // code...
                }else {
                  echo "Kosong";
                }?></b></li>
                <li class="list-group-item">Sekretaris Desa : <b><?php if ($sekdes->num_rows() > 0 ) {
                  echo $sekdes->row()->namaPenduduk;
                  // code...
                }else {
                  echo "Kosong";
                }?></b></li>

              </ul>
            <div class="row">
              <form method="POST" enctype="multipart/form-data" action="<?= base_url('prosesGampongSetting/').$this->session->userdata('gampong') ?>">
                <div class="row g-2">
                  <div class="col-md-6">
                    <label class="form-label">Posisi Jabatan</label>
                    <select class="js-example-disabled-results col-sm-12" name="jabatan" type="text">
                      <option value="" selected>-- Pilih --</option>
                      <?php foreach ($jabatan as $j) {
                        if ($j->kodeJabatan == 'G') { ?>
                          <option value="<?= $j->idJ; ?>"><?= $j->label; ?></option>
                      <?php }
                       } ?>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Nama Pemilik Jabatan</label>
                    <select class="js-example-disabled-results col-sm-12" name="penduduk" type="text">
                      <option value="" selected>-- Pilih --</option>
                      <?php foreach ($penduduk as $p) { ?>
                        <option value="<?= $p->idP; ?>"><?= $p->namaP. ' - ( NIK: '.$p->nikP.' )'; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <br>
                <div class="row g-2">
                    <div class="col-md-6">
                      <label class="form-label">Nomor Rekening Desa</label>
                      <input class="form-control" type="number" name="norek" maxlength="17" minlength="7">
                    </div>
                    <div class="col-md-6">
                      <label class="form-label">Jenis Bank</label>
                      <select class="js-example-disabled-results col-sm-12" name="jenis_bank" type="text">
                        <option value="" selected>-- Pilih --</option>
                        <option value="bankaceh">Bank Aceh</option>
                        <option value="bsi">Bank BSI</option>
                      </select>
                    </div>
                  </div>
                  <br />
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
