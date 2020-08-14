<?php

use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') or exit('No direct script access allowed');

class componen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_baris');
		$this->load->model('m_kolom');
		$this->load->model('m_tabel');
		$this->load->library('form_validation');
	}

	public function index($id = null)
	{
		$data['baris'] = $this->m_tabel->tabel_baris();
		$data['baris2'] = $this->m_tabel->getById($id);
		$data['kolom'] = $this->m_tabel->tabel_kolom();
		$data['tabel'] = $this->m_tabel->getById($id);

		$this->load->view('tabel/componen', $data);
	}

	public function add_baris($id = null)
	{
		$baris = $this->m_baris;
		$validation = $this->form_validation;
		$validation->set_rules($baris->rules());

		if ($validation->run()) {
			$baris->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('componen/index/' . $id));
		}
	}

	public function add_kolom()
	{
		$kolom = $this->m_kolom;
		$validation = $this->form_validation;
		$validation->set_rules($kolom->rules());

		if ($validation->run()) {
			$kolom->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('componen'));
		}
		$this->load->view('componen', $kolom);
	}

	public function edit_baris($id = null)
	{
		$baris = $this->m_baris;
		$validation = $this->form_validation;
		$validation->set_rules($baris->rules());

		if ($validation->run()) {
			$baris->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('componen/index/' . $id));
		}

		$data['baris'] = $baris->getById($id);
		if (!$data['baris']) show_404();

		$this->load->view('componen/index/', $data);
	}

	public function edit_kolom($id = null)
	{
		$kolom = $this->m_kolom;
		$validation = $this->form_validation;
		$validation->set_rules($kolom->rules());

		if ($validation->run()) {
			$kolom->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('kolom'));
		}

		$data['kolom'] = $kolom->getById($id);
		if (!$data['kolom']) show_404();

		$this->load->view('componen', $data);
		// $this->load->view('tabel/edit', $data_array);
	}

	public function delete_baris($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->m_baris->delete($id)) {
			redirect(site_url('componen/index/' . $id));
		}
	}

	public function delete_kolom($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->m_kolom->delete($id)) {
			redirect(site_url('componen'));
		}
	}
}
