<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct() 
    {
      parent::__construct();
      $this->load->helper('url', 'form');
      $this->load->library('session');
    }

	public function index()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin')
        {
            $page = 'blog';
            if(!file_exists(APPPATH.'views/admin/blog/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Announcements";
            $this->load->view('admin/blog/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function fb()
	{
            $page = 'fb';
            if(!file_exists(APPPATH.'views/admin/blog/'.$page.'.php')){
                show_404();
            }
            $this->load->view('admin/blog/'. $page);    
	}
    public function bloghome()
	{
            $page = 'viewfiles';
            if(!file_exists(APPPATH.'views/admin/blog/'.$page.'.php')){
                show_404();
            }
            $data['blogsetting'] = $this->Blog_model->getblogsetting();
            foreach($data['blogsetting'] as $row) :
                $data['title'] = $row['title'];
                $data['subtitle'] = $row['subtitle'];
                $data['fb'] = $row['facebook'];
                $data['ig'] = $row['instagram'];
                $data['tw'] = $row['twitter'];
                $data['yt'] = $row['youtube'];
                $data['footer'] = $row['footer'];
                $data['navbar_color'] = $row['navbar_color'];
                $data['body_color'] = $row['body_color'];
                $data['footer_color'] = $row['footer_color'];
            endforeach;
            $this->load->view('admin/blog/'. $page, $data);   
	}
    public function blogview($param)
	{
            $page = 'view';
            if(!file_exists(APPPATH.'views/blog/'.$page.'.php')){
                show_404();
            }
            $data['blogsetting'] = $this->Blog_model->getblogsetting();
            foreach($data['blogsetting'] as $row) :
                $data['title'] = $row['title'];
                $data['subtitle'] = $row['subtitle'];
                $data['fb'] = $row['facebook'];
                $data['ig'] = $row['instagram'];
                $data['tw'] = $row['twitter'];
                $data['yt'] = $row['youtube'];
                $data['footer'] = $row['footer'];
                $data['navbar_color'] = $row['navbar_color'];
                $data['body_color'] = $row['body_color'];
                $data['footer_color'] = $row['footer_color'];
            endforeach;
            $data['blogres'] = $this->Blog_model->get_blog_single($param);
            $this->load->view('blog/'. $page, $data);   
	}
   
    public function viewfiles_ajax() {
        // Fetch the videos from the database
        $videos = $this->Blog_model->get_videos();
        
        // Return the videos as JSON
        echo json_encode($videos);
    }

    public function blog_list()
    {
        
        $search = $this->input->post("search")['value'];
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $list = $this->Blog_model->get_all_blog_search($search, $start, $length);
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $blog) {
            $no++;
            $row = array();
            $row[] = $no++;
            $row[] = $blog->title;
            $row[] = $blog->path;
            $row[] = $blog->created_at;
            $row[] = $blog->updated_at;
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_blog('."'".$blog->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_blog('."'".$blog->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $filteredCount = $this->Blog_model->count_filtered();
        $totalCount = $this->Blog_model->count_all();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $totalCount,
            "recordsFiltered" => $filteredCount,
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    
    public function blog_add()
    {
        $des = $this->input->post('description');
        $this->load->helper('string');

        // Video upload configuration
        $configVideo['upload_path'] = 'uploads/announcement/';
        $configVideo['max_size'] = '102400';
        $configVideo['allowed_types'] = 'mp4';
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = random_string('numeric', 5);
        $configVideo['file_name'] = $video_name;

        // Image upload configuration
        $configImage['upload_path'] = 'uploads/announcement/';
        $configImage['allowed_types'] = 'gif|jpg|png|jpeg';
        $configImage['max_size'] = '2048';
        $image_name = random_string('numeric', 5);
        $configImage['file_name'] = $image_name;

        $this->load->library('upload');

        // Upload video
        $this->upload->initialize($configVideo);
        
        if ($this->upload->do_upload('path'))
        {
            $upload_data = $this->upload->data();
            $videofile['filename'] = $upload_data['file_name'];
            $url = 'uploads/announcement/'.$videofile['filename'];
            $data = array(
                'title' => $this->input->post('title'),
                'path' => $url,
                'description' => $des,
                'created_at' => date('Y-m-d H:i:s'),
            );
            $insert = $this->Blog_model->add_blog($data);
            echo json_encode(array("status" => TRUE));
            return;
        }
        $video_error = $this->upload->display_errors('', '');

        // Upload image
        $this->upload->initialize($configImage);
        if ($this->upload->do_upload('path'))
        {
            $upload_data = $this->upload->data();
            $imagefile['filename'] = $upload_data['file_name'];
            $url = 'uploads/announcement/'.$imagefile['filename'];
            $data = array(
                'title' => $this->input->post('title'),
                'path' => $url,
                'description' => $des,
                'created_at' => date('Y-m-d H:i:s'),
            );
            $insert = $this->Blog_model->add_blog($data);
            echo json_encode(array("status" => TRUE));
            return;
        }
        $image_error = $this->upload->display_errors('', '');

        // Both uploads failed
        $stat = $this->session->set_flashdata('error', $video_error . '<br/>' . $image_error);
        echo json_encode(array("status" => FALSE));
    }


    public function blog_update()
    {
        $id= $this->input->post('id');
        $this->load->helper('string');

        // Video upload configuration
        $configVideo['upload_path'] = 'uploads/announcement/';
        $configVideo['max_size'] = '102400';
        $configVideo['allowed_types'] = 'mp4';
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = random_string('numeric', 5);
        $configVideo['file_name'] = $video_name;

        // Image upload configuration
        $configImage['upload_path'] = 'uploads/announcement/';
        $configImage['allowed_types'] = 'gif|jpg|png|jpeg';
        $configImage['max_size'] = '2048';
        $image_name = random_string('numeric', 5);
        $configImage['file_name'] = $image_name;

        $this->load->library('upload');

        // Upload video
        if(empty($_FILES['path']['name'])){
            $upload_data = $this->upload->data();
            $videofile['filename'] = $upload_data['file_name'];
            $url = 'uploads/announcement/'.$videofile['filename'];
            $data = array(
                'title' => $this->input->post('title'),
                // 'path' => $videofile['filename'],
                //'path' => $url,
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->Blog_model->update_blog($id, $data);
            echo json_encode(array("status" => TRUE));
            return;
        }
        $this->upload->initialize($configVideo);
        
        if ($this->upload->do_upload('path'))
        {
            // Load the blog post data from the database using its ID.
            $blog = $this->Blog_model->get_blog($id);

            // Check if there is a video already associated with the blog post. If yes, unlink the old video file.
            if ($blog['path']) {
                unlink($blog['path']);
            }
            $upload_data = $this->upload->data();
            $videofile['filename'] = $upload_data['file_name'];
            $url = 'uploads/announcement/'.$videofile['filename'];
            $data = array(
                'title' => $this->input->post('title'),
                // 'path' => $videofile['filename'],
                'path' => $url,
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->Blog_model->update_blog($id, $data);
            echo json_encode(array("status" => TRUE));
            return;
        }
        $video_error = $this->upload->display_errors('', '');

        // Upload image
        if(empty($_FILES['path']['name'])){
            $upload_data = $this->upload->data();
            $imagefile['filename'] = $upload_data['file_name'];
            $url = 'uploads/announcement/'.$imagefile['filename'];
            $data = array(
                'title' => $this->input->post('title'),
                //'path' => $url,
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->Blog_model->update_blog($id, $data);
            echo json_encode(array("status" => TRUE));
            return;
        }
        $this->upload->initialize($configImage);
        if ($this->upload->do_upload('path'))
        {
            $blog = $this->Blog_model->get_blog($id);

            // Check if there is a video already associated with the blog post. If yes, unlink the old video file.
            if ($blog['path']) {
                unlink($blog['path']);
            }
            $upload_data = $this->upload->data();
            $imagefile['filename'] = $upload_data['file_name'];
            $url = 'uploads/announcement/'.$imagefile['filename'];
            $data = array(
                'title' => $this->input->post('title'),
                'path' => $url,
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            $this->Blog_model->update_blog($id, $data);
            echo json_encode(array("status" => TRUE));
            return;
        }
        $image_error = $this->upload->display_errors('', '');

        // Both uploads failed
        $stat = $this->session->set_flashdata('error', $video_error . '<br/>' . $image_error);
        echo json_encode(array("status" => FALSE));
    }


    public function blog_update1()
    {
        $id= $this->input->post('id');
        $this->load->helper('string');
        $configVideo['upload_path'] = 'uploads/announcement/'; # check path is correct
        $configVideo['max_size'] = '102400';
        $configVideo['allowed_types'] = 'mp4'; # add video extenstion on here
        $configVideo['overwrite'] = FALSE;
        $configVideo['remove_spaces'] = TRUE;
        $video_name = random_string('numeric', 5);
        $configVideo['file_name'] = $video_name;

        $this->load->library('upload', $configVideo);
        $this->upload->initialize($configVideo);

        // Load the blog post data from the database using its ID.
        $blog = $this->Blog_model->get_blog($id);

        // Check if there is a video already associated with the blog post. If yes, unlink the old video file.
        if ($blog['path'].'.mp4') {
            unlink($blog['path'].'.mp4');
        }

        if (!$this->upload->do_upload('path')) # form input field attribute
        {
            # Upload Failed
            $stat =$this->session->set_flashdata('error', $this->upload->display_errors());
            echo json_encode(array("status" => FALSE));
        }
        else
        {
            # Upload Successfull
            $url = 'uploads/announcement/'.$video_name;
            $data = array(
                'title' => $this->input->post('title'),
                'path' => $url,
                'description' => $this->input->post('description'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            // Update the blog post data in the database with the new video path.
            $update = $this->Blog_model->update_blog($id, $data);
            echo json_encode(array("status" => TRUE));
        }
    }


    public function blog_edit($id)
    {
        $data = $this->Blog_model->get_blog($id);
        echo json_encode($data);
    }

    public function blog_delete($id)
    {
        $blog = $this->Blog_model->get_blog($id);

        if ($blog['path']) {
            unlink($blog['path']);
        }
        $this->Blog_model->delete_blog($id);
        echo json_encode(array("status" => TRUE));
    }

    public function fetch()
    {
     echo $this->Blog_model->fetch_search_data($this->uri->segment(3));
    }
}
