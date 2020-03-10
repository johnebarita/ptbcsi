<?php

/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 2/6/2020
 * Time: 8:39 PM
 */
class Position_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function get_all()
    {
        $query = $this->db->query("select * from tbl_position as position join tbl_schedule as schedule
        on position.schedule_id = schedule.schedule_id");
        return $query->result();
    }

    public function add($position)
    {
        $this->db->insert('tbl_position', $position);
    }

    public function update( $position,$id)
    {
        $this->db->where('position_id', $id);
        $this->db->update('tbl_position', $position);
    }
    public function delete($id)
    {
        $this->db->where('position_id', $id);
        $this->db->delete('tbl_position');
    }
}