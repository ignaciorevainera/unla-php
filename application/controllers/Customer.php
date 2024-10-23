<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CustomerModel');
	}

	public function index()
	{
		// Cargar el modelo de usuario
		$this->load->model('CustomerModel');

		// Obtener la lista de clientes
		$data['customers'] = $this->CustomerModel->get_customers_with_purchase_count();

		// Título de la página
		$data['title'] = 'Clientes Registrados';

		// Cargar la vista
		$this->load->view('partials/header', [
			'title' => $data['title'],
		]);
		$this->load->view('pages/customers/index', $data);
		$this->load->view('partials/footer');
	}
}
