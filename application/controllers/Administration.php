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

  function dDesa_select()
  {
    $data = array(
      'title' => 'Dana Desa',
      'opt'   => 'form',
      'page'  => 'page/dana_desa/data_dana_desa',
    );
    $this->load->view('main', $data);
  }

  function dDesa_reg($set)
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
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', array('required' => '%s harus di pilih'));
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
        'jabatanPid'    => $this->input->post('jabatan', TRUE),
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
