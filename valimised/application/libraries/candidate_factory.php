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
    }

    public function getCandidate($id = 0) {
        if ($id > 0) {
            //Getting an individual candidate
            $query = $this->_ci->db->get_where("candidate", array("id" => $id));
             if ($query->num_rows() > 0) {
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the candidates
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
    }

    public function createObjectFromData($row) {
        $candidate = new Candidate_Model();
        $candidate->setId($row->id);
        $candidate->setUser($this->_ci->user_factory->getUser($row->userid));
        $candidate->setArea($this->_ci->area_factory->getArea($row->areaid));
        $candidate->setParty($this->_ci->party_factory->getParty($row->partyid));
        return $candidate;
    }

}
