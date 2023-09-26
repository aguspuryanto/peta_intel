<?php
// namespace App\Libraries\Templetes;

class Template {
	protected $_ci;

	function __construct() {
		$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
	}

	function views($template = NULL, $data = NULL) {
		if($template == 'page/home' || isset($data['page_type']) == 'frontend') {
			$data['_content']		= $this->_ci->load->view($template, $data, TRUE);
			
			//JS
			// $data['_js']			= $this->_ci->load->view('frontend/_js', $data, TRUE);

			echo $data['_template']	= $this->_ci->load->view('frontend/layout', $data, TRUE);
			// echo $this->_ci->load->view($template, $data, TRUE);
			// return;
		} else if ($template != NULL) {
            // echo json_encode($data);
			$data['_content']		= $this->_ci->load->view($template, $data, TRUE);
			
			//JS
			$data['_js']			= $this->_ci->load->view('template/_js', $data, TRUE);

			echo $data['_template']	= $this->_ci->load->view('template/layout', $data, TRUE);
		}
	}
}
?>