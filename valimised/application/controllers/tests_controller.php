<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tests_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('unit_test');
    }

    public function index() {
        $this->runEducationTests();
        $this->runPartyTests();
        $this->runAreaTests();
        $this->runUserTests();
        $this->runCandidateTests();
        
        
        $this->db->delete('user', array('id' => 999999));
        $this->db->delete('candidate', array('id' => 888888));
    }
    
    private function runEducationTests() {
        $this->load->library('education_factory');

        echo "<h1>Hariduse testid</h1>";

        $test = sizeof($this->education_factory->getEducation());
        $expected_result = 6;
        echo $this->unit->run($test, $expected_result, "Tagastavate haridusastmete arv.");

        $test = $this->education_factory->getEducation(4)->getId();
        $expected_result = 4;
        echo $this->unit->run($test, $expected_result, "Suvalise haridusastme id kattuvus.");

        $test = $this->education_factory->getEducation(5)->getName();
        $expected_result = "Keskeriharidus";
        echo $this->unit->run($test, $expected_result, "Suvalise haridusastme nime kattuvus.");
    }

    private function runPartyTests() {
        $this->load->library('party_factory');
        
        echo "<h1>Erakonna testid</h1>";
        
        $test = sizeof($this->party_factory->getParty());
        $expected_result = 11;
        echo $this->unit->run($test, $expected_result, "Tagastavate erakondade arv.");
         
        $test = $this->party_factory->getParty(11)->getId();
        $expected_result = 11;
        echo $this->unit->run($test, $expected_result, "Suvalise erakonna id kattuvus.");
        
        $test = $this->party_factory->getParty(7)->getName();
        $expected_result = "Eestimaa Ühendatud Vasakpartei";
        echo $this->unit->run($test, $expected_result, "Suvalise erakonna nime kattuvus.");
    }
    
    private function runAreaTests() {
        $this->load->library('area_factory');
        
        echo "<h1>Piirkonna testid</h1>";
        
        $test = sizeof($this->area_factory->getArea());
        $expected_result = 12;
        echo $this->unit->run($test, $expected_result, "Tagastavate piirkondade arv.");
        
        $test = $this->area_factory->getArea(11)->getId();
        $expected_result = 11;
        echo $this->unit->run($test, $expected_result, "Suvalise piirkonna id kattuvus.");
        
        $test = $this->area_factory->getArea(7)->getName();
        $expected_result = "Järva- ja Viljandimaa";
        echo $this->unit->run($test, $expected_result, "Suvalise piirkonna nime kattuvus.");
    }
    
    private function runUserTests() {
        $this->load->library('user_factory');
        $this->load->library('area_factory');

        echo "<h1>Kasutajate testid</h1>";
        
        //Eemaldame kasutaja, kui see kuidagi juhtumisi on eelnevast andmebaasi jäänud
        $this->db->delete('user', array('id' => 999999));
        
        //lisame testimiseks kasutaja
        $user = array(
            "id" => "999999",
            "areaid" => 2,
            "lastname" => "Pähkel",
            "firstname" => "Karu",
            "email" => "lihtne@email.com"
        );
        $this->db->insert('user', $user);

        $test = $this->user_factory->getUser(999999)->getFirstName();
        $expected_result = "Karu";
        echo $this->unit->run($test, $expected_result, "Kasutaja eesnime tagastamine.");
        
        $test = $this->user_factory->getUser(999999)->getLastName();
        $expected_result = "Pähkel";
        echo $this->unit->run($test, $expected_result, "Kasutaja perenime tagastamine.");
                
        $test = $this->user_factory->getUser(999999)->getFullName();
        $expected_result = "Karu Pähkel";
        echo $this->unit->run($test, $expected_result, "Kasutaja täisnime tagastamine.");
        
        $test = $this->user_factory->getUser(999999)->getArea()->getName();
        $expected_result = "Tartu linn";
        echo $this->unit->run($test, $expected_result, "Kasutaja piirkonna tagastamine.");

    }
    
    private function runCandidateTests() {
        $this->load->library('candidate_factory');
        $this->load->library('user_factory');

        echo "<h1>Kandidaatide testid</h1>";
        
        //Eemaldame kasutaja, kui see kuidagi juhtumisi on eelnevast andmebaasi jäänud
        $this->db->delete('candidate', array('id' => 888888));
        
        //lisame testimiseks kandidaadi
        $candidate = array(
            "id" => 888888,
            "userid" => 999999,
            "areaid" => 4,
            "partyid" => 8,
            "educationid" => 3,
            "birthdate" => "1957-06-12",
            "job" => "Töökoht",
            "description" => "Pikem kirjeldus."
        );
        $this->db->insert('candidate', $candidate);
        
        $test = $this->candidate_factory->getCandidate(888888)->getUser()->getFullName();
        $expected_result = "Karu Pähkel";
        echo $this->unit->run($test, $expected_result, "Kandidaadi täisnime tagastamine.");

        $test = $this->candidate_factory->getCandidate(888888)->getArea()->getName();
        $expected_result = "Hiiu-, Lääne- ja Saaremaa";
        echo $this->unit->run($test, $expected_result, "Kandidaadi piirkonna tagastamine.");
        
        $test = $this->candidate_factory->getCandidate(888888)->getParty()->getName();
        $expected_result = "Eesti Vabaerakond";
        echo $this->unit->run($test, $expected_result, "Kandidaadi erakonna tagastamine.");
        
        $test = $this->candidate_factory->getCandidate(888888)->getEducation()->getName();
        $expected_result = "Algharidus";
        echo $this->unit->run($test, $expected_result, "Kandidaadi hariduse tagastamine.");
        
        $test = $this->candidate_factory->getCandidate(888888)->getBirthday();
        $expected_result = "1957-06-12";
        echo $this->unit->run($test, $expected_result, "Kandidaadi sünniaja tagastamine.");
        
        $test = $this->candidate_factory->getCandidate(888888)->getJob();
        $expected_result = "Töökoht";
        echo $this->unit->run($test, $expected_result, "Kandidaadi töökoha tagastamine.");
        
        $test = $this->candidate_factory->getCandidate(888888)->getDescription();
        $expected_result = "Pikem kirjeldus.";
        echo $this->unit->run($test, $expected_result, "Kandidaadi kirjelduse tagastamine.");
    }

}
