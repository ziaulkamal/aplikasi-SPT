<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = array(
      'title' => 'Selamat Datang di Si-Batuah !',
      'page' => 'sign_in',
      'err' => 'sign_in'
    );
    $this->load->view('main', $data);
  }

  function sign_up()
  {
    $data = array(
      'title' => 'Daftar Akun Pengguna Baru di Si-Batuah !',
      'page' => 'sign_up',
      'err' => 'sign_up'
    );
    $this->load->view('main', $data);
  }

  public function error_404()
  {
    $data = array(
      'title' => 'Halaman Tidak Ditemukan',
      'page' => '404',
      'err' => '404'
    );
    $this->load->view('main', $data);
  }
}
