<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_courses()
    {
        $query = $this->db->get('tbl_course');
        return $query->result();
    }

    // public function get_student_count_by_course()
    // {
    //     $this->db->select('program, COUNT(*) as student_count');
    //     $this->db->from('tbl_student');
    //     $this->db->group_by('program');
    //     $query = $this->db->get();

    //     $result = [];
    //     foreach ($query->result() as $row) {
    //         $result[$row->program] = $row->student_count;
    //     }
    //     return $result;
    // }
    // public function get_student_count_by_course()
    // {
    //     $this->db->select('YEAR(date_created) as year, program, COUNT(*) as student_count');
    //     $this->db->from('tbl_student');
    //     $this->db->group_by('year, program');
    //     $query = $this->db->get();

    //     $result = [];
    //     foreach ($query->result() as $row) {
    //         $result[$row->year][$row->program] = $row->student_count;
    //     }
    //     return $result;
    // }

//     public function get_all_years()
// {
//     $this->db->distinct();
//     $this->db->select('YEAR(date_created) AS year');
//     $this->db->from('tbl_student');
//     $query = $this->db->get();

//     $result = [];
//     foreach ($query->result() as $row) {
//         $result[] = $row->year;
//     }
//     return $result;
// }

// public function get_student_count_by_course_and_year()
// {
//     $this->db->select('program, YEAR(date_created) AS year, COUNT(*) as student_count');
//     $this->db->from('tbl_student');
//     $this->db->group_by('program, year');
//     $query = $this->db->get();

//     $result = [];
//     foreach ($query->result() as $row) {
//         $result[$row->program][$row->year] = $row->student_count;
//     }
//     return $result;
// }
// public function get_student_count_by_year()
//     {
//         $this->db->select('YEAR(date_created) AS y, COUNT(*) as a');
//         $this->db->from('tbl_student');
//         $this->db->group_by('y');
//         $query = $this->db->get();

//         return $query->result();
//     }

//     public function get_all_courses()
//     {
//         $query = $this->db->get('tbl_course');
//         return $query->result();
//     }

    public function get_student_count_by_course_and_year()
    {
        $this->db->select('YEAR(date_created) AS year, program, COUNT(*) as count');
        $this->db->from('tbl_student');
        $this->db->join('tbl_course', 'tbl_course.course = tbl_student.program');
        $this->db->group_by('year, program');
        $query = $this->db->get();

        $result = [];
        foreach ($query->result() as $row) {
            $result[$row->year][$row->program] = $row->count;
        }
        return $result;
    }
}