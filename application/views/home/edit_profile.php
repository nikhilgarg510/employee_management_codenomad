<!DOCTYPE html>

<html>
<?php $this->load->view('header/index'); ?>

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
		
		<?php if($message_designation == "success"){  ?>
	 		<div class="alert alert-success "> <span class="alert-icon"><i class="fa fa-check-square-o"></i></span>
                <div class="notification-info">
                  <ul class="clearfix notification-meta">
                    <li class="pull-left notification-sender">Profile Updated Successfully!</li>                    
                  </ul>                 
                </div>
              </div>
	  <?php }else if($message_designation == "error"){ ?>
			<div class="alert alert-danger"> <span class="alert-icon"><i class="fa fa-minus-square-o"></i></span>
                <div class="notification-info">
                  <ul class="clearfix notification-meta">
                    <li class="pull-left notification-sender"><span><?php echo $password_error_message; ?>! Please try again.</li>                    
                  </ul>
                </div>
              </div>
	  <?php } ?>
	  
	  <div class="row"> 
          <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Edit Profile Information</h1>
            </div>
          </div>
          <!--col-md-12 end--> 
        </div>
		
		<form action="<?php echo current_url(); ?>" method="POST" class="form-horizontal row-border">
		<div class="row"> 
          <!--col-md-6 start-->
          <div class="col-md-12"> 
            <!--box-info start-->
            <div class="box-info">
		
		<div class="form-group">
					<label class="col-sm-3 control-label">Permanent Address</label>
					<div class="col-sm-9">
					  <input type="textbox" class="form-control" required name="permanent_address" id="permanent_address" value="<?php echo $older_data[0]->permanent_address; ?>" />
					</div>
				</div>
				
				<div class="form-group">
                <label class="col-sm-3 control-label">Communication Address</label>
                <div class="col-sm-9">
                  <div class="input-group"> <span class="input-group-addon">
                    <input type="checkbox" id="comm_perma" title="If communication address same as Permanent Address. Please click here." />
                    </span>
                    <input type="text" class="form-control" required name="communication_address" id="communication_address" value="<?php echo $older_data[0]->communication_address ?>" />
                  </div>
                </div>
              </div>
			  
			  <div class="form-group">
					<label class="col-sm-3 control-label">Personal Email Address</label>
					<div class="col-sm-9">
					  <input type="email" class="form-control" placeholder="Email Address" name="personal_email_id" value="<?php echo $older_data[0]->email_id; ?>" />
					</div>
				</div>
				
				<div class="form-group lable-padd">
                  <label class="col-sm-3">Phone</label>
                  <div class="col-sm-6">
                    <input type="text" data-inputmask="'mask':'9999999999'" class="form-control mask" required name="mobile_number" value="<?php echo $older_data[0]->mobile_number; ?>">
                  </div>
                  <div class="col-sm-3 left-align">
                    <p class="help-block">99999-99999</p>
                  </div>
                </div>
		
		<div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
                    <button type="submit" class="btn-primary btn">Submit</button>
					
                  </div>
                </div>
              </div>
			  
		
		</div></div></div>
		
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
	$('#comm_perma').change(function () {
		if($('#comm_perma').is(":checked")){
			$("#communication_address").val($("#permanent_address").val());
		}else{
			$("#communication_address").val('');
		}
	 });
</script>

</body>

</html>