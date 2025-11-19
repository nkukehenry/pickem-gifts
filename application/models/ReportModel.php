<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReportModel extends CI_Model {

	public function matches() {
		$this->db->where('matched is not null');
		$this->db->join('departments','departments.id=participants.department_id');
		$q = $this->db->get('participants');
		return $q->result();
	}

}

