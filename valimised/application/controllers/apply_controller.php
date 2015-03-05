<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply_Controller extends CI_Controller {

	public function index()
	{   
                $this->load->helper('url');
                $this->load->library("area_factory");
                $this->load->library("party_factory");
                $this->load->library("education_factory");
                $data = array(
                    //Fetch all areas
                    "areas" => $this->area_factory->getArea(),
                    //Fetch all parties
                    "parties" => $this->party_factory->getParty(),
                    //Fetch all educations
                    "educations" => $this->education_factory->getEducation(),
                    "scripts" => array("/valimised/js/ApplyCtrl.js", "/valimised/js/libs/fileinput.min.js",
                        "/valimised/js/BirthdayCtrl.js"),
                    "styles" => array("/valimised/css/fileinput.css")
        );
                
		$this->load->view('templates/header.php', $data);
                $this->load->library('facebook');
		$this->load->view('templates/navbar.php', $this->facebook->getLoginData());
		$this->load->view('apply.php', $data);
		$this->load->view('templates/footer.php');
	}
        
        public function apply(){
            $nimi = $this->input->post('firstname');
            echo $nimi;
        }
}
