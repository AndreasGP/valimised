<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error_Controller extends CI_Controller {

    public function index() {

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('404.php');
        $this->load->view('templates/footer.php');
    }

}
