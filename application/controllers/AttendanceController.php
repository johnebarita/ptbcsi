<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 22/01/2020
 * Time: 6:16 PM
 */
class AttendanceController extends CI_Controller
{
    public function test()
    {
        $month = $_POST['month'];
        $half_month = $_POST['half_month'];
        $year = $_POST['year'];
        echo $half_month;
        echo "</br>";
        echo $month;
        echo "</br>";
        echo $year;
        echo "</br>";


        $date = '2020-01-01';
        $end = '2020-01-' . date('t', strtotime($date)); //get end date of month

        while (strtotime($date) <= strtotime($end)) {
            $day_num = date('d', strtotime($date));
            $day_name = date('l', strtotime($date));
            $date = date("Y-m-d", strtotime("+1 day", strtotime($date)));
            echo "$day_num &nbsp; $day_name<br/>";
        }
    }
}