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
        $this->load->library('pagination', 'session');
        $this->load->model(array('dtr_model', 'holiday_model', 'employee_model'));
        if (!$_SESSION['is_logged_in']) {
            redirect(base_url(''));
        }
        include(getcwd() . '/application/libraries/zklib/ZKLib.php');

    }

    public function view()
    {
//        $this->add();
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

        $users = $this->employee_model->get_employees();
        $time_data = $this->dtr_model->get_one($user_id, $start_day, $end_day);
        $holidays = $this->holiday_model->get_holidays($start_day, $end_day);//get the holidays for the specific payroll period
        $can_request_ot = $this->dtr_model->can_request_overtime($_SESSION['user_id']);

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

            $dtr->pre_time = number_format($obj->pre, 2);
            var_dump($dtr->pre_time);
            $dtr->ot = $time->over_time + $obj->ot;
            $dtr->late = $obj->late;

            $dtrs[] = $dtr;

            $total_pre += $dtr->pre_time;
            $total_ot += $dtr->ot;
            $total_late = $dtr->late;

        }
        $data['active'] = "dtr";
        $data['page_load'] = 'admin/dtr2';
        $data['request_ot'] = $can_request_ot;
        $data['hol_day'] = $hol_day;
        $data['hol_name'] = $hol_name;
        $data['total_pre'] = number_format($total_pre, 2);
        $data['total_ot'] = number_format($total_ot, 2);
        $data['total_late'] = number_format($total_late, 2);;
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

    function getTimeDiff2($start, $end)
    {
        if ($start != null && $end) {
            $start_date = new DateTime($start);
            $end_date = new DateTime($end);
            $interval = $end_date->diff($start_date);
            $hours = $interval->format('%h');
            $minutes = $interval->format('%i');
            return number_format(round((($hours * 60 + $minutes) / 60), 2), 2);
        } else {
            return 0.0;
        }
    }

    function calculate_time($com_time, $time)
    {
        $obj = new stdClass();
        $obj->late = 0;
        $obj->ot = 0;
        if ($com_time > 8) {
            $obj->pre = 8;
            $obj->ot = $com_time - 8;
        } else {
            $obj->pre = $com_time;
//            $obj->late = 8 - $com_time;
        }
        $employee = $this->employee_model->get_one($time->employee_id);
        $s = str_replace(" ", "", $employee[0]->time_in);
        $s = str_replace(":", ".", $s);
        $s = str_split($s, 5);

        $t = str_replace(":", ".", $time->morning_in);
        if(doubleval($t)<=doubleval($s[0])){
            return $obj;
        }
        if (doubleval($t) >= doubleval($s[0])) {
            $obj->late = (doubleval($t) - doubleval($s[0]));
            return $obj;
        }
        $t = str_replace(":", ".", $time->afternoon_in);
        if (doubleval($t) > doubleval($s[0])) {
            $obj->late = (doubleval($t) - doubleval($s[0]));
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
            $this->load->model('Dbmodel');
            $this->DBModel->addOvertime($overtime);
        }
        redirect(base_url('admin/overtime'));
    }


    public function view2()
    {
//        $this->push();
//        echo "<pre>";
        if (!empty($_POST)) {
            $month = $_POST['month'];
            $half_month = $_POST['half_month'];
            $year = $_POST['year'];
            $user_id = $_POST['user_id'];
        } else {
            $month = date('m');
            $year = date('Y');
            $half_month = 'A';
            if (date('d') > 15) {
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
        $employees = $this->employee_model->get_employees();
        if ($user_id == 0) {
            $user_id = $employees[0]->employee_id;
        }

        $time_data = $this->dtr_model->get_one2($user_id, $start_day, $end_day);
        $holidays = $this->holiday_model->get_holidays($start_day, $end_day);//get the holidays for the specific payroll period
        $can_request_ot = $this->dtr_model->can_request_overtime($_SESSION['user_id']);


        while (strtotime($start_day) <= strtotime($end_day)) {
            $days[] = $start_day;
            $start_day = date("Y-m-d", strtotime("+1 day", strtotime($start_day)));
        }

        $dtrs = array();
        $total_pre = 0;
        $total_ot = 0;
        $total_late = 0;
//        echo "<pre>";
//        var_dump($time_data);
        foreach ($time_data as $time) {
            $time->morning_time = $this->getTimeDiff2($time->morning_in, $time->morning_out);
            $time->afternoon_time = $this->getTimeDiff2($time->afternoon_in, $time->afternoon_out);
            $time->overtime_time = $this->getTimeDiff2($time->overtime_in, $time->overtime_out);

            if (strlen($time->morning_in) > 0) {
                $arr = str_replace(":", "", $time->morning_in);
                $arr = str_split($arr, 2);
                $time->m_i_h = $arr[0];
                $time->m_i_m = $arr[1];
            }
            if (strlen($time->morning_out) > 0) {
                $arr = str_replace(":", "", $time->morning_out);
                $arr = str_split($arr, 2);
                $time->m_o_h = $arr[0];
                $time->m_o_m = $arr[1];
            }
            if (strlen($time->afternoon_in) > 0) {
                $arr = str_replace(":", "", $time->afternoon_in);
                $arr = str_split($arr, 2);
                $time->a_i_h = $arr[0];
                $time->a_i_m = $arr[1];
            }
            if (strlen($time->afternoon_out > 0)) {
                $arr = str_replace(":", "", $time->afternoon_out);
                $arr = str_split($arr, 2);
                $time->a_o_h = $arr[0];
                $time->a_o_m = $arr[1];
            }
            if (strlen($time->overtime_in) > 0) {
                $arr = str_replace(":", "", $time->overtime_in);
                $arr = str_split($arr, 2);
                $time->o_i_h = $arr[0];
                $time->o_i_m = $arr[1];
            }
            if (strlen($time->overtime_out) > 0) {
                $arr = str_replace(":", "", $time->overtime_out);
                $arr = str_split($arr, 2);
                $time->o_o_h = $arr[0];
                $time->o_o_m = $arr[1];
            }

            $com_time = $time->morning_time + $time->afternoon_time;
            $obj = $this->calculate_time($com_time, $time);

            $time->pre_time = number_format($obj->pre, 2);
            $time->ot = number_format($time->overtime_time + $obj->ot, 2);
            $time->late = number_format($obj->late,2);
//            echo "<pre>";
//            var_dump($time);
//            echo "</pre>";
            $dtrs[] = $time;
            $total_pre += $time->pre_time;
            $total_ot += $time->ot;
            $total_late += $time->late;

        }
        $data['active'] = "dtr";
        $data['page_load'] = 'admin/dtr2';
        $data['request_ot'] = $can_request_ot;
        $data['holidays'] = $holidays;
        $data['total_pre'] = number_format($total_pre, 2);
        $data['total_ot'] = number_format($total_ot, 2);
        $data['total_late'] = number_format($total_late, 2);;
        $data['dtrs'] = $dtrs;
        $data['days'] = $days;
        $data['half_month'] = $half_month;
        $data['month'] = $month_name;
        $data['year'] = $year;
        $data['users'] = $employees;
        $data['user_id'] = $user_id;
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
        date_default_timezone_set('Asia/Manila');
        //Default Timezone Of Your Country;
//        include(getcwd() . '/application/libraries/zklib/ZKLib.php');

//        $ret = $zk->connect();
//        if ($ret) {
//            $this->sort_attendance($zk->getAttendance());
//        }
//        $zk->disconnect();
//        $this->view();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function sort_attendance($attendances)
    {
//        echo "<pre>";
        foreach ($attendances as $attendance) {
            $date = date("Y-m-d", strtotime($attendance['timestamp']));
            $time = date("H:i", strtotime($attendance['timestamp']));
            $hour = date("H", strtotime($attendance['timestamp']));
            $am = date("A", strtotime($attendance['timestamp']));
            $result = $this->dtr_model->get_employee_time($attendance['id'], $date);

            if (empty($result)) {
                $time_sheet = new stdClass();
                $time_sheet->employee_id = $attendance['id'];
                $time_sheet->date = $date;
                $this->dtr_model->add($time_sheet);
                $result = $this->dtr_model->get_employee_time($attendance['id'], $date);
            }
            $time_sheet = $result[0];
            if (is_null($time_sheet->morning_in) && $am === 'AM') {
                $time_sheet->morning_in = $time;
            } elseif (!is_null($time_sheet->morning_in)) {
                $time_sheet->morning_out = $time;
                $a = str_replace(":", ".", $time_sheet->morning_in);
                $a = doubleval($a);
                $b = str_replace(":", ".", $time);
                $b = doubleval($b);
                $time_sheet->morning_time = $b-$a;
            } elseif (is_null($time_sheet->afternoon_in) && $am === 'PM') {
                $time_sheet->afternoon_in = $time;
            } elseif (!is_null($time_sheet->afternoon_in) && $am === 'PM' && is_null($time_sheet->afternoon_out)) {
                $time_sheet->afternoon_out = $time;
                $a = str_replace(":", ".", $time_sheet->afternoon_in);
                $a = doubleval($a);
                $b = str_replace(":", ".", $time);
                $b = doubleval($b);
                $time_sheet->afternoon_time = $b-$a;
            } elseif (is_null($time_sheet->overtime_in) && $am === 'PM') {
                $time_sheet->overtime_in = $time;
            } elseif (!is_null($time_sheet->overtime_in) && $am === 'PM') {
                $time_sheet->overtime_out = $time;
                $a = str_replace(":", ".", $time_sheet->overtime_in);
                $a = doubleval($a);
                $b = str_replace(":", ".", $time);
                $b = doubleval($b);
                $time_sheet->overtime_time = $b-$a;
            }
            $this->dtr_model->update($time_sheet, $time_sheet->time_sheet_id);
        }
    }

    public function push()
    {
        $zk = new ZKLib('169.254.132.152');
        $ret = $zk->connect();
        if ($ret) {
            $this->sort_attendance($zk->getAttendance());
        }
        $zk->disconnect();
    }
}