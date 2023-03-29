<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject_model extends CI_Model 
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

    public function add_subject($data)
    {
        $this->db->insert('tbl_subject', $data);
        return $this->db->insert_id();
    }

    public function update_subject($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tbl_subject', $data);
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
    public function get_all_subject_search($search, $start, $length)
    {
    $this->db->select('*, tbl_subject.id as subjectid');
    $this->db->from('tbl_subject');
    $this->db->join('tbl_program', 'tbl_subject.program_id = tbl_program.id');
    $this->db->order_by('tbl_subject.id', 'asc');
    $this->db->order_by('program_id', 'asc');
    $this->db->order_by('year_level', 'asc');
    $this->db->order_by('semester', 'asc');
    if (!empty($search)) {
        $this->db->like('subcode', $search);
        $this->db->or_like('description', $search);
        $this->db->or_like('year_level', $search);
        $this->db->or_like('semester', $search);
    }
    $this->db->limit($length, $start);
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
}