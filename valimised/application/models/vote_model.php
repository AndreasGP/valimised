<?php

class Vote_Model extends CI_Model {
    
    private $_voterid;
    private $_candidateid;
    private $_date;

    function __construct() {
        parent::__construct();
    }

    public function getVoterId() {
        return $this->_voterid;
    }

    public function setVoterId($value) {
        $this->_voterid = (int)$value;
    }

    public function getCandidateId() {
        return $this->_candidateid;
    }

    public function setCandidateId($value) {
        $this->_candidateid = (int)$value;
    }
    
    public function getDate() {
        return $this->_date;
    }
    
    public function setDate($value) {
        $this->_date = $value;
    }
    
}

