<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

		$this->load->view('layout/top');
		$this->load->view('index');
		$this->load->view('layout/bottom');
		// $this->load->view('index');
	}

	public function detail(){
		$this->load->view('layout/top');
		$this->load->view('welcomedetail');
		$this->load->view('layout/bottom');
	}
}
