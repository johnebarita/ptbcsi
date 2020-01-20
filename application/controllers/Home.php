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
        $data['page_load'] = 'attendance';
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
    public function employees_leave_requests ()
    {
        $data['page_load'] = 'employees_leave_requests';
        $this->load->view('includes/template', $data);
    }
}
