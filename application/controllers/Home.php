<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 10/15/2019
 * Time: 1:18 PM
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','html','form'));
        // load Pagination library
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->database();

        // load URL helper
        $this->load->helper('url');
        $this->load->model('Attendance_Model');
    }

    public function addEmployee()
    {
        //Check submit button
        if(isset($_POST['addEmployee'])) {
            //get form's data and store in local variable
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $birthdate = $_POST['birthdate'];
            $contact = $_POST['contact'];
            $gender = $_POST['gender'];
            $position = $_POST['position'];
            $schedule = $_POST['schedule'];
            $datehired = $_POST['datehired'];

            $employees = $this->Attendance_Model->addEmployee($firstname,$lastname,$address,$birthdate,$contact,$gender,$position,$schedule,$datehired);

            //call addEmployee method of Attendance_Model and pass variables as parameter
            redirect(base_url('employee_list', $employees));
        }

    }


    public function index()
    {

        $data['page_load'] = 'dashboard';
        $this->load->view('includes/template', $data);
//        $this->load->view('Calendar');

    }

    public function dtr()
    {

        if (isset($_POST['month'])) {
            $month = $_POST['month'];
            $half_month = $_POST['half_month'];
            $year = $_POST['year'];
            $user_id = $_POST['user_id'];
        } else {
            $month = date('m', strtotime(date('y-m-dd')));
            $year = date('y', strtotime(date('y-m-dd')));
            $half_month = 'A';
            if (date('d', strtotime(date('y-m-dd'))) > 15) {
                $half_month = 'B';
            }
            $user_id =0;
        }



        $start_day = $year . "-" . $month;
        $end_day = $start_day;
        if ($half_month == 'A') {
            $start_day .= '-01';
            $end_day .= -'15';
        } else {
            $start_day .= '-16';
            $end_day .= '-' . date('t', strtotime($start_day));
        }


        $days = array();
        $month_name = date('F', strtotime($start_day));

        $this->load->model('attendance_model');
        $users = $this->attendance_model->getUsers();
        $time_data = $this->attendance_model->getAttendance($user_id,$start_day,$end_day);

        while (strtotime($start_day) <= strtotime($end_day)) {
            $day_num = date('d', strtotime($start_day));
            $day_name = date('D', strtotime($start_day));
            $start_day = date("Y-m-d", strtotime("+1 day", strtotime($start_day)));
            $days[] = array($day_num, $day_name);
        }


        $data['page_load'] = 'dtr';
        $data['days'] = $days;
        $data['time'] = $time_data;
        $data['half_month'] = $half_month;
        $data['month'] = $month_name;
        $data['year'] = $year;
        $data['users'] = $users;
        $data['user_id'] = $user_id;
        $this->load->view('includes/template', $data);

    }

    public function employee_list()
    {
        $this->load->model('attendance_model');
        $users = $this->attendance_model->getUsers();

        $data['users'] = $users;
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
    public function overtime()
    {
        $data['page_load'] = 'overtime';
        $this->load->view('includes/template', $data);
    }
    public function schedule()
    {
        $data['page_load'] = 'schedule';
        $this->load->view('includes/template', $data);
    }
    public function position()
    {
        $data['page_load'] = 'position';
        $this->load->view('includes/template', $data);
    }
    public function cashAdvance()
    {
        $data['page_load'] = 'cashAdvance';
        $this->load->view('includes/template', $data);
    }

//    public function load_data() {
//        $events = $this->em->get_event_list();
//        if($events !== NULL) {
//            echo json_encode(array('success' => 1, 'result' => $events));
//        } else {
//            echo json_encode(array('success' => 0, 'error' => 'Event not found'));
//        }
//    }
}
