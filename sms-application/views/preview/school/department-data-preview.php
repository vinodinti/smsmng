<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Department <?php echo $DepartmentInfo->department_name; ?> </h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
								
							 <!-- BEGIN FORM-->
							 <form class="form-horizontal">
                    
								<fieldset>
									<legend> Department Information</legend>
									<input type="hidden" name="departmentid" value="<?php echo $DepartmentInfo->department_id; ?>">
									<span class="text-red error_message departmentid_error_msg error"><?php echo form_error('departmentid'); ?></span>
								<div class="row-fluid">	
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Branch Name</label>
											<div class="controls">
												<label class="control-label">
													<?php echo $DepartmentInfo->branch_name; ?>
												</label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Department Name</label>
											<div class="controls">
												<label class="control-label">
													<?php echo $DepartmentInfo->department_name; ?>
												</label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Create By/On</label>
											<div class="controls">
												<label class="control-label">
												<?php echo getRecordCreatedBy($DepartmentInfo->department_create_by); ?>&nbsp;<?php echo DateFormatCtrl($DepartmentInfo->department_create_on); ?>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Modify By/On</label>
											<div class="controls">
												<label class="control-label">
												<?php echo getRecordCreatedBy($DepartmentInfo->department_modify_by); ?>&nbsp;<?php echo DateFormatCtrl($DepartmentInfo->department_modify_on); ?>
												</label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Status</label>
										  <div class="controls">
											  <label class="control-label">
											  <?php echo getRecordStatusText($DepartmentInfo->department_status); ?>
											  </label>
										  </div>
										</div>
									</div>
								
								</div>
								
								</fieldset>
								
								<div align="center">
									<button class="btn editcancel" type="button">Cancel</button>
								</div>
							</form>	
							
						</div>
					</div>
<!-- END EXAMPLE TABLE widget-->