<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kecamatan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function getAll()
  {
    $this->db->order_by('createdAtK', 'DESC');
    return $this->db->get('_kecamatan');
  }

  function save_petugas($data)
  {
    return $this->db->insert('_kecamatan', $data);
  }

  function saveAdmin($data)
  {
    return $this->db->insert('_petugas', $data);
  }

  function updateAdmin($id, $data)
  {
    $this->db->where('petugasIdP', $id);
    return $this->db->update('_petugas', $data);
  }

  function getAdminId($id)
  {
    $this->db->where('petugasIdP', $id);
    return $this->db->get('_petugas')->row();
  }

  function delAdminId($id)
  {
    $this->db->where('petugasIdP', $id);
    return $this->db->delete('_petugas');
  }

  function del_petugas($id)
  {
    $this->db->where('idK', $id);
    return $this->db->delete('_kecamatan');
  }

  function getAdmin()
  {
    $this->db->order_by('petugasIdP', 'DESC');
    return $this->db->get('_petugas');
  }

  function save_surat($data)
  {
    return $this->db->insert('_respon_kecamatan', $data);
  }

  function getSuratAll()
  {
    $this->db->join('_gampong', '_gampong.idG = _respon_kecamatan.gampongIdRk');
    $this->db->order_by('createdAtRk', 'DESC');
    return $this->db->get('_respon_kecamatan');
  }

  function save_ajb($data)
  {
    return $this->db->insert('_akta_jual_beli', $data);
  }

  function getAjb()
  {
    $this->db->join('_gampong', '_gampong.idG = _akta_jual_beli.lokasiDesa');
    return $this->db->get('_akta_jual_beli');
  }

  function getPetugasKecamatan($status)
  {
    $this->db->where('statusKecamatan', $status);
    return $this->db->get('_kecamatan');
  }

  function getAjbId($no)
  {
    $this->db->where('idAjb', $no);
    return $this->db->get('_akta_jual_beli');
  }

  function delAjb($id)
  {
    $this->db->where('idAjb', $id);
    return $this->db->delete('_akta_jual_beli');

  }

  function getGpId($id)
  {
    $this->db->select('namaG');
    $this->db->where('idG', $id);
    return $this->db->get('_gampong')->row();
  }

  function getBerkasUpload()
  {
    $this->db->join('_gampong', '_gampong.idG = _upload_dokumen.gampondUd');
    return $this->db->get('_upload_dokumen');
  }

  function delete_berkas_upload($id)
  {
    $this->db->where('idUd', $id);
    return $this->db->delete('_upload_dokumen');
  }

  function getRekomendasiAll()
  {
    $this->db->join('_gampong', '_gampong.idG = _rekomendasi_bantuan.gampongRbId');
    return $this->db->get('_rekomendasi_bantuan');
  }

  function save_rekomendasi_bantuan($data)
  {
    return $this->db->insert('_rekomendasi_bantuan', $data);
  }
}
