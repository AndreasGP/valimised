<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Apply_Controller extends CI_Controller {

    public function index() {

        $this->load->library('facebook');
        $this->load->helper('url');

        $user = $this->facebook->getUser();

        if ($user !== 0) {
            $this->load->library("area_factory");
            $this->load->library("party_factory");
            $this->load->library("education_factory");

            $data = array(
                //Fetch all areas
                "areas" => $this->area_factory->getArea(),
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
            $this->load->view('templates/header.php');
            $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
            $this->load->view('apply_notloggedin.php');
            $this->load->view('templates/footer.php');
        }
    }

    public function apply() {
        $this->load->model("candidate_model");
        $this->load->model("user_model");
        
         $userdata = array(
            'id' => ('NULL'),
            'areaid' => $this->input->post('areaid'),
            'lastname' => $this->input->post('lastname'),
            'firstname' => $this->input->post('firstname'),
            'email' => 'no email yet'
        );
                 
        $this->user_model->form_insert($userdata);
        
        
    }

}
