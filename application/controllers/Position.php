<?php

class Position extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->model(array("position_model",'schedule_model'));
        if (!$_SESSION['is_logged_in'] )
        {
        redirect(base_url(''));
        }
    }
    public function view()
    {
        if ($_SESSION['user_type'] !="Admin") {
            redirect(base_url('404'));
        }
        $positions = $this->position_model->get_all();
        $schedules = $this->schedule_model->get_all();
        $data['schedules'] = $schedules;
        $data['positions'] = $positions;
        $data['page_load'] = 'admin/position';
        $data['active'] = 'position';
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
        if(!empty($_POST))
        {
//            var_dump($_POST);

            $position = new stdClass();
            $position->position = $_POST['position'];
            $position->rate = $_POST['rate'];
            $position->schedule_id = $_POST['schedule_id'];
            $position->date_modified = date('Y-m-d');

            $this->position_model->add($position);

        }
        redirect(base_url('position'));
    }

    public function update()
    {
        if (!empty($_POST)) {
            $position = new stdClass();
            $position->position_id = $_POST['position_id'];
            $position->position = $_POST['position'];
            $position->rate = $_POST['rate'];
            $position->schedule_id = $_POST['schedule_id'];
            $position->date_modified = date('Y-m-d');

            $this->load->model('position_model');
            $this->position_model->update($position, $_POST['position_id']);
        }
        redirect(base_url('position'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->position_model->delete($_POST['position_id']);
        }
        redirect(base_url('position'));
    }


}
