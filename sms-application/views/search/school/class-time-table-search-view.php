<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Class Time Table Details</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/classtimetable/create-class-time-table" method="post" 
							class="form-horizontal ajax-form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
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
									<div class="row-fluid">
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Day Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call chzn-call-sub" data-placeholder="Please Select" tabindex="1" name="dayname" >
														<option value="">Please Select</option>
													<?php foreach($WeekList as $WeekName){ ?>
														<option value="<?php echo $WeekName->week_id; ?>"><?php echo $WeekName->week_name; ?></option>
													<?php } ?>
													</select>
													<span class="text-red error_message dayname_error_msg error"><?php echo form_error('dayname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Start Time</label>
											  <div class="controls">
												 <input type="text" placeholder="Start Time" name="starttime" class="input-medium clockface"/>
												 <span class="text-red error_message starttime_error_msg error"><?php echo form_error('starttime'); ?></span>
											  </div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">End Time</label>
											  <div class="controls">
												 <input type="text" placeholder="End Time" name="endtime" class="input-medium clockface"/>
												 <span class="text-red error_message endtime_error_msg error"><?php echo form_error('endtime'); ?></span>
											  </div>
											</div>
										</div>
									
									</div>
									<div class="row-fluid">
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Period Name</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" name="periodname" tabindex="1" >
														<option value="">Please Select</option>
													<?php foreach($PeriodList as $PeriodName){ ?>
														<option value="<?php echo $PeriodName->period_id; ?>"><?php echo $PeriodName->period_name; ?></option>
													<?php } ?>
													</select>
												 <span class="text-red error_message periodname_error_msg error"><?php echo form_error('periodname'); ?></span>
											  </div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch</label>
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
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" name="classtimetablestatus" tabindex="1" >
														<option value="">Please Select</option>
														<option value="1">Active</option>
														<option value="0">InActive</option>
													</select>
													<span class="text-red error_message classtimetablestatus_error_msg error"><?php echo form_error('classtimetablestatus'); ?></span>
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