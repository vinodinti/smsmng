				<!--START CREATE ROLE -->
					<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="moduleid" class="module">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create <?php echo $rolename; ?> Modules</h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
							<form action="super_admin/settings/create-access-module" method="post" 
							class="form-horizontal ajax-form" accept-charset="utf-8" autocomplete="off" >
							<input type="hidden" id="roleid" name="roleid" value="<?php echo $roleid; ?>"/>
							<span class="text-red error_message roleid_error_msg error"></span>
							
							<input type="hidden" id="rolename" name="rolename" value="<?php echo $rolename; ?>"/>
							<span class="text-red error_message rolename_error_msg error"></span>
								<fieldset>
									<legend>Module Name</legend>
								<div class="row-fluid">	
									
									<div class="span5">
										<div class="control-group">
											<label class="control-label">Select Modules</label>
											<div class="controls">
											
												<select data-placeholder="Module Name" class="input-large m-wrap chzn-select" id="modulename" name="modulename[]" tabindex="1" multiple>
												<?php foreach($rolemodules as $rolemodule){ ?>
												<option value="<?php echo $rolemodule->module_attribute_id; ?>"><?php echo $rolemodule->module_name;  ?></option>
												<?php } ?>
												</select>
												<span class="text-red error_message modulename_error_msg error"><?php echo form_error('modulename'); ?></span>
												
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Status</label>
											<div class="controls">
										<select class="input-medium chzn-select" data-placeholder="Select" tabindex="1" name="rulestatus" >
											<option value="">please Select</option> 
											<?php if(getRecordStatus()) foreach(getRecordStatus() as $RecordStatus) { ?>
											<option value="<?php echo $RecordStatus['status_code_id']; ?>" ><?php echo $RecordStatus['status_code_name']; ?></option>
											<?php } ?>
										</select>
										<span class="text-red error_message rulestatus_error_msg error"></span>										
											</div>
										</div>
									</div>
								
								</div>
							</fieldset>
							<div align="center">
								<button class="btn btn-success" type="submit">Submit</button>
								<button class="btn modulecancel" type="button">Cancel</button>
							</div>
							</form>	
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->	
				<!--END CREATE ROLE -->	
				
<script type="text/javascript">
	$(".chzn-select").chosen();
	//$(".chzn-select-deselect").chosen({allow_single_deselect:true});
	//$("select[id='modulename']").val("").trigger('liszt:updated');
</script>