<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Results_Factory {

    private $_ci;

    function __construct() {
        $this->_ci = & get_instance();
    }
    
    public function getGeneralResults() {
        $query = $this->_ci->db->select("candidate.id as candidateid, count(*) as number, CONCAT(user.firstname, ' ', user.lastname) as name", FALSE)
                ->from("user")
                ->join("candidate", "candidate.userid = user.id")
                ->join("vote", "vote.candidateid = candidate.id")
                ->group_by("candidate.id")
                ->get();
        $votes = array();
        foreach ($query->result() as $row) {
            $row->number = (int) $row->number;
            $votes[] = $row;
        }
        return $votes;
    }
    
    public function getGeneralPartyResults() {
        $query = $this->_ci->db->select("party.id as partyid, count(*) as number, party.name")
                ->from("vote")
                ->join("candidate", "candidate.id = vote.candidateid")
                ->join("party", "party.id = candidate.partyid")
                ->group_by("party.id")
                ->get();
        $votes = array();
        foreach ($query->result() as $row) {
            $row->number = (int) $row->number;
            $votes[] = $row;
        }
        return $votes;
    }
    
        public function getPartyResults($areaid = 0) {
        $query = $this->_ci->db->select("party.id as partyid, count(*) as number, party.name")
                ->from("vote")
                ->join("candidate", "candidate.id = vote.candidateid")
                ->join("party", "party.id = candidate.partyid")
                ->join("area", "area.id = candidate.areaid")
                ->where("area.id", $areaid)
                ->group_by("party.id")
                ->get();
        $votes = array();
        foreach ($query->result() as $row) {
            $row->number = (int) $row->number;
            $votes[] = $row;
        }
        return $votes;
    }
    
    public function getGeneralCandidateResults() {
        $query = $this->_ci->db->select("candidate.id as candidateid, count(*) as number, CONCAT(user.firstname, ' ', user.lastname) as name, area.id as areaid, area.name as areaname, party.name as partyname", FALSE)
                ->from("user")
                ->join("candidate", "candidate.userid = user.id")
                ->join("vote", "vote.candidateid = candidate.id")
                ->join("area", "area.id = candidate.areaid")
                ->join("party", "party.id = candidate.partyid")
                ->group_by("candidate.id")
                ->get();
        $votes = array();
        foreach ($query->result() as $row) {
            $row->number = (int) $row->number;
            $votes[] = $row;
        }
        return $votes;
    }
    
    
    public function getCandidateResults($areaid = 0){
        $query = $this->_ci->db->select("candidate.id as candidateid, count(*) as number, CONCAT(user.firstname, ' ', user.lastname) as name", FALSE)
                ->from("user")
                ->join("candidate", "candidate.userid = user.id")
                ->join("vote", "vote.candidateid = candidate.id")
                ->join("area", "candidate.areaid = area.id")
                ->where("area.id", $areaid)
                ->group_by(array("candidate.id", "area.id"))
                ->get();
        $votes = array();
        foreach($query->result() as $row){
            $row->number = (int)$row->number;
            $votes[] = $row;
        }
        return $votes;
    }

        public function getCandidatePartyResults($partyid = 0){
        $query = $this->_ci->db->select("candidate.id as candidateid, count(*) as number, CONCAT(user.firstname, ' ', user.lastname) as name, party.name as partyname", FALSE)
                ->from("user")
                ->join("candidate", "candidate.userid = user.id")
                ->join("vote", "vote.candidateid = candidate.id")
                ->join("party", "candidate.partyid = party.id")
                ->where("party.id", $partyid)
                ->group_by(array("candidate.id", "party.id"))
                ->get();
        $votes = array();
        foreach($query->result() as $row){
            $row->number = (int)$row->number;
            $votes[] = $row;
        }
        return $votes;
    }
}
