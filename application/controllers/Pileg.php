<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pileg extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();

		$this->load->model('M_provinsi');
		$this->load->model('M_kabupaten');
		$this->load->model('M_kecamatan');
		// $this->load->model('M_pilpres');
		$this->load->model('M_dprd');
		$this->load->model('M_anggota_dprd');
		$this->load->model('M_partai');
		$this->load->model('M_dapil');
    }

	public function index()
	{
		$data['title'] = "Data Pemilu DPRD";
		$data['konten'] = "index";
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}

		$data['listPartai'] = array();
		$listPartai = $this->M_partai->select_all();
		foreach($listPartai as $partai) {
			$data['listPartai'][$partai->id] = $partai->nama_partai;
		}
		// $data['model'] = $this->M_pilpres;
		// $data['dataProvider'] = $this->M_pilpres->select_all();
		$data['model'] = $this->M_dprd;
		$data['dataProvider'] = $this->M_dprd->select_all();
		
		$this->template->views('page/dprd/index', $data);
	}

	public function create()
	{
		// $data['title'] = "Pemilu Pilpres";
		// $data['konten'] = "index";
		
		$this->load->library('form_validation');
		
		$model = $this->M_dprd;

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
				'prov_id' => $this->input->post('prov_id'),
				'kab_id' => $this->input->post('kab_id'),
				'kec_id' => $this->input->post('kec_id'),
				'nama_partai' => $this->input->post('nama_partai'),
				'jml_anggota' => $this->input->post('jml_anggota'),
			);			
	
			if($this->input->post('id')) {
				$id = $this->input->post('id');
				$model->update($id, $data);
			}
			else {
				$model->save($data);
			}
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan');
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
		
		// $this->template->views('page/dprd/create', $data);
	}

	public function remove() {		
		$json = array();
		$model = $this->M_dprd;

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

	public function anggota() {
		$data['title'] = "Data Anggota DPRD";
		// $data['konten'] = "index";
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}

		$data['listPartai'] = array();
		$listPartai = $this->M_partai->select_all();
		foreach($listPartai as $partai) {
			$data['listPartai'][$partai->id] = $partai->nama_partai;
		}

		// listDapil
		// $data['listDapil'] = array();
		$listDapil = $this->M_dapil->select_all();
		foreach($listDapil as $dapil) {
			$data['listDapil'][$dapil->id] = $dapil->nama_dapil;
		}
		
		$data['model'] = $this->M_anggota_dprd;
		$data['dataProvider'] = $this->M_anggota_dprd->select_all();
		
		$this->template->views('page/dprd/anggota', $data);
	}

	public function create_anggota()
	{
		// $data['title'] = "Pemilu Pilpres";
		// $data['konten'] = "index";
		
		$this->load->library('form_validation');
		
		$model = $this->M_anggota_dprd;

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
				'periode' => $this->input->post('periode'),
				'nama_anggota' => $this->input->post('nama_anggota'),
				'partai_id' => $this->input->post('partai_id'),
				'dapil_id' => $this->input->post('dapil_id'),
				'jml_suara' => $this->input->post('jml_suara'),
				'keterangan' => $this->input->post('keterangan'),
			);			
	
			if($this->input->post('id')) {
				$id = $this->input->post('id');
				$model->update($id, $data);
			}
			else {
				$model->save($data);
			}
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan');
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
		
		// $this->template->views('page/dprd/create', $data);
	}

	public function remove_anggota() {		
		$json = array();
		$model = $this->M_anggota_dprd;

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
