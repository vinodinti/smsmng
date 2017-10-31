<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget editid" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Class <?php echo $ClassInfo->class_name; ?> </h4>
							
							<span class="tools">
								<a href="#"><i class="icon-remove editcancel" title="Close" ></i></a>
							</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form class="form-horizontal ajax-form-modify">
							
								<fieldset>
									<legend>Branch </legend>
									<div class="row-fluid">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<label class="control-label">
														<?php echo $BranchInfo->branch_name; ?>
													</label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Class Name</label>
												<div class="controls">
													<label class="control-label">
														<?php echo set_value('classname', $ClassInfo->class_name); ?>
													</label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Create By/On</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordCreatedBy($ClassInfo->class_create_by); ?>&nbsp;<?php echo DateFormatCtrl($ClassInfo->class_create_on); ?></label>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Modify By/On</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordCreatedBy($ClassInfo->class_modify_by); ?>&nbsp;<?php echo DateFormatCtrl($ClassInfo->class_modify_on); ?></label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordStatusText($ClassInfo->class_status); ?></label>
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