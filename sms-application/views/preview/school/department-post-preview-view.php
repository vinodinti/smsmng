<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Department Post <?php echo $DepartmentPostInfo->department_posts_name; ?></h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
								
							 <!-- BEGIN FORM-->
							 <form class="form-horizontal ajax-form-modify">
                    
								<fieldset>
									<legend> Department Post Information</legend>
								<div class="row-fluid event-finder">	
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Branch Name</label>
											<div class="controls">
												<label class="control-label">
													<?php echo $BranchList->branch_name; ?>
												</label>
											</div>
										</div>
									</div>
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Department Name</label>
											<div class="controls">
												<label class="control-label">
													<?php echo $departmentInfo->department_name; ?>
												</label>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Department Post Name</label>
										  <div class="controls">
											<label class="control-label">
												<?php echo $DepartmentPostInfo->department_posts_name; ?>
											</label>
										  </div>
										</div>
									</div>
								
								</div>
								<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Create By/On</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordCreatedBy($DepartmentPostInfo->department_posts_create_by); ?>&nbsp;<?php echo DateFormatCtrl($DepartmentPostInfo->department_posts_create_on); ?></label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Modify By/On</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordCreatedBy($DepartmentPostInfo->department_posts_modify_by); ?>&nbsp;<?php echo DateFormatCtrl($DepartmentPostInfo->department_posts_modify_on); ?></label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
												<div class="controls">
													<label class="control-label"><?php echo getRecordStatusText($DepartmentPostInfo->department_posts_status); ?></label>
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