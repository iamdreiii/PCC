<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries and helpers
        $this->load->helper('url');
        $this->load->helper('file');
      }

	public function index()
	{
        
        if ($this->session->userdata('user') && $this->session->userdata('user')['type'] == 'admin' || $this->session->userdata('user')['type'] == 'staff' )
        {
            $page = 'index';
            if(!file_exists(APPPATH.'views/admin/backup/'.$page.'.php')){
                show_404();
            }
            $data['title'] = "Manage Database";
            $this->load->view('admin/backup/'. $page, $data);    
        }else{
            redirect('staff');
        }	
	}
    public function backup()
    {
        // Backup the database using CodeIgniter's dbutil library
        $this->load->dbutil();
        $backup = $this->dbutil->backup();

        // Specify the directory to store the backup file
        $backupDirectory = FCPATH . 'backup/';
        $backupFilename = 'backup_' . time() . '.sql.gz';

        // Write the backup file to the specified directory
        $this->load->helper('file');
        write_file($backupDirectory . $backupFilename, $backup);

        // Return the backup filename
        echo json_encode(['filename' => $backupFilename]);
    }

    public function downloadBackup($filename)
    {
        $backupDirectory = FCPATH . 'backup/';
        $filepath = $backupDirectory . $filename;

        if (file_exists($filepath)) {
            $this->load->helper('download');
            force_download($filepath, NULL);
        } else {
            echo 'Backup file not found.';
        }
    }


    
}