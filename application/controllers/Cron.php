<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

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

       	 $this->load->model('rating_model');
      	 $this->load->model('cron_model');
      	 $this->load->model('employee_model');

         $this->load->library('session'); // Load session library

         $this->load->helper('form'); // Load form helper library

         $this->load->library('form_validation'); // Load form helper library

		//$this->load->library('MY_session'); // Load form helper library



	 }
	 
	 public function move_weekly_rating(){
		 $get_employee_rating = $this->rating_model->get_all_employee_rating();
		 $week_start_date = date('Y-m-d', strtotime('-6 days'));
		 $week_end_date = date('Y-m-d', strtotime('-1 days'));
		 
		 $data = array();
		foreach($get_employee_rating as $each_emp_rating){
			$team_lead_id = $this->employee_model->team_lead_id($each_emp_rating->employee_id);
			
			$data[] = array(
				'employee_id' => $each_emp_rating->employee_id,
				'team_lead_id' => $team_lead_id,
				'rating_performance' => $each_emp_rating->rating_performance,
				'rating_effort' => $each_emp_rating->rating_effort,
				'rating_hr' => $each_emp_rating->rating_hr,
				'week_start' => $week_start_date,
				'week_end' => $week_end_date
			);
		}
		 
		 $this->cron_model->insert_weekly_rating($data);
		 $this->cron_model->reset_current_week_rating_data();
	 }
}
	 
	?>