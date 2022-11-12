<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_main extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function sum_adk()
  {
    return $this->db->get('_alokasi_dana_desa')->num_rows();
  }

  function sum_dds()
  {
    return $this->db->get('_dana_desa')->num_rows();
  }

  function sum_adk_kec()
  {
    $this->db->where('kategoriSuratRk', 'adk');
    return $this->db->get('_respon_kecamatan')->num_rows();
  }

  function sum_dds_kec()
  {
    $this->db->where('kategoriSuratRk', 'dds');
    return $this->db->get('_respon_kecamatan')->num_rows();
  }

  function sum_ajb()
  {
    return $this->db->get('_akta_jual_beli')->num_rows();
  }

  function sum_rekomendasi()
  {
    return $this->db->get('_rekomendasi_bantuan')->num_rows();
  }

  function sum_gampong()
  {
    $this->db->where('statusG', 1);
    return $this->db->get('_gampong')->num_rows();
  }

  function sum_user()
  {
  return $this->db->get('_user')->num_rows();
  }
}
