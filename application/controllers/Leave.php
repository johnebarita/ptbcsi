<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 6:52 PM
 */
class Leave extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('pagination', 'session'));
        $this->load->model(array("leave_model", "employee_model"));
        $this->load->helper('url');
        if (!$_SESSION['is_logged_in'] ) {
            redirect(base_url(''));
        }
    }

    public function view()
    {
        $leaves = $this->leave_model->get_one($_SESSION['user_id']);
        $data['leaves'] = $leaves;
        $data['page_load'] = 'admin/leave';
        $data['my_leave'] = true;
        $data['active'] = "leave";
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $leave = new stdClass();
            $leave->employee_id = $_POST['user_id'];
            $leave->date_request = date('Y-m-d');
            $leave->type = $_POST['leave_type'];
            $leave->request_start_time = $_POST['date_from'];
            $leave->request_duration = $_POST['date_to'];
            $leave->status = 'Pending';
            $this->leave_model->add($leave);
        }

        if ($_SESSION['user_type'] != "Employee") {
            if ($_SESSION['user_id'] == $_POST['user_id']) {
                redirect(base_url('leave'));
            } else {
                redirect(base_url('employee-leave'));
            }
        } else {
            redirect(base_url('leave'));
        }

    }

    public function delete()
    {
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url('404'));
        }
        if (!empty($_POST)) {
            $this->leave_model->delete($_POST['leave_id']);
        }
        redirect(base_url('leave'));
    }

    public function update()
    {
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url('404'));
        }
        if (!empty($_POST)) {
            $leave = new stdClass();
            $leave->type = $_POST['leave_type'];
            $leave->request_start_time = $_POST['date_from'];
            $leave->request_duration = $_POST['date_to'];
            $this->leave_model->update_request($leave, $_POST['leave_id']);
        }
        redirect(base_url('leave'));
    }

    public function update_status()
    {
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url('404'));
        }
        if (!empty($_POST)) {
            $this->leave_model->update_status($_POST['leave_id'], $_POST['status']);
        }
        redirect(base_url('employee-leave'));
    }

    public function employee_view()
    {
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url('404'));
        }
        $leaves = $this->leave_model->get_all();
        $users = $this->employee_model->get_employees();
        $data['users'] = $users;
        $data['leaves'] = $leaves;
        $data['my_leave'] = false;
        $data['page_load'] = 'admin/employees_leave';
        $this->load->view('includes/template', $data);

    }

}