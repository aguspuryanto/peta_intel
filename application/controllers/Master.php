<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();

		$this->load->model('M_provinsi');
		$this->load->model('M_kabupaten');
		$this->load->model('M_kecamatan');
		$this->load->model('M_pilpres');
		$this->load->model('M_dprd');
		$this->load->model('M_partai');
		$this->load->model('M_dapil');
    }

	public function index()
	{
		$data['title'] = "master";
		$data['provinsi'] = $this->M_provinsi;

		$provinces = http_request("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json");
		// ubah string JSON menjadi array
		$provinces = json_decode($provinces, TRUE);
		if($provinces){
			foreach($provinces as $prov) {
				// echo $prov['name'];
				$data = [
					'kode' => $prov['id'],
					'nama' => $prov['name']
				];

				$model = $this->M_provinsi;
				$model->save($data);
				// $this->db->insert('epak_provinsi',['kode' => $prov['id'], 'nama' => $prov['name']]);
			}
		}

		$data['provinces'] = $provinces;
		$this->template->views('page/master/index', $data);
	}	

	public function kabupaten($id) {
		$data['title'] = "master";
		// $data['provinsi'] = $this->M_kabupaten;

		$regencies = http_request("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/".$id.".json");
		// ubah string JSON menjadi array
		$regencies = json_decode($regencies, TRUE);

		if($regencies){
			foreach($regencies as $prov) {
				// echo $prov['name'];
				$data = [
					'kode' => $prov['id'],
					'nama' => $prov['name'],
					'prov_id' => $prov['province_id']
				];

				$model = $this->M_kabupaten;
				$model->save($data);
				// $this->db->insert('epak_provinsi',['kode' => $prov['id'], 'nama' => $prov['name']]);
			}
		}

		$data['regencies'] = $regencies;
		$this->template->views('page/master/kabupaten', $data);
	}

	public function kecamatan($id) {
		$data['title'] = "master";
		// $data['provinsi'] = $this->M_provinsi;

		$districts = http_request("https://www.emsifa.com/api-wilayah-indonesia/api/districts/".$id.".json");
		// ubah string JSON menjadi array
		$districts = json_decode($districts, TRUE);
		
		if($districts){
			foreach($districts as $prov) {
				// echo $prov['name'];
				$data = [
					'kode' => $prov['id'],
					'nama' => $prov['name'],
					'kab_id' => $prov['regency_id']
				];

				$model = $this->M_kecamatan;
				$model->save($data);
				// $this->db->insert('epak_provinsi',['kode' => $prov['id'], 'nama' => $prov['name']]);
			}
		}

		$data['districts'] = $districts;
		$this->template->views('page/master/kecamatan', $data);
	}

	public function partai() {

		$data['title'] = "Data Partai";
		
		$data['model'] = $this->M_partai;
		$data['dataProvider'] = $this->M_partai->select_all();
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}
		
		$this->template->views('page/master/partai', $data);
	}

	public function partai_create()
	{		
		$this->load->library('form_validation');
		
		$model = $this->M_partai;

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
				'thn' => ($this->input->post('thn')) ?? date('Y'),
				'nama_partai' => $this->input->post('nama_partai')
			);			

			$model->save($data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan');
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
	}

	public function partai_view($id) {
		$data['data'] = $this->M_partai->selectId($id);

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

	public function partai_remove() {		
		$json = array();
		$model = $this->M_partai;

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

	public function dapil() {

		$data['title'] = "Data Dapil";
		
		$data['model'] = $this->M_dapil;
		$data['dataProvider'] = $this->M_dapil->select_all();
		
		$this->template->views('page/master/dapil', $data);
	}

	public function dapil_create()
	{		
		$this->load->library('form_validation');
		
		$model = $this->M_dapil;

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
				'thn' => ($this->input->post('thn')) ?? date('Y'),
				'nama_dapil' => $this->input->post('nama_dapil'),
				'nama_wilayah' => $this->input->post('nama_wilayah'),
				'jml_kursi' => $this->input->post('jml_kursi')
			);			

			$model->save($data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan');
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
	}

	public function dapil_view($id) {
		$data['data'] = $this->M_dapil->selectId($id);

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

	public function dapil_remove() {		
		$json = array();
		$model = $this->M_dapil;

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
}
