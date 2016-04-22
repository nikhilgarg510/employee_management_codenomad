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
			<li class="pull-left notification-sender">Team Hierarchy changed Successfully!</li>                    
		  </ul>                 
		</div>
	  </div>
        <div class="row">
          <div class="col-md-12">
            <div class="page-heading">
              <h1>Team Hierarchy </h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="box-info">
              <p>Drag &amp; drop hierarchical list with mouse</p>
              <menu id="nestable-menu">
                <button class="btn btn-success" type="button" data-action="expand-all">Expand All</button>
                <button class="btn btn-danger" type="button" data-action="collapse-all">Collapse All</button>
				<button class="btn btn-primary" type="button" onclick="return update_members();" >Update Information</button>
              </menu>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box-info">
              <div class="cf nestable-lists">
                <h4>Team Nikhil </h4>
                <div class="dd" id="nestable">
                  <ol class="dd-list" data-id="1">
				  <?php
				  //$k = 1;
				  $i = 0;
				  if(array_key_exists(1, $team_hierarchy)){
					foreach($team_hierarchy[1] as $team_hie){
							$i++;
							$key = array_search($team_hie->team_mem_id, array_column($team_members, 'id'));
							$name = $team_members[$key]['first_name']." ".$team_members[$key]['last_name'];
							echo '<li class="dd-item" data-id="'.$team_hie->team_mem_id.'" id="team_mem_'.$team_hie->team_mem_id.'">
								  <div class="dd-handle">'.$name.'</div>';
							if(array_key_exists($team_hie->team_mem_id, $team_hierarchy)){
								echo check_child_elements($team_hie->team_mem_id, $team_hierarchy, $i, $team_members);
							}
							echo '</li>';
							
													
					}
				  }else{
					  echo '<div class="dd-empty"></div>';
				  }

				  ?>
				  
                    
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box-info">
              <div class="cf nestable-lists">
                <h4>Team Abhishek</h4>
                <div class="dd" id="nestable2">

                  <ol class="dd-list" data-id="2">
				<?php
				  //$k = 1;
				  $i = 0;
				  if(array_key_exists(2, $team_hierarchy)){
					foreach($team_hierarchy[2] as $team_hie){
							$i++;
							$key = array_search($team_hie->team_mem_id, array_column($team_members, 'id'));
							$name = $team_members[$key]['first_name']." ".$team_members[$key]['last_name'];
							echo '<li class="dd-item" data-id="'.$team_hie->team_mem_id.'" id="team_mem_'.$team_hie->team_mem_id.'">
								  <div class="dd-handle">'.$name.'</div>';
							if(array_key_exists($team_hie->team_mem_id, $team_hierarchy)){
								echo check_child_elements($team_hie->team_mem_id, $team_hierarchy, $i, $team_members);
							}
							echo '</li>';
							
													
					}
				}else{
					  echo '<div class="dd-empty"></div>';
				  }

				  ?>
                   
                  </ol>
                </div>
              </div>
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

<?php $this->load->view('footer/nestable'); ?>

<script>
function update_members(){
	var array = {};
	var i = 0;
	$( "li" ).each(function( index ) {
		if($(this).attr('data-id')){
			//console.log( index + ": " + $( this ).attr('data-id')+ ": "+ $( this ).parent().attr('data-id') );
			var team_lead_id = 0;
			if($( this ).parent().attr('data-id') == 1 || $( this ).parent().attr('data-id') == 2){
				team_lead_id = $( this ).parent().attr('data-id');
			}else{
				team_lead_id = $( this ).parent().parent().attr('data-id');
			}
			
			array[i] = {'team_lead_id' : team_lead_id, 'team_mem_id' : $( this ).attr('data-id')};
			i++;
		}
	});
	$.ajax({
	  method: "POST",
	  url: "<?php echo base_url(); ?>/home/update_team_hierarchy/",
	  data: { array : array }
	})
	  .done(function( msg ) {
			$("#display_success").css('display', '');
			console.log(msg);
	  });
}
</script>

</body>

</html>