<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasia extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();

		// $this->load->model('M_provinsi');
		$this->load->model('M_kabupaten');
		// $this->load->model('M_kecamatan');
		$this->load->model('M_bankdata');
		$this->load->model('M_peta');
    }

	public function index()
	{
		$data['title'] = "Kasi A";
		$data['konten'] = "index";
		
		$this->template->views('page/kasia/index', $data);
	}

	public function pemerintahan() {
		$data['title'] = "Kasi A || Pemerintahan";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Kasi A',
			'sub_kategori' => 'Pemerintahan'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function stakeholder() {
		$data['title'] = "Kasi A || Stakeholder & Obyek Vital";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Kasi A',
			'sub_kategori' => 'Stakeholder & Obyek Vital'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function sdo() {
		$data['title'] = "Kasi A || Pengamanan Sumber Daya Organisasi";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Kasi A',
			'sub_kategori' => 'Pengamanan Sumber Daya Organisasi'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function ancaman() {
		$data['title'] = "Kasi A || Potensi Ancaman";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Kasi A',
			'sub_kategori' => 'Potensi Ancaman'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function peta() {
		$data['title'] = "Kasi A || Peta Intelijen";
		$data['konten'] = "index";

		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}
		
		$data['peta_tipe'] = 'D.IN.2';
		$data['model'] = $this->M_peta;
		$data['dataProvider'] = $this->M_peta->select_all([
			'peta_tipe' => $data['peta_tipe'],
		]);
		
		$this->template->views('page/kasia/peta', $data);		
	}

	public function create_peta() {
		
		$this->load->library('form_validation');
		
		$model = $this->M_peta;

        $json = array();
		$this->form_validation->set_rules($model->rules());
		$this->form_validation->set_message('required', 'Mohon lengkapi {field}!');

		if (!$this->form_validation->run()) {			
			foreach($model->rules() as $key => $val) {
				$json = array_merge($json, array(
					$val['field'] => form_error($val['field'], '<p class="mt-3 text-danger">', '</p>')
				));
			}
		} else {
			$data = array(
				'no_perkara' => $this->input->post('no_perkara'),
				'nama_pelaku' => $this->input->post('nama_pelaku'),
				'penyebab' => $this->input->post('penyebab'),
				'waktu' => $this->input->post('waktu'),
				'lokasi' => $this->input->post('lokasi'),
				'alamat' => $this->input->post('alamat'),
				'kasus_posisi' => $this->input->post('kasus_posisi'),
				'peta_tipe' => $this->input->post('peta_tipe'),
				'keterangan' => $this->input->post('keterangan')
			);

			if($this->input->post('id')) {
				$id = $this->input->post('id');
				$model->update($id, $data);				
			} else {
				$model->save($data);
			}
			
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan');
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
	}

	public function view_peta($id) {
		$data['data'] = $this->M_peta->selectId($id);

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

	public function remove_peta() {		
		$json = array();
		$model = $this->M_peta;

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

	public function perda() {
		$data['title'] = "Kasi A || Perda";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Kasi A',
			'sub_kategori' => 'Perda'
		]);
		
		$this->template->views('page/kasia/upload', $data);		
	}

	public function pergub() {
		$data['title'] = "Kasi A || Pergub";
		$data['konten'] = "index";

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => 'Kasi A',
			'sub_kategori' => 'Pergub'
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
