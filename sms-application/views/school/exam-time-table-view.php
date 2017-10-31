 <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
			
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                
                   <ul class="breadcrumb">
                       <li>
						<a data-target="super_admin/school/examtimetable/create-event-exam-time-table-info" class="create-event-view" title="Create">View Exam Time Table</a>
                        <span class="divider">&nbsp;</span>
                       </li>
					   <li>
                           <a href="#" title="Add"><i class="icon-plus"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#" title="Edit"><i class="icon-edit"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li>
							<a href="#" title="Delete"><i class="icon-trash"></i></a><span class="divider">&nbsp;</span>
					   </li>
					   <li>
							<a href="#" title="Email"><i class="icon-envelope"></i></a><span class="divider-last">&nbsp;</span>
					   </li>
					   
                   </ul>
		
				   
				   
                   <!-- END PAGE TITLE & BREADCRUMB-->
				   
			<!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">	
                <div class="span12">
				
				
				<?php //Start creating edit preview ?>
				<div id="modify"></div>
				<?php //Start creating edit preview ?>
				
				
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Exam Time Table Details </h4>
							
                            <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
							   <!--<a href="javascript:;" class="icon-remove"></a>-->
                            </span>
							
							<span class="tools">
								<a>
								<i class="icon-search" title="Search" ></i></a>
							</span>
							<span class="tools">
								<a>
								<i class="icon-envelope" title="Email" ></i></a>
							</span>
							<span class="tools">
								<a>
								<i data-target="super_admin/school/examtimetable/data-preview" class="icon-external-link" title="View" ></i></a>
							</span>
							<span class="tools">
								<a>
								<i  data-target="super_admin/school/examtimetable/update" class="icon-edit" title="Edit"></i></a>
							</span>
							<span class="tools">
								<a>
								<i class="icon-trash" title="delete"></i></a>
							</span>
							<span class="tools" >
								<a><i class="icon-plus" data-target="super_admin/school/examtimetable/create" title="Add"></i></a>
							</span>
							
                        </div>
						
						<!-- Start Employee Data Table -->
                        <div class="widget-body" id="load_data_table">
							<?php echo $this->CI->data_table(); ?>
                        </div>
						<!-- End Employee Data Table -->
						
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->
				   
				   
               </div>
            </div>
            <!-- END PAGE HEADER-->
               
         </div>
         <!-- END PAGE CONTAINER-->
		 
		 
      </div>
      <!-- END PAGE -->