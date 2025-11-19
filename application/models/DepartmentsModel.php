<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentsModel extends CI_Model {

	public function add_new($name) {
		$data = array(
			'department_name' => $name
		);
		$this->db->insert('departments', $data);
		$this->session->set_flashdata('msg_alert', 'Department added successfully');
	}

	public function update($id,$name) {
		$data = array(
			'department_name' => $name
		);
		$this->db->where('id', $id)->update('departments', $data);
		$this->session->set_flashdata('msg_alert', 'Department added successfully');
	}

	public function delete($id) {
		$this->db->delete('departments', array('id' => $id));
	}

	public function get_data($id) {
		$q=$this->db->select('*')->from('departments')->where('id', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/') );
		}
		return $q->row();
	}

	public function list_all() {
		$q=$this->db->select('*')->get('departments');
		return $q->result();
	}

}

/* End of file DataMaster_MataKuliah.php */
/* Location: ./application/models/DataMaster_MataKuliah.php */