<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();
		
		$this->load->model('M_kabupaten');
		$this->load->model('M_kecamatan');
    }

	public function index()
	{
		// $data['title'] = "PETA INTELIJEN & BANK DATA INTEL";
		// $data['konten'] = "index";
		
		// $this->load->view('template/layout', $data);
		// $this->template->views('page/home', $data);
	}

	public function penyelamatan_keuangan() {
		$data['title'] = "PENYELAMATAN KEUANGAN NEGARA DAN PENANGGULANGAN TINDAK PIDANA";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/pkn', $data);
	}

	public function penyuluhan_hukum() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}
	
	public function politik() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function pemilu_1() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function pemilu_2() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function pemilu_3() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function penyelamatan_keuangan_k() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function penyuluhan_hukum_k() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function politik_k() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function pemilu_1_k() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function pemilu_2_k() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}

	public function pemilu_3_k() {
		$data['title'] = "PENYULUHAN DAN PENERANGAN HUKUM";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_kabupaten->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama,
					'amenity' => $kab->nama,
					'popupContent' => $kab->nama,
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->latitude, $kab->longitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/penyuluhan', $data);
	}
}
