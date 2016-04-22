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
                    <li class="pull-left notification-sender">Password Successfully!</li>                    
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
              <h1>Change Password</h1>
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
			<label class="col-sm-3 control-label">Old Password</label>
			<div class="col-sm-9">
			  <input type="password" class="form-control" maxlength="20" required placeholder="Old Password" name="old_password"  />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3 control-label">New Password</label>
			<div class="col-sm-9">
			  <input type="password" class="form-control" maxlength="20" required placeholder="New Password" name="new_password"  />
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-3 control-label">Confirm Password</label>
			<div class="col-sm-9">
			  <input type="password" class="form-control" maxlength="20" required placeholder="Confirm Password" name="confirm_password"  />
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


</body>