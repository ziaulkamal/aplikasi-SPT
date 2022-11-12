<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Download_dokumen extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_global','gb');
    $this->load->model('M_kecamatan','m');
    if ($this->session->userdata('userLogin') != TRUE) {
      $this->session->sess_destroy();
      redirect('404');
    }
  }


  function download($gampong, $part, $id)
  {
    $d_gampong = $this->gb->getGampong($gampong)->row();
    $geuchik = $d_gampong->idGeuchikG;
    $sekdes  = $d_gampong->idSekretarisG;
    $kaur    = $d_gampong->idKaurG;

    $params_geuchik = $this->gb->get_perangkat_desa($d_gampong->idGeuchikG);
    $params_sekdes  = $this->gb->get_perangkat_desa($d_gampong->idSekretarisG);
    $params_kaur    = $this->gb->get_perangkat_desa($d_gampong->idKaurG);



    if (empty($geuchik) && empty($sekdes) && empty($kaur)) {
      $this->session->set_flashdata('msg', 'Sebelum anda mengunduh template surat, pastikan sudah lengkapi data master ini terlebih dahulu !');
      redirect('pengaturanGampong/'.$gampong);
    }else {
      switch ($part) {
        case 'adk':
        $data = $this->gb->get_adk_file($id)->row();

        switch ($data->tahapanAdk) { case '1': $tahapanADK = 'I'; break; case '2': $tahapanADK = 'II'; break; case '3': $tahapanADK = 'III'; break; case '4': $tahapanADK = 'IV'; break; case '5': $tahapanADK = 'V'; break; }
        switch ($data->pajakTahapanAdk) { case '1': $tahapanPDRB = 'I'; break; case '2': $tahapanPDRB = 'II'; break; case '3': $tahapanPDRB = 'III'; break; case '4': $tahapanPDRB = 'IV'; break; case '5': $tahapanPDRB = 'V'; break; }
        // IDEA: Modul Dokumen FI
        if ($data->jenisAdk == 'FI') {
            $nameFile = 'Surat Fakta Integritas (ADK)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/ADK-FI.docx');
            $template->setValue('nama', $data->namaPenduduk);
            $template->setValue('jabatan', $data->jabatanPenduduk);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('nik', $data->nikPenduduk);
            $template->setValue('nohp', $data->nomorHP);
            $template->setValue('adk_tahap', $tahapanADK);
            $template->setValue('persen_adk', $data->persentaseAdk);
            $template->setValue('pdrb_tahap', $tahapanPDRB);
            $template->setValue('persen_pdrb', $data->persentasePajakAdk);
            $template->setValue('tahun', $data->tahunAdk);
            $template->setValue('tanggal', date_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
        }
        // IDEA: Modul Dokumen SP
        if ($data->jenisAdk == 'SP') {

            $nameFile = 'Surat Pengantar (ADK)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/ADK-SP.docx');
            $template->setValue('no', $data->nomorAdk);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('adk_tahap', $tahapanADK);
            $template->setValue('persen_adk', $data->persentaseAdk);
            $template->setValue('tahun', $data->tahunAdk);
            $template->setValue('tanggal_lengkap', longdate_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
        }

        // IDEA: Modul Dokumen SPP
        if ($data->jenisAdk == 'SPP') {
            $nameFile = 'Surat Permohonan Pencairan (ADK)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/ADK-SPP.docx');
            $template->setValue('no', $data->nomorAdk);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('adk_tahap', $tahapanADK);
            $template->setValue('persen_adk', $data->persentaseAdk);
            $template->setValue('pdrb_tahap', $tahapanPDRB);
            $template->setValue('persen_pdrb', $data->persentasePajakAdk);
            $template->setValue('tahun', $data->tahunAdk);
            $template->setValue('tanggal_lengkap', longdate_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
        }

        // IDEA: Modul Dokumen SPTJ
        if ($data->jenisAdk == 'SPTJ') {
            $nameFile = 'Surat Pernyataan Pertanggung Jawaban (ADK)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/ADK-SPTJ.docx');
            $template->setValue('nama', $data->namaPenduduk);
            $template->setValue('jabatan', $data->jabatanPenduduk);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('nik', $data->nikPenduduk);
            $template->setValue('adk_nilai', number_format($data->angkaAnggaranAdk,2,',','.'));
            $template->setValue('pdrb_nilai', number_format($data->angkaPajakAdk,2,',','.'));
            $template->setValue('adk_tahap', $tahapanADK);
            $template->setValue('persen_adk', $data->persentaseAdk);
            $template->setValue('pdrb_tahap', $tahapanPDRB);
            $template->setValue('persen_pdrb', $data->persentasePajakAdk);
            $template->setValue('tahun', $data->tahunAdk);
            $template->setValue('tanggal', date_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
        }

        // IDEA: Modul Dokumen SPV
        if ($data->jenisAdk == 'SPV') {


            $nameFile = 'Surat Pernyataan Verifikasi (ADK)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/ADK-SPV.docx');
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('nama_sekretaris', $params_sekdes->namaPenduduk);
            $template->setValue('nama_kaur', $params_kaur->namaPenduduk);
            $template->setValue('nik_sekdes', $params_sekdes->nikPenduduk);
            $template->setValue('nik_kaur', $params_kaur->nikPenduduk);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('adk_nilai', number_format($data->angkaAnggaranAdk,2,',','.'));
            $template->setValue('pdrb_nilai', number_format($data->angkaPajakAdk,2,',','.'));
            $template->setValue('adk_tahap', $tahapanADK);
            $template->setValue('persen_adk', $data->persentaseAdk);
            $template->setValue('pdrb_tahap', $tahapanPDRB);
            $template->setValue('persen_pdrb', $data->persentasePajakAdk);
            $template->setValue('tahun', $data->tahunAdk);
            $template->setValue('tanggal_lengkap', longdate_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
        }


         $filename = $nameFile.' - '.date_indo(date('Y-m-d'));
         header("Content-type: application/vnd.ms-word");
         header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
         header('Cache-Control: max-age=0');
         $template->saveAs('php://output');
          break;

        case 'dds':
          $data = $this->gb->get_dds_file($id)->row();

          switch ($data->gelombangDd) { case "1": $tahapanDDS = "I"; break; case "2": $tahapanDDS = "II"; break; case "3": $tahapanDDS = "III"; break; case "4": $tahapanDDS = "IV"; break; case "5": $tahapanDDS = "V"; break; }
          switch ($data->tahapanDdsSebelumnya) { case "1": $tahapanSebelumnya = "I"; break; case "2": $tahapanSebelumnya = "II"; break; case "3": $tahapanSebelumnya = "III"; break; case "4": $tahapanSebelumnya = "IV"; break; case "5": $tahapanSebelumnya = "V"; break; }

          // IDEA: Modul Dokumen FI
          if ($data->jenisDd == 'FI') {
            $nameFile = 'Surat Fakta Integritas (DDS)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/DDS-FI.docx');
            $template->setValue('nama', $data->namaPenduduk);
            $template->setValue('jabatan', $data->jabatanPenduduk);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('nik', $data->nikPenduduk);
            $template->setValue('nohp', $data->nomorHP);
            $template->setValue('tahap_dds', $tahapanDDS);
            $template->setValue('persen_dds', $data->persentase);
            $template->setValue('tahun', $data->tahunDd);
            $template->setValue('tanggal', date_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
          }

          // IDEA: Modul Dokumen SP
          if ($data->jenisDd == 'SP') {
            $nameFile = 'Surat Pengantar (DDS)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/DDS-SP.docx');
            $template->setValue('no', $data->nomorDd);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('tahap_dds', $tahapanDDS);
            $template->setValue('persen_dds', $data->persentase);
            $template->setValue('tahun', $data->tahunDd);
            $template->setValue('tanggal_lengkap', longdate_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
          }

          // IDEA: Modul Dokumen SPP
          if ($data->jenisDd == 'SPP') {
            $nameFile = 'Surat Permohonan Pencairan (DDS)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/DDS-SPP.docx');
            $template->setValue('no', $data->nomorDd);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('tahap_dds', $tahapanDDS);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('persen_dds', $data->persentase);
            $template->setValue('tahun', $data->tahunDd);
            $template->setValue('tanggal', date_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
          }

          // IDEA: Modul Dokumen SPTJ
          if ($data->jenisDd == 'SPTJ') {
            $nameFile = 'Surat Pernyataan Pertanggung Jawaban (DDS)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/DDS-SPTJ.docx');
            $template->setValue('nama', $data->namaPenduduk);
            $template->setValue('jabatan', $data->jabatanPenduduk);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('nik', $data->nikPenduduk);
            $template->setValue('anggaran', number_format($data->angkaAnggaran,2,',','.'));
            $template->setValue('tahap_dds', $tahapanDDS);
            $template->setValue('persen_dds', $data->persentase);
            $template->setValue('tahun', $data->tahunDd);
            $template->setValue('tanggal', date_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
          }

          // IDEA: Modul Dokumen SPV
          if ($data->jenisDd == 'SPV') {
            $nameFile = 'Surat Pernyataan Verifikasi (DDS)';
            $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/DDS-SPV.docx');
            $template->setValue('nama_sekretaris', $params_sekdes->namaPenduduk);
            $template->setValue('nama_kaur', $params_kaur->namaPenduduk);
            $template->setValue('nik_sekdes', $params_sekdes->nikPenduduk);
            $template->setValue('nik_kaur', $params_kaur->nikPenduduk);

            $template->setValue('tahap_sebelumnya', $data->tahapanDdsSebelumnya);
            $template->setValue('persen_sebelumnya', $data->persentaseSebelumnya);
            $template->setValue('tahun_sebelumnya', $data->tahunSebelumnya);
            $template->setValue('gampong', $data->namaGampong);
            $template->setValue('h_gampong', strtoupper($data->namaGampong));
            $template->setValue('tahap_dds', $tahapanDDS);
            $template->setValue('persen_dds', $data->persentase);
            $template->setValue('tahun', $data->tahunDd);
            $template->setValue('tanggal_lengkap', longdate_indo(date('Y-m-d')));
            $template->setValue('nama_geuchik', $params_geuchik->namaPenduduk);
          }

          $filename = $nameFile.' - '.date_indo(date('Y-m-d'));
          header("Content-type: application/vnd.ms-word");
          header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
          header('Cache-Control: max-age=0');
          $template->saveAs('php://output');
          break;
      }
    }
  }

  function rekomendasi_bantuan($id)
  {
    $data   = $this->gb->getRekomendasiBantuan($id);
    $camat  = $this->gb->getPetugasKecamatan('camat')->row();
    if ($data != null) {
      if ($data->jenisRb == '1') {
        $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/REKOM-BANTUAN-1.docx');
      }elseif ($data->jenisRb == '2') {
        $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/REKOM-BANTUAN-2.docx');
      }
      $nameFile = 'Surat Rekomendasi Bantuan';
      $template->setValue('nama_camat', $camat->namaPetugasK);
      $template->setValue('nip_camat', $camat->nipPetugasK);
      $template->setValue('no', $data->nomorRb);
      $template->setValue('penerima_rb', $data->penerimaRb);

      $template->setValue('tahun', date('Y'));
      $template->setValue('persen_sebelumnya', $data->persentaseSebelumnya);
      $template->setValue('gampong', $data->namaG);
      $template->setValue('perihal', $data->perihalBantuanRb);
      $template->setValue('tanggal', date_indo(date('Y-m-d')));
      $template->setValue('tanggal_pengajuan', date_indo($data->createdAtRb));

      $filename = $nameFile.' - '.date_indo(date('Y-m-d'));
      header("Content-type: application/vnd.ms-word");
      header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
      header('Cache-Control: max-age=0');
      $template->saveAs('php://output');
    }
  }

  function download_respon($id)
  {
    $data     = $this->gb->get_responAll($id)->row();


    if ($data != null) {
      $jenis    = $data->jenisSuratRk;
      $kategori = $data->kategoriSuratRk;

      $camat    = $this->gb->getPetugasKecamatan('camat')->row();
      $sekcam   = $this->gb->getPetugasKecamatan('sekcam')->row();
      $kaur     = $this->gb->getPetugasKecamatan('kaurcam')->row();
      $verif    = $this->gb->getPetugasKecamatan('verifikasi')->row();

      switch ($kategori) {
        case 'dds':
          switch ($data->tahapanDdsRk) {
              case "1":
                  $tahapanDDS = "I";
                  $tahapanSebelumnya = "V";
                  $tahunSebelumnya = $data->tahunAnggaranRk-1;
                  break;
              case "2":
                  $tahapanDDS = "II";
                  $tahapanSebelumnya = "I";
                  $tahunSebelumnya = $data->tahunAnggaranRk-1;
                  break;
              case "3":
                  $tahapanDDS = "III";
                  $tahapanSebelumnya = "II";
                  $tahunSebelumnya = $data->tahunAnggaranRk-1;
                  break;
              case "4":
                  $tahapanDDS = "IV";
                  $tahapanSebelumnya = "III";
                  $tahunSebelumnya = $data->tahunAnggaranRk-1;
                  break;
              case "5":
                  $tahapanDDS = "V";
                  $tahapanSebelumnya = "IV";
                  $tahunSebelumnya = $data->tahunAnggaranRk-1;
                  break;
              }
          if ($jenis == 'sp') {
              $nameFile = 'Surat Pernyataan Kecamatan (DDS)';
              $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/KECAMATAN-SP-DDS.docx');
              $template->setValue('nomor', $data->nomorSuratRk);
              $template->setValue('gampong', $data->namaG);
              $template->setValue('tahap_dds', $tahapanDDS);
              $template->setValue('persen_dds', $data->persentaseDdsRk);
              $template->setValue('tahun', $data->tahunAnggaranRk);
              $template->setValue('tanggal', date_indo(date('Y-m-d')));
              $template->setValue('nama_camat', $camat->namaPetugasK);
              $template->setValue('nip_camat', $camat->nipPetugasK);
          }

          if ($jenis == 'sr') {
              $nameFile = 'Surat Rekomendasi Kecamatan (DDS)';
              $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/KECAMATAN-SR-DDS.docx');
              $template->setValue('nomor', $data->nomorSuratRk);
              $template->setValue('gampong', $data->namaG);
              $template->setValue('tahap_dds', $tahapanDDS);
              $template->setValue('persen_dds', $data->persentaseDdsRk);
              $template->setValue('tahun', $data->tahunAnggaranRk);
              $template->setValue('tanggal', date_indo(date('Y-m-d')));
              $template->setValue('nama_camat', $camat->namaPetugasK);
              $template->setValue('nip_camat', $camat->nipPetugasK);
          }

          if ($jenis == 'spv') {
              $nameFile = 'Surat Pernyataan Verifikasi (DDS)';
              $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/KECAMATAN-SPV-DDS.docx');
              $template->setValue('gampong', $data->namaG);
              $template->setValue('tahap_sebelumnya', $tahapanSebelumnya);
              $template->setValue('tahun_sebelumnya', $tahunSebelumnya);
              $template->setValue('penyerapan_output', $data->outputDdsRk);
              $template->setValue('angka_penyerapan', $data->ddsPenyerapanRk);
              $template->setValue('tahap_dds', $tahapanDDS);
              $template->setValue('persen_dds', $data->persentaseDdsRk);
              $template->setValue('tahun', $data->tahunAnggaranRk);
              $template->setValue('tanggal_lengkap', longdate_indo(date('Y-m-d')));
              $template->setValue('nama_camat', $camat->namaPetugasK);
              $template->setValue('nip_camat', $camat->nipPetugasK);
              $template->setValue('nama_sekcam', $sekcam->namaPetugasK);
              $template->setValue('nip_sekcam', $sekcam->nipPetugasK);
              $template->setValue('nama_kaur', $kaur->namaPetugasK);
              $template->setValue('nip_kaur', $kaur->nipPetugasK);
              $template->setValue('nama_verifikasi', $verif->namaPetugasK);
              $template->setValue('nip_verifikasi', $verif->nipPetugasK);
          }
          break;

        case 'adk':
          switch ($data->tahapanAdkRk) {
              case "1":
                  $tahapanADK = "I";
                  break;
              case "2":
                  $tahapanADK = "II";
                  break;
              case "3":
                  $tahapanADK = "III";
                  break;
              case "4":
                  $tahapanADK = "IV";
                  break;
              case "5":
                  $tahapanADK = "V";
                  break;
              }
          switch ($data->tahapanPdrbRk) {
              case "1":
                  $tahapanPDRB = "I";
                  break;
              case "2":
                  $tahapanPDRB = "II";
                  break;
              case "3":
                  $tahapanPDRB = "III";
                  break;
              case "4":
                  $tahapanPDRB = "IV";
                  break;
              case "5":
                  $tahapanPDRB = "V";
                  break;
              }

          if ($jenis == 'sp') {
              $nameFile = 'Surat Pernyataan Kecamatan (ADK)';
              $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/KECAMATAN-SP-ADK.docx');
              $template->setValue('nomor', $data->nomorSuratRk);
              $template->setValue('gampong', $data->namaG);
              $template->setValue('tahap_adk', $tahapanADK);
              $template->setValue('persen_adk', $data->persentaseAdkRk);
              $template->setValue('tahun', $data->tahunAnggaranRk);
              $template->setValue('tanggal', date_indo(date('Y-m-d')));
              $template->setValue('nama_camat', $camat->namaPetugasK);
              $template->setValue('nip_camat', $camat->nipPetugasK);
          }

          if ($jenis == 'sr') {
              $nameFile = 'Surat Rekomendasi Kecamatan (ADK)';
              $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/KECAMATAN-SR-ADK.docx');
              $template->setValue('nomor', $data->nomorSuratRk);
              $template->setValue('gampong', $data->namaG);
              $template->setValue('tahap_adk', $tahapanADK);
              $template->setValue('persen_adk', $data->persentaseAdkRk);
              $template->setValue('tahap_pajak', $tahapanPDRB);
              $template->setValue('persen_pajak', $data->persentasePdrbRk);
              $template->setValue('tahun', $data->tahunAnggaranRk);
              $template->setValue('tanggal', date_indo(date('Y-m-d')));
              $template->setValue('nama_camat', $camat->namaPetugasK);
              $template->setValue('nip_camat', $camat->nipPetugasK);
          }

          if ($jenis == 'spv') {
              $nameFile = 'Surat Pernyataan Verifikasi Kecamatan (ADK)';
              $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/KECAMATAN-SPV-ADK.docx');
              $template->setValue('gampong', ucwords($data->namaG));
              $template->setValue('tahap_adk', $tahapanADK);
              $template->setValue('persen_adk', $data->persentaseAdkRk);
              $template->setValue('anggaran', number_format($data->nilaiAnggaranAdkRk,2,',','.'));
              $template->setValue('pajak_anggaran', number_format($data->nilaiPdrbAdkRk,2,',','.'));
              $template->setValue('tahun', $data->tahunAnggaranRk);
              $template->setValue('tanggal_lengkap', longdate_indo(date('Y-m-d')));
              $template->setValue('nama_camat', $camat->namaPetugasK);
              $template->setValue('nip_camat', $camat->nipPetugasK);
              $template->setValue('nama_sekcam', $sekcam->namaPetugasK);
              $template->setValue('nip_sekcam', $sekcam->nipPetugasK);
              $template->setValue('nama_kaur', $kaur->namaPetugasK);
              $template->setValue('nip_kaur', $kaur->nipPetugasK);
              $template->setValue('nama_verifikasi', $verif->namaPetugasK);
              $template->setValue('nip_verifikasi', $verif->nipPetugasK);
          }



          break;
      }
      $filename = $nameFile.' - '.date_indo(date('Y-m-d'));
      header("Content-type: application/vnd.ms-word");
      header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
      header('Cache-Control: max-age=0');
      $template->saveAs('php://output');
    }else {
      redirect('404');
    }



  }

  function download_ajb($no, $gampong, $tahun)
  {
    $d_gampong = $this->gb->getGampong($gampong)->row();
    $geuchik = $d_gampong->idGeuchikG;
    $sekdes  = $d_gampong->idSekretarisG;
    $camat = $this->m->getPetugasKecamatan('camat')->row();
    $params_geuchik = $this->gb->get_perangkat_desa($d_gampong->idGeuchikG);
    $params_sekdes  = $this->gb->get_perangkat_desa($d_gampong->idSekretarisG);
    $ajb = $this->m->getAjbId($no)->row();
    $gpPs_p1 = $this->m->getGpId($ajb->gpPs_p1)->namaG;
    $p_gpPs_p1 = $this->m->getGpId($ajb->p_gpPs_p1)->namaG;
    $lokasiDesa = $this->m->getGpId($ajb->lokasiDesa);

    $usia_pasangan = substr(date('Y-m-d'), 0, 4)-substr($ajb->p_tglPs_p1, 0, 4);

    if (empty($sekdes) || empty($geuchik)) {
      $this->session->set_flashdata('msg', 'Data lengkap nama Kepala desa dan Sekdes belum di lengkapi !');
      redirect('ajb');
    }else {
      $nameFile = 'AKTA JUAL BELI NOMOR: '.$no."/".$tahun;
      $template = new \PhpOffice\PhpWord\TemplateProcessor('./assets_sys/files/template/AJB-KECAMATAN.docx');

      $template->setValue('nomor_ajb', $ajb->nomorAjb);
      $template->setValue('tahun', $ajb->tahunAjb);
      $template->setValue('tanggal_lengkap', longdate_indo($ajb->createdAtAjb));
      $template->setValue('nama_camat', strtoupper($camat->namaPetugasK));
      $template->setValue('nip_camat', $camat->nipPetugasK);
      $template->setValue('nama_pihak_pertama', strtoupper($ajb->nmPs_p1));
      $template->setValue('tempat_lahir_pihak_pertama', $ajb->gplPs_p1);
      $template->setValue('tanggal_lahir_pihak_pertama', date_indo($ajb->tglPs_p1));
      $template->setValue('pekerjaan_pihak_pertama', $ajb->pkrPs_p1);
      $template->setValue('gampong_pihak_pertama', $gpPs_p1);
      $template->setValue('kecamatan_pihak_pertama', $ajb->kcPs_p1);
      $template->setValue('kabupaten_pihak_pertama', 'Singkil');
      $template->setValue('nik_pihak_pertama', $ajb->nikPs_p1);

      $template->setValue('nama_pasangan_pihak_pertama', strtoupper($ajb->p_nmPs_p1));
      $template->setValue('tempat_lahir_pasangan_pihak_pertama', $ajb->p_gplPs_p1);
      $template->setValue('tanggal_lahir_pasangan_pihak_pertama', date_indo($ajb->p_tglPs_p1));
      $template->setValue('pekerjaan_pasangan_pihak_pertama', $ajb->p_pkrPs_p1);
      $template->setValue('gampong_pasangan_pihak_pertama', $p_gpPs_p1);
      $template->setValue('kecamatan_pasangan_pihak_pertama', $ajb->p_kcPs_p1);
      $template->setValue('kabupaten_pasangan_pihak_pertama', 'Singkil');
      $template->setValue('nik_pasangan_pihak_pertama', $ajb->p_nikPs_p1);

      $template->setValue('nama_pihak_kedua', strtoupper($ajb->nmPs_p2));
      $template->setValue('tempat_lahir_pihak_kedua', $ajb->gplPs_p2);
      $template->setValue('tanggal_lahir_pihak_kedua', date_indo($ajb->tglPs_p2));
      $template->setValue('pekerjaan_pihak_kedua', $ajb->pkrPs_p2);
      $template->setValue('nama_kampung_pihak_kedua', $ajb->gpPs_p2);
      $template->setValue('kecamatan_pihak_kedua', $ajb->kcPs_p2);
      $template->setValue('kabupaten_pihak_kedua', $ajb->kcPs_p2);
      $template->setValue('nik_pihak_kedua', $ajb->nikPs_p2);

      $template->setValue('angka_lebar_depan', $ajb->lebarDepan_a);
      $template->setValue('sebutan_angka_lebar_depan', $ajb->lebarDepan_s);
      $template->setValue('angka_lebar_belakang', $ajb->lebarBelakang_a);
      $template->setValue('sebutan_angka_lebar_belakang', $ajb->lebarBelakang_s);
      $template->setValue('angka_total_luas', $ajb->totalLuas_a);
      $template->setValue('sebutan_angka_total_luas', $ajb->totalLuas_s);

      $template->setValue('batas_timur', $ajb->batas_timur);
      $template->setValue('batas_barat', $ajb->batas_barat);
      $template->setValue('batas_utara', $ajb->batas_utara);
      $template->setValue('batas_selatan', $ajb->batas_selatan);

      $template->setValue('gampong_tanah', $lokasiDesa);
      $template->setValue('harga_tanah', number_format($ajb->hargaTanah,2,',','.'));

      $template->setValue('usia_pasangan', $usia_pasangan);

      $template->setValue('nama_geuchik', strtoupper($params_geuchik->namaPenduduk));
      $template->setValue('nama_sekdes', strtoupper($params_sekdes->namaPenduduk));
      $template->setValue('gampong', $lokasiDesa);



      $filename = $nameFile.' - '.date_indo(date('Y-m-d'));
      header("Content-type: application/vnd.ms-word");
      header('Content-Disposition: attachment; filename="'. $filename .'.docx"');
      header('Cache-Control: max-age=0');
      $template->saveAs('php://output');
    }
  }

}
