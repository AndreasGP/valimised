<?php

class ApplyForm extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
                
                $this->form_validation->set_rules('firstname', 'Eesnimi', 'required');
                $this->form_validation->set_rules('lastname', 'Perekonnanimi', 'required');
                $this->form_validation->set_rules('date', 'Sünniaeg', 'required');
                $this->form_validation->set_rules('education', 'Haridus', 'required');
                $this->form_validation->set_rules('job', 'Töökoht', 'required');
                
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('apply');
		}
		else
		{
			$this->load->view('formsuccess');
		}
	}
}
?>

