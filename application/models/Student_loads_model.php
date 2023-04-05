<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_loads_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_student_bse_first_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('program', 'bse');
    $this->db->where('year_level', '1st Year');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
        $this->db->like('fname', $search);
        $this->db->or_like('mname', $search);
        $this->db->or_like('lname', $search);
        $this->db->or_like('email', $search);
        $this->db->or_like('class_id', $search);
        $this->db->or_like('year_level', $search);
        $this->db->or_like('sex', $search);
        $this->db->or_like('program', $search);
        $this->db->or_like('address', $search);
        $this->db->or_like('city_municipality', $search);
        $this->db->or_like('zip_code', $search);
    }
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    public function count_all()
    {
        return $this->db->count_all('tbl_student');
    }
    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
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