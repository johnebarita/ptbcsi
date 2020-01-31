<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 28/01/2020
 * Time: 9:24 AM
 */
class DBModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //get specific user
    public function getUser($user, $pass)
    {
        $account = $this->db->select('*')
            ->from('tbl_employee')
            ->where('username', $user)
            ->get()
            ->result();

        if (!empty($account)) {
            $verified = password_verify($pass, $account[0]->password);
            if ($verified) {
                $role = $this->db->select('*,user_role')
                    ->from('tbl_employee as employee')
                    ->join('tbl_user_role as role', 'employee.user_role_id=role.user_role_id')
                    ->where('username', $user)
                    ->get()
                    ->result();
                return $role;
            }
            return false;
        }
        return false;
    }

    //all users who are still working
    public function getUsers()
    {
        $type = array('7', '2', '16', '4');
        $result = $this->db->select('*')
            ->from('tbl_user')
            ->where_in('account_type', $type)
            ->where('stillworking', 1)
            ->where('isarchived', 0)
            ->where('last_name IS NOT NULL')
            ->order_by('last_name', 'asc')
            ->get()
            ->result();
        return $result;
    }

    //get DTR for each employee
    public function getUserDTR($user_id, $start_day, $end_day)
    {
        $res = $this->db->select('*')
            ->from('tbl_loginsheet')
            ->where('staff_id', $user_id)
            ->where('date between "' . $start_day . '" and "' . $end_day . '"')
            ->order_by('date', 'asc')
            ->get()
            ->result();
        return $res;
    }


    public function getAllAttendance($start_day, $end_day)
    {
        $result = $this->db->select('*')
            ->from('tbl_employee as employee')
            ->join('tbl_loginsheet as loginsheet', 'employee.employee_id = loginsheet.staff_id')
            ->where('date between "' . $start_day . '" and "' . $end_day . '"')
            ->get()
            ->result();
        return $result;
    }


    public function getHolidays($start_day, $end_day)
    {
        $result = $this->db->select('*')
            ->from('tbl_holiday')
            ->where('date between "' . $start_day . '" and "' . $end_day . '"')
            ->get()
            ->result();
        return $result;
    }

    public function getEmployees()
    {
        $result = $this->db->select('*')
            ->from('tbl_employee')
            ->order_by('lastname', 'asc')
            ->get()
            ->result();
        return $result;

    }

    public function getLeave($user_id)
    {
        $result = $this->db->select('*')
            ->from('tbl_leave_request')
            ->where('employee_id', $user_id)
            ->order_by('date_request', 'desc')
            ->get()
            ->result();
        return $result;
    }

    public function getLeaves()
    {
        $result = $this->db->select('*,firstname,lastname')
            ->from('tbl_leave_request as leave')
            ->join('tbl_employee as employee', 'leave.employee_id=employee.employee_id')
            ->order_by('date_request', 'desc')
            ->get()
            ->result();
        return $result;
    }


    public function addLeave($leave_request)
    {
        $this->db->insert('tbl_leave_request', $leave_request);
    }

    public function updateLeaveStatus($leave_id, $status)
    {

        $this->db->set('status', $status);
        $this->db->where('leave_request_id', $leave_id);
        $this->db->update('tbl_leave_request');
    }


    public function getOvertimes()
    {
        $result = $this->db->select('*,firstname,lastname')
            ->from('tbl_overtime_request as overtime')
            ->join('tbl_employee as employee', 'overtime.employee_id=employee.employee_id')
            ->order_by('date_request', 'desc')
            ->get()
            ->result();
        return $result;
    }

    public function addOvertime($overtime)
    {
        $this->db->insert('tbl_overtime_request', $overtime);
    }

    public function canRequestOvertime($user_id)
    {
        $result = $this->db->select('*')
            ->from('tbl_overtime_request')
            ->where('employee_id', $user_id)
            ->where('date_request', date('Y-m-d'))
            ->get()
            ->result();
        if (count($result) > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function updateOvertimeStatus($overtime_id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('overtime_request_id', $overtime_id);
        $this->db->update('tbl_overtime_request');
    }

    public function updateLeaveRequest($leave, $leave_id)
    {
        $this->db->where('leave_request_id', $leave_id);
        $this->db->update('tbl_leave_request', $leave);
    }

    public function deleteLeave($leave_id)
    {
        $this->db->where('leave_request_id', $leave_id);
        $this->db->delete('tbl_leave_request');
    }

    public function schedule_insert($timein, $timeout)
    {

        $query = "insert into tbl_schedule values ('', '$timein', '$timeout','')";
        $this->db->query($query);
    }

    public function get_schedule()
    {
        $query = $this->db->query("select * from tbl_schedule");
        return $query->result();
    }

    public function update_schedule($id, $sched)
    {
        $this->db->where('schedule_id', $id);
        $this->db->update('tbl_schedule', $sched);
    }

    public function delete_schedule($id)
    {
        $this->db->where('schedule_id', $id);
        $this->db->delete('tbl_schedule');
    }

    public function addCashAdvance($cash)
    {
        $this->db->insert('tbl_cash_advance', $cash);
    }

    public function getCashAdvances()
    {
        $result = $this->db->select('*,firstname,lastname')
            ->from('tbl_cash_advance as cash')
            ->join('tbl_employee as employee', 'cash.employee_id=employee.employee_id')
            ->order_by('date_advance', 'desc')
            ->get()
            ->result();
        return $result;
    }
    public function updateCashAdvance($cash,$id)
    {
        $this->db->where('cash_advance_id', $id);
        $this->db->update('tbl_cash_advance', $cash);
    }


    public function addEmployee($firstname, $lastname, $middlename, $birth_date,
                                $marital_status, $email, $username, $password, $phone_number, $home_no, $contact_person,
                                $employee_status, $monthly_pay, $isFixed_salary, $basic_pay, $tin_no, $sss_no, $philhealth_no,
                                $pagibig_no, $bank_name, $user_role_id, $employee_login_id, $address_id, $position_id, $isActive,
                                $office_location, $transportation_allowance, $internet_allowance, $meal_allowance, $phone_allowance,
                                $total_allowance, $date_modified)
    {
        $query="insert into tbl_employee values('','$firstname','$lastname','$middlename', '$birth_date',
                                '$marital_status', '$email', '$username', '$password', '$phone_number', '$home_no', '$contact_person',
                                '$employee_status', '$monthly_pay', '$isFixed_salary', '$basic_pay', '$tin_no', '$sss_no', '$philhealth_no',
                                '$pagibig_no', '$bank_name', '$user_role_id', '$employee_login_id', '$address_id', '$position_id', '$isActive',
                                '$office_location', '$transportation_allowance', '$internet_allowance', '$meal_allowance', '$phone_allowance',
                                '$total_allowance', '$date_modified')";
        $this->db->query($query);

        return $query;
    }

    public function editEmployee($employee_id)
    {
        $info = $this->getUsers();
        $this->db->where('employee_id', $employee_id);
        $this->db->update('tbl_employee', $info);
    }
    public function getEmployeeList() {
        $result = $this->db->select('*')
            ->from('tbl_employee')
            ->get()
            ->result();

//        $query = $this->db->query('select * from tbl_employee');
//        var_dump($result);

        return $result;
    }
}