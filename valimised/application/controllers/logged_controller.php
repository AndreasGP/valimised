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
                
        $event = "logged";
        $this->load->helper('url');
        $this->load->library('facebook');
        $this->load->view('templates/header.php', $data);      
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('home', array("event" =>$event));
        $this->load->view('templates/footer.php');

        header( "refresh:3;url=http://morsakabi.planet.ee/valimised/"."$redirectURL" );
        //redirect($redirectURL, 'refresh');
    }


}
