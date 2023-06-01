<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_model extends CI_Model 
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
    public function get_all_program_search($search)
    {
    $this->db->select('*');
    $this->db->from('tbl_course');
    if (!empty($search)) {
        $this->db->like('course', $search);
        $this->db->or_like('description', $search);
    }
    $query = $this->db->get();
    return $query->result();
    }

    public function get_program($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_course');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_program($data)
    {
        $this->db->insert('tbl_course', $data);
        $ad =  $this->db->insert_id();
        $log = array(
            'activity' => 'Added New Program',
            'details' => ''.$this->session->userdata('user')['username'].' Added Program -'.$data['course'].'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($ad){
            $this->db->insert('tbl_logs', $log);
        }
        return $ad;
    }

    public function update_program($id, $data)
    {
        $this->db->where('id', $id);
        $up = $this->db->update('tbl_course', $data);
        $log = array(
            'activity' => 'Updated program/course',
            'details' => ''.$this->session->userdata('user')['username'].' Updated program/course - ID : '.$id.' to '.$data['course'].'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
        return $up;
    }

    public function delete_program($id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete('tbl_course');
        $log = array(
            'activity' => 'Deleted program',
            'details' => ''.$this->session->userdata('user')['username'].' Deleted Signatory ID : '.$id.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($del){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->affected_rows();
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_course');
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_course');
        if (!empty($search)) {
            $this->db->like('course', $search);
            $this->db->or_like('description', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
}