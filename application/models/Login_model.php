<?php
Class Login_model extends CI_Model
 {
      
      public function __construct(){ 
        $this->load->database();
	}
     
	 //Designation returning without super admin designation as returned array
	 public function index_not_superadmin(){
		  $this->db->where_not_in('id', array(11));		 //number fixed for super admin
		$query = $this->db->get('employee_designation');
		$data = $query->result();
		return $data;
		 
	 }
	 
	 //Designation returning with super admin designation as returned array
	 public function index_superadmin(){
		$query = $this->db->get('employee_designation');
		$data = $query->result();
		return $data;
		 
	 }
	 
	 public function index_not_superadmin_hr(){
		 $this->db->where_not_in('id', array(11, 10));		 //number fixed for super admin
		$query = $this->db->get('employee_designation');
		$data = $query->result();
		return $data;
		 
	 }
	 
	 //Designation returning without super admin nor hr designation as returned array
	 
	 public function login(){
		 $array = array(
			'employee_id' => $this->input->post('username'),
			'password' => sha1($this->input->post('password')),
			'user_role_id' => $this->input->post('designation'),
			'employee_status' => 1
			);		
		 $this->db->from('employee_user');
		 $this->db->where($array);
		 $query = $this->db->get();
		 $data = $query->result();
		
		 return $data;
	 }
	 
	 public function check_url_permission(){
		$user_role_id = $this->session->user_role_id;
		$this->db->where('designation_id', $user_role_id);
		$this->db->select('module_control_id');
		$query = $this->db->get('permission_granted');
		$data = $query->result();
		return $data;
	 }
	 
	 public function all_module_controller(){
		 $this->db->where_not_in('id', array(2, 4)); 		//number fixed for page permission page
		 $query = $this->db->get('module_controller_funtion');
		$data = $query->result();
		return $data;
	 }
	 
	 public function permission_update(){
		 $this->db->where('designation_id', $this->input->post('designation'));
		 $this->db->delete('permission_granted');
		 
		 if($this->input->post('valid_value_id')){
			 //$data = array();
			 $valid_value_id = $this->input->post('valid_value_id');
			 foreach($valid_value_id as $val){
				 $data[] = array(
					'designation_id' => $this->input->post('designation'),
					'module_control_id' => $val
				 );
			 }
			 $this->db->insert_batch('permission_granted', $data);			 
		 }
			 return;
		 
		 
	 }
	 
	 public function checked_designations($selected_designation){
		 $this->db->where('designation_id', $selected_designation);
		 $this->db->select('module_control_id');
		 $query = $this->db->get('permission_granted');
		 $data = $query->result();
		 return $data;
		 
	 }
	 
	 public function check_current_page_permission(){
		 $user_role_id = $this->session->userdata('user_role_id');
		 $current_controller = $this->uri->segment(1);
		 $current_function = $this->uri->segment(2);
		 if($current_function == ""){
			 $current_function = "index";
		 }
		 
		 $this->db->where('controller', $current_controller);
		 $this->db->where('function', $current_function);
		 $this->db->select('id');
		 $query = $this->db->get('module_controller_funtion');
		 $result = $query->result();
		 $id = $result[0]->id;
		 
		 $this->db->where('designation_id', $user_role_id);
		 $this->db->where('module_control_id', $id);
		 $this->db->from('permission_granted');
		 if($this->db->count_all_results() == 0){
			 return false;
		 }else{
			 return true;
		 }		 
	 }
	 
	 public function check_old_password(){
		 $id = $this->session->userdata('id');
		 $this->db->where('id', $id);
		 $this->db->where('password', sha1($this->input->post('old_password')));
		 $this->db->from('employee_user');
		 if($this->db->count_all_results() == 0){
			 return false;
		 }else{
			 return true;
		 }	
	 }
	 
	 public function change_password(){
		 $id = $this->session->userdata('id');
		 $data = array(
			'password' => sha1($this->input->post('new_password'))
		 );
		 $this->db->where('id', $id);
		 $this->db->update('employee_user', $data); 
	 }
	 
	 public function get_personal_info(){
		 $user_id = $this->session->userdata('id');
		 $this->db->where('user_id', $user_id);
		 $query = $this->db->get('employee_personal_info');
		 $data = $query->result();
		 return $data;
	 }
	 
	 public function update_personal_info(){
		 $data = array(
			'permanent_address' => $this->input->post('permanent_address'),
			'communication_address' => $this->input->post('communication_address'),
			'email_id' => $this->input->post('personal_email_id'),
			'mobile_number' => $this->input->post('mobile_number')
		 );
		 $user_id = $this->session->userdata('id');
		 $this->db->where('user_id', $user_id);
		 $this->db->update('employee_personal_info', $data);
		 
	 }
	 
	 public function update_designation(){
		 $data = array(
			'employee_designation' => $this->input->post('employee_designation'),
			'description' => $this->input->post('employee_description')
		 );
		 $this->db->where('id', $this->input->post('id'));
		 $this->db->update('employee_designation', $data);
	 }
	 
	 public function add_designation(){
		 $data = array(
			'employee_designation' => $this->input->post('employee_designation'),
			'description' => $this->input->post('employee_description')
		 );
		 $this->db->insert('employee_designation', $data);
	 }
	 
	 public function delete_designation($deletion_id){
		 $this->db->where('id', $deletion_id);
		 $this->db->from('employee_designation');
		 $this->db->delete();
	 }
	 
	 public function get_team_members(){
		 $this->db->where('employee_status', 1);
		 $query = $this->db->get('employee_user');
		$data = $query->result_array();
		return $data;
	 }
	 
	 public function get_team_mem_object($designation_id = null){
		 $this->db->where('employee_status', 1);
		 
		 if($designation_id != null){
			 $this->db->where('user_role_id', $designation_id);
		 }
		 $query = $this->db->get('employee_user');
		$data = $query->result();
		return $data;
	 }
	 
	 public function get_hierarchy(){
		 $this->db->where('employee_user.employee_status', 1);
		$this->db->select('*');
		$this->db->from('team_hierarchy');
		$this->db->join('employee_user', 'employee_user.id = team_hierarchy.team_mem_id');

		 $this->db->order_by('team_lead_id');
		$query = $this->db->get();/* 
		 $query = $this->db->get('team_hierarchy'); */
		$data = $query->result();
		return $data;
	 }
	 
	 public function update_team_hierarchy(){
		 //prx($this->input->post('array'));
		 $this->db->empty_table('team_hierarchy');
		 $this->db->insert_batch('team_hierarchy', $this->input->post('array')); 
	 }
	 
	 public function get_emp_name($id = null){
		 if($id != null){
			 $this->db->select('first_name, last_name');
			 $this->db->where('id', $id);
			 $this->db->from('employee_user');
			 $query = $this->db->get();
			 $result = $query->result();
			 $name = $result[0]->first_name." ".$result[0]->last_name;
			 return $name;
		 }
	 }
	 
	 
	 
	
	 	 
 }
?>
