<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PatientData extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('PatientDataModel'));
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$output['userdata'] = $this->PatientDataModel->displaydata();
		$this->load->view('patientdata_view', $output);
	}

	public function updateData()
	{

		$this->form_validation->set_rules('nev', 'Név', array('required'));
		$this->form_validation->set_rules('lakcim', 'Lakcím', array('required'));
		$this->form_validation->set_rules('telefonszam', 'Telefonszám', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', array('required', 'valid_email'));
		$this->form_validation->set_rules('tajszam', 'Taj szám', array('required', 'regex_match[/^([0-9]{3}-[0-9]{3}-[0-9]{3})$/]'));


		if ($this->form_validation->run() === FALSE) {
			
			$output['userdata'] = $this->PatientDataModel->displaydata();
			$this->load->view('patientdata_view', $output);

		} else {
			$nev = $this->input->post('nev');
			$lakcim = $this->input->post('lakcim');
			$telefonszam = $this->input->post('telefonszam');
			$email = $this->input->post('email');
			$tajszam = $this->input->post('tajszam');

			$this->PatientDataModel->update($nev, $lakcim, $telefonszam, $email, $tajszam);

			redirect('PatientData/index');
		}
	}

	
}
