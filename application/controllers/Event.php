<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'event/list_event');

		$this->load->view('layout/event/wrapper', $data, FALSE);
	}
}
