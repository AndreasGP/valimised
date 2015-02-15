<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CandidatesController extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navbar.php');
		$this->load->view('candidates.php');
		$this->load->view('templates/footer.php');
	}
}