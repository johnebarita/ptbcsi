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

    public function get_one2($user_id, $start_day, $end_day)
    {

        $res = $this->db->select('*')
            ->from('tbl_time_sheet')
            ->where('employee_id', $user_id)
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

    public function get_all2($start_day, $end_day)
    {
        $result = $this->db->select('*')
            ->from('tbl_employee as employee')
            ->join('tbl_time_sheet as loginsheet', 'employee.employee_id = loginsheet.employee_id')
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

    public function get_employee_time($employee_id, $date)
    {
        $result = $this->db->select('*')
            ->from('tbl_time_sheet')
            ->where('employee_id', $employee_id)
            ->where('date', $date)
            ->get()
            ->result();
        return $result;
    }

    public function add($time_sheet)
    {
        $this->db->insert('tbl_time_sheet', $time_sheet);
    }

    public function update($time_sheet, $id)
    {
        $this->db->where('time_sheet_id', $id);
        $this->db->update('tbl_time_sheet', $time_sheet);
    }

    public function get_absent($id, $date = null)
    {
        if (is_null($date)) {
            $date = date('Y-m-d');
        }
    }

    public function add_attendance($attedance)
    {
        $this->db->insert('tbl_attendance', $attedance);
    }
}