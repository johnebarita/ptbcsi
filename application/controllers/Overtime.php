<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 5:52 PM
 */
class Overtime extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('pagination','session');
        $this->load->model(array('overtime_model', 'Employee_model'));
        if (!$_SESSION['is_logged_in'] ) {
            redirect(base_url(''));
        }
    }

    public function  view(){
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url('404'));
        }
        $overtimes = $this->overtime_model->get_all();
        $users = $this->employee_model->get_employees();
        $data['users'] = $users;
        $data['overtimes'] = $overtimes;
        $data['page_load'] = 'admin/overtime';
        $data['active'] = "overtime";
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $overtime = new stdClass();
            $overtime->employee_id = $_POST['user_id'];
            $overtime->date_request = date('Y-m-d');
            $overtime->reason = $_POST['reason'];
            $overtime->request_start_time = '05:00 PM';
            $overtime->request_end_time = '10:00 PM';
            $overtime->status = 'Pending';
            $this->overtime_model->add($overtime);
        }
        if($_SESSION['user_type']=="Employee"):
            redirect(base_url('dtr'));
        else:
            redirect(base_url('overtime'));
        endif;

    }

    public function update_status()
    {
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url());
        }
        if (!empty($_POST)) {
            $this->overtime_model->update_status($_POST['overtime_id'], $_POST['status']);
        }
        redirect(base_url('overtime'));
    }
}