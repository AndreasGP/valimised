<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
		$this->load->view('home.php');
		$this->load->view('templates/footer.php');
	}
}