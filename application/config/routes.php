<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Main';

// Router
// $route['dashboard'] = 'C_Dashboard';


// Setting
$route['sign_in'] = 'Setting/index';
$route['sign_up'] = 'Setting/sign_up';
$route['process/sign_up'] = 'Setting/proses_sign_up';
$route['process/login'] = 'Setting/proses_login';
$route['log_out'] = 'Setting/log_out';
$route['resetPassword/(:any)'] = 'Setting/reset_password/$1';
$route['ressPass/(:any)'] = 'Setting/reset_process/$1';
$route['ressLogin'] = 'Setting/login_after_reset';
$route['admin/login'] = 'Setting/login_admin';
$route['admin/login/proses'] = 'Setting/proses_login_admin';

// Admin page
$route['del_user/(:any)'] = 'Setting/hapus_user/$1';
$route['pengaturan_gampong/(:any)'] = 'Setting/data_user/$1';
$route['admin/user/(:any)'] = 'Setting/data_user/$1';
$route['aktivasi/user/(:any)'] = 'Setting/aktivasi_user/$1';
$route['reject/user/(:any)'] = 'Setting/reject_user/$1';
$route['complete/register/(:any)'] = 'Administration/lengkapi_profil/$1';
$route['complete/success'] = 'Administration/update_profil';
$route['jabatan/_tambah'] = 'Setting/jabatan_set/';
$route['jabatan/_process'] = 'Setting/proses_jabatan/';
$route['admin/level'] = 'Setting/set_admin';
$route['admin/_process/(:any)'] = 'Setting/proses_set_admin/$1';



// penduduk
$route['penduduk'] = 'Administration/penduduk_list';
$route['penduduk/_tambah'] = 'Administration/penduduk_select';
$route['penduduk/_tambah/(:any)'] = 'Administration/penduduk_reg/$1';
$route['penduduk/_process/tambah'] = 'Administration/penduduk_sub';
$route['penduduk/(:any)'] = 'Administration/penduduk_reg_select/$1';
$route['penduduk/_lihat/(:any)'] = 'Administration/penduduk_det/$1';
$route['penduduk/_edit/(:any)'] = 'Administration/penduduk_upd/$1';
$route['penduduk/_hapus/(:any)'] = 'Administration/penduduk_del/$1';

// Dana Desa
$route['dana_desa/(:any)'] = 'Administration/dDesa_list/$1';
$route['s/dana_desa'] = 'Administration/pilih_jenis/';
// $route['dana_desa'] = 'Administration/dDesa_list';

// Hapus surat
$route['hapus_berkas_surat/(:any)/(:any)'] = 'Administration/del_surat/$1/$2';

// ADK Route
$route['s/dana_desa/_tambah/adk'] = 'Administration/adk_select';
$route['s/adk/_tambah/(:any)'] = 'Administration/form_adk/$1';
$route['s/adk/_process/(:any)'] = 'Administration/proses_adk/$1';

// DDS ROUTES
$route['s/dana_desa/_tambah/dds'] = 'Administration/dds_select';
$route['s/dds/_tambah/(:any)'] = 'Administration/form_dds/$1';
$route['s/dds/_process/(:any)'] = 'Administration/proses_dds/$1';

// Upload Verifikasi
$route['berkas_masuk'] = 'Admin_Kecamatan/berkasMasuk';
$route['upload_dokumen'] = 'Administration/upload_dokumen';
$route['upload_dokumen/(:any)'] = 'Administration/step_upload_dokumen/$1';
$route['proses_upload/(:any)'] = 'Administration/proses_upload_dokumen/$1';

// Edit Upload
$route['edit_upload_dokumen/(:any)/(:any)'] = 'Administration/step_edit_upload_dokumen/$1/$2';
$route['prosesEdit_upload_dokumen/(:any)/(:any)'] = 'Administration/proses_edit_upload_dokumen/$1/$2';

// Rekomendasi Bantuan
$route['rekomendasi_bantuan'] = 'Admin_Kecamatan/rekomendasi_bantuan';
$route['rekomendasi_bantuan/_buat'] = 'Admin_Kecamatan/buatRekomendasi';
$route['rekomendasi_bantuan/_proses'] = 'Admin_Kecamatan/prosesRekomendasiBantuan';


// Delete dokumen

$route['dokumen/delete/(:any)'] = 'Administration/del_upload_dokumen/$1';
$route['s/dana_desa/_tambah/dds'] = 'Administration/dds_select';
$route['s/dana_desa/_tambah/(:any)'] = 'Administration/dDesa_reg/$1';
$route['s/dana_desa/_process/(:any)'] = 'Administration/proses_dana_desa/$1';

$route['gga'] = 'Request_ajax/get_gampong_all';
$route['gpa'] = 'Request_ajax/get_penduduk_all';
$route['json/(:any)'] = 'Request_ajax/jsonPenduduk/$1';
// $route['json'] = 'Request_ajax/jsonPenduduk/';

// Donwload Dokumen
$route['download/(:any)/(:any)/(:any)'] = 'Download_dokumen/download/$1/$2/$3';
$route['downloads/(:any)'] = 'Download_dokumen/download_respon/$1';
$route['downloads_ajb/(:any)/(:any)/(:any)'] = 'Download_dokumen/download_ajb/$1/$2/$3';
$route['download_rekomendasi/(:any)'] = 'Download_dokumen/rekomendasi_bantuan/$1';


$route['pengaturanGampong/(:any)'] = 'Administration/pengaturan_gampong/$1';
$route['prosesGampongSetting/(:any)'] = 'Administration/prosesPengaturanGampong/$1';


// Untuk Kecamatan Only
$route['KDashboard'] = 'Admin_Kecamatan/index';
$route['atur_petugas_baru'] = 'Admin_Kecamatan/buatAdmin';
$route['atur_petugas_baru/_proses'] = 'Admin_Kecamatan/processBuatAdmin';
$route['edit_petugas/(:any)'] = 'Admin_Kecamatan/edit_petugas/$1';
$route['edit_petugas/_proses/(:any)'] = 'Admin_Kecamatan/proses_edit_petugas/$1';
$route['petugas/_hapus/(:any)'] = 'Admin_Kecamatan/hapusAdmin/$1';
$route['pengaturan_kecamatan'] = 'Admin_Kecamatan/aturPetugas';
$route['pengaturan_kecamatan/_hapus/(:any)'] = 'Admin_Kecamatan/deletePetugas/$1';
$route['pengaturan_kecamatan/_proses'] = 'Admin_Kecamatan/prosesPetugas';

$route['surat_kecamatan'] = 'Admin_Kecamatan/daftarSurat';
$route['surat_kecamatan/(:any)/(:any)'] = 'Admin_Kecamatan/buatSurat/$1/$2';
$route['surat_proses/(:any)/(:any)'] = 'Admin_Kecamatan/prosesBuatSurat/$1/$2';
$route['ajb/_buat_ajb'] = 'Admin_Kecamatan/buatAJB';
$route['ajb/_proses_ajb'] = 'Admin_Kecamatan/prosesAjb';
$route['ajb'] = 'Admin_Kecamatan/daftarAJB';
$route['hapus_ajb/(:any)'] = 'Admin_Kecamatan/hapusAjb/$1';
$route['delete_berkas/(:any)'] = 'Admin_Kecamatan/delete_berkas/$1';


$route['gampong_pengaturan'] = 'Administration/get_setting_gampong';
$route['gampong_pengaturan/_tambah_aparatur'] = 'Administration/add_aparatur';
$route['gampong_pengaturan/_proses_aparatur'] = 'Administration/proses_aparatur';
$route['gampong_pengaturan/_atur'] = 'Administration/atur_aparatur';
$route['gampong_pengaturan/_atur_proses'] = 'Administration/proses_tambah_aparatur';
$route['gampong_pengaturan/_hapus_penduduks/(:any)'] = 'Administration/hapus_penduduks/$1';


$route['404_override'] = 'Setting/error_404';
$route['translate_uri_dashes'] = FALSE;
