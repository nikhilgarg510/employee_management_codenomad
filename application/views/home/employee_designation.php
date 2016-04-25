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
	  
	  <?php if($message_employee_added == "success"){  ?>
	 		<div class="alert alert-success "> <span class="alert-icon"><i class="fa fa-check-square-o"></i></span>
                <div class="notification-info">
                  <ul class="clearfix notification-meta">
                    <li class="pull-left notification-sender"><?php echo $password_error_message; ?></li>                    
                  </ul>                 
                </div>
              </div>
	  <?php } else if($message_employee_added == "error"){ ?>
			<div class="alert alert-danger"> <span class="alert-icon"><i class="fa fa-minus-square-o"></i></span>
                <div class="notification-info">
                  <ul class="clearfix notification-meta">
                    <li class="pull-left notification-sender"><span><?php echo $password_error_message; ?></li>                    
                  </ul>
                </div>
              </div>
	  <?php } ?>

                <!--row start-->
        <div class="row">
        <!--col-md-12 start-->
          <div class="col-md-12">
          <!--box-info start-->
            <div class="box-info">
              <h4>List of Employee Designations </h4>
              <hr>
              <!--adv-table start-->
              <div class="adv-table">
                <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
                  <thead>
                    <tr>
					<th>ID</th>
                      <th>Employee Designation</th>
                      <th>Description</th> 
					  <th>Delete</th>
					</tr>
                  </thead>
                  <tbody>
				  <tr>
					  <td></td>
                      <td></td>
                      <td></td>         
					  <td></td>					  
                    </tr>
				  <?php foreach($designation as $design){ ?>
                    <tr>
					  <td><?php echo $design->id; ?></td>
                      <td><?php echo $design->employee_designation; ?></td>
                      <td><?php echo $design->description; ?></td>   
					  <td><button class="btn btn-round btn-danger" type="button"  onclick="location.href = '<?php echo base_url(); ?>home/employee_designation/<?php echo $design->id; ?>';">Delete</button></td>
                    </tr>
				  <?php } ?>
                    
                  </tbody>
                </table>
              </div><!--adv-table end-->
            </div><!--box-info end-->
          </div><!--col-md-12 end-->
        </div><!--row end-->

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

</html>