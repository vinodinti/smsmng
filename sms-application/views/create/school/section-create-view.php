<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Section Name</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/branchclasssection/create-section" method="post" 
							class="form-horizontal ajax-form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Branch Class Section Information</legend>
									
									<div class="row-fluid event-finder">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" name="branchid" tabindex="1" data-action="super_admin/school/branchclass/getClassList">
													<option value="">Please Select</option>
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
												<label class="control-label">Class Name</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select chzn-call chzn-select-sub" data-placeholder="Please Select" id="classname" name="classname" tabindex="1">
													<option value="">Please Select</option>
												 </select>
												 <span class="text-red error_message classname_error_msg error"><?php echo form_error('classname'); ?></span>
											  </div>
											</div>
										</div>
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Section Name</label>
												<div class="controls">
													<input type="text" placeholder="Section Name" name="sectionname" class="input-medium" value="<?php echo set_value('sectionname'); ?>"/>
													<span class="text-red error_message sectionname_error_msg error"><?php echo form_error('sectionname'); ?></span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" tabindex="1" name="sectionstatus">
													<option value="">Please Select</option>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												 </select>
												 <span class="text-red error_message sectionstatus_error_msg error"><?php echo form_error('sectionstatus'); ?></span>
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
<script type="text/javascript">
	$(".chzn-select").chosen();
	$(".chzn-select-deselect").chosen({allow_single_deselect:true});
</script>