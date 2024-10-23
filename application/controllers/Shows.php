<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shows extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ShowModel');
		$this->load->model('ArtistModel');
		$this->load->helper('url');
		$this->load->helper('title_helper');
	}

	public function index()
	{
		$title = 'Espectáculos';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/shows/index', [
			'title' => $title,
			'shows' => $this->ShowModel->get_all_shows() 
		]);
		$this->load->view('partials/footer');
	}
	public function create()
	{
		$this->check_admin();

		$title = 'Agregar espectáculo';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/shows/create', [
			'title' => $title,
			'artists' => $this->ArtistModel->get_all_artists()
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

		$this->ShowModel->add_new_show($show_data);
		redirect('shows');
	}

	public function show($show_id)
	{
		$show = $this->ShowModel->get_show_by_id($show_id);

		$title = "$show->artist_name";

		if ($show === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
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

		$title = "Editar espectáculo #$show_id";

		$show = $this->ShowModel->get_show_by_id($show_id);

		if ($show === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/shows/edit', [
			'title' => $title,
			'show' => $show,
			'artists' => $this->ArtistModel->get_all_artists()
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

		$this->ShowModel->update_show($show_id, $show_data);

		$available_quantity = $this->input->post('available_quantity');
		$date = $this->input->post('date');
		$current_date = date('Y-m-d');
		if ($date < $current_date) {
			$this->ShowModel->update_show($show_id, ['status' => 'expired']);
		} elseif ($available_quantity == 0) {
			$this->ShowModel->update_show($show_id, ['status' => 'sold_out']);
		}
		redirect('shows');
	}

	public function delete($show_id)
	{
		$this->check_admin();

		$this->ShowModel->delete_show($show_id);
		redirect('shows');
	}

	public function buy($show_id)
	{
		if (!$this->session->userdata('user')) {
			redirect('login_form');
		}

		$title = 'Comprar entradas';

		$this->load->view('partials/header', [
			'title' => $title,
		]);

		$show = $this->ShowModel->get_show($show_id);

		if ($show->status != 'available') {
			$this->session->set_flashdata('error', 'El show no está disponible.');
			redirect("shows/show/$show_id");
		}

		$this->load->view('pages/shows/buy', [
			'title' => $title,
			'show' => $show
		]);
		$this->load->view('partials/footer');
	}

	public function confirm_purchase()
	{
		if (!$this->session->userdata('user')) {
			redirect('login_form');
		}

		$title = 'Resultado de la compra';

		$show_id = $this->input->post('show_id');
		$quantity = $this->input->post('quantity');

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$show = $this->ShowModel->get_show($show_id);
		if ($show->status != 'available') {
			$data['message'] = 'Lo sentimos, el show no está disponible.';
			$data['success'] = false;
			$this->load->view('pages/shows/purchase_result', $data);
			return;
		}

		if ($quantity > $show->available_quantity) {
			$data['message'] = 'No hay suficientes entradas disponibles.';
			$data['success'] = false;
			$this->load->view('pages/shows/purchase_result', $data);
			return;
		}

		$this->load->model('PurchaseModel');
		$this->PurchaseModel->create_purchase([
			'user_id' => $this->session->userdata('user')['user_id'],
			'show_id' => $show_id,
			'quantity' => $quantity,
			'total_price' => $quantity * $show->price,
		]);

		$new_available_quantity = $show->available_quantity - $quantity;
		$status = $new_available_quantity == 0 ? 'sold_out' : $show->status;

		$this->ShowModel->update_show($show_id, [
			'available_quantity' => $new_available_quantity,
			'status' => $status
		]);

		$current_date = date('Y-m-d');
		if ($show->date < $current_date) {
			$this->ShowModel->update_show($show_id, ['status' => 'expired']);
		}

		$data['message'] = '¡Compra realizada con éxito! Has comprado ' . $quantity . ' entrada(s).';
		$data['success'] = true;
		$data['show'] = $show;

		$this->load->view('pages/shows/purchase_result', $data);
		$this->load->view('partials/footer');
	}

	private function check_admin()
	{
		$user = $this->session->userdata('user');
		if ($user['role_id'] != 1) {
			$this->session->set_flashdata('error', 'Acceso denegado. Solo los administradores pueden realizar esta acción.');
			redirect('shows');
		}
	}
}
