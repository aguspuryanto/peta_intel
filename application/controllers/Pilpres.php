<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilpres extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

	public function index()
	{
		$data['title'] = "Pemilu Pilpres";
		$data['konten'] = "index";
		
		$this->template->views('page/pilpres/index', $data);
	}

	public function create()
	{
		$data['title'] = "Pemilu Pilpres";
		$data['konten'] = "index";
		
		$this->template->views('page/pilpres/create', $data);
	}
}
