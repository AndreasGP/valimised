<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_Factory {

    private $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model("area_model");
    }

    public function getArea($id = 0) {
        //Are we getting an individual user or are we getting them all
        if ($id > 0) {
            //Getting an individual user
            $query = $this->_ci->db->get_where("area", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the users
            $query = $this->_ci->db->select("*")->from("area")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store areas
                $areas = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    $areas[] = $this->createObjectFromData($row);
                }
                //Return the areas array
                return $areas;
            }
            return false;
        }
    }

    public function createObjectFromData($row) {
        $area = new Area_Model();
        $area->setId($row->id);
        $area->setName($row->name);
        return $area;
    }

}
