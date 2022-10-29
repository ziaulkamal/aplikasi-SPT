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

// Admin page
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

// ADK Route
$route['s/dana_desa/_tambah/adk'] = 'Administration/adk_select';
$route['s/adk/_tambah/(:any)'] = 'Administration/form_adk/$1';
$route['s/adk/_process/(:any)'] = 'Administration/proses_adk/$1';

// DDS ROUTES
$route['s/dana_desa/_tambah/dds'] = 'Administration/dds_select';
$route['s/dds/_tambah/(:any)'] = 'Administration/form_dds/$1';
$route['s/dds/_process/(:any)'] = 'Administration/proses_dds/$1';

// Upload Verifikasi
$route['upload_dokumen'] = 'Administration/upload_dokumen';
$route['upload_dokumen/(:any)'] = 'Administration/step_upload_dokumen/$1';

$route['s/dana_desa/_tambah/dds'] = 'Administration/dds_select';
$route['s/dana_desa/_tambah/(:any)'] = 'Administration/dDesa_reg/$1';
$route['s/dana_desa/_process/(:any)'] = 'Administration/proses_dana_desa/$1';

$route['gga'] = 'Request_ajax/get_gampong_all';
$route['gpa'] = 'Request_ajax/get_penduduk_all';
$route['json/(:any)'] = 'Request_ajax/jsonPenduduk/$1';
// $route['json'] = 'Request_ajax/jsonPenduduk/';



$route['404_override'] = 'Setting/error_404';
$route['translate_uri_dashes'] = FALSE;
