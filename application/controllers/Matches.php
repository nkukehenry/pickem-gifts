<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matches extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('ParticipantsModel');
		$this->participantsMdl = $this->ParticipantsModel;

		$this->load->model('DepartmentsModel');
		$this->departMdl = $this->DepartmentsModel;

		$this->load->model('ReportModel');
		$this->reportMdl = $this->ReportModel;
	}

	public function index()
	{
		redirect( base_url() );
	}

	public function participants()
	{
		$data['participants'] = $this->participantsMdl->list_all();
		
	if($_GET['export']==1){
		    
    		 $csvFileName = 'santa_participants.csv';
    
            // Set the headers for a CSV file download
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $csvFileName . '"');
            
            // Open the output stream
            $output = fopen('php://output', 'w');
            
            // Loop through the array and write each row to the output stream
            foreach ($data['participants'] as $row) {
                $data_row =[
                    "NAME"=>$row->name,
                    //"PIN"=>$row->id
                    "DEPARTMENT"=>$row->department_name
                    ];
                fputcsv($output,$data_row);
            }
            
            // Close the output stream
            fclose($output);
            
            // Exit to prevent additional output
            exit;
	    }
		
	   $this->load->view('participants', $data);
	}

	public function departments()
	{
		$data['departments'] = $this->departMdl->list_all();
		$this->load->view('departments', $data);
	}

	public function report()
	{
		$data['rows'] = $this->reportMdl->matches();
		$this->load->view('report', $data);
	}

	public function start()
	{
	    $client_data = $this->session->all_userdata();
	    
      foreach ($client_data as $key => $value) {
          $this->session->unset_userdata($key);
      }
      
 
      $this->session->sess_destroy();
      
	  $this->load->view('start');
	}

	public function starter(){
		
		$email     = $this->input->post('email');
		$pin     = $this->input->post('pin');
		$person    = $this->participantsMdl->getParticipantByEmail($email);
		$personObj = (Object) $person;

		if($email =="adminzero@mutindo.com"){
		    
			$admin = array('name'=>'admin','id'=>9000000);
			$this->session->set_userdata($admin);
			redirect( base_url('admin') );
			
		}
		
		
	    
      	if($personObj->finished > 0){
		    
		   $this->session->set_flashdata('msg_alert', 'Looks like you already know your match. If we are wrong, login again.');
		   redirect( base_url('matches/start') );
		   exit();
		}
	
  
		if(isset($person['id'])):
			$this->session->set_userdata($person);
			redirect( base_url('matches/picker') );
		else:
			$this->session->set_flashdata('msg_alert', 'Participant account not found');
			redirect( base_url('matches/start') );
		endif;
	}

	public function picker()
	{
		$data['participants'] = $this->participantsMdl->list_all();
		$user = (Object) $this->session->userdata();
		$data['user']  = $user;
		
		if(empty(@$user->id)){
		    
		    $this->session->set_flashdata('msg_alert', 'Session expired, login again.');
			redirect( base_url('matches/start') );
		}

		if($user->finished > 0){
            
            
			    $data['choice'] = (Object) $this->participantsMdl->getParticipantById($user->finished);
			    $data['wishes'] =  $this->participantsMdl->getWishesByUserId($user->finished);
			    $data['user']   = $user;
			    
			    
			    $this->load->view('picked',$data);
		}
		else{
			shuffle($data['participants']);
			$this->load->view('picker', $data);
		}
	}
	
	public function mywishes()
	{
		$user = (Object) $this->session->userdata();
		$data['user']  = $user;

            
		$data['wishes'] =  $this->participantsMdl->getWishesByUserId($user->id);
		$data['user']   = $user;
			    
		$this->load->view('mywishes',$data);
	}
	
	
	public function save_wishes()
	{
		$user   = (Object) $this->session->userdata();
	    $data = $this->input->post();
	    
	    $this->participantsMdl->saveWishes($data);
		
		redirect("matches/mywishes");
	}

	public function pick($id)
	{
		$user   = (Object) $this->session->userdata();
		$picked = $this->participantsMdl->checkUserMatched($id);
		
		$sess_id = $this->session->userdata('id');

		if(empty($sess_id)){
		    $this->session->set_flashdata('msg_alert', 'Session Expired');
			redirect( base_url() );
		}
		
		if($user->finished >0){
		    
			$person = (Object) $this->participantsMdl->getParticipantById($user->finished);
		}
		else{
		
    		if($picked){
    			$person = null;
    		}else{
    			$person = $this->participantsMdl->pickMatch($id);
    			$session_data = $this->participantsMdl->getParticipantByEmail($user->email);
    			$this->session->set_userdata($session_data);
    		}
		}
		
    	$data['choice'] = (Object) $person;
    	$data['user']   = $user;
    	redirect("matches/picker");
    	
		//$this->load->view('picked',$data);
	}

	public function do_upload()
	{
			$config['upload_path']          = './assets/uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['max_size']             = 3000;
		//	$config['max_width']            = 500;
		//	$config['max_height']           = 500;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('photo'))
			{
					return null;
			}
			else
			{
					$data =  $this->upload->data();
					return $data;
			}
	}

	public function add_new() {

		if( empty($this->uri->segment('3'))) {
			redirect( base_url('admin') );
		}
		$name=$this->uri->segment('3');

		$data['departments']  = $this->departMdl->list_all();
			
		switch ($name) {
			case 'participant':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$nama_participants= $this->security->xss_clean( $this->input->post('nama_participants') );
					// validasi
					$this->form_validation->set_rules('name', 'Participant Name', 'required');
					$this->form_validation->set_rules('department_id', 'Participant Name', 'required');
					$this->form_validation->set_rules('email', 'Participant Email', 'required');
				
					$postData  = $this->input->post();
					$photoData = $this->do_upload();


					if(isset($photoData['file_name'])){
						$postData['photo'] = $photoData['file_name'];
					}

					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', 'Failed to create new participant data');
						redirect( base_url('matches/add_new/' . $name) );
					}
					// to-do
					$this->participantsMdl->add_new($postData);
					redirect( base_url('matches/participants') );
				}
				break;
			case 'department':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$name= $this->security->xss_clean( $this->input->post('department_name') );
					// validasi
					$this->form_validation->set_rules('department_name', 'Department Name required', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', 'Failed to create a department');
						redirect( base_url('matches/add_new/' . $name) );
					}
					// to-do
					$this->departMdl->add_new($name);
					redirect( base_url('matches/departments') );
				}
			break;
			default:
				redirect( base_url('admin') );
			break;
			
		}

		$data['name'] = $name;
		$data['departments'] = $this->departMdl->list_all();

		$this->load->view('datamaster_addnew', $data);

	}

	public function edit() {

		if( empty($this->uri->segment('3'))) {
			redirect( base_url('admin') );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url('admin') );
		}

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');
		
		switch ($name) {
			case 'participant':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
				    
					// validasi
					$this->form_validation->set_rules('id', 'Participant ID', 'required');
					$this->form_validation->set_rules('name', 'Participant Name', 'required');
					//$this->form_validation->set_rules('department_id', 'Participant Name', 'required');
					$this->form_validation->set_rules('email', 'Participant Tel', 'required');
					
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', 'Failed to update record');
						redirect( base_url('matches/edit/'.$name.'/' . $id) );
					}
					
					$postData  = $this->input->post();
					$photoData = $this->do_upload();


					if(isset($photoData['file_name'])){
						$postData['photo'] = $photoData['file_name'];
					}
					
					// to-do
					$this->participantsMdl->update($postData);
					redirect( base_url('matches/participants') );
				}
				
				$participant   = $this->participantsMdl->get_data($id);
				$data['id']    = $participant->id;
				$data['username']  = $participant->name;
				$data['email'] = $participant->email;
		        $data['photo'] = $participant->photo;
		        
				break;
			case 'department':
				if( $_SERVER['REQUEST_METHOD'] == 'POST') {
					$id= $this->security->xss_clean( $this->input->post('id') );
					$name= $this->security->xss_clean( $this->input->post('department_name') );
					// validasi
					$this->form_validation->set_rules('id', 'Department ID', 'required');
					$this->form_validation->set_rules('department_name', 'Department name', 'required');
					if(!$this->form_validation->run()) {
						$this->session->set_flashdata('msg_alert', 'Failed to create department');
						redirect( base_url('matches/edit/'.$name.'/' . $id) );
					}
					// to-do
					$this->departMdl->update($id,$name);
					redirect( base_url('matches/departments') );
				}

				$depart = $this->departMdl->get_data($id);
				$data['id'] = $depart->id;
				$data['department_name'] = $depart->department_name;

				break;
			default:
			 redirect( base_url('admin') );
			break;
		}

		$data['id']    = $id;
		$data['name']  = $name;

		$this->load->view('datamaster_edit', $data);

	}

	public function delete() {

		if( empty($this->uri->segment('3'))) {
			redirect( base_url('admin') );
		}

		if( empty($this->uri->segment('4'))) {
			redirect( base_url('admin') );
		}

		$name=$this->uri->segment('3');
		$id=$this->uri->segment('4');

		switch ($name) {
			case 'participant':
				$this->participantsMdl->delete($id);
				$this->session->set_flashdata('msg_alert', 'Delete Successfully');
				redirect( base_url('matches/participants') );
				break;
			case 'department':
				$this->departMdl->delete($id);
				$this->session->set_flashdata('msg_alert', 'Delete Successfully');
				redirect( base_url('matches/departments') );
				break;
			default:
				redirect( base_url('admin') );
				break;
		}

	}
	
	function sendEmail(){
	    
	$this->load->library('email');
    $this->email->from('info@mutindo.com', 'Interswitch GIFT Exchange');
    $this->email->to('henry.nkuke@interswitchgroup.com');
    //$this->email->bcc('sharon.mulangira@interswitchgroup.com');
    
    $this->email->subject('Your Match');
    $this->email->message('Your match is Henry');
    
    $this->email->send();
	}

}

/* End of file Data_Master.php */
/* Location: ./application/controllers/Data_Master.php */