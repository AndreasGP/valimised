<?php

class User_Model extends CI_Model {

    private $_id;
    private $_firstname;
    private $_lastname;
    private $_area;

    function __construct() {
        parent::__construct();
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($value) {
        $this->_id = (int)$value;
    }

    public function getFullName() {
        return $this->_firstname . " " . $this->_lastname;
    }
    
    public function getFirstName() {
        return $this->_firstname;
    }
    
    public function setFirstName($value) {
        $this->_firstname = $value;
    }
    
    public function getLastName() {
        return $this->_lastname;
    }
    
    public function setLastName($value) {
        $this->_lastname = $value;
    }
    
    public function getArea() {
        return $this->_area;
    }
    
    public function setArea($value) {
        $this->_area = $value;
    }
}
