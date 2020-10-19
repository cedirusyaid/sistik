<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_kolom extends CI_Model
{

	private $_table = "kolom_data";

	public $kolom_id;
	public $kolom_nm;
	public $kolom_tipe;
	public $kolom_sat;
	public $tabel_id;

	public function rules()
	{
		return [
			[
				'field' => 'kolom_nm',
				'label' => 'kolom_nm',
				'rules' => 'required'
			],
			[
				'field' => 'tabel_id',
				'label' => 'tabel_id',
				'rules' => 'required'
			],
			[
				'field' => 'kolom_tipe',
				'label' => 'kolom_tipe',
				'rules' => 'required'
			],
			[
				'field' => 'kolom_sat',
				'label' => 'kolom_sat',
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
		return $this->db->get_where($this->_table, ["kolom_id" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->kolom_nm = $post["kolom_nm"];
		$this->tabel_id = $post["tabel_id"];
		$this->kolom_tipe = $post["kolom_tipe"];
		$this->kolom_sat = $post["kolom_sat"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->kolom_nm = $post["kolom_nm"];
		$this->tabel_id = $post["tabel_id"];
		$this->kolom_tipe = $post["kolom_tipe"];
		$this->kolom_sat = $post["kolom_sat"];

		return $this->db->update($this->_table, $this, array('kolom_id' => $post['kolom_id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("kolom_id" => $id));
	}

	public function delete_All($id)
	{
		return $this->db->delete($this->_table, array("tabel_id" => $id));
	}

	public function selectDataKolom($tabel_id = null)
	{
		$this->db->select('kolom_id,kolom_nm,kolom_tipe');
		$this->db->from('kolom_data');
		$this->db->where('tabel_id = ', $tabel_id);
		$query = $this->db->get();
		return $query->result();
	}
}
