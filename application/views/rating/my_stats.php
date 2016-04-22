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
	  <!--row start-->        
		<div class="row">           
		<!--col-md-12 start-->          
			<div class="col-md-12">            
				<div class="page-heading">              
					<h1>View Your Stats</h1>            
				</div>          
			</div>          <!--col-md-12 end-->         
		</div>        
		<!--row end-->	
		<form action="<?php echo current_url(); ?>" method="POST" class="form-horizontal row-border">
		 <!--row start-->        
		<div class="row">           
		<!--col-md-12 start-->
		<div class="col-md-4">
			<div class="form-group">
				<label class="col-sm-3 control-label">Select Rating By</label>
				<div class="col-sm-9">
				  <select id="rating_by" name="rating_by">
					<option value="1">Average</option>
					<Option value="2">Weekly Stat</option>
				  </select>
				</div>
			</div>
		</div>
		<?php 
		$last_monday = date('Y-m-d',strtotime('last monday -7 days'));
		$last_saturday   = date('Y-m-d',strtotime('last monday -2 days'));
		$min_date = strtotime('2016-01-01');
		
		?>
		<div class="col-md-7" id="selection_by_average">
			<div class="form-group">
                  <label class="control-label col-md-4">Date Range</label>
                  <div class="col-md-6">
                    <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                      <input type="text" class="form-control dpd1" name="from">
                      <span class="input-group-addon">To</span>
                      <input type="text" class="form-control dpd2" name="to">
                    </div>
                    <span class="help-block">Select date range</span> </div>
                </div>
		</div>
		<?php 
		$last_monday = date('Y-m-d',strtotime('last monday -7 days'));
		$last_saturday   = date('Y-m-d',strtotime('last monday -2 days'));
		$min_date = strtotime('2016-01-01');
		?>
		
		<div class="col-md-7" id="selection_by_weekly" style="display:none;">
			<div class="form-group">
                  <label class="control-label col-md-4">Select Date</label>
                  <div class="col-md-6 col-xs-11">
                    <input class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" name="weekly_date"/>
                    <span class="help-block">Select date</span> </div>
                </div>
		</div>
		<div class="col-md-1">
			<div class="btn-toolbar">
                <button type="submit" class="btn-primary btn">Submit</button>			
            </div>
		</div>
		
		<!--col-md-12 end-->         
		</div> 
		</form>
		
		<div class="row">           
		<!--col-md-12 start-->          
			<div class="col-md-12">            
				<div class="page-heading">              
					<h1><?php echo $head_stats; ?></h1>            
				</div>          
			</div>          <!--col-md-12 end-->         
		</div>
		<!--row start-->        
		<div class="row">           
			<!--col-md-12 start-->          
			<div class="col-md-12">			
				<div class="col-md-4">                
					<div class="centered-container">                  
						<p class="text-center">Efforts</p>                  
						<input type="text" class="dial" value="<?php echo $efforts; ?>" data-angleoffset="-125" data-anglearc="250" data-width="180" data-fgcolor="#e74949" data-thickness=".15" data-step="1000" data-min="0" data-max="5" data-readOnly=true />                
					</div>              
				</div>			  			  
			<div class="col-md-4">                
				<div class="centered-container">                  
					<p class="text-center">Performance</p>                  
					<input type="text" class="dial" value="<?php echo $performance; ?>" data-angleoffset="-125" data-anglearc="250" data-width="180" data-fgcolor="#dc51f5" data-thickness=".15" data-step="1000" data-min="0" data-max="5" data-readOnly=true />					
				</div>              
			</div>			  			  
			<div class="col-md-4">                
				<div class="centered-container">                  
					<p class="text-center">Discipline/Attendance</p>                  
					<input type="text" class="dial" value="<?php echo $hr; ?>" data-angleoffset="-125" data-anglearc="250" data-width="180" data-fgcolor="#a4ed16" data-thickness=".15" data-step="1000" data-min="0" data-max="5" data-readOnly=true />
				</div>              
			</div>		  
		</div>          
		<!--col-md-12 end-->         
		</div>  
		
		
	<!--scrollable wrapper end--> 
    </div>
    <!--margin-container end--> 
  </div>
  <!--main end--> 
</div>
<!--layout-container end--> 
<?php $this->load->view('footer/slider'); ?>
<script src="<?php echo base_url('media'); ?>/plugins/demo-slider/demo-slider.js"></script>
<script type="text/javascript" src="<?php echo base_url('media'); ?>/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script>
	$("#rating_by").change(function(){
		if($("#rating_by").val() != "0"){
			var rating_val = $("#rating_by").val();
			var html = "";
			if(rating_val == '1'){
				$("#selection_by_weekly").css('display', 'none');
				$("#selection_by_average").css('display', '');
			}else{
				$("#selection_by_weekly").css('display', '');
				$("#selection_by_average").css('display', 'none');
			}
		}
	});
	
	
	//date picker start

    if (top.location != location) {
        top.location.href = document.location.href ;
    }
    $(function(){
        window.prettyPrint && prettyPrint();
        $('.default-date-picker').datepicker({
            format: 'mm/dd/yyyy'
        });
        $('.dpYears').datepicker();
        $('.dpMonths').datepicker();


        var startDate = new Date(2012,1,20);
        var endDate = new Date(2012,1,25);
        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('.dpd1').datepicker({
            onRender: function(date) {
				return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
                }
                checkin.hide();
                $('.dpd2')[0].focus();
            }).data('datepicker');
			
        var checkout = $('.dpd2').datepicker({
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
                checkout.hide();
            }).data('datepicker');
    });

//date picker end
	
</script>

</body>
</html>