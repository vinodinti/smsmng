<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i>Class Time Table Details</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/classtimetable/get-event-time-table-info" method="post" 
							class="form-horizontal ajax-form-event-block" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Branch Class Information</legend>
									<div class="row-fluid event-finder">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" name="branchname" tabindex="1" data-action="super_admin/school/branchclass/getClassList">
													<option value="">Please Select</option>
													<?php if($BranchList)foreach($BranchList as $Branch){?>
													<option value="<?php echo $Branch->branch_id; ?>"><?php echo $Branch->branch_name; ?></option>
													<?php } ?>
													</select>
													<span class="text-red error_message branchname_error_msg error"><?php echo form_error('branchname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Class Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-sub chzn-call" data-placeholder="Please Select" name="classname" tabindex="1" data-action="super_admin/school/branchclasssection/getSectionList">
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
													<select class="input-medium m-wrap chzn-select chzn-call chzn-call-sub" data-placeholder="Please Select" tabindex="1" name="sectionname" >
														<option value="">Please Select</option>
													</select>
													<span class="text-red error_message sectionname_error_msg error"><?php echo form_error('sectionname'); ?></span>
												</div>
											</div>
										</div>
								
									</div>
									<div class="row-fluid event-finder">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch Name</label>
												<div class="controls">
												<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" name="batchname" tabindex="1" >
														<option value="">Please Select</option>
													<?php foreach($BatchDetails as $Batch){ ?>
														<option value="<?php echo $Batch->school_batch_id; ?>"><?php echo $Batch->school_batch_value; ?></option>
													<?php } ?>
												</select>
												 <span class="text-red error_message batchname_error_msg error"><?php echo form_error('batchname'); ?></span>
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
							
							<div class="append-event-block"></div> <!-- Display Class Time Table -->
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->
