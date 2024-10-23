<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artists_model');
		$this->load->helper('url');
		$this->load->helper('title_helper');
	}

	// Mostrar todos los artistas
	public function index()
	{
		$title = 'Artistas';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/artists/index', [
			'artists' => $this->artists_model->get_all_artists()
		]);
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$this->check_admin();

		$title = 'Agregar artista';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/artists/create', [
			'title' => $title
		]);
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$this->check_admin();

		$artist_data = [
			'name' => $this->input->post('name'),
			'genre' => $this->input->post('genre'),
			'country' => $this->input->post('country')

		];

		$this->artists_model->add_new_artist($artist_data);
		redirect('artists');
	}

	public function show($artist_id)
	{
		$title = "Artista #$artist_id";

		$artist = $this->artists_model->get_artist_by_id($artist_id);

		if ($artist === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/artists/show', [
			'title' => $title,
			'artist' => $artist
		]);
		$this->load->view('partials/footer');
	}

	public function edit($artist_id)
	{
		$this->check_admin();

		$title = "Editar artista #$artist_id";

		$artist = $this->artists_model->get_artist_by_id($artist_id);

		if ($artist === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/artists/edit', [
			'title' => $title,
			'artist' => $artist
		]);
		$this->load->view('partials/footer');
	}

	public function update($artist_id)
	{
		$this->check_admin();

		$artist_data = [
			'name' => $this->input->post('name'),
			'genre' => $this->input->post('genre'),
			'country' => $this->input->post('country')
		];

		$this->artists_model->update_artist($artist_id, $artist_data);
		redirect('artists');
	}
	public function delete($artist_id)
	{
		$this->check_admin();

		$this->db->where('artist_id', $artist_id);
		$this->db->delete('show');

		$this->artists_model->delete_artist($artist_id);

		$this->session->set_flashdata('message', 'Artista y shows eliminados correctamente.');
		redirect('artists');
	}

	private function check_admin()
	{
		$user = $this->session->userdata('user');
		if ($user['role_id'] != 1) {  // Role_id 1 es "admin", 2 es "customer"
			$this->session->set_flashdata('error', 'Acceso denegado. Solo los administradores pueden realizar esta acción.');
			redirect('artists');  // Redirige si el usuario no es admin
		}
	}
}
