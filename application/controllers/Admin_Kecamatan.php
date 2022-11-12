<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Kecamatan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model('M_kecamatan', 'm');
    $this->load->model('M_crud', 'g');
    $this->load->library('form_validation');
    if ($this->session->userdata('isAdmin') != TRUE || $this->session->userdata('complete') != TRUE) {
      $this->session->sess_destroy();
      redirect('sign_in');
    }
  }

  function index()
  {
    $data = array(
      'title' => 'Dashboard Kecamatan',
      'opt'   => 'table',
      'page'  => 'page/kecamatan/index',
      'db'    => ''
    );

    $this->load->view('main', $data);
  }

  function daftarSurat()
  {
    $db = $this->m->getSuratAll()->result();
    $data = array(
      'title' => 'Daftar - Daftar Surat Untuk Desa / Gampong',
      'opt'   => 'table',
      'page'  => 'kecamatan/daftar_surat',
      'db'    => $db
    );

    $this->load->view('main', $data);
  }

  function buatSurat($jenis, $page)
  {
    $db = $this->g->get_gampong_all_lokal()->result();
    $data = array(
      'title'     => 'Dashboard Kecamatan',
      'opt'       => 'table',
      'page'      => 'kecamatan/buat_surat',
      'jenis'     => $jenis,
      'tipe'      => $page,
      'db'        => $db
    );

    $this->load->view('main', $data);
  }

  function prosesBuatSurat($jenis, $page)
  {
    $date = date('Y-m-d');
    $this->_rulesBuatSurat($page,$jenis);
    if ($this->form_validation->run() == FALSE) {
      $this->buatSurat($jenis, $page);
    }else {
      if ($page == 'adk') {
        switch ($jenis) {
          case 'sp':
            $data = array(
              'jenisSuratRk'          => $jenis,
              'kategoriSuratRk'       => $page,
              'gampongIdRk'           => $this->input->post('gampong'),
              'nomorSuratRk'          => $this->input->post('nomor'),
              'tahunAnggaranRk'       => $this->input->post('tahun'),
              'tahapanAdkRk'          => $this->input->post('tahapan_adk'),
              'persentaseAdkRk'       => $this->input->post('persen_adk'),
              'createdAtRk'           => $date,
            );
            break;

          case 'sr':
            $data = array(
              'jenisSuratRk'          => $jenis,
              'kategoriSuratRk'       => $page,
              'gampongIdRk'           => $this->input->post('gampong'),
              'nomorSuratRk'          => $this->input->post('nomor'),
              'tahunAnggaranRk'       => $this->input->post('tahun'),
              'tahapanAdkRk'          => $this->input->post('tahapan_adk'),
              'persentaseAdkRk'       => $this->input->post('persen_adk'),
              'tahapanPdrbRk'         => $this->input->post('tahapan_pajak'),
              'persentasePdrbRk'      => $this->input->post('persentase_pajak'),
              'createdAtRk'           => $date,
            );
            break;

          case 'spv':
            $data = array(
              'jenisSuratRk'          => $jenis,
              'kategoriSuratRk'       => $page,
              'gampongIdRk'           => $this->input->post('gampong'),
              'tahunAnggaranRk'       => $this->input->post('tahun'),
              'tahapanAdkRk'          => $this->input->post('tahapan_adk'),
              'persentaseAdkRk'       => $this->input->post('persen_adk'),
              'tahapanPdrbRk'         => $this->input->post('tahapan_pajak'),
              'persentasePdrbRk'      => $this->input->post('persentase_pajak'),
              'nilaiAnggaranAdkRk'    => $this->input->post('anggaran'),
              'nilaiPdrbAdkRk'        => $this->input->post('nilai_pajak_anggaran'),
              'createdAtRk'           => $date,
            );
            break;

        }
        $this->m->save_surat($data);
        $this->session->set_flashdata('msg','Berhasil Membuat Surat');

      }

      if ($page == 'dds') {
    	// idRk	jenisSuratRk	kategoriSuratRk	nomorSuratRk	tahunAnggaranRk	tahapanAdkRk	persentaseAdkRk	tahapanPdrbRk	persentasePdrbRk	gampongIdRk	nilaiAnggaranAdkRk	nilaiPdrbAdkRk	tahapanDdsRk	persentaseDdsRk	ddsPenyerapanRk	outputDdsRk	statusRk	petugasId	createdAtRk	fileRk
        switch ($jenis) {
          case 'sp':
            $data = array(
              'jenisSuratRk'          => $jenis,
              'kategoriSuratRk'       => $page,
              'gampongIdRk'           => $this->input->post('gampong'),
              'nomorSuratRk'          => $this->input->post('nomor'),
              'tahunAnggaranRk'       => $this->input->post('tahun'),
              'tahapanDdsRk'          => $this->input->post('tahapan_dds'),
              'persentaseDdsRk'       => $this->input->post('persentase_dds'),
              'createdAtRk'           => $date,
            );
            break;
          case 'sr':
            $data = array(
              'jenisSuratRk'          => $jenis,
              'kategoriSuratRk'       => $page,
              'gampongIdRk'           => $this->input->post('gampong'),
              'nomorSuratRk'          => $this->input->post('nomor'),
              'tahunAnggaranRk'       => $this->input->post('tahun'),
              'tahapanDdsRk'          => $this->input->post('tahapan_dds'),
              'persentaseDdsRk'       => $this->input->post('persentase_dds'),
              'createdAtRk'           => $date,
            );
            break;
          case 'spv':
            $data = array(
              'jenisSuratRk'          => $jenis,
              'kategoriSuratRk'       => $page,
              'gampongIdRk'           => $this->input->post('gampong'),
              'tahunAnggaranRk'       => $this->input->post('tahun'),
              'tahapanDdsRk'          => $this->input->post('tahapan_dds'),
              'persentaseDdsRk'       => $this->input->post('persentase_dds'),
              'ddsPenyerapanRk'       => $this->input->post('ddsPenyerapanRk'),
              'outputDdsRk'           => $this->input->post('outputDdsRk'),
              'createdAtRk'           => $date,
            );
            break;

        }


      $this->m->save_surat($data);
      $this->session->set_flashdata('msg','Berhasil Membuat Surat');
      }

    }
  }

  function aturPetugas()
  {
    $db = $this->m->getAll()->result();
    $data = array(
      'title' => 'Atur Petugas Kecamatan',
      'opt'   => 'table',
      'page'  => 'kecamatan/aturPetugas',
      'db'    => $db
    );

    $this->load->view('main', $data);
  }

  function deletePetugas($id)
  {
    $this->m->del_petugas($id);
    $this->session->set_flashdata('msg', 'Berhasil menghapus data petugas');
    redirect('pengaturan_kecamatan');
  }

  function prosesPetugas()
  {
    $nama = $this->input->post('nama', TRUE);
    $nip  = $this->input->post('nip', TRUE);
    $status = $this->input->post('status', TRUE);
    $this->_rulesDasar();
    if ($this->form_validation->run() == FALSE) {
      $this->aturPetugas();
    }else {
      $data = array(
        'namaPetugasK' => $nama,
        'nipPetugasK' => $nip,
        'statusKecamatan' => $status,
        'createdAtK' => date('Y-m-d')
      );

      $this->m->save_petugas($data);
      $this->session->set_flashdata('msg', 'Berhasil menambahkan '. ucwords($nama). ' sebagai '. ucwords($status));
      redirect('pengaturan_kecamatan/_tambah');
    }
  }

  function delete_berkas($id)
  {
    $this->m->delete_berkas_upload($id);
    $this->session->set_flashdata('msg', 'Berhasil menghapus data berkas');
    redirect('berkas_masuk');

  }

  function buatAdmin()
  {
    $db = $this->m->getAdmin()->result();
    $data = array(
      'title' => 'Atur Petugas Kecamatan',
      'opt'   => 'table',
      'page'  => 'kecamatan/aturPetugas',
      'db'    => $db,
    );

    $this->load->view('main', $data);
  }

  function edit_petugas($id)
  {
    $db = $this->m->getAdminId($id);
    $data = array(
      'title' => 'Edit Petugas Kecamatan',
      'opt'   => 'table',
      'page'  => 'kecamatan/aturPetugas',
      'db'    => $db,

    );

    $this->load->view('main', $data);
  }

  function berkasMasuk()
  {
    $db = $this->m->getBerkasUpload()->result();
    $data = array(
      'title' => 'Data Berkas Masuk',
      'opt'   => 'table',
      'page'  => 'kecamatan/berkas_masuk',
      'db'  => $db,

    );

    $this->load->view('main', $data);
  }

  function proses_edit_petugas($id)
  {
    $email  = $this->input->post('email');
    $passwd = $this->input->post('password');

    $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[_petugas.email]',array( 'required' => '%s tidak boleh kosong', 'is_unique' => '%s sudah ada', ));

    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',array( 'required' => '%s tidak boleh kosong', 'min_length' => '%s terlalu pendek', ));
    if ($this->form_validation->run() == FALSE) {
      $this->edit_petugas($id);
    }else {
      $data = array(
        'email' => $email,
        'password' => md5(sha1($passwd)),
        'statusPetugas' => 1,
      );
      $this->m->updateAdmin($id, $data);
      $this->session->set_flashdata('msg', 'Berhasil update akun petugas baru dengan email <code>'.$email.'</code> dan password <code>'. $passwd .'</code>');
      redirect('atur_petugas_baru');
      }
  }

  function hapusAdmin($id)
  {
    $this->m->delAdminId($id);
    $this->session->set_flashdata('msg', 'Berhasil menghapus petugas');
    redirect('atur_petugas_baru');
  }

  function processBuatAdmin()
  {
    $email  = $this->input->post('email');
    $passwd = $this->input->post('password');

    $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[_petugas.email]',array( 'required' => '%s tidak boleh kosong', 'is_unique' => '%s sudah ada', ));

    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',array( 'required' => '%s tidak boleh kosong', 'min_length' => '%s terlalu pendek', ));
    if ($this->form_validation->run() == FALSE) {
      $this->buatAdmin();
    }else {
      $data = array(
        'email' => $email,
        'password' => md5(sha1($passwd)),
        'statusPetugas' => 1,
      );
      $this->m->saveAdmin($data);
      $this->session->set_flashdata('msg', 'Berhasil membuat akun petugas baru dengan email <code>'.$email.'</code> dan password <code>'. $passwd .'</code>');
      redirect('atur_petugas_baru');
      }

  }

  function rekomendasi_bantuan()
  {
    $db = $this->m->getRekomendasiAll()->result();
    $data = array(
      'title' => 'Data Surat Rekomendasi Bantuan',
      'opt'   => 'table',
      'page'  => 'kecamatan/rekomendasi_bantuan',
      'db'  => $db,

    );

    $this->load->view('main', $data);
  }

  function buatRekomendasi()
  {
    $db = $this->g->get_gampong_all_lokal()->result();
    $data = array(
      'title' => 'Buat Surat Rekomendasi Bantuan',
      'opt'   => 'form',
      'page'  => 'kecamatan/buat_rekomendasi',
      'db'    => $db,


    );

    $this->load->view('main', $data);
  }

  function prosesRekomendasiBantuan()
  {
    $this->_rulesBantuanRekom();
    if ($this->form_validation->run() == FALSE) {
      $this->buatRekomendasi();
    }else {
      $data = array(
        'nomorRb' => $this->input->post('noSurat'),
        'jenisRb' => $this->input->post('jenis'),
        'gampongRbId' => $this->input->post('gampong'),
        'perihalBantuanRb' => $this->input->post('perihal'),
        'penerimaRb' => $this->input->post('penerima'),
        'createdAtRb' => $this->input->post('tanggal'),
        'statusRb' => 0,
      );

      $this->m->save_rekomendasi_bantuan($data);
      $this->session->set_flashdata('msg', 'Berhasil Membuat Surat Rekomendasi Bantuan');
      redirect('rekomendasi_bantuan');
    }
  }

  function _rulesBantuanRekom()
  {
    $this->form_validation->set_rules('noSurat', 'Nomor Surat', 'trim|required',array(
      'required' => '%s Harus di isi !',
    ));
    $this->form_validation->set_rules('gampong', 'Desa / Gampong', 'trim|required',array(
      'required' => '%s Harus dipilih !',
    ));
    $this->form_validation->set_rules('jenis', 'Jenis Rekomendasi', 'trim|required',array(
      'required' => '%s Harus dipilih !',
    ));
    $this->form_validation->set_rules('penerima', 'Penerima Bantuan Rekomendasi', 'trim|required',array(
      'required' => '%s Harus di isi !',
    ));
    $this->form_validation->set_rules('perihal', 'Perihal Bantuan Rekomendasi', 'trim|required',array(
      'required' => '%s Harus di isi !',
    ));
    $this->form_validation->set_rules('tanggal', 'Tanggal Pengajuan', 'trim|required',array(
      'required' => 'Harap Pilih %s !',
    ));
  }

  function buatAJB()
  {
    $db = $this->g->get_gampong_all_lokal()->result();

    $data = array(
      'title' => 'Buat Akta Jual Beli',
      'opt'   => 'form',
      'page'  => 'kecamatan/buat_ajb',
      'db'    => $db
    );

    $this->load->view('main', $data);
  }

  function prosesAjb()
  {
    $this->_rules_ajb();
    if ($this->form_validation->run() == FALSE) {
      $this->buatAJB();
    }else {
      $data = array(
          'nomorAjb' => $this->input->post('no_ajb'),
          'tahunAjb' => date('Y'),
          'nmPs_p1' => $this->input->post('nama_ph1'),
          'nikPs_p1' => $this->input->post('nik_ph1'),
          'pkrPs_p1' => $this->input->post('pk_ph1'),
          'kcPs_p1' => $this->input->post('kc_ph1'),
          'gpPs_p1' => $this->input->post('tpt_ph1'),
          'gplPs_p1' => $this->input->post('tpl_ph1'),
          'tglPs_p1' => $this->input->post('tgl_ph1'),
          'nmrPs_p1' => $this->input->post('nmr_ph1'),
          'p_nmPs_p1' => $this->input->post('nama_ph1_ps1'),
          'p_nikPs_p1' => $this->input->post('nik_ph1_ps1'),
          'p_pkrPs_p1' => $this->input->post('pk_ph1_ps1'),
          'p_kcPs_p1' => $this->input->post('kc_ph1_ps1'),
          'p_gpPs_p1' => $this->input->post('tpt_ph1_ps1'),
          'p_gplPs_p1' => $this->input->post('tpl_ph1_ps1'),
          'p_tglPs_p1' => $this->input->post('tgl_ph1_ps1'),
          'p_nmrPs_p1' => $this->input->post('nmr_ph1_ps1'),
          'nmPs_p2' => $this->input->post('nama_ph2'),
          'nikPs_p2' => $this->input->post('nik_ph2'),
          'pkrPs_p2' => $this->input->post('pk_ph2'),
          'kcPs_p2' => $this->input->post('kc_ph2'),
          'gpPs_p2' => $this->input->post('tpt_ph2'),
          'gplPs_p2' => $this->input->post('tpl_ph2'),
          'tglPs_p2' => $this->input->post('tgl_ph2'),
          'nmrPs_p2' => $this->input->post('nmr_ph2'),
          'lebarDepan_a' => $this->input->post('lbd_a'),
          'lebarDepan_s' => $this->input->post('lbd_s'),
          'lebarBelakang_a' => $this->input->post('lbb_a'),
          'lebarBelakang_s' => $this->input->post('lbb_s'),
          'totalLuas_a' => $this->input->post('lta_a'),
          'totalLuas_s' => $this->input->post('lta_s'),
          'batas_utara' => $this->input->post('bt_u'),
          'batas_selatan' => $this->input->post('bt_s'),
          'batas_timur' => $this->input->post('bt_t'),
          'batas_barat' => $this->input->post('bt_b'),
          'lokasiDesa' => $this->input->post('gampong_ph1'),
          'hargaTanah' => $this->input->post('harga_tanah'),
          'statusAjb' => 0,
          'createdAtAjb' => date('Y-m-d')
          );



          $this->m->save_ajb($data);
          $this->session->set_flashdata('msg', 'Silahkan Download File AJB !');
          redirect('ajb');

    }


  }

  function daftarAJB()
  {
    $db = $this->m->getAjb()->result();

    $data = array(
      'title' => 'Daftar Surat AJB yang Sudah Di Buat',
      'opt'   => 'table',
      'page'  => 'kecamatan/daftar_ajb',
      'db'    => $db
    );

    $this->load->view('main', $data);
  }

  function hapusAjb($id)
  {
    $this->m->delAjb($id);
    $this->session->set_flashdata('msg', 'Berhasil menghapus data AJB');
    redirect('ajb');
  }

  function _rulesDasar()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[5]',array(
      'required' => '%s Tidak Boleh Kosong',
      'min_length' => 'Minimum Karaktek di bagian %s tidak boleh kurang dari 5 karakter',
    ));
    $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'trim|required|min_length[10]|max_length[20]|is_unique[_kecamatan.nipPetugasK]',array(
      'required' => '%s Tidak Boleh Kosong',
      'min_length' => '%s Terlalu pendek',
      'max_length' => '%s Terlalu panjang',
      'is_unique' => '%s DUPLIKAT! Sudah terdata sebelumnya',
    ));
    $this->form_validation->set_rules('status', 'Status Pegawai', 'trim|required',array(
      'required' => '%s Tidak Boleh Kosong',
    ));
  }

  function _rulesBuatSurat($page,$jenis)
  {
    switch ($page) {
      case 'adk':
        $this->form_validation->set_rules('gampong', 'Gampong', 'trim|required',array(
          'required' => '%s Harus dipilih !',
        ));
        if ($jenis != 'spv') {
          $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required',array(
            'required' => '%s Harus diisi !',
          ));
        }

        if ($jenis != 'sp') {
          $this->form_validation->set_rules('tahapan_pajak', 'Tahapan Pajak', 'trim|required',array(
            'required' => '%s Harus dipilih !',
          ));
          $this->form_validation->set_rules('persentase_pajak', 'Persentase Pajak', 'trim|required',array(
            'required' => '%s Harus diisi !',
          ));
        }
        $this->form_validation->set_rules('tahapan_adk', 'Tahapan ADK', 'trim|required',array(
          'required' => '%s Harus dipilih !',
        ));
        $this->form_validation->set_rules('persen_adk', 'Persentase ADK', 'trim|required',array(
          'required' => '%s Harus diisi !',
        ));

        if ($jenis != 'sp' && $jenis != 'sr') {
          $this->form_validation->set_rules('anggaran', 'Anggaran ADK', 'trim|required',array(
            'required' => '%s Harus diisi !',
          ));
          $this->form_validation->set_rules('nilai_pajak_anggaran', 'Nilai Pajak Restribusi', 'trim|required',array(
            'required' => '%s Harus diisi !',
          ));
        }
        break;
      case 'dds':
      $this->form_validation->set_rules('gampong', 'Gampong', 'trim|required',array(
        'required' => '%s Harus dipilih !',
      ));
      if ($jenis != 'spv') {
        $this->form_validation->set_rules('nomor', 'Nomor', 'trim|required',array(
          'required' => '%s Harus diisi !',
        ));
      }

      if ($jenis != 'sp' && $jenis != 'sr') {
        $this->form_validation->set_rules('ddsPenyerapanRk', 'Penyerapan', 'trim|required',array(
          'required' => 'Persentase %s harus diisi !',
        ));
        $this->form_validation->set_rules('outputDdsRk', 'Output', 'trim|required',array(
          'required' => 'Output Penyerapan %s Harus diisi !',
        ));
      }
      $this->form_validation->set_rules('tahapan_dds', 'Tahapan DDS', 'trim|required',array(
        'required' => '%s Harus dipilih !',
      ));
      $this->form_validation->set_rules('persentase_dds', 'Persentase DDS', 'trim|required',array(
        'required' => '%s Harus diisi !',
      ));


      break;

    }
    return;
  }

  function _rules_ajb()
  {
    $this->form_validation->set_rules('no_ajb', 'Nomor AJB', 'trim|required',array(
      'required' => '%s harus diisi !',
  ));
  $this->form_validation->set_rules('gampong_ph1', 'Lokasi Tanah', 'trim|required',array(
    'required' => '%s harus dipilih !',
  ));
    $this->form_validation->set_rules('nama_ph1', 'Nama Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('nik_ph1', 'NIK Pihak Pertama', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('tpl_ph1', 'Tempat Lahir Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('pk_ph1', 'Pekerjaan Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('kc_ph1', 'Kecamatan Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('tpt_ph1', 'Tempat Tinggal Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('nmr_ph1', 'Nomor Hp Pihak Pertama', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('nama_ph1_ps1', 'Nama Pasangan Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('nik_ph1_ps1', 'NIK Pasangan Pihak Pertama', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('tpl_ph1_ps1', 'Tempat Tanggal Lahir Pasangan Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('pk_ph1_ps1', 'Pekerjaan Pasangan Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('kc_ph1_ps1', 'Kecamatan Pasangan Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('tpt_ph1_ps1', 'Desa Tempat Tinggal Pasangan Pihak Pertama', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('nmr_ph1_ps1', 'Nomor Hp Pasangan Pihak Pertama', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('nama_ph2', 'Nama Pihak Kedua', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('nik_ph2', 'NIK Pihak Kedua', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('tpl_ph2', 'Tempat Tanggal Lahir Pihak Kedua', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('pk_ph2', 'Pekerjaan Pihak Kedua', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('kc_ph2', 'Kecematan Pihak Kedua', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('tpt_ph2', 'Desa Tempat Tinggal Pihak Kedua', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('nmr_ph2', 'Nomor Pihak Kedua', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('lbd_a', 'Angka Lebar Depan', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('lbd_s', 'Sebutan Angka Lebar Depan', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('lbb_a', 'Angka Lebar Belakang', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('lbb_s', 'Sebutan Angka Lebar Belakang', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('lta_a', 'Angka Total Luas', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',
  ));
    $this->form_validation->set_rules('lta_s', 'Sebutan Angka Total Luas', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('bt_u', 'Batas Utara', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('bt_s', 'Batas Selatan', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('bt_t', 'Batas Timur', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('bt_b', 'Batas Barat', 'trim|required',array(
      'required' => '%s harus diisi',
  ));
    $this->form_validation->set_rules('harga_tanah', 'Harga Tanah', 'trim|required|numeric',array(
      'required' => '%s harus diisi',
      'numeric' => '%s harus angka',

  ));
  }
}
