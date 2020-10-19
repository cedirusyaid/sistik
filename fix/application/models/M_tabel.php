<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_tabel extends CI_Model
{

	private $_table = "tabel_data";

	public $tabel_nm;
	public $unit_id;
	public $jenis_id;

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
				'field' => 'jenis_id',
				'label' => 'jenis_id',
				'rules' => 'required'
			],
			[
				'field' => 'kategori_id',
				'label' => 'kategori_id',
				'rules' => ''
			]
			// ,
			// [
			// 	'field' => 'unit_nm',
			// 	'label' => 'unit_nm',
			// 	'rules' => 'required'
			// ]
		];
	}

	public function getAll()
	{


			
			$query  = $this->db->query("
			SELECT A.*, B.*
			FROM tabel_data A
			LEFT JOIN jenis_data B
			ON A.jenis_id = B.jenis_id
			ORDER BY A.tabel_nm
			");

			return $query->result_array();

		// return $this->db->get($this->_table)->result_array();
	}

	public function getById($id)
	{

			$query  = $this->db->query("
			SELECT A.*, B.*
			FROM tabel_data A
			LEFT JOIN jenis_data B
			ON A.jenis_id = B.jenis_id
			WHERE A.tabel_id = $id
			ORDER BY A.tabel_nm
			");

			return $query->row_array();		

	}

	public function save()
	{
		$post = $this->input->post();
		$this->tabel_nm = $post["tabel_nm"];
		$this->unit_id = $post["unit_id"];
		$this->jenis_id = $post["jenis_id"];
		$this->kategori_id = $post["kategori_id"];
		// print_r($post);
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->tabel_nm = $post["tabel_nm"];
		$this->unit_id = $post["unit_id"];
		$this->jenis_id = $post["jenis_id"];
		$this->kategori_id = $post["kategori_id"];
		return $this->db->update($this->_table, $this, array('tabel_id' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("tabel_id" => $id));
	}

	public function tabel_baris($id = null)
	{
			
			$query  = $this->db->query("
			SELECT A.*, B.*, C.*
			FROM baris_data A
			LEFT JOIN jenis_data B
			ON A.jenis_id = B.jenis_id
			LEFT JOIN tabel_data C
			ON B.tabel_id = C.tabel_id
			ORDER BY A.tabel_nm
			");
			if ($query) {
			return $query->result_array();
			} else {
				return array();
			}


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
