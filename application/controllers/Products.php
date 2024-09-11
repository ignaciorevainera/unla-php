<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
	public function index()
	{
		$this->load->view('partials/header', [
			'title' => 'Catálogo',
			'css_file' => '/products.css'
		]);
		$this->load->view('pages/products/index');
		$this->load->view('partials/footer');
	}

	public function create()
	{
		echo 'products/create';
	}

	public function store() {}

	public function show($id)
	{
		echo "products/show/$id";
	}

	public function edit($id)
	{
		echo "products/edit/$id";
	}

	public function update($id) {}

	public function delete($id) {}
}
