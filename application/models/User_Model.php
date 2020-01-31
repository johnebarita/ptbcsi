<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 27/01/2020
 * Time: 11:23 AM
 */
class User_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verify_user($user, $pass)
    {
        $account = $this->db->select('*')
            ->from('tbl_employee')
            ->where('username', $user)
            ->get()
            ->result();
        if (!empty($account)) {
            $verified = password_verify($pass, $account[0]->password);
            if ($verified) {
                $role = $this->db->select('*,user_role')
                    ->from('tbl_employee as employee')
                    ->join('tbl_user_role as role', 'employee.user_role_id=role.user_role_id')
                    ->where('username', $user)
                    ->get()
                    ->result();
                return $role;
            }
            return false;
        }
        return false;
    }

    public function getUsers(){
        $users = $this->db->select('*')
            ->from('tbl_employee as employee')
            ->join('tbl_loginsheet as loginsheet','employee.employee_id = loginsheet.staff_id')
            ->where('date between "' . $start_day . '" and "' . $end_day . '"')
            ->get()
            ->result();



//        SELECT * FROM `tbl_user` as users join tbl_loginsheet as login on users.id=login.staff_id Where users.id= 307
        return $users;
    }
}