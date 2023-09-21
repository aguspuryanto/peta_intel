<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // is_logged_in();
    }

	public function index()
	{
		$data['title'] = "PETA INTELIJEN & BANK DATA INTEL";
		$data['konten'] = "index";

		$bankData = [
			array(
				'title' => 'KASI A',
				'url' => 'kasia',
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
				'url' => 'kasib',
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
				'url' => 'kasic',
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
				'url' => 'kasid',
				'show_menu' => false,
				'submenu' => array(
					array('title' => 'Daftar Pendampingan', 'link' => 'DaftarPendampingan'),
					array('title' => 'Potensi Ancaman', 'link' => 'PotensiAncaman'),
					array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
				)
			),
			array(
				'title' => 'KASI E',
				'url' => 'kasie',
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
				'url' => 'kasipenkum',
				'show_menu' => false,
				'submenu' => array(
					array('title' => 'Data Grafik', 'link' => 'DataGrafik'),
					array('title' => 'Peta Intelijen', 'link' => 'PetaIntelijen'),
				)
			),
		];

		$data['bankData'] = $bankData;
		
		$this->load->view('page/home', $data);
	}
}
