<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MWelcome extends CI_Model {

	public function get_data()
	{
		return $data_diri = array(
			'nama'    => 'Fatih', 
			'alamat'  => 'Depok', 
			'sekolah' => 'IDN'
		);
	}

}

/* End of file MWelcome.php */
/* Location: ./application/models/MWelcome.php */