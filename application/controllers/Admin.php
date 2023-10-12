<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	protected $title = "SI-METAL BATIN";
	protected $site_desc = "Sistem Peta Digital & Bank Data Intelijen";

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['title'] = getAppTitle(); //$this->title;

		if ($this->session->userdata('email')) {
			redirect('dashboard');
		}

		// $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login', $data);
		} else {
			// validasinya success
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$redirect = $this->input->post('redirect');

		// $user = $this->db->get_where('epak_users', ['email' => $email])->row_array();
		$user = $this->db->where('email', $email)
		->or_where('username', $email)
		->get('epak_users')
		->row_array();
		echo $this->db->last_query();

		// jika usernya ada
		if ($user) {

			//cek password
			// if (password_verify($password, $user['password'])) {

				$data = [
					'id' => $user['id'],
					'email' => $user['email'],
					'role_id' => $user['role_id'],
					'userdata' => $user
				];
				$this->session->set_userdata($data);
				redirect(($redirect) ?? 'dashboard');
			// } else {
			// 	$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password </div>');
			// 	redirect(($redirect) ?? 'admin');
			// }
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" 
            role="alert"> Email is not registered </div>');
			redirect('admin');
		}
	}

	public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }
		$data['title'] = $this->title;
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak sesuai!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
			$this->load->view('auth/register', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
                'role_id' => 2

            ];
            $this->db->insert('epak_users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert"> Congratulation! your account has been created. Please Login</div>');
            redirect('admin');
        }
    }

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-success" 
        role="alert"> You have been logout!</div>');
		redirect('admin');
	}

	public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
