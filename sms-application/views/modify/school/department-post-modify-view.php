<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit Department Post </h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
								
							 <!-- BEGIN FORM-->
							 <form action="super_admin/school/departmentpost/update-department-post" method="post" 
							class="form-horizontal ajax-form-modify" accept-charset="utf-8" autocomplete="off" >
                    
								<fieldset>
									<legend> Department Post Information</legend>
									<input type="hidden" name="departmentpostid" value="<?php echo $DepartmentPostInfo->department_posts_id; ?>">
									<span class="text-red error_message departmentpostid_error_msg error"><?php echo form_error('departmentpostid'); ?></span>
								<div class="row-fluid event-finder">	
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Branch Name</label>
											<div class="controls">
												<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" name="branchid" tabindex="1" data-action="super_admin/school/departmentpost/getdepartmentlist">
												<option value="">Please Select</option>
												<?php if($BranchList)foreach($BranchList as $Branch){?>
												<option value="<?php echo $Branch->branch_id; ?>" <?php echo $DepartmentPostInfo->branch_fk_id==$Branch->branch_id ? "selected='selected;'" : "" ?> ><?php echo $Branch->branch_name; ?></option>
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
												<select class="input-medium m-wrap chzn-select chzn-select-sub chzn-call" data-placeholder="Please Select" name="departmentid" tabindex="1">
												<option value="">Please Select</option>
												<?php if($departmentInfo)foreach($departmentInfo as $department){ ?>
													<option value="<?php echo $department->department_id; ?>" <?php echo $DepartmentPostInfo->department_fk_id==$department->department_id ? "selected='selected;'" : ""; ?> ><?php echo $department->department_name; ?></option>
												<?php } ?>
												</select>
												<span class="text-red error_message departmentid_error_msg error"><?php echo form_error('departmentid'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Department Post Name</label>
										  <div class="controls">
											<input type="text" placeholder="Department Post Name" class="input-medium" name="departmentpostname" value="<?php echo $DepartmentPostInfo->department_posts_name; ?>"/>
											<span class="text-red error_message departmentpostname_error_msg error"><?php echo form_error('departmentpostname'); ?></span>
										  </div>
										</div>
									</div>
								
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Status</label>
										  <div class="controls">
											 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" name="departmentpoststatus" tabindex="1">
												<option value="">Please Select</option>
												<option value="1" <?php echo $DepartmentPostInfo->department_posts_status == 1 ? "selected='selected;'" : ""; ?> >Active</option>
												<option value="0" <?php echo $DepartmentPostInfo->department_posts_status == 0 ? "selected='selected;'" : ""; ?> >Inactive</option>
											 </select>
											 <span class="text-red error_message departmentpoststatus_error_msg error"><?php echo form_error('departmentpoststatus'); ?></span>
										  </div>
										</div>
									</div>
								</div>
								</fieldset>
								
								<div align="center">
									<button class="btn btn-success" type="submit">Submit</button>
									<button class="btn editcancel" type="button">Cancel</button>
								</div>
							</form>	
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->
<script type="text/javascript">
	$(".chzn-select").chosen();
	$(".chzn-select-deselect").chosen({allow_single_deselect:true});
</script>