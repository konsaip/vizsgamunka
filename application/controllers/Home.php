<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('LoginModel'));
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{

		if ($this->session->has_userdata('user')) {


			$this->load->view('dashboard_view');
		} else {

			$this->load->view('signup_signin_view');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('taj', 'Taj szám', array('trim', 'required', 'regex_match[/^([0-9]{3}-[0-9]{3}-[0-9]{3})$/]'));
		$this->form_validation->set_rules('password', 'Jelszó', 'trim|required|callback_usercheck');

		if ($this->form_validation->run() === FALSE) {

			$this->load->view('signup_signin_view');
		} else {



			redirect('Home/index');
		}
	}
	public function usercheck()
	{

		$taj = $this->input->post('taj');
		$password = $this->input->post('password');
		$hashpassword = hash('sha512', $password);
		$userdata = $this->LoginModel->getTajPassword($taj, $hashpassword);
		if ($userdata === FALSE) {
			
					
			return false;
		} else {
			$this->session->set_userdata('user', $userdata);

			return true;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		redirect('Home/index');
	}
	public function registration()
	{

		$this->form_validation->set_rules('taj', 'TAJ szám', array('trim', 'required', 'regex_match[/^([0-9]{3}-[0-9]{3}-[0-9]{3})$/]', 'is_unique[paciens.tajszam]'));
		$this->form_validation->set_rules('password', 'Jelszó', 'trim|required|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('password2', 'Jelszó ismét', 'trim|required|matches[password]');



		if ($this->form_validation->run() === FALSE) {


			$this->load->view('signup_signin_view');
		} else {
			$taj = $this->input->post('taj');
			$password = $this->input->post('password');
			$hashpassword = hash('sha512', $password);
			$this->LoginModel->insertData($taj, $hashpassword);
			$message['success'] = "<p style='color:green'>Sikeres regisztráció!<br>Kérem,jelentkezzen be!</p>";
			$this->load->view('signup_signin_view', @$message);
		}
	}
}
