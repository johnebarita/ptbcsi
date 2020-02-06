<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 9:32 PM
 */
class Overtime_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $result = $this->db->select('*,firstname,lastname')
            ->from('tbl_overtime_request as overtime')
            ->join('tbl_employee as employee', 'overtime.employee_id=employee.employee_id')
            ->order_by('date_request', 'desc')
            ->get()
            ->result();
        return $result;
    }

    public function add($overtime)
    {
        $this->db->insert('tbl_overtime_request', $overtime);
    }

    public function update_status($overtime_id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('overtime_request_id', $overtime_id);
        $this->db->update('tbl_overtime_request');
    }
}