<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apply_Controller extends CI_Controller {

    public function index() {

        $this->load->library('facebook');
        $this->load->helper('url');
        //$this->output->cache(10);
        $user = $this->facebook->getUser();
        $this->load->library('session');
        $this->session->set_flashdata('fb', uri_string());
        

        if ($user !== 0) {
            $this->load->library("area_factory");
            $this->load->library("party_factory");
            $this->load->model("user_model");
            $this->load->library("user_factory");
            $this->load->library("education_factory");
            $user_profile = $this->facebook->api('/me');
           
            $userid = $this->user_factory->getIdbyField('email', $user_profile['email']);
            $area = $this->user_factory->getUser($userid)->getArea();

            $data = array(
                "firstname" => $user_profile['first_name'],
                "lastname" => $user_profile['last_name'],
                //Title of the page
                "title" => "Kandideerimine",
                //Fetch all areas
                "area" => $area,
                //Fetch all parties
                "parties" => $this->party_factory->getParty(),
                //Fetch all educations
                "educations" => $this->education_factory->getEducation(),
                "scripts" => array("/valimised/js/ApplyCtrl.js", "/valimised/js/libs/fileinput.min.js",
                   "/valimised/js/libs/bootstrap-select.min.js",  "/valimised/js/DateController.js"),
                "styles" => array("/valimised/css/fileinput.css", "/valimised/css/bootstrap-select.min.css")
            );

            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
            $this->load->view('apply.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            $data = array(
                //Title of the page
                "title" => "Kandideerimine");
            
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
            $this->load->view('apply_notloggedin.php');
            $this->load->view('templates/footer.php');
        }
    }

    public function apply() {
        $this->load->model("candidate_model");
        $this->load->model("user_model");
        $this->load->model("area_model");
        $this->load->library("area_factory");
        $this->load->library("party_factory");
        $this->load->library("education_factory");
        $this->load->library("user_factory");
        $this->load->library("facebook");
        
        //Post method sends area, party and education names.
        //We need to extract the id-s.
        $user_profile = $this->facebook->api('/me');
        $userid = $this->user_factory->getIdbyField('email', $user_profile['email']);
        $areaid = $this->user_factory->getUser($userid)->getArea()->getId();
        $partyid = $this->party_factory->getIdbyName($this->input->post('partyid'));
        $educationid = $this->education_factory->getIdbyName($this->input->post('educationid'));
                
        //Format the date
        if($this->input->post('day') >= 10) {
            $day = $this->input->post('day');
        } else {
            $day = 0 . $this->input->post('day');
        }
        
        if($this->input->post('month') >= 10) {
            $month = $this->input->post('month');
        } else {
            $month = 0 . $this->input->post('month');
        }
        
        $date = $this->input->post('year') . '-' . $month . '-' . $day;
        
        $candidatedata = array(
            'id' => ('NULL'),
            'userid' => $userid,
            'areaid' => $areaid,
            'partyid' => $partyid,
            'educationid' => $educationid,
            'birthdate' => $date,
            'job' => $this->input->post('job'),
            'description' => $this->input->post('description')
        );
           
        $this->candidate_model->form_insert($candidatedata);
                                            
    }

}
