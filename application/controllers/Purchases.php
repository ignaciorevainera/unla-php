<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchases extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PurchaseModel');
		$this->load->helper('title_helper');
	}

	public function index()
	{
		$title = 'Lista de Ventas';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/purchases/index', [
			'title' => $title,
			'purchases' => $this->PurchaseModel->get_all_purchases()
		]);
		$this->load->view('partials/footer');
	}
}
