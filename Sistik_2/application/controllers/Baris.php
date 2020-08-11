<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baris extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Statistik_model');
	}

	public function index()
	{
		$data['statistik'] = $this->Statistik_model->baris();
		$this->load->view('statistik_view',$data);
	}
}
