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
    
    public function getIdbyField($fieldname, $fieldvalue){
        $query = $this->_ci->db->select("TOP 1 id")->from("party")->where([$fieldname => $fieldvalue]);
            if ($query->num_rows() > 0) {
                return (int)$query->result()[0]->id;
            }
            return false;
    }
    
    public function getIdbyName($fieldvalue){

            $query = $this->_ci->db->select("*")
                    ->from("party")
                    ->where('name', $fieldvalue)->get();
                  
                //Loop through each row returned from the query
                foreach ($query->result() as $row) {
                    return $row->id;
                }
    }
    
    public function getPartyStatistics(){
        $query = $this->_ci->db->select("count(*) as number, party.name")
                ->from("vote")
                ->join("candidate", "candidate.id = vote.candidateid")
                ->join("party", "party.id = candidate.partyid")
                ->group_by("candidate.id")
                ->get();
        $partyvotes = array();
        foreach($query->result() as $row){
            $row->number = (int)$row->number;
            $partyvotes[] = $row;
        }
        return $partyvotes;
    }

    public function createObjectFromData($row) {
        $party = new Party_Model();
        $party->setId($row->id);
        $party->setName($row->name);
        $party->setShort($row->short);
        return $party;
    }

}
