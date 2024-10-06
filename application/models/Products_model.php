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

	public function get_product_by_id($id)
	{
		$query = $this->db->get_where('product', ['id' => $id]);
		return $query->row();
	}

	public function add_new_product($product_data)
	{
		$this->db->insert('product', $product_data);
	}

	public function update_product($id, $product_data)
	{
		$this->db->update('product', $product_data, ['id' => $id]);
	}

	public function delete_product($id)
	{
		$this->db->delete('product', ['id' => $id]);
	}
}
