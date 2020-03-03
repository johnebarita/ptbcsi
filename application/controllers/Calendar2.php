<?php

/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 2/18/2020
 * Time: 9:59 PM
 */
class Calendar2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->model(array("event_model", "holiday_model"));

        if (!$_SESSION['is_logged_in']) {
            redirect(base_url(''));
        }
    }

    public function view()
    {
        $data['page_load'] = "admin/calendar2";
        $data['active'] = "dashboard";
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}