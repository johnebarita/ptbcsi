<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 9:13 PM
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->model(array("dtr_model", 'employee_model', 'dashboard_model', 'holiday_model'));

        if (!$_SESSION['is_logged_in']) {
            redirect(base_url(''));
        }
        if ($_SESSION['user_type'] != "Admin") {
            redirect(base_url('404'));
        }
    }

    public function view()
    {
        $employees = $this->employee_model->get_employees();
        $lates = $this->late_today();
        $data['lates'] = $lates;
        $data['page_load'] = "admin/dashboard";
        $data['active'] = "dashboard";
        $data['employees'] = $employees;
        $this->load->view('includes/template', $data);
    }

    public function chart_data()
    {
        $lat = $this->late_by_month();
        $data = array();
        $data[] = $lat['lates'];
        $data[] = $lat['ontime'];
        $data[] = $lat['absences'];
        echo json_encode($data);
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

    public function late_today()
    {
        $start_day = date('Y-m-d');
        $end_day = date('Y-m-d');
        $employees = $this->employee_model->get_employees();
        $late = 0;
        $holidays = $this->holiday_model->get_holidays($start_day, $end_day);//get the holidays for the specific payroll period

        foreach ($employees as $em) {
            $time_data = $this->dtr_model->get_today($em->employee_id, $start_day);

            if (count($time_data) > 0) {
                $s = str_replace(" ", "", $em->time_in);
                $s = str_replace(":", ".", $s);
                $s = str_split($s, 5);

                // time_in mornig
                $t = str_replace(":", ".", $time_data[0]->morning_in);
                //time in          //schedule
                if (doubleval($t) >= doubleval($s[0])) {
                    $late_diff = (doubleval($t) - doubleval($s[0]));
                    if ($late_diff >= .15) {
                        $late++;
                    }
                } // time_in afternoon
                else {
                    $t = str_replace(":", ".", $time_data[0]->afternoon_in);
                    if (doubleval($t) >= doubleval($s[0])) {
                        $late_diff = (doubleval($t)) - (doubleval($s[0]));
                        if ($late_diff >= .15) {
                            $late++;
                        }
                    }
                }
            }

        }
        return $late;
    }

    public function late_by_month()
    {
        $lat = array();
        $abs = array();
        $ont = array();
        for ($i = 1; $i <= 3; $i++) {
            $year = date('Y');
            $month = date('m', strtotime($year . '-' . $i . '-01'));

            $start_day = $year . "-" . $month . '-01';
            $end_day = $year . '-' . $month . '-' . date('t', strtotime($start_day));
            $employees = $this->employee_model->get_employees();
            $holidays = $this->holiday_model->get_holidays($start_day, $end_day);
            $late = 0;
            $absences = 0;
            $ontime = 0;

            $days = intval(date('t', strtotime($start_day)));

            foreach ($employees as $employee) {
                $time_data = $this->dtr_model->get_one2($employee->employee_id, $start_day, $end_day);
//                var_dump($start_day . ' ' . $end_day);
//                var_dump($time_data);
                $ndx = 0;

                if (count($time_data) > 0) {


                    for ($j = 1; $j <= $days; $j++) {
                        $day = date('Y-m-d', strtotime($year . '-' . $month . '-' . $j));
                        $day_name = date('l', strtotime($day));
                        if ($day == $time_data[$ndx]->date) {

                            $s = str_replace(" ", "", $employee->time_in);
                            $s = str_replace(":", ".", $s);
                            $s = str_split($s, 5);

                            // time_in mornig
                            $t = str_replace(":", ".", $time_data[$ndx]->morning_in);
                            $aft = str_replace(":", ".", $time_data[$ndx]->afternoon_in);
                            //time in          //schedule
                            if (doubleval($t) >= doubleval($s[0])) {
                                $late_diff = (doubleval($t) - doubleval($s[0]));
                                if ($late_diff >= .15) {
                                    $late++;
                                }
                            } // time_in afternoon
                            elseif (doubleval($aft) >= doubleval($s[0]))
                            {
                                $late_diff_aft = (doubleval($aft)) - (doubleval($s[0]));
                                if ($late_diff_aft >= .15)
                                {
                                    $late++;
                                }
                            }
                            else
                            {
                                $ontime++;
                            }
                            if ($ndx < count($time_data) - 1) {
                                $ndx++;
                            }
                            //!= sunday && not equal holidays

                        } elseif ($day_name != "Sunday") {
                            $absences++;
                        }
                    }
                }

            }
            $abs[] = $absences;
            $lat[] = $late;
            $ont[] = $ontime;
        }
        $data['lates'] = $lat;
        $data['absences'] = $abs;
        $data['ontime'] = $ont;

        return $data;
    }

    public function push()
    {
        redirect(base_url('dashboard'));
    }
}