<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades_model extends CI_Model 
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
            $this->db->group_start();
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
            $this->db->group_end();
        }
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_student_bse_second_year($search, $start, $length)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '2nd Year');
        if (!empty($search)) {
            $this->db->group_start();
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
            $this->db->group_end();
        }
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_student_bse_third_year($search, $start, $length)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '3rd Year');
        if (!empty($search)) {
            $this->db->group_start();
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
            $this->db->group_end();
        }
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_student_bse_fourth_year($search, $start, $length)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '4th Year');
        if (!empty($search)) {
            $this->db->group_start();
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
            $this->db->group_end();
        }
        $this->db->limit($length, $start);
        $query = $this->db->get();
        return $query->result();
    }
    public function bse_1_count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '1st Year');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bse_1_count_all()
    {
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '1st Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }

    public function load_data_first_year($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  tbl_subject.semester as semester, tbl_student_subject_loads.school_year as school_year,
                tbl_subject.description as 'description', tbl_student_subject_loads.grade as grade,
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, 
                tbl_student_subject_loads.id as sl_id 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param AND
        tbl_subject.year_level = 1
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }
    public function load_data_second_year($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  tbl_subject.semester as semester, tbl_student_subject_loads.school_year as school_year,
                tbl_subject.description as 'description', tbl_student_subject_loads.grade as grade,
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, 
                tbl_student_subject_loads.id as sl_id 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param AND
        tbl_subject.year_level = 2
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }
    public function load_data_third_year($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  tbl_subject.semester as semester, tbl_student_subject_loads.school_year as school_year,
                tbl_subject.description as 'description', tbl_student_subject_loads.grade as grade,
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, 
                tbl_student_subject_loads.id as sl_id 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param AND
        tbl_subject.year_level = 3
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }
    public function load_data_fourth_year($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  tbl_subject.semester as semester, tbl_student_subject_loads.school_year as school_year,
                tbl_subject.description as 'description', tbl_student_subject_loads.grade as grade,
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, 
                tbl_student_subject_loads.id as sl_id 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param AND
        tbl_subject.year_level = 4
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_student_subject_loads', $data);
    }
    
}