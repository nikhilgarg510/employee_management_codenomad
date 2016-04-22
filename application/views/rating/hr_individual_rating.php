
         <div class="box-info">
		 <h4><?php echo get_employee_name($current_user_hr_rating[0]->employee_id); ?></h4>
					<hr />
          <div class="col-md-6"> 
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Rating</label>
					<div class="col-sm-9">
					  <div id="rating_<?php echo $current_user_hr_rating[0]->employee_id; ?>" class="slider"></div>
						<div class="slider-info"><span class="slider-info" id="rating_<?php echo $current_user_hr_rating[0]->employee_id; ?>_amount"></span> </div>
					</div>
				</div>
          </div>
		   <div class="col-md-6"> 
            	<div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
				  <button class="btn btn-primary" type="button" onclick="return update_rating(<?php echo $current_user_hr_rating[0]->employee_id; ?>);">Update Rating</button>
					
                  </div>
                </div>
			</div>
          </div>

		
<script>

$("#rating_<?php echo $current_user_hr_rating[0]->employee_id; ?>").slider({
        range: "min",
        value: <?php echo $current_user_hr_rating[0]->rating_hr; ?>,
        min: 0,
        max: 5,
		step: 0.5,
        slide: function (event, ui) {
            $("#rating_<?php echo $current_user_hr_rating[0]->employee_id; ?>_amount").text( ui.value);
        }
    });
$("#rating_<?php echo $current_user_hr_rating[0]->employee_id; ?>_amount").text( $("#rating_<?php echo $current_user_hr_rating[0]->employee_id; ?>").slider("value"));
</script>