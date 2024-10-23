<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PurchaseModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create_purchase($data)
	{
		$this->db->insert('purchase', $data);
	}

	public function get_all_purchases()
	{
		$this->db->select('purchase.*, user.email, show.name as show_name, artist.name as artist_name');
		$this->db->from('purchase');
		$this->db->join('user', 'user.user_id = purchase.user_id');
		$this->db->join('show', 'show.show_id = purchase.show_id');
		$this->db->join('artist', 'artist.artist_id = show.artist_id');
		$this->db->order_by('purchase.purchase_date', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
}
