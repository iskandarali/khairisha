<?php
defined('BASEPATH') or exit('No direct script access allowed');

class department_model extends CI_Model
{
    public function list_department()
    {
        $this->db->where_not_in('department_status', '3');
        $query = $this->db->get('department');
        return $query->result();
    }

    public function get_department_by_name($name)
    {
        $this->db->where_not_in('department_status', '3');
        $this->db->where('department_name', $name);
        $query = $this->db->get('department');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_department_by_id($id)
    {
        $this->db->where_not_in('department_status', '3');
        $this->db->where('department_id', $id);
        $query = $this->db->get('department');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }
    
    public function insert_department($data)
    {
        $this->db->insert('department', $data);
        return $this->db->insert_id();
    }

    public function update_department($id, $data)
    {
        $this->db->where('department_id', $id);
        $this->db->update('department', $data);
    }

    public function count_department()
    {
        $this->db->where_not_in('department_status', '3');
        $query = $this->db->get('department');
        return $query->num_rows();
    }
}
