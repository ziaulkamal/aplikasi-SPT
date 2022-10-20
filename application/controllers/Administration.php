<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_crud','crud');
    $this->load->library('form_validation');
    //Codeigniter : Write Less Do More
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
    $get_gampong = $this->crud->get_gampong_all()->result();
    $count_gampong = $this->crud->get_gampong_all()->num_rows();
    $data = array(
      'title' => 'Tambah Penduduk',
      'opt'   => 'form',
      'set'   => $set,
      'page'  => 'page/penduduk/add_penduduk',
      'db'    => $get_gampong,
      'count' => $count_gampong
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

        $_penduduk['alamatPid'] = 'L'.time();
        $_penduduk['gampongPid'] = $this->input->post('gampong',TRUE);
        $_alamat = array(
          'idA'       => 'LO'.time(),
          'labelA'    => 'lokal kecamatan singkil',
          'alamatA'   => $this->input->post('alamat'),
          'createdAt' => $date,
        );
        $this->crud->save_alamat($_alamat);

      }elseif ($typeSet == 'luar') {

        $_penduduk['alamatPid'] = 'LU'.time();
        $_alamat = array(
          'idA'       => 'L'.time(),
          'labelA'    => 'lokal kecamatan singkil',
          'alamatA'   => $this->input->post('alamat'),
          'createdAt' => $date,
        );
        $this->crud->save_alamat($_alamat);

        $_gampong = array(
          'idG' => time(),
          'namaG' => $this->input->post('gampong'),
          'createdAt' => $date,
          'status' => 1,
          'isLokal' => 1,
        );
        $_penduduk['gampongPid'] = $this->input->post('count') + 1;
        $this->crud->save_gampong($_gampong);

      }else {
        redirect(base_url('penduduk/_tambah/').$typeSet);
      }

      $_penduduk = array(
        'isUsr'         => 0,
        'namaP'         => $this->input->post('nama_lengkap',TRUE),
        'nikP'          => $this->input->post('nik',TRUE),
        'jenisKelaminP' => $this->input->post('jenisKelamin',TRUE),
        'jabatanPid'    => 0,
        'nomorHpP'      => $this->input->post('hp',TRUE),
        'createdAt'     => $date,
      );

      $this->crud->save_penduduk($_penduduk);

    }


  }

  function penduduk_reg_select()
  {
    $data = array(
      'title' => 'Tambah Penduduk',
      'opt'   => 'form',
      'page'  => 'page/penduduk/add_penduduk',
      'db'    => ''
    );

    $this->load->view('main', $data);
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


  public function _rules_penduduk()
  {
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[50]', array( 'required' => 'Anda harus mengisi bagian %s', ));
    $this->form_validation->set_rules('nik', 'Nomor Induk Kependudukan', 'trim|required|min_length[16]|max_length[16]|is_unique[_penduduk.nikP]', array( 'required' => 'Anda harus mengisi bagian %s', 'is_unique' => '%s sudah terdata, harap pastikan data nik yang diisi tidak boleh duplikasi', ));
    $this->form_validation->set_rules('jenisKelamin', 'Jenis Kelamin', 'trim|required', array( 'required' => 'Anda harus mengisi bagian %s', ));
    $this->form_validation->set_rules('gampong', 'Kelurahan / Gampong', 'trim|required|min_length[1]', array( 'required' => 'Anda harus mengisi bagian %s', 'min_length' => 'Harap memilih %s' ));
    $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required', array( 'required' => 'Anda harus mengisi bagian %s', ));

    return;
  }

}
