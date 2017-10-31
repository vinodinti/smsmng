<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget editid" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit <?php echo $ClassInfo->class_name; ?> </h4>
							
							<span class="tools">
								<a href="#"><i class="icon-remove editcancel" title="Close" ></i></a>
							</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/branchclass/update-class" method="post" class="form-horizontal ajax-form-modify" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
							
								<fieldset>
									<legend>Class</legend>
									<input type="hidden" name="classid" value="<?php echo set_value('classid', $ClassInfo->class_id); ?>">
									<span class="text-red error_message classid_error_msg error"><?php echo form_error('classid'); ?></span>
									
									<div class="row-fluid">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" name="branchid" tabindex="1">
													<option value="">Please Select</option>
													<?php if($BranchList)foreach($BranchList as $Branch){?>
													<option value="<?php echo $Branch->branch_id; ?>" <?php echo $Branch->branch_id==$ClassInfo->branch_fk_id ?  "selected='selected'":""; ?> ><?php echo $Branch->branch_name; ?></option>
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
													<input type="text" placeholder="First Name" name="classname" class="input-medium" value="<?php echo set_value('classname', $ClassInfo->class_name); ?>"/>
													<span class="text-red error_message classname_error_msg error"><?php echo form_error('classname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" tabindex="1" name="classstatus">
													<option value="">Please Select</option>
													<option value="1" <?php echo $ClassInfo->class_status==1 ? "selected='selected;'":""; ?> >Active</option>
													<option value="0" <?php echo $ClassInfo->class_status==0 ? "selected='selected;'":""; ?>>Inactive</option>
												 </select>
												 <span class="text-red error_message classstatus_error_msg error"><?php echo form_error('classstatus'); ?></span>
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