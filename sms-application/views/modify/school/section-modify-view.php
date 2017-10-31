<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget editid" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit <?php echo $SectionInfo->section_name; ?> </h4>
							
							<span class="tools">
								<a href="#"><i class="icon-remove editcancel" title="Close" ></i></a>
							</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/branchclasssection/update-section" method="post" class="form-horizontal ajax-form-modify" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
							
								<fieldset>
									<legend>Student Branch </legend>
									<input type="hidden" name="sectionid" value="<?php echo set_value('sectionid', $SectionInfo->section_id); ?>">
									<span class="text-red error_message sectionid_error_msg error"><?php echo form_error('sectionid'); ?></span>
									
									<div class="row-fluid event-finder">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" name="branchid" tabindex="1" data-action="super_admin/school/branchclass/getClassList">
													<option value="">Please Select</option>
													<?php if($BranchList)foreach($BranchList as $Branch){?>
													<option value="<?php echo $Branch->branch_id; ?>" <?php echo $Branch->branch_id==$SectionInfo->branch_fk_id ?  "selected='selected'":""; ?> ><?php echo $Branch->branch_name; ?></option>
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
													<?php if($ClassList)foreach($ClassList as $Class){?>
													<option value="<?php echo $Class->class_id; ?>" <?php echo $Class->class_id==$SectionInfo->class_id ?  "selected='selected'":""; ?> ><?php echo $Class->class_name; ?></option>
													<?php } ?>
												 </select>
												 <span class="text-red error_message classname_error_msg error"><?php echo form_error('classname'); ?></span>
											  </div>
											</div>
										</div>
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Section Name</label>
												<div class="controls">
													<input type="text" placeholder="Section Name" name="sectionname" class="input-medium" value="<?php echo set_value('sectionname', $SectionInfo->section_name); ?>"/>
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
													<option value="1" <?php echo $SectionInfo->section_status==1 ? "selected='selected;'":""; ?> >Active</option>
													<option value="0" <?php echo $SectionInfo->section_status==0 ? "selected='selected;'":""; ?>>Inactive</option>
												 </select>
												 <span class="text-red error_message sectionstatus_error_msg error"><?php echo form_error('sectionstatus'); ?></span>
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