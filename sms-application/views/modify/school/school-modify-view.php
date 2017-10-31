<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget create" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit School </h4>
							<span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                            </span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="<?php echo base_url(); ?>super_admin/school/school/update-school" method="post" class="form-horizontal ajax-form-file" enctype="multipart/form-data" accept-charset="utf-8" >
								<fieldset>
									<legend> School Information</legend>
									<input type="hidden" name="schoolid" value="<?php echo $SchoolInfo->school_id; ?>">
									<span class="text-red error_message schoolid_error_msg error"><?php echo form_error('schoolid'); ?></span>
									<input type="hidden" name="branchid" value="<?php echo $SchoolInfo->branch_id; ?>">
									<span class="text-red error_message branchid_error_msg error"><?php echo form_error('branchid'); ?></span>
									<input type="hidden" name="delpath" value="<?php echo $SchoolInfo->school_logo; ?>" />
								<div class="row-fluid">	
						
									<div class="span4">
										<div class="control-group">
											<label class="control-label">School Name</label>
											<div class="controls">
												<input type="text" placeholder="School Name" class="input-medium" name="schoolname" value="<?php echo $SchoolInfo->school_name; ?>" />
												<span class="text-red error_message schoolname_error_msg error"><?php echo form_error('schoolname'); ?></span>
											</div>
										</div>
									</div>
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Register No</label>
											<div class="controls">
												<input type="text" placeholder="Register No" class="input-medium" name="registrationno" value="<?php echo $SchoolInfo->recognition_no; ?>"/>
												<span class="text-red error_message registrationno_error_msg error"><?php echo form_error('registrationno'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Phone No</label>
											<div class="controls">
												<input type="text" placeholder="Phone No" class="input-medium" name="phoneno" value="<?php echo $SchoolInfo->branch_phone_no1; ?>" />
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
												<input type="text" placeholder="Contact No" class="input-medium" name="contactno" value="<?php echo $SchoolInfo->branch_phone_no2; ?>" />
												<span class="text-red error_message contactno_error_msg error"><?php echo form_error('contactno'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Register By</label>
											<div class="controls">
												<input type="text" placeholder="Full Name" class="input-medium" name="registername" value="<?php echo $SchoolInfo->register_full_name; ?>" />
												<span class="text-red error_message registername_error_msg error"><?php echo form_error('registername'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Register Email</label>
											<div class="controls">
												<input type="text" placeholder="Register Email" class="input-medium" name="registeremail" value="<?php echo $SchoolInfo->register_email; ?>" />
												<span class="text-red error_message registeremail_error_msg error"><?php echo form_error('registeremail'); ?></span>
											</div>
										</div>
									</div>
									</div>
									<div class="row-fluid">
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Gender</label>
											<div class="controls">
											<select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" id="genderid" name="gender" tabindex="1">
												<option value="">Please Select</option>
												<option value="MALE" <?php if($SchoolInfo->gender=='MALE'){echo "selected='selected;'";} ?> >MALE</option>
												<option value="FEMALE" <?php if($SchoolInfo->gender=='FEMALE'){echo "selected='selected;'";} ?> >FEMALE</option>
											 </select>
											 <span class="text-red error_message gender_error_msg error"><?php echo form_error('gender'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Upload Logo</label>
											<div class="controls">
												<input type="file" id="uploadlogo" class="default uploadfile" name="uploadlogo" />
												<span class="text-red error_message uploadlogo_error_msg error"><?php echo form_error('uploadlogo'); ?></span>
												<?php if(getFileExists('storage/school-logo/'.$SchoolInfo->school_logo)){ ?>
													<img id="imgInp" style="height:50px; width:50px;" src="<?php echo base_url().'storage/school-logo/'.$SchoolInfo->school_logo; ?>" />
												<?php }else{ ?>
													<img id="imgInp" style="height:50px; width:50px; display:none;" src="" />
												<?php } ?>
											</div>
										</div>
									</div>
									
									
								</div>
								
								
								</fieldset>
								<fieldset>
									<legend>School Address</legend>
									
									<div class="row-fluid">	
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Address1</label>
											<div class="controls">
												<textarea rows="1" placeholder="Adderess" class="input-medium" id="addressone" name="addressone"><?php echo $SchoolInfo->branch_address1; ?></textarea>
												<span class="text-red error_message addressone_error_msg error"><?php echo form_error('addressone'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Address2</label>
											<div class="controls">
												<textarea rows="1" id="address" placeholder="Adderess" class="input-medium" name="addresstwo"><?php echo $SchoolInfo->branch_address2; ?></textarea>
												<span class="text-red error_message addresstwo_error_msg error"><?php echo form_error('addresstwo'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">PIN</label>
											<div class="controls">
											<input type="text" placeholder="PIN Code" class="input-medium" id="pin" name="pin" value="<?php echo $SchoolInfo->branch_pin; ?>" />
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
											 <select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" tabindex="1" id="country" name="country" data-action="super_admin/school/school/getState">
												<option value="">Please Select</option>
												<?php if($CountryList) {
													foreach($CountryList as $Country){ ?>
										<option value="<?php echo $Country->country_id; ?>"  <?php if($Country->country_id==$SchoolInfo->branch_country){echo "selected='selected;'";} ?> ><?php echo $Country->country_name; ?></option>	
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
											 <select class="input-medium m-wrap chzn-select chzn-call chzn-select-sub" data-placeholder="Please Select" id="state" name="state" tabindex="1">
												<option value="">Please Select</option>
												<?php if($StateList){ 
												foreach($StateList as $State){ ?>
											<option value="<?php echo $State->state_id; ?>"  <?php if($State->state_id==$SchoolInfo->branch_state){echo "selected='selected;'";} ?> ><?php echo $State->state_name; ?></option>			
												<?php } } ?>
											 </select>
											 <span class="text-red error_message state_error_msg error"><?php echo form_error('state'); ?></span>
										  </div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">City</label>
										  <div class="controls">
											 <input type="text" placeholder="City" class="input-medium" id="city" name="city" value="<?php echo $SchoolInfo->branch_city ; ?>" />
											 <span class="text-red error_message city_error_msg error"><?php echo form_error('city'); ?></span>
										  </div>
										</div>
									</div>
									</div>
									<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Status</label>
										  <div class="controls">
											 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" id="schoolstatusid" name="schoolstatus" tabindex="1">
												<option value="">Please Select</option>
												<option value="1" <?php if($SchoolInfo->branch_status==1){echo "selected='selected;'";} ?> >Active</option>
												<option value="0" <?php if($SchoolInfo->branch_status==0){echo "selected='selected;'";} ?> >Inactive</option>
											 </select>
											 <span class="text-red error_message schoolstatus_error_msg error"><?php echo form_error('schoolstatus'); ?></span>
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