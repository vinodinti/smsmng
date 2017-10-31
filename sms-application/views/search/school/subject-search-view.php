<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Subject Name</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/subjects/create-subject" method="post" 
							class="form-horizontal ajax-form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Subject Information</legend>
									
									<div class="row-fluid event-finder">
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Subject Name</label>
											  <div class="controls">
												 <input type="text" placeholder="Subject Name" name="subjectname" class="input-medium"/>
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
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												 </select>
												 <span class="text-red error_message subjectstatus_error_msg error"><?php echo form_error('subjectstatus'); ?></span>
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