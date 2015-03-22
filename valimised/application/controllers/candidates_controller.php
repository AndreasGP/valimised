<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidates_Controller extends CI_Controller {

    public function index() {
        
        $this->output->cache(10);
        $this->load->helper('url');
        $this->load->library('facebook');
        $this->load->library('session');
        $this->session->set_flashdata('fb', uri_string());
        $data = array(
            //Title of the page
            "title" => "Kandidaadid",
        );

        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('candidate_areas.php');
        $this->load->view('templates/footer.php');
    }

    public function candidates($areaid) {
        $this->load->helper('url');
        $this->load->library('facebook');
        $this->load->library("area_factory");
        $this->load->library("party_factory");
        $this->load->library("education_factory");
        $this->load->library('session');
        $this->session->set_flashdata('fb', uri_string());
        $this->output->cache(10);
        $areaQuery = $this->db->select("name")->from("area")->where("id", $areaid)->get();

        if ($areaQuery->num_rows() === 1) {
            $data = array(
                //Title of the page
                "title" => "Kandidaadid",
                "area" => $areaQuery->result()[0]->name,
                "areaid" => $areaid,
                //Fetch all areas
                "areas" => $this->area_factory->getArea(),
                //Fetch all parties
                "parties" => $this->party_factory->getParty(),
                //Fetch all educations
                "educations" => $this->education_factory->getEducation(),
                //Include the candidates ng controller
                "scripts" => array("/valimised/js/CandidatesCtrl.js")
            );
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
            $this->load->view('candidates.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            redirect('/404', '');
        }
    }

    public function get($areaid = 0, $start = 0, $count = 20) {
        $this->load->library("candidate_factory");
        $candidates = $this->candidate_factory->getCandidatesJSON($areaid);
        $this->output->set_content_type('application/json')->set_output(json_encode($candidates));
    }

}
