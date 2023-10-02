<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilpres extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();

		$this->load->model('M_provinsi');
		$this->load->model('M_kabupaten');
		$this->load->model('M_kecamatan');
		$this->load->model('M_pilpres');
    }

	public function index()
	{
		$data['title'] = "Pemilu Pilpres";
		$data['konten'] = "index";
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}

		$data['model'] = $this->M_pilpres;
		$data['dataProvider'] = $this->M_pilpres->select_all();
		
		$this->template->views('page/pilpres/index', $data);
	}

	public function create()
	{
		// $data['title'] = "Pemilu Pilpres";
		// $data['konten'] = "index";
		
		$this->load->library('form_validation');
		
		$model = $this->M_pilpres;

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
				'nama_capres1' => $this->input->post('nama_capres1'),
				'jmlsuara_capres1' => preg_replace("/[^0-9]/", "", $this->input->post('jmlsuara_capres1')),
				'nama_capres2' => $this->input->post('nama_capres2'),
				'jmlsuara_capres2' => preg_replace("/[^0-9]/", "", $this->input->post('jmlsuara_capres2')),
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
		
		// $this->template->views('page/pilpres/create', $data);
	}

	public function view($id) {
		$data['data'] = $this->M_pilpres->selectId($id);

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
		$model = $this->M_pilpres;

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
