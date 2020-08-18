<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_baris extends CI_Model
{

	private $_table = "baris_data";

	public $baris_id;
	public $baris_nm;
	public $tabel_id;

	

	public function rules()
	{
		return [
			[
				'field' => 'baris_nm',
				'label' => 'baris_nm',
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
		return $this->db->get_where($this->_table, ["baris_id" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->baris_nm = $post["baris_nm"];
		$this->tabel_id = $post["tabel_id"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->baris_nm = $post["baris_nm"];
		$this->tabel_id = $post["tabel_id"];
		$this->baris_id = $post["baris_id"];
		return $this->db->update($this->_table, $this, array('baris_id' => $post['baris_id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("baris_id" => $id));
	}

	// public function delete($id){
	// 	$this->db->delete('b');
	// 	$this->db->from('baris_data');

	// }

	public function tabel_baris($id=0)
	{
		$this->db->select('*');
		$this->db->from('tabel_data');
		$this->db->join('baris_data', 'tabel_data.tabel_id=baris_data.tabel_id');
		$this->db->where('tabel_data.tabel_id = ', $id);
		$query = $this->db->get();
		return $query->result();
	}
}
