<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'beranda/list');

		$this->load->view('layout/beranda/wrapper', $data, FALSE);
	}
}