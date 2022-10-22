<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Main';

// Router
// $route['dashboard'] = 'C_Dashboard';


// Setting
$route['sign_in'] = 'Setting/index';
$route['sign_up'] = 'Setting/sign_up';
$route['process/sign_up'] = 'Setting/proses_sign_up';
$route['process/login'] = 'Setting/proses_login';
$route['log_out'] = 'Setting/log_out';

// Admin page
$route['admin/user/(:any)'] = 'Setting/data_user/$1';
$route['aktivasi/user/(:any)'] = 'Setting/aktivasi_user/$1';
$route['reject/user/(:any)'] = 'Setting/reject_user/$1';
$route['complete/register/(:any)'] = 'Administration/lengkapi_profil/$1';
$route['complete/success'] = 'Administration/update_profil';
$route['jabatan/_tambah'] = 'Setting/jabatan_set/';
$route['jabatan/_process'] = 'Setting/proses_jabatan/';



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
$route['dana_desa/_tambah'] = 'Administration/dDesa_select';
$route['dana_desa/_tambah/(:any)'] = 'Administration/dDesa_reg/$1';

$route['gga'] = 'Request_ajax/get_gampong_all';
$route['gpa'] = 'Request_ajax/get_penduduk_all';



$route['404_override'] = 'Setting/error_404';
$route['translate_uri_dashes'] = FALSE;
