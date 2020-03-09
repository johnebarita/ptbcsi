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
|	https://codeigniter.com/user_guide/general/routing.html
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


$route['default_controller'] = 'Login';

$route[''] = 'login/index';
$route['login'] = 'login/login';
$route['logout'] = 'login/logout';//not configured yet

$route['dashboard'] = 'dashboard/view';
$route['chart-data'] = 'dashboard/chart_data';

$route['dtr'] = 'dtr/view2';


$route['overtime'] = 'overtime/view';
$route['add-overtime'] = 'overtime/add';
$route['update-overtime'] = 'overtime/update_status';

$route['leave'] = 'leave/view';
$route['add-leave'] = 'leave/add';
$route['delete-leave'] = 'leave/delete';
$route['update-leave'] = 'leave/update';
$route['employee-leave'] = 'leave/employee_view';
$route['update-leave-status'] = 'leave/update_status';

$route['schedule'] = 'schedule/view';
$route['add-schedule'] = 'schedule/add';
$route['update-schedule'] = 'schedule/update';
$route['delete-schedule'] = 'schedule/delete';

$route['payroll'] = 'payroll/view2';

$route['cash-advance'] ='cash/view';
$route['add-cash-advance'] ='cash/add';
$route['update-cash-advance'] ='cash/update';
$route['delete-cash-advance'] ='cash/delete';


$route['employee'] = 'employee/view';
$route['add-employee'] = 'employee/add';
$route['update-employee'] = 'employee/update';

$route['position'] = 'position/view';
$route['add-position'] = 'position/add';
$route['update-position'] = 'position/update';
$route['delete-position'] = 'position/delete';

$route['calendar'] = 'calendar/view';
$route['calendar2'] = 'calendar2/view';
$route['calendar1'] = 'calendar/AddEvent';

$route['404_override'] = 'errors/show_404';
$route['404'] = 'errors/show_404';

$route['translate_uri_dashes'] = FALSE;


