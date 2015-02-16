<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidates_Controller extends CI_Controller {

    public function index() {

        $this->load->library("candidate_factory");
        $this->load->library("area_factory");
        $this->load->library("party_factory");
        $data = array(
            //Fetch all candidates
            "candidates" => $this->candidate_factory->getCandidate(),
            //Fetch all areas
            "areas" => $this->area_factory->getArea(),
            //Fetch all parties
            "parties" => $this->party_factory->getParty()
        );

        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php');
        $this->load->view('candidates.php', $data);
        $this->load->view('templates/footer.php');
    }

}
