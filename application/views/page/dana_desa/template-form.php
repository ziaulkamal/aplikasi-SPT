<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row m-5 pb-10">
        <?php if ($set == 'spv') {?>
        <div class="col-sm-6">
        <?php }else { ?>
        <div class="col-sm-8">
        <?php } ?>
          <div class="card">
            <div class="card-header pb-0">
              <h5><?= $title?></h5>
              <?php if ($this->uri->segment(1) == 'dana_desa') { ?>
                <span>Lampiran Dokumen Kebutuhan Untuk Dana Desa</span>
              <?php } ?>
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
              <form class="theme-form mega-form" id="myForm" method="POST" action="<?= base_url('dana_desa/_process/') . $set ?>" enctype="multipart/form-data">
                <!-- <label class="col-form-label">NIK</label> -->
                <?php
                if ($set != 'spv') {?>
                  <div class="mb-3 input-group">
                    <button class="input-group-text btn btn-primary" onclick="isiOtomatis()" type="button">Periksa NIK</button>
                    <input class="form-control" type="text" id="nik" name="nik" maxlength="16">
                  </div>
                <?php }

                if ($set == 'fi') { ?>
                  <div class="mb-3 row">
                    <div class="col-sm-3">
                      <label class="col-form-label">Tahapan Anggaran</label>
                      <select class="form-control" name="tahapan">
                        <option value="">-- Pilih --</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label class="col-form-label">Sumber Anggaran</label>
                      <select class="form-control" name="anggaran">
                        <option value="">-- Pilih --</option>
                        <option value="APBN">APBN</option>
                        <option value="APBA">APBA</option>
                      </select>
                    </div>
                    <div class="col-sm-3 ">
                      <label class="col-form-label">Angka *<span>(dalam persen)</span></label>
                      <div class="input-group">
                        <input class="form-control" type="number" name="persentase" maxlength="3">
                        <span class="input-group-text btn btn-white" >%</span>
                      </div>
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
                <?php }
                elseif ($set == 'sp') {?>
                  <div class="mb-3 row">
                    <div class="col-sm-4">
                      <label class="col-form-label">Tahapan Anggaran</label>
                      <select class="form-control" name="tahapan">
                        <option value="">-- Pilih --</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label class="col-form-label">Sumber Anggaran</label>
                      <select class="form-control" name="anggaran">
                        <option value="">-- Pilih --</option>
                        <option value="APBN">APBN</option>
                        <option value="APBA">APBA</option>
                      </select>
                    </div>
                    <div class="col-sm-4 ">
                      <label class="col-form-label">Angka *<span>(dalam persen)</span></label>
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
                      <label class="col-form-label">Bulan</label>
                      <select class="form-control" name="bulan">
                        <option value="">-- Pilih --</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
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
                <?php }
                elseif ($set == 'spp') {?>
                  <div class="mb-3 row">
                    <div class="col-sm-4">
                      <label class="col-form-label">Tahapan Anggaran</label>
                      <select class="form-control" name="tahapan">
                        <option value="">-- Pilih --</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label class="col-form-label">Sumber Anggaran</label>
                      <select class="form-control" name="anggaran">
                        <option value="">-- Pilih --</option>
                        <option value="APBN">APBN</option>
                        <option value="APBA">APBA</option>
                      </select>
                    </div>
                    <div class="col-sm-4 ">
                      <label class="col-form-label">Angka *<span>(dalam persen)</span></label>
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
                      <label class="col-form-label">Bulan</label>
                      <select class="form-control" name="bulan">
                        <option value="">-- Pilih --</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
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
                <?php }
                elseif ($set == 'spp') {?>
                  <div class="mb-3 row">
                    <div class="col-sm-4">
                      <label class="col-form-label">Tahapan Anggaran</label>
                      <select class="form-control" name="tahapan">
                        <option value="">-- Pilih --</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label class="col-form-label">Sumber Anggaran</label>
                      <select class="form-control" name="anggaran">
                        <option value="">-- Pilih --</option>
                        <option value="APBN">APBN</option>
                        <option value="APBA">APBA</option>
                      </select>
                    </div>
                    <div class="col-sm-4 ">
                      <label class="col-form-label">Angka *<span>(dalam persen)</span></label>
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
                      <label class="col-form-label">Bulan</label>
                      <select class="form-control" name="bulan">
                        <option value="">-- Pilih --</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
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
                <?php }
                elseif ($set == 'sptj') {?>
                  <div class="mb-3 row">
                    <div class="col-sm-3">
                      <label class="col-form-label">Tahapan Anggaran</label>
                      <select class="form-control" name="tahapan">
                        <option value="">-- Pilih --</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label class="col-form-label">Sumber Anggaran</label>
                      <select class="form-control" name="anggaran">
                        <option value="">-- Pilih --</option>
                        <option value="APBN">APBN</option>
                        <option value="APBA">APBA</option>
                      </select>
                    </div>
                    <div class="col-sm-3 ">
                      <label class="col-form-label">Angka *<span>(dalam persen)</span></label>
                      <div class="input-group">
                        <input class="form-control" type="number" name="persentase" maxlength="3">
                        <span class="input-group-text btn btn-white" >%</span>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <label class="col-form-label">Tahun Anggaran</label>
                      <input class="form-control" type="text" id="" name="tahun" value="<?= date('Y') ?>" readonly>
                    </div>
                    <div class="col-sm-12 ">
                      <label class="col-form-label">Penggunaan Dana Desa</label>
                      <div class="input-group">
                        <button class="input-group-text btn btn-white" >Rp.</button>
                        <input class="form-control" type="number" name="penggunaan_dana" >
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
                <?php }
                elseif ($set == 'spv') {?>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Penyerapan Dana Desa Sebelumnya</label>
                    <div class="col-sm-6">
                      <select class="form-control" name="tahapan_sebelumnya">
                        <option value="">-- Pilih Tahapan Sebelumnya --</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Tahun Anggaran Sebelumnya</label>
                    <div class="col-sm-6">
                      <div class="mb-3 input-group">
                        <input class="form-control" type="number" name="tahun_sebelumnya" maxlength="4">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Capaian Output Sebelumnya</label>
                    <div class="col-sm-6">
                      <div class="mb-3 input-group">
                        <input class="form-control" type="number" name="persentase_sebelumnya" maxlength="2">
                        <span class="input-group-text btn btn-white" >%</span>
                      </div>
                    </div>
                  </div>

                  <hr />
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Tahapan Pengajuan Sekarang</label>
                    <div class="col-sm-6">
                      <select class="form-control" name="tahapan">
                        <option value="">-- Pilih Tahapan Sekarang --</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                        <option value="4">IV</option>
                        <option value="5">V</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Tahun Pengajuan Sekarang</label>
                    <div class="col-sm-6">
                      <div class="mb-3 input-group">
                        <input class="form-control" type="number"name="tahun" value="<?= date('Y') ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label class="col-sm-6 col-form-label">Persentase Pengajuan Sekarang</label>
                    <div class="col-sm-6">
                      <div class="mb-3 input-group">
                        <input class="form-control" type="number" name="persentase" maxlength="2">
                        <span class="input-group-text btn btn-white" >%</span>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <input class="form-control" type="hidden" id="id" name="id" readonly value="<?= $this->session->userdata('idP') ?>">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                <?php }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
