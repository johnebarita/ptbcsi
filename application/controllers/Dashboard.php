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
        $this->load->model("dbmodel");

        if (!$_SESSION['is_logged_in']) {
            redirect(base_url(''));
        }
        if ($_SESSION['user_type'] != "Admin") {
            redirect(base_url('404'));
        }
    }

    public function view()
    {
        $data['page_load'] = "admin/dashboard";
        $data['active'] = "dashboard";
        $this->load->view('includes/template', $data);
    }
}