<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/6/2020
 * Time: 6:10 PM
 */
class Calendar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->model(array("event_model","holiday_model"));

        if (!$_SESSION['is_logged_in']) {
            redirect(base_url(''));
        }
    }

    public function view()
    {

        $data['result'] = $this->db->get("event")->result();
        foreach ($data['result'] as $key => $value) {
            $data['data'][$key]['title'] = $value->content;
            $data['data'][$key]['start'] = $value->date;
            $data['data'][$key]['end'] = $value->status;
            $data['data'][$key]['backgroundColor'] = "#00a65a";
        }
        $data['active'] = 'calendar';
        $data['page_load'] = 'admin/calendar';
        $this->load->view('includes/template', $data);
    }

    public function AddEvent(){
        $datas = array(
            'date' => $this->input->post('date'),
            'content' => $this->input->post('event'),
        );

        $this->db->insert('Event', $datas);


        $data['result'] = $this->db->get("event")->result();

        foreach ($data['result'] as $key => $value) {
            $data['data'][$key]['title'] = $value->content;
            $data['data'][$key]['start'] = $value->date;
            $data['data'][$key]['end'] = $value->status;
            $data['data'][$key]['backgroundColor'] = "#00a65a";
        }
        redirect(base_url('calendar'));

    }
}