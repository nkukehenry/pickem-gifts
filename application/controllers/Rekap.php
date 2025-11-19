<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('M_Rekap');
		$this->model = $this->M_Rekap;
	}

	public function index()
	{
		redirect( base_url() );
	}

	public function matches()
	{
		$data['matches'] = $this->model->list_all();
		$this->load->view('matches', $data);
	}

}

/* End of file Rekap.php */
/* Location: ./application/controllers/Rekap.php */