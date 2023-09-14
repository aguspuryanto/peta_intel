<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilpres extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();

		$this->load->model('M_kabupaten');
    }

	public function index()
	{
		$data['title'] = "Pemilu Pilpres";
		$data['konten'] = "index";
		$data['listKab'] = [];
		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			array_push($data['listKab'], array($kab->id, $kab->nama));
		}
		
		$this->template->views('page/pilpres/index', $data);
	}

	public function create()
	{
		$data['title'] = "Pemilu Pilpres";
		$data['konten'] = "index";
		
		$this->template->views('page/pilpres/create', $data);
	}
}
