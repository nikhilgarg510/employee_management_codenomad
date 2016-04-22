<?php

if(!function_exists('prx'))
{
  function prx($value)
  {
   echo "<pre>";
   print_r($value);
   die;
  }
}

if(!function_exists('get_users_left_menu')){
	function get_users_left_menu()  {
		$ci = & get_instance();	
		$ci->load->model('login_model');	
		$ci->load->library('session');	
		return $ci->login_model->check_url_permission();
	}
}

if(!function_exists('check_page_redirection')){
	function check_page_redirection()  {
		$ci = & get_instance();	
		$ci->load->model('login_model');	
		$ci->load->library('session');
		
		if(!$ci->session->userdata('id')){
			redirect('/', 'refresh');
		}
		
		if(!$ci->login_model->check_current_page_permission() && $ci->session->userdata('user_role_id') != 11){
			redirect('/', 'refresh');
		}
	}
}

if(!function_exists('check_child_elements')){
	function check_child_elements($team_mem_id, $team_hierarchy, $i, $team_members){
		$ci = & get_instance();	
		$ci->load->model('login_model');	
		$ci->load->library('session');
		
		$k = "";
		$k.='<ol class="dd-list" data-id="'.$team_mem_id.'">';
		foreach($team_hierarchy[$team_mem_id] as $team_hie){
			$i++;
			$key = array_search($team_hie->team_mem_id, array_column($team_members, 'id'));
			$name = $team_members[$key]['first_name']." ".$team_members[$key]['last_name'];
			$k .= '<li class="dd-item" data-id="'.$team_hie->team_mem_id.'" id="team_mem_'.$team_hie->team_mem_id.'">
				  <div class="dd-handle">'.$name.'</div>';
			if(array_key_exists($team_hie->team_mem_id, $team_hierarchy)){
				$k .= check_child_elements($team_hie->team_mem_id, $team_hierarchy, $i, $team_members);
			}
			
			$k .= '</li>';
			
		}
		$k .="</ol>";
		return $k;
		
		
		
	}
} 

if(!function_exists('get_employee_name')){
	function get_employee_name($id = null){
		$ci = & get_instance();	
		$ci->load->model('login_model');
		return $ci->login_model->get_emp_name($id);
	}
	
}


?>