<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prereq_model extends CI_Model 
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

    public function add_prereq($data)
    {
        $this->db->insert('tbl_subject_prereq', $data);
        return $this->db->insert_id();
    }

    public function update_prereq($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_subject_prereq', $data);
    }
    public function get_subject($id)
    {
        
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function delete_subject($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_subject');
        return $this->db->affected_rows();
    }
    public function get_sub1()
    {
    $this->db->select('*, tbl_subject.id as subid, tbl_subject_prereq.prereq_subject_id as subcodeid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_subject_prereq', 'tbl_subject_prereq.prereq_subject_id = tbl_subject.id', 'left');
    $this->db->where('year_level', 1);
    $this->db->where('semester', 1);
    $this->db->order_by('tbl_subject.id');
    $query = $this->db->get();
    return $query->result();
    }

    public function get_sub2()
    {
    $this->db->select('*, tbl_subject.id as subid, tbl_subject_prereq.prereq_subject_id as subcodeid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_subject_prereq', 'tbl_subject_prereq.subject_id  = tbl_subject.id', 'left');
    $this->db->where('year_level', 1);
    $this->db->where('semester', 2);
    $this->db->order_by('tbl_subject.id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub3()
    {
    $this->db->select('*, tbl_subject.id as subid, tbl_subject_prereq.prereq_subject_id as subcodeid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_subject_prereq', 'tbl_subject_prereq.subject_id  = tbl_subject.id', 'left');
    $this->db->where('year_level', 2);
    $this->db->where('semester', 1);
    $this->db->order_by('tbl_subject.id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub4()
    {
    $this->db->select('*, tbl_subject.id as subid,tbl_subject_prereq.prereq_subject_id as subcodeid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_subject_prereq', 'tbl_subject_prereq.subject_id  = tbl_subject.id', 'left');
    $this->db->where('year_level', 2);
    $this->db->where('semester', 2);
    $this->db->order_by('tbl_subject.id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub5()
    {
    $this->db->select('*, tbl_subject.id as subid,tbl_subject_prereq.prereq_subject_id as subcodeid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_subject_prereq', 'tbl_subject_prereq.subject_id  = tbl_subject.id', 'left');
    $this->db->where('year_level', 3);
    $this->db->where('semester', 1);
    $this->db->order_by('tbl_subject.id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub6()
    {
    $this->db->select('*, tbl_subject.id as subid,tbl_subject_prereq.prereq_subject_id as subcodeid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_subject_prereq', 'tbl_subject_prereq.subject_id  = tbl_subject.id', 'left');
    $this->db->where('year_level', 3);
    $this->db->where('semester', 2);
    $this->db->order_by('tbl_subject.id');
    $query = $this->db->get();
    return $query->result();
    }

    public function get_sub7()
    {
    $this->db->select('*, tbl_subject.id as subid,tbl_subject_prereq.prereq_subject_id as subcodeid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_subject_prereq', 'tbl_subject_prereq.subject_id  = tbl_subject.id', 'left');
    $this->db->where('year_level', 4);
    $this->db->where('semester', 1);
    $this->db->order_by('tbl_subject.id');
    $query = $this->db->get();
    return $query->result();
    }
    public function get_sub8()
    {
    $this->db->select('*, tbl_subject.id as subid,tbl_subject_prereq.prereq_subject_id as subcodeid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_subject_prereq', 'tbl_subject_prereq.subject_id  = tbl_subject.id', 'left');
    $this->db->where('year_level', 4);
    $this->db->where('semester', 2);
    $this->db->order_by('tbl_subject.id');
    $query = $this->db->get();
    return $query->result();
    }
    
    public function count_all()
    {
        return $this->db->count_all('tbl_subject');
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        if (!empty($search)) {
            $this->db->like('subcode', $search);
            $this->db->or_like('description', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function fetch_search_data($query)
    {
    $this->db->like('subcode', $query);
    $this->db->like('description', $query);
    $query = $this->db->get('tbl_subject');
    if($query->num_rows() > 0)
    {
    foreach($query->result_array() as $row)
    {
        $output[] = array(
        'title'  => $row["subcode"],
        'path'  => $row["path"],
        'description'  => $row["description"]
        );
    }
    echo json_encode($output);
    }
    }
    public function get_subjects()
    {
    $query = $this->db->get('tbl_subject');
    return $query->result();
    }

    public function fetch_subject($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_subject');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}