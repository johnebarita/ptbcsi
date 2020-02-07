<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 8:42 PM
 */
class Cash extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->model(array("cash_model", "employee_model"));

        if (!$_SESSION['is_logged_in'] ) {
            redirect(base_url(''));
        }
    }

    public function view()
    {
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url('404'));
        }
        $users = $this->employee_model->get_employees();
        $cashAdvances = $this->cash_model->get_all();
        $data['users'] = $users;
        $data['cashAdvances'] = $cashAdvances;
        $data['page_load'] = 'admin/cash_advance';
        $data['active'] = "cash advance";
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {

            $cash_advance = new stdClass();
            $cash_advance->employee_id = $_POST['user_id'];
            $cash_advance->date_Advance = date('Y-m-d');
            $cash_advance->amount = $_POST['amount'];
            $cash_advance->repay_amount = $_POST['repay_amount'];
            $cash_advance->purpose = $_POST['purpose'];
            $cash_advance->date_modified = date('Y-m-d');
            $cash_advance->status = "Unpaid";
            $cash_advance->balance = $_POST['amount'];
            $this->cash_model->add($cash_advance);
        }
        redirect(base_url('cash-advance'));
    }

    public function update()
    {
        if (!empty($_POST)) {
            $cash_advance = new stdClass();
            $cash_advance->amount = $_POST['amount'];
            $cash_advance->repay_amount = $_POST['repay_amount'];
            $this->load->model('Dbmodel');
            $this->DBModel->update($cash_advance, $_POST['cash_advance_id']);
        }
        redirect(base_url('cash-advance'));
    }

    public function delete()
    {
        if (!empty($_POST)) {
            $this->cash_model->delete($_POST['cash_advance_id']);
        }
        redirect(base_url('cash-advance'));
    }
}