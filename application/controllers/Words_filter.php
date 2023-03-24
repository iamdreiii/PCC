<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Words_filter extends CI_Controller {
    public function comment()
    {
        $this->load->view('word_filter/sample');    
    }
    public function save_comment()
    {
        $this->load->library('Comment_filter');
        $comment = $this->input->post('comment');
        $filtered_comment = $this->comment_filter->filter_comment($comment);
        echo $filtered_comment;

    }

    public function addlist() 
    {
        $data['title'] = 'Add Words';
        $this->form_validation->set_rules('word', 'word', 'required');
        if ($this->form_validation->run() === true) {
            $word = $this->input->post('word');
            if($word){
                $this->Users_model->add_words($word);
                $this->session->set_tempdata('success','Filter Words Added',1);
                redirect('addlist');
            }else{
                $this->session->set_tempdata('error','Failed to Add',1);
                redirect('addlist');
            }
           
        }else{
            $this->load->view('word_filter/addfilter', $data);
        }
    }

    public function viewlist() {
        $data['title'] = 'Foul Words List';
        $query = $this->Users_model->get_words();
        $foul_words_str = '';
        foreach ($query->result_array() as $row) {
            $foul_words_str .= $row['word'] . ',';
        }
        $foul_words_arr = explode(",", $foul_words_str);
        $data['words'] = $foul_words_arr;
        $this->load->view('word_filter/word_list', $data);
    }
}