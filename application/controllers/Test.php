<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->view('test');
  }

  function proses()
	{
            $nama_file = date('dmY').date('i').rand(111,999);
            $config = array(
              'allowed_types' => 'jpg|png|pdf|jpeg|docx|doc|odt',
              'max_size'      => 10000,
              'overwrite'     => TRUE,
              'upload_path'   => './assets_sys/files/adk/',
              'encrypt_name'  => TRUE,
            );

            if (!empty($_FILES['f1']['name'])) {
              $config['file_name']= $nama_file;
              $this->load->library('upload', $config);
              $cek = $this->upload->do_upload('f1');

              $fileData = $this->upload->data();
              $data = array(
                'extensi'   => $fileData['file_ext'],
                'rawName'   => $fileData['raw_name'],
                'fileName'  => $fileData['file_name'],
            );

            if (!empty($_FILES['f14']['name'])) {
              if ($this->upload->do_upload('f14')) {
                $data_file = $this->upload->data();
                $data['udAdkF14']  = 'ADK_'.md5($data_file['file_name']).$data_file['file_ext'];
              }
            }


              // $data['f1'] = $fileData['file_name'];
              echo "<pre>";
              var_dump($data);
              echo "</pre>";
            }











            // // script upload file pertama
            // $this->upload->do_upload('f1');
            // $file1 = $this->upload->data();
            //
            // echo "<pre>";
            // var_dump($file1);
            // echo "</pre>";
            // // echo "<pre>";
            // // print_r($file1['file_name']);
            // // echo "</pre>";
            //
            // // script uplaod file kedua
            // $this->upload->do_upload('f2');
            // $file2 = $this->upload->data();
            // echo "<pre>";
            // print_r($file2);
            // echo "</pre>";
            //
            // // script uplaod file ketiga
            // $this->upload->do_upload('f3');
            // $file3 = $this->upload->data();
            // echo "<pre>";
            // print_r($file3);
            // echo "</pre>";
	}
}
