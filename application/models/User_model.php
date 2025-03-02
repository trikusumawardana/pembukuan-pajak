<?php
class User_model extends CI_Model
{

    public function getUserByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function getAllUsers()
    {
        return $this->db->get('user')->result_array();
    }

    public function get_user_by_npwp($npwp)
    {
        return $this->db->get_where('user', ['npwp' => $npwp])->row_array();
    }
}
