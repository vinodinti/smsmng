<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Grade Details</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/grade/create-grade" method="post" 
							class="form-horizontal ajax-form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Grade Information</legend>
									<div class="row-fluid event-finder">	
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Total Marks</label>
												<div class="controls">
												<input type="text" placeholder="Total Marks" name="totalmarks" class="input-medium"/>
												<span class="text-red error_message totalmarks_error_msg error"><?php echo form_error('totalmarks'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Grade Marks</label>
												<div class="controls">
													<input type="text" placeholder="Grade Marks" name="grademarks" class="input-medium"/>
													<span class="text-red error_message grademarks_error_msg error"><?php echo form_error('grademarks'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Grade Name</label>
												<div class="controls">
													<input type="text" placeholder="Grade Name" name="gradename" class="input-medium"/>
													<span class="text-red error_message gradename_error_msg error"><?php echo form_error('gradename'); ?></span>
												</div>
											</div>
										</div>
								
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Grade Rule</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" name="graderule" tabindex="1" >
														<option value="">Please Select</option>
														<option value=">">></option>
														<option value=">=">>=</option>
														<option value="<"><</option>
														<option value="<="><=</option>
													</select>
													<span class="text-red error_message graderule_error_msg error"><?php echo form_error('graderule'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" name="gradestatus" tabindex="1" >
														<option value="">Please Select</option>
														<option value="1">Active</option>
														<option value="0">InActive</option>
													</select>
													<span class="text-red error_message gradestatus_error_msg error"><?php echo form_error('gradestatus'); ?></span>
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