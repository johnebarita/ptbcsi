<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 13/03/2020
 * Time: 4:57 PM
 */
class crontroller
{
    public function __construct()
    {
        $this->load->helper(array('url', 'html', 'form'));
        $this->load->library('pagination', 'session');
        $this->load->model(array('dtr_model', 'holiday_model', 'employee_model'));
        include(getcwd() . '/application/libraries/zklib/ZKLib.php');
    }

    public function push(){
        echo ("TEST");


        $zk = new ZKLib('43.224.189.146');

        if ($zk->connect()) {
            $zk->disableDevice();
            $attendances = $zk->getAttendance();
            if (count($attendances) > 0) {
                $attendances = array_reverse($attendances, true);
                $users = $zk->getUser();
                sleep(1);
                foreach ($attendances as $item) {
                    $attendance = new stdClass();
                    $attendance->uid = $item['uid'];
                    $attendance->id = $item['id'];
                    $attendance->name = $users[$item['id']]['name'];
                    $attendance->state = ZK\Util::getAttState($item['state']);
                    $attendance->date = date("d-m-Y", strtotime($item['timestamp']));
                    $attendance->time = date("H:i:s", strtotime($item['timestamp']));
                    $attendance->type = ZK\Util::getAttType($item['type']);
                    $this->dtr_model->add_attendance($attendance);
                }
                $zk->clearAttendance();
            }
            $zk->enableDevice();
            $zk->disconnect();
        }
    }

}