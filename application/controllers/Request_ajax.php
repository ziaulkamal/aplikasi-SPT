<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request_ajax extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_crud','call');
  }

  function get_gampong_all()
  {
    $get_gampong = json_encode($this->call->get_gampong_all());
    echo $get_gampong;
  }

}
