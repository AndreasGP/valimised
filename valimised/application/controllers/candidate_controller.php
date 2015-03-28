<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidate_Controller extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->library("candidate_factory");
        $this->load->library('session');
        $this->session->set_flashdata('fb', uri_string());
        //$this->output->cache(10);
        $data = array(
            //Title of the page
            "title" => "Kandidaat",
            //Fetch candidate information
            "candidate" => $this->candidate_factory->getCandidate()
        );
        $this->load->view('templates/header.php', $data);
        $this->load->library('facebook');
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('candidate.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function get($id = 1) {
        $this->load->helper('url');
        $this->load->library("candidate_factory");
        $this->load->library('session');
        $this->session->set_flashdata('fb', uri_string());
        $data = array(
            //Fetch candidate information
            "candidate" => $this->candidate_factory->getCandidate($id)
        );
        $this->load->view('templates/header.php');
        $this->load->library('facebook');
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('candidate.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function getJSON($id = 1) {
        $this->load->library("candidate_factory");
        $candidate =  $this->candidate_factory->getCandidateJSON($id);
        return $this->output->set_content_type('application/json')->set_output(json_encode($candidate));
    }
    
    public function getPreview(){
        $this->load->helper('url');
        $this->load->library('session');
        $this->session->set_flashdata('fb', uri_string());
        $data = json_decode(file_get_contents("php://input"));
        
        $this->load->view('templates/header.php');
        $this->load->library('facebook');
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('candidate.php', $data);
        $this->load->view('templates/footer.php');
    }

}
