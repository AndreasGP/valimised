<?php

class Candidate_Model extends CI_Model {

    private $_id;
    private $_userid;
    private $_areaid;
    private $_partyid;

    function __construct() {
        parent::__construct();
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($value) {
        $this->_id = (int) $value;
    }

    public function getUserId() {
        return $this->_userid;
    }

    public function setUserId($value) {
        $this->_userid = (int) $value;
    }

    public function getAreaId() {
        return $this->_areaid;
    }

    public function setAreaId($value) {
        $this->_areaid = (int) $value;
    }
    
    public function getPartyId() {
        return $this->_partyid;
    }

    public function setPartyId($value) {
        $this->_partyid = (int) $value;
    }
}
