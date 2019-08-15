<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// echo 'Hello World!';
		// 
		/*$data['nama']    = 'Fatih';
		$data['alamat']  = 'Depok';
		$data['sekolah'] = 'IDN';*/

		// memanggil model dan memanggil function di model
		$this->load->model('MWelcome');
		$data = $this->MWelcome->get_data();

		$this->load->view('test', $data);
	}
}
