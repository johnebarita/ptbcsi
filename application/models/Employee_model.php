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
        $type = array('7','2','16','4');
        $result = $this->db->select('*')
            ->from('tbl_user')
            ->where_in('account_type',$type)
            ->where('stillworking',1)
            ->where('isarchived',0)
            ->where('last_name IS NOT NULL')
            ->order_by('last_name','asc')
            ->get()
            ->result();
        return $result;
    }

    public function get_employees()
    {
        $result = $this->db->select('*')
            ->from('tbl_employee')
            ->order_by('lastname', 'asc')
            ->get()
            ->result();
        return $result;

    }


}