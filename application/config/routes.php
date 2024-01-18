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

$route['single/(:any)'] = 'Consumer/single/$1';
$route['dashboard/(:num)'] = 'Consumer/dashboard/$1';
$route['consumer_dashboard'] = 'Consumer/consumer_dashboard';
$route['log_details/(:any)'] = 'Register/log_details/$1';
$route['consumer_register'] = 'Register/consumer_register';

$route['view_expenses'] = 'Cashier/expenses';
$route['cAdd_expenses'] = 'Cashier/add_expenses';
$route['payment'] = 'Cashier/payment';
$route['cashier_view'] = 'Cashier/cashier_view';
$route['cashier/(:num)'] = 'Cashier/cashier/$1';

$route['reader/(:any)'] = 'Meter_Reader/reader/$1';
$route['add_reading'] = 'Meter_Reader/add_reading';
$route['view_consumer'] = 'Meter_Reader/view_consumer';

$route['set_price'] = 'Admin/set_price';
$route['price'] = 'Admin/update_price';
$route['update_price/(:any)'] = 'Admin/update_price/$1';
$route['bill/(:any)'] = 'Admin/bill/$1';
$route['expenses'] = 'Admin/expenses';
$route['add_expenses'] = 'Admin/add_expenses';
$route['overdue_bills'] = 'Admin/update_overdue_bills';
$route['add_newMeter'] = 'Admin/add_newMeter';
$route['add_meter/(:any)'] = 'Admin/add_meter/$1';
$route['reports'] = 'Admin/reports';
$route['dashboard'] = 'Admin/dashboard';
$route['view_archive'] = 'Admin/view_archive';
$route['delete/(:any)'] = 'Admin/delete/$1';
$route['user_delete/(:any)'] = 'Admin/user_delete/$1';
$route['consumer'] = 'Admin/view';
$route['search'] = 'Admin/search';
$route['users'] = 'Admin/view_users';
$route['register'] = 'Admin/register';
$route['add_employee'] = 'Admin/add_employee';
$route['approve/(:any)'] = 'Admin/approve/$1';
$route['edit/(:any)'] = 'Admin/edit/$1';
$route['edit_user/(:any)'] = 'Admin/edit_user/$1';
$route['archive/(:any)'] = 'Admin/archive/$1';
$route['collectibles'] = 'Admin/collectibles';
$route['update_status/(:any)'] = 'Admin/update_status/$1';
$route['update_meter_stat/(:any)'] = 'Admin/update_meter_stat/$1';

$route['login'] = 'Login/login';
$route['logout'] = 'Login/logout';

$route['default_controller'] = 'Login/login';
$route['(:any)'] = 'Admin/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

