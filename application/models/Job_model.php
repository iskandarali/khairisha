<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Job_model extends CI_Model
{
    public function list_job_by_position_id($id)
    {
        $this->db->join('gred', 'gred.gred_id =  job.gred_id');
        $this->db->where('job.position_id', $id);
        $this->db->where_not_in('job.job_status', 3);
        $query = $this->db->get('job');
        return $query->result();
    }

    public function get_position_id_and_gred_id($position_id, $gred_id)
    {
        $this->db->join('gred', 'gred.gred_id =  job.gred_id');
        $this->db->where('job.position_id', $position_id);
        $this->db->where('job.gred_id', $gred_id);
        $this->db->where_not_in('job.job_status', 3);
        $query = $this->db->get('job');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function get_position_job_id($job_id)
    {
        $this->db->join('gred', 'gred.gred_id =  job.gred_id');
        $this->db->where_not_in('job.job_status', 3);
        $this->db->where('job_id', $job_id);
        $query = $this->db->get('job');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_job_by_id($id)
    {
        $this->db->where('job_id', $id);
        $this->db->where_not_in('job.job_status', 3);
        $query = $this->db->get('job');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function insert_job($data)
    {
        $this->db->insert('job', $data);
    }

    public function update_job($id, $data)
    {
        $this->db->where('job_id', $id);
        $this->db->update('job', $data);

        return $this->db->affected_rows();
    }

    public function list_job()
    {
        $this->db->where_not_in('job_status', 3);
        $query = $this->db->get('job');
        return $query->result();
    }
}
