<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MApi extends CI_Model {

	public function getData()
	{
		return $this->db->get('tb_news');
	}

	public function insertData($judul, $berita, $kategori, $status, $waktu, $gambar)
	{
		$data             = array();
		$data['title']    = $judul;
		$data['news']     = $berita;
		$data['category'] = $kategori;
		$data['status']   = $status;
		$data['datetime'] = $waktu;
		$data['img']      = $gambar;

		return $this->db->insert('tb_news', $data);
	}

	public function getBeritaById($id)
	{
		$this->db->where('id_news', $id);
		return $this->db->get('tb_news');
	}

	public function updateData($judul, $berita, $kategori, $status, $waktu, $gambar, $id)
	{
		$data             = array();
		$data['title']    = $judul;
		$data['news']     = $berita;
		$data['category'] = $kategori;
		$data['status']   = $status;
		$data['datetime'] = $waktu;
		$data['img']      = $gambar;

		$this->db->where('id_news', $id);
		return $this->db->update('tb_news', $data);
	}

	public function deleteData($id)
	{
		$this->db->where('id_news', $id);
		return $this->db->delete('tb_news');
	}

	public function cekEmailPassword($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);

		return $this->db->get('tb_users');
	}

	public function insertNewUser($email, $nama, $password, $alamat, $level)
	{
		$data_insert             = array();
		$data_insert['name']     = $nama;
		$data_insert['email']    = $email;
		$data_insert['password'] = $password;
		$data_insert['alamat']   = $alamat;
		$data_insert['level']    = $level;

		return $this->db->insert('tb_users', $data_insert);
	}

}

/* End of file MApi.php */
/* Location: ./application/models/MApi.php */