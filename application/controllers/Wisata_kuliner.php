<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_kuliner extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'Wisata_kuliner/list_wisata_kuliner');

		$this->load->view('layout/wisata_kuliner/wrapper', $data, FALSE);
	}
}
