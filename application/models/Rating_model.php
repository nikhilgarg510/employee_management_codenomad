<?php
Class Rating_model extends CI_Model
 {
      
      public function __construct(){ 
        $this->load->database();
	}
	
	public function team_mem(){
		$team_lead_id = $this->session->id;
		$this->db->where('team_lead_id', $team_lead_id);
		$this->db->from('team_hierarchy');
		$this->db->join('rating_current_week', 'team_hierarchy.team_mem_id = rating_current_week.employee_id');
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function update_rating(){
		 $data = $this->input->post('rating');
		 $this->db->update_batch('rating_current_week', $data, 'employee_id'); 
	 }
	 
	 //Get the ratings of all the employees
	 
	 public function get_all_employee_rating($id = null){
		 if($id != null){
			 $this->db->where('employee_id', $id);
		 }
		 $query = $this->db->get('rating_current_week');
		 $result = $query->result();
		 return $result;
	 }
	 
	
	 public function get_current_user_hr_rating(){
		 $employee_id = $this->input->post('val');
		 $this->db->where('employee_id', $employee_id);
		 $this->db->select('employee_id, rating_hr');
		 $this->db->from('rating_current_week');
		 $query = $this->db->get();
		 $result = $query->result();
		 return $result;
	 }
	 
	 public function update_hr_rating(){
		 $data = array('rating_hr' => $this->input->post('rating'));
		 $this->db->where('employee_id', $this->input->post('employee_id'));
		 $this->db->update('rating_current_week', $data); 
	 }
	 
	 public function specific_rating($start_date){
		 $this->db->where('week_start', $start_date);
		 $this->db->where('employee_id', $this->session->userdata('id'));
		 $query = $this->db->get('rating_employee');
		 $result = $query->result();
		 return $result;
	 }
	 
	 public function average_rating($start_date, $end_date){
		 //$start = explode("/", $this->input->post('from'));
		 //$start_date = $start[2]."-".$start[0]."-".$start[1];
		 
		 
		 $this->db->where('employee_id', $this->session->userdata('id'));
		 $this->db->where('week_start >=',$start_date);
		 $this->db->where('week_end <=',$end_date);
		 $query = $this->db->get('rating_employee');
		 $result = $query->result();
		 return $result;
	 }
	
 }
 
 ?>