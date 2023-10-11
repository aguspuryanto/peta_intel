<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();
		$this->load->library('session');
		$this->load->model('M_bankdata');
		$this->load->model('M_peta');
		$this->load->model('M_kabupaten');
    }

	public function index()
	{
		$data['title'] = getAppTitle(); //"PETA INTELIJEN & BANK DATA INTEL";
		$data['desc'] = getAppDesc();

		$data['bankData'] = getBankDataMenu();
		// echo json_encode($this->session->userdata['userdata']['nama']);
		
		$this->load->view('page/home', $data);
	}

	public function kasia($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi A || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi A || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi A || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi A || Potensi Ancaman";
		} elseif ($page == 'peta') {
			$data['title'] = "Kasi A || Peta Intelijen";
		} elseif ($page == 'perda') {
			$data['title'] = "Kasi A || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Kasi A || Pergub";
		} else {			
			$data['title'] = "Kasi A || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta') {

			$data['listLatLong'] = array();		
			$listPerkara = $this->M_peta->select_all([
				'peta_tipe' => 'D.IN.2',
			]);

			foreach($listPerkara as $perkara) {
				$data['listPerkara'][] = array(
					'type' => 'Feature',
					'properties' => array(
						'name' => $perkara->kasus_posisi,
						'amenity' => $perkara->kasus_posisi,
						'popupContent' => $perkara->kasus_posisi . ' - ' . $perkara->nama_pelaku,
						'show_on_map' => true
					),
					'geometry' => array(
						'type' => 'Point',
						'coordinates' => array($perkara->latitude, $perkara->longitude)
					),
				);
			}

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasib($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = getBankDataMenu();
		
		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi B || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi B || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi B || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi B || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Kasi B || Peta Intelijen";
		} elseif ($page == 'perda') {
			$data['title'] = "Kasi B || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Kasi B || Pergub";
		} else {			
			$data['title'] = "Kasi B || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta' || $page == 'PetaIntelijen') {

			$data['listLatLong'] = array();		
			$listPerkara = $this->M_peta->select_all([
				'peta_tipe' => 'D.IN.3',
			]);

			foreach($listPerkara as $perkara) {
				$data['listPerkara'][] = array(
					'type' => 'Feature',
					'properties' => array(
						'name' => $perkara->kasus_posisi,
						'amenity' => $perkara->kasus_posisi,
						'popupContent' => $perkara->kasus_posisi . ' - ' . $perkara->nama_pelaku,
						'show_on_map' => true
					),
					'geometry' => array(
						'type' => 'Point',
						'coordinates' => array($perkara->latitude, $perkara->longitude)
					),
				);
			}

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasic($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi C || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi C || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi C || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi C || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Kasi C || Peta Intelijen";
		} elseif ($page == 'perda') {
			$data['title'] = "Kasi C || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Kasi C || Pergub";
		} else {			
			$data['title'] = "Kasi C || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta' || $page == 'PetaIntelijen') {

			$data['listLatLong'] = array();		
			$listPerkara = $this->M_peta->select_all([
				'peta_tipe' => 'D.IN.4',
			]);

			foreach($listPerkara as $perkara) {
				$data['listPerkara'][] = array(
					'type' => 'Feature',
					'properties' => array(
						'name' => $perkara->kasus_posisi,
						'amenity' => $perkara->kasus_posisi,
						'popupContent' => $perkara->kasus_posisi . ' - ' . $perkara->nama_pelaku,
						'show_on_map' => true
					),
					'geometry' => array(
						'type' => 'Point',
						'coordinates' => array($perkara->latitude, $perkara->longitude)
					),
				);
			}

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasid($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi D || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi D || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi D || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi D || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Kasi D || Peta Intelijen";
		} elseif ($page == 'perda') {
			$data['title'] = "Kasi D || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Kasi D || Pergub";
		} else {			
			$data['title'] = "Kasi D || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta' || $page == 'PetaIntelijen') {

			$data['listLatLong'] = array();		
			$listPerkara = $this->M_peta->select_all([
				'peta_tipe' => 'D.IN.5',
			]);

			foreach($listPerkara as $perkara) {
				$data['listPerkara'][] = array(
					'type' => 'Feature',
					'properties' => array(
						'name' => $perkara->kasus_posisi,
						'amenity' => $perkara->kasus_posisi,
						'popupContent' => $perkara->kasus_posisi . ' - ' . $perkara->nama_pelaku,
						'show_on_map' => true
					),
					'geometry' => array(
						'type' => 'Point',
						'coordinates' => array($perkara->latitude, $perkara->longitude)
					),
				);
			}

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasie($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi E || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi E || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi E || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi E || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Kasi E || Peta Intelijen";
		} elseif ($page == 'perda') {
			$data['title'] = "Kasi E || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Kasi E || Pergub";
		} else {			
			$data['title'] = "Kasi E || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta' || $page == 'PetaIntelijen') {

			$data['listLatLong'] = array();		
			$listPerkara = $this->M_peta->select_all([
				'peta_tipe' => 'D.IN.6',
			]);

			foreach($listPerkara as $perkara) {
				$data['listPerkara'][] = array(
					'type' => 'Feature',
					'properties' => array(
						'name' => $perkara->kasus_posisi,
						'amenity' => $perkara->kasus_posisi,
						'popupContent' => $perkara->kasus_posisi . ' - ' . $perkara->nama_pelaku,
						'show_on_map' => true
					),
					'geometry' => array(
						'type' => 'Point',
						'coordinates' => array($perkara->latitude, $perkara->longitude)
					),
				);
			}

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasipenkum($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi Penkum || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi Penkum || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi Penkum || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi Penkum || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Kasi Penkum || Peta Intelijen";
		} elseif ($page == 'perda') {
			$data['title'] = "Kasi Penkum || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Kasi Penkum || Pergub";
		} else {			
			$data['title'] = "Kasi Penkum || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);
		$data['kategori'] = $kategori[0];
		$data['sub_kategori'] = $kategori[1];

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta' || $page == 'PetaIntelijen') {

			$data['listLatLong'] = array();		
			$listPerkara = $this->M_peta->select_all([
				'peta_tipe' => 'D.IN.7',
			]);

			foreach($listPerkara as $perkara) {
				$data['listPerkara'][] = array(
					'type' => 'Feature',
					'properties' => array(
						'name' => $perkara->kasus_posisi,
						'amenity' => $perkara->kasus_posisi,
						'popupContent' => $perkara->kasus_posisi . ' - ' . $perkara->nama_pelaku,
						'show_on_map' => true
					),
					'geometry' => array(
						'type' => 'Point',
						'coordinates' => array($perkara->latitude, $perkara->longitude)
					),
				);
			}

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}
}
