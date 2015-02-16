<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results_Controller extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
		$this->load->view('results.php');
		$this->load->view('templates/footer.php');
	}
}