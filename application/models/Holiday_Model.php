<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 9:25 PM
 */
class Holiday_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_holidays($start_day, $end_day)
    {
        $result = $this->db->select('*')
            ->from('tbl_holiday')
            ->where('date between "' . $start_day . '" and "' . $end_day . '"')
            ->get()
            ->result();
        return $result;
    }
}