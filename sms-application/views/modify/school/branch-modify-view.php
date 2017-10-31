<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit Branch </h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
								
							 <!-- BEGIN FORM-->
							 <form action="super_admin/school/branch/update-branch" method="post" 
							class="form-horizontal ajax-form-modify" accept-charset="utf-8" autocomplete="off" >
                    
								<fieldset>
									<legend> Branch Information</legend>
									<input type="hidden" name="branchid" value="<?php echo $BranchInfo->branch_id; ?>">
									<span class="text-red error_message branchid_error_msg error"><?php echo form_error('branchid'); ?></span>
								<div class="row-fluid">	
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Branch Name</label>
											<div class="controls">
												<input type="text" placeholder="Branch Name" class="input-medium" name="branchname" value="<?php echo $BranchInfo->branch_name; ?>" />
												<span class="text-red error_message branchname_error_msg error"><?php echo form_error('branchname'); ?></span>
											</div>
										</div>
									</div>
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Recognition No</label>
											<div class="controls">
												<input type="text" placeholder="Recognition No" class="input-medium" name="recognitionno" value="<?php echo $BranchInfo->recognition_no; ?>"/>
												<span class="text-red error_message recognitionno_error_msg error"><?php echo form_error('recognitionno'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Phone No</label>
											<div class="controls">
												<input type="text" placeholder="Phone No" class="input-medium" name="phoneno" value="<?php echo $BranchInfo->branch_phone_no1; ?>" />
												<span class="text-red error_message phoneno_error_msg error"><?php echo form_error('phoneno'); ?></span>
											</div>
										</div>
									</div>
							
								
								</div>
								
								<div class="row-fluid">
								
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Contact No</label>
											<div class="controls">
												<input type="text" placeholder="Contact No" class="input-medium" name="contactno" value="<?php echo $BranchInfo->branch_phone_no2; ?>" />
												<span class="text-red error_message contactno_error_msg error"><?php echo form_error('contactno'); ?></span>
											</div>
										</div>
									</div>
									
									
								</div>
								
								</fieldset>
								<fieldset>
								
									<legend>Branch Address</legend>
									
									<div class="row-fluid">	
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Address1</label>
											<div class="controls">
												<textarea rows="1" placeholder="Adderess" class="input-medium" id="addressone" name="addressone"><?php echo $BranchInfo->branch_address1; ?></textarea>
												<span class="text-red error_message addressone_error_msg error"><?php echo form_error('addressone'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Address2</label>
											<div class="controls">
												<textarea rows="1" id="address" placeholder="Adderess" class="input-medium" name="addresstwo"><?php echo $BranchInfo->branch_address1; ?></textarea>
												<span class="text-red error_message addresstwo_error_msg error"><?php echo form_error('addresstwo'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">PIN</label>
											<div class="controls">
											<input type="text" placeholder="PIN Code" class="input-medium" id="pin" name="pin" value="<?php echo $BranchInfo->branch_pin; ?>" />
											<span class="text-red error_message pin_error_msg error"><?php echo form_error('pin'); ?></span>
											</div>
										</div>
									</div>
								
								</div>
								<div class="row-fluid event-finder">	
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Country</label>
										  <div class="controls">
											 <select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" tabindex="1" id="countryname" name="country" data-action="super_admin/school/school/getState">
												<option value="">Please Select</option>
												<?php if($CountryList) {
													foreach($CountryList as $Country){ ?>
										<option value="<?php echo $Country->country_id; ?>" <?php if($Country->country_id==$BranchInfo->branch_country){ echo "selected='selected'"; } ?> ><?php echo $Country->country_name; ?></option>	
													<?php } } ?>
											 </select>
											 <span class="text-red error_message country_error_msg error"><?php echo form_error('country'); ?></span>
										  </div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">State</label>
										  <div class="controls">
											 <select class="input-medium m-wrap chzn-select chzn-call chzn-select-sub" data-placeholder="Please Select" id="statename" name="state" tabindex="1">
												<option value="">Please Select</option>
												<?php if($StateList){ 
												foreach($StateList as $State){ ?>
											<option value="<?php echo $State->state_id; ?>" <?php if($State->state_id==$BranchInfo->branch_state){ echo "selected='selected'"; } ?>><?php echo $State->state_name; ?></option>			
												<?php } } ?>
											 </select>
											 <span class="text-red error_message state_error_msg error"><?php echo form_error('state'); ?></span>
										  </div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Status</label>
										  <div class="controls">
											 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" id="branchstatus" name="branchstatus" tabindex="1">
												<option value="">Please Select</option>
												<option value="1" <?php echo $BranchInfo->branch_status==1 ? "selected='selected'":""; ?> >Active</option>
												<option value="0" <?php echo $BranchInfo->branch_status==0 ? "selected='selected'":""; ?> >Inactive</option>
											 </select>
											 <span class="text-red error_message schoolstatus_error_msg error"><?php echo form_error('branchstatus'); ?></span>
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