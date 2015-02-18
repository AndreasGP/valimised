<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vote_Factory {

    private $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model("vote_model");
        $this->_ci->load->library("user_factory");
    }

    /**
     * Returns a vote_model instance with the given ID.
     * @param type $voterid Voter ID, default 0
     * @return boolean False, if nothing was found, vote_model if it exists.
     */
    public function getVote($voterid = 0) {
        $query = $this->_ci->db->get_where("vote", array("voterid" => $voterid));
        if ($query->num_rows() > 0) {
            return $this->createObjectFromData($query->row());
        }
        return false;
    }
    
     /**
     * Returns all the votes as an array of vote_model instances
     * @return boolean False, if nothing was found, array if votes exist.
     */
    public function getVotes() {
        $query = $this->_ci->db->select("*")->from("vote")->get();
        if ($query->num_rows() > 0) {
            $votes = array();
            foreach ($query->result() as $row) {
                $votes[] = $this->createObjectFromData($row);
            }
            return $votes;
        }
        return false;
    }

    
    /**
     * Returns all the candidates as a JSON-compatible array.
     */
    public function getVotesJSON() {
        $query = $this->_ci->db->select("*")->from("vote")->get();
        if ($query->num_rows() > 0) {
            $votes = array();
            foreach ($query->result() as $row) {
                $votes[] = $this->createJSONObjectFromData($row);
            }
            return $votes;
        }
        return false;
    }
    
    
    public function createObjectFromData($row) {
        $vote = new Vote_Model();
        $vote->setCandidateId($row->candidateid);
        $vote->setVoterId($row->voterid);    
        $vote->setDate($row->date);
        return $vote;
    }
    
    /**
     * Creates a JSON compatible object from the given data.
     */
    public function createJSONObjectFromData($row) {
        $row->candidate = $this->_ci->user_factory->getUser($row->candidateid)->getFullName();
        $row->voter = $this->_ci->user_factory->getUser($row->voterid)->getFullName();
        $row->date = $this->getVote($row->voterid)->getDate($row->date);
        return $row;
    }

}
