<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 16/03/2020
 * Time: 10:02 AM
 */
class Crontroller
{
    public $host = "localhost"; // MySQL host name eg. localhost
    public $user = "maricris"; // MySQL user. eg. root ( if your on localserver)
    public $password = "tallice81"; // MySQL user password  (if password is not set for your root user then keep it empty )
    public $database = "maricris_ptbcsi"; // MySQL Database name
    public $db;

    public function connect()
    {
//        Connect to MySQL Database
        $db = mysqli_connect($this->host, $this->user, $this->password, $this->database) or die("Could not connect to database");

        date_default_timezone_set('Asia/Manila'); //Default Timezone Of Your Country
        include('ZKLib.php');

        $zk = new ZKLib('43.224.189.146');
        $ret = $zk->connect();
        if ($ret) {
            $zk->disableDevice();
            $zk->setTime(date('Y-m-d H:i:s')); // Synchronize time
            $users = $zk->getUser();
            $attendance = $zk->getAttendance();
            if (count($attendance) > 0) {
                $attendance = array_reverse($attendance, true);
                sleep(1);
                foreach ($attendance as $attItem) {
                    $uid = $attItem['uid'];
                    $id = $attItem['id'];
                    $name = (isset($users[$attItem['id']]) ? $users[$attItem['id']]['name'] : $attItem['id']);
                    $state = ZK\Util::getAttState($attItem['state']);
                    $date = date("Y-m-d", strtotime($attItem['timestamp']));
                    $time = date("H:i:s", strtotime($attItem['timestamp']));
                    $type = ZK\Util::getAttType($attItem['type']);
                    $query = "INSERT INTO tbl_attendance(uid,id,name,state,date,time,type)
                                      VALUES ('$uid', '$id', '$name', '$state','$date','$time','$type')";

                    if (!$result = mysqli_query($db, $query)) {
                        exit(mysqli_error($db));
                    }
                    $this->update_dtr($uid, $id, $name, $state, $date, $time, $type, $db);
                }
                $zk->clearAttendance();
            }
        }
    }

    function update_dtr($uid, $id, $name, $state, $date, $time, $type, $db)
    {
        $m_i = '';
        $m_o = '';
        $m_t = '';
        $a_i = '';
        $a_o = '';
        $a_t = '';
        $o_i = '';
        $o_o = '';
        $o_t = '';


        $query = "SELECT * FROM tbl_time_sheet where employee_id = '" . $id . "' and date ='" . $date . "'";
        $dtr = mysqli_query($db, $query)->fetch_assoc();

        $am = date('A', strtotime($time));


        if (count($dtr) == 0) {
            $query = "INSERT INTO tbl_time_sheet(employee_id,date)
                                      VALUES ('$id', '$date')";
            if (!$result = mysqli_query($db, $query)) {
                exit(mysqli_error($db));
            }
            $query = "SELECT * FROM tbl_time_sheet where employee_id = " . $id . " date =`" . $date . "`";
            $dtr = mysqli_query($db, $query)->fetch_assoc();
        }

        if ($am == "AM") {
            if (empty($dtr['morning_in'])) {
                $m_i = $time;
            } elseif (empty($dtr['morning_in']) && empty($dtr['morning_out'])) {
                $m_o = $time;
                $a = str_replace(":", ".", $dtr['morning_in']);
                $a = doubleval($a);
                $b = str_replace(":", ".", $time);
                $b = doubleval($b);
                $m_t = $b - $a;

            }
        } else {
            if (empty($dtr['afternoon_in'])) {
                $a_i = $time;
            } elseif (empty($dtr['afternoon_in']) && empty($dtr['afternoon_out'])) {
                $a_o = $time;
                $a = str_replace(":", ".", $dtr['afternoon_in']);
                $a = doubleval($a);
                $b = str_replace(":", ".", $time);
                $b = doubleval($b);
                $a_t = $b - $a;
            }
        }

        $query = "UPDATE tbl_time_sheet SET
                  morning_in='" . $m_i . "',
                  morning_out='" . $m_o. "',
                  morning_time='" . $m_t. "',
                  afternoon_in='" . $a_i. "',
                  afternoon_out='" . $a_o. "',
                  afternoon_time='" . $a_t. "',
                  overtime_in='" . $o_i. "',
                  overtime_out='" . $o_o. "',
                  overtime_time='" . $o_t. "'
                  WHERE time_sheet_id=" . $dtr['time_sheet_id'];

//        if (is_null($dtr['morning_in']) && $am === 'AM') {
//            $time_sheet['morning_in ']= $time;
//        } elseif (!is_null($dtr['morning_in'])) {
//            $dtr['morning_out ']= $time;
//            $a = str_replace(":", ".", $dtr['morning_in']);
//            $a = doubleval($a);
//            $b = str_replace(":", ".", $time);
//            $b = doubleval($b);
//            $dtr['morning_time ']= $b - $a;
//        } elseif (is_null($dtr['afternoon_in']) && $am === 'PM') {
//            $dtr['afternoon_in ']= $time;
//        } elseif (!is_null($dtr['afternoon_in']) && $am === 'PM' && is_null($dtr['afternoon_out'])) {
//            $dtr['afternoon_out ']= $time;
//            $a = str_replace(":", ".", $dtr['afternoon_in']);
//            $a = doubleval($a);
//            $b = str_replace(":", ".", $time);
//            $b = doubleval($b);
//            $dtr['afternoon_time ']= $b - $a;
//        } elseif (is_null($dtr['overtime_in']) && $am === 'PM') {
//            $dtr['overtime_in ']= $time;
//        } elseif (!is_null($dtr['overtime_in']) && $am === 'PM') {
//            $dtr['overtime_out ']= $time;
//            $a = str_replace(":", ".", $dtr['overtime_in']);
//            $a = doubleval($a);
//            $b = str_replace(":", ".", $time);
//            $b = doubleval($b);
//            $dtr['overtime_time ']= $b - $a;
//        }
//        else {
//            if($am =="AM"){
//                if (is_null($dtr->morning_in)) {
//                    $dtr->morning_in = $time;
//                }else{
//                    $dtr->morning_out = $time;
//                }
//            }else{
//                if (is_null($dtr->afternoon_in)) {
//                    $dtr->afternoon_in = $time;
//                }else{
//                    $dtr->afternoon_out = $time;
//                }
//            }
//
//        }

//        var_dump($time);


//
//        if () {
//
//        }
//
//        if (!$result = mysqli_query($db, $query)) {
//            exit(mysqli_error($db));
//        }
//        var_dump($dtr);

    }

}