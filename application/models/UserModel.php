<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create_user($user_data)
	{
		$this->db->insert('user', $user_data);
	}

	public function get_user_by_email($email)
	{
		$query = $this->db->get_where('user', ['email' => $email]);
		return $query->row_array();
	}
}
