<?php

class Candidate_Model extends CI_Model {

    private $_id;
    private $_userid;
    private $_user;
    private $_area;
    private $_party;
    private $_job;
    private $_education;
    private $_birthday;
    private $_description;

    function __construct() {
        parent::__construct();
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($value) {
        $this->_id = (int) $value;
    }

    public function getUser() {
        return $this->_user;
    }

    public function setUser($value) {
        $this->_user = $value;
    }

    public function getArea() {
        return $this->_area;
    }

    public function setArea($value) {
        $this->_area = $value;
    }

    public function getParty() {
        return $this->_party;
    }

    public function setParty($value) {
        $this->_party = $value;
    }
    
    function form_insert($data){
        $this->db->insert('candidate', $data);
    }
}
