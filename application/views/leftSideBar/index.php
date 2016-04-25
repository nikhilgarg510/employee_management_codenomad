<?php if($this->session->user_role_id != 11){
	
	$this->load->view('leftSideBar/other_user');
	//prx($left_menu_detail);
}else{
	$this->load->view('leftSideBar/super_admin');
}

?>
