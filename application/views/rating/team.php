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
	  
	  
		<div class="row">
          <div class="col-md-12">
            <div class="page-heading">
				  <h1>Update Employee Rating</h1>
			</div>
          </div>
        </div>
		<?php $team_mem_id = ""; ?>
		<?php foreach($team_mem as $team_member){ ?>
		<?php $team_mem_id .= ",".$team_member->team_mem_id; ?>
		<div class="row">
         <div class="box-info">
		 <h4><?php echo get_employee_name($team_member->team_mem_id); ?></h4>
					<hr />
          <div class="col-md-6"> 
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Efforts</label>
					<div class="col-sm-9">
					  <div id="efforts_<?php echo $team_member->team_mem_id; ?>" class="slider"></div>
						<div class="slider-info"><span class="slider-info" id="efforts_<?php echo $team_member->team_mem_id; ?>_amount"></span> </div>
					</div>
				</div>
          </div>
		   <div class="col-md-6"> 
            	<div class="form-group">
					<label class="col-sm-3 control-label">Performance</label>
					<div class="col-sm-9">
					  <div id="performance_<?php echo $team_member->team_mem_id; ?>" class="slider"></div>
						<div class="slider-info"><span class="slider-info" id="performance_<?php echo $team_member->team_mem_id; ?>_amount"></span> </div>
					</div>
				</div>
			</div>
          </div>
        </div>
		<?php } ?>
		
		<div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
				  <input type="hidden" value="<?php echo $team_mem_id; ?>" id="team_mem_id" />
                    <button class="btn btn-primary" type="button" onclick="return update_rating();">Update Rating</button>
					
                  </div>
                </div>
              </div>
		
	  </div>
    </div>
	
	<!--margin-container end--> 

  </div>

  <!--main end--> 

</div>

<!--layout-container end--> 

<?php $this->load->view('footer/slider'); ?>

<script>

<?php foreach($team_mem as $team_member){ ?>
// range min
    $("#efforts_<?php echo $team_member->team_mem_id; ?>").slider({
        range: "min",
        value: <?php echo $team_member->rating_effort; ?>,
        min: 0,
        max: 5,
		step: 0.5,
        slide: function (event, ui) {
            $("#efforts_<?php echo $team_member->team_mem_id; ?>_amount").text( ui.value);
        }
    });

    $("#efforts_<?php echo $team_member->team_mem_id; ?>_amount").text( $("#efforts_<?php echo $team_member->team_mem_id; ?>").slider("value"));
	
	$("#performance_<?php echo $team_member->team_mem_id; ?>").slider({
        range: "min",
        value: <?php echo $team_member->rating_performance; ?>,
        min: 0,
        max: 5,
		step: 0.5,
        slide: function (event, ui) {
            $("#performance_<?php echo $team_member->team_mem_id; ?>_amount").text( ui.value);
        }
    });

    $("#performance_<?php echo $team_member->team_mem_id; ?>_amount").text( $("#performance_<?php echo $team_member->team_mem_id; ?>").slider("value"));
	
<?php } ?>

function update_rating(){
	var team_mem_ids = $("#team_mem_id").val();
	var team_mem_id = team_mem_ids.split(",");
	var rating = [];
	var i = 0;
	$.each(team_mem_id, function( index, value ) {
		if(index != 0){
			var efforts_rating = $("#efforts_"+value+"_amount").html();
			var performance_rating = $("#performance_"+value+"_amount").html();
			rating[i] = {'employee_id' : value, 'rating_effort' : efforts_rating, 'rating_performance' : performance_rating};
			i++;
		}
	});
	$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>rating/update_rating/",
				data: {rating : rating},
				success: function (data) {
					console.log(data);
					$("#display_success").css('display', '');
					$("#success_message").html("Rating Updated Successfully!");
					
				}
			  });
}

</script>


</body>

</html>