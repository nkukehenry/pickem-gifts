<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ParticipantsModel extends CI_Model {

	public function add_new($postdata) {
		$data = array(	
			'name' => $postdata['name'],
			'email' => $postdata['email'],
			'department_id' => $postdata['department_id'],
			'photo' => $postdata['photo']
	     );
		$this->db->insert('participants', $data);
		
		if(count($postdata['wishes']) > 0):
		    
		 $new_user = $this->getParticipantByEmail($data['email']);
		 
		 $wishes_data['wishes'] = $postdata['wishes'];
		 $wishes_data['id']     = $new_user['id'];
		 $this->saveWishes($wishes_data);
		 
		 endif;
		 
		$this->session->set_flashdata('msg_alert', 'Participant added succesfuly');
	}

	public function update($postdata) {
	    
	   
	    
	    if(isset($postdata['name'])){
	
	    $data = array(
			'name' => $postdata['name'],
			'email' => $postdata['email']
	     );
	     
	     if(isset($postdata['photo']))
			$data['photo'] = $postdata['photo'];
			
		if(isset($postdata['department_id']))
			$data['department_id'] = $postdata['department_id'];
		
			
		$this->db->where('id', $postdata['id'])->update('participants', $data);
		
		if(count($postdata['wishes']) > 0):
	
		 $wishes_data['wishes'] = $postdata['wishes'];
		 $wishes_data['id']     = $postdata['id'];
		 
		 
		 $this->saveWishes($wishes_data);
		 
		 endif;
		 
	   }
		 
		$this->session->set_flashdata('msg_alert', 'Participant updated succesfuly');
	}

	public function delete($id) {
		$q=$this->db->select('*')->from('participants')->where('id', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/') );
		}
		$this->db->delete('participants', array('id' => $id));
	}

	public function get_data($id) {
	    $this->db->join('departments','departments.id = participants.department_id');
		$q=$this->db->select('*')->from('participants')->where('participants.id', $id)->limit(1)->get();
		if( $q->num_rows() < 1 ) {
			redirect( base_url('/') );
		}
		return $q->row();
	}

	public function list_all() {
		$q=$this->db->select('*')->get('participants');
		return $q->result();
	}
	public function pickMatch($id){

		$this->markPicked($id);

		$q = $this->db->select('*')
		->from('participants')
		->join('departments','departments.id = participants.department_id')
		->where('participants.id', $id)
		->limit(1)->get();
		return $q->row();
	}
	
	public function getParticipantByEmailAndPin($email,$pin){
		$q = $this->db->select('participants.name,participants.finished,participants.email,participants.id,departments.department_name')
		->from('participants')
		->join('departments','departments.id = participants.department_id')
		->where('participants.email', $email)
		->where('participants.id', $pin)
		->limit(1)->get();
		return $q->row_array();
	}


	public function getParticipantByEmail($email){
		$q = $this->db->select('participants.name,participants.finished,participants.email,participants.id,departments.department_name')
		->from('participants')
		->join('departments','departments.id = participants.department_id')
		->where('participants.email', $email)
		->limit(1)->get();
		return $q->row_array();
	}

   

	public function getParticipantById($id){
		$q = $this->db->select('participants.name,participants.matched,participants.photo,participants.finished,participants.email,participants.id,departments.department_name')
		->from('participants')
		->join('departments','departments.id = participants.department_id')
		->where('participants.id', $id)
		->limit(1)->get();
		return $q->row_array();
	}
	

	
	public function getWishesByUserId($id){
	    
	    $this->db->where('participant_id',$id);
	    $q=$this->db->get('wishes');
	    return $q->result();
	}
	
	public function saveWishes($data){
	    
	    for($i=0;$i<count($data['wishes']);$i++){
	        
	        if(!empty($data['wishes'][$i])):
	       
	        $row['wish_name']      = $data['wishes'][$i];
	        $row['participant_id'] = $data['id'];
	        
	        $this->db->insert('wishes',$row);
	        
	        endif;
	        
	    }
	}

	private function markPicked($id){

		$matchedUser = $this->session->userdata('id');
		$data = array('id'=>$id,'matched'=>$matchedUser);
		$this->db->where('id',$id);
		$this->db->update('participants',$data);

		//mark user has finished
		$data = array('finished'=>$id,);
		$this->db->where('id',$matchedUser);
		$this->db->update('participants',$data);
	}

	public function checkUserMatched($userId){

	//	$userId =  $this->session->userdata('id');
		$this->db->where('id',$userId);
		$this->db->where('matched >0');
		$q = $this->db->get('participants')->row();
		return ($q->matched >0)?true:false;
	}

}

/* End of file DataMaster_Mahasiswa.php */
/* Location: ./application/models/DataMaster_Mahasiswa.php */