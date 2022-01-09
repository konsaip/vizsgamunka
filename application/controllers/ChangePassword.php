<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ChangePassword extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('ChangePasswordModel'));
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$this->load->view('changepassword_view');
	}



	public function modifyPassword()
	{

		$this->form_validation->set_rules('ujjelszo1', 'Új jelszó', 'trim|required');
		$this->form_validation->set_rules('ujjelszo2', 'Új jelszó ismét', 'trim|required|matches[ujjelszo1]');

		if ($this->form_validation->run() === TRUE) {
			$ujjelszo1 = $this->input->post('ujjelszo1');
			$ujjelszo2 = $this->input->post('ujjelszo2');
			$hashjelszo = hash('sha512', $ujjelszo1);
			$this->ChangePasswordModel->updatePassword($hashjelszo);

			$message['modified'] = "<h4 style='color:green'>Sikeresen módosította jelszavát!</h4>";

			$this->load->view('changepassword_view',@$message);
		} else {
			
			$this->load->view('changepassword_view');
		}
	}
}
