<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/15/2019
 * Time: 1:18 PM
 */
class Home extends CI_Controller
{

    public function index()
    {
        $data['page_load'] = 'dashboard';
        $this->load->view('includes/template', $data);

    }

    public function attendance()
    {
        if (isset($_POST['month'])) {
            $month = $_POST['month'];
            $half_month = $_POST['half_month'];
            $year = $_POST['year'];
        } else {
            $month = date('m', strtotime(date('y-m-d')));
            $year = date('y', strtotime(date('y-m-d')));
            $half_month = 'A';
            if (date('d', strtotime(date('y-m-d'))) > 15) {
                $half_month = 'B';
            }
        }


        $start_day = $year . "-" . $month;
        $end_day = $start_day;
        if ($half_month == 'A') {
            $start_day .= '-1';
            $end_day .= -'15';
        } else {
            $start_day .= '-16';
            $end_day .= '-' . date('t', strtotime($start_day));
        }


        $days = array();
        $time_data = array("8:00", "12:00", "4", "1:00", "5:00", "4", "", "", "", "8", "", "");
        $month_name = date('F', strtotime($start_day));

        while (strtotime($start_day) <= strtotime($end_day)) {
            $day_num = date('d', strtotime($start_day));
            $day_name = date('D', strtotime($start_day));
            $start_day = date("Y-m-d", strtotime("+1 day", strtotime($start_day)));
            $days[] = array($day_num, $day_name);
        }

        $data['page_load'] = 'attendance';
        $data['days'] = $days;
        $data['time'] = $time_data;
        $data['half_month'] = $half_month;
        $data['month'] = $month_name;
        $data['year'] = $year;
        $this->load->view('includes/template', $data);

    }

    public function employee_list()
    {
        $data['page_load'] = 'employee_list';
        $this->load->view('includes/template', $data);
    }

    public function button()
    {
        $data['page_load'] = 'button';
        $this->load->view('includes/template', $data);
    }

    public function card()
    {
        $data['page_load'] = 'card';
        $this->load->view('includes/template', $data);
    }

    public function color()
    {
        $data['page_load'] = 'color';
        $this->load->view('includes/template', $data);
    }

    public function border()
    {
        $data['page_load'] = 'border';
        $this->load->view('includes/template', $data);
    }

    public function animation()
    {
        $data['page_load'] = 'animation';
        $this->load->view('includes/template', $data);
    }

    public function other()
    {
        $data['page_load'] = 'other';
        $this->load->view('includes/template', $data);
    }

    public function payroll()
    {
        $data['page_load'] = 'payroll';
        $this->load->view('includes/template', $data);
    }

    public function leave_requests()
    {
        $data['page_load'] = 'leave_requests';
        $this->load->view('includes/template', $data);
    }

    public function employees_leave_requests()
    {
        $data['page_load'] = 'employees_leave_requests';
        $this->load->view('includes/template', $data);
    }

    public function test()
    {
        $data['page_load'] = 'employees_leave_requests';
        $this->load->view('includes/template', $data);
    }
}
