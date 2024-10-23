<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CustomerModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_customers_with_purchase_count()
	{
		$this->db->select('user.role_id, user.email, user.created_at, COUNT(purchase.purchase_id) AS total_purchases');
		$this->db->from('user');
		$this->db->join('purchase', 'purchase.user_id = user.user_id', 'left');
		$this->db->group_by('user.user_id');
		$query = $this->db->get();

		return $query->result();
	}
}
