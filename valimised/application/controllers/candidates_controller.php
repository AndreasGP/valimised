<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidates_Controller extends CI_Controller {

    public function index() {

        $this->load->library("area_factory");
        $data = array(
            //Fetch all areas
            "areas" => $this->area_factory->getArea()
        );

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('candidates.php', $data);
        $this->load->view('templates/footer.php');
    }

}
