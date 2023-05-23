<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model 
{

    public function __construct()
    {
        parent::__construct();
    }

    // COUNT BSE TOTAL
    public function getbsetotal()
    {
        $query = $this->db->select('COUNT(*) as total_students')
        ->from('tbl_student')
        ->where('program', 'BSE')
        ->get();
        $result = $query->row();
        return $result->total_students;
    }
    // COUNT BPA TOTAl
    public function getbpatotal()
    {
        $query = $this->db->select('COUNT(*) as total_students')
        ->from('tbl_student')
        ->where('program', 'BPA')
        ->get();
        $result = $query->row();
        return $result->total_students;
    }
    public function countfirst()
    {
        $query = $this->db->select('COUNT(*) as total')
        ->from('tbl_student')
        ->where('year_level', '1st Year')
        ->get();
        $result = $query->row();
        return $result->total;
    }
    public function countsecond()
    {
        $query = $this->db->select('COUNT(*) as total')
        ->from('tbl_student')
        ->where('year_level', '2nd Year')
        ->get();
        $result = $query->row();
        return $result->total;
    }
    public function countthird()
    {
        $query = $this->db->select('COUNT(*) as total')
        ->from('tbl_student')
        ->where('year_level', '3rd Year')
        ->get();
        $result = $query->row();
        return $result->total;
    }
    public function countfourth()
    {
        $query = $this->db->select('COUNT(*) as total')
        ->from('tbl_student')
        ->where('year_level', '4th Year')
        ->get();
        $result = $query->row();
        return $result->total;
    }
    public function get_all_users()
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_user($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function add_user($data)
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

    public function update_user($id, $userdata)
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

    public function delete_user($id)
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
    
    public function delete_multiple($ids) {
        $dels = $this->db->where_in('id', $ids);
        $log = array(
            'activity' => 'Deleted Student/s',
            'details' => ''.$this->session->userdata('user')['username'].' Deleted Student/s - ID : '.implode($ids).'',
            'created_at' => date('Y-m-d H:i:s'),
        );
        if($dels){
            $this->db->insert('tbl_logs', $log);
        }
        $this->db->delete('tbl_student');
    }

    public function update_class_id_multiple($ids, $class_id) {
        $this->db->where_in('id', $ids);
        $this->db->update('tbl_student', array('class_id' => $class_id));
    }

    public function validate_email($email)
    {
        $query = $this->db->get_where('tbl_student', array('email' => $email));
        return ($query->num_rows() > 0) ? true : false;
    }
    public function get_all_users_search($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }

    public function get_courses()
    {
    $query = $this->db->get('tbl_course');
    return $query->result();
    }
    public function get_classes()
    {
    $query = $this->db->get('tbl_class');
    return $query->result();
    }
    public function update_class_id($class_id, $user_ids) 
    {
        $data = array('class_id' => $class_id);
        $this->db->where_in('id', $user_ids);
        $result = $this->db->update('tbl_student', $data);
        return $result;
    }
    public function get_year_level()
    {
    $query = $this->db->get('tbl_year_level');
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

    public function fetch_comment_filter_dict()
    {
        $query =  $this->db->query('SELECT word FROM tbl_comment_filter_dict');
        return $query->result();
    }

    // FILTERS
    public function add_words($word) {
        $data = array(
            'word' => $word
        );
        $this->db->insert('tbl_comment_filter_dict', $data);
    }

    public function get_words() {
        $query = $this->db->select('word')->from('tbl_comment_filter_dict')->get();
        return $query;
    }

    // DASH DATA
    public function count_all_student()
    {
        return $this->db->count_all('tbl_student');
    }

    public function count_all_staff()
    {
        return $this->db->count_all('tbl_staff');
    }
    // BSE QUERIES START
    // BSE
    public function bse_count_all_first_year()
    {
        $this->db->where('program', 'BSE');
        $this->db->where('year_level', '1st Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bse_count_all_second_year()
    {
        $this->db->where('program', 'BSE');
        $this->db->where('year_level', '2nd Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bse_count_all_third_year()
    {
        $this->db->where('program', 'BSE');
        $this->db->where('year_level', '3rd Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bse_count_all_fourth_year()
    {
        $this->db->where('program', 'BSE');
        $this->db->where('year_level', '4th Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    // BPA
    public function bpa_count_all_first_year()
    {
        $this->db->where('program', 'BPA');
        $this->db->where('year_level', '1st Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bpa_count_all_second_year()
    {
        $this->db->where('program', 'BPA');
        $this->db->where('year_level', '2nd Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bpa_count_all_third_year()
    {
        $this->db->where('program', 'BPA');
        $this->db->where('year_level', '3rd Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    public function bpa_count_all_fourth_year()
    {
        $this->db->where('program', 'BPA');
        $this->db->where('year_level', '4th Year');
        $this->db->from('tbl_student');
        return $this->db->count_all_results();
    }
    // BSE
    public function bse_count_filter_first_year($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('year_level', '1st Year');
        $this->db->where('program', 'BSE');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bse_count_filter_second_year($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('year_level', '2nd Year');
        $this->db->where('program', 'BSE');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bse_count_filter_third_year($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('year_level', '3rd Year');
        $this->db->where('program', 'BSE');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bse_count_filter_fourth_year($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('year_level', '4th Year');
        $this->db->where('program', 'BSE');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    // BPA
    public function bpa_count_filter_first_year($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('year_level', '1st Year');
        $this->db->where('program', 'BPA');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bpa_count_filter_second_year($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('year_level', '2nd Year');
        $this->db->where('program', 'BPA');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bpa_count_filter_third_year($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('year_level', '3rd Year');
        $this->db->where('program', 'BPA');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bpa_count_filter_fourth_year($search = null)
    {
        $this->db->select('*');
        $this->db->from('tbl_student');
        $this->db->where('year_level', '4th Year');
        $this->db->where('program', 'BPA');
        if (!empty($search)) {
            $this->db->group_start();
            $this->db->like('student_id', $search);
            $this->db->or_like('fname', $search);
            $this->db->or_like('mname', $search);
            $this->db->or_like('lname', $search);
            $this->db->or_like('email', $search);
            $this->db->group_end();
        }
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function bse_student_list_first_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('program', 'BSE');
    $this->db->where('year_level', '1st Year');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    public function bse_student_list_second_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('year_level', '2nd Year');
    $this->db->where('program', 'BSE');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    public function bse_student_list_third_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('year_level', '3rd Year');
    $this->db->where('program', 'BSE');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    public function bse_student_list_fourth_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('year_level', '4th Year');
    $this->db->where('program', 'BSE');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    // BSE QUERIES END
    // BPA QUERIES START
    public function bpa_student_list_first_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('year_level', '1st Year');
    $this->db->where('program', 'BPA');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    public function bpa_student_list_second_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('year_level', '2nd Year');
    $this->db->where('program', 'BPA');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    public function bpa_student_list_third_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('year_level', '3rd Year');
    $this->db->where('program', 'BPA');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    public function bpa_student_list_fourth_year($search, $start, $length)
    {
    $this->db->select('*');
    $this->db->from('tbl_student');
    $this->db->where('year_level', '4th Year');
    $this->db->where('program', 'BPA');
    if (!empty($search)) {
        //$this->db->like('school_id', $search);
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
    $this->db->limit($length, $start);
    $query = $this->db->get();
    return $query->result();
    }
    // BPA QUERIES END


}
