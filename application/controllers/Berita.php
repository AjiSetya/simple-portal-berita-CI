<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MBerita');
	}

	public function index()
	{
		$data['data_berita'] = $this->MBerita->get_berita();
		$this->load->view('berita/tampil_berita', $data);
	}

	public function hapus_data($id)
	{
		$hapus = $this->MBerita->hapus_data($id);

		if ($hapus) {
			$this->session->set_flashdata('sukses', 'Data berhasil dihapus');
			redirect('berita');
		} else {
			$this->session->set_flashdata('gagal', 'Data gagal dihapus');
			redirect('berita');
		}
	}

	public function tambah_berita()
	{
		$this->load->view('berita/tambah_berita');
	}

	public function simpan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$config['upload_path'] = './img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('img_news')){
			$this->session->set_flashdata('gagal', $this->upload->display_errors());
			redirect('berita');
		}
		else{

			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$data = array(
				'judul'    => $this->input->post('judul'), 
				'berita'   => $this->input->post('berita'), 
				'kategori' => $this->input->post('kategori'), 
				'gambar'   => $file_name, 
				'status'   => $this->input->post('status'),
				'waktu'    => date("Y-m-d H:i:s")
			);

			$simpan = $this->MBerita->simpan($data);

			if ($simpan) {
				$this->session->set_flashdata('sukses', 'Data berhasil disimpan');
				redirect('berita');
			} else {
				$this->session->set_flashdata('gagal', 'Data gagal disimpan');
				redirect('berita');
			}
		}
		
	}

	public function edit_data()
	{
		$id = $this->uri->segment(3);
		$data['data_update'] = $this->MBerita->get_data_byid($id);

		$this->load->view('berita/edit_berita', $data);
	}

	public function update($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$config['upload_path'] = './img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('img_news')){
			$this->session->set_flashdata('gagal', $this->upload->display_errors());
			redirect('berita');
		}
		else{
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];

			$data = array(
				'judul'    => $this->input->post('judul'), 
				'berita'   => $this->input->post('berita'), 
				'kategori' => $this->input->post('kategori'), 
				'gambar'   => $file_name, 
				'status'   => $this->input->post('status'),
				'waktu'    => date("Y-m-d H:i:s"),
				'id'       => $id
			);

			$simpan = $this->MBerita->update($data);

			if ($simpan) {
				$this->session->set_flashdata('sukses', 'Data berhasil diperbarui');
				redirect('berita');
			} else {
				$this->session->set_flashdata('gagal', 'Data gagal diperbarui');
				redirect('berita');
			}
		}
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */