<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasie extends CI_Controller {

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
		$data['title'] = "Seksi E";
		$data['konten'] = "index";
		
		$this->template->views('page/kasia/index', $data);
	}

	public function Lapinhar() {
		$data['title'] = "Seksi E || Lapinhar";
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

	public function ancaman() {
		$data['title'] = "Seksi E || Potensi Ancaman";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Seksi E',
			'sub_kategori' => 'Potensi Ancaman'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function PetaIntelijen() {
		$data['title'] = "Seksi E || Peta Bidang Teknologi Informasi dan Produksi Intelijen";
		$data['konten'] = "index";

		// $data['listPerkara'] = array('1' => 'PRODUKSI INTELIJEN', '2' => 'PEMANTAUAN', '3' => 'INTELIJEN SINYAL', '4' => 'INTELIJEN SIBER', '5' => 'KLANDESTINE', '6' => 'DIGITAL FORENSIK', '7' => 'TRANSMISI BERITA SANDI', '8' => 'KONTRA PENGINDERAAN', '9' => 'AUDIT & PENGUJIAN SISTEM KEAMANAN INFORMASI', '10' => 'PENGAMANAN SINYAL', '11' => 'PENGEMBANGAN SDM & SANDI', '12' => 'PENGEMBANGAN SDM INTELIJEN LAINNYA', '13' => 'PENGEMBANGAN TEKNOLOGI', '14' => 'PENGEMBANGAN PROSEDUR & APLISeksi ');
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}
		
		$data['peta_tipe'] = 'D.IN.6';
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

	public function Kirka() {
		$data['title'] = "Seksi E || Kirka";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Seksi E',
			'sub_kategori' => 'Kirka'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
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
