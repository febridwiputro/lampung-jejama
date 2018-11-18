<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	//Listing data user
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(	'title' 	=> 'Data User Administrator ('.count($user).')',
						'user'		=> $user, 
					  	'isi'	  	=> 'admin/user/list_user'
					  );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Tambah
	public function tambah_user()
	{
		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required',
				array('required' 	=> '%s harus diisi'
					));

		$valid->set_rules('email','Email','required|valid_email',
				array('required' 	=> '%s harus diisi',
					  'valid_email'	=> 'Format %s tidak valid'
					));

		$valid->set_rules('username','Username','required|trim|min_length[5]|max_length[32]|is_unique[user.username]',
				array('required' 	=> '%s harus diisi',
					  'min_length'	=> '%s minimal 6 karakter',
					  'max_length'	=> '%s maksimal 32 karakter',
					  'is_unique'	=> '%s <strong>'.$this->input->post('username').
					  				   '</strong> sudah digunakan. Buat username baru!'
					));

		$valid->set_rules('password','Password','required|trim|min_length[6]',
				array('required' 	=> '%s harus diisi',
					  'min_length'	=> '%s minimal 6 karakter'
					 ));

		if($valid->run()===FALSE){
		// End Validasi

		$data = array(	'title' 	=> 'Tambah User Administrator',
						'isi'	  	=> 'admin/user/tambah_user'   
					  );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i 		= $this->input;
			$data  	= array('nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							'akses_level'		=> $i->post('akses_level')
			);

			$this->user_model->tambah_user($data);
			$this->session->set_flashdata('sukses','Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
	}

	//Edit User
	public function edit_user($id_user)
	{
		$user =$this->user_model->detail($id_user);
		
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

		$data = array(	'title' 	=> 'Edit User Administrator : '.$user->nama,
						'user'		=> $user,
						'isi'	  	=> 'admin/user/edit_user'   
					  );

		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i 		= $this->input;
			$data  	= array('id_user'			=> $id_user,
							'nama'				=> $i->post('nama'),
							'email'				=> $i->post('email'),
							'username'			=> $i->post('username'),
							'password'			=> sha1($i->post('password')),
							'akses_level'		=> $i->post('akses_level')
			);

			$this->user_model->edit_user($data);
			$this->session->set_flashdata('sukses','Data telah diupdate');
			redirect(base_url('admin/user'),'refresh');
		}
		// End masuk database
	}

	//Delete
	public function delete_user($id_user)
	{
		// Proteksi delete
		$this->check_login->check();

		$user = $this->user_model->detail($id_user);
		$data = array('id_user' => $user->id_user );
		$this->user_model->delete_user($data);
		$this->session->set_flashdata('sukses','Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}