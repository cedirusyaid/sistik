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
		$this->db->select('*');
		$this->db->from('isi_data');
		$this->db->where('isi_data.tabel_id = ', $tabel_id);
		$this->db->where('isi_data.kolom_id = ', $kolom_id);
		$this->db->where('isi_data.baris_id = ', $baris_id);
		$this->db->where('isi_data.tahun = ', $tahun);
		$query = $this->db->get();
		return $query->row();
	}

	public function selectDataIsi($tabel_id = null)
	{
		$this->db->select('isi_value,baris_id,kolom_id');
		$this->db->from('isi_data');
		$this->db->where('tabel_id = ', $tabel_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function allData($tabel_id = null)
	{
		// $query =	$this->db->select('*')
		// ->from('isi_data')
		// ->join('tabel_data', 'tabel_data.tabel_id = isi_data.tabel_id')
		// ->join('kolom_data', 'kolom_data.kolom_id = isi_data.kolom_id')
		// ->join('baris_data', 'baris_data.tabel_id = tabel_data.tabel_id', 'left');\

		$this->db->select('kolom_nm,baris_nm,isi_value');
		$this->db->from('tabel_data,kolom_data,baris_data,isi_data');
		$this->db->where('tabel_data.tabel_id = ', $tabel_id);
		$this->db->where('kolom_data.kolom_id = isi_data.kolom_id');
		$this->db->where('baris_data.baris_id = isi_data.baris_id');
		$this->db->where('isi_data.tabel_id = ', $tabel_id);
		$query = $this->db->get();
		return $query->result();
	}

}
