<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/01/2020
 * Time: 4:32 PM
 */
class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('Attendance_Model');
    }

    public function dtr()
    {
        if (!empty($_POST)) {
            $month = $_POST['month'];
            $half_month = $_POST['half_month'];
            $year = $_POST['year'];
            $user_id = $_POST['user_id'];
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
        $this->load->model('dbmodel');
        $users = $this->dbmodel->getUsers();
        $time_data = $this->attendance_model->getAttendance($user_id, $start_day, $end_day);

        $can_request_ot =  $this->dbmodel->canRequestOVertime($_SESSION['user_id']);

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
        }
        $data['request_ot'] =$can_request_ot;
        $data['page_load'] = 'employee/dtr';
        $data['days'] = $days;
        $data['time'] = $time_data;
        $data['half_month'] = $half_month;
        $data['month'] = $month_name;
        $data['year'] = $year;
        $data['users'] = $users;
        $data['user_id'] = $user_id;
        $this->load->view('includes/template', $data);
    }


    public function requestOvertime()
    {
        if(!empty($_POST)){
            $overtime = new stdClass();
            $overtime->employee_id = $_SESSION['user_id'];
            $overtime->date_request = date('Y-m-d');
            $overtime->reason = $_POST['reason'];
            $overtime->request_start_time= '05:00 PM';
            $overtime->request_end_time ='10:00 PM';
            $overtime->status = 'Pending';
            $this->load->model('DBModel');
            $this->DBModel->addOvertime($overtime);
        }
        redirect(base_url('employee/dtr'));
    }

    public function leave_requests()
    {
        $this->load->model('DBModel');
        $leaves = $this->DBModel->getLeave($_SESSION['user_id']);
        $data['leaves'] = $leaves;
        $data['page_load'] = 'employee/leave_requests';
        $this->load->view('includes/template', $data);
    }
    public  function  deleteLeave(){
        if (!empty($_POST)) {
            $this->load->model('DBModel');
            $this->DBModel->deleteLEave($_POST['leave_id']);
        }
        redirect(base_url('employee/leave_requests'));
    }
    public function updateLeaveRequest()
    {
        if (!empty($_POST)) {
            $this->load->model('DBModel');
            $leave = new stdClass();
            $leave->type = $_POST['leave_type'];
            $leave->request_start_time = $_POST['date_from'];
            $leave->request_duration = $_POST['date_to'];
            $this->DBModel->updateLeaveRequest($leave,$_POST['leave_id']);
        }
        redirect(base_url('employee/leave_requests'));
    }
    public function add_leave()
    {
        if (!empty($_POST)) {
            $leave = new stdClass();
            $leave->employee_id = $_SESSION['user_id'];
            $leave->date_request = date('Y-m-d');
            $leave->type = $_POST['leave_type'];
            $leave->request_start_time = $_POST['date_from'];
            $leave->request_duration = $_POST['date_to'];
            $leave->status = 'Pending';
            $this->load->model('DBModel');
            $this->DBModel->addLeave($leave);

        }
        redirect(base_url('employee/leave_requests'));
//        $this->leave_requests();
    }

    public function payslip()
    {
        $data['page_load'] = 'employee/payslip';
        $this->load->view('includes/template', $data);
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
    }
}