<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('userLogin') == FALSE ) {
      // $this->clear_cache();
      $this->session->sess_destroy();
      $this->session->set_flashdata('nologin', 'Anda harus login terlebih dahulu agar bisa mengakses aplikasi ini !');
      redirect(base_url('sign_in'));
    }
  }

  function index()
  {
    $data = array(
      'title' => 'Dashboard',
      'opt'   => 'dashboard',
      'page'  => 'page/dashboard',
    );
    $this->load->view('main', $data);
    // $this->load->view('main');
  }

}
