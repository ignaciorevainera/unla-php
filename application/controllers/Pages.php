<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('title_helper');
	}

	public function home()
	{
		$title = 'TicketMaster';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view(
			'pages/home/index',
			[
				'title' => $title
			]
		);
		$this->load->view('partials/footer');
	}

	public function faqs()
	{
		$title = 'Preguntas Frecuentes';

		$this->load->view('partials/header', [
			'title' => $title,
		]);
		$this->load->view('pages/faqs/index', [
			'title' => $title,
		]);
		$this->load->view('partials/footer');
	}
}
