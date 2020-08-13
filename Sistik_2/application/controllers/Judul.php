<?php

use chriskacerguis\RestServer\RestController;

defined('BASEPATH') or exit('No direct script access allowed');

class Judul extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('judul_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = $this->judul_model->getAll();
		$this->load->view('judul/judul', $data);
	}
	public function Index_Api()
	{
		$url = "http://apps.sinjaikab.go.id/api/pegawai/get_unit";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url);

		$data_array = array(
			'datalist' => $data
		);
		// $this->load->view('judul/tambah', $data_array);
		return $data_array;
	}

	public function tambah()
	{
		$url = "http://apps.sinjaikab.go.id/api/pegawai/get_unit";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url);

		$data_array = array(
			'datalist' => $data
		);

		$judul = $this->judul_model;
		$validation = $this->form_validation;
		$validation->set_rules($judul->rules());

		if ($validation->run()) {
			$judul->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('judul'));
		}
		$this->load->view('judul/tambah', $data_array);
		// $this->load->view('judul/tambah');
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('judul');

		$url = "http://apps.sinjaikab.go.id/api/pegawai/get_unit";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url);

		$data_array = array(
			'datalist' => $data
		);

		$judul = $this->judul_model;
		$validation = $this->form_validation;
		$validation->set_rules($judul->rules());

		if ($validation->run()) {
			$judul->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('judul'));
		}

		$data['judul'] = $judul->getById($id);
		if (!$data['judul']) show_404();

		$this->load->vars($data);
		$this->load->view('judul/edit', $data_array);
		// $this->load->view('judul/edit', $data_array);
	}

	public function hapus($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->judul_model->delete($id)) {
			redirect(site_url('judul'));
		}
	}
}
