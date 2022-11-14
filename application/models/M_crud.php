<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_crud extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_gampong_all_lokal()
  {
    $this->db->select('idG,namaG');
    $this->db->where('statusG', 1);
    $this->db->where('isLokal', 0);
    $query = $this->db->get('_gampong');
    return $query;
  }

  function get_gampong_all()
  {
    $this->db->select('idG,namaG');
    $this->db->where('statusG', 1);
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

  function get_penduduk_lokal()
  {
    $this->db->select('*');
    $this->db->join('_gampong', '_gampong.idG = _penduduk.gampongPid');
    $this->db->join('_alamat', '_alamat.idA = _penduduk.alamatPid');
    $this->db->where('_gampong.isLokal', 0);
    $query = $this->db->get('_penduduk');
    return $query;
  }

  function get_penduduk_luar()
  {
    $this->db->select('*');
    $this->db->join('_gampong', '_gampong.idG = _penduduk.gampongPid');
    $this->db->join('_alamat', '_alamat.idA = _penduduk.alamatPid');
    $this->db->where('_gampong.isLokal', 1);
    $query = $this->db->get('_penduduk');
    return $query;
  }

  function get_complete_gampong()
  {
    $this->db->select('*');
    $this->db->where('statusG', 1);
    $this->db->where('isLokal', 0);
    $query = $this->db->get('_gampong');
    return $query;
  }

  function add_users($data)
  {
    return $this->db->insert('_log_sign_up', $data);
  }

  function get_user_login($email, $pass)
  {
    $this->db->select('*');
    // $this->db->join('_penduduk', '_penduduk.nikP = _user.pendudukUid');
    $this->db->where('email', $email);
    $this->db->where('passwd', $pass);
    $query = $this->db->get('_user');
    return $query;
  }

  function get_complete_login($email, $pass)
  {
    $this->db->select('*');
    $this->db->join('_penduduk', '_penduduk.nikP = _user.pendudukUid');
    $this->db->where('email', $email);
    $this->db->where('passwd', $pass);
    $query = $this->db->get('_user');
    return $query;
  }

  function get_mail_log($email)
  {
    $this->db->select('*');
    $this->db->where('emailL', $email);
    $this->db->limit('1');
    $query = $this->db->get('_log_sign_up');
    return $query;
  }

  function get_user_all_pending()
  {
    $this->db->select('*');
    $this->db->where('statusL', 0);
    $query = $this->db->get('_log_sign_up');
    return $query;
  }

  function get_user_all_active()
  {
    $this->db->select('*');
    $this->db->join('_penduduk', '_penduduk.nikP = _user.pendudukUid');
    $this->db->join('_jabatan', '_jabatan.idJ = _penduduk.jabatanPid');
    $this->db->join('_gampong', '_gampong.idG = _penduduk.gampongPid');
    $this->db->join('_alamat', '_alamat.idA = _penduduk.alamatPid');
    $this->db->where('status', 1);
    $query = $this->db->get('_user');
    return $query;
  }

  function get_single_log_sign_up($id)
  {
    $this->db->select('*');
    $this->db->where('idL', $id);
    $query = $this->db->get('_log_sign_up', 1);
    return $query;
  }

  function update_log_sign_up($id,$update_log)
  {
    $this->db->where('idL', $id);
    $this->db->update('_log_sign_up', $update_log);
    return;
  }

  function save_user($data)
  {
    return $this->db->insert('_user', $data);
  }

  function delete_user_log($id)
  {
    $this->db->where('idL', $id);
    return $this->db->delete('_log_sign_up');
  }

  function update_login($id,$setLogin)
  {
    $this->db->where('idU', $id);
    return $this->db->update('_user', $setLogin);
  }

  function save_jabatan($data)
  {
    return $this->db->insert('_jabatan', $data);
  }

  function get_jabatan_all()
  {
    $this->db->where('statusJ', 1);
    $query = $this->db->get('_jabatan');
    return $query;
  }

  function get_is_user()
  {
    $this->db->select('*');
    $this->db->join('_user', '_user.pendudukUid = _penduduk.nikP');
    $this->db->join('_jabatan', '_jabatan.idJ = _penduduk.jabatanPid');
    $this->db->where('isUsr', 1);
    $query = $this->db->get('_penduduk');
    return $query;
  }

  function get_detail_user($id)
  {
    $this->db->select('*');
    $this->db->join('_user', '_user.pendudukUid = _penduduk.nikP');
    $this->db->join('_jabatan', '_jabatan.idJ = _penduduk.jabatanPid');
    $this->db->where('idU', $id);
    $query = $this->db->get('_penduduk');
    return $query;
  }

  function update_set_admin($id, $data)
  {
    $this->db->where('idU', $id);
    return $this->db->update('_user', $data);
  }

  function update_penduduk_admin($idP,$_penduduk)
  {
    $this->db->where('idP', $idP);
    return $this->db->update('_penduduk', $_penduduk);
  }

  function delete_alamat($alamat_id)
  {
    $this->db->where('idA', $alamat_id);
    return $this->db->delete('_alamat');
  }

  function save_reset_password($data)
  {
    return $this->db->insert('_reset_request', $data);
  }

  function get_reset($email)
  {
    $this->db->select('*');
    $this->db->where('emailReset', $email);
    $query = $this->db->get('_reset_request',1);
    return $query;
  }

  function action_token($token)
  {
    $this->db->select('*');
    $this->db->where('tokenReset', $token);
    $query = $this->db->get('_reset_request');
    return $query;
  }

  function delete_token($token)
  {
    $this->db->where('tokenReset', $token);
    return $this->db->delete('_reset_request');
  }

  function update_password($email, $data)
  {
    $this->db->where('email', $email);
    return $this->db->update('_user', $data);
  }

  function autofill($nik)
  {
    $this->db->select('*');
    $this->db->where('nikP', $nik);
    $this->db->join('_gampong', '_gampong.idG = _penduduk.gampongPid');
    $this->db->join('_jabatan', '_jabatan.idJ = _penduduk.jabatanPid');
    $this->db->join('_alamat', '_alamat.idA = _penduduk.alamatPid');
    $query = $this->db->get('_penduduk');
    return $query;
  }

  function save_dds($data)
  {
    return $this->db->insert('_dana_desa', $data);
  }

  function save_adk($data)
  {
    return $this->db->insert('_alokasi_dana_desa', $data);
  }

  function get_user_dana_desa($gampond_id)
  {
    // $this->db->join('_jabatan', '_jabatan.idJ = _dana_desa.jabatanDdid');
    // $this->db->join('_gampong', '_gampong.idG = _dana_desa.gampongDid');
    // // $this->db->join('_penduduk', '_penduduk.idP = _dana_desa.pendudukDdid');
    // $this->db->join('_penduduk', '_penduduk.jabatanPid = _jabatan.idJ');
    $this->db->where('gampongDid', $gampond_id);
    $this->db->order_by('createdAtDD', 'DESC');
    $query = $this->db->get('_dana_desa');
    return $query;

  }

  function get_user_dana_adk($gampond_id)
  {
    // $this->db->join('_jabatan', '_jabatan.idJ = _alokasi_dana_desa.jabatanAid');
    // $this->db->join('_gampong', '_gampong.idG = _alokasi_dana_desa.gampongAdkid');
    // // $this->db->join('_penduduk', '_penduduk.idP = _dana_desa.pendudukDdid');
    // $this->db->join('_penduduk', '_penduduk.jabatanPid = _jabatan.idJ');
    $this->db->where('gampongAdkid', $gampond_id);
    $this->db->order_by('createdAtDk', 'DESC');
    $query = $this->db->get('_alokasi_dana_desa');
    return $query;

  }

  function upload_file($data)
  {
    return $this->db->insert('_upload_dokumen', $data);
  }

  function get_upload_file()
  {
    $this->db->select('*');
    $this->db->order_by('createdAtUd', 'DESC');
    return $this->db->get('_upload_dokumen');
  }

  function get_upload_single($id)
  {
    $this->db->select('*');
    $this->db->where('idUd', $id);
    return $this->db->get('_upload_dokumen');
  }

  function upload_delete($id)
  {
    $this->db->where('idUd', $id);
    return $this->db->delete('_upload_dokumen');
  }

  function update_upload($id, $data)
  {
    $this->db->where('idUd', $id);
    return $this->db->update('_upload_dokumen', $data);
  }

  function get_gampong_single($id)
  {
    $this->db->where('idG', $id);
    return $this->db->get('_gampong');
  }

  function get_pendudukBy_gampong($gampong)
  {
    $this->db->where('gampongPid', $gampong);
    return $this->db->get('_penduduk');
  }

  function get_pendudukAndJabatan($id)
  {
    $this->db->where('idGampong', $id);
    return $this->db->get('_petugas_master');
  }

  function getGeuchik($id)
  {
    $this->db->where('idGampong', $id);
    $this->db->where('jabatanPenduduk', 'Keuchik');
    return $this->db->get('_petugas_master');
  }

  function getKaur($id)
  {
    $this->db->where('idGampong', $id);
    $this->db->where('jabatanPenduduk', 'Kaur Keuangan');
    return $this->db->get('_petugas_master');
  }

  function getSekdes($id)
  {
    $this->db->where('idGampong', $id);
    $this->db->where('jabatanPenduduk', 'Sekretaris Gampong');
    return $this->db->get('_petugas_master');
  }

  function get_single_jabatan($jabatan)
  {
    $this->db->where('idJ', $jabatan);
    return $this->db->get('_jabatan');
  }

  function update_penggunaan_jabatan($id, $data)
  {
    $this->db->where('idG', $id);
    return $this->db->update('_gampong', $data);
  }

  function update_penduduk_jabatan($idP,$setJabatan)
  {
    $this->db->where('idP', $idP);
    return $this->db->update('_penduduk', $setJabatan);
  }

  function delete_berkas_surat($set, $id)
  {
    if ($set == 'adk') {
      $this->db->where('idAdk', $id);
      $this->db->delete('_alokasi_dana_desa');
      return;
    }elseif ($set == 'dds') {
      $this->db->where('idDd', $id);
      $this->db->delete('_dana_desa');
      return;
    }
  }

  function getPetugasByGampong($gampong)
  {
    $this->db->join('_gampong', '_gampong.idG = _penduduk.gampongPid');
    $this->db->where('gampongPid', $gampong);
    return $this->db->get('_penduduk');
  }

  function gampong_petugas($gampong)
  {
    $this->db->where('idG', $gampong);
    return $this->db->get('_gampong')->row();
  }

  function getJabatanGampong()
  {
    $this->db->where('kodeJabatan', 'G');
    return $this->db->get('_jabatan')->result();
  }

  function update_jabatan_petugas($gampong, $data_gampong)
  {
    $this->db->where('idG', $gampong);
    return $this->db->update('_gampong', $data_gampong);
  }

  function update_penduduk_jabatans($petugas, $data)
  {
    $this->db->where('idP', $petugas);
    return $this->db->update('_penduduk', $data);
  }

  function checkNamaPetugas($id)
  {
    $this->db->where('idP', $id);
    return $this->db->get('_penduduk', 1)->row();
  }

  function delete_penduduk($id)
  {
    $this->db->where('idP', $id);
    return $this->db->delete('_penduduk');
  }
}
