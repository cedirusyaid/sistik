<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_tabel');
		// $this->load->model('m_baris');
		// $this->load->model('m_kolom');
		$this->load->model('m_jenis');
		// $this->load->model('m_isi');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['jenisAll'] = $this->m_jenis->getAll();
		// print_r($data);
		$this->load->view('jenis/index', $data);
	}

	public function add()
	{
		$data = array();
		$jenis = $this->m_jenis;
		// print_r($jenis);
		$validation = $this->form_validation;
		$validation->set_rules($jenis->rules());

		if ($validation->run()) {
			$jenis->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('jenis'));
		}
		$this->load->view('jenis/add', $data);
		// $this->load->view('jenis/add');
	}

	public function edit($id = null)
	{
		if (!isset($id)) redirect('jenis');


		$jenis = $this->m_jenis;
		$validation = $this->form_validation;
		$validation->set_rules($jenis->rules());

		if ($validation->run()) {
			$jenis->update();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('jenis'));
		}

		$data['jenis'] = $jenis->getById($id);
		if (!$data['jenis']) show_404();

		// print_r($data);

		// $this->load->vars($data);
		$this->load->view('jenis/edit', $data);
		// $this->load->view('jenis/edit', $data_array);
	}

	public function hapus($id = null)
	{
		if (!isset($id)) show_404();

		if ($this->m_jenis->delete($id)) {
			redirect(site_url('jenis'));
		}
	}

	public function detail($id = null, $tahun = null)
	{
		if ($tahun == null) {
			$tahun = date('Y');
		}

		$data['jenis_id'] = $id;
		$data['tahun'] = $tahun;

		$data['baris_col'] = $this->m_baris->getBarisAll($id);
		$data['detail'] = $this->m_jenis->getById($id);
		$data['baris'] = $this->m_jenis->getJenisAll($id);

		$data['data'] = $data;
		$this->load->view('jenis/detail', $data);
	}


	// public function edit_detail($id = 0, $tahun = 0)
	// {
	// 	if ($tahun == null) {
	// 		$tahun = date('Y');
	// 	}

	// 	$data['tahun'] = $tahun;
	// 	// $data['tahun_awal'] = $tahun - 5;

	// 	$data['detail'] = $this->m_jenis->getById($id);
	// 	$data['baris_col'] = $this->m_baris->getBarisAll($id);
	// 	$data['baris'] = $this->m_jenis->getJenisAll($id);
	// 	// $data['baris'] = $this->m_jenis->tabel_baris($id);
	// 	$data['kolom'] = $this->m_jenis->getAll($id);
	// 	// $data['kolom'] = $this->m_jenis->tabel_kolom($id);
	// 	$data['tabel_id'] = $id;

	// 	// print_r($data);
	// 	$this->load->view('jenis/edit_detail', $data);
	// }

	public function proses_detail()
	{

		$data = $this->input->post();
		// print_r($data);

		$data_form['tahun'] = $this->input->post('tahun');
		$data_form['tabel_id'] = $this->input->post('tabel_id');
		$baris = $this->m_jenis->tabel_baris($data_form['tabel_id']);
		$kolom = $this->m_jenis->tabel_kolom($data_form['tabel_id']);

		foreach ($baris as $brs) :
			foreach ($kolom as $klm) :
				$data_form['isi_value'] = $this->input->post('isi_' . $klm->kolom_id . '_' . $brs->baris_id);
				$data_form['kolom_id'] = $klm->kolom_id;
				$data_form['baris_id'] = $brs->baris_id;
				$this->db->insert('isi_data', $data_form);
				$this->db->replace('isi_data', $data_form);
			endforeach;
		endforeach;
		header('Location: ' . base_url('jenis/detail/' . $data_form['tabel_id'] . '/' . $data_form['tahun']));
	}

}
