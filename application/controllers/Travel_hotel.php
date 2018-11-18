 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_hotel extends CI_Controller {

	public function index()
	{
		$data = array('title' => 'lampungjejama - The Secret of Sumatera', 
					  'isi'	  => 'Travel_hotel/list_travel_hotel');

		$this->load->view('layout/travel_hotel/wrapper', $data, FALSE);
	}
}
