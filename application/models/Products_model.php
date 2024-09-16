<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Products_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_products()
	{
		$query = $this->db->get('product');
		return $query->result();
	}
}
