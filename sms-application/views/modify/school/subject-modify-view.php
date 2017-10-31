<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget editid" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit <?php echo $SubjectInfo->subject_name; ?> </h4>
							
							<span class="tools">
								<a href="#"><i class="icon-remove editcancel" title="Close" ></i></a>
							</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/subjects/update-subject" method="post" class="form-horizontal ajax-form-modify" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
							
								<fieldset>
									<legend>Subject </legend>
									<input type="hidden" name="subjectid" value="<?php echo set_value('subjectid', $SubjectInfo->subject_id); ?>">
									<span class="text-red error_message subjectid_error_msg error"><?php echo form_error('subjectid'); ?></span>
									
									<div class="row-fluid event-finder">	
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Subject Name</label>
												<div class="controls">
													<input type="text" placeholder="Subject Name" name="subjectname" class="input-medium" value="<?php echo set_value('subjectname', $SubjectInfo->subject_name); ?>"/>
													<span class="text-red error_message subjectname_error_msg error"><?php echo form_error('subjectname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" tabindex="1" name="subjectstatus">
													<option value="">Please Select</option>
													<option value="1" <?php echo $SubjectInfo->subject_status==1 ? "selected='selected;'":""; ?> >Active</option>
													<option value="0" <?php echo $SubjectInfo->subject_status==0 ? "selected='selected;'":""; ?>>Inactive</option>
												 </select>
												 <span class="text-red error_message subjectstatus_error_msg error"><?php echo form_error('subjectstatus'); ?></span>
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