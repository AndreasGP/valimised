<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vote_Factory {

    private $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model("vote_model");
    }

    public function getVote($voterid = 0) {
        //Are we getting an individual area or are we getting them all
        if ($voterid > 0) {
            //Getting an individual area
            $query = $this->_ci->db->get_where("vote", array("voterid" => $voterid));
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Pass the data to our local function to create an object for us and return this new object
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the areas
            $query = $this->_ci->db->select("*")->from("vote")->get();
            //Check if any results were returned
            if ($query->num_rows() > 0) {
                //Create an array to store areas
                $votes = array();
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    $votes[] = $this->createObjectFromData($row);
                }
                //Return the areas array
                return $votes;
            }
            return false;
        }
    }

    public function createObjectFromData($row) {
        $vote = new Vote_Model();
        $vote->setVoterId($row->voterid);
        $vote->setCandidateId($row->candidateid);
        $vote->setDate($row->date);
        return $vote;
    }

}
