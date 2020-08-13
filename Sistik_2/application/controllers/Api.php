<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function Index_Api()
	{
		$url = "http://apps.sinjaikab.go.id/api/pegawai/get_unit";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url);

		$data_array = array(
			'datalist' => $data
		);
		$this->load->view('judul/tambah', $data_array);
	}
}
