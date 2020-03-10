<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 24/01/2020
 * Time: 5:48 PM
 */
class Employee_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_users()
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

    public function get_employees()
    {
//        ->from('tbl_employee')
//        ->order_by('lastname', 'asc')
//        ->get()
//        ->result();
//        return $result;    $result = $this->db->select('*')

        $result = $this->db->select('*')
            ->from('tbl_employee as employee')
            ->join('tbl_position as position', 'employee.position_id = position.position_id')
            ->join('tbl_schedule as schedule', 'position.schedule_id = schedule.schedule_id')
            ->join('tbl_address as address', 'employee.address_id = address.address_id')
            ->order_by('lastname', 'asc')
            ->get()
            ->result();
        return $result;
    }

    public function get_one($employee_id)
    {
        $result = $this->db->select('*')
            ->from('tbl_employee as employee')
            ->join('tbl_position as position', 'employee.position_id = position.position_id')
            ->join('tbl_schedule as schedule', 'position.schedule_id = schedule.schedule_id')
            ->where('employee.employee_id', $employee_id)
            ->get()
            ->result();
        return $result;
    }

    public function add_employee($employee, $address)
    {
        $this->db->insert('tbl_address', $address);
        //kuhaon nmo ang id sa kanang imong bag-ong g add
        $a_id = $this->db->select('address_id')
            ->from('tbl_address')
            ->order_by('address_id', 'desc')
            ->get()
            ->result();

        $employee->address_id = $a_id[0];
        $this->db->insert('tbl_employee', $employee);
    }

    public function update_employee($employee_id, $employee,$address)
    {

        $ad = $this->db->select('*')
            ->from('tbl_address')
            ->where('address_id',$employee->address_id)
            ->get()
            ->result();
        $ad = $ad[0];
        $ad->city =$address;
        $this->db->where('address_id', $ad->address_id)
            ->update('tbl_address', $ad);

        $this->db->where('employee_id', $employee_id)
            ->update('tbl_employee', $employee);
    }

    public function get_last_id()
    {
        $result = $this->db->select('employee_id')
            ->from('tbl_employee')
            ->order_by('employee_id', 'desc')
            ->get()
            ->result();
        if (sizeof($result) > 0) {
            return $result[0];
        }
    }
    public function delete($employee_id)
    {
        $this->db->where('employee_id', $employee_id);
        $this->db->delete('tbl_employee');
    }
}