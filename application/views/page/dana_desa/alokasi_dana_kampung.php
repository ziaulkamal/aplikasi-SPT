<div class="page-body">
  <div class="container-fluid">
    <div class="page-header">

      <div class="row m-10">
        <?php if ($this->session->flashdata('msg')) {?>
            <div class="alert alert-success outline alert-dismissible fade show" role="alert">
              <p><?= $this->session->flashdata('msg') ?></p>
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div class="col-xl-4 xl-100 box-col-12">
          <div class="card">
            <div class="div">
              <div class="card-body">
                <div class="media-body m-5">
                  <h6 class="f-w-600">Fakta Integritas (ADK)</h6>
                  <p>nama, jabatan, nik, nomor hp, materai 10.000</p>
                </div>
                <a class="btn btn-primary btn-sm" href="<?= base_url('s/adk/_tambah/fi') ?>"><span class="fa fa-edit"></span> Mulai</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 xl-100 box-col-12">
          <div class="card">
            <div class="div">
              <div class="card-body">
                <div class="media-body m-5">
                  <h6 class="f-w-600">Surat Pengantar (ADK)</h6>
                  <p>nomor surat, tahapan DDS, tahun</p>
                </div>
                <a class="btn btn-primary btn-sm" href="<?= base_url('s/adk/_tambah/sp') ?>"><span class="fa fa-edit"></span> Mulai</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 xl-100 box-col-12">
          <div class="card">
            <div class="div">
              <div class="card-body">
                <div class="media-body m-5">
                  <h6 class="f-w-600">Surat Permohonan Pencairan (ADK)</h6>
                  <p>nomor, tahapan, tahun anggaran</p>
                </div>
                <a class="btn btn-primary btn-sm" href="<?= base_url('s/adk/_tambah/spp') ?>"><span class="fa fa-edit"></span> Mulai</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 xl-100 box-col-12">
          <div class="card">
            <div class="div">
              <div class="card-body">
                <div class="media-body m-5">
                  <h6 class="f-w-600">Surat Pernyataan Tanggung Jawab (ADK)</h6>
                  <p>nama, nik, jabatan, materai 10.000</p>
                </div>
                <a class="btn btn-primary btn-sm" href="<?= base_url('s/adk/_tambah/sptj') ?>"><span class="fa fa-edit"></span> Mulai</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 xl-100 box-col-12">
          <div class="card">
            <div class="div">
              <div class="card-body">
                <div class="media-body m-5">
                  <h6 class="f-w-600">Surat Pernyataan Verifikasi (ADK)</h6>
                  <p>nama sekretaris kampung, nama kaur keuangan, tahapan dds, tahun</p>
                </div>
                <a class="btn btn-primary btn-sm" href="<?= base_url('s/adk/_tambah/spv') ?>"><span class="fa fa-edit"></span> Mulai</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
