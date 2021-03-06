<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_baris extends CI_Model
{

	private $_table = "baris_data";

	public $baris_id;
	public $baris_nm;
	public $baris_induk;
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

	public function getBarisAll($tabel_id = 0)
	{
		$query = $this->db->query("

			SELECT A.*,
			(SELECT COUNT(B.baris_id) FROM baris_data B WHERE A.baris_id = B.baris_induk ) AS jumlah_anak
			FROM baris_data A
			WHERE A.tabel_id = $tabel_id

		");
		return $query->result();
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
		$this->baris_induk = $post["baris_induk"];
		// if (isset($post["baris_induk"]) == 0) {
		// 	$this->baris_induk = 0;
		// } else {
		// 	$this->baris_induk = $post["baris_id"];
		// }
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->baris_id = $post['baris_id'];
		$this->baris_nm = $post['baris_nm'];
		$this->tabel_id = $post['tabel_id'];
		if (isset($post['baris_induk']) == 0) {
			$this->baris_induk = 0;
		} else {
			$this->baris_induk = $post['baris_induk'];
		}

		return $this->db->update($this->_table, $this, array('baris_id' => $post['baris_id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("baris_id" => $id));
	}

	public function delete_All($id)
	{
		return $this->db->delete($this->_table, array("tabel_id" => $id));
	}

	public function induk_baris($id = null)
	{
		$this->db->select('*');
		$this->db->from('baris_data');
		$this->db->where('baris_id = ', $id);
		$this->db->where('tabel_id = ', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function selectDataBaris($tabel_id = null)
	{
		$this->db->select('baris_id,baris_nm,baris_induk');
		$this->db->from('baris_data');
		$this->db->where('tabel_id = ', $tabel_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function value($id = null)
	{
		$this->db->select('isi_value,kolom_id,baris_id');
		$this->db->from('isi_data');
		$this->db->join('tabel_data', 'isi_data.tabel_id = tabel_data.tabel_id');
		$this->db->where('tabel_data.tabel_id = ', $id);
		$query = $this->db->get();
		return $query->result();
	}
}
