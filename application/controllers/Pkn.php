<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkn extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();

		$this->load->model('M_provinsi');
		$this->load->model('M_kabupaten');
		$this->load->model('M_kecamatan');
		$this->load->model('M_pkn');
		$this->load->model('M_perkara');
    }

	public function index()
	{
		$data['title'] = "Data Perkara";
		$data['konten'] = "index";

		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {
			$data['listKab'][$kab->id] = $kab->nama;
		}

		$listPerkara = $this->M_perkara->select_all();
		foreach($listPerkara as $key => $val) {
			$data['listPerkara'][$val->id] = $val->perkara;
		}

		$data['model'] = $this->M_pkn;
		$data['dataProvider'] = $this->M_pkn->select_all();
		
		// $this->load->view('template/layout', $data);
		$this->template->views('page/pkn/index', $data);
	}

	public function create() {
		
		$this->load->library('form_validation');
		
		$model = $this->M_pkn;

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
				'kec_id' => $this->input->post('kecamatan'),
				'jenis' => $this->input->post('jenis'),
				'nama_pelaku' => $this->input->post('nama_pelaku'),
				'penyebab' => $this->input->post('penyebab'),
				'waktu' => $this->input->post('waktu'),
				'lokasi' => $this->input->post('lokasi'),
				'alamat' => $this->input->post('alamat'),
				'kasus_posisi' => $this->input->post('kasus_posisi'),
				'keterangan' => $this->input->post('keterangan'),
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

	public function view($id) {
		$data['data'] = $this->M_pkn->selectId($id);

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
		$model = $this->M_pkn;

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
