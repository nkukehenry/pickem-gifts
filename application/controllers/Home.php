<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('HomeModel');
		$this->model = $this->HomeModel;
	}

	public function index()
	{
		$id = $this->session->userdata('id');

		if(empty($id)){
			redirect( base_url() );
		}

		$data['participants'] = $this->model->countParticipants();
		$data['departments'] = $this->model->countDepartments();
		$this->load->view('home', $data);
	}

	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */