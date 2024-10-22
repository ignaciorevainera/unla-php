<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

	public function home()
	{
		$this->load->view('partials/header');
		$this->load->view('pages/home/index');
		$this->load->view('partials/footer');
	}

	public function faqs()
	{
		$this->load->view('partials/header');
		$this->load->view('pages/faqs/index');
		$this->load->view('partials/footer');
	}
}
