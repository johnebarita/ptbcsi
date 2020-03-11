<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 9:52 PM
 */
class Cash_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all()
    {
        $result = $this->db->select('*,firstname,lastname')
            ->from('tbl_cash_advance as cash')
            ->join('tbl_employee as employee', 'cash.employee_id=employee.employee_id')
            ->order_by('date_advance', 'desc')
            ->get()
            ->result();
        return $result;
    }

    public function add($cash)
    {
        $this->db->insert('tbl_cash_advance', $cash);
    }

    public function update($cash, $id)
    {
        $this->db->where('cash_advance_id', $id);
        $this->db->update('tbl_cash_advance', $cash);
    }













    public function get_one()
    {
        // TODO: Implement get_one() method.
    }
}