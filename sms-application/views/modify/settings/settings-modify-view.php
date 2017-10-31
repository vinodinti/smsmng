				<!--EDIT START ROLE -->
					<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="editid" class="edit">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit Employee Role</h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
							<form action="super_admin/settings/update-role" method="post" 
							class="form-horizontal ajax-form-modify" accept-charset="utf-8" autocomplete="off" >
							<input type="hidden" value="<?php echo $roleInfo->role_id; ?>" name="role_id">
							<span class="text-red error_message role_id_error_msg error"></span>
								<fieldset>
									<legend>Role Name</legend>
								<div class="row-fluid">	
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Role Name</label>
											<div class="controls">
												<input type="text" placeholder="Role name" name="role_name" class="input-medium" value="<?php echo $roleInfo->role_name; ?>" />
												<span class="text-red error_message role_name_error_msg error"></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Status</label>
											<div class="controls">
									
										<select class="input-medium chzn-select" data-placeholder="Select" name="role_status">
											<option value="">please Select</option> 
											<?php if(getRecordStatus())foreach(getRecordStatus() as $RecordStatus) { ?>
											<option value="<?php echo $RecordStatus['status_code_id'];?>"
											<?php if($RecordStatus['status_code_id']==$roleInfo->role_status){ echo "selected='selected'"; } ?>
											><?php echo $RecordStatus['status_code_name']; ?></option>
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
								<button class="btn editcancel" type="button">Cancel</button>
							</div>
							</form>	
							
						</div>
					</div>
					<!--EDIT END EXAMPLE TABLE widget-->
				<!--EDIT END ROLE -->
<script type="text/javascript">
	$(".chzn-select").chosen();
	$(".chzn-select-deselect").chosen({allow_single_deselect:true});
</script>