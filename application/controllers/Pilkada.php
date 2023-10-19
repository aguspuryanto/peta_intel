<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilkada extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();

		$this->load->model('M_provinsi');
		$this->load->model('M_kabupaten');
		$this->load->model('M_kecamatan');
		$this->load->model('M_pilkada');
		$this->load->model('M_pilgub');
    }

	public function index()
	{
		$data['title'] = "Pemilu Pilbup";
		$data['konten'] = "index";
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}

		$data['model'] = $this->M_pilkada;
		$data['dataProvider'] = $this->M_pilkada->select_all();
		
		$this->template->views('page/pilkada/index', $data);
	}

	public function create()
	{		
		$this->load->library('form_validation');
		
		$model = $this->M_pilkada;

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
				'thn' => $this->input->post('thn'),
				'prov_id' => $this->input->post('prov_id'),
				'kab_id' => $this->input->post('kab_id'),
				'kec_id' => $this->input->post('kec_id'),
				// 'nama_gub1' => $this->input->post('nama_gub')[0],
				// 'jmlsuara_gub1' => $this->input->post('jmlsuara_gub')[0],
				// 'nama_gub2' => $this->input->post('nama_gub2'),
				// 'jmlsuara_gub2' => $this->input->post('jmlsuara_gub2'),
			);

			$totPaslon = count($this->input->post('nama_gub'));
			for($i = 0; $i < $totPaslon; $i++){
				$datapaslon = array(
					'nama_gub' . ($i+1) => $this->input->post('nama_gub')[$i],
					'jmlsuara_gub' . ($i+1) => $this->input->post('jmlsuara_gub')[$i],
				);
				$data = array_merge($data, $datapaslon);
			}

			// echo json_encode($data);
			if($this->input->post('id')) {
				$id = $this->input->post('id');
				$model->update($id, $data);				
			} else {
				$model->save($data);
			}

            $this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan', 'data' => ($data));
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
		
		// $this->template->views('page/Pilkada/create', $data);
	}

	public function view($id) {
		$data['data'] = $this->M_pilkada->selectId($id);

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
		$model = $this->M_pilkada;

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

	// PILGUB

	public function pilgub() {
		$data['title'] = "Pemilu Pilgub";
		// $data['konten'] = "index";
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}

		$data['model'] = $this->M_pilgub;
		$data['dataProvider'] = $this->M_pilgub->select_all();
		
		$this->template->views('page/pilkada/pilgub', $data);
	}

	public function create_pilgub()
	{		
		$this->load->library('form_validation');
		
		$model = $this->M_pilgub;

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
				'thn' => $this->input->post('thn'),
				'prov_id' => $this->input->post('prov_id'),
				'kab_id' => $this->input->post('kab_id'),
				'kec_id' => $this->input->post('kec_id'),
				// 'nama_gub1' => $this->input->post('nama_gub')[0],
				// 'jmlsuara_gub1' => $this->input->post('jmlsuara_gub')[0],
				// 'nama_gub2' => $this->input->post('nama_gub2'),
				// 'jmlsuara_gub2' => $this->input->post('jmlsuara_gub2'),
			);

			$totPaslon = count($this->input->post('nama_gub'));
			for($i = 0; $i < $totPaslon; $i++){
				$datapaslon = array(
					'nama_gub' . ($i+1) => $this->input->post('nama_gub')[$i],
					'jmlsuara_gub' . ($i+1) => $this->input->post('jmlsuara_gub')[$i],
				);
				$data = array_merge($data, $datapaslon);
			}

			// echo json_encode($data);
			if($this->input->post('id')) {
				$id = $this->input->post('id');
				$model->update($id, $data);				
			} else {
				$model->save($data);
			}

            $this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan', 'data' => ($data));
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
		
		// $this->template->views('page/Pilkada/create', $data);
	}

	public function view_pilgub($id) {
		$data['data'] = $this->M_pilgub->selectId($id);

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

	public function remove_pilgub() {		
		$json = array();
		$model = $this->M_pilgub;

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
