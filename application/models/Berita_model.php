<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	//Load database
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Listing data berita
	public function listing()
	{
		$this->db->select('berita.*,
						   kategori.nama_kategori, 
						   kategori.slug_kategori,
						   user.nama');
		$this->db->from('berita');
		//Join
		$this->db->join(
			'kategori','kategori.id_kategori = berita.id_kategori','LEFT');
		$this->db->join(
			'user','user.id_user = berita.id_user','LEFT');
		//End join
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail berita
	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}

	//Login berita
	public function login($beritaname,$password)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where(array('beritaname'	=>	$beritaname,
							   'password'	=>	sha1($password)));
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah/insert data
	public function tambah_berita($data)
	{
		$this->db->insert('berita',$data);
	}

	//Edit/update berita
	public function edit_berita($data)
	{
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}

	//Edit/update berita
	public function delete_berita($data)
	{
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}

}  