<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
        $this->load->library('facebook');
    }

    public function login() {
        
                $data = array(
            //Title of the page
            "title" => "Sisselogimine",
        );
        $this->load->helper('url');
        $this->load->library('facebook');
        $this->load->view('templates/header.php', $data);      
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('login', $this->facebook->getLoginData());
        $this->load->view('templates/footer.php');
    }

    public function logout() {

        
        $this->load->library('facebook');

        // Logs off session from website
        //$this->facebook->destroySession();
        // Make sure you destory website session as well.

        
        //Does this even do anything?
        //redirect('home_controller/login');
    }

    public function modal() {
        $this->load->helper('url');
        $this->load->library('facebook');
        $this->load->library('session');
        
        $this->load->view('loginmodal.php', $this->facebook->getLoginData2($this->session->flashdata('fb')));
    }

}
