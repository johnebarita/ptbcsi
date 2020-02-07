<?php

/**
 * Created by PhpStorm.
 * UserModel: UserModel
 * Date: 27/01/2020
 * Time: 10:15 AM
 */
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("login_model");
        $this->load->library('pagination', 'session');

    }

    public function index()
    {
        if ($this->session->userdata('is_logged_in')) {
            if ($_SESSION['user_type'] == "Admin") {
                redirect(base_url('dashboard'));
            } else {
                redirect(base_url('dtr'));
            }
        } else {
            $this->load->view('index');
        }
    }

    public function login()
    {
        if (!empty($_POST)) {
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $this->verify_login($user, $pass);
        } else {
            $this->index();
        }
    }

    function verify_login($user, $pass)
    {
        $employee = $this->login_model->validate($user, $pass);
        if ($employee != false) {
            $data = array(
                'username' => $employee[0]->username,
                'name' => strtoupper($employee[0]->lastname . ' ' . $employee[0]->firstname),
                'user_type' => $employee[0]->user_role,
                'user_id' => $employee[0]->employee_id,
                'is_logged_in' => true
            );
            $this->session->set_userdata($data);

            switch ($employee[0]->user_role) {
                case 'Admin' :
                    redirect(base_url('dashboard'));
                    break;
                case 'Employee' :
                case 'Payroll Master' :
                    redirect(base_url('dtr'));
                    break;
            }
        } else {
            $error_credentials = "<h6 id='error' style='color: rgba(255,0,0,0.7)' hidden>Incorrect username or password, Please try gain!</h6>";
            echo $error_credentials;
            $this->index();
        }
    }

    public function logout()
    {
        if ($_POST['logout']=="true") {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('user_type');
            $this->session->unset_userdata('is_logged_in');
            $this->session->sess_destroy();
        }
        return redirect(base_url());
    }

    public function validate_credentials()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username:', 'required|trim|xss_clean|callback_validation');
        $this->form_validation->set_rules('password', 'Password:', 'required|trim');

        $this->load->model('Login_model');
        $query = $this->login_model->validate();

        if ($query) // if the user's credentials validated...
        {
            if ($this->form_validation->run()) {
                redirect('pricing');
            }

        } else // incorrect username or password
        {

            $this->index();
        }
    }

    public function validate()
    {
        $credentials = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];

        foreach ($credentials as $key => $value) {
            define(strtoupper($key), $value);
        }

        $query = $this->db->get_where('users', array('username' => USERNAME));
        $row = $query->row();

        if ($query->num_rows() == 1) {
            if (isset($row)) {
                //Using hashed password - (PASSWORD_BCRYPT method) - from database
                $hash = $row->password;
                $verify = password_verify(PASSWORD, $hash);

                $data = array(
                    'username' => $row->username,
                    'user_type' => $row->user_type,
                    'is_logged_in' => true
                );

                $this->session->set_userdata($data);

                if ($verify) {
                    return true;
                }
            }
        }
    }

}