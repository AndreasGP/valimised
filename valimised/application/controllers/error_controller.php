<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error_Controller extends CI_Controller {

    public function index() {
        
        $data = array(
            //Title of the page
            "title" => "Viga",
        );
        $this->load->helper('url');
        $this->load->view('templates/header.php', $data);
        $this->load->library('facebook');
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('404.php');
        $this->load->view('templates/footer.php');
    }

}
