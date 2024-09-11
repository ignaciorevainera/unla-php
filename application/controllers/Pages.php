<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	public function home()
	{
		$data['title'] = 'Inicio';
		$css_file = 'home.css';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/home/index', $data);
		$this->load->view('partials/footer');
	}

	public function catalog()
	{
		$data['title'] = 'Catálogo';
		$css_file = 'catalog.css';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/catalog/index', $data);
		$this->load->view('partials/footer');
	}

	public function about()
	{
		$data['title'] = 'Sobre Nosotros';
		$css_file = 'about.css';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/about/index', $data);
		$this->load->view('partials/footer');
	}

	public function contact()
	{
		$data['title'] = 'Contacto';
		$css_file = 'contact.css';
		$this->load->view('partials/header', $data);
		$this->load->view('pages/contact/index', $data);
		$this->load->view('partials/footer');
	}
}
