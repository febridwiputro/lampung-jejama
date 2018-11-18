<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang_kami extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'Tentang_kami/list_tentang_kami');

		$this->load->view('layout/tentang_kami/wrapper', $data, FALSE);
	}
}
