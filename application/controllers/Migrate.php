<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller { 
    public function index() { 
        $this->load->library('migration');
        if ($this->migration->current() === FALSE)
        {
            // echo $this->migration->version();
            show_error($this->migration->error_string());
        }else{
            // echo $this->migration->current();
            echo "Table Migrated Successfully.";
        }
    }
}