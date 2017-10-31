<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Previous School Details</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							 <!-- BEGIN FORM-->
                            <form action="super_admin/student/student/create-previous-school-info" method="post" 
							class="form-horizontal ajax-form-event-block" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>School Information</legend>
									<input type="hidden" placeholder="Student ID" name="studentid" class="input-medium" value="<?php echo set_value('studentid', $StudentID); ?>"/>
									<span class="text-red error_message studentid_error_msg error"><?php echo form_error('studentid'); ?></span>
									
									<div class="row-fluid">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">School Name</label>
												<div class="controls">
													<input type="text" placeholder="School Name" name="schoolname" class="input-medium" value="<?php echo set_value('schoolname'); ?>"/>
													<span class="text-red error_message schoolname_error_msg error"><?php echo form_error('schoolname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">From Class</label>
												<div class="controls">
													<input type="text" placeholder="From Class" name="fromclass" class="input-medium" value="<?php echo set_value('fromclass'); ?>"/>
													<span class="text-red error_message fromclass_error_msg error"><?php echo form_error('fromclass'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">To Class</label>
												<div class="controls">
													<input type="text" placeholder="To Class" name="toclass" class="input-medium" value="<?php echo set_value('toclass'); ?>"/>
													<span class="text-red error_message toclass_error_msg error"><?php echo form_error('toclass'); ?></span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="row-fluid">
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Roll No</label>
												<div class="controls">
													<input type="text" placeholder="Roll No" name="rollno" class="input-medium" value="<?php echo set_value('rollno'); ?>"/>
													<span class="text-red error_message rollno_error_msg error"><?php echo form_error('rollno'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Total Marks</label>
												<div class="controls">
													<input type="text" placeholder="Total Marks" name="totalmarks" class="input-medium" value="<?php echo set_value('totalmarks'); ?>"/>
													<span class="text-red error_message totalmarks_error_msg error"><?php echo form_error('totalmarks'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Marks Obtained</label>
												<div class="controls">
													<input type="text" placeholder="Marks Obtained" name="marksobtained" class="input-medium" value="<?php echo set_value('marksobtained'); ?>"/>
													<span class="text-red error_message marksobtained_error_msg error"><?php echo form_error('marksobtained'); ?></span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="row-fluid">
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Medium</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" name="medium" tabindex="1">
														<option value="">Please Select</option>
														<option value="TELUGU">TELUGU</option>
														<option value="ENGLISH">ENGLISH</option>
													</select>
													<span class="text-red error_message medium_error_msg error"><?php echo form_error('medium'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Board</label>
												<div class="controls">
													<input type="text" placeholder="Board" name="board" class="input-medium" value="<?php echo set_value('board'); ?>"/>
													<span class="text-red error_message board_error_msg error"><?php echo form_error('board'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch</label>
												<div class="controls">
													<input type="text" placeholder="Batch" name="batch" class="input-medium" value="<?php echo set_value('batch'); ?>"/>
													<span class="text-red error_message batch_error_msg error"><?php echo form_error('batch'); ?></span>
												</div>
											</div>
										</div>
										
									</div> 	
									<div class="row-fluid">
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">School Address</label>
												<div class="controls">
													<textarea placeholder="School Address" name="schooladdress" class="input-medium" value="<?php echo set_value('schooladdress'); ?>"></textarea>
													<span class="text-red error_message schooladdress_error_msg error"><?php echo form_error('schooladdress'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Admission Number</label>
												<div class="controls">
													<input type="text" placeholder="Admission Number" name="admissionno" class="input-medium" value="<?php echo set_value('admissionno'); ?>"/>
													<span class="text-red error_message admissionno_error_msg error"><?php echo form_error('admissionno'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Admission On</label>
											    <div class="controls">
													<input type="text" placeholder="Admission On" name="admissionon" class="input-medium date-picker" value="<?php echo set_value('admissionno'); ?>"/>
													<span class="text-red error_message admissionon_error_msg error"><?php echo form_error('admissionon'); ?></span>
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