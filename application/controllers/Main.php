<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_main','m');
    if ($this->session->userdata('userLogin') == FALSE ) {
      // $this->clear_cache();
      $this->session->sess_destroy();
      $this->session->set_flashdata('nologin', 'Anda harus login terlebih dahulu agar bisa mengakses aplikasi ini !');
      redirect(base_url('sign_in'));
    }
  }

  function index()
  {
    $db = array(
      'jumlah_adk' => $this->m->sum_adk(),
      'jumlah_dds' => $this->m->sum_dds(),
      'jumlah_adk_k' => $this->m->sum_adk_kec(),
      'jumlah_dds_k' => $this->m->sum_dds_kec(),
      'jumlah_ajb' => $this->m->sum_ajb(),
      'jumlah_rekomendasi' => $this->m->sum_rekomendasi(),
      'jumlah_gampong' => $this->m->sum_gampong(),
      'jumlah_user' => $this->m->sum_user(),
  );

    $data = array(
      'title' => 'Dashboard',
      'opt'   => 'dashboard',
      'page'  => 'page/dashboard',
      'db'    => $db,
    );
    $this->load->view('main', $data);
    // $this->load->view('main');
  }


}
