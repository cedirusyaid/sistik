<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
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

	public function index($tahun=NULL)
	{
		$data['tabel'] = $this->m_tabel->getAll();
		$data['jenisAll'] = $this->m_jenis->getAll();

		$data['userdata'] = $this -> session -> userdata();
		// print_r($data);



		if ($tahun == null) {
			$tahun = date('Y');
		}
		$data['tahun'] = $tahun;




		$this->load->view('layout/top');
		$this->load->view('site/index', $data);
		$this->load->view('layout/bottom');
	}

	public function detail($id = null, $tahun = null)
	{
		$data['userdata'] = $this -> session -> userdata();
		if ($tahun == null) {
			$tahun = date('Y');
		}
		$data['edit'] = $edit = $this->input->get('edit');
		$data['tahun'] = $tahun;
		$data['tabel'] = $tabel = $this->m_tabel->getById($id);
		$data['detail'] = $this->m_tabel->getById($id);
		$data['baris_col'] = $this->m_baris->getBarisAll($tabel['jenis_id']);
		$data['kolom'] = $this->m_tabel->tabel_kolom($id);
		$data['tabel_id'] = $id;

		// print_r($data);
		$this->load->view('layout/top');
		$this->load->view('site/detail', $data);
		$this->load->view('layout/bottom');

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
