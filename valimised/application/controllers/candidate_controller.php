<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidate_Controller extends CI_Controller {

    public function index() {
        $this->load->library("candidate_factory");

        $data = array(
            //Fetch candidate information
            "candidate" => $this->candidate_factory->getCandidate()
        );
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('candidate.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function get($id = 1) {
        $this->load->library("candidate_factory");
        $candidate = $this->candidate_factory->getCandidate($id);
    }

    public function set($fname, $lname) {
        $data = array(
            //Fetch candidate information
            "name" => $fname + " " + $lname
        );
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('candidate.php', $data);
        $this->load->view('templates/footer.php');
    }

}
