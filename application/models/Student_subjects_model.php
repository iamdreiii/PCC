<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_subjects_model extends CI_Model 
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

    // FETCH STUDENT LOADS
    public function fetch_student_loads($param, $param2)
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
        tbl_subject.year_level = $param2
        GROUP BY tbl_subject.subcode
        ORDER BY sl_id ASC
        ");
        return $query->result_array();
    }

    public function get_student_data($param)
    {
        $this->db->select('tbl_student.*, tbl_course.id as pid');
        $this->db->from('tbl_student');
        $this->db->join('tbl_course', 'tbl_course.course = tbl_student.program'); 
        $this->db->where('tbl_student.id', $param);
        $query = $this->db->get();
        return $query->result_array();
    }


    // GET SUBJECTS
    public function get_subjects($year, $program)
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('year_level', $year);
        $this->db->where('program_id', $program);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function getSubjectsByYearLevel( $st_year, $yearLevel, $program) 
    {
        if ($yearLevel === 'All') {
            $this->db->where('year_level', $st_year);
            $this->db->where('program_id', $program);
            $query = $this->db->get('tbl_subject');
        } else {
            $this->db->where('year_level', $yearLevel);
            $this->db->where('program_id', $program);
            $query = $this->db->get('tbl_subject');
        }
        return $query->result_array();
    }
    
    public function getTotalUnits( $st_year, $yearLevel, $program) 
    {
        if ($yearLevel === 'All') {
            $this->db->where('year_level', $st_year);
            $this->db->where('program_id', $program);
            return $this->db->select_sum('units')->get('tbl_subject')->row()->units;
        } else {
            $this->db->where('year_level', $yearLevel);
            $this->db->where('year_level', $yearLevel);
            $this->db->where('program_id', $program);
            return $this->db->select_sum('units')->get('tbl_subject')->row()->units;
        }
    }

    // ADD STUDENT SUBJECTS
    public function addSubjectLoad($data) {
        // Insert the data into the tbl_student_subject_loads table
        $this->db->insert('tbl_student_subject_loads', $data);
    }

    public function checkExistingSubject($subjectId, $studentId, $schoolYear) {
        $this->db->where('subject_id', $subjectId);
        $this->db->where('student_id', $studentId);
        $this->db->where('school_year', $schoolYear);
        $query = $this->db->get('tbl_student_subject_loads');
        
        return $query->num_rows() > 0;
    }
    
}