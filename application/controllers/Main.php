<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
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
