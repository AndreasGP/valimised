<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidate_Factory {

    private $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model("candidate_model");
        $this->_ci->load->library("user_factory");
        $this->_ci->load->library("area_factory");
        $this->_ci->load->library("party_factory");
        $this->_ci->load->library("education_factory");
    }

    /**
     * Returns a candidate_model instance with the given ID.
     * @param type $id Candidate ID, default 1
     * @return boolean False, if nothing was found, candidate_model if it exists.
     */
    public function getCandidate($id = 4) {
        $query = $this->_ci->db->get_where("candidate", array("id" => $id));
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }

    /**
     * Returns all the candidates as an array of candidate_model instances
     * @return boolean False, if nothing was found, array if candidates exist.
     */
    public function getCandidates() {
        $query = $this->_ci->db->select("*")->from("candidate")->get();
        if ($query->num_rows() > 0) {
            $candidates = array();
            foreach ($query->result() as $row) {
                $candidates[] = $this->createObjectFromData($row);
            }
            return $candidates;
        }
        return false;
    }

    /**
     * Returns all the candidates as a JSON-compatible array.
     */
    public function getCandidatesJSON() {
        $query = $this->_ci->db->select("*")->from("candidate")->get();
        if ($query->num_rows() > 0) {
            $candidates = array();
            foreach ($query->result() as $row) {
                $candidates[] = $this->createJSONObjectFromData($row);
            }
            return $candidates;
        }
        return false;
    }

    /**
     * Creates a candidate_model object from the given data.
     * @param type $row The object containing the data.
     * @return \Candidate_Model
     */
    public function createObjectFromData($row) {
        $candidate = new Candidate_Model();
        $candidate->setId($row->id);
        $candidate->setUser($this->_ci->user_factory->getUser($row->userid));
        $candidate->setArea($this->_ci->area_factory->getArea($row->areaid));
        $candidate->setParty($this->_ci->party_factory->getParty($row->partyid));
        $candidate->setEducation($this->_ci->education_factory->getEducation($row->educationid));
        return $candidate;
    }

    /**
     * Creates a JSON compatible object from the given data.
     */
    public function createJSONObjectFromData($row) {
        $row->id = (int)$row->id;
        $row->name = $this->_ci->user_factory->getUser($row->userid)->getFullName();
        $row->area = $this->_ci->area_factory->getArea($row->areaid)->getName();
        $row->party = $this->_ci->party_factory->getParty($row->partyid)->getName();
        $row->education = $this->_ci->education_factory->getEducation($row->educationid)->getName();
        return $row;
    }

}
