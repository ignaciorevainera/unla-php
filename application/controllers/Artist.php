<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artist extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ArtistModel');
		$this->load->helper(['url', 'title_helper']);
	}

	public function index()
	{
		$this->load_views('Artistas', 'pages/artists/index', [
			'artists' => $this->ArtistModel->get_all_artists()
		]);
	}

	public function create()
	{
		$this->check_admin();
		$this->load_views('Agregar artista', 'pages/artists/create');
	}

	public function store()
	{
		$this->check_admin();
		$artist_data = $this->input->post(['name', 'genre', 'country']);
		$this->ArtistModel->add_new_artist($artist_data);
		redirect('artists');
	}

	public function show($artist_id)
	{
		$artist = $this->ArtistModel->get_artist_by_id($artist_id);
		if (!$artist) show_404();

		$this->load_views("Artista #$artist_id", 'pages/artists/show', ['artist' => $artist]);
	}

	public function edit($artist_id)
	{
		$this->check_admin();
		$artist = $this->ArtistModel->get_artist_by_id($artist_id);
		if (!$artist) show_404();

		$this->load_views("Editar artista #$artist_id", 'pages/artists/edit', ['artist' => $artist]);
	}

	public function update($artist_id)
	{
		$this->check_admin();
		$artist_data = $this->input->post(['name', 'genre', 'country']);
		$this->ArtistModel->update_artist($artist_id, $artist_data);
		redirect('artists');
	}

	public function delete($artist_id)
	{
		$this->check_admin();

		$this->delete_related_shows_and_purchases($artist_id);

		$this->db->delete('artist', ['artist_id' => $artist_id]);

		$this->session->set_flashdata('message', 'Artista y shows eliminados correctamente.');
		redirect('artists');
	}

	private function check_admin()
	{
		$user = $this->session->userdata('user');
		if ($user['role_id'] != 1) {
			$this->session->set_flashdata('error', 'Acceso denegado. Solo los administradores pueden realizar esta acción.');
			redirect('artists');
		}
	}

	private function load_views($title, $view, $data = [])
	{
		$data['title'] = $title;
		$this->load->view('partials/header', $data);
		$this->load->view($view, $data);
		$this->load->view('partials/footer');
	}

	private function delete_related_shows_and_purchases($artist_id)
	{
		$shows = $this->db->select('show_id')->from('show')->where('artist_id', $artist_id)->get()->result_array();
		if (!empty($shows)) {
			$show_ids = array_column($shows, 'show_id');
			$this->db->where_in('show_id', $show_ids)->delete('purchase');
			$this->db->where_in('show_id', $show_ids)->delete('show');
		}
	}
}
