<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_gampong_all()
  {
    $this->db->select('idG,namaG');
    $this->db->where('status', 1);
    $this->db->where('isLokal', 0);
    $query = $this->db->get('_gampong');
    return $query;
  }


  function save_gampong($_gampong)
  {
    return $this->db->insert('_gampong', $_gampong);
  }

  function save_alamat($_alamat)
  {
    return $this->db->insert('_alamat', $_alamat);
  }

  function save_penduduk($_penduduk)
  {
    return $this->db->insert('_penduduk', $_penduduk);
  }
}
