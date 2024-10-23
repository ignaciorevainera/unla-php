<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Show extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['ShowModel', 'ArtistModel']);
		$this->load->helper(['url', 'title_helper', 'badge_helper']);
	}

	public function index()
	{
		$this->load_views('Espectáculos', 'pages/shows/index', [
			'shows' => $this->ShowModel->get_all_shows()
		]);
	}

	public function create()
	{
		$this->check_admin();
		$this->load_views('Agregar espectáculo', 'pages/shows/create', [
			'artists' => $this->ArtistModel->get_all_artists()
		]);
	}

	public function store()
	{
		$this->check_admin();
		$show_data = $this->input->post([
			'name',
			'description',
			'date',
			'time',
			'price',
			'total_quantity',
			'available_quantity',
			'status',
			'artist_id'
		]);

		$this->ShowModel->add_new_show($show_data);
		redirect('shows');
	}

	public function show($show_id)
	{
		$show = $this->ShowModel->get_show_by_id($show_id);
		if (!$show) show_404();

		$this->load_views("$show->artist_name", 'pages/shows/show', ['show' => $show]);
	}

	public function edit($show_id)
	{
		$this->check_admin();
		$show = $this->ShowModel->get_show_by_id($show_id);
		if (!$show) show_404();

		$this->load_views("Editar espectáculo #$show_id", 'pages/shows/edit', [
			'show' => $show,
			'artists' => $this->ArtistModel->get_all_artists()
		]);
	}

	public function update($show_id)
	{
		$this->check_admin();
		$show_data = $this->input->post([
			'name',
			'description',
			'date',
			'time',
			'price',
			'total_quantity',
			'available_quantity',
			'status',
			'artist_id'
		]);

		$this->ShowModel->update_show($show_id, $show_data);

		$this->update_status($show_id);
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
		$this->check_user_logged_in();

		$show = $this->ShowModel->get_show($show_id);
		if ($show->status != 'available') {
			$this->session->set_flashdata('error', 'El show no está disponible.');
			redirect("shows/show/$show_id");
		}

		$this->load_views('Comprar entradas', 'pages/shows/buy', ['show' => $show]);
	}

	public function confirm_purchase()
	{
		$this->check_user_logged_in();
		$show_id = $this->input->post('show_id');
		$quantity = $this->input->post('quantity');

		$show = $this->ShowModel->get_show($show_id);
		if ($show->status != 'available') {
			$this->purchase_result('Lo sentimos, el show no está disponible.', false);
			return;
		}

		if ($quantity > $show->available_quantity) {
			$this->purchase_result('No hay suficientes entradas disponibles.', false);
			return;
		}

		$this->process_purchase($show, $quantity);
		$this->purchase_result('¡Compra realizada con éxito! Has comprado ' . $quantity . ' entrada(s).', true, $show);
	}

	private function check_admin()
	{
		$user = $this->session->userdata('user');
		if ($user['role_id'] != 1) {
			$this->session->set_flashdata('error', 'Acceso denegado. Solo los administradores pueden realizar esta acción.');
			redirect('shows');
		}
	}

	private function check_user_logged_in()
	{
		if (!$this->session->userdata('user')) {
			redirect('login_form');
		}
	}

	private function load_views($title, $view, $data = [])
	{
		$data['title'] = $title;
		$this->load->view('partials/header', $data);
		$this->load->view($view, $data);
		$this->load->view('partials/footer');
	}

	private function purchase_result($message, $success, $show = null)
	{
		$data = ['message' => $message, 'success' => $success, 'show' => $show];
		$this->load_views('Resultado de la compra', 'pages/shows/purchase_result', $data);
	}

	private function process_purchase($show, $quantity)
	{
		$this->load->model('PurchaseModel');
		$this->PurchaseModel->create_purchase([
			'user_id' => $this->session->userdata('user')['user_id'],
			'show_id' => $show->show_id,
			'quantity' => $quantity,
			'total_price' => $quantity * $show->price,
		]);

		$new_available_quantity = $show->available_quantity - $quantity;
		$status = $new_available_quantity == 0 ? 'sold_out' : $show->status;

		$this->ShowModel->update_show($show->show_id, [
			'available_quantity' => $new_available_quantity,
			'status' => $status
		]);

		if ($show->date < date('Y-m-d')) {
			$this->ShowModel->update_show($show->show_id, ['status' => 'expired']);
		}
	}

	private function update_status($show_id)
	{
		$show = $this->ShowModel->get_show_by_id($show_id);
		$current_date = date('Y-m-d');

		if ($show->date < $current_date) {
			$this->ShowModel->update_show($show_id, ['status' => 'expired']);
		} elseif ($show->available_quantity == 0) {
			$this->ShowModel->update_show($show_id, ['status' => 'sold_out']);
		}
	}
}
