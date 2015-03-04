<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home_Controller extends CI_Controller {

    public function index($event = NIL) {
        $this->load->helper('url');
                $this->load->library('facebook');
        if($event === "logout") {
            $this->facebook->destroySession();
        }
        
        $this->load->view('templates/header.php');
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('home.php', array("event" =>$event));
        $this->load->view('templates/footer.php');
    }
}
