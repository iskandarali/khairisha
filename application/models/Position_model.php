<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position_model extends CI_Model
{

    public function get_position_by_id($id)
    {
        $this->db->where_not_in('position_status', '3');
        $this->db->where('position_id', $id);
        $query = $this->db->get('position');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function list_position_by_department_id($department)
    {
        $this->db->where_not_in('position_status', '3');
        $this->db->where('position_department_id', $department);
        $query = $this->db->get('position');
        return $query->result();
    }

    public function insert_position($data)
    {
        $this->db->insert('position', $data);
        return $this->db->insert_id();
    }

    // update
    public function update_position($id, $data)
    {
        $this->db->where('position_id', $id);
        $this->db->update('position', $data);

        return $this->db->affected_rows();
    }
}