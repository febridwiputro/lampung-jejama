<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_buatan extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'Wisata_buatan/list_wisata_buatan');

		$this->load->view('layout/wisata_buatan/wrapper', $data, FALSE);
	}
}