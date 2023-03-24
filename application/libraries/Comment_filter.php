<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_filter {
    protected $CI;
    public function __construct()
    {
        // Get a reference to the CodeIgniter super-object
        $this->CI =& get_instance();
        $this->CI->load->database();
    }
    public function filter_comment($comment)
    {
        // $foul_words_str = $this->CI->db->select('word')->from('tbl_comment_filter_dict')->get()->row('word');
        // $foul_words_arr = explode(",", $foul_words_str);

        // foreach ($foul_words_arr as $word) {
        //     $comment = str_ireplace(trim($word), '****', $comment);
        // }

        // return $comment;
        $query = $this->CI->db->select('word')->from('tbl_comment_filter_dict')->get();
        $foul_words_str = '';
        foreach ($query->result_array() as $row) {
            $foul_words_str .= $row['word'] . ',';
        }
        $foul_words_arr = explode(",", $foul_words_str);

        // Loop through foul words array and replace all occurrences in the comment with asterisks
        foreach ($foul_words_arr as $word) {
            $comment = str_ireplace(trim($word), '****', $comment);
        }

        return $comment;
    
    
    
    }
  
  }
  
?>
