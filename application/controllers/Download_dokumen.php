<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
class Download_dokumen extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_global','gb');
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

  function verifikasi_download($value='')
  {
    // code...
  }

}
