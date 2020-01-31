<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/01/2020
 * Time: 4:32 PM
 */
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('dbmodel');


    }

    public function dashboard()
    {
        $data['page_load'] = "admin/dashboard";
        $this->load->view('includes/template', $data);
    }

    public function dtr()
    {
        if (isset($_POST['month'])) {
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
        $users = $this->attendance_model->getUsers();
        $time_data = $this->attendance_model->getAttendance($user_id, $start_day, $end_day);

        $this->load->model('DBModel');

        $holidays = $this->dbmodel->getHolidays($start_day, $end_day);//get the holidays for the specific payroll period
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

    public function overtime()
    {
        $this->load->model('DBModel');
        $overtimes = $this->DBModel->getOverTimes();
        $users = $this->DBModel->getEmployees();
        $data['users'] = $users;
        $data['overtimes'] = $overtimes;
        $data['page_load'] = 'admin/overtime';
        $this->load->view('includes/template', $data);
    }

    public function leave_requests()
    {
        $this->load->model('DBModel');
        $leaves = $this->DBModel->getLeave($_SESSION['user_id']);
        $data['leaves'] = $leaves;
        $data['page_load'] = 'admin/leave_requests';
        $this->load->view('includes/template', $data);
    }

    public function employees_leave_requests()
    {
        $this->load->model('DBModel');
        $leaves = $this->DBModel->getLeaves();
        $users = $this->DBModel->getEmployees();
        $data['users'] = $users;
        $data['leaves'] = $leaves;
        $data['page_load'] = 'admin/employees_leave_requests';
        $this->load->view('includes/template', $data);
    }


    public function schedule()
    {
        $this->load->model("DBModel");
        $sched = $this->DBModel->get_schedule();


        $data['sched'] = $sched;
        $data['page_load'] = 'admin/schedule';
        $this->load->view('includes/template', $data);
    }

    public function employee_list()
    {
        $this->load->model('DBModel');
        $users = $this->DBModel->getEmployeeList();
        $data['users'] = $users;
        $data['page_load'] = 'admin/employee_list';
        $this->load->view('includes/template', $data);
    }

    public function position()
    {
        $data['page_load'] = 'admin/position';
        $this->load->view('includes/template', $data);
    }

    public function payroll()
    {
        if (!empty($_POST)) {
            //getting user inputs
            $month = $_POST['month'];
            $half_month = $_POST['half_month'];
            $year = $_POST['year'];
        } else {
            //setting default values;
            $month = date('m', strtotime(date('y-m-dd')));
            $year = date('y', strtotime(date('y-m-dd')));
            $half_month = 'A';
            if (date('d', strtotime(date('y-m-dd'))) > 15) {
                $half_month = 'B';
            }
        }

        //setting the start and end of payroll period to be processed.
        $start_day = $year . "-" . $month;
        $end_day = $start_day;
        if ($half_month == 'A') {
            $start_day .= '-01';
            $end_day .= -'15';
        } else {
            $start_day .= '-16';
            $end_day .= '-' . date('t', strtotime($start_day));
        }
        //setting month name for the month dropdown in the view -> to be reconsidered
        $month_name = date('F', strtotime($start_day));


        $users = $this->dbmodel->getUsers();// get all employees that are active
        $holidays = $this->dbmodel->getHolidays($start_day, $end_day);//get the holidays for the specific payroll period

        //this code if for checking if the given date is a holiday or not
        //really needs to be improved..
        $hol_day = array();
        $hol_type = array();
        foreach ($holidays as $hol) {
            $hol_day[] = substr($hol->date, -2);
            $hol_type [] = $hol->type;
        }

        $payrolls = array();

        foreach ($users as $user) {
            //getting DTR details for the payroll period
            $result = $this->dbmodel->getUserDTR($user->id, $start_day, $end_day);

            //creating another start_day and end_day variables to avoid overwriting the payroll period
            $start = date("Y-m-d", strtotime($start_day));
            $end = date("Y-m-d", strtotime($end_day));

            if (count($result) > 0) {
                $payrolls[] = $this->calculate_payroll($user, $result, $start, $end, $hol_day, $hol_type);
            } else {
                $payroll = new stdClass();//payroll object
                $payroll->id = $user->id;
                $payroll->name = $user->last_name . " " . $user->name;
                $payroll->monthly_rate = 10068.10;//to get from user data
                $payroll->daily_rate = round(($payroll->monthly_rate * 12) / 313, 2);//to get from user data
//                $payrolls[] = $payroll;
            }
        }

        $data['users'] = $users;
        $data['payrolls'] = $payrolls;
        $data['half_month'] = $half_month;
        $data['month'] = $month_name;
        $data['year'] = $year;
        $data['page_load'] = 'admin/payroll';
        $this->load->view('includes/template', $data);
    }


    public function cashAdvance()
    {
        $this->load->model('DBModel');
        $users = $this->DBModel->getEmployees();
        $cashAdvances = $this->DBModel->getCashAdvances();
        $data['users'] = $users;
        $data['cashAdvances'] = $cashAdvances;
        $data['page_load'] = 'admin/cashAdvance';
        $this->load->view('includes/template', $data);
    }

    public function attendance_report()
    {
        $data['page_load'] = 'admin/attendance_report';
        $this->load->view('includes/template', $data);
    }

    public function payroll_report()
    {
        $data['page_load'] = 'admin/payroll_report';
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

    function calculate_payroll($user, $time_data, $start, $end, $hol_day, $hol_type)
    {
        $payroll = new stdClass();
        $payroll->id = $user->id;
        $payroll->name = $user->last_name . " " . $user->name;
        $payroll->monthly_rate = 12000;//to get from user data
        $payroll->daily_rate = round(($payroll->monthly_rate * 12) / 313, 2);//to get from user data
        $payroll->allowance = 0;
        $payroll->dtr_time = 0;

        $payroll->nor_ot = 0;
        $payroll->nor_ot_pay = 0;

        $payroll->res_sun = 0;
        $payroll->res_sun_pay = 0;
        $payroll->res_sun_ot = 0;
        $payroll->res_sun_ot_pay = 0;

        $payroll->res_reg_hol = 0;
        $payroll->res_reg_hol_pay = 0;
        $payroll->res_reg_hol_ot = 0;
        $payroll->res_reg_hol_ot_pay = 0;

        $payroll->res_dob_hol = 0;
        $payroll->res_dob_hol_pay = 0;
        $payroll->res_dob_hol_ot = 0;
        $payroll->res_dob_hol_ot_pay = 0;

        $payroll->res_spe_hol = 0;
        $payroll->res_spe_hol_pay = 0;
        $payroll->res_spe_hol_ot = 0;
        $payroll->res_spe_hol_ot_pay = 0;

        $payroll->reg_hol = 0;
        $payroll->reg_hol_pay = 0;
        $payroll->reg_hol_ot = 0;
        $payroll->reg_hol_ot_pay = 0;

        $payroll->dob_hol = 0;
        $payroll->dob_hol_pay = 0;
        $payroll->dob_hol_ot = 0;
        $payroll->dob_hol_ot_pay = 0;

        $payroll->spe_hol = 0;
        $payroll->spe_hol_pay = 0;
        $payroll->spe_hol_ot = 0;
        $payroll->spe_hol_ot_pay = 0;

        $payroll->absent = 0;
        $payroll->late = 0;
        $payroll->total_ot = 0;

        $count = 0;
        $total_ot = 0;
        $total_res_ot_pay = 0;
        $total_hol_ot_pay = 0;
        $total_res_pay = 0;
        $total_hol_pay = 0;
//        echo "<br/>";
        while (strtotime($start) <= strtotime($end)) {

            $a = date('d', strtotime($start));
            $b = date('d', strtotime($time_data[$count]->date));
            $name = date('D', strtotime($start));
//            echo "<br/>";
//            echo $a." ".$b;
            if ($a == $b) {

                $morning_time = $this->getTimeDiff($time_data[$count]->morning_in_hour,
                    $time_data[$count]->morning_in_minute,
                    $time_data[$count]->morning_out_hour,
                    $time_data[$count]->morning_out_minute);
                $afternoon_time = $this->getTimeDiff($time_data[$count]->afternoon_in_hour,
                    $time_data[$count]->afternoon_in_minute,
                    $time_data[$count]->afternoon_out_hour,
                    $time_data[$count]->afternoon_out_minute);
                $over_time = $this->getTimeDiff($time_data[$count]->over_in_hour,
                    $time_data[$count]->over_in_minute,
                    $time_data[$count]->over_out_hour,
                    $time_data[$count]->over_out_minute);

                $com_time = $morning_time + $afternoon_time;
                $obj = $this->calculate_time($com_time);
                $obj->ot += $over_time;
                $total_ot += $over_time + $obj->ot;
                $payroll->late += $obj->late;
                //still need to get the list of holidays in order to proceed
                if ($name == "Sun") {
                    if (in_array($a, $hol_day)) {
                        $ndx = array_search($a, $hol_day);
                        switch ($hol_type[$ndx]) {
                            case 'Regular':
                                $payroll->res_reg_hol += $obj->pre;
                                $payroll->res_reg_hol_ot += $obj->ot;
                                $payroll->res_reg_hol_pay += ($payroll->daily_rate * (260 / 100)) * ($obj->pre / 8);
                                $payroll->res_reg_hol_ot_pay += (($payroll->daily_rate / 8) * 3.38) * $obj->ot;
                                $total_res_pay += ($payroll->daily_rate * (260 / 100)) * ($obj->pre / 8);
                                $total_res_ot_pay += (($payroll->daily_rate / 8) * 3.38) * $obj->ot;
                                echo "REGULAR";
                                break;
                            case 'Double':
                                $payroll->res_dob_hol += $obj->pre;
                                $payroll->res_dob_hol_ot += $obj->ot;
                                $payroll->res_dob_hol_pay += ($payroll->daily_rate * (390 / 100)) * ($obj->pre / 8);
                                $payroll->res_dob_hol_ot_pay += (($payroll->daily_rate / 8) * 5.07) * $obj->ot;
                                $total_res_pay += ($payroll->daily_rate * (390 / 100)) * ($obj->pre / 8);
                                $total_res_ot_pay += (($payroll->daily_rate / 8) * 5.07) * $obj->ot;
                                break;
                            case 'Special':
                                $payroll->res_spe_hol += $obj->pre;
                                $payroll->res_spe_hol_ot += $obj->ot;
                                $payroll->res_spe_hol_pay += ($payroll->daily_rate * (150 / 100)) * ($obj->pre / 8);
                                $payroll->res_spe_hol_ot_pay += (($user->daily_rate / 8) * 1.95) * $obj->ot;
                                $total_res_pay += ($payroll->daily_rate * (150 / 100)) * ($obj->pre / 8);
                                $total_res_ot_pay += (($user->daily_rate / 8) * 1.95) * $obj->ot;
                                break;
                        }
                    } else {
                        $payroll->res_sun += $obj->pre;
                        $payroll->res_sun_pay += ($payroll->daily_rate * (130 / 100)) * ($obj->pre / 8);
                        $payroll->res_sun_ot += $obj->ot;
                        $payroll->res_sun_ot_pay += (($payroll->daily_rate / 8) * 1.69) * $obj->ot;
                        $total_res_pay += ($payroll->daily_rate * (130 / 100)) * ($obj->pre / 8);
                        $total_res_ot_pay += (($payroll->daily_rate / 8) * 1.69) * $obj->ot;
                    }
                } else {
                    if (in_array($a, $hol_day)) {

                        $ndx = array_search($a, $hol_day);
                        switch ($hol_type[$ndx]) {
                            case 'Regular':
                                $payroll->reg_hol += $obj->pre;
                                $payroll->reg_hol_ot += $obj->ot;
                                $payroll->reg_hol_pay += ($payroll->daily_rate * (200 / 100)) * ($obj->pre / 8);
                                $payroll->reg_hol_ot_pay += (($payroll->daily_rate / 8) * 2.6) * $obj->ot;
                                $total_hol_pay += ($payroll->daily_rate * (200 / 100)) * ($obj->pre / 8);
                                $total_hol_ot_pay += (($payroll->daily_rate / 8) * 2.6) * $obj->ot;
                                break;
                            case 'Double':
                                $payroll->dob_hol += $obj->pre;
                                $payroll->dob_hol_ot += $obj->ot;
                                $payroll->dob_hol_pay += ($payroll->daily_rate * (300 / 100)) * ($obj->pre / 8);
                                $payroll->dob_hol_ot_pay += (($payroll->daily_rate / 8) * 3.9) * $obj->ot;
                                $total_hol_pay += ($payroll->daily_rate * (300 / 100)) * ($obj->pre / 8);
                                $total_hol_ot_pay += (($payroll->daily_rate / 8) * 3.9) * $obj->ot;
                                break;
                            case 'Special':
                                $payroll->spe_hol += $obj->pre;
                                $payroll->spe_hol_ot += $obj->ot;
                                $payroll->spe_hol_pay += ($payroll->daily_rate * (130 / 100)) * ($obj->pre / 8);
                                $payroll->spe_hol_ot_pay += (($payroll->daily_rate / 8) * 1.69) * $obj->ot;
                                $total_hol_pay += ($payroll->daily_rate * (130 / 100)) * ($obj->pre / 8);
                                $total_hol_ot_pay += (($payroll->daily_rate / 8) * 1.69) * $obj->ot;
                                break;
                        }
                    } else {
                        $payroll->dtr_time += $obj->pre;
                        $payroll->nor_ot += $obj->ot;
                        $payroll->nor_ot_pay += (($payroll->daily_rate / 8) * 1.25) * $obj->ot;
                    }
                }
                if ($count < count($time_data) - 1) {
                    $count++;
                }
            } elseif ($name != "Sun") {
                $payroll->absent++;
            }
            $start = date("Y-m-d", strtotime("+1 day", strtotime($start)));
        }
        $absent_pay = $payroll->daily_rate * $payroll->absent;
        $late_pay = ($payroll->daily_rate / 8) * ($payroll->late / 60);
        $payroll->basic_salary = ($payroll->monthly_rate / 2) - ($absent_pay + $late_pay);
        $payroll->total_ot = $total_ot;
        $payroll->gross_pay = $total_res_ot_pay +
            $total_hol_ot_pay +
            $total_res_pay +
            $total_hol_pay +
            $payroll->nor_ot_pay +
            $payroll->basic_salary;
        $payroll->pagibig_con = ($payroll->monthly_rate * .02) / 2;
        $payroll->philhealth_con = (($payroll->monthly_rate / 2) * (2.75 / 100)) / 2;
        $payroll->sss_con = 0;
        $payroll->cash_advance = 0;
        $payroll->sss_loan = 0;
        $payroll->pagibib_loan = 0;
        $payroll->other_deductions = 0;
        $payroll->total_deductions = $payroll->pagibig_con +
            $payroll->sss_con +
            $payroll->philhealth_con +
            $payroll->cash_advance +
            $payroll->sss_loan +
            $payroll->pagibib_loan +
            $payroll->other_deductions;
        $payroll->net_pay = $payroll->gross_pay - $payroll->total_deductions;
        return $payroll;
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
        redirect(base_url('admin/leave_requests'));
//        $this->leave_requests();
    }

    public function addEmployeeleave()
    {
        if (!empty($_POST)) {
            $leave = new stdClass();
            $leave->employee_id = $_POST['user_id'];
            $leave->date_request = date('Y-m-d');
            $leave->type = $_POST['leave_type'];
            $leave->request_start_time = $_POST['date_from'];
            $leave->request_duration = $_POST['date_to'];
            $leave->status = 'Pending';
            $this->load->model('DBModel');
            $this->DBModel->addLeave($leave);
        }
        redirect(base_url('admin/employees_leave_requests'));
//        $this->leave_requests();
    }

    public function updateLeaveStatus()
    {
        if (!empty($_POST)) {
            $this->load->model('DBModel');
            $this->DBModel->updateLeaveStatus($_POST['leave_id'], $_POST['status']);
        }
        redirect(base_url('admin/employees_leave_requests'));
    }

    public function updateLeaveRequest()
    {
        if (!empty($_POST)) {
            $this->load->model('DBModel');
            $leave = new stdClass();
            $leave->type = $_POST['leave_type'];
            $leave->request_start_time = $_POST['date_from'];
            $leave->request_duration = $_POST['date_to'];
            $this->DBModel->updateLeaveRequest($leave, $_POST['leave_id']);
        }
        redirect(base_url('admin/leave_requests'));
    }

    public function deleteLeave()
    {
        if (!empty($_POST)) {
            $this->load->model('DBModel');
            $this->DBModel->deleteLEave($_POST['leave_id']);
        }
        redirect(base_url('admin/leave_requests'));
    }

    public function updateOvertimeStatus()
    {
        if (!empty($_POST)) {
            $this->load->model('DBModel');
            $this->DBModel->updateOvertimeStatus($_POST['overtime_id'], $_POST['status']);
            echo "hala";
        } else {
            echo "hala";
        }
        redirect(base_url('admin/overtime'));
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

    public function add_schedule()
    {
        if (!empty($_POST)) {
            $timein = date('h:m A', strtotime($_POST['time-in']));
            $timeout = date('h:m A', strtotime($_POST['time-out']));
            date('h:m A', strtotime($timein));

            $this->load->model('DBModel');
            $this->DBModel->schedule_insert($timein, $timeout);
        }
        redirect(base_url('admin/schedule'));
    }

    public function scheduleUpdate()
    {

        $this->load->model('DBModel');

        if (!empty($_POST)) {
            $timein = date('h:m A', strtotime($_POST['time-in']));
            $timeout = date('h:m A', strtotime($_POST['time-out']));
            $sched_id = $_POST['sched-id'];
            date('h:m A', strtotime($timein));

            var_dump($sched_id);

            $this->load->model('DBModel');

            $sched = new stdClass();
            $sched->time_in = $timein;
            $sched->time_out = $timeout;
            $sched->date_modified = date('Y-m-d');

            $this->DBModel->update_schedule($sched_id, $sched);

        }
        redirect(base_url('admin/schedule'));
    }

    public function scheduleDelete()
    {
        if (!empty($_POST)) {
            $this->load->model('DBModel');
            $id = $_POST['sched'];
            $this->DBModel->delete_schedule($id);
        }
        redirect(base_url('admin/schedule'));

    }

    public function calendar()
    {

        $page_load = "admin/calendar2";
        $data['page_load'] = $page_load;
        $this->load->view('includes/template', $data);
    }


    public function addCashAdvance()
    {
        if (!empty($_POST)) {

            $cash = new stdClass();
            $cash->employee_id = $_POST['user_id'];
            $cash->date_Advance = date('Y-m-d');
            $cash->amount = $_POST['amount'];
            $cash->repay_amount = $_POST['repay_amount'];
            $cash->purpose = $_POST['purpose'];
            $cash->date_modified = date('Y-m-d');
            $cash->status = "Unpaid";
            $cash->balance = $_POST['amount'];
            $this->load->model('DBModel');
            $this->DBModel->addCashAdvance($cash);
        }
        redirect(base_url('admin/cashAdvance'));
    }

    public function updateCashAdvance()
    {
        if (!empty($_POST)) {
            $cash = new stdClass();
            $cash->amount = $_POST['amount'];
            $cash->repay_amount = $_POST['repay_amount'];
            $this->load->model('DBModel');
            $this->DBModel->updateCashAdvance($cash, $_POST['cash_id']);
        }
        redirect(base_url('admin/cashAdvance'));
    }

    public function editEmployee(){
        redirect(base_url('admin/employee_list'));
    }

}