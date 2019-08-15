<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MBerita extends CI_Model {

	public function get_berita()
	{
		return $this->db->order_by('datetime', 'DESC')->get('tb_news');
	}

	public function hapus_data($id)
	{
		return $this->db->where('id_news', $id)->delete('tb_news');
	}

	public function simpan($data)
	{
		$dbdata             = array();
		$dbdata['title']    = $data['judul'];
		$dbdata['news']     = $data['berita'];
		$dbdata['img']      = $data['gambar'];
		$dbdata['category'] = $data['kategori'];
		$dbdata['status']   = $data['status'];
		$dbdata['datetime'] = $data['waktu'];

		return $this->db->insert('tb_news', $dbdata);
	}

	public function get_data_byid($id)
	{
		return $this->db->where('id_news', $id)->get('tb_news');
	}

	public function update($data)
	{
		$dbdata             = array();
		$dbdata['title']    = $data['judul'];
		$dbdata['news']     = $data['berita'];
		$dbdata['img']      = $data['gambar'];
		$dbdata['category'] = $data['kategori'];
		$dbdata['status']   = $data['status'];
		$dbdata['datetime'] = $data['waktu'];

		return $this->db->where('id_news', $data['id'])->update('tb_news', $dbdata);
	}

}

/* End of file MBerita.php */
/* Location: ./application/models/MBerita.php */