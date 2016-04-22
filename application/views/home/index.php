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
					<h1>Welcome, <?php echo $this->session->name; ?></h1>            
				</div>          
			</div>          <!--col-md-12 end-->         
		</div>        
		<!--row end-->				
		<!--row start-->        
		<div class="row">           
			<!--col-md-12 start-->          
			<div class="col-md-12">			
				<div class="col-md-4">                
					<div class="centered-container">                  
						<p class="text-center">Efforts</p>                  
						<input type="text" class="dial" value="<?php echo $current_week_rating[0]->rating_effort; ?>" data-angleoffset="-125" data-anglearc="250" data-width="180" data-fgcolor="#e74949" data-thickness=".15" data-step="1000" data-min="0" data-max="5" data-readOnly=true />                
					</div>              
				</div>			  			  
			<div class="col-md-4">                
				<div class="centered-container">                  
					<p class="text-center">Performance</p>                  
					<input type="text" class="dial" value="<?php echo $current_week_rating[0]->rating_performance; ?>" data-angleoffset="-125" data-anglearc="250" data-width="180" data-fgcolor="#dc51f5" data-thickness=".15" data-step="1000" data-min="0" data-max="5" data-readOnly=true />					
				</div>              
			</div>			  			  
			<div class="col-md-4">                
				<div class="centered-container">                  
					<p class="text-center">Discipline/Attendance</p>                  
					<input type="text" class="dial" value="<?php echo $current_week_rating[0]->rating_hr; ?>" data-angleoffset="-125" data-anglearc="250" data-width="180" data-fgcolor="#a4ed16" data-thickness=".15" data-step="1000" data-min="0" data-max="5" data-readOnly=true />
				</div>              
			</div>		  
		</div>          
		<!--col-md-12 end-->         
		</div>        
		<!--row end-->
		<div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                  <div class="btn-toolbar">
				    <button class="btn btn-primary" type="button" onclick="document.location.href='<?php echo base_url(); ?>rating/my_stats/'">Show My Stats</button>
					
                </div>
            </div>
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
<script src="<?php echo base_url('media'); ?>/plugins/demo-slider/demo-slider.js"></script>

</body>
</html>