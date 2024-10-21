<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('artists_model');
		$this->load->helper('url');
	}

	// Mostrar todos los artistas
	public function index()
	{
		$title = 'Lista de Artistas';

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/artists.css'
		]);
		$this->load->view('pages/artists/index', [
			'title' => $title,
			'artists' => $this->artists_model->get_all_artists()
		]);
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$title = 'Crear Artista';

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/add-artist.css'
		]);
		$this->load->view('pages/artists/create', [
			'title' => $title
		]);
		$this->load->view('partials/footer');
	}

	public function store()
	{
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
		$title = 'Artist #' . $artist_id;
		$artist = $this->artists_model->get_artist_by_id($artist_id);
		if ($artist === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/show-artist.css'
		]);
		$this->load->view('pages/artists/show', [
			'title' => $title,
			'artist' => $artist
		]);
		$this->load->view('partials/footer');
	}

	public function edit($artist_id)
	{
		$title = 'Editar Artista #' . $artist_id;
		$artist = $this->artists_model->get_artist_by_id($artist_id);

		if ($artist === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/edit-artist.css'
		]);
		$this->load->view('pages/artists/edit', [
			'title' => $title,
			'artist' => $artist
		]);
		$this->load->view('partials/footer');
	}

	public function update($artist_id)
	{
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
		$this->db->where('artist_id', $artist_id);
		$this->db->delete('show');

		$this->artists_model->delete_artist($artist_id);

		$this->session->set_flashdata('message', 'Artista y shows eliminados correctamente.');
		redirect('artists');
	}
}
