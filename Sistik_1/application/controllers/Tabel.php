<?php

defined('BASEPATH') or exit('No direct script access allowed');

class tabel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tabel');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['tabel'] = $this->m_tabel->getAll();
		$this->load->view('tabel/index', $data);
	}

	public function add()
	{
		$url = "http://apps.sinjaikab.go.id/api/pegawai/get_unit";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url);

		$data_array = array(
			'datalist' => $data
		);

		$tabel = $this->m_tabel;
		$validation = $this->form_validation;
		$validation->set_rules($tabel->rules());

		if ($validation->run()) {
			$tabel->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('tabel'));
		}
		$this->load->view('tabel/add', $data_array);
		// $this->load->view('tabel/add');
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('tabel');

		$url = "http://apps.sinjaikab.go.id/api/pegawai/get_unit";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url);

		$data_array = array(
			'datalist' => $data
		);

		$tabel = $this->m_tabel;
		$validation = $this->form_validation;
		$validation->set_rules($tabel->rules());

		if ($validation->run()) {
			$tabel->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('tabel'));
		}

		$data['tabel'] = $tabel->getById($id);
		if (!$data['tabel']) show_404();

		$this->load->vars($data);
		$this->load->view('tabel/edit', $data_array);
		// $this->load->view('tabel/edit', $data_array);
	}

	public function hapus($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->m_tabel->delete($id)) {
			redirect(site_url('tabel'));
		}
	}
}
