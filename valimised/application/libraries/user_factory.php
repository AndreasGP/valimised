<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_Factory {

    private $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model("user_model");
        $this->_ci->load->library("area_factory");
    }

    public function getUser($id = 0) {
        if ($id > 0) {
            //Getting an individual user
            $query = $this->_ci->db->get_where("user", array("id" => $id));
            if ($query->num_rows() > 0) {
                return $this->createObjectFromData($query->row());
            }
            return false;
        } else {
            //Getting all the users
            $query = $this->_ci->db->select("*")->from("user")->get();
            if ($query->num_rows() > 0) {
                $users = array();
                foreach ($query->result() as $row) {
                    $users[] = $this->createObjectFromData($row);
                }
                return $users;
            }
            return false;
        }
    }
    
        public function getIdbyField($fieldname, $fieldvalue){
        $query = $this->_ci->db->select("TOP 1 id")->from("user")->where([$fieldname => $fieldvalue]);
            if ($query->num_rows() > 0) {
                return (int)$query->result()[0]->id;
            }
            return false;
    }

    public function createObjectFromData($row) {
        $user = new User_Model();
        $user->setId($row->id);
        $user->setFirstName($row->firstname);
        $user->setLastName($row->lastname);
        $user->setArea($this->_ci->area_factory->getArea($row->areaid));
        return $user;
    }

}
