<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_statistik extends CI_Model
{

	public function baris()
	{

		$hasil = $this->db->get('baris_data');

		return $hasil->result_array();
		// $this->load->view('welcome_message');
	}

	public function tabel()
	{

		$hasil = $this->db->get('tabel_data');

		return $hasil->result_array();
		// $this->load->view('welcome_message');
	}

	public function isi()
	{

		$hasil = $this->db->get('isi_data');

		return $hasil->result_array();
		// $this->load->view('welcome_message');
	}

	public function tahun()
	{

		$hasil = $this->db->get('tahun_data');

		return $hasil->result_array();
		// $this->load->view('welcome_message');
	}
}
