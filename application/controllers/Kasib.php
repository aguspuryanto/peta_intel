<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasib extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();

		// $this->load->model('M_provinsi');
		$this->load->model('M_kabupaten');
		// $this->load->model('M_kecamatan');
		$this->load->model('M_bankdata');
		$this->load->model('M_peta');
		$this->load->model('M_perkara');
    }

	public function index()
	{
		$data['title'] = "Seksi B";
		$data['konten'] = "index";
		
		$this->template->views('page/kasia/index', $data);
	}

	public function Sosial() {
		$data['title'] = "Seksi B || Sosial";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Seksi B',
			'sub_kategori' => 'Sosial'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function Budaya() {
		$data['title'] = "Seksi B || Budaya";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Seksi B',
			'sub_kategori' => 'Budaya'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function Kemasyarakatan() {
		$data['title'] = "Seksi B || Kemasyarakatan";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Seksi B',
			'sub_kategori' => 'Kemasyarakatan'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function ancaman() {
		$data['title'] = "Seksi B || Potensi Ancaman";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function PetaIntelijen() {
		$data['title'] = "Seksi B || Peta Bidang Sosial, Budaya dan Kemasyarakatan";
		$data['konten'] = "index";

		// $data['listPerkara'] = array('1' => 'PENGAWASAN PEREDARAN BARANG CETAKAN DALAM NEGERI', '2' => 'PENGAWASAN PEREDARAN IMPORT BARANG CETAKAN DALAM NEGERI', '3' => 'PENGAWASAN SISTEM PERBUKUAN', '4' => 'PENGAWASAN MEDIA KOMUNIKASI', '5' => 'PENGAWASAN ALIRAN KEPERCAYAAN DAN KEAGAMAAN DALAM MASYARAKAT', '6' => 'PENCEGAKAN PENYALAHGUNAAN DAN/ATAU PENODAAN AGAMA', '7' => 'KETAHANAN BUDAYA', '8' => 'PEMBERDAYAAN MASYARAKAT DESA', '9' => 'PENGAWASAN ORGANISASI MASYARAKAT DAN LEMBAGA SWADAYA MASYARAKAT', '10' => 'PENCEGAHAN KONFLIK SOSIAL', '11' => 'KETERTIBAN DAN KETENTRAMAN UMUM', '12' => 'PEMBINAAN MASYARAKAT TAAT HUKUM');
		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}
		
		$data['peta_tipe'] = 'D.IN.3';
		$listPerkara = $this->M_perkara->select_all([
			'tipe' => $data['peta_tipe']
		]);
		
		foreach($listPerkara as $key => $val) {
			$data['listPerkara'][$val->id] = $val->perkara;
		}
		
		$data['model'] = $this->M_peta;
		$data['dataProvider'] = $this->M_peta->select_all([
			'peta_tipe' => $data['peta_tipe'],
		]);
		
		$this->template->views('page/kasia/peta', $data);		
	}

	public function view($id) {
		$data['data'] = $this->M_bankdata->selectId($id);

		$json = array();
		if($data['data']) {
			$json = array('success' => true, 'data' => $data['data']);
		} else {
			$json = array('success' => false, 'data' => []);
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
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
