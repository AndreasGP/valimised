<?php

class Party_Model extends CI_Model {

    private $_id;
    private $_name;

    function __construct() {
        parent::__construct();
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($value) {
        $this->_id = (int)$value;
    }

    public function getName() {
        return $this->_name;
    }
    
    public function setName($value) {
        $this->_name = $value;
    }
}
