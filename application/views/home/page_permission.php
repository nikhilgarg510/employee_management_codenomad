<!DOCTYPE html>

<html>
<?php $this->load->view('header/index'); ?>

<?php
$checked_des = array();
foreach($checked_designations as $checked_designation){
	$checked_des[] = $checked_designation->module_control_id;
}
?>

<body>

<!--layout-container start-->

<div id="layout-container"> 

  <?php 
  
  $this->load->view('leftSideBar/index'); ?>

  

  <!--main start-->

  <div id="main">

    <?php $this->load->view('topBar/index'); ?>

    <!--margin-container start-->

    <div class="margin-container"> 

      <!--scrollable wrapper start-->

      <div class="scrollable wrapper">
		
		<?php if($message_designation == "update"){  ?>
	 		<div class="alert alert-success "> <span class="alert-icon"><i class="fa fa-check-square-o"></i></span>
                <div class="notification-info">
                  <ul class="clearfix notification-meta">
                    <li class="pull-left notification-sender">Permissions Updated Successfully!</li>                    
                  </ul>                 
                </div>
              </div>
	  <?php } ?>
		
		 <!--row start-->
        <div class="row"> 
          <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Set Employee Permissions</h1>
            </div>
          </div>
          <!--col-md-12 end--> 
        </div>
        <!--row end-->
		<form action="<?php echo current_url(); ?>" method="POST" class="form-horizontal row-border" />
			<div class="form-group">
                <label class="col-sm-3 control-label">Select Employee Designation</label>
                <!--col-sm-9 start-->
                <div class="col-sm-9">
                  <select name="designation" class="form-control" id="designation_source">
						<?php foreach($designation as $res){ ?>
							<option value="<?php echo $res->id; ?>" <?php if($selected_designation == $res->id){ echo "selected"; } ?> ><?php echo $res->employee_designation; ?></option>
						<?php } ?>
				  </select>
				  </div>
			</div>
			<div class="form-group row">
				<div class="col-sm-12">
			<?php
			$i = 0;
			foreach($all_module_controller as $mod){ 
				$i++;
				if($i == 1){
					
				}
				?>
				
                  <label class="checkbox-inline">
                    <input type="checkbox" name="valid_value_id[]" value="<?php echo $mod->id; ?>" id="checkbox_<?php echo $mod->id; ?>" <?php if(in_array($mod->id, $checked_des)){ echo "checked"; } ?> />
                    <?php echo $mod->small_title; ?> </label>
                  
                
				<?php
				if($i == 3){
					
					$i = 0;
				}
			?>
					
			<?php } ?>
			
			</div>
		</div>
			
			<div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
                    <button type="submit" class="btn-primary btn">Submit</button>
					
                  </div>
                </div>
              </div>
		
		</form>
		
     </div>

      <!--scrollable wrapper end--> 

    </div>

    <!--margin-container end--> 

  </div>

  <!--main end--> 

</div>

<!--layout-container end--> 


<?php $this->load->view('footer/employee_add'); ?>	  
<script>

jQuery('#designation_source').on('change', function() {
  window.location.replace("<?php echo base_url(); ?>home/page_permission/"+ this.value);// or $(this).val()
});


</script>

</body>