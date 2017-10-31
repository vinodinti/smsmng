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
                           <a href="#"><span class="badge badge-important"><i class="icon-home"></i></span></a><span class="divider">&nbsp;</span>
                       </li>
					   <li>
                           <a href="#" title="Add"><i class="icon-plus"></i></a><span class="divider">&nbsp;</span>
                       </li>
                       <li>
                           <a href="#" title="Edit"><i class="icon-edit"></i></a> <span class="divider">&nbsp;</span>
                       </li>
                       <li><a href="#" title="Delete"><i class="icon-trash"></i></a><span class="divider">&nbsp;</span></li>
					   
					   <li><a href="#" title="Email"><i class="icon-envelope"></i></a><span class="divider-last">&nbsp;</span></li>
					   
                   </ul>
		
				   
				   
                   <!-- END PAGE TITLE & BREADCRUMB-->
				   
			<!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">	
                <div class="span12">
				
				<?php //creating settings
				echo $this->CI->create();
				//modify settings
				//echo $this->CI->update(); 
				?><div id="modify"></div>
				
				
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> Role Title </h4>
							
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
								<a><i class="icon-edit" data-target="super_admin/settings/update"></i></a>
							</span>
							<span class="tools">
								<a>
								<i class="icon-trash"></i></a>
							</span>
							<span class="tools" >
								<a href="#" data-toggle="modal" data-target="#myModal" >
								<i class="icon-plus"></i></a>
							</span>
							
                        </div>
						
                        <div class="widget-body" id="load_data_table">
						
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
                                    <th>Role Name</th>
                                    <th class="hidden-phone">Create On</th>
                                    <th class="hidden-phone">Create By</th>
                                    <th class="hidden-phone">Status</th>
									<th>Access Module</th>
                                </tr>
                            </thead>
						
							<tbody>
									<?php $RoleDetails = $this->CI->setting_data_table();
										if($RoleDetails)foreach($RoleDetails as $Role){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Role->role_id; ?>" /></td>
										<td class="center"><?php echo $Role->role_name; ?></td>
										<td class="center hidden-phone"><?php echo $Role->role_create_on; ?></td>
										<td class="center hidden-phone"><?php echo $Role->create_by; ?></td>
										<td class="hidden-phone">
											<?php echo getRecordStatusIcons($Role->role_status); ?>
										</td>
										<td class="center">
										<button class="btn btn-info load_event" data-id="<?php echo $Role->role_id; ?>"
										data-name="<?php echo $Role->role_name; ?>" type="submit">ADD</button>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
                        </div>
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