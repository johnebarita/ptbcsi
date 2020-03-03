<?php

/**
 * Created by PhpStorm.
 * User: D20
 * Date: 2/6/2020
 * Time: 6:28 PM
 */
class Employee extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination', 'session');
        $this->load->model(array("cash_model", "employee_model", "position_model"));

        if (!$_SESSION['is_logged_in']) {
            redirect(base_url(''));
        }
    }

    public function view()
    {
        if ($_SESSION['user_type'] == "Employee") {
            redirect(base_url('404'));
        }
        $employees = $this->employee_model->get_employees();
        $positions = $this->position_model->get_all();
        $data['employees'] = $employees;
        $data['positions'] = $positions;
        $data['page_load'] = 'admin/employee_list';
        $data['active'] = 'employee';
        $this->load->view('includes/template', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {

            $employee = new stdClass();

            $employee->firstname = strtoupper($_POST['firstname']);
            $employee->lastname = strtoupper($_POST['lastname']);
            $employee->middlename = strtoupper($_POST['middlename']);
            $employee->birth_date = $_POST['birth_date'];
            $employee->marital_status = $_POST['marital_status'];
            $employee->email = $_POST['email'];
            $employee->phone_number = $_POST['phone_number'];
            $employee->home_no = $_POST['home_no'];
            $employee->contact_person = $_POST['contact_person'];
//            $employee->employee_status = $_POST['employee_status'];
            $employee->date_hire = $_POST['date_hired'];
            $employee->monthly_pay = $_POST['monthly_pay'];
            $employee->isFixed_salary = $_POST['isFixed_salary'];
//            $employee->basic_pay = $_POST['basic_pay'];
            $employee->tin_no = $_POST['tin_no'];
            $employee->sss_no = $_POST['sss_no'];
            $employee->philhealth_no = $_POST['philhealth_no'];
            $employee->pagibig_no = $_POST['pagibig_no'];
            $employee->bank_name = $_POST['bank_name'];
//            $employee->user_role_id = $_POST['user_role_id'];
            $employee->position_id = $_POST['position_id'];
            $employee->isActive = "Yes";
            $employee->gender = $_POST['gender'];
            $employee->transportation_allowance = $_POST['transportation_allowance'];
            $employee->internet_allowance = $_POST['internet_allowance'];
            $employee->meal_allowance = $_POST['meal_allowance'];
            $employee->phone_allowance = $_POST['phone_allowance'];
//            $employee->total_allowance = $_POST['total_allowance'];
            $employee->date_modified = new DateTime('now');
            $employee->username = str_replace(' ', '', strtolower($_POST['firstname']));
            $employee->password = password_hash("12345", PASSWORD_BCRYPT);
            $user_role = 3;
            if ($_POST['position_id'] == 'Admin') {
                $user_role = 1;
            } elseif ($_POST['position_id'] == "Payroll Master") {
                $user_role = 2;
            }
            $employee->user_role_id = $user_role;
            $address = new stdClass();
            $address->city = $_POST['address'];

            $this->employee_model->add_employee($employee, $address);

        }
        redirect(base_url('employee'));
    }

    public function update()
    {
        $this->load->model('Employee_model');

        if (!empty($_POST)) {

            $employee = new stdClass();
            $employee->employee_id = $_POST['employee_id'];
            $employee->firstname = strtoupper($_POST['firstname']);
            $employee->lastname = strtoupper($_POST['lastname']);
            $employee->middlename = strtoupper($_POST['middlename']);
            $employee->birth_date = $_POST['birth_date'];
            $employee->marital_status = $_POST['marital_status'];
            $employee->email = $_POST['email'];
            $employee->phone_number = $_POST['phone_number'];
            $employee->home_no = $_POST['home_no'];
            $employee->contact_person = $_POST['contact_person'];
//            $employee->employee_status = $_POST['employee_status'];
            $employee->date_hire = $_POST['date_hired'];
            $employee->monthly_pay = $_POST['monthly_pay'];
            $employee->isFixed_salary = $_POST['isFixed_salary'];
//       /\     $employee->basic_pay = $_POST['basic_pay'];
            $employee->tin_no = $_POST['tin_no'];
            $employee->sss_no = $_POST['sss_no'];
            $employee->philhealth_no = $_POST['philhealth_no'];
            $employee->pagibig_no = $_POST['pagibig_no'];
            $employee->bank_name = $_POST['bank_name'];

            $employee->employee_login_id = $_POST['employee_login_id'];
            $employee->address_id = 1;
            $employee->position_id = $_POST['position_id'];
            $employee->isActive = $_POST['isActive'];
            $employee->gender = $_POST['gender'];
            $employee->transportation_allowance = $_POST['transportation_allowance'];
            $employee->internet_allowance = $_POST['internet_allowance'];
            $employee->meal_allowance = $_POST['meal_allowance'];
            $employee->phone_allowance = $_POST['phone_allowance'];
//            $employee->total_allowance = $_POST['total_allowance'];
            $employee->date_modified = new DateTime('now');
            $user_role = 3;
            if ($_POST['position_id'] == 'Admin') {
                $user_role = 1;
            } elseif ($_POST['position_id'] == "Payroll Master") {
                $user_role = 2;
            }
            $employee->user_role_id = $user_role;
            $this->employee_model->update_employee($_POST['employee_id'], $employee);
        }
        redirect(base_url('employee'));
    }

    public function delete()
    {


        // TODO: Implement delete() method.
    }
}