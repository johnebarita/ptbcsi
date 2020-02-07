<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 23/01/2020
 * Time: 9:35 AM
 */
class Attendance_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTest()
    {
        $res = $this->db->select('*')
            ->from('tbl_loginsheet')
            ->where('staff_id', '307')
            ->where("date between '" . "2019-09-01'" . " and " . "'2019-09-15'")
            ->get();
        return $res->result();
    }

    public function getAttendance($user_id,$start_day, $end_day)
    {
        $res = $this->db->select('*')
            ->from('tbl_loginsheet')
            ->where('staff_id', $user_id)
            ->where('date between "' . $start_day . '" and "' . $end_day . '"')
            ->order_by('date','asc')
            ->get()
            ->result();
        return $res;
    }
    public function getAllAttendance($start_day, $end_day)
    {
        $result = $this->db->select('*')
            ->from('tbl_employee as employee')
            ->join('tbl_loginsheet as loginsheet','employee.employee_id = loginsheet.staff_id')
            ->where('date between "' . $start_day . '" and "' . $end_day . '"')
            ->get()
            ->result();
        return $result;
    }

    public function getUsers()
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
    public function addEmployee($firstname,$lastname,$address,$birthdate,$contact,$gender,$position,$schedule,$datehired)
    {
        $query="insert into add_employee values('','$firstname','$lastname','$address','$birthdate','$contact','$gender','$position','$schedule','$datehired')";
        $this->db->query($query);

        return $query;
    }

//    private $event = 'event';
//
//    function get_event_list() {
//        $this->db->select("id, title, url, class, UNIX_TIMESTAMP(start_date)*1000 as start, UNIX_TIMESTAMP(end_date)*1000 as end");
//        $query = $this->db->get($this->event);
//        if ($query) {
//            return $query->result();
//        }
//        return NULL;
//    }
}