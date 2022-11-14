<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5><?= $title; ?></h5>
            <span>Atur Petugas Desa atau Gampong</span>
          </div>
          <?php
          echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');
       ?>
       <ul class="list-group">
         <li class="list-group-item">Keuchik : <?php if ($db->idGeuchikG != NULL || $db->idGeuchikG !='') {
           echo '<strong>'.$this->crud->checkNamaPetugas($db->idGeuchikG)->namaP.'</strong>';
         } ?></li>
         <li class="list-group-item">Sekdes : <?php if ($db->idSekretarisG != NULL || $db->idSekretarisG != '') {
           echo '<strong>'.$this->crud->checkNamaPetugas($db->idSekretarisG)->namaP.'</strong>';
         } ?></li>
         <li class="list-group-item">Kaur : <?php if ($db->idKaurG != NULL || $db->idKaurG != '') {
           echo '<strong>'.$this->crud->checkNamaPetugas($db->idKaurG)->namaP.'</strong>';
         } ?></li>
       </ul>
            <div class="card-body">
              <?php if ($this->session->flashdata('msg')) {?>
                  <div class="alert alert-success outline alert-dismissible fade show" role="alert">
                    <p><?= $this->session->flashdata('msg') ?></p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php } ?>
              <form class="theme-form" method="POST" action="<?= base_url('gampong_pengaturan/_atur_proses') ?>" enctype="multipart/form-data">

                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Pilih Petugas</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="petugas">
                      <option value="">-- Pilih  --</option>
                      <?php foreach ($petugas as $p) {?>
                      <option value="<?= $p->idP ?>"><?= $p->namaP ?> - [ NIK: <?= $p->nikP ?> ]</option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-3 col-form-label">Pilih Jabatan </label>
                  <div class="col-sm-9">
                    <select class="form-control" name="jabatan">
                      <option value="">-- Pilih  --</option>
                      <?php foreach ($jabatan as $j) {?>
                      <option value="<?= $j->idJ ?>"><?= $j->label ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="card-footer">
                  <a class="btn btn-outline-secondary" href="<?= base_url('gampong_pengaturan') ?>">Kembali</a>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                </div>

              </form>
            </div>


        </div>
      </div>
    </div>
  </div>
</div>
