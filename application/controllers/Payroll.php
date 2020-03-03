<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 8:33 PM
 */
class Payroll extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->model(array("employee_model","holiday_model","dtr_model"));
        if (!$_SESSION['is_logged_in'] ) {
            redirect(base_url(''));
        }
    }

    public function view()
    {
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url('404'));
        }

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


        $users = $this->employee_model->get_users();// get all employees that are active
        $holidays = $this->holiday_model->get_holidays($start_day, $end_day);//get the holidays for the specific payroll period

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
            $result = $this->dtr_model->get_one($user->id, $start_day, $end_day);

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
        $data['active'] ='payroll';
        $data['page_load'] = 'admin/payroll';
        $this->load->view('includes/template', $data);
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

    public function add()
    {
        // TODO: Implement add() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}