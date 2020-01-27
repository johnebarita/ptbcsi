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
$route['default_controller'] = 'home';

//admin
$route['home'] = 'home/index';
$route['dtr'] = 'home/dtr';
$route['employee_list'] = 'home/employee_list';
$route['add_employee'] = 'home/addEmployee';
$route['leave_requests'] = 'home/leave_requests';
$route['employees_leave_requests'] = 'home/employees_leave_requests';
$route['button'] = 'home/button';
$route['card'] = 'home/card';
$route['color'] = 'home/color';
$route['border'] = 'home/border';
$route['animation'] = 'home/animation';
$route['overtime'] = 'home/overtime';
$route['schedule'] = 'home/schedule';
$route['position'] = 'home/position';
$route['cashAdvance'] = 'home/cashAdvance';
$route['reports'] = 'home/reports';
$route['attendance_report'] = 'home/attendance_report';
$route['payroll_report'] = 'home/payroll_report';
$route['other'] = 'home/other';
$route['payroll'] = 'home/payroll';
$route['test'] = 'attendancecontroller/test';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//employee
$route['employee'] = 'employee/index';
$route['employee/dtr'] = 'employee/dtr';
$route['employee/dashboard'] = 'employee/dashboard';
$route['employee/employee_list'] = 'employee/employee_list';
$route['employee/add_employee'] = 'employee/addEmployee';
$route['employee/leave_requests'] = 'employee/leave_requests';
$route['employee/employees_leave_requests'] = 'employee/employees_leave_requests';
$route['employee/button'] = 'employee/button';
$route['employee/card'] = 'employee/card';
$route['employee/color'] = 'employee/color';
$route['employee/border'] = 'employee/border';
$route['employee/animation'] = 'employee/animation';
$route['employee/overtime'] = 'employee/overtime';
$route['employee/schedule'] = 'employee/schedule';
$route['employee/position'] = 'employee/position';
$route['employee/cashAdvance'] = 'employee/cashAdvance';
$route['employee/reports'] = 'employee/reports';
$route['employee/attendance_report'] = 'employee/attendance_report';
$route['employee/payroll_report'] = 'employee/payroll_report';
$route['employee/other'] = 'employee/other';
$route['employee/payroll'] = 'employee/payroll';
$route['employee/payslip'] = 'employee/payslip';
$route['employee/test'] = 'attendancecontroller/test';
$route['employee/404_override'] = '';
//$route['calendar'] = 'home/calendar';