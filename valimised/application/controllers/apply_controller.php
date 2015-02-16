<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
		$this->load->view('apply.php');
		$this->load->view('templates/footer.php');
	}
}
