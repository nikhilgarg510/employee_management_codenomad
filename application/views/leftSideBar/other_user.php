<?php $left_menu_detail = get_users_left_menu();

$left_men = array();
foreach($left_menu_detail as $left_menu){
	$left_men[] = $left_menu->module_control_id;
}

$controller = $this->uri->segment(1);
$function = $this->uri->segment(2);
$employee_stack = array('1','3','5');
$rating_stack = array('6','7');
 ?>
<!--Left navbar start-->
  <div id="nav"> 
    <!--logo start-->
    <div class="profile">
      <div class="logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('media'); ?>/images/logo.png" alt=""></a></div>
    </div>
    <!--logo end--> 
    
    <!--navigation start-->
    <ul class="navigation">
      <li><a <?php if(($controller == "") || ($controller == "home" && ($function == "" || $function =="index"))){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>"><i class="fa fa-home"></i><span>Dashboard</span></a></li>
	  <?php if(count(array_intersect($employee_stack, $left_men)) > 0){ ?><li class="sub"><a <?php if($controller == "employee"){ echo 'class="active"'; } ?> href="#"><i class="fa fa-users"></i><span>Employee</span></a>			
		<ul class="navigation-sub">	
			<?php if(in_array("1", $left_men)){ ?><li><a <?php if($controller == "employee" && $function == "add"){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>employee/add/"><i class="fa fa-adn"></i><span>Add Employee</span></a></li><?php } ?>
			<?php if(in_array("3", $left_men)){ ?><li><a <?php if($controller == "employee" && $function == "view"){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>employee/view/"><i class="fa fa-male"></i><span>View Employee</span></a></li><?php } ?>
			<?php if(in_array("5", $left_men)){ ?><li><a <?php if($controller == "employee" && $function == "update"){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>employee/update/"><i class="fa fa-refresh"></i><span>Update Employee</span></a></li><?php } ?>
		</ul>
	  </li> <?php } ?>
	   <li class="sub"><a <?php if($controller == "rating"){ echo 'class="active"'; } ?> href="#"><i class="fa fa-star-o"></i><span>Rating</span></a>	
		<ul class="navigation-sub">
			<?php if(in_array("6", $left_men)){ ?><li><a <?php if($controller == "rating" && ($function == "index" || $function == "")){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>rating/"><i class="fa fa-users"></i><span>My Team</span></a></li><?php } ?>
			<?php if(in_array("7", $left_men)){ ?><li><a <?php if($controller == "rating" && $function == "hr_rating"){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>rating/hr_rating"><i class="fa fa-users"></i><span>Attendence</span></a></li><?php } ?>
			<li><a <?php if($controller == "rating" && $function == "my_stats"){ echo 'class="active"'; } ?> href="<?php echo base_url(); ?>rating/my_stats"><i class="fa fa-users"></i><span>My Stats</span></a></li>
			
		</ul>
		</li>
		
      <!--li class="sub"> <a href="#"><i class="fa fa-smile-o"></i><span>UI Elements</span></a>
        <ul class="navigation-sub">
          <li><a href="buttons.html"><i class="fa fa-power-off"></i><span>Button</span></a></li>
          <li><a href="grids.html"><i class="fa fa-columns"></i><span>Grid</span></a></li>
          <li><a href="icons.html"><i class="fa fa-flag"></i><span>Icon</span></a></li>
          <li><a href="tab-accordions.html"><i class="fa fa-plus-square-o"></i><span>Tab / Accordion</span></a></li>
          <li><a href="nestable.html"><i class="fa  fa-arrow-circle-o-down"></i><span>Nestable</span></a></li>
          <li><a href="slider.html"><i class="fa fa-font"></i><span>Slider</span></a></li>
          <li><a href="timeline.html"><i class="fa fa-filter"></i><span>Timeline</span></a></li>
          <li><a href="gallery.html"><i class="fa fa-picture-o"></i><span>Gallery</span></a></li>
        </ul>
      </li>
      <li class="sub"><a href="#"><i class="fa fa-list-alt"></i><span>Forms</span></a>
        <ul class="navigation-sub">
          <li><a href="form-components.html"><i class="fa fa-table"></i><span>Components</span></a></li>
          <li><a href="form-validation.html"><i class="fa fa-leaf"></i><span>Validation</span></a></li>
          <li><a href="form-wizard.html"><i class="fa fa-th"></i><span>Wizard</span></a></li>
          <li><a href="input-mask.html"><i class="fa fa-laptop"></i><span>Input Mask</span></a></li>
          <li><a href="muliti-upload.html"><i class="fa fa-files-o"></i><span>Multi Upload</span></a></li>
        </ul>
      </li>
      <li class="sub"><a href="#"><i class="fa fa-table"></i><span>Table</span></a>
        <ul class="navigation-sub">
          <li><a href="basic-tables.html"><i class="fa fa-table"></i><span>Basic Table</span></a></li>
          <li><a href="data-tables.html"><i class="fa fa-columns"></i><span>Data Table</span></a></li>
        </ul>
      </li>
      <li class="sub"><a href="#"><i class="fa fa fa-envelope"></i><span>Mail</span></a>
        <ul class="navigation-sub">
          <li><a href="mail.html"><i class="fa fa-inbox"></i><span>Inbox</span></a></li>
          <li><a href="mail-compose.html"><i class="fa fa-envelope-o"></i><span>Compose Mail</span></a></li>
        </ul>
      </li>
      <li class="sub"><a href="#"><i class="fa fa-bar-chart-o"></i><span>Charts</span></a>
        <ul class="navigation-sub">
          <li><a href="jqplot.html"><i class="fa fa-book"></i><span>jQplot</span></a></li>
          <li><a href="morris.html"><i class="fa fa-compass"></i><span>Morris</span></a></li>
          <li><a href="chartjs.html"><i class="fa fa-eraser"></i><span>ChartJS</span></a></li>
        </ul>
      </li>
      <li class="sub"><a href="#"><i class="fa fa-folder-open-o"></i><span>Pages</span></a>
        <ul class="navigation-sub">
          <li><a href="fullcalendar.html"><i class="fa fa-calendar"></i><span>Calendar</span></a></li>
          <li><a href="404-error.html"><i class="fa fa-warning"></i><span>404 Error</span></a></li>
          <li><a href="500-error.html"><i class="fa fa-warning"></i><span>500 Error</span></a></li>
          <li><a href="balnk-page.html"><i class="fa fa-copy"></i><span>Blank Page</span></a></li>
          <li><a href="profile.html"><i class="fa fa-user"></i><span>Profile</span></a></li>
          <li><a href="login.html"><i class="fa fa-sign-out"></i><span>Login</span></a></li>
        </ul>
      </li-->
    </ul>
    <!--navigation end--> 
  </div>
  <!--Left navbar end--> 