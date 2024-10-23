<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('title_helper');
	}

	public function home()
	{
		$this->load_views('TicketMaster', 'pages/home/index');
	}

	public function faqs()
	{
		$this->load_views('Preguntas Frecuentes', 'pages/faqs/index');
	}

	private function load_views($title, $view)
	{
		$data['title'] = $title;
		$this->load->view('partials/header', $data);
		$this->load->view($view, $data);
		$this->load->view('partials/footer');
	}
}
