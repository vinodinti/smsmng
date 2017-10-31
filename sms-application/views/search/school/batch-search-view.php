<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Batch Details</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							 <!-- BEGIN FORM-->
                            <form action="super_admin/school/batch/search" method="post" 
							class="form-horizontal ajax-form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Batch Information</legend>
									<div class="row-fluid event-finder">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch Name</label>
												<div class="controls">
													<input type="text" placeholder="Batch Name" name="batchname" class="input-medium"/>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch Start On</label>
												<div class="controls">
													<input type="text" placeholder="Batch Start On" name="batchstarton" class="input-medium date-picker"/>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch End On</label>
												<div class="controls">
													<input type="text" placeholder="Batch End On" name="batchendon" class="input-medium date-picker"/>
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
														<option value="1">Active</option>
														<option value="0">InActive</option>
														<option value="2">Delete</option>
													</select>
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