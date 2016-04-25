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

    <!--margin-container start-->

    <div class="margin-container"> 

      <!--scrollable wrapper start-->

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

	  
	  <!--row start-->
        <div class="row"> 
          <!--col-md-12 start-->
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Employee Personality Rating</h1>
            </div>
          </div>
          <!--col-md-12 end--> 
        </div>
        <!--row end-->
		
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
	  
	  <div class="row" id="rating_div">
	  
	  
	  </div>

      </div>

      <!--scrollable wrapper end--> 

    </div>

    <!--margin-container end--> 

  </div>

  <!--main end--> 

</div>

<!--layout-container end--> 

<?php $this->load->view('footer/slider'); ?>

<script>

	$("#primary_designation").change(function(){
		 var val = $("#primary_designation").val();
		 if(val != 0){
			 $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/employee/get_desired_user_list",
				data: {val : val},
				dataType: "json", // Set the data type so jQuery can parse it for you
				success: function (data) {
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
				url: "<?php echo base_url(); ?>/rating/get_current_user_hr_rating/",
				data: {val : val},
				success: function (data) {
					$("#rating_div").html(data);
				}
			 });
		 }
	 });
	 
	 function update_rating(employee_id){
		 var rating = $('#rating_'+employee_id+'_amount').html();
		 var data = {
			 employee_id : employee_id,
			 rating : rating
		 };
		 $.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>/rating/update_hr_rating/",
				data: data,
				success: function (data) {
					console.log(data);
					$("#display_error").css('display', 'none');
					$("#display_success").css('display', '');
					$("#success_message").html("Employee Rating Updated Successfully!");
				}
			 });
	 }
</script>



</body>

</html>