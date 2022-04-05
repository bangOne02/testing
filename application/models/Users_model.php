<?php
class Users_model extends CI_Model
{

    protected $table = 'tbl_admin';

    public function __construct()
    {
        Parent::__construct();
    }

    public function update_password($user_id, $password)
    {
        $this->db->where('id_admin', $user_id);
        return $this->db->update($this->table, array(
            'userpassword'  => password_hash($password, PASSWORD_BCRYPT)
        ));
    }
}
