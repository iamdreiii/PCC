<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    public function fetch_programs(){
        $this->db->select('*');
        $this->db->from('tbl_course');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_student_search($search, $start, $length, $program = null, $year_level = null)
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

    public function get_program()
    {
    $query = $this->db->get('tbl_course');
    return $query->result();
    }

    public function get_classes()
    {
    $query = $this->db->get('tbl_class');
    return $query->result();
    }

    public function delete_multiple_students($ids) {
        if (!empty($ids)) {
            $this->db->where_in('id', $ids);
            $this->db->delete('tbl_student');
    
            $delimiter = ', ';
            $log = array(
                'activity' => 'Deleted Student/s',
                'details' => ''.$this->session->userdata('user')['username'].' Deleted Student/s - ID : '.implode($delimiter, $ids).'',
                'created_at' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('tbl_logs', $log);
        }
    }
    

    public function update_class_id($class_id, $user_ids) 
    {
        $data = array('class_id' => $class_id);
        $this->db->where_in('id', $user_ids);
        $result = $this->db->update('tbl_student', $data);
        return $result;
    }

    public function get_student($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_student($data)
    {
        $ad = $this->db->insert('tbl_student', $data);
        $log = array(
            'activity' => 'Added Student',
            'details' => ''.$this->session->userdata('user')['username'].' Added Student - data : '.implode($data).'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($ad){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->insert_id();
    }

    public function update_student($id, $userdata)
    {
        $this->db->where('id', $id);
        $up = $this->db->update('tbl_student', $userdata);
        $log = array(
            'activity' => 'Updated Student Details',
            'details' => ''.$this->session->userdata('user')['username'].' Updated Student Details - ID : '.$id.' data : '.implode($userdata).'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->affected_rows();
    }

    public function delete_student($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('tbl_student');
        $log = array(
            'activity' => 'Deleted Student',
            'details' => ''.$this->session->userdata('user')['username'].' Deleted Student - ID : '.$id.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($del){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->affected_rows();
    }

    public function validate_email($email)
    {
        $query = $this->db->get_where('tbl_student', array('email' => $email));
        return ($query->num_rows() > 0) ? true : false;
    }
}