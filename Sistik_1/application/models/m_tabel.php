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

	public function json_value($tabel_id = null)
	{
		$this->db->select('isi_value, kolom_id, baris_id');
		$this->db->from('isi_data');
		$this->db->where('tabel_id = ', $tabel_id);
		$query = $this->db->get();
		return $query->result();
	}


}
