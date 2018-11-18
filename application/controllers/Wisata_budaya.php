<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_budaya extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'Wisata_budaya/list_wisata_budaya');

		$this->load->view('layout/wrapper', $data, FALSE);
	}
}
