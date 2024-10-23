<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artists extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ArtistModel');
		$this->load->helper('url');
		$this->load->helper('title_helper');
	}

	public function index()
	{
		$title = 'Artistas';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/artists/index', [
			'artists' => $this->ArtistModel->get_all_artists()
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

		$this->ArtistModel->add_new_artist($artist_data);
		redirect('artists');
	}

	public function show($artist_id)
	{
		$title = "Artista #$artist_id";

		$artist = $this->ArtistModel->get_artist_by_id($artist_id);

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

		$artist = $this->ArtistModel->get_artist_by_id($artist_id);

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

		$this->ArtistModel->update_artist($artist_id, $artist_data);
		redirect('artists');
	}
	public function delete($artist_id)
	{
		$this->check_admin();

		$shows = $this->db->select('show_id')->from('show')->where('artist_id', $artist_id)->get()->result_array();

		if (!empty($shows)) {
			$show_ids = array_column($shows, 'show_id');

			$this->db->where_in('show_id', $show_ids);
			$this->db->delete('purchase');

			$this->db->where('artist_id', $artist_id);
			$this->db->delete('show');
		}

		$this->db->where('artist_id', $artist_id);
		$this->db->delete('artist');

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
}
