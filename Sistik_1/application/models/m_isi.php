<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_isi extends CI_Model
{

	private $_table = "isi_data";

	public $isi_value;
	public $isi_id;
	public $tabel_id;

	public function rules()
	{
		return [
			[
				'field' => 'isi_value',
				'label' => 'isi_value',
				'rules' => 'required'
			],
			[
				'field' => 'tabel_id',
				'label' => 'tabel_id',
				'rules' => 'required'
			]
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["isi_id" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->isi_value = $post["isi_value"];
		// $this->tabel_id = $post["tabel_id"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->isi_value = $post["isi_value"];
		// $this->tabel_id = $post["tabel_id"];
		$this->isi_id = $post["isi_id"];
		return $this->db->update($this->_table, $this, array('isi_id' => $post['isi_id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("isi_id" => $id));
	}

	public function hapus_tabel_kolom($id)
	{
		return $this->db->delete($this->_table, array("tabel_id" => $id));
	}


	public function tabel_kolom($id=0)
	{
		$this->db->select('*');
		$this->db->from('tabel_data');
		$this->db->join('kolom_data', 'tabel_data.tabel_id=kolom_data.tabel_id');
		$this->db->where('tabel_data.tabel_id = ', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function isi_value($tabel_id=0,$kolom_id=0,$baris_id=0,$tahun=0)
	{
		$query = $this->db->query("
		
			SELECT A.* 
			FROM isi_data A
			WHERE A.tabel_id = $tabel_id
			AND A.kolom_id = $kolom_id
			AND A.baris_id = $baris_id
			AND A.tahun = $tahun  
			LIMIT 1
		
		");

			
		
		// $this->db->select('*');
		// $this->db->from('isi_data');
		// $this->db->where('isi_data.tabel_id = ', $tabel_id);
		// $this->db->where('isi_data.kolom_id = ', $kolom_id);
		// $this->db->where('isi_data.baris_id = ', $baris_id);
		// $this->db->where('isi_data.tahun = ', $tahun);
		// $query = $this->db->get();
		return $query->row();
	}
}
