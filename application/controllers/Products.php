<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('products_model');
	}

	public function index()
	{
		$title = 'Catálogo';

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/products.css'
		]);
		$this->load->view('pages/products/index', [
			'title' => $title,
			'products' => $this->products_model->get_all_products()
		]);
		$this->load->view('partials/footer');
	}

	public function create()
	{
		$title = 'Agregar Producto';
		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/products.css'
		]);
		$this->load->view('pages/products/create', [
			'title' => $title
		]);
		$this->load->view('partials/footer');
	}

	public function store()
	{
		$product_data = [
			'brand' => $this->input->post('brand'),
			'model' => $this->input->post('model'),
			'operating_system' => $this->input->post('operating_system'),
			'storage_capacity' => $this->input->post('storage_capacity'),
			'ram_capacity' => $this->input->post('ram_capacity'),
			'screen_size' => $this->input->post('screen_size'),
			'battery_capacity' => $this->input->post('battery_capacity'),
			'camera_resolution' => $this->input->post('camera_resolution'),
			'stock' => $this->input->post('stock'),
			'price' => $this->input->post('price')
		];

		$this->products_model->add_new_product($product_data);
		redirect('products');
	}

	public function show($id)
	{
		$title = 'Producto #' . $id;
		$product = $this->products_model->get_product_by_id($id);
		if ($product === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/products.css'
		]);
		$this->load->view('pages/products/show', [
			'title' => $title,
			'product' => $product
		]);
		$this->load->view('partials/footer');
	}

	public function edit($id)
	{
		$title = 'Editar Producto #' . $id;
		$product = $this->products_model->get_product_by_id($id);
		if ($product === null) {
			show_404();
		}

		$this->load->view('partials/header', [
			'title' => $title,
			'css_file' => '/products.css'
		]);
		$this->load->view('pages/products/edit', [
			'title' => $title,
			'product' => $product
		]);
		$this->load->view('partials/footer');
	}

	public function update($id)
	{
		$product_data = [
			'brand' => $this->input->post('brand'),
			'model' => $this->input->post('model'),
			'operating_system' => $this->input->post('operating_system'),
			'storage_capacity' => $this->input->post('storage_capacity'),
			'ram_capacity' => $this->input->post('ram_capacity'),
			'screen_size' => $this->input->post('screen_size'),
			'battery_capacity' => $this->input->post('battery_capacity'),
			'camera_resolution' => $this->input->post('camera_resolution'),
			'stock' => $this->input->post('stock'),
			'price' => $this->input->post('price')
		];

		$this->products_model->update_product($id, $product_data);
		redirect('products');
	}

	public function delete($id)
	{
		$this->products_model->delete_product($id);
		redirect('products');
		redirect('products');
	}
}
