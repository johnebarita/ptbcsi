<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 9:48 PM
 */
class Schedule_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add($timein, $timeout)
    {

        $query = "insert into tbl_schedule values ('', '$timein', '$timeout','')";
        $this->db->query($query);
    }



    public function get_all()
    {
        $query = $this->db->query("select * from tbl_schedule");
        return $query->result();
    }

    public function update($id, $sched)
    {
        $this->db->where('schedule_id', $id);
        $this->db->update('tbl_schedule', $sched);
    }

    public function delete($id)
    {
        $this->db->where('schedule_id', $id);
        $this->db->delete('tbl_schedule');
    }

    public function get_refrences($schedule_id){
        $result = $this->db->select('*')
            ->from('tbl_schedule as schedule')
            ->join('tbl_position as position','schedule.schedule_id = position.schedule_id')
            ->where('schedule.schedule_id ',$schedule_id)
            ->get()
            ->result();
        return  $result;
    }
}