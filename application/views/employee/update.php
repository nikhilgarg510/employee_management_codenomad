<!DOCTYPE html>

<html>

<?php $this->load->view('header/index'); ?>

<body>

<!--layout-container start-->

<div id="layout-container"> 

  <?php $this->load->view('leftSideBar/index'); ?>

  

  <!--main start-->

  <div id="main">

    <?php $this->load->view('topBar/index'); ?>

	<div class="margin-container">
      <div class="scrollable wrapper">
	  
	   <div class="alert alert-success" id="display_success" style="display:none;"> <span class="alert-icon"><i class="fa fa-check-square-o"></i></span>
		<div class="notification-info">
		  <ul class="clearfix notification-meta">
			<li class="pull-left notification-sender" id="success_message"></li>                    
		  </ul>                 
		</div>
	  </div>
	  
	  <div class="alert alert-danger" id="display_error" style="display:none;"> <span class="alert-icon"><i class="fa fa-minus-square-o"></i></span>
                <div class="notification-info">
                  <ul class="clearfix notification-meta">
                    <li class="pull-left notification-sender" id="error_message"></li>                    
                  </ul>
                </div>
              </div>
	  
	  <div class="row">
		<div class="col-md-12">
			<div class="box-info">
				<h3>Select Employee</h3>
				<hr>
				
				<div class="form-group">
                <label class="col-sm-2 control-label">Designation</label>
                <!--col-sm-9 start-->
                <div class="col-sm-4">
                  <select id="primary_designation" class="form-control">
						<option value="0">Select Designation</option>
						<?php foreach($designation as $res){ ?>
							<option value="<?php echo $res->id; ?>"><?php echo $res->employee_designation; ?></option>
						<?php } ?>
				  </select>
				  </div>
				</div>
				
				<div class="form-group">
                <label class="col-sm-2 control-label">Select Employee Name</label>
                <!--col-sm-9 start-->
                <div class="col-sm-4">
                  <select name="employee_name" class="form-control" id="employee_name">
						
				  </select>
				  </div>
				</div>
				
			</div>
		</div>
	  </div>
		
	<form action="#" method="POST" class="form-horizontal row-border">

        <!--row start-->
		<div class="row"> 
		<!--col-md-6 start-->
          <div class="col-md-6"> 
            <!--box-info start-->
            <div class="box-info">
				<h3>Update Personal Employee Information</h3>
				<hr>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">First Name</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" maxlength="20" required placeholder="First Name" name="first_name" value="" id="first_name" />
					  
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Last Name</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" maxlength="20" required placeholder="Last Name" name="last_name" value="" id="last_name" />
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Permanent Address</label>
					<div class="col-sm-9">
					  <input type="textbox" class="form-control" required name="permanent_address" id="permanent_address" value="" />
					</div>
				</div>
				
				<div class="form-group">
                <label class="col-sm-3 control-label">Communication Address</label>
                <div class="col-sm-9">
                  <div class="input-group"> <span class="input-group-addon">
                    <input type="checkbox" id="comm_perma" title="If communication address same as Permanent Address. Please click here." />
                    </span>
                    <input type="text" class="form-control" required name="communication_address" id="communication_address" value="" />
                  </div>
                </div>
              </div>
			  
			  <div class="form-group">
					<label class="col-sm-3 control-label">Personal Email Address</label>
					<div class="col-sm-9">
					  <input type="email" class="form-control" placeholder="Email Address" name="personal_email_id" value="" id="personal_email_id" />
					</div>
				</div>
				
				<div class="form-group lable-padd">
                  <label class="col-sm-3">Phone</label>
                  <div class="col-sm-6">
                    <input type="text" data-inputmask="'mask':'9999999999'" class="form-control mask" required name="mobile_number" value="" id="mobile_number">
                  </div>
                  <div class="col-sm-3 left-align">
                    <p class="help-block">99999-99999</p>
                  </div>
                </div>
				
				<div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
                    <button class="btn btn-primary" type="button" onclick="return update_personal_information();">Update</button>
					
                  </div>
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
				<h3>Update Professional Employee Information</h3>
				<hr>
				
				<div class="form-group">
                <label class="col-sm-3 control-label">Designation</label>
                <!--col-sm-9 start-->
                <div class="col-sm-9">
                  <select class="form-control" id="designation">
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
                    <input type="number" required class="form-control" name="salary" value="" id="salary" />
                  </div>
                </div>
              </div>
			  
			   <div class="form-group">
                  <label class="control-label col-sm-3">Next Increment Due</label>
                  <div class="col-sm-9">
                    <div data-date-minviewmode="months" data-date-viewmode="years" data-date-format="mm/yyyy" data-date="102/2012"  class="input-append date dpMonths">
                      <input type="text" readonly size="30" class="form-control" required name="next_increment_due" value="" id="next_increment_due">
                      <span class="input-group-btn add-on">
                      <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                      </span> </div>
                     </div>
                </div>
				
				<div class="form-group">
                  <label class="control-label col-sm-3">Date of Increment</label>
                  <div class="col-sm-9">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-append date dpYears">
                      <input type="text" readonly required size="30" class="form-control" name="date_of_increment" value="" id="date_of_increment">
                      <span class="input-group-btn add-on">
                      <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                      </span> </div>
                     </div> 
                </div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">Company Email Address</label>
					<div class="col-sm-9">
					  <input type="email" required class="form-control" placeholder="Email Address" name="company_email_id" value="" id="company_email_id" />
					</div>
				</div>
				
				<div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
                    <button class="btn btn-primary" type="button" onclick="return update_professional_information();">Update</button>
					<input type="hidden" id="user_id" value="" /> 
					
                  </div>
                </div>
              </div>
				
			</div>
            <!--box-info end--> 
          </div>
          <!--col-md-6 end--> 
        </div>
		<!--row end--> 
		<!--row start-->
		<div class="row"> 
			<div class="col-md-6"> 
            <!--box-info start-->
            <div class="box-info">
				<h3>Reset Employee Password</h3>
				<hr>
				<div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
                    <button class="btn btn-primary" type="button" onclick="return reset_password();">Reset Password</button>
					<input type="hidden" id="user_id" value="" /> 
					
                  </div>
                </div>
              </div>
			  </div>
             </div>
		<div class="col-md-6"> 
            <!--box-info start-->
            <div class="box-info">
				<h3>Relieve the Employee</h3>
				<hr>
				
				
				<div class="form-group">
                  <label class="control-label col-sm-3">Date of Relieving</label>
                  <div class="col-sm-9">
                    <div data-date-viewmode="years" data-date-format="dd-mm-yyyy" data-date="12-02-2012"  class="input-append date dpYears">
                      <input type="text" readonly required size="30" class="form-control" name="date_of_relieving" value="" id="date_of_relieving">
                      <span class="input-group-btn add-on">
                      <button class="btn btn-danger" type="button"><i class="fa fa-calendar"></i></button>
                      </span> </div>
                     </div> 
                </div>
				
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
                    <button class="btn btn-primary" type="button" onclick="return relieve_employee();">Relieve Employee</button>
					<input type="hidden" id="user_id" value="" /> 
					
                  </div>
                </div>
			</div>
           </div>
			 <!--col-md-6 end--> 
        </div>
		<!--row end--> 
			</form>
      </div>
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
	 
	 $("#primary_designation").change(function(){
		 var val = $("#primary_designation").val();
		 if(val != 0){
			 $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/employee/get_desired_user_list",
				data: {val : val},
				dataType: "json", // Set the data type so jQuery can parse it for you
				success: function (data) {
					
					$("#first_name").val("");
					$("#last_name").val("");
					$("#permanent_address").val("");
					$("#communication_address").val("");
					$("#personal_email_id").val("");
					$("#mobile_number").val("");
					
					
					$("#salary").val("");
					$("#next_increment_due").val("");
					$("#date_of_increment").val("");
					$("#company_email_id").val("");
					$("#user_id").val("");
					
					var html = "";
					if(data.length != 0){
						
						var html = "<option value='0'>Select Employee Name</option>";
						for(var i = 0; i < data.length; i++){
							$("#display_error").css('display', 'none');							
							html += "<option value='"+data[i]['id']+"'>"+data[i]['first_name']+" "+data[i]['last_name']+"</option>";							
						}
						$("#employee_name").html(html);
					}else{
						$("#display_error").css('display', '');
						$("#display_success").css('display', 'none');
						$("#error_message").html("No Employee Exist in the selected Designation!");
						$("#employee_name").html('');
					}
					
				}
			});
		 }
	 });
	 
	 $("#employee_name").change(function(){
		 if($("#employee_name").val() != 0){
			 var val = $("#employee_name").val();
			 $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/employee/get_user_data/",
				data: {val : val},
				dataType: "json", // Set the data type so jQuery can parse it for you
				success: function (data) {
					$("#first_name").val(data['first_name']);
					$("#last_name").val(data['last_name']);
					$("#permanent_address").val(data['permanent_address']);
					$("#communication_address").val(data['communication_address']);
					$("#personal_email_id").val(data['email_id']);
					$("#mobile_number").val(data['mobile_number']);
					
					
					$("#salary").val(data['present_salary']);
					$("#next_increment_due").val(data['next_inc_due']);
					$("#date_of_increment").val(data['last_inc_given']);
					$("#company_email_id").val(data['professional_email_id']);
					$("#designation").val(data['user_role_id']);
					$("#user_id").val(data['id']);
					
					
					
				}
			 });
		 }else{
					$("#first_name").val("");
					$("#last_name").val("");
					$("#permanent_address").val("");
					$("#communication_address").val("");
					$("#personal_email_id").val("");
					$("#mobile_number").val("");
					
					
					$("#salary").val("");
					$("#next_increment_due").val("");
					$("#date_of_increment").val("");
					$("#company_email_id").val("");
					$("#user_id").val("");
				}
	 });
	 
	 function update_personal_information(){
		 if($("#user_id").val() != ""){
			 var id = $("#user_id").val();
			 var first_name = $("#first_name").val();
			 var last_name = $("#last_name").val();
			 var permanent_address = $("#permanent_address").val();
			 var communication_address = $("#communication_address").val();
			 var personal_email_id = $("#personal_email_id").val();
			 var mobile_number = $("#mobile_number").val();
			 
			 if(first_name == "" || permanent_address == "" || communication_address == "" || personal_email_id == "" || mobile_number == ""){
				 $("#display_error").css('display', '');
				 $("#display_success").css('display', 'none');
				 $("#error_message").html("You left a required field to be blank. Field Cannot be left blank!");
				 return;
			 }
			 
			 var data = {
				 id : id,
				 first_name : first_name,
				 last_name : last_name,
				 permanent_address : permanent_address,
				 communication_address : communication_address,
				 personal_email_id : personal_email_id,
				 mobile_number : mobile_number
			 };
			 $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/employee/update_personal_info/",
				data: data,
				success: function (data) {
					$("#display_error").css('display', 'none');
					$("#display_success").css('display', '');
					$("#success_message").html("Employee Personal Information Updated Successfully!");
					
				}
			  });
		 }
	 }
	 
	 function update_professional_information (){
		 if($("#user_id").val() != ""){
			 var id = $("#user_id").val();
			 var designation = $("#designation").val();
			 var salary = $("#salary").val();
			 var next_increment_due = $("#next_increment_due").val();
			 var date_of_increment = $("#date_of_increment").val();
			 var company_email_id = $("#company_email_id").val();
			 
			 if(designation == "" || salary == "" || next_increment_due == "" || date_of_increment == "" || company_email_id == ""){
				 $("#display_error").css('display', '');
				 $("#display_success").css('display', 'none');
				 $("#error_message").html("You left a required field to be blank. Field Cannot be left blank!");
				 return;
			 }
			 
			 var data = {
				 designation : designation,
				 salary : salary,
				 id : id,
				 next_increment_due : next_increment_due,
				 date_of_increment : date_of_increment,
				 company_email_id : company_email_id
			 };
			 console.log(data);
			 $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/employee/update_professional_info/",
				data: data,
				success: function (data) {
					$("#display_error").css('display', 'none');
					$("#display_success").css('display', '');
					$("#success_message").html("Employee Professional Information Updated Successfully!");
					
				}
			  });
			 
		 }
		 
	 }
	 
	 function reset_password(){
		if($("#user_id").val() != ""){
			var r = confirm("Are you sure?");
			if (r == true) {
				var id = $("#user_id").val();
				$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/employee/reset_password/",
				data: {id : id},
				success: function (data) {
					$("#display_error").css('display', 'none');
					$("#display_success").css('display', '');
					$("#success_message").html("Employee Password Reset Successfully!");
					
				}
			  });
			}
		}
	 }
	 
	 function relieve_employee(){
		 if($("#user_id").val() != ""){
			var r = confirm("Are you sure?");
			if (r == true) {
				var id = $("#user_id").val();
				var date_of_relieving = $("#date_of_relieving").val();
				$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/employee/relieve_employee/",
				data: {id : id, date_of_relieving : date_of_relieving},
				success: function (data) {
					$("#display_error").css('display', 'none');
					$("#display_success").css('display', '');
					$("#success_message").html("Employee Relieved Successfully!");
					
				}
			  });
			}
		 }
	 }
	 
</script>

</body>

</html>