<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Education_Factory {

    private $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model("education_model");
    }

    public function getEducation($id = -1) {
        //Are we getting an individual party or are we getting them all
        if ($id >= 0) {
            //Getting an individual party
            $query = $this->_ci->db->get_where("education", array("id" => $id));
            if ($query->num_rows() > 0) {
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the parties
            $query = $this->_ci->db->select("*")->from("education")->get();
            if ($query->num_rows() > 0) {
                $parties = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    $parties[] = $this->createObjectFromData($row);
                }
                return $parties;
            }
            return false;
        }
    }
    
    public function getIdbyField($fieldname, $fieldvalue){
        $query = $this->_ci->db->select("TOP 1 id")->from("education")->where([$fieldname => $fieldvalue]);
            if ($query->num_rows() > 0) {
                return (int)$query->result()[0]->id;
            }
            return false;
    }
    
    public function getIdbyName($fieldvalue){

            $query = $this->_ci->db->select("*")
                    ->from("education")
                    ->where('name', $fieldvalue)->get();
                  
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    return $row->id;
                }
    }

    public function createObjectFromData($row) {
        $area = new Education_Model();
        $area->setId($row->id);
        $area->setName($row->name);
        return $area;
    }

}