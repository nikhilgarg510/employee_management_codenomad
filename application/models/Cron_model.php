<?php
Class Cron_model extends CI_Model
 {
      
      public function __construct(){ 
        $this->load->database();
	}
	
	public function insert_weekly_rating($data){
		$this->db->insert_batch('rating_employee', $data); 
	}
	
	public function reset_current_week_rating_data(){
		$data = array(
			'rating_performance' => 0,
			'rating_effort' => 0,
			'rating_hr' => 0
		);
		$this->db->update('rating_current_week', $data);
	}
	
 }
 
 ?>