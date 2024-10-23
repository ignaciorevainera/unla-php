<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PurchaseModel');
		$this->load->helper('title_helper');
	}

	public function index()
	{
		$this->load_views('Compras', 'pages/purchases/index', [
			'purchases' => $this->PurchaseModel->get_all_purchases()
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
