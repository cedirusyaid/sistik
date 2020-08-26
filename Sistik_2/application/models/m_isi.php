<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_isi extends CI_Model
{
	private $_table = "isi_data";

	public $isi_value;
	public $bulan;
	public $tahun;
	public $tabel_id;
	public $baris_id;
	public $kolom_id;

	public function save()
	{
		$post = $this->input->post();
		$this->isi_value = $post['tabel_nm'];
		$this->bulan = $post['bulan'];
		$this->tahun = $post['tahun'];
		$this->tabel_id = $post['tabel_id'];
		$this->baris_id = $post['baris_id'];
		$this->kolom_id = $post['kolom_id'];

		return $this->db->insert($this->_table, $this);
	}

	public function isi_value($tabel_id = null, $kolom_id = null, $baris_id = null, $tahun)
	{
		// $query = $this->db->query("

		// 	SELECT A.* 
		// 	FROM isi_data A
		// 	WHERE A.tabel_id = $tabel_id
		// 	AND A.kolom_id = $kolom_id
		// 	AND A.baris_id = $baris_id
		// 	AND A.tahun = $tahun  
		// 	LIMIT 1

		// ");

		$this->db->select('*');
		$this->db->from('isi_data');
		$this->db->where('isi_data.tabel_id = ', $tabel_id);
		$this->db->where('isi_data.kolom_id = ', $kolom_id);
		$this->db->where('isi_data.baris_id = ', $baris_id);
		$this->db->where('isi_data.tahun = ', $tahun);
		$query = $this->db->get();
		return $query->row();
	}

}
