<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	//Load database
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	//Listing data kategori
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail kategori
	public function detail($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori',$id_kategori);
		$this->db->order_by('id_kategori');
		$query = $this->db->get();
		return $query->row();
	}

	//Tambah/insert data
	public function tambah_kategori($data)
	{
		$this->db->insert('kategori',$data);
	}

	//Edit/update kategori
	public function edit_kategori($data)
	{
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->update('kategori',$data);
	}

	//Edit/update kategori
	public function delete_kategori($data)
	{
		$this->db->where('id_kategori',$data['id_kategori']);
		$this->db->delete('kategori',$data);
	}

}  