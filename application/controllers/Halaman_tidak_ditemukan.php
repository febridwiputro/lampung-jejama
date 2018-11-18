<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Halaman_tidak_ditemukan extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'halaman_tidak_ditemukan/list_halaman_tidak_ditemukan');

		$this->load->view('layout/wrapper', $data, FALSE);
	}
}