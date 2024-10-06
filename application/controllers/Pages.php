<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
	public function about()
	{
		$this->load->view('partials/header', [
			'title' => 'Sobre Nosotros',
			'css_file' => 'about.css'
		]);
		$this->load->view('pages/about/index');
		$this->load->view('partials/footer');
	}

	public function contact()
	{
		$this->load->view('partials/header', [
			'title' => 'Contacto',
			'css_file' => 'contact.css'
		]);
		$this->load->view('pages/contact/index');
		$this->load->view('partials/footer');
	}
}
