<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model 
{
    protected $table = 'tbl_announcements';
    public function __construct()
    {
        parent::__construct();
    }
    public function get_count() 
    {
        return $this->db->count_all($this->table);
    }
    public function get_authors($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }
    public function get_blog_single($param){
        $this->db->select('*');
        $this->db->from('tbl_announcements');
        $this->db->where('id', $param);
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_blog()
    {
        $this->db->select('*');
        $this->db->from('tbl_announcements');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_videos() {
        // Fetch the videos from the database
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get('tbl_announcements');
        
        // Return the videos as an array of objects
        return $query->result();
    }
    public function get_blog($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_announcements');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_all_videos() {
        $query = $this->db->get('tbl_announcements');
        return $query->result();
    }

    public function add_blog($data)
    {
        $ad = $this->db->insert('tbl_announcements', $data);
        $log = array(
            'activity' => 'Added Announcement',
            'details' => ''.$this->session->userdata('user')['username'].' Added Announcement  -  data : '.implode($data).'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($ad){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->insert_id();
    }

    public function update_blog($id, $data)
    {
        $this->db->where('id', $id);
        $up =  $this->db->update('tbl_announcements', $data);
        $log = array(
            'activity' => 'Updated Announcement',
            'details' => ''.$this->session->userdata('user')['username'].' Updated Announcement - ID : '.$id.' data : '.implode($data).'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($up){
            $this->db->insert('tbl_logs', $log);
        }
        return $up;
    }

    public function delete_blog($id)
    {
        $this->db->where('id', $id);
        $del =$this->db->delete('tbl_announcements');
        $log = array(
            'activity' => 'Deleted Announcement',
            'details' => ''.$this->session->userdata('user')['username'].' Deleted Announcement - ID : '.$id.'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($del){
            $this->db->insert('tbl_logs', $log);
        }
        return $this->db->affected_rows();
    }
    public function get_all_blog_search($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_announcements');
    if (!empty($search)) {
        $this->db->like('title', $search);
        $this->db->or_like('description', $search);
    }
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }

    
    public function count_all()
    {
        return $this->db->count_all('tbl_announcements');
    }

    public function count_filtered($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_announcements');
        if (!empty($search)) {
            $this->db->like('title', $search);
            $this->db->or_like('description', $search);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function fetch_search_data($query)
    {
    $this->db->like('title', $query);
    $this->db->like('description', $query);
    $query = $this->db->get('tbl_announcements');
    if($query->num_rows() > 0)
    {
    foreach($query->result_array() as $row)
    {
        $output[] = array(
        'id'  => $row["id"],
        'title'  => $row["title"],
        'path'  => $row["path"],
        'description'  => $row["description"]
        );
    }
    echo json_encode($output);
    }
    }
}