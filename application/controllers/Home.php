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

	public function peta() {
		$_get = $this->input->get();
		// echo json_encode($_get);
		$data['bankData'] = getBankDataMenu();

		if ($_get['peta'] == 'D.IN.2') $data['title'] = "Seksi A || Peta Intelijen";
		if ($_get['peta'] == 'D.IN.3') $data['title'] = "Seksi B || Peta Intelijen";
		if ($_get['peta'] == 'D.IN.4') $data['title'] = "Seksi C || Peta Intelijen";
		if ($_get['peta'] == 'D.IN.5') $data['title'] = "Seksi D || Peta Intelijen";
		if ($_get['peta'] == 'D.IN.6') $data['title'] = "Seksi E || Peta Intelijen";
		if ($_get['peta'] == 'D.IN.7') $data['title'] = "Seksi Penkum || Peta Intelijen";

		$kategori = explode(" || ", $data['title']);

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		$data['page_search'] = $_get['peta'];

		if ($_get['peta']) {

			$data['listLatLong'] = array();

			$listPerkara = $this->getMapGeometry($_get['peta']);
			$data['listPerkara'] = $listPerkara['listPerkara'];

			$this->template->views('page/kasia/listpeta', $data);

		}
	}

	public function kasia($page='', $id='') {
		// echo "Seksi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Seksi A || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Seksi A || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Seksi A || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Seksi A || Potensi Ancaman";
		} elseif ($page == 'peta') {
			$data['title'] = "Seksi A || Peta Bidang Ideologi, Politik, Pertahanan dan Keamanan";
		} elseif ($page == 'perda') {
			$data['title'] = "Seksi A || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Seksi A || Pergub";
		} else {			
			$data['title'] = "Seksi A || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta') {

			$data['listLatLong'] = array();

			$listPerkara = $this->getMapGeometry('D.IN.2');
			$data['listPerkara'] = $listPerkara['listPerkara'];

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasib($page='', $id='') {
		// echo "Seksi A";
		$data['bankData'] = getBankDataMenu();
		
		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Seksi B || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Seksi B || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Seksi B || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Seksi B || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Seksi B || Peta Bidang Sosial, Budaya dan Kemasyarakatan";
		} elseif ($page == 'perda') {
			$data['title'] = "Seksi B || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Seksi B || Pergub";
		} else {			
			$data['title'] = "Seksi B || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta' || $page == 'PetaIntelijen') {

			$data['listLatLong'] = array();

			$listPerkara = $this->getMapGeometry('D.IN.3');
			$data['listPerkara'] = $listPerkara['listPerkara'];

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasic($page='', $id='') {
		// echo "Seksi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Seksi C || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Seksi C || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Seksi C || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Seksi C || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Seksi C || Peta Bidang Ekonomi dan Keuangan";
		} elseif ($page == 'perda') {
			$data['title'] = "Seksi C || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Seksi C || Pergub";
		} else {			
			$data['title'] = "Seksi C || " . ucwords($page);
		}

		$kategori = explode(" || ", $data['title']);

		$data['model'] = $this->M_bankdata;
		$data['dataProvider'] = $this->M_bankdata->select_all([
			'kategori' => $kategori[0],
			'sub_kategori' => $kategori[1]
		]);
		$data['page_type'] = 'frontend';
		
		if ($page == 'peta' || $page == 'PetaIntelijen') {

			$data['listLatLong'] = array();

			$listPerkara = $this->getMapGeometry('D.IN.4');
			// echo json_encode($listPerkara);
			$data['listPerkara'] = $listPerkara['listPerkara'];

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasid($page='', $id='') {
		// echo "Seksi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Seksi D || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Seksi D || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Seksi D || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Seksi D || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Seksi D || Peta Bidang Pengamanan Pembangunan Strategis";
		} elseif ($page == 'perda') {
			$data['title'] = "Seksi D || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Seksi D || Pergub";
		} else {			
			$data['title'] = "Seksi D || " . ucwords($page);
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

			$listPerkara = $this->getMapGeometry('D.IN.5');
			$data['listPerkara'] = $listPerkara['listPerkara'];

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasie($page='', $id='') {
		// echo "Seksi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Seksi E || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Seksi E || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Seksi E || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Seksi E || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Seksi E || Peta Bidang Teknologi Informasi dan Produksi Intelijen";
		} elseif ($page == 'perda') {
			$data['title'] = "Seksi E || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Seksi E || Pergub";
		} else {			
			$data['title'] = "Seksi E || " . ucwords($page);
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

			$listPerkara = $this->getMapGeometry('D.IN.6');
			$data['listPerkara'] = $listPerkara['listPerkara'];

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function kasipenkum($page='', $id='') {
		// echo "Seksi A";
		$data['bankData'] = getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Seksi Penkum || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Seksi Penkum || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Seksi Penkum || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Seksi Penkum || Potensi Ancaman";
		} elseif ($page == 'peta' || $page == 'PetaIntelijen') {
			$data['title'] = "Seksi Penkum || Peta Bidang Penerangan Hukum dan Penyuluhan Hukum";
		} elseif ($page == 'perda') {
			$data['title'] = "Seksi Penkum || Perda";
		} elseif ($page == 'pergub') {
			$data['title'] = "Seksi Penkum || Pergub";
		} else {			
			$data['title'] = "Seksi Penkum || " . ucwords($page);
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

			$listPerkara = $this->getMapGeometry('D.IN.7');
			$data['listPerkara'] = $listPerkara['listPerkara'];

			$this->template->views('page/kasia/listpeta', $data);

		} else {
			$this->template->views('page/kasia/list', $data);		
			// $this->load->view('page/kasia/list', $data);
		}
	}

	public function getMapGeometry($peta_tipe) {

		// $data['listLatLong'] = array();		
		$listPerkara = $this->M_peta->select_all([
			'peta_tipe' => $peta_tipe,
		]);

		if($listPerkara) {
			foreach($listPerkara as $perkara) {
				$data['listPerkara'][] = array(
					'type' => 'Feature',
					'properties' => array(
						'name' => strtoupper($perkara->no_perkara), //strtoupper($perkara->kasus_posisi . ' di ' . $perkara->lokasi),
						'amenity' => strtoupper($perkara->no_perkara), //$perkara->kasus_posisi,
						'popupContent' => strtoupper($perkara->no_perkara . '<br>' . $perkara->kasus_posisi), //$perkara->kasus_posisi . ' - ' . $perkara->nama_pelaku,
						'show_on_map' => true
					),
					'geometry' => array(
						'type' => 'Point',
						'coordinates' => array($perkara->latitude, $perkara->longitude)
					),
				);
			}
		} else {
			$data['listPerkara'][] = array(
				'type' => 'Feature',
				'properties' => array(),
				'geometry' => array(
					'type' => 'Point',
					'coordinates' => array('-2.96492', '119.30631')
				),
			);
		}

		return ($data) ?? false;
	}
}
