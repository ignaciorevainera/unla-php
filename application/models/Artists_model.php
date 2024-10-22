<?php
defined('BASEPATH') or exit('No direct script access allowed');

class artists_model extends CI_Model
{
	// Constructor
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_all_artists()
	{
		// Obtener todos los artistas de la base de datos
		$query = $this->db->get('artist');  // Asumiendo que la tabla se llama 'artists'
		return $query->result();  // Retorna un array de objetos de artistas
	}

	public function get_artist_by_id($id)
	{
		$this->db->select('artist_id, name, country, genre');
		$this->db->from('artist');
		$this->db->where('artist_id', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function add_new_artist($artist_data)
	{
		$this->db->insert('artist', $artist_data);
	}

	// Actualizar un artista
	public function update_artist($artist_id, $artist_data)
	{
		$this->db->update('artist', $artist_data, ['artist_id' => $artist_id]);
	}

	// Eliminar un artista
	public function delete_artist($artist_id)
	{
		$this->db->delete('artist', ['artist_id' => $artist_id]);
	}
}
