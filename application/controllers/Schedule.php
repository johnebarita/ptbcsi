<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 8:08 PM
 */
class Schedule extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->model("schedule_model");
        if (!$_SESSION['is_logged_in'] ) {
            redirect(base_url(''));
        }
    }

    public function view()
    {
        if ($_SESSION['user_type'] !="Admin") {
            redirect(base_url('404'));
        }
        $schedules = $this->schedule_model->get_all();
        $data['schedules'] = $schedules;
        $data['page_load'] = 'admin/schedule';
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $time_in = date('h:m A', strtotime($_POST['time-in']));
            $time_out = date('h:m A', strtotime($_POST['time-out']));
            $this->schedule_model->add($time_in, $time_out);
        }
        redirect(base_url('schedule'));
    }

    public function update()
    {
        if (!empty($_POST)) {
            $time_in = date('h:m A', strtotime($_POST['time_in']));
            $time_out = date('h:m A', strtotime($_POST['time_out']));
            $schedule = new stdClass();
            $schedule->time_in = $time_in;
            $schedule->time_out = $time_out;
            $schedule->date_modified = date('Y-m-d');
            $this->schedule_model->update($_POST['schedule_id'], $schedule);
        }
        redirect(base_url('schedule'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->schedule_model->delete($_POST['schedule_id']);
        }
        redirect(base_url('schedule'));
    }
}