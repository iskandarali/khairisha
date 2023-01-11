<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gred_model extends CI_Model
{
    public function list_gred()
    {
        $query = $this->db->get('gred');
        $this->db->where_not_in('gred_status', '3');
        return $query->result();
    }

    public function get_gred_by_name($name)
    {
        $this->db->where_not_in('gred_status', '3');
        $this->db->where('gred_name', $name);
        $query = $this->db->get('gred');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_gred_by_gred_id($id)
    {
        $this->db->where('gred_id', $id);
        $this->db->where_not_in('gred_status', '3');
        $query = $this->db->get('gred');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function count_gred()
    {
        $this->db->where_not_in('gred_status', '3');
        $query = $this->db->get('gred');
        return $query->num_rows();
    }

    public function insert_gred($data)
    {
        $this->db->insert('gred', $data);
        return $this->db->insert_id();
    }

    public function update_gred($id, $data)
    {
        $this->db->where('gred_id', $id);
        $this->db->update('gred', $data);
    }
}
