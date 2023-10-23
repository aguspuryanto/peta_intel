<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();
		
		$this->load->model('M_pilpres');
		$this->load->model('M_pilgub');
		$this->load->model('M_dprd');
		$this->load->model('M_kabupaten');
		$this->load->model('M_kecamatan');
		$this->load->model('M_peta');
		$this->load->model('M_pkn');
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
					'type' => 'Polygon',
					'coordinates' => array(
						$this->getCoordinateKecamatan($kab->kode)
					), //array($kab->latitude, $kab->longitude)
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
		$data['title'] = "PEMILU: PRESIDEN";

		$data['listLatLong'] = array();		
		$listKab = $this->M_pilpres->select_all();
		foreach($listKab as $kab) {
			$data['listLatLong'][] = array(
				'name' => $kab->nama_kab,
				'content' => addslashes($kab->nama_capres1) . ' ' . $kab->jmlsuara_capres1 . '<br>' . addslashes($kab->nama_capres2) . ' ' . $kab->jmlsuara_capres2,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}

		// echo json_encode($data['listLatLong']);
		$this->load->view('page/api/pilpres', $data);
	}

	public function pemilu_2() {
		$data['title'] = "PEMILU: KEPALA DAERAH";

		$data['listLatLong'] = array();		
		$listKab = $this->M_pilgub->select_all();
		foreach($listKab as $kab) {
			$content = "";

			if($kab->nama_gub1) {
				$content .= "<p>1. " . addslashes($kab->nama_gub1) . ' ' . $kab->jmlsuara_gub1 . '</p>';
			}
			if($kab->nama_gub2) {
				$content .= "<p>2. " . addslashes($kab->nama_gub2) . ' ' . $kab->jmlsuara_gub2 . '</p>';
			}
			if($kab->nama_gub3) {
				$content .= "<p>3. " . addslashes($kab->nama_gub3) . ' ' . $kab->jmlsuara_gub3 . '</p>';
			}
			if($kab->nama_gub4) {
				$content .= "<p>4. " . addslashes($kab->nama_gub4) . ' ' . $kab->jmlsuara_gub4 . '</p>';
			}

			$data['listLatLong'][] = array(
				'name' => $kab->nama_kab,
				'content' => $content,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}

		// echo json_encode($data['listLatLong']);
		$this->load->view('page/api/pilpres', $data);
	}

	public function pemilu_3() {
		$data['title'] = "PEMILU: DPRD";

		$data['listLatLong'] = array();		
		$data['listKab'] = array();		
		$listKab = $this->M_dprd->select_all();
		foreach($listKab as $kab) {			
			$data['listKab'][] = array(
				'type' => 'Feature',
				'properties' => array(
					'name' => $kab->nama_partai,
					'amenity' => $kab->nama_partai,
					'popupContent' => addslashes($kab->nama_partai) . '<span style="float:right;text-align:right;">' . $kab->jml_anggota . '</span>',
					'show_on_map' => true
				),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array($kab->longitude, $kab->latitude)
				),
			);

			$data['listLatLong'] = array(
				'name' => $kab->nama_partai,
				'coordinates' => array($kab->latitude, $kab->longitude)
			);
		}
		
		$data['listGeoJson'][] = array(
			'type' => 'FeatureCollection',
			'features' => $data['listKab']
		);

		$this->load->view('page/api/dprd', $data);
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

	public function pkn() {
		$data['title'] = "DATA PKN & TINDAK PIDANA";

		$data['listLatLong'] = array();		
		$listPerkara = $this->M_pkn->select_all();
		foreach($listPerkara as $perkara) {
			$data['listLatLong'][] = array(
				'name' => $perkara->jenis,
				'content' => 'JENIS PERKARA: ' . $perkara->jenis,
				'coordinates' => array($perkara->latitude, $perkara->longitude)
			);
		}
		
		$this->load->view('page/api/perkara', $data);
	}

	public function perkara() {
		$data['title'] = "PETA PERKARA";

		$data['listLatLong'] = array();		
		$listPerkara = $this->M_peta->select_all();
		foreach($listPerkara as $perkara) {
			$data['listLatLong'][] = array(
				'name' => $perkara->kasus_posisi,
				'content' => 'JENIS PERKARA: ' . $perkara->no_perkara,
				'coordinates' => array($perkara->latitude, $perkara->longitude)
			);
		}

		// $data['listLatLong'] = array();		
		// $data['listKab'] = array();		
		// $listPerkara = $this->M_peta->select_all();
		// foreach($listPerkara as $perkara) {			
		// 	$data['listPerkara'][] = array(
		// 		'type' => 'Feature',
		// 		'properties' => array(
		// 			'name' => strtoupper($perkara->kasus_posisi . ' di ' . $perkara->lokasi),
		// 			'amenity' => $perkara->lokasi,
		// 			'popupContent' => $perkara->nama_pelaku,
		// 			'show_on_map' => true
		// 		),
		// 		'geometry' => array(
		// 			'type' => 'Point',
		// 			'coordinates' => array($perkara->latitude, $perkara->longitude)
		// 		),
		// 	);

		// 	$data['listLatLong'] = array(
		// 		'name' => $perkara->kasus_posisi,
		// 		'coordinates' => array($perkara->latitude, $perkara->longitude)
		// 	);
		// }
		
		// $data['listGeoJson'][] = array(
		// 	'type' => 'FeatureCollection',
		// 	'features' => $data['listPerkara']
		// );

		// echo json_encode($data['listLatLong']);
		$this->load->view('page/api/perkara', $data);
	}

	public function getCoordinateKecamatan($id) {
		$listkec = array();
		$listKab = $this->M_kecamatan->select_all(array('kab_id' => $id));
		foreach($listKab as $kab) {	
			if($kab->latitude && $kab->longitude) $listkec[] = array($kab->latitude, $kab->longitude);
		}
		return $listkec;
	}
}
