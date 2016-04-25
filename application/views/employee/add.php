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
	  <?php if($message_employee_added == "success"){  ?>
	 		<div class="alert alert-success "> <span class="alert-icon"><i class="fa fa-check-square-o"></i></span>
                <div class="notification-info">
                  <ul class="clearfix notification-meta">
                    <li class="pull-left notification-sender">Employee Added Successfully! Employee Code: <?php echo $new_employee_added; ?></li>                    
                  </ul>                 
                </div>
              </div>
	  <?php }else if($message_employee_added == "error"){ ?>
			<div class="alert alert-danger"> <span class="alert-icon"><i class="fa fa-minus-square-o"></i></span>
                <div class="notification-info">
                  <ul class="clearfix notification-meta">
                    <li class="pull-left notification-sender"><span>Username already occupied. Please select another username!</li>                    
                  </ul>
                </div>
              </div>
	  <?php } ?>
	  <!--row start-->
        <div class="row"> 
          <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Add Employee</h1>
            </div>
          </div>
          <!--col-md-12 end--> 
        </div>
        <!--row end-->
		<form action="<?php echo current_url(); ?>" method="POST" class="form-horizontal row-border">

        <!--row start-->
		<div class="row"> 
          <!--col-md-6 start-->
          <div class="col-md-6"> 
            <!--box-info start-->
            <div class="box-info">
				<h3>Personal Employee Information</h3>
				<hr>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">First Name</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" maxlength="20" required placeholder="First Name" name="first_name" value="<?php if(isset($_POST['first_name'])){ echo $this->input->post('first_name'); } ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Last Name</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" maxlength="20" required placeholder="Last Name" name="last_name" value="<?php if(isset($_POST['last_name'])){ echo $this->input->post('last_name'); } ?>" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Permanent Address</label>
					<div class="col-sm-9">
					  <input type="textbox" class="form-control" required name="permanent_address" id="permanent_address" value="<?php if(isset($_POST['permanent_address'])){ echo $this->input->post('permanent_address'); } ?>" />
					</div>
				</div>
				
				<div class="form-group">
                <label class="col-sm-3 control-label">Communication Address</label>
                <div class="col-sm-9">
                  <div class="input-group"> <span class="input-group-addon">
                    <input type="checkbox" id="comm_perma" title="If communication address same as Permanent Address. Please click here." />
                    </span>
                    <input type="text" class="form-control" required name="communication_address" id="communication_address" value="<?php if(isset($_POST['communication_address'])){ echo $this->input->post('communication_address'); } ?>" />
                  </div>
                </div>
              </div>
			  
			  <div class="form-group">
					<label class="col-sm-3 control-label">Personal Email Address</label>
					<div class="col-sm-9">
					  <input type="email" class="form-control" placeholder="Email Address" name="personal_email_id" value="<?php if(isset($_POST['personal_email_id'])){ echo $this->input->post('personal_email_id'); } ?>" />
					</div>
				</div>
				
				<div class="form-group lable-padd">
                  <label class="col-sm-3">Phone</label>
                  <div class="col-sm-6">
                    <input type="text" data-inputmask="'mask':'9999999999'" class="form-control mask" required name="mobile_number" value="<?php if(isset($_POST['mobile_number'])){ echo $this->input->post('mobile_number'); } ?>">
                  </div>
                  <div class="col-sm-3 left-align">
                    <p class="help-block">99999-99999</p>
                  </div>
                </div>
				
			</div>
            <!--box-info end--> 
          </div>
          <!--col-md-6 end--> 
		  
		  <!--col-md-6 start-->
          <div class="col-md-6"> 
            <!--box-info start-->
            <div class="box-info">
				<h3>Professional Employee Information</h3>
				<hr>
				
				<div class="form-group">
                <label class="col-sm-3 control-label">Designation</label>
                <!--col-sm-9 start-->
                <div class="col-sm-9">
                  <select name="designation" class="form-control" id="source">
						<?php foreach($designation as $res){ ?>
							<option value="<?php echo $res->id; ?>"><?php echo $res->employee_designation; ?></option>
						<?php } ?>
				  </select>
				  </div>
				</div>
				
				<div class="form-group">
                <label class="col-sm-3 control-label">Salary</label>
                <div class="col-sm-9">
                  <div class="input-group"> <span class="input-group-addon">&#x20B9</span>
                    <input type="number" required class="form-control" name="salary" value="<?php if(isset($_POST['salary'])){ echo $this->input->post('salary'); } ?>" />
                  </div>
                </div>
              </div>
			  
			   <div class="form-group">
                  <label class="control-label col-sm-3">Next Increment Due</label>
                  <div class="col-sm-9">
                    <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
                      <input type="text" readonly size="30" class="form-control" required name="next_increment_due" value="<?php if(isset($_POST['next_increment_due'])){ echo $this->input->post('next_increment_due'); } ?>">
                      <span class="input-group-btn add-on">
                      <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                      </span> </div>
                     </div>
                </div>
				
				<div class="form-group">
                  <label class="control-label col-sm-3">Date of Joining</label>
                  <div class="col-sm-9">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-append date dpYears">
                      <input type="text" readonly required size="30" class="form-control" name="date_of_joining" value="<?php if(isset($_POST['date_of_joining'])){ echo $this->input->post('date_of_joining'); } ?>">
                      <span class="input-group-btn add-on">
                      <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                      </span> </div>
                     </div> 
                </div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Company Email Address</label>
					<div class="col-sm-9">
					  <input type="email" required class="form-control" placeholder="Email Address" name="company_email_id" value="<?php if(isset($_POST['company_email_id'])){ echo $this->input->post('company_email_id'); } ?>" />
					</div>
				</div>
								
				<div class="form-group">
                <label class="col-sm-3 control-label">Team Lead</label>
                <!--col-sm-9 start-->
                <div class="col-sm-9">
                  <select name="team_lead" class="form-control" id="source">
						<?php foreach($team_lead as $res){ ?>
							<option value="<?php echo $res->id; ?>"><?php echo $res->first_name." ".$res->last_name; ?></option>
						<?php } ?>
				  </select>
				  </div>
				</div>
				
				<div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
                    <button type="submit" class="btn-primary btn">Submit</button>
					
                  </div>
                </div>
              </div>
				
			</div>
            <!--box-info end--> 
          </div>
          <!--col-md-6 end--> 
        </div>
        

		<!--row end--> 
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