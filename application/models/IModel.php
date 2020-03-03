<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/02/2020
 * Time: 3:01 PM
 */
interface IModel
{
    public function add($data);
    public function get_one();
    public function get_all();
    public function update();
    public function delete();
}