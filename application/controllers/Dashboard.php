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
        $this->load->model(array("dbmodel", 'employee_model', 'dashboard_model'));

        if (!$_SESSION['is_logged_in']) {
            redirect(base_url(''));
        }
        if ($_SESSION['user_type'] != "Admin") {
            redirect(base_url('404'));
        }
    }

    public function view()
    {
        $employees = $this->employee_model->get_users();

        $data['page_load'] = "admin/dashboard";
        $data['active'] = "dashboard";
        $data['employees'] = $employees;
        $this->load->view('includes/template', $data);
    }

    public function chart_data()
    {
        $data = array();
        $data[] = array(4300, 5312, 6251, 7841, 9821, 14984);
        $data[] = array(3000, 5312, 6251, 7841, 9821, 14984);
        $data[] = array(4215, 5312, 6251, 7841, 9821, 12000);
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

    public function push()
    {
       return redirect(base_url('dashboard'));
    }
}