<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('title_helper');
	}

	public function signup_form()
	{
		// Redirigir si ya está logueado
		if ($this->session->userdata('user')) {
			redirect('shows');  // Redirige a la página de shows si ya está logueado
			die;
		}

		$title = 'Registro';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/auth/signup_form');
		$this->load->view('partials/footer');
	}

	public function signup()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirm_password', 'ConfirmPassword', 'required|matches[password]');

		$this->form_validation->set_message('required', 'El campo %d es obligatorio');
		$this->form_validation->set_message('valid_email', 'El campo %d debe ser un email válido');
		$this->form_validation->set_message('matches', 'Las contraseñas no coinciden');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', $this->form_validation->error_array());
			redirect('auth/signup_form');
		}

		$user_data = [
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'role_id' => 2 // 'customer'
		];
		$this->users_model->create_user($user_data);
		$this->session->set_flashdata('success', 'Usuario creado correctamente');
		redirect('auth/login_form');
	}

	public function login_form()
	{
		// Redirigir si ya está logueado
		if ($this->session->userdata('user')) {
			redirect('shows');  // Redirige a la página de shows si ya está logueado
			die;
		}

		$title = 'Iniciar Sesión';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/auth/login_form');
		$this->load->view('partials/footer');
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_message('required', 'El campo %d es obligatorio');
		$this->form_validation->set_message('valid_email', 'El campo %d debe ser un email válido');

		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('errors', $this->form_validation->error_array());
			redirect('auth/login_form');
		}

		$user = $this->users_model->get_user_by_email($this->input->post('email'));

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
}
