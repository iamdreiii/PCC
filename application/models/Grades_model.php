<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grades_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_all_grades()
    {
        $this->db->select('*');
        $this->db->from('tbl_class');
        $query = $this->db->get();
        return $query->result();
    }
    // public function getgrade()
    // {
    //     $this->db->select('g.*');
    //     $this->db->from('tbl_students_grades g');
    //     $this->db->join('tbl_student s', 's.id=g.student_id', 'left');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    public function getgrade($stid) {
        $this->db->select('sg.*, st.*, sb.*');
        $this->db->from('tbl_students_grades sg');
        $this->db->join('tbl_student st', 'st.id= sg.student_id', 'left');
        $this->db->join('tbl_subject sb', 'sb.id= sg.subject_id', 'left');
        $this->db->where('sg.student_id', $stid);
        $query = $this->db->get();
        $result = $query->result();
        $data = array();
        foreach ($result as $row) {
            $data[] = array(
                'id' => $row->id,
                'STUDENT_ID' => $row->student_id,
                'DESCRIPTION' => $row->description,
                'COURSE_CODE' => $row->subcode,
                'GRADE' => $row->grades,
                // add more fields as needed
            );
        }
        return $data;
    }
    
}