<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_crud','crud');
    $this->load->library('form_validation');
    if ($this->session->userdata('userLogin') == FALSE || $this->session->userdata('level') > 3) {
      // $this->clear_cache();
      $this->session->sess_destroy();
      $this->session->set_flashdata('nologin', 'Anda harus login terlebih dahulu agar bisa mengakses aplikasi ini !');
      redirect(base_url('sign_in'));
    }
  }

  function penduduk_list()
  {
    $data = array(
      'title' => 'Daftar Penduduk',
      'opt'   => 'table',
      'page'  => 'page/penduduk/index',
      'db'    => ''
    );

    $this->load->view('main', $data);
  }

  function penduduk_reg($set)
  {
    $get_gampong = $this->crud->get_gampong_all_lokal()->result();
    $count_gampong = $this->crud->get_gampong_all()->num_rows();
    $data = array(
      'title' => 'Tambah Penduduk',
      'opt'   => 'form',
      'page'  => 'page/penduduk/add_penduduk',
      'set'   => $set,
      'db'    => $get_gampong,
      'count' => $count_gampong
    );
    $this->load->view('main', $data);
  }

  function penduduk_select()
  {
    $data = array(
      'title' => 'Tambah Penduduk',
      'opt'   => 'form',
      'page'  => 'page/penduduk/add_penduduk',
    );
    $this->load->view('main', $data);
  }

  function penduduk_sub()
  {
    $date = date('Y-m-d');
    $typeSet = $this->input->post('tipe');
    $this->_rules_penduduk();

    if ($this->form_validation->run() == FALSE) {
      $this->penduduk_reg($typeSet);
    }else {
      if ($typeSet == 'lokal') {
        $_alamatPid = 'LO'.time();
        $_gampongPid = $this->input->post('gampong',TRUE);
      }elseif ($typeSet == 'luar') {
        $_alamatPid = 'LU'.time();
        $_gampongPid = $this->input->post('last') + 1;
      }else {
        $this->penduduk_reg($typeSet);
      }

      $_penduduk = array(
        'isUsr'         => 0,
        'alamatPid'     => $_alamatPid,
        'gampongPid'    => $_gampongPid,
        'namaP'         => $this->input->post('nama_lengkap',TRUE),
        'nikP'          => $this->input->post('nik',TRUE),
        'jenisKelaminP' => $this->input->post('jenisKelamin',TRUE),
        'jabatanPid'    => 0,
        'nomorHpP'      => $this->input->post('hp',TRUE),
        'createdAt'     => $date,
      );

      $stepFirst = $this->crud->save_penduduk($_penduduk);

      if ($stepFirst != null) {
        if ($typeSet == 'lokal') {
          $_alamat = array(
            'idA'       => $_alamatPid,
            'labelA'    => 'lokal kecamatan singkil',
            'alamatA'   => $this->input->post('alamat'),
            'createdAt' => $date,
          );
          $this->crud->save_alamat($_alamat);

        }elseif ($typeSet == 'luar') {
          $_alamat = array(
            'idA'       => $_alamatPid,
            'labelA'    => 'luar kecamatan singkil',
            'alamatA'   => $this->input->post('alamat'),
            'createdAt' => $date,
          );
          $this->crud->save_alamat($_alamat);

          $_gampong = array(
            'idG' => $_gampongPid,
            'namaG' => $this->input->post('gampong'),
            'createdAt' => $date,
            'statusG' => 1,
            'isLokal' => 1,
          );

          $this->crud->save_gampong($_gampong);
        }
      }

      $this->session->set_flashdata('msg', 'Sukses !');
      redirect('penduduk/_tambah');

    }


  }

  function penduduk_reg_select($set)
  {
    $data = array(
      'title'   => 'Data Penduduk',
      'opt'     => 'table',
      'page'    => 'page/penduduk/data_penduduk',
    );

    if ($set == 'lokal') {
      $data['db']       = $this->crud->get_penduduk_lokal()->result();
      $data['part']     = $set;
      $data['title2']   = 'Lokal Kecamatan Singkil';
      $this->load->view('main', $data);

    }elseif ($set == 'luar') {
      $data['db']       = $this->crud->get_penduduk_luar()->result();
      $data['part']     = $set;
      $data['title2']   = 'Luar Kecamatan Singkil';
      $this->load->view('main', $data);

    }else {
      redirect('/404');
    }
  }

  function penduduk_det()
  {
    $data = array(
      'title' => 'Daftar Penduduk',
      'opt'   => 'table',
      'page'  => 'page/penduduk/index',
      'db'    => ''
    );

    $this->load->view('main', $data);
  }

  function penduduk_upd($value='')
  {
    // code...
  }

  function penduduk_del($value='')
  {
    // code...
  }


  function pilih_jenis()
  {
    $data = array(
      'title' => 'Dana Desa',
      'opt'   => 'form',
      'page'  => 'page/dana_desa/select_fitur',
    );
    $this->load->view('main', $data);
  }

// HACK: Ini Bagian ADK
  function adk_select()
  {
    $data = array(
      'title' => 'Dana Desa',
      'opt'   => 'form',
      'page'  => 'page/dana_desa/alokasi_dana_kampung',
    );
    $this->load->view('main', $data);
  }

  function form_adk($page)
  {
    switch ($page) {
      case 'fi':
        $titles = "Fakta Integritas";
        break;

      case 'sp':
        $titles = "Pernyataan";
        break;

      case 'spp':
        $titles = "Permohonan Pencairan";
        break;

      case 'sptj':
        $titles = "Pertanggung Jawaban";
        break;

      case 'spv':
        $titles = "Pernyataan Verifikasi";
        break;
    }
    $data = array(
      'title'     => 'Buat Surat',
      'titles'    => $titles,
      'opt'       => 'form',
      'jenis'     => $page,
      'page'      => 'page/dana_desa/add_form_adk',
    );
    $this->load->view('main', $data);

  }

  function proses_adk($page)
  {
    $date = date('Y-m-d');
    switch ($this->input->post('bulan')) {
      case '1':
        $bulan = "Januari";
        break;
      case '2':
        $bulan = "Februari";
        break;
      case '3':
        $bulan = "Maret";
        break;
      case '4':
        $bulan = "April";
        break;
      case '5':
        $bulan = "Mei";
        break;
      case '6':
        $bulan = "Juni";
        break;
      case '7':
        $bulan = "Juli";
        break;
      case '8':
        $bulan = "Agustus";
        break;
      case '9':
        $bulan = "September";
        break;
      case '10':
        $bulan = "Oktober";
        break;
      case '11':
        $bulan = "November";
        break;
      case '12':
        $bulan = "Desember";
        break;
    }

    if ($page == 'fi') {
      $this->_rules_fitur($page, 'adk');
      if ($this->form_validation->run() == FALSE) {
        $this->form_adk($page);
      }else {
        $data = array(
          'jenisAdk'           => 'FI',
          'tahapanAdk'        => $this->input->post('tahapan_adk', TRUE),
          'persentaseAdk'     => $this->input->post('persentase_guna', TRUE),
          'pajakTahapanAdk'   => $this->input->post('tahapan_pajak', TRUE),
          'jabatanAid'        => $this->input->post('jabatan', TRUE),
          'pendudukAid'       => $this->input->post('id', TRUE),
          'persentasePajakAdk'=> $this->input->post('persentase_pajak', TRUE),
          'tahunAdk'          => $this->input->post('tahun', TRUE),
          'createdAtDk'       => $date,
          'userAdkid'         => $this->session->userdata('id'),
          'statusAdk'         => 0,
          'gampongAdkid'      => $this->session->userdata('gampong')
        );

        $this->crud->save_adk($data);
        $this->session->set_flashdata('msg', "Berhasil membuat surat");
        redirect('s/dana_desa/_tambah/adk');
      }


    }

    if ($page == 'sp') {
      $this->_rules_fitur($page, 'adk');
      if ($this->form_validation->run() == FALSE) {
        $this->form_adk($page);
      }else {
        $data = array(

          // idAdk	nomorAdk	jenisAdk	tahapanAdk	persentaseAdk	pajakTahapanAdk	persentasePajakAdk	pendudukAid	jabatanAid	angkaAnggaranAdk	tahunAdk	bulanAdk	createdAtDk	fileA	userAdkid	statusAdk	gampongAdkid

          'jenisAdk'          => 'SP',
          'nomorAdk'          => $this->input->post('nomor', TRUE),
          'tahapanAdk'        => $this->input->post('tahapan', TRUE),
          'persentaseAdk'     => $this->input->post('persentase', TRUE),
          'pendudukAid'       => $this->input->post('id', TRUE),
          'jabatanAid'        => $this->input->post('jabatan', TRUE),
          'tahunAdk'          => $this->input->post('tahun', TRUE),
          'createdAtDk'       => $date,
          'userAdkid'         => $this->session->userdata('id'),
          'statusAdk'         => 0,
          'gampongAdkid'      => $this->session->userdata('gampong')
        );

        $this->crud->save_adk($data);
        $this->session->set_flashdata('msg', "Berhasil membuat surat");
        redirect('s/dana_desa/_tambah/adk');
      }


    }

    if ($page == 'spp') {
      $this->_rules_fitur($page, 'adk');
      if ($this->form_validation->run() == FALSE) {
        $this->form_adk($page);
      }else {
        $data = array(
          'jenisAdk'         => 'SPP',
          'nomorAdk'         => $this->input->post('nomor', TRUE),
          'tahapanAdk'       => $this->input->post('tahapan_adk', TRUE),
          'persentaseAdk'    => $this->input->post('persentase_guna', TRUE),
          'pajakTahapanAdk'       => $this->input->post('tahapan_pajak', TRUE),
          'persentasePajakAdk'    => $this->input->post('persentase_pajak', TRUE),
          // 'bulanAdk'         => $this->input->post('bulan', TRUE),
          'pendudukAid'      => $this->input->post('id', TRUE),
          'jabatanAid'       => $this->input->post('jabatan', TRUE),
          'tahunAdk'         => $this->input->post('tahun', TRUE),
          'createdAtDk'      => $date,
          'userAdkid'        => $this->session->userdata('id'),
          'statusAdk'        => 0,
          'gampongAdkid'     => $this->session->userdata('gampong')
        );

        $this->crud->save_adk($data);
        $this->session->set_flashdata('msg', "Berhasil membuat surat");
        redirect('s/dana_desa/_tambah/adk');
      }


    }

    if ($page == 'sptj') {
      $this->_rules_fitur($page, 'adk');
      if ($this->form_validation->run() == FALSE) {
        $this->form_adk($page);
      }else {
        $data = array(
          'jenisAdk'              => 'SPTJ',
          'tahapanAdk'       => $this->input->post('tahapan_adk', TRUE),
          'persentaseAdk'    => $this->input->post('persentase_guna', TRUE),
          'pajakTahapanAdk'       => $this->input->post('tahapan_pajak', TRUE),
          'persentasePajakAdk'    => $this->input->post('persentase_pajak', TRUE),
          'angkaAnggaranAdk'         => $this->input->post('angka_anggaran', TRUE),
          'angkaPajakAdk'         => $this->input->post('angka_pajak', TRUE),
          'pendudukAid'      => $this->input->post('id', TRUE),
          'jabatanAid'       => $this->input->post('jabatan', TRUE),
          'tahunAdk'         => date('Y'),
          'createdAtDk'      => $date,
          'userAdkid'        => $this->session->userdata('id'),
          'statusAdk'        => 0,
          'gampongAdkid'     => $this->session->userdata('gampong')
        );

        $this->crud->save_adk($data);
        $this->session->set_flashdata('msg', "Berhasil membuat surat");
        redirect('s/dana_desa/_tambah/adk');
      }


    }

    if ($page == 'spv') {
      $this->_rules_fitur($page, 'adk');
      if ($this->form_validation->run() == FALSE) {
        $this->form_adk($page);
      }else {
        $data = array(
          'jenisAdk'              => 'SPV',
          'tahapanAdk'            => $this->input->post('tahapan_anggaran', TRUE),
          'persentaseAdk'         => $this->input->post('persentase_anggaran', TRUE),
          'pajakTahapanAdk'       => $this->input->post('tahapan_pajak', TRUE),
          'persentasePajakAdk'    => $this->input->post('persentase_pajak', TRUE),
          'angkaAnggaranAdk'      => $this->input->post('nilai_pengajuan', TRUE),
          'angkaPajakAdk'         => $this->input->post('nilai_pajak', TRUE),
          'tahunAdk'              => date('Y'),
          'createdAtDk'           => $date,
          'pendudukAid'           => $this->input->post('id', TRUE),
          'jabatanAid'            => $this->input->post('jabatan', TRUE),
          'userAdkid'             => $this->session->userdata('id'),
          'statusAdk'             => 0,
          'gampongAdkid'          => $this->session->userdata('gampong')
        );

        $this->crud->save_adk($data);
        $this->session->set_flashdata('msg', "Berhasil membuat surat");
        redirect('s/dana_desa/_tambah/adk');
      }


    }
  }
// HACK: Scope ADK

  // HACK: Scope DDS
  function dds_select()
  {
    $data = array(
      'title' => 'Dana Desa',
      'opt'   => 'form',
      'page'  => 'page/dana_desa/data_dana_desa',
    );
    $this->load->view('main', $data);
  }

  function form_dds($page)
  {
    switch ($page) {
      case 'fi':
        $titles = "Fakta Integritas";
        break;

      case 'sp':
        $titles = "Pengantar";
        break;

      case 'spp':
        $titles = "Permohonan Pencairan";
        break;

      case 'sptj':
        $titles = "Pertanggung Jawaban";
        break;

      case 'spv':
        $titles = "Pernyataan Verifikasi";
        break;
    }

    $data = array(
      'title'     => 'Buat Surat',
      'titles'    => $titles,
      'opt'       => 'form',
      'jenis'     => $page,
      'page'      => 'page/dana_desa/add_form_dds',
    );
    $this->load->view('main', $data);
  }

  function proses_dds($page)
  {
    $date = date('Y-m-d');
    switch ($this->input->post('bulan')) {
      case '1':
        $bulan = "Januari";
        break;
      case '2':
        $bulan = "Februari";
        break;
      case '3':
        $bulan = "Maret";
        break;
      case '4':
        $bulan = "April";
        break;
      case '5':
        $bulan = "Mei";
        break;
      case '6':
        $bulan = "Juni";
        break;
      case '7':
        $bulan = "Juli";
        break;
      case '8':
        $bulan = "Agustus";
        break;
      case '9':
        $bulan = "September";
        break;
      case '10':
        $bulan = "Oktober";
        break;
      case '11':
        $bulan = "November";
        break;
      case '12':
        $bulan = "Desember";
        break;
    }

    if ($page == 'fi') {
      $this->_rules_fitur($page, 'dds');
      if ($this->form_validation->run() == FALSE) {
        $this->form_dds($page);
      }else {
        $data = array(
          'jenisDd'       => 'FI',
          'gelombangDd'   => $this->input->post('tahapan', TRUE),
          'pendudukDdid'  => $this->input->post('id', TRUE),
          'persentase'    => $this->input->post('persentase', TRUE),
          'jabatanDdid'   => $this->input->post('jabatan', TRUE),
          'sumberDd'      => $this->input->post('anggaran', TRUE),
          'tahunDd'       => $this->input->post('tahun', TRUE),
          'createdAtDD'     => $date,
          'userDdid'      => $this->session->userdata('id'),
          'statusDd'      => 0,
          'gampongDid'    => $this->session->userdata('gampong')
        );

      $this->crud->save_dds($data);
      $this->session->set_flashdata('msg', 'Berhasil Membuat Surat !');
      redirect('s/dana_desa/_tambah/dds');
      }


    }

    if ($page == 'sp') {
      $this->_rules_fitur($page, 'dds');
      if ($this->form_validation->run() == FALSE) {
        $this->form_dds($page);
      }else {
        $data = array(
          'jenisDd'       => 'SP',
          'nomorDd'       => $this->input->post('nomor', TRUE),
          'gelombangDd'   => $this->input->post('tahapan', TRUE),
          'bulanDd'       => $this->input->post('bulan', TRUE),
          'pendudukDdid'  => $this->input->post('id', TRUE),
          'persentase'    => $this->input->post('persentase', TRUE),
          'jabatanDdid'   => $this->input->post('jabatan', TRUE),
          'sumberDd'      => $this->input->post('anggaran', TRUE),
          'tahunDd'       => $this->input->post('tahun', TRUE),
          'createdAtDD'     => $date,
          'userDdid'      => $this->session->userdata('id'),
          'statusDd'      => 0,
          'gampongDid'    => $this->session->userdata('gampong')
        );
          $this->crud->save_dds($data);
          $this->session->set_flashdata('msg', 'Berhasil Membuat Surat !');
          redirect('s/dana_desa/_tambah/dds');
      }


    }

    if ($page == 'spp') {
      $this->_rules_fitur($page, 'dds');
      if ($this->form_validation->run() == FALSE) {
        $this->form_dds($page);
      }else {
        $data = array(
          'jenisDd'       => 'SPP',
          'nomorDd'       => $this->input->post('nomor', TRUE),
          'gelombangDd'   => $this->input->post('tahapan', TRUE),
          'bulanDd'       => $this->input->post('bulan', TRUE),
          'persentase'    => $this->input->post('persentase', TRUE),
          'pendudukDdid'  => $this->input->post('id', TRUE),
          'jabatanDdid'   => $this->input->post('jabatan', TRUE),
          'sumberDd'      => $this->input->post('anggaran', TRUE),
          'tahunDd'       => $this->input->post('tahun', TRUE),
          'createdAtDD'     => $date,
          'userDdid'      => $this->session->userdata('id'),
          'statusDd'      => 0,
          'gampongDid'    => $this->session->userdata('gampong')
        );

        $this->crud->save_dds($data);
        $this->session->set_flashdata('msg', 'Berhasil Membuat Surat !');
        redirect('s/dana_desa/_tambah/dds');
      }


    }

    if ($page == 'sptj') {
      $this->_rules_fitur($page, 'dds');
      if ($this->form_validation->run() == FALSE) {
        $this->form_dds($page);
      }else {
        $data = array(
          'jenisDd'          => 'SPTJ',
          'nomorDd'          => $this->input->post('no', TRUE),
          'gelombangDd'      => $this->input->post('tahapan', TRUE),
          'persentase'       => $this->input->post('persentase', TRUE),
          'angkaAnggaran'    => $this->input->post('penggunaan_dana', TRUE),
          'pendudukDdid'     => $this->input->post('id', TRUE),
          'jabatanDdid'      => $this->input->post('jabatan', TRUE),
          'sumberDd'         => $this->input->post('anggaran', TRUE),
          'tahunDd'          => $this->input->post('tahun', TRUE),
          'createdAtDD'        => $date,
          'userDdid'         => $this->session->userdata('id'),
          'statusDd'         => 0,
          'gampongDid'       => $this->session->userdata('gampong')
        );

        $this->crud->save_dds($data);
        $this->session->set_flashdata('msg', 'Berhasil Membuat Surat !');
        redirect('s/dana_desa/_tambah/dds');
      }


    }

    if ($page == 'spv') {
      $this->_rules_fitur($page, 'dds');
      if ($this->form_validation->run() == FALSE) {
        $this->form_dds($page);
      }else {
        $data = array(
          'jenisDd'              => 'SPV',

          'jabatanDdid'          => $this->input->post('jabatan', TRUE),
          'tahapanDdsSebelumnya' => $this->input->post('tahapan_sebelumnya', TRUE),
          'persentaseSebelumnya' => $this->input->post('persentase_sebelumnya', TRUE),
          'tahunSebelumnya'      => $this->input->post('tahun_sebelumnya', TRUE),
          'gelombangDd'          => $this->input->post('tahapan', TRUE),
          'persentase'           => $this->input->post('persentase', TRUE),
          'pendudukDdid'         => $this->input->post('id', TRUE),
          'tahunDd'              => $this->input->post('tahun', TRUE),
          'createdAtDD'          => $date,
          'userDdid'             => $this->session->userdata('id'),
          'statusDd'             => 0,
          'gampongDid'           => $this->session->userdata('gampong')
        );

        $this->crud->save_dds($data);
        $this->session->set_flashdata('msg', 'Berhasil Membuat Surat !');
        redirect('s/dana_desa/_tambah/dds');
      }


    }
  }

  function s_dds_select($set)
  {
    $db = array(
      'gampong' => $this->crud->get_complete_gampong()->result(),
      'penduduk' => $this->crud->get_complete_gampong()->result(),
    );
    switch ($set) {
      case 'fi':
        $title = 'Buat Surat Fakta Integritas';
        break;
      case 'sp':
        $title = 'Buat Surat Pengantar';
        break;
      case 'spp':
        $title = 'Buat Surat Permohonan Pencairan';
        break;
      case 'sptj':
        $title = 'Buat Surat Pertanggung Jawaban';
        break;
      case 'spv':
        $title = 'Buat Surat Pernyataan Verifikasi';
        break;
      default:
        redirect('404');
        break;
    }
    $data = array(
      'title' => $title,
      'opt'   => 'form',
      'set'   => $set,
      'page'  => 'page/dana_desa/add_form',
    );
    $this->load->view('main', $data);
  }

  function proses_dana_desa($segment)
  {
    switch ($this->input->post('bulan')) {
      case '1':
        $bulan = "Januari";
        break;
      case '2':
        $bulan = "Februari";
        break;
      case '3':
        $bulan = "Maret";
        break;
      case '4':
        $bulan = "April";
        break;
      case '5':
        $bulan = "Mei";
        break;
      case '6':
        $bulan = "Juni";
        break;
      case '7':
        $bulan = "Juli";
        break;
      case '8':
        $bulan = "Agustus";
        break;
      case '9':
        $bulan = "September";
        break;
      case '10':
        $bulan = "Oktober";
        break;
      case '11':
        $bulan = "November";
        break;
      case '12':
        $bulan = "Desember";
        break;
    }

    $date = date('Y-m-d');
    $this->_rules_fitur($segment);
    if ($this->form_validation->run() == FALSE) {
      $this->dDesa_reg($segment);
    }else {
      switch ($segment) {
        case 'fi':
          $data = array(
            'jenisDd'       => 'FI',
            'gelombangDd'   => $this->input->post('tahapan', TRUE),
            'pendudukDdid'  => $this->input->post('id', TRUE),
            'persentase'    => $this->input->post('persentase', TRUE),
            'jabatanDdid'   => $this->input->post('jabatan', TRUE),
            'sumberDd'      => $this->input->post('anggaran', TRUE),
            'tahunDd'       => $this->input->post('tahun', TRUE),
            'createdAt'     => $date,
            'userDdid'      => $this->session->userdata('id'),
            'statusDd'      => 0
          );
          $this->session->set_flashdata('msg','Berhasil Membuat Surat Fakta Integritas');
          break;
        case 'sp':
          $data = array(
            'jenisDd'       => 'SP',
            'nomorDd'       => $this->input->post('nomor', TRUE),
            'gelombangDd'   => $this->input->post('tahapan', TRUE),
            'bulanDd'       => $this->input->post('bulan', TRUE),
            'pendudukDdid'  => $this->input->post('id', TRUE),
            'persentase'    => $this->input->post('persentase', TRUE),
            'jabatanDdid'   => $this->input->post('jabatan', TRUE),
            'sumberDd'      => $this->input->post('anggaran', TRUE),
            'tahunDd'       => $this->input->post('tahun', TRUE),
            'createdAt'     => $date,
            'userDdid'      => $this->session->userdata('id'),
            'statusDd'      => 0
          );

          $this->session->set_flashdata('msg','Berhasil Membuat Surat Pengantar');
          break;
        case 'spp':
          $data = array(
            'jenisDd'       => 'SPP',
            'nomorDd'       => $this->input->post('nomor', TRUE),
            'gelombangDd'   => $this->input->post('tahapan', TRUE),
            'bulanDd'       => $this->input->post('bulan', TRUE),
            'persentase'    => $this->input->post('persentase', TRUE),
            'pendudukDdid'  => $this->input->post('id', TRUE),
            'jabatanDdid'   => $this->input->post('jabatan', TRUE),
            'sumberDd'      => $this->input->post('anggaran', TRUE),
            'tahunDd'       => $this->input->post('tahun', TRUE),
            'createdAt'     => $date,
            'userDdid'      => $this->session->userdata('id'),
            'statusDd'      => 0
          );
          $this->session->set_flashdata('msg','Berhasil Membuat Surat Permohonan Pencairan');
          break;
        case 'sptj':
          $data = array(
            'jenisDd'          => 'SPTJ',
            'gelombangDd'      => $this->input->post('tahapan', TRUE),
            'persentase'       => $this->input->post('persentase', TRUE),
            'angkaAnggaran'    => $this->input->post('penggunaan_dana', TRUE),
            'pendudukDdid'     => $this->input->post('id', TRUE),
            'jabatanDdid'      => $this->input->post('jabatan', TRUE),
            'sumberDd'         => $this->input->post('anggaran', TRUE),
            'tahunDd'          => $this->input->post('tahun', TRUE),
            'createdAt'        => $date,
            'userDdid'         => $this->session->userdata('id'),
            'statusDd'         => 0
          );
          $this->session->set_flashdata('msg','Berhasil Membuat Surat Pertaggung Jawaban');
          break;

        case 'spv':

          $data = array(
            'jenisDd'              => 'SPV',
            'tahapanDdsSebelumnya' => $this->input->post('tahapan_sebelumnya', TRUE),
            'persentaseSebelumnya' => $this->input->post('persentase_sebelumnya', TRUE),
            'tahunSebelumnya'      => $this->input->post('tahun_sebelumnya', TRUE),
            'gelombangDd'          => $this->input->post('tahapan', TRUE),
            'persentase'           => $this->input->post('persentase', TRUE),
            // 'angkaAnggaran'        => $this->input->post('penggunaan_dana', TRUE),
            'pendudukDdid'         => $this->input->post('id', TRUE),
            // 'jabatanDdid'          => $this->input->post('jabatan', TRUE),
            // 'sumberDd'             => $this->input->post('anggaran', TRUE),
            'tahunDd'              => $this->input->post('tahun', TRUE),
            'createdAt'            => $date,
            'userDdid'             => $this->session->userdata('id'),
            'statusDd'             => 0
          );
          $this->session->set_flashdata('msg','Berhasil Membuat Surat Pernyataan Verifikasi');
          break;


      }

      // var_dump($data);
      // die();
      $data['gampongDid'] = $this->session->userdata('gampong');
      $this->crud->save_dana_desa($data);
      redirect('dana_desa/_tambah');
    }
  }

  function upload_dokumen()
  {
    $id           = $this->session->userdata('gampong');
    $data_gampong = $this->crud->get_gampong_single($id)->row();

    if (empty($data_gampong->idGeuchikG) && empty($data_gampong->idJGG)	&& empty($data_gampong->idKaurG) && empty($data_gampong->idJKG) && empty($data_gampong->idSekretarisG) && empty($data_gampong->idJSG)) {
      $this->session->set_flashdata('msg', 'Kamu harus melengkapi data ini terlebih dahulu');
      redirect('pengaturanGampong/'.$id);
    }else {
      $db           = $this->crud->get_upload_file()->result();
      $check        = $this->crud->get_upload_file()->num_rows();
      // $this->session->set_flashdata('msg','Untuk menggunakan fitur ini, pastikan dokumen kebutuhan untuk verifikasi sudah di persiapkan !');
      $data = array(
        'title'     => 'Upload Dokumen',
        'opt'       => 'table',
        'page'      => 'page/upload/select_fitur',
        'db'        => $db,
        'check'     => $check,
      );
      $this->load->view('main', $data);
    }

  }

  function step_upload_dokumen($page)
  {
    if ($page == 'adk') {
      $data = array(
        'title'     => 'Upload Dokumen',
        'opt'       => 'form',
        'page'      => 'page/upload/adk/upload',
      );
    }elseif ($page == 'dds') {
      $data = array(
        'title'     => 'Upload Dokumen',
        'opt'       => 'form',
        'page'      => 'page/upload/dds/upload',
      );
    }else {
      redirect('404');
    }
    $this->load->view('main', $data);
  }

  function step_edit_upload_dokumen($page,$id)
  {

    $db = $this->crud->get_upload_single($id);
    if ($page == 'adk') {
      $data = array(
        'title'     => 'Update Upload Dokumen',
        'opt'       => 'form',
        'page'      => 'page/upload/adk/edit_upload',
        'db'        => $db->row(),
      );
    }elseif ($page == 'dds') {
      $data = array(
        'title'     => 'Update Upload Dokumen',
        'opt'       => 'form',
        'page'      => 'page/upload/dds/edit_upload',
        'db'        => $db->row(),
      );
    }else {
      redirect('404');
    }
    $this->load->view('main', $data);
  }

  function proses_edit_upload_dokumen($page,$id)
  {
    $db = $this->crud->get_upload_single($id)->row();
    $check = $this->crud->get_upload_single($id)->num_rows();
    if ($check > 0) {
      switch ($page) {
        case 'adk':
          $config = array(
            'allowed_types' => 'jpg|png|pdf|jpeg|docx|doc|odt',
            'max_size'      => 10000,
            'overwrite'     => TRUE,
            'upload_path'   => './assets_sys/files/adk/'.$db->path_file,
            'encrypt_name'  => TRUE,
          );
          $this->load->library('upload', $config);

          if (!empty($_FILES['f1']['name'])) {
            if ($this->upload->do_upload('f1')) {
              $data_file = $this->upload->data();
              $data['udAdkF1']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f2']['name'])) {
            if ($this->upload->do_upload('f2')) {
              $data_file = $this->upload->data();
              $data['udAdkF2']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f3']['name'])) {
            if ($this->upload->do_upload('f3')) {
              $data_file = $this->upload->data();
              $data['udAdkF3']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f4']['name'])) {
            if ($this->upload->do_upload('f4')) {
              $data_file = $this->upload->data();
              $data['udAdkF4']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f5']['name'])) {
            if ($this->upload->do_upload('f5')) {
              $data_file = $this->upload->data();
              $data['udAdkF5']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f6']['name'])) {
            if ($this->upload->do_upload('f6')) {
              $data_file = $this->upload->data();
              $data['udAdkF6']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f7']['name'])) {
            if ($this->upload->do_upload('f7')) {
              $data_file = $this->upload->data();
              $data['udAdkF7']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f8']['name'])) {
            if ($this->upload->do_upload('f8')) {
              $data_file = $this->upload->data();
              $data['udAdkF8']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f9']['name'])) {
            if ($this->upload->do_upload('f9')) {
              $data_file = $this->upload->data();
              $data['udAdkF9']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f10']['name'])) {
            if ($this->upload->do_upload('f10')) {
              $data_file = $this->upload->data();
              $data['udAdkF10']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f11']['name'])) {
            if ($this->upload->do_upload('f11')) {
              $data_file = $this->upload->data();
              $data['udAdkF11']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f12']['name'])) {
            if ($this->upload->do_upload('f12')) {
              $namaFile11 = 'ADK_' . md5($date.'F12-ADK');
              $data_file = $this->upload->data();
            }
            $data['udAdkF12']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
          }

          if (!empty($_FILES['f13']['name'])) {
            if ($this->upload->do_upload('f13')) {
              $data_file = $this->upload->data();
              $data['udAdkF13']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f14']['name'])) {
            if ($this->upload->do_upload('f14')) {
              $data_file = $this->upload->data();
              $data['udAdkF14']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          $this->crud->update_upload($id,$data);
          $this->session->set_flashdata('msg', 'Berhasil Menambah File Upload Dokumen');
          redirect('upload_dokumen');
          break;

        case 'dds':
          $config = array(
            'allowed_types' => 'jpg|png|pdf|jpeg|docx|doc|odt',
            'max_size'      => 10000,
            'overwrite'     => TRUE,
            'upload_path'   => './assets_sys/files/dds/'.$db->path_file,
            'encrypt_name'  => TRUE,
          );
          $this->load->library('upload', $config);

          if (!empty($_FILES['f1']['name'])) {
            if ($this->upload->do_upload('f1')) {
              $data_file = $this->upload->data();
              $data['udDdsF1']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f2']['name'])) {
            if ($this->upload->do_upload('f2')) {
              $data_file = $this->upload->data();
              $data['udDdsF2']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f3']['name'])) {
            if ($this->upload->do_upload('f3')) {
              $data_file = $this->upload->data();
              $data['udDdsF3']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f4']['name'])) {
            if ($this->upload->do_upload('f4')) {
              $data_file = $this->upload->data();
              $data['udDdsF4']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f5']['name'])) {
            if ($this->upload->do_upload('f5')) {
              $data_file = $this->upload->data();
              $data['udDdsF5']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f6']['name'])) {
            if ($this->upload->do_upload('f6')) {
              $data_file = $this->upload->data();
              $data['udDdsF6']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f7']['name'])) {
            if ($this->upload->do_upload('f7')) {
              $data_file = $this->upload->data();
              $data['udDdsF7']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f8']['name'])) {
            if ($this->upload->do_upload('f8')) {
              $data_file = $this->upload->data();
              $data['udDdsF8']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f9']['name'])) {
            if ($this->upload->do_upload('f9')) {
              $data_file = $this->upload->data();
              $data['udDdsF9']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f10']['name'])) {
            if ($this->upload->do_upload('f10')) {
              $data_file = $this->upload->data();
              $data['udDdsF10']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }
          break;
      }

    }else {
      redirect('404');
    }
  }

  function del_upload_dokumen($id)
  {
    $data = $this->crud->get_upload_single($id)->row();
    $pathLocal = FCPATH;
    $linkFile = $pathLocal.'assets_sys/files/adk/'.$data->path_file;
    chmod($linkFile, 0777);
    exec ("find ".$linkFile." -type f -exec chmod 0777 {} +");
    system("rm -rf ".$linkFile.'/*');
    rmdir($linkFile);
    $this->crud->upload_delete($id);
    $this->session->set_flashdata('msg', 'Berhasil hapus data !');
    redirect('upload_dokumen');
  }

  function proses_upload_dokumen($page)
  {
    $date = date('Y-m-d');
    $pathToFile = time();

    switch ($page) {
      case 'adk':

        $this->_rules_upload($page);
        if ($this->form_validation->run() == FALSE) {
          $this->step_upload_dokumen($page);
        }else {
          $config = array(
            'allowed_types' => 'jpg|png|pdf|jpeg|docx|doc|odt',
            'max_size'      => 10000,
            'overwrite'     => TRUE,
            'upload_path'   => './assets_sys/files/adk/'.$pathToFile,
            'encrypt_name'  => TRUE,
          );
          $createDir = mkdir($config['upload_path']);
          $this->load->library('upload', $config);

          $data = array(
            'jenisDokumenUd'          => ucwords($page),
            'path_file'               => $pathToFile,
            'jumlahPengajuanUd'       => $this->input->post('jumlah_pengajuan'),
            'persentasePdrb'          => $this->input->post('persentase_pdrb'),
            'jumlahPengajuanPdrb'     => $this->input->post('jumlah_pdrb'),
            'pdrbTahapAdk'            => $this->input->post('tahapan_pdrb'),
            'persentaseAdk'           => $this->input->post('persentase_adk'),
            'jumlahPengajuanAdk'      => $this->input->post('jumlah_adk'),
            'adkTahapAdk'             => $this->input->post('tahapan_adk'),
            'createdAtUd'             => date('Y-m-d'),
            'petugasId'               => $this->session->userdata('id')

          );

          if (!empty($_FILES['f1']['name'])) {
            if ($this->upload->do_upload('f1')) {
              $data_file = $this->upload->data();
              $data['udAdkF1']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f2']['name'])) {
            if ($this->upload->do_upload('f2')) {
              $data_file = $this->upload->data();
              $data['udAdkF2']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f3']['name'])) {
            if ($this->upload->do_upload('f3')) {
              $data_file = $this->upload->data();
              $data['udAdkF3']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f4']['name'])) {
            if ($this->upload->do_upload('f4')) {
              $data_file = $this->upload->data();
              $data['udAdkF4']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f5']['name'])) {
            if ($this->upload->do_upload('f5')) {
              $data_file = $this->upload->data();
              $data['udAdkF5']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f6']['name'])) {
            if ($this->upload->do_upload('f6')) {
              $data_file = $this->upload->data();
              $data['udAdkF6']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f7']['name'])) {
            if ($this->upload->do_upload('f7')) {
              $data_file = $this->upload->data();
              $data['udAdkF7']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f8']['name'])) {
            if ($this->upload->do_upload('f8')) {
              $data_file = $this->upload->data();
              $data['udAdkF8']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f9']['name'])) {
            if ($this->upload->do_upload('f9')) {
              $data_file = $this->upload->data();
              $data['udAdkF9']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f10']['name'])) {
            if ($this->upload->do_upload('f10')) {
              $data_file = $this->upload->data();
              $data['udAdkF10']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f11']['name'])) {
            if ($this->upload->do_upload('f11')) {
              $data_file = $this->upload->data();
              $data['udAdkF11']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f12']['name'])) {
            if ($this->upload->do_upload('f12')) {
              $namaFile11 = 'ADK_' . md5($date.'F12-ADK');
              $data_file = $this->upload->data();
            }
            $data['udAdkF12']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
          }

          if (!empty($_FILES['f13']['name'])) {
            if ($this->upload->do_upload('f13')) {
              $data_file = $this->upload->data();
              $data['udAdkF13']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

          if (!empty($_FILES['f14']['name'])) {
            if ($this->upload->do_upload('f14')) {
              $data_file = $this->upload->data();
              $data['udAdkF14']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
            }
          }

        $this->crud->upload_file($data);
        $this->session->set_flashdata('msg', 'Berkas Untuk ADK sudah Di Upload Jika Belum Lengkap, Kamu Bisa Edit Datanya di Fitur Edit Berkas Upload ADK');
        redirect('upload_dokumen');
        }
        break;

        case 'dds':
          $this->_rules_upload($page);
          if ($this->form_validation->run() == FALSE) {
            $this->step_upload_dokumen($page);
          }else {
            $config = array(
              'allowed_types' => 'jpg|png|pdf|jpeg|docx|doc|odt',
              'max_size'      => 10000,
              'overwrite'     => TRUE,
              'upload_path'   => './assets_sys/files/dds/'.$pathToFile,
              'encrypt_name'  => TRUE,
            );
            $createDir = mkdir($config['upload_path'], 0755, TRUE);
            $this->load->library('upload', $config);

            $data = array(
              'jenisDokumenUd'          => ucwords($page),
              'jumlahPengajuanUd'       => $this->input->post('jumlah_pengajuan'),
              'persentaseDds'           => $this->input->post('persentase_dds'),
              'ddsTahap'                => $this->input->post('tahapan_dds'),
              'bltDds'                  => $this->input->post('jumlah_blt_dds'),
              'jumlahBltDds'            => $this->input->post('jumlah_non_blt'),
              'createdAtUd'             => date('Y-m-d'),
              'petugasId'               => $this->session->userdata('id')
            );

            if (!empty($_FILES['f1']['name'])) {
              if ($this->upload->do_upload('f1')) {
                $data_file = $this->upload->data();
                $data['udDdsF1']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f2']['name'])) {
              if ($this->upload->do_upload('f2')) {
                $data_file = $this->upload->data();
                $data['udDdsF2']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f3']['name'])) {
              if ($this->upload->do_upload('f3')) {
                $data_file = $this->upload->data();
                $data['udDdsF3']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f4']['name'])) {
              if ($this->upload->do_upload('f4')) {
                $data_file = $this->upload->data();
                $data['udDdsF4']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f5']['name'])) {
              if ($this->upload->do_upload('f5')) {
                $data_file = $this->upload->data();
                $data['udDdsF5']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f6']['name'])) {
              if ($this->upload->do_upload('f6')) {
                $data_file = $this->upload->data();
                $data['udDdsF6']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f7']['name'])) {
              if ($this->upload->do_upload('f7')) {
                $data_file = $this->upload->data();
                $data['udDdsF7']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f8']['name'])) {
              if ($this->upload->do_upload('f8')) {
                $data_file = $this->upload->data();
                $data['udDdsF8']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f9']['name'])) {
              if ($this->upload->do_upload('f9')) {
                $data_file = $this->upload->data();
                $data['udDdsF9']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

            if (!empty($_FILES['f10']['name'])) {
              if ($this->upload->do_upload('f10')) {
                $data_file = $this->upload->data();
                $data['udDdsF10']  = 'DDS_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }

          $this->crud->upload_file($data);
          $this->session->set_flashdata('msg', 'Berkas Untuk DDS sudah Di Upload Jika Belum Lengkap, Kamu Bisa Edit Datanya di Fitur Edit Berkas Upload ADK');
          redirect('upload_dokumen');
          }
          break;

    }
  }


  function dDesa_list($part)
  {
    $gampong_id  = $this->session->userdata('gampong');
    switch ($part) {
      case 'adk':
      $db = $this->crud->get_user_dana_adk($gampong_id);
      // echo "<pre>";
      // var_dump($db->result());
      // echo "</pre>";
      // die();
      $titles = "Alokasi Dana Kampung";
        break;

      case 'dds':
      $db = $this->crud->get_user_dana_desa($gampong_id);
      $titles = "Dana Desa";
        break;

    }

    $data = array(
      'title' => 'Data Surat',
      'opt'   => 'table',
      'page'  => 'page/dana_desa/list_dana_desa',
      'part'  => $titles,
      'db'    => $db->result(),
    );
    $this->load->view('main', $data);
  }

  function del_surat($set,$id)
  {

    $check = $this->crud->delete_berkas_surat($set, $id);
    $this->session->set_flashdata('msg', 'Berhasil Menghapus Data !');
    redirect('dana_desa'.'/'.$set);

  }

  function lengkapi_profil($params)
  {
    $this->isLogin();
    $check = $this->session->userdata('email');
    if ($params != sha1($check)) {
      $this->log_out();
      redirect('404');
    }else{
      $data = array(
        'title' => 'Lengkapi Data Terlebih Dahulu',
        'opt'   => 'form',
        'dbG'    => $this->crud->get_gampong_all_lokal()->result(),
        'dbJ'    => $this->crud->get_jabatan_all()->result(),
        'page'  => 'page/admin/complete_registration',
      );
      $this->load->view('main', $data);
    }
  }

  function update_profil()
  {
    $date = date('Y-m-d');
    $check = $this->session->userdata('email');
    // $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array('required' => '%s harus di pilih'));
    $this->_rules_penduduk();
    if ($this->form_validation->run() == FALSE) {
      $this->lengkapi_profil(sha1($check));
    }else {

      $_alamat = array(
        'idA'           => 'LO'.time(),
        'labelA'        => 'lokal kecamatan singkil',
        'alamatA'       => $this->input->post('alamat', TRUE),
        'createdAt'     => $date,
      );

      $_penduduk = array(
        'isUsr'         => 1,
        'alamatPid'     => $_alamat['idA'],
        'gampongPid'    => $this->input->post('gampong', TRUE),
        'namaP'         => $this->input->post('nama_lengkap',TRUE),
        'nikP'          => $this->input->post('nik',TRUE),
        'jenisKelaminP' => $this->input->post('jenisKelamin',TRUE),
        // 'jabatanPid'    => $this->input->post('jabatan', TRUE),
        'nomorHpP'      => $this->input->post('hp',TRUE),
        'createdAt'     => $date,
      );

      $setLogin['pendudukUid'] = $_penduduk['nikP'];
      $id = $this->session->userdata('id');
      // echo $setLogin['pendudukUid'];

      $this->crud->update_login($id,$setLogin);
      $this->crud->save_penduduk($_penduduk);
      $this->crud->save_alamat($_alamat);
      $this->session->set_flashdata('wellcome', 'Akun anda berhasil di update !');
      redirect('main');
    }
  }

  function pengaturan_gampong($id)
  {
    $db       = $this->crud->get_gampong_single($id)->row();
    $penduduk = $this->crud->get_pendudukBy_gampong($id)->result();
    $jabatan  = $this->crud->get_jabatan_all()->result();
    $xR       = $this->crud->get_pendudukAndJabatan($id)->result();
    $geuchik  = $this->crud->getGeuchik($id);
    $kaur     = $this->crud->getKaur($id);
    $sekdes   = $this->crud->getSekdes($id);

    $data = array(
      'title'     => 'Data Master Gampong '. $db->namaG,
      'opt'       => 'form',
      'page'      => 'page/admin/pengaturan_gampong',
      'db'        => $db,
      'penduduk'  => $penduduk,
      'jabatan'   => $jabatan,
      'geuchik'   => $geuchik,
      'kaur'      => $kaur,
      'sekdes'    => $sekdes,

    );

    $this->load->view('main', $data);
  }

  function prosesPengaturanGampong($id)
  {
    $jabatan    = $this->input->post('jabatan');
    $pemilik    = $this->input->post('penduduk');
    $jenis_bank = $this->input->post('jenis_bank');
    $norek      = $this->input->post('norek');

    $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim');
    $this->form_validation->set_rules('penduduk', 'Pemilik Jabatan', 'trim');
    if ($this->form_validation->run() == FALSE) {
      $this->pengaturan_gampong($id);
    }else {
      $params  = $this->crud->get_single_jabatan($jabatan)->row();
      switch ($params->label) {
      case 'Kaur Keuangan':
        if (!empty($jabatan) && !empty($pemilik)) {
          $data = array(
            'idJKG'   => $jabatan,
            'idKaurG' => $pemilik,
          );
        }

        break;

      case 'Keuchik':
        if (!empty($jabatan) && !empty($pemilik)) {
        $data = array(
            'idJGG'      => $jabatan,
            'idGeuchikG' => $pemilik,
          );
        }

        break;

      case 'Sekretaris Gampong':
        if (!empty($jabatan) && !empty($pemilik)) {
          $data = array(
            'idJSG'         => $jabatan,
            'idSekretarisG' => $pemilik,
          );
        }

        break;
      }
      $data['createdAt'] = date('Y-m-d');

      if ($jenis_bank != null && $norek != null) {
        $data['namaBankG'] = $jenis_bank;
        $data['rekeningG'] = $norek;
      }

      $idP = $this->input->post('penduduk');
      $setJabatan['jabatanPid'] = $jabatan;

      $this->crud->update_penggunaan_jabatan($id, $data);
      $this->crud->update_penduduk_jabatan($idP,$setJabatan);
      $this->session->set_flashdata('msg','Berhasil memperbaharui identitas desa atau gampong');
      redirect('pengaturanGampong/'.$id);
    }
  }

  public function _rules_penduduk()
  {
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[50]', array( 'required' => 'Anda harus mengisi bagian %s', ));
    $this->form_validation->set_rules('hp', 'Nomor Hp', 'trim|required|min_length[11]|max_length[16]', array( 'required' => 'Anda harus mengisi bagian %s', 'min_length' => 'Bagian %s minimal 11 karakter', 'max_length' => 'Bagian %s maximal 16 karakter' ));
    $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'trim|required|min_length[16]|max_length[16]|is_unique[_penduduk.nikP]', array( 'required' => 'Anda harus mengisi bagian %s', 'is_unique' => '%s sudah terdata, harap pastikan data nik yang diisi tidak boleh duplikasi', ));
    $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'trim|required', array( 'required' => 'Anda harus mengisi bagian %s', ));
    $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required|min_length[1]', array( 'required' => 'Anda harus mengisi bagian %s', 'min_length' => 'Harap memilih %s' ));
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array( 'required' => 'Anda harus mengisi bagian %s', ));

    return;
  }

  public function _rules_fitur($segment,$part)
  {

    if ($part == 'adk') {
      switch ($segment) {
        case 'fi':
          $this->form_validation->set_rules('nik', 'Nomor Induk Keluarga', 'trim|required|min_length[16]|max_length[16]', array(
            'required'    => '%s Tidak Boleh Kosong !',
            'min_length'  => '%s Terlalu Pendek !',
            'max_length'  => '%s Terlalu Panjang !',
          ));
          $this->form_validation->set_rules('tahapan_adk', 'Tahapan ADK', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('persentase_guna', 'Persentase Penggunaan', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('tahapan_pajak', 'Tahapan Pajak & Restribusi Daerah', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('persentase_pajak', 'Persentase Pajak & Restribusi Daerah', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required', array(
            'required'    => '%s Harus di pilih !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;

        case 'sp':
          $this->form_validation->set_rules('nik', 'Nomor Induk Keluarga', 'trim|required|min_length[16]|max_length[16]', array(
            'required'    => '%s Tidak Boleh Kosong !',
            'min_length'  => '%s Terlalu Pendek !',
            'max_length'  => '%s Terlalu Panjang !',
          ));
          $this->form_validation->set_rules('tahapan', 'Tahapan ADK', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('persentase', 'Persentase Penggunaan', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('nomor', 'Nomor Surat', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required', array(
            'required'    => '%s Harus di pilih !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;

        case 'spp':
          $this->form_validation->set_rules('nik', 'Nomor Induk Keluarga', 'trim|required|min_length[16]|max_length[16]', array(
            'required'    => '%s Tidak Boleh Kosong !',
            'min_length'  => '%s Terlalu Pendek !',
            'max_length'  => '%s Terlalu Panjang !',
          ));
          $this->form_validation->set_rules('tahapan_adk', 'Tahapan ADK', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('persentase_guna', 'Persentase Penggunaan', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('tahapan_pajak', 'Tahapan Pajak & Restribusi Daerah', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('persentase_pajak', 'Persentase Pajak & Restribusi Daerah', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required', array(
            'required'    => '%s Harus di pilih !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;

        case 'sptj':
          $this->form_validation->set_rules('nik', 'Nomor Induk Keluarga', 'trim|required|min_length[16]|max_length[16]', array(
            'required'    => '%s Tidak Boleh Kosong !',
            'min_length'  => '%s Terlalu Pendek !',
            'max_length'  => '%s Terlalu Panjang !',
          ));
          $this->form_validation->set_rules('tahapan_adk', 'Tahapan ADK', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('persentase_guna', 'Persentase Penggunaan', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('tahapan_pajak', 'Tahapan Pajak & Restribusi Daerah', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('persentase_pajak', 'Persentase Pajak & Restribusi Daerah', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('angka_pajak', 'Nilai dari Pajak', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('angka_anggaran', 'Nilai dari Anggaran', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required', array(
            'required'    => '%s Harus di pilih !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;

        case 'spv':

          $this->form_validation->set_rules('tahapan_anggaran', 'Tahapan Anggaran Dana Kampung', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));

          $this->form_validation->set_rules('persentase_anggaran', 'Persentase Anggaran Dana Kampung', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));

          $this->form_validation->set_rules('tahapan_pajak', 'Tahapan Pajak & Restribusi Daerah', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));

          $this->form_validation->set_rules('persentase_pajak', 'Persentase Pajak & Restribusi Daerah', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));

          $this->form_validation->set_rules('nilai_pengajuan', 'Nilai Pengajuan ADK', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('nilai_pajak', 'Nilai Pajak ADK', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;
      }

    }
    elseif ($part == 'dds') {
      switch ($segment) {
        case 'fi':
          $this->form_validation->set_rules('nik', 'Nomor Induk Keluarga', 'trim|required|min_length[16]|max_length[16]', array(
            'required'    => '%s Tidak Boleh Kosong !',
            'min_length'  => '%s Terlalu Pendek !',
            'max_length'  => '%s Terlalu Panjang !',
          ));
          $this->form_validation->set_rules('tahapan', 'Tahapan', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('persentase', 'Persentase', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required', array(
            'required'    => '%s Harus di pilih !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;

        case 'sp':
          $this->form_validation->set_rules('nik', 'Nomor Induk Keluarga', 'trim|required|min_length[16]|max_length[16]', array(
            'required'    => '%s Tidak Boleh Kosong !',
            'min_length'  => '%s Terlalu Pendek !',
            'max_length'  => '%s Terlalu Panjang !',
          ));
          $this->form_validation->set_rules('tahapan', 'Tahapan Anggaran Dana Desa', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('bulan', 'Bulan', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('nomor', 'Nomor Surat Pengantar', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('persentase', 'Persentase', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required', array(
            'required'    => '%s Harus di pilih !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;

        case 'spp':
          $this->form_validation->set_rules('nik', 'Nomor Induk Keluarga', 'trim|required|min_length[16]|max_length[16]', array(
            'required'    => '%s Tidak Boleh Kosong !',
            'min_length'  => '%s Terlalu Pendek !',
            'max_length'  => '%s Terlalu Panjang !',
          ));
          $this->form_validation->set_rules('tahapan', 'Tahapan Anggaran Dana Desa', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('bulan', 'Bulan', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('nomor', 'Nomor Surat Pengantar', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('persentase', 'Persentase', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required', array(
            'required'    => '%s Harus di pilih !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;

        case 'sptj':
          $this->form_validation->set_rules('nik', 'Nomor Induk Keluarga', 'trim|required|min_length[16]|max_length[16]', array(
            'required'    => '%s Tidak Boleh Kosong !',
            'min_length'  => '%s Terlalu Pendek !',
            'max_length'  => '%s Terlalu Panjang !',
          ));
          $this->form_validation->set_rules('tahapan', 'Tahapan Anggaran Dana Desa', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('anggaran', 'Anggaran', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('penggunaan_dana', 'Penggunaan Dana', 'trim|required', array(
            'required'    => '%s Harus disebutkan !',
          ));
          $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('persentase', 'Persentase', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required', array(
            'required'    => '%s Harus di isi !',
          ));
          $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required', array(
            'required'    => '%s Harus di pilih !',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;

        case 'spv':

          $this->form_validation->set_rules('tahapan', 'Tahapan Anggaran Dana Desa', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));

          $this->form_validation->set_rules('tahapan_sebelumnya', 'Tahapan Anggaran Dana Desa Sebelumnya', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));

          $this->form_validation->set_rules('tahun_sebelumnya', 'Tahun Anggaran Dana Desa Sebelumnya', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));

          $this->form_validation->set_rules('persentase_sebelumnya', 'Persentase Anggaran Dana Desa Sebelumnya', 'trim|required', array(
            'required'    => '%s Harus diisi !',
          ));

          $this->form_validation->set_rules('tahun_sebelumnya', 'Tahun Anggaran Dana Desa Sebelumnya', 'trim|required', array(
            'required'    => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('tahun', 'Tahun', 'trim|required', array(
            'required'    => '%s Anggaran harus di isi!',
          ));
          $this->form_validation->set_rules('persentase', 'Persentase', 'trim|required', array(
            'required'    => '%s harus di isi!',
          ));
          $this->form_validation->set_rules('id', 'ID', 'trim|required', array(
            'required'    => 'Parameter Salah !',
          ));
          break;
      }

    }


    return;
  }

  public function _rules_upload($page)
  {
    switch ($page) {
      case 'adk':
        $this->form_validation->set_rules('tahapan_pdrb', 'Tahapan PDRB', 'trim|required',
        array(
          'required' => '%s Harus dipilih !',
        ));
        $this->form_validation->set_rules('jumlah_pengajuan', 'Jumlah Pengajuan', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja !',
        ));
        $this->form_validation->set_rules('jumlah_pdrb', 'Jumlah PDRB', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja !',
        ));
        $this->form_validation->set_rules('persentase_pdrb', 'Persentase PDRB', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja Tanpa Symbol Persen !',
        ));
        $this->form_validation->set_rules('persentase_adk', 'Persentase ADK', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja Tanpa Symbol Persen !',
        ));
        $this->form_validation->set_rules('jumlah_adk', 'Jumlah ADK', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja !',
        ));
        $this->form_validation->set_rules('tahapan_adk', 'Tahapan ADK', 'trim|required',
        array(
          'required' => '%s Harus dipilih !',
        ));
        break;

      case 'dds':
        $this->form_validation->set_rules('tahapan_dds', 'Tahapan DDS', 'trim|required',
        array(
          'required' => '%s Harus dipilih !',
        ));
        $this->form_validation->set_rules('persentase_dds', 'Persentase DDS', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja !',
        ));
        $this->form_validation->set_rules('jumlah_pengajuan', 'Jumlah Pengajuan DDS', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja !',
        ));
        $this->form_validation->set_rules('jumlah_blt_dds', 'Jumlah BLT DDS 3 Bulan', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja Tanpa Symbol Persen !',
        ));
        $this->form_validation->set_rules('jumlah_blt_dds', 'Jumlah Non BLT DDS', 'trim|required|numeric',
        array(
          'required' => '%s Harus diisi !',
          'numeric' => '%s Harus Berisi Angka Saja Tanpa Symbol Persen !',
        ));
        break;
    }
  }

  function isLogin()
  {
    if ($this->session->userdata('userLogin') == FALSE ) {
      // $this->clear_cache();
      $this->session->sess_destroy();
      $this->session->set_flashdata('nologin', 'Anda harus login terlebih dahulu agar bisa mengakses aplikasi ini !');
      redirect(base_url('sign_in'));
    }
  }

  function log_out()
  {
    $id = $this->session->userdata('id');
    $setLogin['isLogin'] = 0;
    $this->crud->update_login($id, $setLogin);
    $this->session->sess_destroy();
    $this->session->set_flashdata('msg', 'Anda telah keluar dari aplikasi !');
    // redirect(base_url('sign_in'));
  }

}
