<?php
Class Employee_model extends CI_Model
 {
      
      public function __construct(){ 
        $this->load->database();
	}
	
	public function employee_add(){
		 	 
		 $last_row=$this->db->select('id')->order_by('id',"desc")->limit(1)->get('employee_user')->row();
		 //$this->db->from('employee_user');
		 //$query = $this->db->get();
		 //$data = $last_row->result();
		 
		 /*Insert in Employee tableBasic Info Starts Here*/
		 $next_id = $last_row->id + 1;
		 $employee_id_unaudited = str_pad($next_id, 5, "c000", STR_PAD_LEFT);
		 $data = array(
			'employee_id' => $employee_id_unaudited,
			'user_role_id' => $this->input->post('designation'),
			'password' => sha1('password'),
			'created_by' => $this->session->userdata('id'),
			'modified_by' => $this->session->userdata('id'),
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'employee_status' => 1,
			'relieving_date' => '0000-00-00'
		 );
		 $this->db->set('created_on', 'NOW()', FALSE);
		 $this->db->set('modified_on', 'NOW()', FALSE);
		 
		 $this->db->insert('employee_user', $data); 
		 $id = $this->db->insert_id();
		 
		 $employee_id_audited = str_pad($id, 5, "c100", STR_PAD_LEFT);
		 $updating_data = array('employee_id' => $employee_id_audited);
		 $this->db->where('id', $id);
		 $this->db->update('employee_user', $updating_data);
		 /*Insert in Employee tableBasic Info Ends Here*/
		 
		 /*Insert in Employee personal info starts here*/
		 $personal_data = array(
			'user_id' => $id,
			'permanent_address' => $this->input->post('permanent_address'),
			'communication_address' => $this->input->post('communication_address'),
			'email_id' => $this->input->post('personal_email_id'),
			'mobile_number' => $this->input->post('mobile_number')
		 );
		 
		 $this->db->insert('employee_personal_info', $personal_data);
		 
		 /*Insert in Employee personal info ends here*/
		 
		  /*Insert in Employee professional info starts here*/
		 
		 $joining_date_unformatted = $this->input->post('date_of_joining');
		 $increment_date_unformatted = $this->input->post('next_increment_due');
		 
		 $array_rep_joining = explode('-', $joining_date_unformatted);
		 $joining_date_formatted = $array_rep_joining[2]."-".$array_rep_joining[1]."-".$array_rep_joining[0];
		 
		 $array_rep_inc = explode('/', $increment_date_unformatted);
		 $increment_date_formatted = $array_rep_inc[1]."-".$array_rep_inc[0]."-01";
		 
		 $professional_data = array(
			'user_id' => $id,
			'email_id' => $this->input->post('company_email_id'),
			'date_of_joining' => $joining_date_formatted,
			'present_salary' => $this->input->post('salary'),
			'next_inc_due' => $increment_date_formatted,
			'last_inc_given' => $joining_date_formatted,
			'increment_sanction_by' => $this->session->userdata('id')
		 );
		 
		  $this->db->insert('employee_professional_info', $professional_data);
		  /*Insert in Employee professional info ends here*/
		  /*Insert in teamBuild/LEad info starts here*/
		  $team_hierarchy = array(
			'team_lead_id' => $this->input->post('team_lead'),
			'team_mem_id' => $id
		  );
		 $this->db->insert('team_hierarchy', $team_hierarchy);
		 
		 /*Insert some blank data to relate and initialise the table. */
		 
		 /*Insertion for the rating table starts here */
		 
		 $rating_data =  array(
			'employee_id' => $id
		  );
		  $this->db->insert('rating_current_week', $rating_data);
		 
		 /*Insertion for the rating table ends here */
		 
		 return $employee_id_audited;
		 
	 }
	 
	  public function get_complete_mem_info($id){
		 //$id = $employee_info_sec;
		 $this->db->where('employee_personal_info.user_id', $id);
		 $this->db->from('employee_personal_info');		 
		 $query = $this->db->get();
		 $data = $query->result();
		 $employee_info_sec = $data[0];
		 
		 $this->db->where('user_id', $id);
		 $this->db->from('employee_professional_info');		 
		 $query_pro = $this->db->get();
		 $data_pro = $query_pro->result();
		 $employee_info_sec->professional_email_id = $data_pro[0]->email_id;
		 $employee_info_sec->present_salary = $data_pro[0]->present_salary;
		 $array_next_inc_due = explode('-', $data_pro[0]->next_inc_due);
		 $next_inc_due_formatted = $array_next_inc_due[1]."/".$array_next_inc_due[0];
		 $employee_info_sec->next_inc_due = $next_inc_due_formatted;
		 $array_last_inc_given = explode('-', $data_pro[0]->last_inc_given);
		 $last_inc_given_formatted = $array_last_inc_given[2]."-".$array_last_inc_given[1]."-".$array_last_inc_given[0];
		 $employee_info_sec->last_inc_given = $last_inc_given_formatted;
		 
		 $this->db->where('id',$id);
		 $q_res = $this->db->get('employee_user');
		 $res_chk = $q_res->result();
		 $employee_info_sec->first_name = $res_chk[0]->first_name;
		 $employee_info_sec->last_name = $res_chk[0]->last_name;
		 $employee_info_sec->id = $id;
		 $employee_info_sec->user_role_id = $res_chk[0]->user_role_id;
		 
		 return $employee_info_sec;
	 }
	 
	 public function update_personal_info(){
		 $data_employee_user = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' =>$this->input->post('last_name')
		 );
		 $this->db->where('id', $this->input->post('id'));
		 $this->db->update('employee_user', $data_employee_user);
		 
		 $data_employee_personal = array(
			'permanent_address' => $this->input->post('permanent_address'),
			'communication_address' => $this->input->post('communication_address'),
			'email_id' => $this->input->post('personal_email_id'),
			'mobile_number' => $this->input->post('mobile_number'),
		 );
		  $this->db->where('user_id', $this->input->post('id'));
		  $this->db->update('employee_personal_info', $data_employee_personal);
		 
	 }
	 
	 public function update_professional_info(){
		 
		 $data_employee_user = array(
			'user_role_id' => $this->input->post('designation')			
		 );
		 $this->db->where('id', $this->input->post('id'));
		 $this->db->update('employee_user', $data_employee_user);
		 
		 $joining_date_unformatted = $this->input->post('date_of_increment');
		 $increment_date_unformatted = $this->input->post('next_increment_due');
		 
		 $array_rep_joining = explode('-', $joining_date_unformatted);
		 $joining_date_formatted = $array_rep_joining[2]."-".$array_rep_joining[1]."-".$array_rep_joining[0];
		 
		 $array_rep_inc = explode('/', $increment_date_unformatted);
		 $increment_date_formatted = $array_rep_inc[1]."-".$array_rep_inc[0]."-01";
		 
		 $professional_data = array(
			'email_id' => $this->input->post('company_email_id'),
			'present_salary' => $this->input->post('salary'),
			'next_inc_due' => $increment_date_formatted,
			'last_inc_given' => $joining_date_formatted,
			'increment_sanction_by' => $this->session->userdata('id')
		 );
		  $this->db->where('user_id', $this->input->post('id'));
		  $this->db->update('employee_professional_info', $professional_data);
	 }
	 
	public function reset_password(){
		$data = array(
			'password' => sha1('password')
		);
		$this->db->where('id', $this->input->post('id'));
		 $this->db->update('employee_user', $data);
	}
	
	public function relieve_employee(){
		$joining_date_unformatted = $this->input->post('date_of_relieving');
		$array_rep_joining = explode('-', $joining_date_unformatted);
		$relieving_date_formatted = $array_rep_joining[2]."-".$array_rep_joining[1]."-".$array_rep_joining[0];
		$data = array(
			'employee_status' => 2,
			'relieving_date' => $relieving_date_formatted
		);
		$this->db->where('id', $this->input->post('id'));
		 $this->db->update('employee_user', $data);
	}
	
	//get team lead id for a particular team member
	
	public function team_lead_id($id = null){
		if($id != null){
			$this->db->where('team_mem_id', $id);
			$this->db->select('team_lead_id');
			$query = $this->db->get('team_hierarchy');
			$result = $query->result();
			return $result[0]->team_lead_id;
		}
	}
	
 }