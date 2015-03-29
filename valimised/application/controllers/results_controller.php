<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Results_Controller extends CI_Controller {

    public function index() {
        // $this->load->helper('url');
        $this->load->library("candidate_factory");
        $this->load->library("area_factory");
        $this->load->library("party_factory");
        $this->load->library("vote_factory");
        $this->load->library('session');

        //$this->output->cache(10);
        $data = array(
            //Title of the page
            "title" => "Tulemused",
            //Fetch all candidates
            "candidates" => $this->candidate_factory->getCandidates(),
            //Fetch all areas
            "areas" => $this->area_factory->getArea(),
            //Fetch all parties
            "parties" => $this->party_factory->getParty(),
            //Fetch all votes
            "votes" => $this->vote_factory->getVotes(),
            //Include the candidates ng controller
            "scripts" => array("/valimised/js/ResultsCtrl.js"),
            "styles" => array("/valimised/css/angular-chart.css")
        );
        $this->load->view('templates/header.php', $data);
        $this->load->helper('url');
        $this->load->library('facebook');
        $this->session->set_flashdata('fb', uri_string());
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('results.php');
        $this->load->view('templates/footer.php');
    }

    public function getGeneralResults() {
        $this->load->library("results_factory");
        $results = $this->results_factory->getGeneralResults();
        $this->output->set_content_type('application/json')->set_output(json_encode($results));
    }
    
    public function getGeneralPartyResults() {
        $this->load->library("results_factory");
        $results = $this->results_factory->getGeneralPartyResults();
        $this->output->set_content_type('application/json')->set_output(json_encode($results));
    }

    public function getPartyResults($areaid) {
        $this->load->library("results_factory");
        $results = $this->results_factory->getPartyResults($areaid);
        $this->output->set_content_type('application/json')->set_output(json_encode($results));
    }
    
    public function getGeneralCandidateResults() {
        $this->load->library("results_factory");
        $results = $this->results_factory->getGeneralCandidateResults();
        $this->output->set_content_type('application/json')->set_output(json_encode($results));
    }
    
     public function getCandidateResults($areaid) {
        $this->load->library("results_factory");
        $results = $this->results_factory->getCandidateResults($areaid);
        $this->output->set_content_type('application/json')->set_output(json_encode($results));
    }
    
     public function getCandidatePartyResults($partyid) {
        $this->load->library("results_factory");
        $results = $this->results_factory->getCandidatePartyResults($partyid);
        $this->output->set_content_type('application/json')->set_output(json_encode($results));
    }

}
