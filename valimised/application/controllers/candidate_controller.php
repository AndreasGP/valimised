<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidate_Controller extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->library("candidate_factory");
        $this->output->cache(10);
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
    
    public function getPreview(){
        $this->load->helper('url');
        $data = json_decode(file_get_contents("php://input"));
        
        $this->load->view('templates/header.php');
        $this->load->library('facebook');
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('candidate.php', $data);
        $this->load->view('templates/footer.php');
    }

}
