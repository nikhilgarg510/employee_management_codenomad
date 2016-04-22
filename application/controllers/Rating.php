<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating extends CI_Controller {

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
       	 $this->load->model('rating_model');

         $this->load->library('session'); // Load session library

         $this->load->helper('form'); // Load form helper library

         $this->load->library('form_validation'); // Load form helper library

		//$this->load->library('MY_session'); // Load form helper library



	 }
	 
	 public function index(){
		 check_page_redirection();
		 $data['team_mem'] = $this->rating_model->team_mem();
		 //prx($data);
		 $this->load->view('rating/team', $data);
	 }
	 
	 public function update_rating(){
		 $this->rating_model->update_rating();
		 echo "done";
	 }
	 
	 public function hr_rating(){
		 check_page_redirection();
		 
		 if($this->session->userdata('user_role_id') == 11){
			 $data['designation'] = $this->login_model->index_not_superadmin();
		 }else{
			 $data['designation'] = $this->login_model->index_not_superadmin_hr();
		 }
		 
		 $this->load->view('rating/hr_rating', $data);
	 }
	 
	 public function get_current_user_hr_rating(){
		 $data['current_user_hr_rating'] = $this->rating_model->get_current_user_hr_rating();
		 $this->load->view('rating/hr_individual_rating', $data);
		 
	 }
	 
	 public function update_hr_rating(){
		 $this->rating_model->update_hr_rating();
	 }
	 
	 public function my_stats(){
		 if(!$this->session->userdata('id')){
			redirect('/', 'refresh');
		}
		 if(!empty($_POST)){
			 if($this->input->post('rating_by') == 2){
				 $dt = strtotime($this->input->post('weekly_date'));;
				 $day = date("D", $dt);
				 
				 while(strtoupper($day) != "MON"){
					 $dt = strtotime("-1 day", $dt);
					 $day = date("D", $dt);
				 }
				 
				 $start_date = date('Y-m-d', $dt);
				 $res = $this->rating_model->specific_rating($start_date);
				 $last_day = date('Y-m-d',strtotime($start_date.'+6 days'));
				 if(!empty($res)){
					 $data['efforts'] = $res[0]->rating_effort;
					 $data['performance'] = $res[0]->rating_performance;
					 $data['hr'] = $res[0]->rating_hr;
					 $data['head_stats'] = 'My Stats for the Selection Range '.$start_date.' to '.$last_day;
				 }else{
					 $data['efforts'] = 0;
					 $data['performance'] = 0;
					 $data['hr'] = 0;
					 $data['head_stats'] = 'No Stats found for the Selection Range '.$start_date.' to '.$last_day;
				 }
			 }else{
				 
				 $dt = strtotime($this->input->post('from'));;
				 $day = date("D", $dt);
				 
				 while(strtoupper($day) != "MON"){
					 $dt = strtotime("-1 day", $dt);
					 $day = date("D", $dt);
				 }
				 
				 $start_date = date('Y-m-d', $dt);
				 
				  $dt = strtotime($this->input->post('to'));;
				 $day = date("D", $dt);
				 
				 while(strtoupper($day) != "SAT"){
					 $dt = strtotime("+1 day", $dt);
					 $day = date("D", $dt);
				 }
				 
				 $end_date = date('Y-m-d', $dt);
				 
				 $res = $this->rating_model->average_rating($start_date, $end_date);
				 if(!empty($res)){
					 $count = 0;
					 $performance = 0;
					 $efforts = 0;
					 $hr = 0;
					 foreach($res as $result){
						 $count++;
						 $performance += $result->rating_performance;
						 $efforts += $result->rating_effort;
						 $hr += $result->rating_hr;
					 }
					 $data['efforts'] = round($efforts / $count, 1);
					 $data['performance'] = round($performance/ $count);
					 $data['hr'] = round($hr / $count);
					 $data['head_stats'] = 'Average Rating for the range '.$start_date.' to '.$end_date;
				 }else{
					 $data['efforts'] = 0;
					 $data['performance'] = 0;
					 $data['hr'] = 0;
					 $data['head_stats'] = 'No Stats found for the Selection '.$start_date.' to '.$end_date;
				 }
			 }
		 }else{
			$current_week_rating = $this->rating_model->get_all_employee_rating($this->session->userdata('id'));
			 $data['efforts'] = $current_week_rating[0]->rating_effort;
			 $data['performance'] = $current_week_rating[0]->rating_performance;
			 $data['hr'] = $current_week_rating[0]->rating_hr;
			 $data['head_stats'] = 'My current Stats';
		 }
		$this->load->view('rating/my_stats', $data);
		
	 }
	 
	 
	 
}

?>