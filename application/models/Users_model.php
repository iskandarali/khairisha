<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function get_id($id)
    {
        $this->db->where('users_id', $id);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    public function get_email($email)
    {
        $this->db->where('users_email', $email);
        $query = $this->db->get('users');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function insert_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function update_user($id, $data)
    {
        $this->db->where('users_id', $id);
        $this->db->update('users', $data);

        return $this->db->affected_rows();
    }

    public function get_all_user()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function count_user()
    {
        $this->db->where_not_in('users_status', '2');
        $query = $this->db->get('users');
        return $query->num_rows();
    }
}
