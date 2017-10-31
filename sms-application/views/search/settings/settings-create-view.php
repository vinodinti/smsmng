				<!--START CREATE ROLE -->
					<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:none;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Employee Role</h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
							<form action="super_admin/settings/create-role" method="post" 
							class="form-horizontal ajax-form" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Role Name</legend>
								<div class="row-fluid">	
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Role Name</label>
											<div class="controls">
												<input type="text" placeholder="Role name" name="role_name" class="input-medium" />
												<span class="text-red error_message role_name_error_msg error"></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Status</label>
											<div class="controls">
										<select class="input-medium chzn-select" data-placeholder="Select" tabindex="1" name="role_status" >
											<option value="">please Select</option> 
											<?php if(getRecordStatus()) foreach(getRecordStatus() as $RecordStatus) { ?>
											<option value="<?php echo $RecordStatus['status_code_id']; ?>" ><?php echo $RecordStatus['status_code_name']; ?></option>
											<?php } ?>
										</select>
										<span class="text-red error_message role_status_error_msg error"></span>										
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
				<!--END CREATE ROLE -->	