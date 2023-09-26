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
}
