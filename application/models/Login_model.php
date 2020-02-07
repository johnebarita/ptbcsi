<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 05/02/2020
 * Time: 9:23 PM
 */
class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function validate($user, $pass)
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
}