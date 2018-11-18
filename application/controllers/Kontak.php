<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'Kontak/list_kontak');

		$this->load->view('layout/kontak/wrapper', $data, FALSE);
	}
}
