<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_crud','crud');
    $this->load->library('form_validation');
  }

  function clear_cache()
  {
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
  }

  function http_request($targetApi)
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $targetApi);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
  }

  function index()
  {
    $data = array(
      'title' => 'Selamat Datang di Si-Batuah !',
      'page' => 'sign_in',
      'err' => 'sign_in'
    );
    $this->load->view('main', $data);
  }

  function sign_up()
  {
    $data = array(
      'title' => 'Daftar Akun Pengguna Baru di Si-Batuah !',
      'page' => 'sign_up',
      'err' => 'sign_up'
    );
    $this->load->view('main', $data);
  }

  function proses_sign_up()
  {
    $param = 'register';
    $db = $this->http_request('https://api.db-ip.com/v2/free/self');
    $res = json_decode($db, TRUE);
    $this->_rules($param);


    if ($this->form_validation->run() == FALSE) {
      $this->sign_up();
    }else {

      $data = array(
        'nama_lengkap'  => ucwords($this->input->post('nama', TRUE)),
        'emailL'        => $this->input->post('email', TRUE),
        'password'      => $this->input->post('password', TRUE),
        'statusL'       => 0,
        'createdAt'     => date('Y-m-d'),
        'ip'            => $res['ipAddress'],
        'wilayahL'       => $res['countryName']
      );

      $this->crud->add_users($data);
      $this->session->set_flashdata('msg', 'Akun berhasil dibuatkan, silahkan tunggu untuk proses aktivasi melalui kecamatan singkil !');
      redirect('sign_in');
    }

  }

  function proses_login()
  {
    $email = $this->input->post('email',TRUE);
    $pass  = sha1(md5($this->input->post('password', TRUE)));
    $val = $this->crud->get_user_login($email,$pass);
    $log = $this->crud->get_mail_log($email);
    $active = $log->num_rows();
    $data = $val->row_array();

    if ($active > 0 && $log->row_array()['statusL'] < 1) {
      $this->session->set_flashdata('wrong', 'Email yang anda masukan sudah terdaftar, namun belum di aktifkan di kecamatan !');
      redirect('sign_in');
    }elseif ($active < 1) {
      $this->session->set_flashdata('wrong', 'Email yang anda masukan belum terdaftar, silahkan lakukan pendaftaran terlebih dahulu !');
      redirect('sign_in');
    }else {
      if ($val->num_rows() < 1 ) {
        $this->session->set_flashdata('wrong', 'Email atau password yang anda masukan salah');
        redirect('sign_in');
      }else {
        if ($data['isLogin'] == '1') {
          $this->session->set_flashdata('wrong', 'Anda sedang login di perangkat lain, silahkan keluar dari perangkat sebelumnya.<br /><br />Jika anda tidak melakukan nya silahkan hubungi operator di kecamatan !');
          redirect('sign_in');
        }else {
          if ($data['pendudukUid'] == 0) {
            $setLogin['isLogin'] = 1;
            $this->crud->update_login($data['idU'],$setLogin);
            $session_start = array(
              'userLogin' => TRUE,
              'id'        => $data['idU'],
              'email'     => $data['email'],
              'level'     => $data['lvl'],
              'stemp'     => sha1($data['email']),
              'complete'  => FALSE,
          );
          $this->session->set_userdata($session_start);
          $this->session->set_flashdata('wellcome', 'Selamat datang di Si-Batuah (Sistem Pelayanan Administrasi Berbasis Aplikasi Online Terukur dan Mudah).');
          redirect('complete/register/'.sha1($data['email']));
        }elseif ($data['pendudukUid'] > 0) {
          $setLogin['isLogin'] = 1;
          $this->crud->update_login($data['idU'],$setLogin);
          $session_start = array(
            'userLogin' => TRUE,
            'nama'      => $data['namaP'],
            'id'        => $data['idU'],
            'email'     => $data['email'],
            'level'     => $data['lvl'],
            'stemp'     => sha1($data['email']),
            'complete'  => TRUE,
        );
        if ($data['lvl'] == 3) {
          $session_start['operator'] = 'gampong';
          $session_start['gampong'] = $data['gampongPid'];
        }elseif ($data['lvl'] == 2) {
          $session_start['operator'] = 'kecamatan';
        }elseif ($data['lvl'] == 1){
          $session_start['operator'] = 'super-admin';
        }
        $this->session->set_userdata($session_start);
        $this->session->set_flashdata('wellcome', 'Selamat datang di Si-Batuah (Sistem Pelayanan Administrasi Berbasis Aplikasi Online Terukur dan Mudah).');
        redirect('main');
        }

        }

      }
    }
  }

  function data_user($part)
  {
    $this->isLogin();
    if ($part == 'pending') {
      $db = $this->crud->get_user_all_pending()->result();
      $title2 = '[ Menunggu Persetujuan ]';
    }elseif ($part == 'aktiv') {
      $title2 = '[ Pengguna Aktiv ]';
    }else {
      $this->log_out();
      redirect('404');
    }
    $data = array(
      'title' => 'Data Pengguna',
      'title2' => $title2,
      'opt'   => 'table',
      'part'  => $part,
      'page'  => 'page/admin/table_user',
      'db'    => $db
    );

    $this->load->view('main', $data);
  }

  function aktivasi_user($id)
  {
    $this->isLogin();
    $req = $this->crud->get_single_log_sign_up($id)->row_array();
    $encrypt = bin2hex(base64_encode($req['password']));

    $update_log = array(
      'statusL' => 1,
      'password' => $encrypt,
    );

    $data = array(
      'email' => $req['emailL'],
      'lvl' => 3,
      'passwd' => sha1(md5($req['password'])),
      'createdAt' => date('Y-m-d'),
      'status' => 1,
    );

    $this->crud->update_log_sign_up($id,$update_log);
    $this->crud->save_user($data);
    $this->session->set_flashdata('msg', 'User dengan email pengunna <b>[ ' . $req['emailL'] . ' ]</b> berhasil di aktifkan');
    redirect('admin/user/pending');
  }

  function reject_user($id)
  {
    $this->isLogin();
    $req = $this->crud->get_single_log_sign_up($id)->row_array();
    $this->crud->delete_user_log($id);
    $this->session->set_flashdata('msg', 'Email pengunna <b>[ ' . $req['emailL'] . ' ]</b> berhasil di reject');
    redirect('admin/user/pending');
  }

  public function error_404()
  {
    $data = array(
      'title' => 'Halaman Tidak Ditemukan',
      'page' => '404',
      'err' => '404'
    );
    $this->load->view('main', $data);
  }

  function jabatan_set()
  {
    $this->isLogin();
    $data = array(
      'title' => 'Tambah Golongan Jabatan',
      'opt'   => 'form',
      'page'  => 'page/admin/add_jabatan',
    );
    $this->load->view('main', $data);
  }

  function proses_jabatan()
  {
    $this->isLogin();
    $this->_rules('jabatan');

    if ($this->form_validation->run() == FALSE) {
      $this->jabatan_set();
    }else {
      $opsi = $this->input->post('kebutuhan');

      if ($opsi == 'G') {
        $pesan = 'Gampong / Kelurahan';
      }else {
        $pesan = 'Kecamatan';
      }
      $data = array(
        'idJ' => $this->input->post('kebutuhan').time(),
        'label' => ucwords($this->input->post('jabatan')),
        'createdAt' => date('Y-m-d'),
        'statusJ' => 1,
      );

      $this->crud->save_jabatan($data);
      $this->session->set_flashdata('msg', 'Berhasil menambakan ' . $data['label'] . ' untuk kebutuhan ' . $pesan);
      redirect('jabatan/_tambah');
    }

  }

  function _rules($param)
  {
    if ($param == 'register') {
      $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[5]|max_length[30]', array( 'min_length' => '%s tidak boleh pendek', 'max_length' => '%s terlalu panjang', 'required'   => 'Bagian %s harus diisi dengan benar', 'xss_clean'   => 'Tidak boleh menggunakan illegal karakter', ));
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[_log_sign_up.emailL]|is_unique[_user.email]', array( 'required'   => 'Bagian %s harus diisi dengan benar', 'valid_email'   => 'Format %s harus benar', 'is_unique'   => '%s sudah pernah terdata harap pilih email lain', ));
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[30]', array( 'min_length' => '%s tidak boleh pendek', 'max_length' => '%s terlalu panjang', 'required' => '%s harus di isi', ));
      $this->form_validation->set_rules('repassword', 'Password Konfirmasi', 'trim|required|min_length[5]|max_length[30]|matches[password]', array( 'min_length' => '%s tidak boleh pendek', 'max_length' => '%s terlalu panjang', 'matches' => '%s tidak sama', 'required' => '%s harus di isi', ));
      return;
    }elseif ($param == 'login') {
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array( 'required'   => 'Bagian %s harus diisi dengan benar'));
      $this->form_validation->set_rules('password', 'Password', 'trim|required', array( 'required'   => 'Bagian %s harus diisi dengan benar'));
      return;
    }elseif ($param == 'jabatan') {
      $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required|min_length[5]|max_length[30]', array(
        'required' => 'Bagian %s harus di isi',
        'min_length' => 'Bagian %s harus di isi, sekurang kurang-kurang nya 5 karakter',
      ));
    }
  }

  function isLogin()
  {
    if ($this->session->userdata('userLogin') == FALSE ) {
      // $this->clear_cache();
      $this->session->sess_destroy();
      $this->session->set_flashdata('nologin', 'Anda harus login terlebih dahulu agar bisa mengakses aplikasi ini !');
      redirect(base_url('sign_in'));
    }
  }

  function log_out()
  {
    $id = $this->session->userdata('id');
    $setLogin['isLogin'] = 0;
    $this->crud->update_login($id, $setLogin);
    $this->session->sess_destroy();
    $this->session->set_flashdata('msg', 'Anda telah keluar dari aplikasi !');
    redirect(base_url('sign_in'));
  }
}
