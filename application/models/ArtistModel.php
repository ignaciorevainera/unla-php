<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArtistModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_artists()
	{
		$query = $this->db->get('Artist'); 
		return $query->result();  
	}

	public function get_artist_by_id($id)
	{
		$this->db->select('Artist.artist_id, Artist.name, Artist.country, Artist.genre');
		$this->db->from('Artist');
		$this->db->where('Artist.artist_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function add_new_artist($artist_data)
	{
		$this->db->insert('Artist', $artist_data);
	}

	public function update_artist($artist_id, $artist_data)
	{
		$this->db->update('Artist', $artist_data, ['artist_id' => $artist_id]);
	}

	public function delete_artist($artist_id)
	{
		$this->db->delete('Artist', ['artist_id' => $artist_id]);
	}
}
