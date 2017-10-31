 <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">
		 <div class="sidebar-toggler hidden-phone">
		 </div>
         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse" align="center">
			<h5>&nbsp;</h5>
			<?php if(getFileExists("storage/student-photos/".getMemberPhoto())){ ?>
				<img src="<?php echo base_url()."storage/student-photos/".getMemberPhoto(); ?>">
			<?php }else{ ?>
				<img src="<?php echo base_url()."storage/student-photos/avatar.jpg"; ?>">
			<?php } ?>
			<p><?php echo getMemberName(); ?></p>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu" style="margin-top:2px;">
		  
              <li class="has-sub <?php echo $this->uri->segment(3)=="dashboard" ? "active" : "" ?>">
                  <a href="<?php echo base_url();?>users/student/dashboard" class="">
                      <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                      <span class="arrow"></span>
                  </a>
              </li>
			 <li class="has-sub <?php echo $this->uri->segment(3)=="student" ? "active" : "" ?>">
                  <a href="<?php echo base_url(); ?>users/student/student" class="">
                      <span class="icon-box"> <i class="icon-dashboard"></i></span> Profile
                      <span class="arrow"></span>
                  </a>
              </li>
              
			 <li class="has-sub <?php echo $this->uri->segment(2)=="settings" ? "active" : "" ?>">
                  <a href="javascript:;" class="">
                      <span class="icon-box"> <i class="icon-dashboard"></i></span> Settings
                      <span class="arrow"></span>
                  </a>
             </li>
              
              <li><a class="" href="<?php echo base_url(); ?>admin/dashboard/logout"><span class="icon-box"><i class="icon-user"></i></span> Log Out</a></li>
          </ul>
          <!-- END SIDEBAR MENU -->
      </div>
      <!-- END SIDEBAR -->