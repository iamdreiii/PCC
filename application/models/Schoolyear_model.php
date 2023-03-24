<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolyear_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_current_school_year()
    {
        $this->db->select('school_year');
        $this->db->from('tbl_school_year');
        $this->db->where('status', 'active');
        $query = $this->db->get();
        return $query->row_array();
    } 
    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('tbl_school_year');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_sy($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_school_year');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_sy($data)
    {
        $this->db->insert('tbl_school_year', $data);
        return $this->db->insert_id();
    }

    public function update_sy($id, $data)
    {
        $this->db->trans_start();
    
    // Set all rows to inactive
    $this->db->set('status', 'inactive');
    $this->db->update('tbl_school_year');
    $this->db->set('school_year', $data['school_year']);
    // Set the row with the specified ID to active
    $this->db->set('status', 'active');
    $this->db->where('id', $id);
    $this->db->update('tbl_school_year');
    
    $this->db->trans_complete();
    return $this->db->trans_status();
    }

    public function delete_sy($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_school_year');
        return $this->db->affected_rows();
    }

    public function validate_email($email)
    {
        $query = $this->db->get_where('tbl_school_year', array('email' => $email));
        return ($query->num_rows() > 0) ? true : false;
    }
    
    public function get_all_sy_search($search)
    {
    $this->db->select('*');
    $this->db->from('tbl_school_year');
    if (!empty($search)) {
        $this->db->like('school_year', $search);
    }
    $query = $this->db->get();
    return $query->result();
    }

    public function get_courses()
    {
    $query = $this->db->get('tbl_course');
    return $query->result();
    }

    public function get_year_level()
    {
    $query = $this->db->get('tbl_year_level');
    return $query->result();
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_school_year');
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_school_year');
        if (!empty($search)) {
            $this->db->like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
}