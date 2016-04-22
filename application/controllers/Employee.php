<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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
       	 $this->load->model('employee_model');

         $this->load->library('session'); // Load session library

         $this->load->helper('form'); // Load form helper library

         $this->load->library('form_validation'); // Load form helper library

		//$this->load->library('MY_session'); // Load form helper library



	 }
	public function add()
	{
		check_page_redirection();
		
		$data['message_employee_added'] = "";
		if(!empty($_POST)){
			$data['new_employee_added'] = $this->employee_model->employee_add();
			$data['message_employee_added'] = "success";
			
		}
		if($this->session->userdata('user_role_id') == 11){
			$data['designation'] = $this->login_model->index_superadmin();
		}else{
			$data['designation'] = $this->login_model->index_not_superadmin();
		}
		$data['team_lead'] = $this->login_model->get_team_mem_object();
			$this->load->view('employee/add', $data);
	}
	
	public function view(){
		check_page_redirection();
	}
	
	
	/*Updating Employee starts here*/
	
	public function update(){
		check_page_redirection();
		$data['message_employee_added'] = "";
		if($this->session->userdata('user_role_id') == 11){
			 $data['designation'] = $this->login_model->index_not_superadmin();
		 }else{
			 $data['designation'] = $this->login_model->index_not_superadmin_hr();
		 }
		$this->load->view('employee/update', $data);
	}
	
	/*Updating Employee ends here*/
	
	/*Ajax for update page starts here */
	public function get_desired_user_list(){
		$employee_info = $this->login_model->get_team_mem_object($this->input->post('val'));
		//$employee_info_partial = $this->login_model->get_team_mem_object(2);
		/* $employee_info = array();
		foreach($employee_info_partial as $employee_info_sec){
			$employee_info[] = $this->employee_model->get_complete_mem_info($employee_info_sec);
		} */
		//prx($employee_info);
		echo json_encode($employee_info);
	}
	
	public function get_user_data(){
		$employee_info = $this->employee_model->get_complete_mem_info($this->input->post('val'));
		//$employee_info = $this->employee_model->get_complete_mem_info(3);
		echo json_encode($employee_info);
	}
	
	public function update_personal_info(){
		$this->employee_model->update_personal_info();
	}
	
	public function update_professional_info(){
		$this->employee_model->update_professional_info();
	}
	
	public function reset_password(){
		$this->employee_model->reset_password();
	}
	
	public function relieve_employee(){
		$this->employee_model->relieve_employee();
	}
	
	/*Ajax for update page ends here */
	
	
	
	
}
