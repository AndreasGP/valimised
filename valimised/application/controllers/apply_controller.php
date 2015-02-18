<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply_Controller extends CI_Controller {

	public function index()
	{   
                
                $this->load->library("area_factory");
                $this->load->library("party_factory");
                $data = array(
                    //Fetch all areas
                    "areas" => $this->area_factory->getArea(),
                    //Fetch all parties
                    "parties" => $this->party_factory->getParty(),
                        
                    "scripts" => array("js/applyform.js")
        );
                
		$this->load->view('templates/header.php', $data);
		$this->load->view('templates/navbar.php');
		$this->load->view('apply.php', $data);
		$this->load->view('templates/footer.php');
	}
}
