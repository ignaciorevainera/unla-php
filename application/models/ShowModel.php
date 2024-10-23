<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShowModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_shows()
	{
		$this->db->select('Show.*, Artist.name as artist_name');
		$this->db->from('Show');
		$this->db->join('Artist', 'Show.artist_id = Artist.artist_id');
		$this->db->order_by('Show.date', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_show_by_id($show_id)
	{
		$this->db->select('Show.*, Artist.name as artist_name');
		$this->db->from('Show');
		$this->db->join('Artist', 'Show.artist_id = Artist.artist_id');
		$this->db->where('Show.show_id', $show_id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_show($show_id)
	{
		return $this->db->get_where('show', ['show_id' => $show_id])->row();
	}

	public function add_new_show($show_data)
	{
		$this->db->insert('Show', $show_data);
	}

	public function update_show($show_id, $show_data)
	{
		$this->db->update('Show', $show_data, ['show_id' => $show_id]);
	}

	public function delete_show($show_id)
	{
		$this->db->delete('Show', ['show_id' => $show_id]);
	}
}
