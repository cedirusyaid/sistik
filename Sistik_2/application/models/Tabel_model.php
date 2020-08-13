<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tabel_model extends CI_Model
{

	private $_table = "tabel_data";

	public $tabel_nm;
	public $unit_id;

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
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->tabel_nm = $post["tabel_nm"];
		$this->unit_id = $post["unit_id"];
		return $this->db->update($this->_table, $this, array('tabel_id' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("tabel_id" => $id));
	}
}
