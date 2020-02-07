<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 9:25 PM
 */
class Dtr_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_one($user_id, $start_day, $end_day)
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

    public function get_all($start_day, $end_day)
    {
        $result = $this->db->select('*')
            ->from('tbl_employee as employee')
            ->join('tbl_loginsheet as loginsheet', 'employee.employee_id = loginsheet.staff_id')
            ->where('date between "' . $start_day . '" and "' . $end_day . '"')
            ->get()
            ->result();
        return $result;
    }


    public function can_request_overtime($user_id)
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
}