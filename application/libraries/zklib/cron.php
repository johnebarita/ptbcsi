<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/03/2020
 * Time: 7:04 PM
 */


$host = "localhost"; // MySQL host name eg. localhost
$user = "maricris"; // MySQL user. eg. root ( if your on localserver)
$password = "tallice81"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "maricris_ptbcsi"; // MySQL Database name

// Connect to MySQL Database
$db = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

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
            $date = date("d-m-Y", strtotime($attItem['timestamp']));
            $time = date("H:i:s", strtotime($attItem['timestamp']));
            $type = ZK\Util::getAttType($attItem['type']);

            $query = "INSERT INTO tbl_attendance(uid,id,name,state,date,time,type) 
                                  VALUES ('$uid', '$id', '$name', '$state','$date','$time','$type')";
            if (!$result = mysqli_query($db, $query)) {
                exit(mysqli_error($db));
            }
        }
        $zk->clearAttendance();
    }
}