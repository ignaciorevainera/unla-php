<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shows extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('shows_model');
	}

	public function index()
	{
		$title = 'Todos nuestros espectáculos';

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
		$title = 'Agregar espectáculo';
		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/add-show.css'
		]);
		$this->load->view('pages/shows/create', [
			'title' => $title
		]);
		$this->load->view('partials/footer');
	}

	public function store()
	{
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

	public function show($id)
	{
		$title = 'Show #' . $id;
		$show = $this->shows_model->get_show_by_id($id);
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

	public function edit($id)
	{
		$title = 'Editar show #' . $id;
		$show = $this->shows_model->get_show_by_id($id);
		if ($show === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/edit-show.css'
		]);
		$this->load->view('pages/shows/edit', [
			'title' => $title,
			'show' => $show
		]);
		$this->load->view('partials/footer');
	}

	public function update($id)
	{
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

		$this->shows_model->update_show($id, $show_data);
		redirect('shows');
	}

	public function delete($id)
	{
		$this->shows_model->delete_show($id);
		redirect('shows');
	}
}
