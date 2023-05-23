<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_loads_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }
    // BSE
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

    // BPA
    public function get_all_student_bpa_first_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('program', 'bpa');
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

    public function get_all_student_bpa_second_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('program', 'bpa');
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

    public function get_all_student_bpa_third_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('program', 'bpa');
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

    public function get_all_student_bpa_fourth_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('program', 'bpa');
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

    public function bpa_1_count_all()
    {
        $this->db->where('program', 'bpa');
        $this->db->where('year_level', '1st Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bpa_2_count_all()
    {
        $this->db->where('program', 'bpa');
        $this->db->where('year_level', '2nd Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bpa_3_count_all()
    {
        $this->db->where('program', 'bpa');
        $this->db->where('year_level', '3rd Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bpa_4_count_all()
    {
        $this->db->where('program', 'bpa');
        $this->db->where('year_level', '4th Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bse_1_count_all()
    {
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '1st Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bse_2_count_all()
    {
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '2nd Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bse_3_count_all()
    {
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '3rd Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bse_4_count_all()
    {
        $this->db->where('program', 'bse');
        $this->db->where('year_level', '4th Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
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
    public function bse_2_count_filtered($search = null)
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
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bse_3_count_filtered($search = null)
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
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bse_4_count_filtered($search = null)
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
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bpa_1_count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('program', 'bpa');
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
    public function bpa_2_count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('program', 'bpa');
        $this->db->where('year_level', '2nd Year');
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
    public function bpa_3_count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('program', 'bpa');
        $this->db->where('year_level', '3rd Year');
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
    public function bpa_4_count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('program', 'bpa');
        $this->db->where('year_level', '4th Year');
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
    public function get_subjects_first_year_bse()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', '1');
        $this->db->where('program_id', '1');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_subjects_second_year_bse()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', '2');
        $this->db->where('program_id', '1');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_subjects_third_year_bse()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', '3');
        $this->db->where('program_id', '1');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_subjects_fourth_year_bse()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', '4');
        $this->db->where('program_id', '1');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_subjects_first_year_bpa()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', '1');
        $this->db->where('program_id', '2');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_subjects_second_year_bpa()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', '2');
        $this->db->where('program_id', '2');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_subjects_third_year_bpa()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', '3');
        $this->db->where('program_id', '2');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_subjects_fourth_year_bpa()
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', '4');
        $this->db->where('program_id', '2');
        $query = $this->db->get();
        return $query->result();
    }
    public function add_student_loads($subject_ids, $user_ids)
    {
        //$subject_ids_array = explode(',', $subject_ids);
        $data = array();
        foreach ($user_ids as $user_id) {
            foreach ($subject_ids as $subject_id) {
                $data[] = array(
                    'subject_id' => $subject_id,
                    'student_id' => $user_id
                    
                );
            }
        }
        $result = $this->db->insert_batch('tbl_student_subject_loads', $data);
        return $result;
    }
    // VIEW
    public function get_student_loads_first_year($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  tbl_subject.semester as semester, tbl_student_subject_loads.school_year as school_year,
                tbl_subject.description as 'description', 
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, tbl_student_subject_loads.grade as grade,
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
    public function get_student_loads_second_year($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  tbl_subject.semester as semester, tbl_student_subject_loads.school_year as school_year,
                tbl_subject.description as 'description', 
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, tbl_student_subject_loads.grade as grade,
                tbl_student_subject_loads.id as sl_id 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param  AND
        tbl_subject.year_level = 2
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }
    public function get_student_loads_third_year($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  tbl_subject.semester as semester, tbl_student_subject_loads.school_year as school_year,
                tbl_subject.description as 'description', 
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, tbl_student_subject_loads.grade as grade,
                tbl_student_subject_loads.id as sl_id 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param  AND
        tbl_subject.year_level = 3
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }
    public function get_student_loads_fourth_year($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  tbl_subject.semester as semester, tbl_student_subject_loads.school_year as school_year,
                tbl_subject.description as 'description', 
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, tbl_student_subject_loads.grade as grade,
                tbl_student_subject_loads.id as sl_id 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param  AND
        tbl_subject.year_level = 4
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }
    public function get_student_loads_print($param)
    {
        $query = $this->db->query("SELECT tbl_subject.subcode as coursecode,  
                tbl_subject.description as 'description', 
                CONCAT(tbl_student.lname, ' ', tbl_student.fname, ' ', tbl_student.mname, ' ') as fullname, 
                tbl_subject.units as units, 
                SUM(tbl_subject.units) as tunits,
                CASE 
                    WHEN tbl_subject.prereq = '' OR tbl_subject.prereq IS NULL THEN 'none' 
                    ELSE tbl_subject.prereq 
                END as pre_req, tbl_student_subject_loads.grade as grade,
                tbl_student_subject_loads.id as slid 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param 
        GROUP BY tbl_subject.subcode
        ORDER BY slid ASC
 
        ");
        return $query->result_array();
    }
    public function get_student_data($param)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('id', $param);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function delete_subject_loads($id) {
        // Delete the subject by ID from the database
        $this->db->where('id', $id);
        $this->db->delete('tbl_student_subject_loads');
    }

    public function signatory()
    {
        $this->db->select('*');
        $this->db->from('tbl_signatory');
        $this->db->where('status', 'active');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function sy()
    {
        $this->db->select('*');
        $this->db->from('tbl_school_year');
        $this->db->where('status', 'active');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function countbse()
    {
        $query = $this->db->query("SELECT SUM(units) as un FROM tbl_subject WHERE program_id = 1");
        return $query->result_array();
    }
    public function countbpa()
    {
        $query = $this->db->query("SELECT SUM(units) as un FROM tbl_subject WHERE program_id = 2");
        return $query->result_array();
    }
}