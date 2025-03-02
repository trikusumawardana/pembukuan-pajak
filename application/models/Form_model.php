<?php
class Form_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function save_form_data($data)
    {
        // Insert form data into database
        return $this->db->insert('form_data', $data);
    }

    // Form Empat
    public function get_by_npwp_user($npwp_user)
    {
        return $this->db->get_where('form-empat-a', ['npwp_user' => $npwp_user])->row_array();
    }

    public function insert_data($data)
    {
        return $this->db->insert('form-empat-a', $data);
    }

    public function update_data($npwp_user, $data)
    {
        $this->db->where('npwp_user', $npwp_user);
        return $this->db->update('form-empat-a', $data);
    }
}
