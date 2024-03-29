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
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'landing';
$route['404_override'] = 'welcome/error404';
$route['translate_uri_dashes'] = FALSE;

/* Auth Routers */
$route['signin'] = 'auth/signin';
$route['signup'] = 'auth/signup';
$route['logout'] = 'auth/logout';
$route['forgotpassword'] = 'auth/forgotpassword';
$route['signinWithGoogle'] = 'auth/signinWithGoogle';
$route['newPassword'] = 'auth/passwordbaru';

$route['admin'] = 'admin/admin/index';
$route['admin/auth'] = 'admin/admin/auth';

$route['tutor'] = 'tutor/tutor/index';
$route['tutor/auth'] = 'tutor/tutor/auth';
$route['tutor/verifikasi'] = 'tutor/tutor/verifikasi';
$route['tutor/verifikasi/submit'] = 'tutor/tutor/submitVerifikasi';

/* Courses Routes */
$route['admin/course/(:num)'] = 'admin/course/detail/$1';
$route['admin/course/(:num)/media'] = 'admin/course/media/$1';
$route['admin/course/(:num)/edit'] = 'admin/course/edit/$1';

$route['tutor/course/(:num)'] = 'tutor/course/detail/$1';
$route['tutor/course/(:num)/media'] = 'tutor/course/media/$1';
$route['tutor/course/(:num)/edit'] = 'tutor/course/edit/$1';

$route['course/(:any)/detail'] = 'course/detail/$1';
$route['course/(:any)/category'] = 'course/index/$1';

/* Kelas Routes */
$route['kelas/(:any)/detail'] = 'kelas/detail/$1';
$route['kelas/(:any)/done'] = 'kelas/done/$1';
$route['kelas/(:any)/actionDone'] = 'kelas/actionDone/$1';
$route['kelas/(:any)/joined'] = 'kelas/joined/$1';

/* Invoice */
$route['invoice/(:num)/pdf'] = 'invoice/index/$1';

/* Sertifikat */
$route['sertifikat/(:any)/info'] = 'sertifikat/info/$1';
$route['sertifikat/(:any)/download'] = 'sertifikat/download/$1';

/* Reviews */
$route['review/(:any)/form'] = 'review/index/$1';
$route['review/(:any)/action'] = 'review/action/$1';