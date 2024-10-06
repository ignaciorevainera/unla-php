<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artists_model extends CI_Model
{
	// Constructor
	public function __construct()
	{
		$this->load->database();
	}

	// Obtener todos los artistas
	public function get_all_artists()
	{
		$query = $this->db->get('artist');
		return $query->result();
	}

	// Obtener un artista por su ID
	public function get_artist_by_id($artist_id)
	{
		$query = $this->db->get_where('artist', ['artist_id' => $artist_id]);
		return $query->row();
	}

	// Crear un nuevo artista
	public function create_artist($data)
	{
		return $this->db->insert('artist', $data);
	}

	// Actualizar un artista
	public function update_artist($artist_id, $data)
	{
		$this->db->where('artist_id', $artist_id);
		return $this->db->update('artist', $data);
	}

	// Eliminar un artista
	public function delete_artist($artist_id)
	{
		$this->db->where('artist_id', $artist_id);
		return $this->db->delete('artist');
	}
}
