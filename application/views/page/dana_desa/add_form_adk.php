<?php if ($jenis == 'fi')   { ?>
  <div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row m-5 pb-10">
          <div class="card">
            <div class="card-header pb-0">
              <h5><?= $title . ' ' . $titles . '(ADK)'?></h5>
            </div>
            <?php
            if (validation_errors() || $this->session->flashdata()) {?>
              <div class="card-body">
                <?php
                echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');

                 ?>
              </div>
            <?php } ?>
            <div class="card-body">
              <form class="theme-form mega-form" id="myForm" method="POST" action="<?= base_url('s/adk/_process/') . $jenis ?>" enctype="multipart/form-data">
                <div class="mb-3 input-group">
                  <button class="input-group-text btn btn-primary" onclick="isiOtomatis()" type="button">Periksa NIK</button>
                  <input class="form-control" type="text" id="nik" name="nik" value="<?= $this->session->userdata('nik') ?>" maxlength="16" readonly>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label">Tahapan Penggunaan ADK</label>
                    <select class="form-control" name="tahapan_adk">
                      <option value="">-- Pilih Tahapan --</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>
                  <div class="col-sm-3 ">
                    <label class="col-form-label">Persentase Penggunaan *<code>(dalam persen)</code></label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase_guna" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label">Tahun Anggaran</label>
                    <input class="form-control" type="text" id="" name="tahun" value="<?= date('Y') ?>" readonly>
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label">Pajak dan Restribusi Daerah</label>
                    <select class="form-control" name="tahapan_pajak">
                      <option value="">-- Pilih Tahapan --</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>
                  <div class="col-sm-3 ">
                    <label class="col-form-label">Pesentase Pajak *<code>(dalam persen)</code></label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase_pajak" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nama Lengkap</label>
                  <input class="form-control" type="text" id="nama" name="nama" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Jabatan</label>
                  <input class="form-control" type="hidden" id="jabatanId" name="jabatan" readonly>
                  <input class="form-control" type="text" id="jabatan" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nomor HP</label>
                  <input class="form-control" type="text" id="hp" name="hp" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Kelurahan / Gampong</label>
                  <input class="form-control" type="hidden" id="gampongId" name="gampong" readonly>
                  <input class="form-control" type="text" id="gampong" readonly>
                </div>
                <div class="mb-3">
                  <input class="form-control" type="hidden" id="id" name="id" readonly>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
<?php if ($jenis == 'sp')   { ?>
  <div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row m-5 pb-10">
          <div class="card">
            <div class="card-header pb-0">
              <h5><?= $title . ' ' . $titles . ' (ADK)'?></h5>
            </div>
            <?php
            if (validation_errors() || $this->session->flashdata()) {?>
              <div class="card-body">
                <?php
                echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');

                 ?>
              </div>
            <?php } ?>
            <div class="card-body">
              <form class="theme-form mega-form" id="myForm" method="POST" action="<?= base_url('s/adk/_process/') . $jenis ?>" enctype="multipart/form-data">
                <div class="mb-3 input-group">
                  <button class="input-group-text btn btn-primary" onclick="isiOtomatis()" type="button">Periksa NIK</button>
                  <input class="form-control" type="text" id="nik" name="nik" value="<?= $this->session->userdata('nik') ?>" maxlength="16" readonly>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-4">
                    <label class="col-form-label">Tahapan Anggaran</label>
                    <select class="form-control" name="tahapan">
                      <option value="">-- Pilih Tahapan--</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>

                  <div class="col-sm-4 ">
                    <label class="col-form-label">Persentase Anggaran *<code>(dalam persen)</code></label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>

                </div>
                <div class="mb-3 row">
                  <div class="col-sm-4">
                    <label class="col-form-label">Nomor Surat</label>
                    <input class="form-control" type="number" id="" onkeypress="onlyNumberKey()" name="nomor" value="<?= set_value('nomor') ?>">
                  </div>
                  <div class="col-sm-4">
                    <label class="col-form-label">Tahun Anggaran</label>
                    <input class="form-control" type="text" id="" name="tahun" value="<?= date('Y') ?>" readonly>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nama Lengkap</label>
                  <input class="form-control" type="text" id="nama" name="nama" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Jabatan</label>
                  <input class="form-control" type="hidden" id="jabatanId" name="jabatan" readonly>
                  <input class="form-control" type="text" id="jabatan" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nomor HP</label>
                  <input class="form-control" type="text" id="hp" name="hp" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Kelurahan / Gampong</label>
                  <input class="form-control" type="hidden" id="gampongId" name="gampong" readonly>
                  <input class="form-control" type="text" id="gampong" readonly>
                </div>
                <div class="mb-3">
                  <input class="form-control" type="hidden" id="id" name="id" readonly>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
<?php if ($jenis == 'spp')  { ?>
  <div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row m-5 pb-10">
          <div class="card">
            <div class="card-header pb-0">
              <h5><?= $title . ' ' . $titles . ' (ADK)'?></h5>
            </div>
            <?php
            if (validation_errors() || $this->session->flashdata()) {?>
              <div class="card-body">
                <?php
                echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');

                 ?>
              </div>
            <?php } ?>
            <div class="card-body">
              <form class="theme-form mega-form" id="myForm" method="POST" action="<?= base_url('s/adk/_process/') . $jenis ?>" enctype="multipart/form-data">
                <div class="mb-3 input-group">
                  <button class="input-group-text btn btn-primary" onclick="isiOtomatis()" type="button">Periksa NIK</button>
                  <input class="form-control" type="text" id="nik" name="nik" value="<?= $this->session->userdata('nik') ?>" maxlength="16" readonly>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label">Tahapan Anggaran</label>
                    <select class="form-control" name="tahapan_adk">
                      <option value="">-- Pilih Tahapan--</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>
                  <div class="col-sm-3 ">
                    <label class="col-form-label">Persentase Anggaran *<code>(dalam persen)</code></label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase_guna" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>

                </div>
                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label">Pajak dan Restribusi Daerah</label>
                    <select class="form-control" name="tahapan_pajak">
                      <option value="">-- Pilih Tahapan--</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>
                  <div class="col-sm-3 ">
                    <label class="col-form-label">Pesentase Pajak *<code>(dalam persen)</code></label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase_pajak" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label">Nomor Surat</label>
                    <input class="form-control" type="number" id="" onkeypress="onlyNumberKey()" name="nomor" value="<?= set_value('nomor') ?>">
                  </div>
                  <div class="col-sm-3">
                    <label class="col-form-label">Tahun Anggaran</label>
                    <input class="form-control" type="text" id="" name="tahun" value="<?= date('Y') ?>" readonly>
                  </div>

                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nama Lengkap</label>
                  <input class="form-control" type="text" id="nama" name="nama" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Jabatan</label>
                  <input class="form-control" type="hidden" id="jabatanId" name="jabatan" readonly>
                  <input class="form-control" type="text" id="jabatan" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nomor HP</label>
                  <input class="form-control" type="text" id="hp" name="hp" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Kelurahan / Gampong</label>
                  <input class="form-control" type="hidden" id="gampongId" name="gampong" readonly>
                  <input class="form-control" type="text" id="gampong" readonly>
                </div>
                <div class="mb-3">
                  <input class="form-control" type="hidden" id="id" name="id" readonly>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
<?php if ($jenis == 'sptj') { ?>
  <div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row m-5 pb-10">
          <div class="card">
            <div class="card-header pb-0">
              <h5><?= $title . ' ' . $titles . ' (ADK)'?></h5>
            </div>
            <?php
            if (validation_errors() || $this->session->flashdata()) {?>
              <div class="card-body">
                <?php
                echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');

                 ?>
              </div>
            <?php } ?>
            <div class="card-body">
              <form class="theme-form mega-form" id="myForm" method="POST" action="<?= base_url('s/adk/_process/') . $jenis ?>" enctype="multipart/form-data">
                <div class="mb-3 input-group">
                  <button class="input-group-text btn btn-primary" onclick="isiOtomatis()" type="button">Periksa NIK</button>
                  <input class="form-control" type="text" id="nik" name="nik" value="<?= $this->session->userdata('nik') ?>" maxlength="16" readonly>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label">Tahapan Anggaran</label>
                    <select class="form-control" name="tahapan_adk">
                      <option value="">-- Pilih Tahapan--</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>
                  <div class="col-sm-3 ">
                    <label class="col-form-label">Persentase Anggaran *<code>(dalam persen)</code></label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase_guna" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>
                  <div class="col-sm-6 ">
                    <label class="col-form-label">Alokasi Anggaran *<span>(Rp)</span></label>
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp</span>
                      <input class="form-control" type="number" name="angka_anggaran" maxlength="3">
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-3">
                    <label class="col-form-label">Pajak dan Restribusi Daerah</label>
                    <select class="form-control" name="tahapan_pajak">
                      <option value="">-- Pilih Tahapan--</option>
                      <option value="1">I</option>
                      <option value="2">II</option>
                      <option value="3">III</option>
                      <option value="4">IV</option>
                      <option value="5">V</option>
                    </select>
                  </div>
                  <div class="col-sm-3 ">
                    <label class="col-form-label">Pesentase Pajak *<code>(dalam persen)</code></label>
                    <div class="input-group">
                      <input class="form-control" type="number" name="persentase_pajak" maxlength="3">
                      <span class="input-group-text btn btn-white" >%</span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-form-label">Alokasi Pajak *<span>(Rp)</span></label>
                    <div class="input-group">
                      <span class="input-group-text btn btn-white" >Rp</span>
                      <input class="form-control" type="number" name="angka_pajak" maxlength="3">
                    </div>
                  </div>

                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nama Lengkap</label>
                  <input class="form-control" type="text" id="nama" name="nama" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Jabatan</label>
                  <input class="form-control" type="hidden" id="jabatanId" name="jabatan" readonly>
                  <input class="form-control" type="text" id="jabatan" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nomor HP</label>
                  <input class="form-control" type="text" id="hp" name="hp" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Kelurahan / Gampong</label>
                  <input class="form-control" type="hidden" id="gampongId" name="gampong" readonly>
                  <input class="form-control" type="text" id="gampong" readonly>
                </div>
                <div class="mb-3">
                  <input class="form-control" type="hidden" id="id" name="id" readonly>
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
<?php if ($jenis == 'spv')  { ?>
  <div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row m-5 pb-10">
          <div class="card">
            <div class="card-header pb-0">
              <h5><?= $title . ' ' . $titles . ' (ADK)'?></h5>
            </div>
            <?php
            if (validation_errors() || $this->session->flashdata()) {?>
              <div class="card-body">
                <?php
                echo validation_errors('<div class="alert alert-danger dark alert-dismissible fade show" role="alert">',' <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button> </div>');

                 ?>
              </div>
            <?php } ?>
            <div class="card-body">
              <form class="theme-form mega-form" id="myForm" method="POST" action="<?= base_url('s/adk/_process/') . $jenis ?>" enctype="multipart/form-data">
                <div class="mb-3 input-group">
                  <button class="input-group-text btn btn-primary" onclick="isiOtomatis()" type="button">Periksa NIK</button>
                  <input class="form-control" type="text" id="nik" name="nik" value="<?= $this->session->userdata('nik') ?>" maxlength="16" readonly>
                </div>

                <div class="mb-3 row">
                  <div class="mb-3 row">
                    <div class="col-sm-6">
                      <label class="col-form-label">Tahapan Anggaran</label>
                      <select class="form-control" name="tahapan_anggaran">
                        <option value="">-- Pilih Tahapan--</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label class="col-form-label">Persentase Anggaran *<code>(dalam persen)</code></label>
                      <div class="input-group">
                        <input class="form-control" type="number" name="persentase_anggaran" maxlength="3">
                        <span class="input-group-text btn btn-white" >%</span>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <div class="col-sm-6">
                      <label class="col-form-label">Pajak dan Restribusi Daerah</label>
                      <select class="form-control" name="tahapan_pajak">
                        <option value="">-- Pilih Tahapan--</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                    <div class="col-sm-6 ">
                      <label class="col-form-label">Pesentase Pajak *<code>(dalam persen)</code></label>
                      <div class="input-group">
                        <input class="form-control" type="number" name="persentase_pajak" maxlength="3">
                        <span class="input-group-text btn btn-white" >%</span>
                      </div>
                    </div>
                  </div>
                  </div>
                  <hr />
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nilai Pengajuan ADK (Rp.)</label>
                  <div class="col-sm-6">
                    <div class="mb-3 input-group">
                      <input class="form-control" type="number" name="nilai_pengajuan">
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label class="col-sm-6 col-form-label">Nilai Pajak ADK (Rp.)</label>
                  <div class="col-sm-6">
                    <div class="mb-3 input-group">
                      <input class="form-control" type="number" name="nilai_pajak">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nama Lengkap</label>
                  <input class="form-control" type="text" id="nama" name="nama" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Jabatan</label>
                  <input class="form-control" type="hidden" id="jabatanId" name="jabatan" readonly>
                  <input class="form-control" type="text" id="jabatan" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Nomor HP</label>
                  <input class="form-control" type="text" id="hp" name="hp" readonly>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">Kelurahan / Gampong</label>
                  <input class="form-control" type="hidden" id="gampongId" name="gampong" readonly>
                  <input class="form-control" type="text" id="gampong" readonly>
                </div>
                <div class="mb-3">
                  <input class="form-control" type="hidden" id="id" name="id" readonly value="<?= $this->session->userdata('idP') ?>">
                  <button class="btn btn-primary" type="submit">Simpan</button>
                  <button class="btn btn-secondary" type="reset">Reset</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>


<script type="text/javascript">
function isiOtomatis() {
    const niks = $("#nik").val();
    let setNiks = document.querySelector('#nik').value;
    let urls = '<?= base_url('json/') ?>' + setNiks;
    $.get(urls, function(data){
      const obj = JSON.parse(data);
      $("#nama").val(obj.namaP);
      $("#jabatanId").val(obj.jabatanPid);
      $("#jabatan").val(obj.label);
      $("#hp").val(obj.nomorHpP);
      $("#gampongId").val(obj.gampongPid);
      $("#gampong").val(obj.namaG);
      $("#id").val(obj.idP);
    });
}
</script>
