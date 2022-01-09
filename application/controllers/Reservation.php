<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservation extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('ReservationModel'));
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	public function index()
	{

		$data['datevacc']['userdata'] = $this->session->userdata('user');
		$data['datevacc']['date'] = $this->ReservationModel->getDate();
		$data['datevacc']['vaccine'] = $this->ReservationModel->getVaccineName();
		$data['datevacc']['reserv'] = $this->ReservationModel->getReservation();
		$data['datevacc']['data'] = $this->ReservationModel->displaydata($data['datevacc']['userdata']['id']);
		$this->load->view('reservation_view', $data['datevacc']);
	}



	public function insertUpdateDeleteData()
	{

		$this->form_validation->set_rules('paciensid', 'Páciens azonosító', 'is_unique[foglalas.paciensid]');
		if ($this->form_validation->run() === FALSE) {


			$data['datevacc']['userdata'] = $this->session->userdata('user');
			$data['datevacc']['data'] = $this->ReservationModel->displaydata($data['datevacc']['userdata']['id']);
			$oltas_neve = $data['datevacc']['data']['oltas_neve'];
			$keszleten_darab = $data['datevacc']['data']['keszleten_darab'];
			if ($keszleten_darab > 0) {
				$this->ReservationModel->addOneToQuantity($oltas_neve, $keszleten_darab);
			}






			$paciensid = $this->input->post('paciensid');
			$this->ReservationModel->delete($paciensid);
			redirect('Reservation/index');
		} else {



			$paciensid = $this->input->post('paciensid');
			$oltasid = $this->input->post('oltasid');
			$idopontid = $this->input->post('idopontid');

			$this->ReservationModel->insert($paciensid, $oltasid, $idopontid);


			$data['datevacc']['userdata'] = $this->session->userdata('user');
			$data['datevacc']['data'] = $this->ReservationModel->displaydata($data['datevacc']['userdata']['id']);
			$oltas_neve = $data['datevacc']['data']['oltas_neve'];
			$keszleten_darab = $data['datevacc']['data']['keszleten_darab'];
			if ($keszleten_darab > 0) {
				$this->ReservationModel->reduceQuantity($oltas_neve, $keszleten_darab);
				redirect('Reservation/index');
			} else {


				$data['datevacc']['userdata'] = $this->session->userdata('user');
				$data['datevacc']['date'] = $this->ReservationModel->getDate();
				$data['datevacc']['vaccine'] = $this->ReservationModel->getVaccineName();
				$data['datevacc']['reserv'] = $this->ReservationModel->getReservation();
				$data['datevacc']['data'] = $this->ReservationModel->displaydata($data['datevacc']['userdata']['id']);
				$data['datevacc']['errormessage'] = "<h4 style='color:red'>A készlet 0, már nem foglalható!</h4>";
				$this->load->view('reservation_view', $data['datevacc']);
			}
		}
	}

	public function delReg()
	{

		$data['datevacc']['userdata'] = $this->session->userdata('user');
		$paciensid = $data['datevacc']['userdata']['id'];



		$data['datevacc']['data'] = $this->ReservationModel->displaydata($data['datevacc']['userdata']['id']);
		@$oltas_neve = $data['datevacc']['data']['oltas_neve'];
		@$keszleten_darab = $data['datevacc']['data']['keszleten_darab'];
		$this->ReservationModel->addOneToQuantity($oltas_neve, $keszleten_darab);
		$this->ReservationModel->delete($paciensid);
		$this->ReservationModel->deleteRegistration($paciensid);


		$this->load->view('signup_signin_view.php');
	}
}
