<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tabel extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();	
		$this->load->model('m_tabel');
		$this->load->model('m_baris');
		$this->load->model('m_jenis');
		$this->load->model('m_kolom');
		$this->load->model('m_isi');
		$this->load->library('form_validation');

        // $this->is_logged_in();
		
	}

	private function is_logged_in() {
		$is_logged_in = $this -> session -> userdata('is_logged_in');
		if (!isset($is_logged_in) || $is_logged_in != true) {
			// echo 'Anda tidak memiliki akses untuk masuk ke halaman ini. <a href="' . base_url('login') . '">Login</a>';
			// die();
			header('Location: ' . (base_url("/user/login/")));
		}
	}

	private function get_unit() 
	{
		$url = "http://apps.sinjaikab.go.id/api/pegawai/get_unit";
		$get_url = file_get_contents($url);
		return json_decode($get_url);
	}	

	public function index()
	{
		$data['tabel'] = $this->m_tabel->getAll();
		$data['jenisAll'] = $this->m_jenis->getAll();

		$data['userdata'] = $this -> session -> userdata();
		// print_r($data);

		$this->load->view('layout/top');
		$this->load->view('tabel/index', $data);
		$this->load->view('layout/bottom');
	}

	public function add()
	{
        $this->is_logged_in();
		$url = "http://apps.sinjaikab.go.id/api/pegawai/get_unit";
		$get_url = file_get_contents($url);
		$unit = json_decode($get_url);

		$data['datalist'] = $unit;
		$data['kategori_default'] = $this->m_tabel->kategori_default();


		$data['unit'] = $this -> get_unit();


		// $data['tabel'] = $this->m_tabel->getAll();

		$data['jenis'] = $this->m_jenis->getAll();

		// $data_array = array(
		// 	'datalist' => $data
		// );

		$tabel = $this->m_tabel;
		$validation = $this->form_validation;
		$validation->set_rules($tabel->rules());

		if ($validation->run()) {
			$tabel->save();
			$this->session->set_flashdata('success', 'Berhasil disimpan');
			redirect(site_url('tabel'));
		}
		$this->load->view('layout/top');
		$this->load->view('tabel/add', $data);
		$this->load->view('layout/bottom');
		// $this->load->view('tabel/add');
	}


	public function edit($id = null)
	{
        $this->is_logged_in();

		if (!isset($id)) redirect('tabel');

		$data_array['unit'] = $this -> get_unit();

		// $data['tabel'] = $this->m_tabel->getAll();

		$data_array['jenis'] = $this->m_jenis->getAll();
		$data_array['kategori_default'] = $this->m_tabel->kategori_default();


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
		$this->load->view('layout/top');
		// $this->load->view('tabel/detail', $data);
		$this->load->view('tabel/edit', $data_array);
		$this->load->view('layout/bottom');

		
		// $this->load->view('tabel/edit', $data_array);
	}

	public function hapus($id = null)
	{
        $this->is_logged_in();

		if (!isset($id)) show_404();

		if ($this->m_tabel->delete($id) and $this->m_kolom->delete_all($id)) {
			redirect(site_url('tabel'));
		}
	}

	public function detail($id = null, $tahun = null)
	{
		$data['jenisAll'] = $this->m_jenis->getAll();
		$data['userdata'] = $this -> session -> userdata();


        $this->is_logged_in();

		if ($tahun == null) {
			$tahun = date('Y');
		}


		$data['edit'] = $edit = $this->input->get('edit');

		$data['tahun'] = $tahun;
		$data['tabel'] = $tabel = $this->m_tabel->getById($id);

		// $data['baris_col'] = $this->m_baris->getBarisAll($id);
		$data['detail'] = $this->m_tabel->getById($id);
		// $data['baris'] = $this->m_tabel->tabel_baris($id);
		$data['baris_col'] = $this->m_baris->getBarisAll($tabel['jenis_id']);
		// $data['baris_induk'] = $this->m_baris->getBarisInduk($tabel['jenis_id']);
		$data['kolom'] = $this->m_tabel->tabel_kolom($id);
		$data['tabel_id'] = $id;

		// print_r($data);
		$this->load->view('layout/top');
		$this->load->view('tabel/detail', $data);
		$this->load->view('layout/bottom');

	}

	// public function edit_detail($id = 0, $tahun = 0)
	// {
	// 	if ($tahun == null) {
	// 		$tahun = date('Y');
	// 	}

	// 	$data['tahun'] = $tahun;
	// 	// $data['tahun_awal'] = $tahun - 5;

	// 	$data['detail'] = $this->m_tabel->getById($id);
	// 	$data['baris_col'] = $this->m_baris->getBarisAll($id);
	// 	$data['baris'] = $this->m_tabel->tabel_baris($id);
	// 	$data['kolom'] = $this->m_tabel->tabel_kolom($id);
	// 	$data['tabel_id'] = $id;

	// 	// print_r($data);
	// 	$this->load->view('tabel/edit_detail', $data);
	// }

	public function proses_detail()
	{
        $this->is_logged_in();

		$data = $this->input->post();
		// print_r($data);

		$data_form['tahun'] = $this->input->post('tahun');
		$data_form['tabel_id'] = $tabel_id = $this->input->post('tabel_id');

		$tabel = $this->m_tabel->getById($tabel_id);

		$baris = $this->m_baris->getBarisAll($tabel['jenis_id']);
		$kolom = $this->m_tabel->tabel_kolom($data_form['tabel_id']);

		foreach ($baris as $brs) :
			foreach ($kolom as $klm) :
				$data_form['isi_value'] = $this->input->post('isi_' . $klm->kolom_id . '_' . $brs->baris_id);
				$data_form['kolom_id'] = $klm->kolom_id;
				$data_form['baris_id'] = $brs->baris_id;
				if(!empty($data_form['isi_value'])) {
				$this->db->insert('isi_data', $data_form);
				$this->db->replace('isi_data', $data_form);
				// print_r($data_form);echo br(2);
				}

			endforeach;
		endforeach;
		header('Location: ' . base_url('tabel/detail/' . $data_form['tabel_id'] . '/' . $data_form['tahun']));
	}

	public function json($id = null, $tahun = null)
	{
        $this->is_logged_in();

		if ($tahun == null) {
			$tahun = date('Y');
		}

		$data['tahun'] = $tahun;

		$tabel_id = $id;
		$baris_col = $this->m_baris->getBarisAll($id);
		// $baris = $this->m_tabel->tabel_baris($id);
		// $kolom = $this->m_tabel->tabel_kolom($id);
		$kolom = $this->m_kolom->selectDataKolom($id);
		$baris = $this->m_baris->selectDataBaris($id);
		$isi = $this->m_isi->selectDataIsi($id);
		$value = $this->m_baris->value($id);
		$all = $this->m_isi->allData($id);

		$json_table = [
			"Header" => $kolom,
			"Body" => array_chunk($all, count($kolom))
		];

		$json_data = $this->m_tabel->getById($id);
		$json_data->tahun = $tahun;

		$json['json_data'] = $json_data;
		$json['json_table'] = $json_table;
		echo json_encode($json);
	}

	
}
