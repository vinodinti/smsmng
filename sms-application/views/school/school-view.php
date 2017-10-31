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
                <!-- START PAGE TITLE & BREADCRUMB-->
						<!-- keep here --><ul class="breadcrumb"></ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
				
			<!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">	
                <div class="span12">
				
				<?php //creating settings echo $this->CI->create(); ?>
				<!-- modify settings -->
				<div id="modify"></div>
				<!-- modify settings -->
				
				
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>School</h4>
							
                            <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
							   <!--<a href="javascript:;" class="icon-remove"></a>-->
                            </span>
							
							<span class="tools">
								<a>
								<i class="icon-search"></i></a>
							</span>
							<span class="tools">
								<a>
								<i class="icon-envelope"></i></a>
							</span>
							<span class="tools">
								<a><i class="icon-edit event-edit" data-target="super_admin/school/school/update"></i></a>
							</span>
							<!--
							<span class="tools">
								<a>
								<i class="icon-trash"></i></a>
							</span>
							<span class="tools" >
								<a href="#" data-toggle="modal" data-target="#myModal" >
								<i class="icon-plus"></i></a>
							</span>
							-->
                        </div>
						<!-- Start School Data Table -->
                        <div class="widget-body" id="load_data_table">
						<?php echo $this->CI->data_table(); ?>
                        </div>
						<!-- End School Data Table -->
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