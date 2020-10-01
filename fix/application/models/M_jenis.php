<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_jenis extends CI_Model
{

	private $_table = "jenis_data";

	public $jenis_id;
	public $jenis_nm;
	public $jenis_ket;


	public function rules()
	{
		return [
			[
				'field' => 'jenis_nm',
				'label' => 'jenis_nm',
				'rules' => 'required'
			],
			[
				'field' => 'jenis_ket',
				'label' => 'jenis_ket',
				'rules' => 'required'
			]
		];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result_array();
	}

	public function getJenisAll()
	{
		$query = $this->db->query("

			SELECT A.*
			FROM jenis_data A
			order by A.jenis_nm DESC
		");
		return $query->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["jenis_id" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();

		$this->jenis_nm = $post["jenis_nm"];
		$this->jenis_id = NULL;
		$this->jenis_ket = $post["jenis_ket"];
		// if (isset($post["jenis_ket"]) == 0) {
		// 	$this->jenis_ket = 0;
		// } else {
		// 	$this->jenis_ket = $post["jenis_id"];
		// }
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->jenis_id = $post['jenis_id'];
		$this->jenis_nm = $post['jenis_nm'];
		$this->jenis_ket = $post['jenis_ket'];

		return $this->db->update($this->_table, $this, array('jenis_id' => $post['jenis_id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("jenis_id" => $id));
	}

	public function delete_All($id)
	{
		return $this->db->delete($this->_table, array("tabel_id" => $id));
	}

}
