<nav>
  <div class="main-navbar">
    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
    <div id="mainnav">
      <ul class="nav-menu custom-scrollbar">
        <li class="back-btn">
          <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
        </li>

          <li class="sidebar-main-title"> <div> <h6>Fitur</h6> </div> </li>
          <li><a class="nav-link menu-title <?php if ($this->uri->segment(1) == '') { echo 'active'; } ?>" href="<?= base_url() ?>"><i data-feather="home"></i><span>Beranda</span></a> </li>
          <?php if ($this->session->userdata('idP') != '' || $this->session->userdata('idP') != null) { ?>
            <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="server"></i><span>DDS / ADK</span></a>
              <ul class="nav-submenu menu-content">

                <li><a href="<?= base_url('s/dana_desa/') ?>">Buat Surat</a></li>
                <li><a href="<?= base_url('dana_desa/dds') ?>">Daftar Surat</a></li>
                <!-- <li><a href="<?= base_url('upload_dokumen') ?>">Unggah Dokumen</a></li> -->
              </ul>
            </li>
            <li class="sidebar-main-title"> <div> <h6>Extra</h6> </div> </li>
            <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'gampong_pengaturan') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="layout"></i><span>Pengaturan</span></a>
              <ul class="nav-submenu menu-content">
                <li><a href="<?= base_url('gampong_pengaturan') ?>">Konfigurasi</a></li>

              </ul>
            </li>
          <?php } ?>
          <!-- <li class="dropdown"><a class="nav-link menu-title" href="<?= base_url('berkas_masuk') ?>"><i data-feather="server"></i><span>Daftar Berkas Masuk</span></a></li> -->
          <?php if ($this->session->userdata('isAdmin') == TRUE) { ?>
            <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'surat_kecamatan') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="briefcase"></i><span>Buat Surat DDS / ADK</span></a>
              <ul class="nav-submenu menu-content">
                <li><a href="<?= base_url('surat_kecamatan') ?>">Daftar Surat</a></li>
                <li><a href="<?= base_url('surat_kecamatan/sp/adk') ?>">Surat Pengantar (ADK)</a></li>
                <li><a href="<?= base_url('surat_kecamatan/sr/adk') ?>">Surat Rekomendasi (ADK)</a></li>
                <li><a href="<?= base_url('surat_kecamatan/spv/adk') ?>">Surat Pernyataan Verifikasi (ADK)</a></li>
                <li><a href="<?= base_url('surat_kecamatan/sp/dds') ?>">Surat Pengantar (DDS)</a></li>
                <li><a href="<?= base_url('surat_kecamatan/sr/dds') ?>">Surat Rekomendasi (DDS)</a></li>
                <li><a href="<?= base_url('surat_kecamatan/spv/dds') ?>">Surat Pernyataan Verifikasi (DDS)</a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'ajb') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="briefcase"></i><span>Akta Jual Beli</span></a>
              <ul class="nav-submenu menu-content">
                <li><a href="<?= base_url('ajb/_buat_ajb') ?>">Buat AJB Baru</a></li>
                <li><a href="<?= base_url('ajb') ?>">Daftar Surat Selesai</a></li>
                <!-- <li><a href="#">Verifikasi Dokumen</a></li> -->
              </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'rekomendasi_bantuan') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="briefcase"></i><span>Rekomendasi Bantuan</span></a>
              <ul class="nav-submenu menu-content">
                <li><a href="<?= base_url('rekomendasi_bantuan/_buat') ?>">Buat Surat</a></li>
                <li><a href="<?= base_url('rekomendasi_bantuan') ?>">Daftar Surat Selesai</a></li>
                <!-- <li><a href="#">Verifikasi Dokumen</a></li> -->
              </ul>
            </li>
          <?php } ?>
          <?php if ($this->session->userdata('dataLengkap') == TRUE) { ?>
            <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'penduduk') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="users"></i><span>Penduduk</span></a>
              <ul class="nav-submenu menu-content" style="display: none;">
                <li><a href="<?= base_url('penduduk/_tambah') ?>">Daftar Penduduk</a></li>
                <li><a href="<?= base_url('penduduk/lokal') ?>">Data Penduduk Lokal</a></li>
                <li><a href="<?= base_url('penduduk/luar') ?>">Data Penduduk Luar</a></li>
                <!-- <li><a href="#">Layanan Yang Digunakan</a></li> -->
                <!-- <li><a href="#">Verifikasi Dokumen</a></li> -->
              </ul>
            </li>
          <?php } ?>

          <?php if ($this->session->userdata('isAdmin') == TRUE) { ?>

            <li class="sidebar-main-title"> <div> <h6>Extra</h6> </div> </li>
            <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'pengaturan_kecamatan') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="layout"></i><span>Pengaturan Kecamatan</span></a>
              <ul class="nav-submenu menu-content">
                <li><a href="<?= base_url('pengaturan_kecamatan') ?>">Konfigurasi</a></li>
                <li><a href="<?= base_url('atur_petugas_baru') ?>">Buat Admin Baru</a></li>
              </ul>
            </li>
            <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'pengaturan_gampong') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="layout"></i><span>Pengaturan Gampong</span></a>
              <ul class="nav-submenu menu-content">
                <li><a href="<?= base_url('pengaturan_gampong/pending') ?>">Permintaan Akun</a></li>
                <li><a href="<?= base_url('pengaturan_gampong/aktif') ?>">Akun Terdata</a></li>
              </ul>
            </li>
          <?php } ?>


      </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
  </div>
</nav>
