<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget editid" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit <?php echo $BatchInfo->school_batch_value; ?> </h4>
							
							<span class="tools">
								<a><i class="icon-remove editcancel" title="Close" ></i></a>
							</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/batch/update-batch" method="post" class="form-horizontal ajax-form-modify" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
							
								<fieldset>
									<legend>Batch Information</legend>
									<input type="hidden" name="batchid" value="<?php echo $BatchInfo->school_batch_id; ?>">
									<span class="text-red error_message batchid_error_msg error"><?php echo form_error('batchid'); ?></span>
									<div class="row-fluid event-finder">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch Name</label>
												<div class="controls">
													<input type="text" placeholder="Batch Name" name="batchname" class="input-medium" value="<?php echo $BatchInfo->school_batch_value; ?>"/>
													<span class="text-red error_message batchname_error_msg error"><?php echo form_error('batchname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch Start On</label>
												<div class="controls">
													<input type="text" placeholder="Batch Start On" name="batchstarton" class="input-medium date-picker" value="<?php echo DateFormatCtrl($BatchInfo->school_batch_start_on); ?>"/>
													<span class="text-red error_message batchstarton_error_msg error"><?php echo form_error('batchstarton'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch End On</label>
												<div class="controls">
													<input type="text" placeholder="Batch End On" name="batchendon" class="input-medium date-picker" value="<?php echo DateFormatCtrl($BatchInfo->school_batch_end_on); ?>"/>
													<span class="text-red error_message batchendon_error_msg error"><?php echo form_error('batchendon'); ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" name="batchstatus" tabindex="1" >
														<option value="">Please Select</option>
														<option value="1" <?php echo $BatchInfo->school_batch_status==1?"selected='selected'":""; ?> >Active</option>
														<option value="0" <?php echo $BatchInfo->school_batch_status==0?"selected='selected'":""; ?>>InActive</option>
													</select>
													<span class="text-red error_message batchstatus_error_msg error"><?php echo form_error('batchstatus'); ?></span>
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