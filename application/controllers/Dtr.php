<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 4:39 PM
 */
class Dtr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('pagination','session');
        $this->load->model(array('dtr_model','holiday_model','employee_model'));
        if (!$_SESSION['is_logged_in'] ) {
            redirect(base_url(''));
        }
    }

    public function view()
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

        $users = $this->employee_model->get_users();
        $time_data = $this->dtr_model->get_one($user_id, $start_day, $end_day);
        $holidays = $this->holiday_model->get_holidays($start_day, $end_day);//get the holidays for the specific payroll period
        $can_request_ot =  $this->dtr_model->can_request_overtime($_SESSION['user_id']);

        $hol_day = array();
        $hol_name = array();
        foreach ($holidays as $hol) {
            $hol_day[] = substr($hol->date, -2);
            $hol_name [] = $hol->description;
        }


        while (strtotime($start_day) <= strtotime($end_day)) {
            $day_num = date('d', strtotime($start_day));
            $day_name = date('D', strtotime($start_day));
            $start_day = date("Y-m-d", strtotime("+1 day", strtotime($start_day)));
            $days[] = array($day_num, $day_name);
        }

        $dtrs = array();
        $total_pre = 0;
        $total_ot = 0;
        $total_late = 0;
        foreach ($time_data as $time) {
            $time->morning_time = $this->getTimeDiff($time->morning_in_hour, $time->morning_in_minute, $time->morning_out_hour, $time->morning_out_minute);
            $time->afternoon_time = $this->getTimeDiff($time->afternoon_in_hour, $time->afternoon_in_minute, $time->afternoon_out_hour, $time->afternoon_out_minute);
            $time->over_time = $this->getTimeDiff($time->over_in_hour, $time->over_in_minute, $time->over_out_hour, $time->over_out_minute);

            $dtr = $time;
            $dtr->morning_time = $this->getTimeDiff($time->morning_in_hour, $time->morning_in_minute, $time->morning_out_hour, $time->morning_out_minute);
            $dtr->afternoon_time = $this->getTimeDiff($time->afternoon_in_hour, $time->afternoon_in_minute, $time->afternoon_out_hour, $time->afternoon_out_minute);
            $dtr->over_time = $this->getTimeDiff($time->over_in_hour, $time->over_in_minute, $time->over_out_hour, $time->over_out_minute);

            $com_time = $time->morning_time + $time->afternoon_time;
            $obj = $this->calculate_time($com_time);

            $dtr->pre_time = $obj->pre;
            $dtr->ot = $time->over_time + $obj->ot;
            $dtr->late = $obj->late;

            $dtrs[] = $dtr;

            $total_pre += $dtr->pre_time;
            $total_ot += $dtr->ot;
            $total_late = $dtr->late;

        }

        $data['page_load'] = 'admin/dtr';
        $data['request_ot'] =$can_request_ot;
        $data['hol_day'] = $hol_day;
        $data['hol_name'] = $hol_name;
        $data['total_pre'] = $total_pre;
        $data['total_ot'] = $total_ot;
        $data['total_late'] = $total_late;
        $data['dtrs'] = $dtrs;
        $data['days'] = $days;
        $data['half_month'] = $half_month;
        $data['month'] = $month_name;
        $data['year'] = $year;
        $data['users'] = $users;
        $data['user_id'] = $user_id;
        $this->load->view('includes/template', $data);

    }

    function getTimeDiff($start_hr, $start_mn, $end_hr, $end_mn)
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
            return 0.0;
        }
    }

    function calculate_time($time)
    {
        $obj = new stdClass();
        $obj->late = 0;
        $obj->ot = 0;
        if ($time > 8) {
            $obj->pre = 8;
            $obj->ot = $time - 8;
        } else {
            $obj->pre = $time;
            $obj->late = 8 - $time;
        }
        return $obj;
    }

    public function requestOvertime()
    {
        if (!empty($_POST)) {
            $overtime = new stdClass();
            $overtime->employee_id = $_SESSION['user_id'];
            $overtime->date_request = date('Y-m-d');
            $overtime->reason = $_POST['reason'];
            $overtime->request_start_time = '05:00 PM';
            $overtime->request_end_time = '10:00 PM';
            $overtime->status = 'Pending';
            $this->load->model('DBModel');
            $this->DBModel->addOvertime($overtime);
        }
        redirect(base_url('admin/overtime'));
    }

}