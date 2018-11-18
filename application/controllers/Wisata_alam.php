<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_alam extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'Wisata_alam/list_wisata_alam');

		$this->load->view('layout/wisata_alam/wrapper', $data, FALSE);
	}
}
