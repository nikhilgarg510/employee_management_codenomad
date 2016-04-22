<div class="head-title">
      <div class="menu-switch"><i class="fa fa-bars"></i></div>
      <!--row start-->
      <div class="row"> 
        <!--col-md-12 start-->
        <div class="col-md-12"> 
          <!--profile dropdown start-->
          <ul class="user-info pull-right">
            <!--li class="hidden-xs">
              <input type="text" placeholder=" Search" class="form-control page-search">
            </li-->
            <li class="profile-info dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="#"> <img class="img-circle" alt="" src="<?php echo base_url('media'); ?>/defaultimg/dummy.jpg"><?php echo $this->session->name; ?></a>
              <ul class="dropdown-menu">
                <li class="caret"></li>
                <li> <a href="<?php echo base_url(); ?>home/edit_profile/"> <i class="fa fa-user"></i> Edit Profile </a> </li>
                <li> <a href="<?php echo base_url(); ?>home/change_password/"> <i class="fa fa-inbox"></i> Change Password </a> </li>
                
                <li> <a href="<?php echo site_url('home/logout'); ?>"> <i class="fa fa-clipboard"></i> Log Out </a> </li>
              </ul>
            </li>
          </ul>
          <!--profile dropdown end--> 
          
          <!--top nav start-->
          <ul class="nav top-menu hidden-xs notify-row">
            <!--task start-->
            <!--li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-tasks"></i> <span class="badge bg-success">6</span> </a>
              <ul class="dropdown-menu extended tasks-bar">
                <div class="notify-arrow notify-arrow-red"></div>
                <li>
                  <p class="red">You have 4 pending tasks</p>
                </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Dashboard v1.3</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success"> <span class="sr-only">40% Complete</span> </div>
                  </div>
                  </a> </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning"> <span class="sr-only">60% Complete (warning)</span> </div>
                  </div>
                  </a> </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Iphone Development</div>
                    <div class="percent">87%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info"> <span class="sr-only">87% Complete</span> </div>
                  </div>
                  </a> </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Mobile App</div>
                    <div class="percent">33%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger"> <span class="sr-only">33% Complete (danger)</span> </div>
                  </div>
                  </a> </li>
                <li> <a href="#">
                  <div class="task-info">
                    <div class="desc">Dashboard v1.3</div>
                    <div class="percent">45%</div>
                  </div>
                  <div class="progress progress-striped active">
                    <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar"> <span class="sr-only">45% Complete</span> </div>
                  </div>
                  </a> </li>
                <li class="external"> <a href="#">See All Tasks</a> </li>
              </ul>
            </li-->
            <!--task end--> 
            
            <!--message start-->
            <!--li class="dropdown" id="header_inbox_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope-o"></i> <span class="badge bg-important">5</span> </a>
              <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-red"></div>
                <li>
                  <p class="red">You have 7 new messages</p>
                </li>
                <li> <a href="#"> <span class="photo"><img src="images/avatar2.jpg" alt="avatar"></span> <span class="subject"> <span class="from">Jonathan Smith</span> <span class="time">Just now</span> </span> <span class="message"> consectetur adipiscing elit </span> </a> </li>
                <li> <a href="#"> <span class="photo"><img src="images/avatar2.jpg" alt="avatar"></span> <span class="subject"> <span class="from">John Doe</span> <span class="time">20 mins</span> </span> <span class="message">consectetur adipiscing elit </span> </a> </li>
                <li> <a href="#"> <span class="photo"><img src="images/avatar2.jpg" alt="avatar"></span> <span class="subject"> <span class="from">Jonathan Smith</span> <span class="time">5 hrs</span> </span> <span class="message"> This is awesome dashboard. </span> </a> </li>
                <li> <a href="#"> <span class="photo"><img src="images/avatar2.jpg" alt="avatar"></span> <span class="subject"> <span class="from">John Doe</span> <span class="time">Just now</span> </span> <span class="message"> consectetur adipiscing elit </span> </a> </li>
                <li class="external"> <a href="#">See all messages</a> </li>
              </ul>
            </li-->
            <!--message end--> 
            
            <!--notification start-->
            <!--li class="dropdown" id="header_notification_bar"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <span class="badge bg-warning">7</span> </a>
              <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-red"></div>
                <li>
                  <p class="red">You have 3 new notifications</p>
                </li>
                <li> <a href="#"> <span class="label label-danger"><i class="fa fa-bolt"></i></span> Server #3 overloaded. <span class="small italic">34 mins</span> </a> </li>
                <li> <a href="#"> <span class="label label-warning"><i class="fa fa-bell"></i></span> Server #10 not respoding. <span class="small italic">1 Hours</span> </a> </li>
                <li> <a href="#"> <span class="label label-danger"><i class="fa fa-bolt"></i></span> Database overloaded 24%. <span class="small italic">4 hrs</span> </a> </li>
                <li> <a href="#"> <span class="label label-success"><i class="fa fa-plus"></i></span> New user registered. <span class="small italic">Just now</span> </a> </li>
                <li> <a href="#"> <span class="label label-info"><i class="fa fa-bullhorn"></i></span> Application error. <span class="small italic">10 mins</span> </a> </li>
                <li class="external"> <a href="#">See all notifications</a> </li>
              </ul>
            </li-->
            <!--notification end-->
          </ul>
          <!--top nav end--> 
        </div>
        <!--col-md-12 end--> 
      </div>
      <!--row end--> 
    </div>