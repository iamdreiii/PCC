<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prerequisite_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_subject()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_program()
    {
    $query = $this->db->get('tbl_course');
    return $query->result();
    }

    public function get_sub1($program)
    {
    $this->db->select('*');
    $this->db->from('tbl_subject');
    $this->db->where('year_level', 1);
    $this->db->where('semester', 1);
    // $this->db->where('program_id', 1);
    if (!empty($program)) {
            $this->db->where('program_id', $program);
        }
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->result();
    }

    public function get_sub2($program)
    {
    $this->db->select('*');
    $this->db->from('tbl_subject');
    $this->db->where('year_level', 1);
    $this->db->where('semester', 2);
    // $this->db->where('program_id', 1);
    if (!empty($program)) {
            $this->db->where('program_id', $program);
        }
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub3($program)
    {
    $this->db->select('*');
    $this->db->from('tbl_subject');
    $this->db->where('year_level', 2);
    $this->db->where('semester', 1);
    // $this->db->where('program_id', 1);
    if (!empty($program)) {
            $this->db->where('program_id', $program);
        }
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub4($program)
    {
    $this->db->select('*');
    $this->db->from('tbl_subject');
    $this->db->where('year_level', 2);
    $this->db->where('semester', 2);
    // $this->db->where('program_id', 1);
    if (!empty($program)) {
            $this->db->where('program_id', $program);
        }
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub5($program)
    {
    $this->db->select('*');
    $this->db->from('tbl_subject');
    $this->db->where('year_level', 3);
    $this->db->where('semester', 1);
    // $this->db->where('program_id', 1);
    if (!empty($program)) {
            $this->db->where('program_id', $program);
        }
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub6($program)
    {
    $this->db->select('*');
    $this->db->from('tbl_subject');
    $this->db->where('year_level', 3);
    $this->db->where('semester', 2);
    // $this->db->where('program_id', 1);
    if (!empty($program)) {
            $this->db->where('program_id', $program);
        }
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->result();
    }

    public function get_sub7($program)
    {
    $this->db->select('*');
    $this->db->from('tbl_subject');
    $this->db->where('year_level', 4);
    $this->db->where('semester', 1);
    // $this->db->where('program_id', 1);
    if (!empty($program)) {
            $this->db->where('program_id', $program);
        }
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub8($program)
    {
    $this->db->select('*');
    $this->db->from('tbl_subject');
    $this->db->where('year_level', 4);
    $this->db->where('semester', 2);
    // $this->db->where('program_id', 1);
    if (!empty($program)) {
            $this->db->where('program_id', $program);
        }
    $this->db->order_by('id');
    $query = $this->db->get();
    return $query->result();
    }

    public function get_subjects1($program_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('program_id', $program_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function update_prereq($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_subject', $data);
    }   

    public function prereq_edit1($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

}