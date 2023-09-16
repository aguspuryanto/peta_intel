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
				'jmlsuara_capres1' => $this->input->post('jmlsuara_capres1'),
				'nama_capres2' => $this->input->post('nama_capres2'),
				'jmlsuara_capres2' => $this->input->post('jmlsuara_capres2'),
			);			

			$model->save($data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan');
		}

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
		
		// $this->template->views('page/pilpres/create', $data);
	}

	public function master() {
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
}
