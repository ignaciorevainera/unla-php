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
		$data['title'] = 'Lista de Artistas';
		$data['artists'] = $this->artists_model->get_all_artists();

		$this->load->view('partials/header', $data);
		$this->load->view('pages/artists/index', $data);
		$this->load->view('partials/footer');
	}

	// Mostrar información de un solo artista
	public function show($artist_id)
	{
		$data['artist'] = $this->artists_model->get_artist_by_id($artist_id);
		$data['title'] = 'Información del Artista';

		$this->load->view('partials/header', $data);
		$this->load->view('pages/artists/show', $data);
		$this->load->view('partials/footer');
	}

	// Crear nuevo artista (formulario y procesamiento)
	public function create()
	{
		$data['title'] = 'Crear Artista';

		if ($this->input->post()) {
			$artist_data = [
				'name' => $this->input->post('name'),
				'genre' => $this->input->post('genre'),
				'country' => $this->input->post('country')
			];

			$this->artists_model->create_artist($artist_data);
			redirect('artist');
		} else {
			$this->load->view('partials/header', $data);
			$this->load->view('pages/artists/create', $data);
			$this->load->view('partials/footer');
		}
	}

	// Editar un artista (formulario y procesamiento)
	public function edit($artist_id)
	{
		$data['artist'] = $this->artists_model->get_artist_by_id($artist_id);
		$data['title'] = 'Editar Artista';

		if ($this->input->post()) {
			$artist_data = [
				'name' => $this->input->post('name'),
				'genre' => $this->input->post('genre'),
				'country' => $this->input->post('country')
			];

			$this->artists_model->update_artist($artist_id, $artist_data);
			redirect('artist');
		} else {
			$this->load->view('partials/header', $data);
			$this->load->view('pages/artists/edit', $data);
			$this->load->view('partials/footer');
		}
	}

	// Eliminar un artista
	public function delete($artist_id)
	{
		$this->artists_model->delete_artist($artist_id);
		redirect('artist');
	}
}
