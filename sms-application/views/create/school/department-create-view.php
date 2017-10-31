<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget create" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Department </h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
								
							 <!-- BEGIN FORM-->
							 <form action="super_admin/school/department/create-department" method="post" 
							class="form-horizontal ajax-form" accept-charset="utf-8" autocomplete="off" >
                    
								<fieldset>
									<legend> Department Information</legend>
								<div class="row-fluid">	
						
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Branch Name</label>
											<div class="controls">
												<select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" name="branchid" tabindex="1">
												<?php if($BranchList)foreach($BranchList as $Branch){?>
												<option value="<?php echo $Branch->branch_id; ?>"><?php echo $Branch->branch_name; ?></option>
												<?php } ?>
												</select>
												<span class="text-red error_message branchid_error_msg error"><?php echo form_error('branchid'); ?></span>
											</div>
										</div>
									</div>
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Department Name</label>
											<div class="controls">
												<input type="text" placeholder="Department Name" class="input-medium" name="departmentname" value=""/>
												<span class="text-red error_message departmentname_error_msg error"><?php echo form_error('departmentname'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Status</label>
										  <div class="controls">
											 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" name="departmentstatus" tabindex="1">
												<option value="">Please Select</option>
												<option value="1" >Active</option>
												<option value="0" >Inactive</option>
											 </select>
											 <span class="text-red error_message departmentstatus_error_msg error"><?php echo form_error('departmentstatus'); ?></span>
										  </div>
										</div>
									</div>
							
								
								</div>
								
								
								</fieldset>
								
								
								<div align="center">
									<button class="btn btn-success" type="submit">Submit</button>
									<button class="btn createcancel" type="button">Cancel</button>
								</div>
							</form>	
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->