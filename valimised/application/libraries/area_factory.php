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
        //Are we getting an individual area or are we getting them all
        if ($id > 0) {
            //Getting an individual area
            $query = $this->_ci->db->get_where("area", array("id" => $id));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the areas
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

    public function getIdbyField($fieldvalue) {

        $query = $this->_ci->db->select("*")
                        ->from("area")
                        ->where('name', $fieldvalue)->get();

        //Loop through each row returned from the query
        foreach ($query->result() as $row) {
            return $row->id;
        }
    }

    public function createObjectFromData($row) {
        $area = new Area_Model();
        $area->setId($row->id);
        $area->setName($row->name);
        return $area;
    }

    public function getAreaStatistics() {
        $query = $this->_ci->db->select("count(*) as number, area.name")
                ->from("vote")
                ->join("candidate", "candidate.id = vote.candidateid")
                ->join("area", "area.id = candidate.areaid")
                ->group_by("candidate.id")
                ->get();
        $partyvotes = array();
        foreach ($query->result() as $row) {
            $row->number = (int) $row->number;
            $partyvotes[] = $row;
        }
        return $partyvotes;
    }

}
