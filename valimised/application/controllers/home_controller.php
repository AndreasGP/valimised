<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_Controller extends CI_Controller {

    public function index($event = NIL) {
        $this->output->cache(10);
        $data = array(
            //Title of the page
            "title" => "E-valimised 2015",
        );
        $this->load->helper('url');
        $this->load->library('facebook');
                
        if($event === "logout") {
            $this->facebook->destroySession();
        }
        
        $this->load->view('templates/header.php', $data);
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('home.php', array("event" =>$event));
        $this->load->view('templates/footer.php');
    }
}
