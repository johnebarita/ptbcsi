<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 9:42 PM
 */
class Leave_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_one($user_id)
    {
        $result = $this->db->select('*')
            ->from('tbl_leave_request')
            ->where('employee_id', $user_id)
            ->order_by('date_request', 'desc')
            ->get()
            ->result();
        return $result;
    }

    public function get_all()
    {
        $result = $this->db->select('*,firstname,lastname')
            ->from('tbl_leave_request as leave')
            ->join('tbl_employee as employee', 'leave.employee_id=employee.employee_id')
            ->order_by('date_request', 'desc')
            ->get()
            ->result();
        return $result;
    }

    public function add($leave_request)
    {
        $this->db->insert('tbl_leave_request', $leave_request);
    }

    public function update_status($leave_id, $status)
    {

        $this->db->set('status', $status);
        $this->db->where('leave_request_id', $leave_id);
        $this->db->update('tbl_leave_request');
    }
    public function update_request($leave, $leave_id)
    {
        $this->db->where('leave_request_id', $leave_id);
        $this->db->update('tbl_leave_request', $leave);
    }

    public function delete($leave_id)
    {
        $this->db->where('leave_request_id', $leave_id);
        $this->db->delete('tbl_leave_request');
    }
}