<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Profil extends CI_Controller
{
	//Load model
	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//Update profile
	public function index()
	{
		$id_user 	= $this->session->userdata('id_user');
		$user 		= $this->user_model->detail($id_user);

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

		$data = array(	'title' 	=> 'Update Profil : '.$user->nama,
						'user'		=> $user,
						'isi'	  	=> 'admin/profil/list_profil'   
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
			$this->session->set_flashdata('sukses','Profil telah diupdate');
			redirect(base_url('admin/profil'),'refresh');
		}
		// End masuk database
	}

	
}