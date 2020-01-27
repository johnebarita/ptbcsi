<?php

/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 1/25/2020
 * Time: 3:38 PM
 */
class Employee extends  CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
        // load Pagination library
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->database();

        // load URL helper
        $this->load->helper('url');
        $this->load->model('Attendance_Model');
    }

    public function addEmployee()
    {
        //Check submit button
        if (isset($_POST['addEmployee'])) {
            //get form's data and store in local variable
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $birthdate = $_POST['birthdate'];
            $contact = $_POST['contact'];
            $gender = $_POST['gender'];
            $position = $_POST['position'];
            $schedule = $_POST['schedule'];
            $datehired = $_POST['datehired'];

            $employees = $this->Attendance_Model->addEmployee($firstname, $lastname, $address, $birthdate, $contact, $gender, $position, $schedule, $datehired);

            //call addEmployee method of Attendance_Model and pass variables as parameter
            redirect(base_url('employee/employee_list', $employees));
        }

    }


    public function index()
    {

        $data['page_load'] = '/employee/dashboard';
        $this->load->view('includes/employee_template', $data);
//        $this->load->view('Calendar');

    }

    public function dtr()
    {

        if (isset($_POST['month'])) {
            $month = $_POST['month'];
            $half_month = $_POST['half_month'];
            $year = $_POST['year'];
        } else {
            $month = date('m', strtotime(date('y-m-dd')));
            $year = date('y', strtotime(date('y-m-dd')));

            $half_month = 'A';
            if (date('d', strtotime(date('y-m-dd'))) > 15) {
                $half_month = 'B';
            }
            $user_id = 0;
        }


        $start_day = $year . "-" . $month;
        $end_day = $start_day;
        if ($half_month == 'A') {
            $start_day .= '-01';
            $end_day .= -'15';
        } else {
            $start_day .= '-16';
            $end_day .= '-' . date('t', strtotime($start_day));
        }


        $days = array();
        $month_name = date('F', strtotime($start_day));

        $this->load->model('attendance_model');
        $users = $this->attendance_model->getUsers();
        $time_data = $this->attendance_model->getAttendance(307, $start_day, $end_day);

        while (strtotime($start_day) <= strtotime($end_day)) {
            $day_num = date('d', strtotime($start_day));
            $day_name = date('D', strtotime($start_day));
            $start_day = date("Y-m-d", strtotime("+1 day", strtotime($start_day)));
            $days[] = array($day_num, $day_name);
        }

        foreach ($time_data as $time) {
            $time->morning_time = $this->getTimeDiff($time->morning_in_hour, $time->morning_in_minute, $time->morning_out_hour, $time->morning_out_minute);
            $time->afternoon_time = $this->getTimeDiff($time->afternoon_in_hour, $time->afternoon_in_minute, $time->afternoon_out_hour, $time->afternoon_out_minute);
            $time->over_time = $this->getTimeDiff($time->over_in_hour, $time->over_in_minute, $time->over_out_hour, $time->over_out_minute);

            if ($time->morning_time != null && $time->afternoon_time != null) {
                $pre = $time->morning_time + $time->afternoon_time;
                if ($pre > 8) {

                }


            }
        }

        $data['page_load'] = 'employee/dtr';
        $data['days'] = $days;
        $data['time'] = $time_data;
        $data['half_month'] = $half_month;
        $data['month'] = $month_name;
        $data['year'] = $year;
        $data['users'] = $users;
//        $data['user_id'] = $user_id;
        $this->load->view('includes/employee_template', $data);

    }

    public function employee_list()
    {
        $this->load->model('attendance_model');
        $users = $this->attendance_model->getUsers();

        $data['users'] = $users;
        $data['page_load'] = 'employee/employee_list';
        $this->load->view('includes/employee_template', $data);
    }

    public function button()
    {
        $data['page_load'] = 'employee/button';
        $this->load->view('includes/employee_template', $data);    }

    public function card()
    {
        $data['page_load'] = 'employee/card';
        $this->load->view('includes/employee_template', $data);    }

    public function color()
    {
        $data['page_load'] = 'employee/color';
        $this->load->view('includes/employee_template', $data);    }

    public function border()
    {
        $data['page_load'] = 'employee/border';
        $this->load->view('includes/employee_template', $data);    }

    public function animation()
    {
        $data['page_load'] = 'employee/animation';
        $this->load->view('includes/employee_template', $data);    }

    public function other()
    {
        $data['page_load'] = 'employee/other';
        $this->load->view('includes/employee_template', $data);    }

    public function payroll()
    {
        $data['page_load'] = '/employee/payroll';
        $this->load->view('includes/employee_template', $data);    }

    public function leave_requests()
    {
        $data['page_load'] = 'employee/leave_requests';
        $this->load->view('includes/employee_template', $data);    }

    public function employees_leave_requests()
    {
        $data['page_load'] = 'employee/employees_leave_requests';
        $this->load->view('includes/employee_template', $data);    }

    public function test()
    {
        $data['page_load'] = 'employee/employees_leave_requests';
        $this->load->view('includes/employee_template', $data);
    }

    public function overtime()
    {
        $data['page_load'] = 'employee/overtime';
        $this->load->view('includes/employee_template', $data);
    }

    public function schedule()
    {
        $data['page_load'] = 'employee/schedule';
        $this->load->view('includes/employee_template', $data);
    }

    public function position()
    {
        $data['page_load'] = 'employee/position';
        $this->load->view('includes/employee_template', $data);
    }

    public function cashAdvance()
    {
        $data['page_load'] = 'employee/cashAdvance';
        $this->load->view('includes/employee_template', $data);
    }

    public function reports()
    {
        $data['page_load'] = 'employee/reports';
        $this->load->view('includes/employee_template', $data);
    }

    public function attendance_report()
    {
        $data['page_load'] = 'employee/attendance_report';
        $this->load->view('includes/employee_template', $data);
    }

    public function payroll_report()
    {
        $data['page_load'] = 'employee/payroll_report';
        $this->load->view('includes/employee_template', $data);
    }

    public function getTimeDiff($start_hr, $start_mn, $end_hr, $end_mn)
    {

        if ($start_hr != null && $start_hr != null && $end_hr != null && $end_mn != null) {

            if ($start_hr == 12) {
                $start_hr = 1;
                $end_hr += 1;
            }
            $start_date = new DateTime($start_hr . ':' . $start_mn . ':00');
            $end_date = new DateTime($end_hr . ':' . $end_mn . ':00');
            $interval = $end_date->diff($start_date);
            $hours = $interval->format('%h');
            $minutes = $interval->format('%i');
            return round((($hours * 60 + $minutes) / 60), 2);
        } else {
            return null;
        }


//        $start_date = new DateTime(($time[$j]->morning_in_hour??'0').':'.($time[$j]->morning_in_minute??'0').':00');
//                                $end_date = new DateTime(($time[$j]->morning_out_hour?? '0').':'.($time[$j]->morning_out_minute??'0').':00');
//                                $interval = $start_date->diff($end_date);
//                                $hours   = $interval->format('%h');
//                                $minutes = $interval->format('%i');
//                                echo  round((($hours * 60 + $minutes)/60),2);

    }

    public function payslip(){
        $data['page_load'] = 'employee/payslip';
        $this->load->view('includes/employee_template', $data);
    }
//    public function load_data() {
//        $events = $this->em->get_event_list();
//        if($events !== NULL) {
//            echo json_encode(array('success' => 1, 'result' => $events));
//        } else {
//            echo json_encode(array('success' => 0, 'error' => 'Event not found'));
//        }
//    }


}