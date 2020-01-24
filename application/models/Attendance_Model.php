<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 23/01/2020
 * Time: 9:35 AM
 */
class Attendance_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTest()
    {
        $res = $this->db->select('*')
                        ->from('tbl_loginsheet')
                        ->where('staff_id','307')
                        ->where("date between '"."2019-09-01'"." and "."'2019-09-15'")
                        ->get();
        return $res->result();
    }
    public function getAttendance($user_id,$start_day,$end_day)
    {
        $result = $this->db->select('*')
            ->from('tbl_loginsheet')
            ->where('staff_id',$user_id)
            ->where('date between "'.$start_day.'" and "'.$end_day.'"')
            ->get()
            ->result();
        return $result;
    }
    public function getUsers(){
        $result = $this->db->select('*')
            ->from('tbl_user')
            ->where('stillworking',1)
            ->where('account_type','7,4,16,2')
            ->where('last_name','is not nul')
            ->order_by('last_name')
            ->get()
            ->result();
        return $result;
    }
}