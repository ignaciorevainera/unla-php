<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchases extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('purchase_model');
	}

	// Método para mostrar todas las compras
	public function index()
	{
		$data['purchases'] = $this->purchase_model->get_all_purchases();
		$data['title'] = "Listado de Compras";
		$this->load->view('partials/header', [
			'title' => $data['title'],
		]);
		$this->load->view('pages/purchases/index', $data);
		$this->load->view('partials/footer');
	}
}
