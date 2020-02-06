<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 06/02/2020
 * Time: 9:49 AM
 */
class Errors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('pagination', 'session'));
        $this->load->model(array("leave_model", "employee_model"));
        $this->load->helper('url');
    }

    public function show_404()
    {
        if (isset($_SESSION)) {
            $this->load->view('errors/html/error_404.php');
        }
    }

}