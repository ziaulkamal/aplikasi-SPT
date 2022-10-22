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
    $this->db->join('_penduduk', '_penduduk.nikP = _user.pendudukUid');
    $this->db->where('email', $email);
    $this->db->where('passwd', $pass);
    $query = $this->db->get('_user', 1, 0);
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
}
