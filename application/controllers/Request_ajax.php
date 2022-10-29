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

  function get_penduduk_all()
  {
    $get_penduduk = json_encode($this->call->get_penduduk_lokal()->result());
    echo $get_penduduk;
  }

  function jsonPenduduk($nik)
  {
    $data = $this->call->autofill($nik);
    echo json_encode($data->row_array());

  }

}
