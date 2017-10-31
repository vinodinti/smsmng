				<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget editid" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Batch <?php echo $BatchInfo->school_batch_value; ?> </h4>
							
							<span class="tools">
								<a href="#"><i class="icon-remove editcancel" title="Close" ></i></a>
							</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form class="form-horizontal ajax-form-modify">
							
								<fieldset>
									<legend>Batch Information</legend>
									<input type="hidden" name="batchid" value="<?php echo $BatchInfo->school_batch_id; ?>">
									<span class="text-red error_message batchid_error_msg error"><?php echo form_error('batchid'); ?></span>
									<div class="row-fluid event-finder">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch Name</label>
												<div class="controls">
													<label class="control-label"><?php echo $BatchInfo->school_batch_value; ?></label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch Start On</label>
												<div class="controls">
													<label class="control-label"><?php echo DateFormatCtrl($BatchInfo->school_batch_start_on); ?></label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch End On</label>
												<div class="controls">
													<label class="control-label"><?php echo DateFormatCtrl($BatchInfo->school_batch_end_on); ?></label>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Create By/On</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordCreatedBy($BatchInfo->school_batch_create_by); ?>&nbsp;<?php echo DateFormatCtrl($BatchInfo->school_batch_create_on); ?></label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Modify By/On</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordCreatedBy($BatchInfo->school_batch_modify_by); ?>&nbsp;<?php echo DateFormatCtrl($BatchInfo->school_batch_modify_on); ?></label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordStatusText($BatchInfo->school_batch_status); ?></label>
												</div>
											</div>
										</div>
									</div>

								</fieldset>
								
								<div align="center">
									<button class="btn editcancel" type="button">Close</button>
								</div>
								
							</form>
							
						</div>
					</div>
				<!-- END EXAMPLE TABLE widget-->