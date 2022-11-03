<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_global extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getGampong($gampong)
  {
    $this->db->where('idG', $gampong);
    return $this->db->get('_gampong');
  }

  function get_adk_file($id)
  {
    $this->db->where('idAdk', $id);
    $this->db->join('_petugas_master', '_petugas_master.idPenduduk = _alokasi_dana_desa.pendudukAid');
    return $this->db->get('_alokasi_dana_desa');
  }

  function get_dds_file($id)
  {
    $this->db->where('idDd', $id);
    $this->db->join('_petugas_master', '_petugas_master.idPenduduk = _dana_desa.pendudukDdid');
    return $this->db->get('_dana_desa');
  }

  function get_perangkat_desa($id)
  {
    $this->db->where('idPenduduk', $id);
    return $this->db->get('_petugas_master')->row();
  }
}
