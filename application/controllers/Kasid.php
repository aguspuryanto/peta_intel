<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasid extends CI_Controller {

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
		$data['title'] = "Kasi D";
		$data['konten'] = "index";
		
		$this->template->views('page/kasia/index', $data);
	}

	public function DaftarPendampingan() {
		$data['title'] = "Kasi D || Daftar Pendampingan";
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

	public function PotensiAncaman() {
		$data['title'] = "Kasi D || Potensi Ancaman";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Kasi D',
			'sub_kategori' => 'Potensi Ancaman'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function PetaIntelijen() {
		$data['title'] = "Kasi D || Peta Intelijen";
		$data['konten'] = "index";
		
		// $data['listPerkara'] = array('1' => 'INFRASTRUKTUR JALAN', '2' => 'INFRASTRUKTUR PERKERETAAPIAN', '3' => 'INFRASTRUKTUR KEBANDARUDARAAN', '4' => 'INFRASTRUKTUR TELEKOMUNIKASI', '5' => 'INFRASTRUKTUR KEPELABUHANAN', '6' => 'SMELTER', '7' => 'INFRASTRUKTUR PENGOLAHAN AIR', '8' => 'TANGGUL', '9' => 'BENDUNGAN', '10' => 'PERTANIAN', '11' => 'KELAUTAN KETENAGALISTRIKAN', '12' => 'ENERGI ALTERNATIF', '13' => 'MINYAK & GAS BUMI', '14' => 'ILMU PENGETAHUAN DAN TEKNOLOGI', '15' => 'PERUMAHAN', '16' => 'PARIWISATA', '17' => 'KAWASAN INDUSTRI PRIORITAS/ KAWASAN EKONOMI KHUSUS', '18' => 'POS LINTAS BATAS NEGARA & SARANA PENUNJANG', '19' => 'SEKTOR LAINNYA');
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}
		
		$data['peta_tipe'] = 'D.IN.5';
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
