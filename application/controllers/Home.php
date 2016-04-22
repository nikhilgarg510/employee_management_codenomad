<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct() 
	{
         parent::__construct();
       	 $this->load->model('login_model');
       	 $this->load->model('rating_model');
         $this->load->library('session'); // Load session library
         $this->load->helper('form'); // Load form helper library
         $this->load->library('form_validation'); // Load form helper library
		//$this->load->library('MY_session'); // Load form helper library

	 }
	 
	 /* Common Functions starts here */
	 
	public function index()
	{
		$data['message_designation'] = "";
		$data['message_login'] = "";
		if(!empty($_POST)){
			if($this->input->post('designation') == 0){
				$data['message_designation'] = "Please select the proper designation!";
			}else{
				$user = $this->login_model->login();
				if(!empty($user)){
					if(isset($_POST['remember']))
					{
					   $this->session->sess_expire_on_close = TRUE;
					}
					else
					{
					   $this->session->sess_expiration = 60*60*24*31;
					   $this->session->sess_expire_on_close = FALSE;
					}
					$this->session->set_userdata('id',$user[0]->id);			
					$this->session->set_userdata('employee_id',$user[0]->employee_id);			
					$this->session->set_userdata('username',$this->input->post('username'));
					$this->session->set_userdata('user_role_id', $this->input->post('designation'));
					$this->session->set_userdata('name', $user[0]->first_name." ".$user[0]->last_name);
				}else{
					$data['message_login'] = "Please recheck the login details";
				}
			}
		}		
		if($this->session->userdata('id')){
			if($this->session->userdata('user_role_id') != 11){
				$data['current_week_rating'] = $this->rating_model->get_all_employee_rating($this->session->userdata('id'));
				$this->load->view('home/index', $data);
			}else{
				//$this->load->view('home/index', $data);
			}
		}else{
			$data['result'] = $this->login_model->index_superadmin();
			$this->load->view('login/index', $data);
		}
	}
	public function logout(){		
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}
	
	
	public function change_password(){
		if(!$this->session->userdata('id')){
			redirect('/', 'refresh');
		}
		$data['message_designation'] = "";
		$data['password_error_message'] = '';
		if($_POST){
			if($this->input->post('new_password') != $this->input->post('confirm_password')){
				$data['message_designation'] = "error";
				$data['password_error_message'] = "New Password and Confirm Password doesn't match";
			}else{
				if(!$this->login_model->check_old_password()){
					$data['message_designation'] = "error";
					$data['password_error_message'] = "Old Password doesn't match";
				}else{
					$this->login_model->change_password();
					$data['message_designation'] = "success";
				}
			}
		}
		$this->load->view('home/change_password', $data);
	}
	
	public function edit_profile(){
		if(!$this->session->userdata('id')){
			redirect('/', 'refresh');
		}
		$data['message_designation'] = "";
		$data['password_error_message'] = "";
		if($_POST){
			$this->login_model->update_personal_info();
			$data['message_designation'] = "success";
		}
		$data['older_data'] = $this->login_model->get_personal_info();
		$this->load->view('home/edit_profile', $data);
	}
	
	/* Common Functions ends here */
	/* Functions only accessible by the Super Admin */
	public function page_permission($selected_designation = NULL){

		if($this->session->userdata('id') && $this->session->userdata('user_role_id') == 11){
			$data['message_designation'] = "";
			if(!empty($_POST)){
				$this->login_model->permission_update();
				$data['message_designation'] = "update";
			}
			if($selected_designation == null){
				 $selected_designation = 2;
			 }
			 $data['selected_designation'] = $selected_designation;
			$data['checked_designations'] = $this->login_model->checked_designations($selected_designation);
			
			$data['designation'] = $this->login_model->index_not_superadmin();
			$data['all_module_controller'] = $this->login_model->all_module_controller();
			//prx($data);
			$this->load->view('home/page_permission', $data);
		}else{
			redirect('/', 'refresh');
		}
	}
	
	
	public function employee_designation($deletion_id = null){
		
		if($this->session->userdata('id') && $this->session->userdata('user_role_id') == 11){
			$data['message_employee_added'] = "";
			$data['password_error_message'] = "";
			
			if($deletion_id != null){
					$data['message_employee_added'] = "error";
					$this->login_model->delete_designation($deletion_id);
					$data['password_error_message'] = "Designation Deleted Successfully!";
				}
			
			if($_POST){
				$data['message_employee_added'] = "success";
				if($this->input->post('id') == ""){
					$this->login_model->add_designation();
					$data['password_error_message'] = "Designation Added Successfully!";
				}else{
					$this->login_model->update_designation();
					$data['password_error_message'] = "Designation Updated Successfully!";
				}
			
			}
			$data['designation'] = $this->login_model->index_not_superadmin();
			$this->load->view('home/employee_designation', $data);
		}else{
			redirect('/', 'refresh');
		}
		
	}
	
	public function team_build(){
		if($this->session->userdata('id') && $this->session->userdata('user_role_id') == 11){
			$data['message_employee_added'] = "";
			$data['password_error_message'] = "";
			$data['team_members'] = $this->login_model->get_team_members();
			$new = $this->login_model->get_hierarchy();
			//prx($data['team_hierarchy']);
			foreach ($new as $a){
				$data['team_hierarchy'][$a->team_lead_id][] = $a;
			}
			//prx($data['team_hierarchy']);
			$this->load->view('home/team_build', $data);
		}else{
			redirect('/', 'refresh');
		}
	}
	
	public function update_team_hierarchy(){
		if($_POST){
			$this->login_model->update_team_hierarchy();
		}
	}	
	
}