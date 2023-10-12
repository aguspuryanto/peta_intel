<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
		$this->load->model('M_user');
    }

	public function index()
	{
		$data['title'] = "User";
		$data['model'] = $this->M_user;
		$data['listData'] = $this->M_user->select_all();	
		
		$this->template->views('page/user/index', $data);
	}

	public function setting()
	{
		$data['title'] = "User";
		$data['model'] = $this->M_user;
		$data['dataUser'] = $this->M_user->selectId($this->session->userdata('role_id'));
		$data['dataProvider'] = $this->M_user->select_all();

		$_POST = $this->input->post();
		if($_POST) {
			// echo json_encode($_POST); die();
			$this->load->library('form_validation');
			$this->load->library('email');

			$model = $this->M_user;

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
				if(isset($_POST['type']) && $_POST['type'] == 'pwd') {
					$data = array('password' => md5($this->input->post('password')));
				} else {

					$data = array(
						'instansi' => $this->input->post('instansi'),
						'username' => $this->input->post('username'),
						'nama' => $this->input->post('nama'),
						'divisi' => $this->input->post('divisi'),
						'role_id' => $this->input->post('role_id'),
						'email' => $this->input->post('email'),
						'nohape' => $this->input->post('nohape'),
					);
				}
	
				if($this->input->post('id')) {
					$id = $this->input->post('id');
					if($data['role_id'] !=1) $model->update($id, $data);
				}
				else {
					$passwdRand	= 'admin1234'; //$this->randomPassword();
					$data['password'] = md5($passwdRand);
					$model->save($data);

					if($data['email']) {
						$this->email->clear();
						$this->email->to($data['email']);
						$this->email->from('noreply@simetalbatin.id');
						$this->email->subject('Akun user Peta Digital || SI-METAL BATIN');
						$this->email->message('Halo '.$data['nama'].', akun user berhasil dibuat oleh Admin. Silahkan login melalui situs https://simetalbatin.id/admin<br> Username : '.$data['email'] .' <br> Password : ' . $passwdRand . '<br><br>');
						if ( ! $this->email->send()) {
							show_error($this->email->print_debugger());
						}
					}
				}
				
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				$json = array('success' => true, 'message' => 'Berhasil disimpan', 'data' => $data);
			}
	
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($json));
		}
		else {
			// echo json_encode($data['dataUser']);
			$this->template->views('page/user/setting', $data);
		}
	}

	public function picture() {

		if (!file_exists('./uploads')) {
			mkdir('./uploads', 0777, true);
		}

		$config['upload_path']= FCPATH . "/uploads"; //path folder file upload
		$config['allowed_types']='gif|jpg|png'; //type file yang boleh di upload
		$config['max_size'] = 5000;
		$config['encrypt_name'] = TRUE; //enkripsi file name upload
		
		$this->load->library('upload',$config); //call library upload 

		$json = array();
		if (!$this->upload->do_upload('picture_img')) {
			$json = array(
				'success' => false,
				'message' => $this->upload->display_errors()
			);
		}
		else {
			//upload file
			$upload = array('upload_data' => $this->upload->data()); //ambil file name yang diupload
			$dokumen = $upload['upload_data']['file_name']; //set file name ke variable image

			$model = $this->M_user;
			$data = array(
				'picture_img' => $dokumen,
			);

			if($this->input->post('id')) {
				$id = $this->input->post('id');
				$model->update($id, $data);
				// $this->session->set_flashdata('success', 'Berhasil disimpan');
				$json = array('success' => true, 'message' => 'Berhasil disimpan', 'data' => $data);
			}
		}
	
		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($json));
		
	}

	public function create() {
		$this->load->library('form_validation');
		$model = $this->M_user;

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
				'instansi' => $this->input->post('instansi'),
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'divisi' => $this->input->post('divisi'),
				'role_id' => $this->input->post('role_id'),
				'email' => $this->input->post('email'),
				'nohape' => $this->input->post('nohape'),
				'password' => $this->input->post('nohape'),
			);

			if($this->input->post('id')) {
				$id = $this->input->post('id');
				$model->update($id, $data);
			}
			else {
				$model->save($data);
			}

			$this->session->set_flashdata('success', 'Berhasil disimpan');
			$json = array('success' => true, 'message' => 'Berhasil disimpan', 'data' => $data);
		}

		$this->output
		->set_content_type('application/json')
		->set_output(json_encode($json));
	}

	public function view($id) {
		$data['data'] = $this->M_user->selectId($id);
		// hide password
		// unset($data['data']['password']);
		// echo json_encode($data['data'][0]->password);

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
		$model = $this->M_user;

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

	public function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
}
