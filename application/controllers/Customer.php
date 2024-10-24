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
		$this->load_views('Clientes', 'pages/customers/index', [
			'customers' => $this->CustomerModel->get_customers_with_purchase_count()
		]);
	}

	private function load_views($title, $view, $data = [])
	{
		$data['title'] = $title;
		$this->load->view('partials/header', $data);
		$this->load->view($view, $data);
		$this->load->view('partials/footer');
	}
}
