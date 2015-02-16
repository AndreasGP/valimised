<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Areas extends CI_Controller {

    public function index() {
        echo "This is the index!";
    }

    public function show($areaId = 0) {
        //Always ensure an integer
        $areaId = (int) $areaId;
        $this->load->library("area_factory");
        //Create a data array so we can pass information to the view
        $data = array(
            "areas" => $this->area_factory->getArea($areaId)
        );
        //Dump out the data array
        var_dump($data);
    }

}
