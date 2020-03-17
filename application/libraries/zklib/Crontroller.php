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
                    }else{
                        $this->update_dtr($uid, $id, $name, $state, $date, $time, $type, $db);
                    }
                }
                $zk->clearAttendance();
            }
        }
    }

    function update_dtr($uid, $id, $name, $state, $date, $time, $type, $db)
    {


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
        $m_i = $dtr['morning_in'];
        $m_o = $dtr['morning_out'];
        $m_t = $dtr['morning_time'];
        $a_i = $dtr['afternoon_in'];
        $a_o = $dtr['afternoon_out'];
        $a_t = $dtr['afternoon_time'];
        $o_i = $dtr['overtime_in'];
        $o_o = $dtr['overtime_out'];
        $o_t = $dtr['overtime_time'];


        if ($am == "AM") {
            var_dump("AM");
            if (empty($dtr['morning_in'])) {
                var_dump("IN");
                $m_i = $time;
            } elseif (!($dtr['morning_in']) && empty($dtr['morning_out'])) {
                var_dump("OUT");
                $m_o = $time;
                $a = str_replace(":", ".", $dtr['morning_in']);
                $a = doubleval($a);
                $b = str_replace(":", ".", $time);
                $b = doubleval($b);
                $m_t = $b - $a;

            }
        } else {
            var_dump("PM");
            if (empty($dtr['afternoon_in'])) {
                var_dump("IN");
                $a_i = $time;
            } elseif (empty($dtr['afternoon_in'])!=true && empty($dtr['afternoon_out'])) {
                var_dump("OUT");
                $a_o = $time;
                $a = str_replace(":", ".", $dtr['afternoon_in']);
                $a = doubleval($a);
                $b = str_replace(":", ".", $time);
                $b = doubleval($b);
                $a_t = $b - $a;
            }
        }
        var_dump($dtr);
        var_dump($m_i);
        var_dump($m_o);
        var_dump($m_t);
        var_dump($a_i);
        var_dump($a_o);
        var_dump($a_t);
        var_dump($o_i);
        var_dump($o_o);
        var_dump($o_t);

        var_dump(empty($dtr['morning_in']));
        var_dump(empty($dtr['morning_out']));
        var_dump(empty($dtr['afternoon_in'])!=true);
        var_dump(empty($dtr['afternoon_out']));
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


        if (mysqli_query($db, $query)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }

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