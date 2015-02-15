<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

public function view()
{
	$this->load->view('templates/header');
	$this->load->view('templates/footer');
}
}