<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();

		$this->load->model('M_bankdata');
    }

	public function index()
	{
		$data['title'] = "PETA INTELIJEN & BANK DATA INTEL";
		$data['konten'] = "index";

		$data['bankData'] = $this->getBankDataMenu();
		
		$this->load->view('page/home', $data);
	}

	public function kasia($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = $this->getBankDataMenu();

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
		
		$this->template->views('page/kasia/list', $data);		
		// $this->load->view('page/kasia/list', $data);
	}

	public function kasib($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = $this->getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi B || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi B || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi B || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi B || Potensi Ancaman";
		} elseif ($page == 'peta') {
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
		
		$this->template->views('page/kasia/list', $data);		
		// $this->load->view('page/kasia/list', $data);
	}

	public function kasic($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = $this->getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi C || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi C || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi C || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi C || Potensi Ancaman";
		} elseif ($page == 'peta') {
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
		
		$this->template->views('page/kasia/list', $data);		
		// $this->load->view('page/kasia/list', $data);
	}

	public function kasid($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = $this->getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi D || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi D || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi D || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi D || Potensi Ancaman";
		} elseif ($page == 'peta') {
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
		
		$this->template->views('page/kasia/list', $data);		
		// $this->load->view('page/kasia/list', $data);
	}

	public function kasie($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = $this->getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi E || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi E || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi E || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi E || Potensi Ancaman";
		} elseif ($page == 'peta') {
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
		
		$this->template->views('page/kasia/list', $data);		
		// $this->load->view('page/kasia/list', $data);
	}

	public function kasipenkum($page='', $id='') {
		// echo "Kasi A";
		$data['bankData'] = $this->getBankDataMenu();

		if($page && $page == 'Pemerintahan') {			
			$data['title'] = "Kasi Penkum || Pemerintahan";
		} elseif ($page == 'stakeholder') {
			$data['title'] = "Kasi Penkum || Stakeholder & Obyek Vital";
		} elseif ($page == 'sdo') {
			$data['title'] = "Kasi Penkum || Pengamanan Sumber Daya Organisasi";
		} elseif ($page == 'ancaman') {
			$data['title'] = "Kasi Penkum || Potensi Ancaman";
		} elseif ($page == 'peta') {
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
		
		$this->template->views('page/kasia/list', $data);		
		// $this->load->view('page/kasia/list', $data);
	}

	public function getBankDataMenu() {	

		$bankData = [
			array(
				'title' => 'KASI A',
				'url' => 'home/kasia',
				'show_menu' => false,
				'submenu' => array(
					array('title' => 'Pemerintahan', 'link' => 'Pemerintahan'),
					array('title' => 'Stakeholder & Obyek Vital', 'link' => 'stakeholder'),
					array('title' => 'Pengamanan Sumber Daya Organisasi', 'link' => 'sdo'),
					array('title' => 'Potensi Ancaman', 'link' => 'ancaman'),
					array('title' => 'Peta Intelijen', 'link' => 'peta'),
					array('title' => 'Perda', 'link' => 'perda'),
					array('title' => 'Pergub', 'link' => 'pergub'),
				)
			),
			array(
				'title' => 'KASI B',
				'url' => 'home/kasib',
				'show_menu' => false,
				'submenu' => array(
					array('title' => 'Sosial', 'link' => 'Sosial'),
					array('title' => 'Budaya', 'link' => 'Budaya'),
					array('title' => 'Kemasyarakatan', 'link' => 'Kemasyarakatan'),
					array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
					array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
				)
			),
			array(
				'title' => 'KASI C',
				'url' => 'home/kasic',
				'show_menu' => false,
				'submenu' => array(
					array('title' => 'Perdagangan', 'link' => 'Perdagangan'),
					array('title' => 'Industri', 'link' => 'Industri'),
					array('title' => 'Perbankan dan Investasi', 'link' => 'Perbankan'),
					array('title' => 'Keuangan Daerah', 'link' => 'KeuanganDaerah'),
					array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
					array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
				)
			),
			array(
				'title' => 'KASI D',
				'url' => 'home/kasid',
				'show_menu' => false,
				'submenu' => array(
					array('title' => 'Daftar Pendampingan', 'link' => 'DaftarPendampingan'),
					array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
					array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
				)
			),
			array(
				'title' => 'KASI E',
				'url' => 'home/kasie',
				'show_menu' => false,
				'submenu' => array(
					array('title' => 'Lapinhar-Lapinsus-Lapopsin', 'link' => 'Lapinhar'),
					array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
					array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
					array('title' => 'Kirka', 'link' => 'Kirka'),
				)
			),
			array(
				'title' => 'KASI PENKUM',
				'url' => 'home/kasipenkum',
				'show_menu' => false,
				'submenu' => array(
					array('title' => 'Data Grafik', 'link' => 'DataGrafik'),
					array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
				)
			),
		];

		return $bankData;
	}
}
