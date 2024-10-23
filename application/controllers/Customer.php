<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CustomerModel');
		$this->load->helper('title_helper');
	}

	public function index()
	{
		$title = 'Clientes Registrados';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/customers/index', [
			'title' => $title,
			'customers' => $this->CustomerModel->get_customers_with_purchase_count()
		]);
		$this->load->view('partials/footer');
	}
}
