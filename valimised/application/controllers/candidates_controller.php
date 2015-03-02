<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidates_Controller extends CI_Controller {

    public function index() {
        $this->load->library("candidate_factory");
        $this->load->library("area_factory");
        $this->load->library("party_factory");
        $this->load->library("education_factory");
        $data = array(
            //Fetch all candidates
            "candidates" => $this->candidate_factory->getCandidates(),
            //Fetch all areas
            "areas" => $this->area_factory->getArea(),
            //Fetch all parties
            "parties" => $this->party_factory->getParty(),
            //Fetch all educations
            "educations" => $this->education_factory->getEducation(),
            //Include the candidates ng controller
            "scripts" => array("/valimised/js/CandidatesCtrl.js", "/valimised/js/libs/ng-table.min.js")
        );
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/navbar.php');
        $this->load->view('candidates.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function get($start = 0, $count = 20) {
        $this->load->library("candidate_factory");
        $candidates = $this->candidate_factory->getCandidatesJSON();
        $this->output->set_content_type('application/json')->set_output(json_encode($candidates));
    }
}
