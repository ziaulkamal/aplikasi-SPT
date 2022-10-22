<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ceks extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    if ($this->session->userdata('userLogin') == FALSE ) {
      $this->session->set_flashdata('nologin', 'Anda harus login terlebih dahulu agar bisa mengakses aplikasi ini !');
      // $this->clear_cache();
      $this->session->sess_destroy();
      $this->session->set_userdata(array('userLogin' => FALSE));
      redirect(base_url('sign_in'));
    //Codeigniter : Write Less Do More
    }
  }

  function index()
  {
    echo $this->session->userdata('userLogin');
    // $this->session->sess_destroy();
    // var_dump($this->session->userdata());
  }

}
