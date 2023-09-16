<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasib extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();

		// $this->load->model('M_provinsi');
		// $this->load->model('M_kabupaten');
		// $this->load->model('M_kecamatan');
		$this->load->model('M_bankdata');
    }

	public function index()
	{
		$data['title'] = "Kasi B";
		$data['konten'] = "index";
		
		$this->template->views('page/kasia/index', $data);
	}

	public function Sosial() {
		$data['title'] = "Kasi B || Sosial";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all();
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function Budaya() {
		$data['title'] = "Kasi B || Budaya";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all();
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function Kemasyarakatan() {
		$data['title'] = "Kasi B || Kemasyarakatan";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all();
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function PotensiAncaman() {
		$data['title'] = "Kasi B || Potensi Ancaman";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all();
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function PetaIntelijen() {
		$data['title'] = "Kasi B || Peta Intelijen";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all();
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function remove() {		
		$json = array();
		$model = $this->M_bankdata;

		if($this->input->post('id')) {
			$id = $this->input->post('id');
			$model->delete($id);

			$this->session->set_flashdata('success', 'Berhasil terhapus');
			$json = array('success' => true, 'message' => 'Berhasil terhapus');
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($json));
	}

	public function upload() {

		if (!file_exists('./uploads')) {
			mkdir('./uploads', 0777, true);
		}

		$config['upload_path']="./uploads"; //path folder file upload
        $config['allowed_types']='pdf|doc|docx|gif|jpg|png'; //type file yang boleh di upload
        $config['encrypt_name'] = FALSE; //enkripsi file name upload
        $config['remove_spaces'] = TRUE; //enkripsi file name upload
         
        $this->load->library('upload',$config); //call library upload 

		$json = array();
		$model = $this->M_bankdata;

		if (!$this->upload->do_upload('link_file')) {
			$json = array(
				'success' => false,
				'message' => $this->upload->display_errors()
			);
		} else {
			//upload file
			$uploadData = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
			$dokumen = $uploadData['upload_data']['file_name']; //set file name ke variable image
			
			$data = array(
				'nama_file' => $this->input->post('nama_file'),
				'link_file' => $dokumen,
				'kategori' => $this->input->post('kategori'),
				'sub_kategori' => $this->input->post('sub_kategori'),
			);

			$id = $this->input->post('id');
			if($id) {
				$model->update($id, $data);
			}
			else {
				$model->save($data);
			}

			$this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan');
			$json = array_merge($json, array(
				'data' => $data,
				'dokumen' => $dokumen,
			));
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($json));
	}

	public function download($filename = null) {
		// load download helder
		$this->load->helper('download');

		$data = @file_get_contents(base_url('/uploads/'.$filename));
		if($data) force_download($filename, $data);
	}
}
