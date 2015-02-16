<?php

/**
 * Includes the User_Model class as well as the required sub-classes
 * @package codeigniter.application.models
 */

/**
 * User_Model extends codeigniters base CI_Model to inherit all codeigniter magic!
 * @author Leon Revill
 * @package codeigniter.application.models
 */
class Area_Model extends CI_Model {
    /*
     * A private variable to represent each column in the database
     */

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
