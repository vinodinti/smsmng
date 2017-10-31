<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Fees Component Details</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/feescomponent/feescomponent/create-fees-component" method="post" 
							class="form-horizontal ajax-form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Fees Component Information</legend>
									<div class="row-fluid event-finder">	
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select event-handler" data-action="feescomponent/getfeesmonthsdetais" data-placeholder="Please Select" tabindex="1" name="batchname" >
														<option value="">Please Select</option>
														<?php if($BatchDetails)foreach($BatchDetails as $Batch){?>
														<option value="<?php echo $Batch->school_batch_id; ?>"><?php echo $Batch->school_batch_value; ?></option>
														<?php } ?>
													</select>
													<span class="text-red error_message batchname_error_msg error"><?php echo form_error('batchname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" name="branchid" tabindex="1" data-action="super_admin/school/branchclass/getClassList">
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
												<label class="control-label">Class Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-sub chzn-call" data-placeholder="Please Select" name="classname" tabindex="1">
													<option value="">Please Select</option>
													</select>
													<span class="text-red error_message classname_error_msg error"><?php echo form_error('classname'); ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Fees Name</label>
												<div class="controls">
													<input type="text" placeholder="Fees Name" name="feesname" class="input-medium"/>
													<span class="text-red error_message feesname_error_msg error"><?php echo form_error('feesname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Fees Amount</label>
												<div class="controls">
													<input type="text" placeholder="Fees Amount" name="feesamount" class="input-medium"/>
													<span class="text-red error_message feesamount_error_msg error"><?php echo form_error('feesamount'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Fees Interval</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" name="feesinterval" tabindex="1" >
														<option value="">Please Select</option>
														<option value="Monthly">Monthly</option>
														<option value="Half-Yearly">Half-Yearly</option>
														<option value="Triannual">Triannual</option>
														<option value="Quarterly">Quarterly</option>
														<option value="Yearly">Yearly</option>
														<option value="Not Applicable">Not Applicable</option>
													</select>
													<span class="text-red error_message feesinterval_error_msg error"><?php echo form_error('feesinterval'); ?></span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="row-fluid">
										<div class="span12">
											<div class="control-group" id="load-event-handler">	
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
<!--
Half-Yearly fee component only 2 months has to be selected
All months has to be selected
Quarterly fee component only 4 months has to be selected
Triannual fee component only 3 months has to be selected
Yearly fee component only 1 months has to be selected
-->