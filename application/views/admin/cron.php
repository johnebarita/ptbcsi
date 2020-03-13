<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/03/2020
 * Time: 7:04 PM
 */
include(getcwd() . '/application/views/admin/crontroller.php');

$con = new crontroller();
$con->push();