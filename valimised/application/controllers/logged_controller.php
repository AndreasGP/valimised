<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logged_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
        $this->load->library('facebook');
    }

    public function redirect($redirectURL) {

        $data = array(
            //Title of the page
            "title" => "Sisse logitud",
        );

        $this->load->helper('url');
        $this->load->library('facebook');
        $this->load->view('templates/header.php', $data);
        $fbdata = $this->facebook->getLoginData();
        $this->load->view('templates/navbar.php', $fbdata);

        if ($fbdata['user_profile']['verified'] == true) {
            $userQuery = $this->db->select("*")->from("user")->where("email", $fbdata['user_profile']['email'])->get();

            if ($userQuery->num_rows() === 1) {
               $this->load->view('home', array("event" => "logged"));
               header("refresh:3;url=http://morsakabi.planet.ee/valimised/" . "$redirectURL");
            } else {
                $selectedArea = $this->input->get("area");
                
                if ($selectedArea == 0) {
                    //No area was selected
                    $this->load->library("area_factory");
                    $this->load->view('home', array("event" => "firstlogin",
                        "redirectURL" => $redirectURL,
                        "areas" => $this->area_factory->getArea()));
                } else {
                    //user has selected an area
                    //Create a user
                    $userdata = array(
                        'id' => ('NULL'),
                        'areaid' => $selectedArea,
                        'firstname' => $fbdata['user_profile']['first_name'],
                        'lastname' => $fbdata['user_profile']['last_name'],
                        'email' => $fbdata['user_profile']['email']
                    );
                    $this->db->insert('user', $userdata);
                    $this->load->view('home', array("event" => "logged"));
                    header("refresh:3;url=http://morsakabi.planet.ee/valimised/" . "$redirectURL");
                }
            }


        } else {
            //User not properly logged in, alternative behaviour
            $this->load->view('home', array("event" => "fail"));
        }
        $this->load->view('templates/footer.php');
    }

}
