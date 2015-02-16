<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Party_Factory {

    private $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model("party_model");
    }

    public function getParty($id = 0) {
        //Are we getting an individual party or are we getting them all
        if ($id > 0) {
            //Getting an individual party
            $query = $this->_ci->db->get_where("party", array("id" => $id));
            if ($query->num_rows() > 0) {
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the parties
            $query = $this->_ci->db->select("*")->from("party")->get();
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

    public function createObjectFromData($row) {
        $area = new Party_Model();
        $area->setId($row->id);
        $area->setName($row->name);
        return $area;
    }

}