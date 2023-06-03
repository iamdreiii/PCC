<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_grades_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function load_students_data($search, $start, $length, $program = null, $year_level = null)
        {
        $this->db->select('*');
        $this->db->from('tbl_student');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
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

        if (!empty($program)) {
            $this->db->where('program', $program);
        }

        if (!empty($year_level)) {
            $this->db->where('year_level', $year_level);
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


    public function get_student_data($param)
    {
        $this->db->select('*, tbl_course.description as cd, tbl_course.id as pid');
        $this->db->from('tbl_student');
        $this->db->where('tbl_student.id', $param);
        $this->db->join('tbl_course', 'tbl_course.course = tbl_student.program', 'left');

        $query = $this->db->get();
        return $query->result_array();

    }

    public function load_students_subjects($param, $year, $program)
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
                tbl_student_subject_loads.id as sl_id, tbl_subject.year_level as year_level 
        FROM tbl_student_subject_loads 
        JOIN tbl_student ON tbl_student.id = tbl_student_subject_loads.student_id 
        JOIN tbl_subject ON tbl_subject.id = tbl_student_subject_loads.subject_id 
        WHERE tbl_student_subject_loads.student_id = $param AND
        tbl_subject.year_level = $year AND
        tbl_subject.program_id = $program
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }

}