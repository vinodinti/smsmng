<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit Grade <?php echo $GradeInfo->grade_name; ?></h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form class="form-horizontal">
								<fieldset>
									<legend>Grade Information</legend>
									<input type="hidden" name="gradeid" value="<?php echo $GradeInfo->grade_id; ?>">
									<span class="text-red error_message gradeid_error_msg error"><?php echo form_error('gradeid'); ?></span>
									<div class="row-fluid event-finder">	
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Total Marks</label>
												<div class="controls">
												<label class="control-label">
												<?php echo $GradeInfo->total_marks; ?>
												</label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Grade Marks</label>
												<div class="controls">
													<label class="control-label">
													<?php echo $GradeInfo->grade_marks; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Grade Name</label>
												<div class="controls">
													<label class="control-label">
													<?php echo $GradeInfo->grade_name; ?>
													</label>
												</div>
											</div>
										</div>
								
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Grade Rule</label>
												<div class="controls">
													<label class="control-label">
													<?php echo $GradeInfo->grade_rule; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Create By/On</label>
												<div class="controls">
													<label class="control-label">
													<?php echo getRecordCreatedBy($GradeInfo->grade_create_by); ?>&nbsp;
													<?php echo DateFormatCtrl($GradeInfo->grade_create_on); ?>
													</label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Modify By/On</label>
												<div class="controls">
													<label class="control-label">
													<?php echo getRecordCreatedBy($GradeInfo->grade_modify_by); ?>&nbsp;
													<?php echo DateFormatCtrl($GradeInfo->grade_modify_on); ?>
													</label>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordStatusText($GradeInfo->grade_status); ?>
													</label>
												</div>
											</div>
										</div>
									</div>

								</fieldset>

								<div align="center">
									<button class="btn createcancel" type="button">Cancel</button>
								</div>
								
							</form>	
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->