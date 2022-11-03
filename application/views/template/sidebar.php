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
          <li class="dropdown"><a class="nav-link menu-title" href="javascript:void(0)"><i data-feather="server"></i><span>DDS / ADK</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="<?= base_url('s/dana_desa/') ?>">Buat Surat</a></li>
              <li><a href="<?= base_url('dana_desa/dds') ?>">Daftar Surat</a></li>
              <li><a href="<?= base_url('upload_dokumen') ?>">Unggah Dokumen</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'bansos') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="box"></i><span>Bantuan Sosial</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="#">Buat Surat</a></li>
              <li><a href="#">Daftar Surat</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'ajb') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="archive"></i><span>Akta Jual Beli</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="#">Pembuatan Surat Baru</a></li>
              <li><a href="#">Daftar Surat Selesai</a></li>
              <li><a href="#">Verifikasi Dokumen</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'penduduk') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="users"></i><span>Penduduk</span></a>
            <ul class="nav-submenu menu-content" style="display: none;">
              <li><a href="<?= base_url('penduduk/_tambah') ?>">Daftar Penduduk</a></li>
              <li><a href="<?= base_url('penduduk/lokal') ?>">Data Penduduk Lokal</a></li>
              <li><a href="<?= base_url('penduduk/luar') ?>">Data Penduduk Luar</a></li>
              <li><a href="#">Layanan Yang Digunakan</a></li>
              <!-- <li><a href="#">Verifikasi Dokumen</a></li> -->
            </ul>
          </li>
          <li class="sidebar-main-title"> <div> <h6>Extra</h6> </div> </li>
          <li class="dropdown"><a class="nav-link menu-title <?php if ($this->uri->segment(1) == 'admin' || $this->uri->segment(1) == 'pengaturanGampong') { echo 'active'; } ?>" href="javascript:void(0)"><i data-feather="layout"></i><span>Pengaturan</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="<?= base_url('admin/user/pending') ?>">Akun Pending</a></li>
              <li><a href="<?= base_url('admin/user/aktif') ?>">Akun Terdaftar</a></li>
              <li><a href="<?= base_url('admin/level') ?>">Atur Penggunaan Akun</a></li>
              <!-- <li><a href="#">Verifikasi Dokumen</a></li> -->
              <li><a href="<?= base_url('jabatan/_tambah') ?>">Tambah Jabatan</a></li>
              <li><a href="<?= base_url('pengaturanGampong/').$this->session->userdata('gampong') ?>">Pengaturan Gampong</a></li>
            </ul>
          </li>


      </ul>
    </div>
    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
  </div>
</nav>
