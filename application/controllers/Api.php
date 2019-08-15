<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// load model MApi
		$this->load->model('MApi');
	}

	public function index()
	{
		echo "Hello World !";
	}

	public function showData()
	{
		// variable untuk menampung value json
		$response = array();

		// siapkan variabe untuk menampung data
		// yg diambil dari model
		$data_berita = $this->MApi->getData();

		// cek apakah datanya kosong apa enggak
		if ($data_berita->num_rows() > 0) {
			$response['pesan'] = '';
			$response['data'] = $data_berita->result();
			$response['hasil'] = true;
		} else {
			$response['pesan'] = 'Data kosong';
			$response['data'] = '';
			$response['hasil'] = false;
		}
		
		echo json_encode($response);
	}

	public function insertData()
	{
		$response = array();
		date_default_timezone_set('Asia/Jakarta');
		$config['upload_path'] = './img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('user_file')){
			// tampilkan pesan gagal upload
			$response['pesan'] = 'Gagal menyimpan gambar ' . $this->upload->display_errors();
			$response['hasil'] = false;

			echo json_encode($response);
		} else{
			$data_upload = $this->upload->data();
			$nama_gambar = $data_upload['file_name'];

			// tampilkan pesan berhasil
			// terima data dari client
			$judul = $this->input->post('judul');
			$berita = $this->input->post('berita');
			$kategori = $this->input->post('kategori');
			$status = $this->input->post('status');
			$waktu = date('Y-m-d H:i:s');
			$gambar = $nama_gambar;

			$simpan_data = $this->MApi->insertData($judul, $berita, $kategori, $status, $waktu, $gambar);

			
			if ($simpan_data) {
				$response['pesan'] = 'Data berhasil disimpan';
				$response['hasil'] = true;
			} else {
				$response['pesan'] = 'Gagal menyimpan data, coba lagi';
				$response['hasil'] = false;
			}
			
			echo json_encode($response);
		}
			
	}

	public function updateData($id)
	{
		$response = array();
		date_default_timezone_set('Asia/Jakarta');
		$config['upload_path'] = './img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('user_file')){
			// tampilkan pesan gagal upload
			$response['pesan'] = 'Gagal menyimpan gambar ' . $this->upload->display_errors();
			$response['hasil'] = false;

			echo json_encode($response);
		} else{
			$data_upload = $this->upload->data();
			$nama_gambar = $data_upload['file_name'];

			// tampilkan pesan berhasil
			// terima data dari client
			$judul = $this->input->post('judul');
			$berita = $this->input->post('berita');
			$kategori = $this->input->post('kategori');
			$status = $this->input->post('status');
			$waktu = date('Y-m-d H:i:s');
			$gambar = $nama_gambar;

			// hapus file gambar sebelumnya yang ada di dalam server
			// masukkan data baru
			$get_berita = $this->MApi->getBeritaById($id);
			$row = $get_berita->row();
			$img_before = $row->img;
			$path_img = './img/' . $img_before;
			unlink($path_img);

			$simpan_data = $this->MApi->updateData($judul, $berita, $kategori, $status, $waktu, $gambar, $id);

			
			if ($simpan_data) {
				$response['pesan'] = 'Data berhasil diperbarui';
				$response['hasil'] = true;
			} else {
				$response['pesan'] = 'Gagal memperbarui data, coba lagi';
				$response['hasil'] = false;
			}
			
			echo json_encode($response);
		}
	}

	public function deleteData($id)
	{
		// menghapus gambar yang ada di server
		$get_berita = $this->MApi->getBeritaById($id);
		$row = $get_berita->row();
		$img_before = $row->img;
		$path_img = './img/' . $img_before;

		// menghapus data dari database
		$response = array();
		if (unlink($path_img)) {
		 	$hapus_data = $this->MApi->deleteData($id);

		 	if ($hapus_data) {
		 		$response['pesan'] = 'Data berhasil dihapus';
		 		$response['hasil'] = true;
		 	} else {
		 		$response['pesan'] = 'Data gagal dihapus';
		 		$response['hasil'] = true;
		 	}

		 	echo json_encode($response);
		 	
		 } else {
		 	$response['pesan'] = 'Data gagal dihapus';
		 	$response['hasil'] = true;

		 	echo json_encode($response);
		 }
	}

	public function loginUser()
	{
		// terima data dari client
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$passwordecrp = md5($password);

		$cek_user = $this->MApi->cekEmailPassword($email, $passwordecrp);

		// jika data berhasil ditemukan berdasarkan email dan password
		// tampilkan hasil true
		$response = array();
		if ($cek_user->num_rows() > 0) {
			$response['pesan'] = '';
			$response['hasil'] = true;
		} else {
			$response['pesan'] = 'Gagal login, coba lagi';
			$response['hasil'] = false;
		}

		echo json_encode($response);
	}

	public function registerUser()
	{
		$email = $this->input->post('email');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$level = $this->input->post('level');
		$passwordecrp = md5($password);

		$simpan_data = $this->MApi->insertNewUser($email, $nama, $passwordecrp, $alamat, $level);

		$response = array();

		if ($simpan_data) {
			$response['pesan'] = 'Berhasil register';
			$response['hasil'] = true;
		} else {
			$response['pesan'] = 'Gagal register';
			$response['hasil'] = false;
		}

		echo json_encode($response);
		
	}
	
}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */