<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_tabel extends CI_Model
{

	private $_table = "tabel_data";

	public $tabel_nm;
	public $unit_id;
	public $unit_nm;

	public function rules()
	{
		return [
			[
				'field' => 'tabel_nm',
				'label' => 'tabel_nm',
				'rules' => 'required'
			],
			[
				'field' => 'unit_id',
				'label' => 'unit_id',
				'rules' => 'required'
			],
			[
				'field' => 'unit_nm',
				'label' => 'unit_nm',
				'rules' => 'required'
			],
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result_array();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["tabel_id" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->tabel_nm = $post["tabel_nm"];
		$this->unit_id = $post["unit_id"];
		$this->unit_nm = $post["unit_nm"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->tabel_nm = $post["tabel_nm"];
		$this->unit_id = $post["unit_id"];
		$this->unit_nm = $post["unit_nm"];
		return $this->db->update($this->_table, $this, array('tabel_id' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("tabel_id" => $id));
	}

	public function tabel_baris($id = null)
	{
		$this->db->select('*');
		$this->db->from('baris_data');
		$this->db->join('tabel_data', 'baris_data.tabel_id = tabel_data.tabel_id');
		$this->db->where('tabel_data.tabel_id = ',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function tabel_kolom($id = null)
	{
		$this->db->select('*');
		$this->db->from('kolom_data');
		$this->db->join('tabel_data', 'kolom_data.tabel_id = tabel_data.tabel_id');
		$this->db->where('tabel_data.tabel_id = ', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function kategori_default($id = null)
	{
		$this->db->select('*');
		$this->db->from('kategori_data');
		$this->db->where('kategori_data.kategori_default = 1 ');
		$query = $this->db->get();
		return $query->result();
	}




}
