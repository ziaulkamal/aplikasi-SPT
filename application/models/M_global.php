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

  function get_responAll($id)
  {
    $this->db->join('_gampong', '_gampong.idG = _respon_kecamatan.gampongIdRk');
    $this->db->where('idRk', $id);
    return $this->db->get('_respon_kecamatan');
  }

  function getPetugasKecamatan($status)
  {
    $this->db->where('statusKecamatan', $status);
    $this->db->limit(1);
    return $this->db->get('_kecamatan');
  }

  function loginValidation($email, $passwd)
  {
    $this->db->where('email', $email);
    $this->db->where('password', $passwd);
    return $this->db->get('_petugas');
  }

  function update_admin_log($id, $data)
  {
    $this->db->where('petugasIdP', $id);
    $this->db->update('_petugas', $data);
  }

  function getRekomendasiBantuan($id)
  {
    $this->db->join('_gampong', '_gampong.idG = _rekomendasi_bantuan.gampongRbId');
    $this->db->where('idRb', $id);
    return $this->db->get('_rekomendasi_bantuan')->row();
  }


}
