<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

	public function countParticipants() {
		$q=$this->db->select('*')->get('participants');
		return $q->num_rows();
	}

	public function countDepartments() {
		$q=$this->db->select('*')->get('departments');
		return $q->num_rows();
	}

}

/* End of file M_Home.php */
/* Location: ./application/models/M_Home.php */