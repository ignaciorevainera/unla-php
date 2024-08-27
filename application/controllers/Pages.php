<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	public function home()
	{
		$data['title'] = 'Inicio';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/home/index', $data);
		$this->load->view('partials/footer');
	}

	public function catalog()
	{
		$data['title'] = 'Catálogo';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/catalog/index', $data);
		$this->load->view('partials/footer');
	}

	public function about()
	{
		$data['title'] = 'Sobre Nosotros';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/about/index', $data);
		$this->load->view('partials/footer');
	}

	public function services()
	{
		$data['title'] = 'Servicios';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/services/index', $data);
		$this->load->view('partials/footer');
	}

	public function contact()
	{
		$data['title'] = 'Contacto';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/contact/index', $data);
		$this->load->view('partials/footer');
	}
}
