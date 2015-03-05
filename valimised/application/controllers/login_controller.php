<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
    }

    public function login() {
        $this->load->helper('url');
        $this->load->view('templates/header.php');
        $this->load->library('facebook');
        $this->load->view('templates/navbar.php', $this->facebook->getLoginData());
        $this->load->view('login', $this->facebook->getLoginData());
        $this->load->view('templates/footer.php');
    }

    public function logout() {

        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('welcome/login');
    }

    public function modal() {
        $this->load->helper('url');
        $this->load->library('facebook');
        $this->load->view('loginmodal.php', $this->facebook->getLoginData());
    }

}
