<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voting_Controller extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->library('facebook');
        $this->load->library("candidate_factory");
        $this->load->library("area_factory");
        $this->load->library("party_factory");
        $this->load->library("vote_factory");
        $this->load->library("user_factory");
        $this->load->library('session');
        $this->session->set_flashdata('fb', uri_string());
        //$this->output->cache(10);
        
        $user = $this->facebook->getUser();
        
        if ($user !== 0) {
            $fbdata = $this->facebook->getLoginData();
            $userid = $this->user_factory->getIdbyField('email', $fbdata['user_profile']['email']);
            $area = $this->user_factory->getUser($userid)->getArea();

            $vote = $this->vote_factory->getVote($userid);

            if ($vote == false) {
                $event = "esmane";
                $time = false;
            } else {
                $event = "muutmine";
                $time = $vote->getDate();
            }

            $data = array(
                //Title of the page
                "title" => "Hääletamine",
                //Fetch all candidates
                "candidates" => $this->candidate_factory->getCandidates(),
                "area" => $area,
                //Fetch all parties
                "parties" => $this->party_factory->getParty(),
                //Include the candidates ng controller
                "scripts" => array("/valimised/js/VotingCtrl.js", "/valimised/js/libs/bootstrap-select.min.js"),
                "styles" => array("/valimised/css/angular-chart.css", "/valimised/css/bootstrap-select.min.css"),
                "event" => $event,
                "time" => $time
            );
            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/navbar.php', $fbdata);
            $this->load->view('voting.php', $data);
            $this->load->view('templates/footer.php');
        } else {
            $data = array(
                //Title of the page
                "title" => "Hääletamine");

            $this->load->view('templates/header.php', $data);
            $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
            $this->load->view('voting_notloggedin.php');
            $this->load->view('templates/footer.php');
        }
    }

    public function get($start = 0, $count = 20) {
        $this->load->library("vote_factory");
        $votes = $this->vote_factory->getCandidateVotesJSON();
        $this->output->set_content_type('application/json')->set_output(json_encode($votes));
    }

    public function vote($candidateid = -1) {
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('facebook');
        $this->load->library('user_factory');
        $fbdata = $this->facebook->getLoginData();
        
        if ($fbdata['user_profile']['verified'] == true) {
            $userid = $this->user_factory->getIdbyField('email', $fbdata['user_profile']['email']);
            
            $data = array(
                "candidateid" => $candidateid,
                "voterid" => $userid
            );
            $this->db->delete('vote', array('voterid' => $userid));
            if($candidateid != -1) {
                $this->db->set('date', 'NOW()', FALSE);
                $this->db->insert('vote', $data);
            }
        }
    }
 
}
