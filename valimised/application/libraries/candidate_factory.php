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
    public function getCandidatesJSON($areaid = -1) {
        if ($areaid === -1) {
            $query = $this->_ci->db->select("candidate.id, user.firstname, user.lastname, party.name as party")
                    ->from("candidate")
                    ->join('user', 'candidate.userid = user.id')
                    ->join('party', 'candidate.partyid = party.id')
                    ->get();
        } else {
            $query = $this->_ci->db->select("candidate.id, user.firstname, user.lastname, area.name as area, party.name as party")
                    ->from("candidate")
                    ->join('user', 'candidate.userid = user.id')
                    ->join('party', 'candidate.partyid = party.id')
                    ->join('area', 'candidate.areaid = area.id')
                    ->where('area.id', $areaid)
                    ->get();
        }
        if ($query->num_rows() > 0) {
            $candidates = array();
            foreach ($query->result() as $row) {
                //Transform string ID to numerical ID
                $row->id = (int) $row->id;
                $candidates[] = $row;
            }
            return $candidates;
        }
        return false;
    }

    /**
     * Returns the candidate as a JSON-compatible object.
     */
    public function getCandidateJSON($id = 1) {
        $query = $this->_ci->db->select("candidate.id, user.firstname, user.lastname, party.name as party")
                ->from("candidate")
                ->join('user', 'candidate.userid = user.id')
                ->join('party', 'candidate.partyid = party.id')
                ->where('candidate.id', $id)
                ->get();
        if ($query->num_rows() > 0) {
            return $query->result()[0];
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
        $candidate->setJob($row->job);
        $candidate->setBirthday($row->birthdate);
        $candidate->setDescription($row->description);
        return $candidate;
    }

}
