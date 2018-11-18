<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	//Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('kategori_model');
	}

	//Listing data berita
	public function index()
	{
		$berita = $this->berita_model->listing();

		$data = array(	'title' 	=> 'Data Berita ('.count($berita).')',
						'berita'	=> $berita, 
					  	'isi'	  	=> 'admin/berita/list_berita'
					  );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah_berita()
	{


		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
				array('required' 	=> '%s harus diisi'
					));

		if($valid->run()===FALSE){
		// End Validasi

		$data = array(	'title' 	=> 'Tambah Berita',
						'kategori'	=> $kategori,
						'isi'	  	=> 'admin/berita/tambah_berita'   
					  );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i 		= $this->input;
			$data  	= array('nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'beritaname'			=> $i->post('beritaname'),
							'password'			=> sha1($i->post('password')),
							'akses_level'		=> $i->post('akses_level')
			);

			$this->berita_model->tambah_berita($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/berita'),'refresh');
		}
	}

	//Edit Berita
	public function edit_berita($id_berita)
	{
		$berita =$this->berita_model->detail($id_berita);
		
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
				array('required' 	=> '%s harus diisi'
					));

		$valid->set_rules('email','Email','required|valid_email',
				array('required' 	=> '%s harus diisi',
					  'valid_email'	=> 'Format %s tidak valid'
					));

		$valid->set_rules('password','Password','required|trim|min_length[6]',
				array('required' 	=> '%s harus diisi',
					  'min_length'	=> '%s minimal 6 karakter'
					 ));

		if($valid->run()===FALSE){
		// End Validasi

		$data = array(	'title' 	=> 'Edit Berita Administrator : '.$berita->nama,
						'berita'		=> $berita,
						'isi'	  	=> 'admin/berita/edit_berita'   
					  );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i 		= $this->input;
			$data  	= array('id_berita'			=> $id_berita,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'beritaname'			=> $i->post('beritaname'),
							'password'			=> sha1($i->post('password')),
							'akses_level'		=> $i->post('akses_level')
			);

			$this->berita_model->edit_berita($data);
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/berita'),'refresh');
		}
		// End masuk database
	}

	//Delete
	public function delete_berita($id_berita)
	{
		// Proteksi delete
		$this->check_login->check();

		$berita = $this->berita_model->detail($id_berita);
		$data = array('id_berita' => $berita->id_berita );
		$this->berita_model->delete_berita($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/berita'),'refresh');
	}

}