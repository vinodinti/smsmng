 <!-- BEGIN SIDEBAR -->
      <div id="sidebar" class="nav-collapse collapse">

         <div class="sidebar-toggler hidden-phone"></div>   

         <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
         <div class="navbar-inverse">
            <form class="navbar-search visible-phone">
               <input type="text" class="search-query" placeholder="Search" />
            </form>
         </div>
         <!-- END RESPONSIVE QUICK SEARCH FORM -->
         <!-- BEGIN SIDEBAR MENU -->
          <ul class="sidebar-menu">
              <li class="has-sub <?php echo $this->uri->segment(2)=="dashboard" ? "active" : "" ?>">
                  <a href="javascript:;" class="">
                      <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li class="<?php echo $this->uri->segment(3)=="dashboard" ? "active" : "" ?>"><a class="" href="index.html">Dashboard 1</a></li>
                      <li><a class="<?php echo $this->uri->segment(3)=="dashboard1" ? "active" : "" ?>" href="index_2.html">Dashboard 2</a></li>

                  </ul>
              </li>
			 
              <li class="has-sub <?php echo $this->uri->segment(2)=="school" ? "active" : "" ?>">
                  <a href="<?php echo base_url(); ?>super_admin/school/school" class="">
                      <span class="icon-box"> <i class="icon-book"></i></span> School
                      <span class="arrow <?php echo $this->uri->segment(2)=="school" ? "open" : "" ?>"></span>
                  </a>
                  <ul class="sub">
					  <li class="<?php echo $this->uri->segment(3)=="batch" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/batch">Batch</a></li>
					  <li class="<?php echo $this->uri->segment(3)=="branch" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/branch">Branch</a></li>
					  <li class="<?php echo $this->uri->segment(3)=="department" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/department">Department</a></li>
					  <li class="<?php echo $this->uri->segment(3)=="departmentpost" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/departmentpost">Department Posts</a></li>
					  <li class="<?php echo $this->uri->segment(3)=="branchclass" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/branchclass">Class</a></li>
					  <li class="<?php echo $this->uri->segment(3)=="branchclasssection" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/branchclasssection">Section</a></li>
					  <li class="<?php echo $this->uri->segment(3)=="subjects" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/subjects">Subject</a></li>
					   <li class="<?php echo $this->uri->segment(3)=="classtimetable" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/classtimetable">Class Time Table</a></li>
					  <li class="<?php echo $this->uri->segment(3)=="examtimetable" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/examtimetable">Exam time table</a></li>
					  <li class="<?php echo $this->uri->segment(3)=="grade" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/school/grade">Grade</a></li>
                  </ul>	
              </li>
			  
			  <li class="has-sub <?php echo $this->uri->segment(2)=="employee" ? "active" : "" ?>">
			    <a href="<?php echo base_url(); ?>super_admin/employee/employee" class="">
				  <span class="icon-box"><i class="icon-glass"></i></span> Employee
				  <span class="arrow <?php echo $this->uri->segment(2)=="employee" ? "open" : "" ?>"></span>
			    </a>
				<ul class="sub">
					<li class="<?php echo $this->uri->segment(3)=="employeeattendance" ? "active" : "" ?>"><a class="" href="<?php echo base_url(); ?>super_admin/employee/employeeattendance">Employee Attendance</a></li>
				</ul> 
              </li>
			  
              <li class="has-sub <?php echo $this->uri->segment(2)=="student" ? "active" : "" ?>">
                  <a href="<?php echo base_url(); ?>super_admin/student/student" class="">
                      <span class="icon-box"><i class="icon-cogs"></i></span> Student
                      <span class="arrow"></span>
                  </a>
              </li>
              <li class="has-sub <?php echo $this->uri->segment(2)=="finance" ? "active" : "" ?>">
                  <a href="<?php echo base_url(); ?>super_admin/feescomponent/feescomponent" class="">
                      <span class="icon-box"><i class="icon-tasks"></i></span> Fees Component
                      <span class="arrow"></span>
                  </a>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-fire"></i></span> Icons
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="font_awesome.html">Font Awesome</a></li>
                      <li><a class="" href="glyphicons.html">Glyphicons</a></li>
                  </ul>
              </li>
              <li class="has-sub">
                  <a href="javascript:;" class="">
                      <span class="icon-box"><i class="icon-map-marker"></i></span> Maps
                      <span class="arrow"></span>
                  </a>
                  <ul class="sub">
                      <li><a class="" href="maps_google.html"> Google Maps</a></li>
                      <li><a class="" href="maps_vector.html"> Vector Maps</a></li>
                  </ul>
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