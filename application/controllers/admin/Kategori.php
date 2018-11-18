<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Kategori extends CI_Controller
{
	//Load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}

	//Main page kategori
	public function index()
	{
		$kategori 	= $this->kategori_model->listing();

		//Validasi
		$this->form_validation->set_rules('nama_kategori','Nama kategori','required|is_unique[kategori.nama_kategori]',
			array('required'	=> '%s harus diisi',
				  'is_unique'	=> '%s <strong>'.$this->input->post('nama_kategori').
				  '</strong> sudah ada. Buat kategori baru!'));

		if($this->form_validation->run() === FALSE){
		//end validasi

		$data		= array('title'		=> 'Data kategori berita ('.count($kategori).')',
							'kategori'	=> $kategori,
							'isi'		=> 'admin/kategori/list_kategori'
							);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//Masuk Database
		}else{
			$i 				= $this->input;

			$slug_kategori	= url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data  	= array('slug_kategori'		=> $slug_kategori,
							'nama_kategori'		=> $i->post('nama_kategori'),
							'urutan'			=> $i->post('urutan')
			);

			$this->kategori_model->tambah_kategori($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/kategori'),'refresh');
		}
		// end masuk database
	}

	//Edit kategori
	public function edit_kategori($id_kategori)
	{
		$kategori 	= $this->kategori_model->detail($id_kategori);

		//Validasi
		$this->form_validation->set_rules('nama_kategori','Nama kategori','required',
			array('required'	=> '%s harus diisi'));

		if($this->form_validation->run() === FALSE){
		//end validasi

		$data		= array('title'		=> 'Edit kategori berita ('.count($kategori).')',
							'kategori'	=> $kategori,
							'isi'		=> 'admin/kategori/edit_kategori'
							);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//Masuk Database
		}else{
			$i 				= $this->input;

			$slug_kategori	= url_title($this->input->post('nama_kategori'), 'dash', TRUE);

			$data  	= array('id_kategori'	 	=> $id_kategori,
							'slug_kategori'		=> $slug_kategori,
							'nama_kategori'		=> $i->post('nama_kategori'),
							'urutan'			=> $i->post('urutan')
			);

			$this->kategori_model->edit_kategori($data);
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/kategori'),'refresh');
		}
		// end masuk database
	}

	// Delete
	public function delete_kategori($id_kategori)
	{
		// Proteksi delete
		$this->check_login->check();

		$user = $this->kategori_model->detail($id_kategori);
		$data = array('id_kategori' => $user->id_kategori);
		$this->kategori_model->delete_kategori($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}
}