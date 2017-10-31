<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Employee Attendance</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/employee/employeeattendance/get-branch-employee-attendance-list" method="post" class="form-horizontal ajax-form-event-block" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Employee Attendance Information</legend>
									
									<div class="row-fluid event-finder">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" name="branchid" tabindex="1">
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
												<label class="control-label">Section</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" name="attendancetype" tabindex="1">
														<option value="">Please Select</option>
														<option value="MORNING">Morning Section</option>
														<option value="NOON">Noon Section</option>
													</select>
													<span class="text-red error_message attendancetype_error_msg error"><?php echo form_error('attendancetype'); ?></span>
												</div>
											</div>
										</div>
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Date</label>
												<div class="controls">
													<input type="text" value="" class="input-medium date-picker" name="attendancedate" placeholder="Attendance Date">
													<span class="text-red error_message attendancedate_error_msg error"><?php echo form_error('attendancedate'); ?></span>
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
							<div class="append-event-block"></div> <!-- Display Employee attendance -->
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->