<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper('title_helper');
	}

	public function signup_form()
	{
		if ($this->session->userdata('user')) {
			redirect('shows');
		}

		$this->load_views('Registro', 'pages/auth/signup_form');
	}

	public function signup()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'ConfirmPassword', 'required|matches[password]');

		$this->set_validation_messages();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', $this->form_validation->error_array());
			redirect('auth/signup_form');
		}

		$user_data = [
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => 2
		];

		$this->UserModel->create_user($user_data);
		$this->session->set_flashdata('success', 'Usuario creado correctamente');
		redirect('auth/login_form');
	}

	public function login_form()
	{
		if ($this->session->userdata('user')) {
			redirect('shows');
		}
		$this->load_views('Iniciar Sesión', 'pages/auth/login_form');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->set_validation_messages();

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', $this->form_validation->error_array());
			redirect('auth/login_form');
		}

		$user = $this->UserModel->get_user_by_email($this->input->post('email'));

		if ($user !== NULL && password_verify($this->input->post('password'), $user['password'])) {
			$this->session->set_userdata('user', $user);
			$this->session->set_userdata('role', $user['role_id']);
			redirect('shows');
		} else {
			$this->session->set_flashdata('errors', ['Credenciales incorrectas']);
			redirect('auth/login_form');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login_form');
	}

	private function set_validation_messages()
	{
		$this->form_validation->set_message('required', 'El campo %s es obligatorio');
		$this->form_validation->set_message('valid_email', 'El campo %s debe ser un email válido');
		$this->form_validation->set_message('matches', 'Las contraseñas no coinciden');
	}

	private function load_views($title, $view, $data = [])
	{
		$data['title'] = $title;
		$this->load->view('partials/header', $data);
		$this->load->view($view, $data);
		$this->load->view('partials/footer');
	}
}
