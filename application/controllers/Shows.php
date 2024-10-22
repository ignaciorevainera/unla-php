<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shows extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('shows_model');
		$this->load->helper('url');
	}

	public function index()
	{
		$title = 'Espectáculos';

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/shows.css'
		]);
		$this->load->view('pages/shows/index', [
			'title' => $title,
			'shows' => $this->shows_model->get_all_shows() // Se obtienen los shows con el artista
		]);
		$this->load->view('partials/footer');
	}
	public function create()
	{
		$this->check_admin();
		$this->load->model('artists_model');
		$artists = $this->artists_model->get_all_artists();
		$title = 'Agregar espectáculo';

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/add-show.css'
		]);
		$this->load->view('pages/shows/create', [
			'title' => $title,
			'artists' => $artists
		]);
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$this->check_admin();

		$show_data = [
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			'price' => $this->input->post('price'),
			'total_quantity' => $this->input->post('total_quantity'),
			'available_quantity' => $this->input->post('available_quantity'),
			'status' => $this->input->post('status'),
			'artist_id' => $this->input->post('artist_id'),
		];

		$this->shows_model->add_new_show($show_data);
		redirect('shows');
	}

	public function show($show_id)
	{
		$title = 'Espectáculo #' . $show_id;
		$show = $this->shows_model->get_show_by_id($show_id);
		if ($show === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/show-shows.css'
		]);
		$this->load->view('pages/shows/show', [
			'title' => $title,
			'show' => $show
		]);
		$this->load->view('partials/footer');
	}

	public function edit($show_id)
	{
		$this->check_admin();
		$title = 'Editar espectáculo #' . $show_id;
		$show = $this->shows_model->get_show_by_id($show_id);
		$this->load->model('artists_model');
		$artists = $this->artists_model->get_all_artists();

		if ($show === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/edit-show.css'
		]);
		$this->load->view('pages/shows/edit', [
			'title' => $title,
			'show' => $show,
			'artists' => $artists
		]);
		$this->load->view('partials/footer');
	}

	public function update($show_id)
	{
		$this->check_admin();

		$show_data = [
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			'price' => $this->input->post('price'),
			'total_quantity' => $this->input->post('total_quantity'),
			'available_quantity' => $this->input->post('available_quantity'),
			'status' => $this->input->post('status'),
			'artist_id' => $this->input->post('artist_id'),
		];

		$this->shows_model->update_show($show_id, $show_data);
		redirect('shows');
	}

	public function delete($show_id)
	{
		$this->check_admin();

		$this->shows_model->delete_show($show_id);
		redirect('shows');
	}

	private function check_admin()
	{
		$user = $this->session->userdata('user');
		if ($user['role_id'] != 1) {  // Role_id 1 es "admin", 2 es "customer"
			$this->session->set_flashdata('error', 'Acceso denegado. Solo los administradores pueden realizar esta acción.');
			redirect('shows');  // Redirige si el usuario no es admin
		}
	}
}
