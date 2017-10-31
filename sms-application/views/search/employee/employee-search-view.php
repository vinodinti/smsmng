<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Employee </h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="employee/create-employee" method="post" 
							class="form-horizontal ajax-form-file" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Employee Branch Information</legend>
									
									<div class="row-fluid event-finder">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" name="branchid" tabindex="1" data-action="super_admin/school/departmentpost/getdepartmentlist">
													<option value="">Please Select</option>
													<?php if($BranchList)foreach($BranchList as $Branch){?>
													<option value="<?php echo $Branch->branch_id; ?>"><?php echo $Branch->branch_name; ?></option>
													<?php } ?>
													</select>
													<span class="text-red error_message branchid_error_msg error"><?php echo form_error('branchid'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Department Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-sub chzn-call" data-placeholder="Please Select" name="departmentid" tabindex="1" data-action="super_admin/school/departmentpost/getdepartmentpostlist">
													<option value="">Please Select</option>
													</select>
													<span class="text-red error_message departmentid_error_msg error"><?php echo form_error('departmentid'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Department Post Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call chzn-call-sub" data-placeholder="Please Select" tabindex="1" name="departmentpostid" >
														<option value="">Please Select</option>
													</select>
													<span class="text-red error_message departmentpostid_error_msg error"><?php echo form_error('departmentpostid'); ?></span>
												</div>
											</div>
										</div>
								
									</div>
									<div class="row-fluid event-finder">
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Employee Type</label>
												<div class="controls">
													<select tabindex="1" name="employeetype" class="input-medium m-wrap chzn-select">
														<option value="">Please Select</option>
														<option value="PERMANENT">PERMANENT</option>
														<option value="TEMPORARY">TEMPORARY</option>
														<option value="PART TIME">PART TIME</option>
													</select>
													<span class="text-red error_message employeetype_error_msg error"><?php echo form_error('employeetype'); ?></span>
												</div>
											</div>
										</div>
										<div class="span6">
											<div class="control-group">
												<label class="control-label">Subjects</label>
												<div class="controls">
													<select tabindex="1" name="subjects[]" class="input-medium m-wrap chzn-select" multiple="multiple" data-placeholder="Select Some Options">
														<?php if($SubjectList)foreach($SubjectList as $Subject){ ?>
															<option value="<?php echo $Subject->subject_id; ?>"><?php echo $Subject->subject_name; ?></option>
														<?php } ?>
													</select>
													<span class="text-red error_message subjects_error_msg error"><?php echo form_error('subjects'); ?></span>
												</div>
											</div>
										</div>
									
									</div>

								</fieldset>
							
								<fieldset>
									<legend> Employee Information</legend>
								<div class="row-fluid">	
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">First Name</label>
											<div class="controls">
												<input type="text" placeholder="First Name" name="firstname" class="input-medium" value="<?php echo set_value('firstname'); ?>"/>
												<span class="text-red error_message firstname_error_msg error"><?php echo form_error('firstname'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Middle Name</label>
											<div class="controls">
												<input type="text" placeholder="Middle Name" name="middlename" class="input-medium" value="<?php echo set_value('middlename'); ?>"/>
												<span class="text-red error_message middlename_error_msg error"><?php echo form_error('middlename'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Last Name</label>
											<div class="controls">
												<input type="text" placeholder="Last Name" name="lastname" class="input-medium" value="<?php echo set_value('lastname'); ?>"/>
												<span class="text-red error_message lastname_error_msg error"><?php echo form_error('lastname'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Gender</label>
											<div class="controls">
												<select tabindex="1" name="gender" class="input-medium m-wrap chzn-select">
													<option value="">Please Select</option>
													<option value="M">Male</option>
													<option value="F">Female</option>
												</select>
												<span class="text-red error_message gender_error_msg error"><?php echo form_error('gender'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Mobile No</label>
											<div class="controls">
												<input type="text" placeholder="Mobile No" name="mobileno" class="input-medium" value="<?php echo set_value('mobileno'); ?>" />
												<span class="text-red error_message mobileno_error_msg error"><?php echo form_error('mobileno'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Contact No</label>
											<div class="controls">
												<input type="text" placeholder="Contact No" name="contactno" class="input-medium" value="<?php echo set_value('contactno'); ?>" />
												<span class="text-red error_message contactno_error_msg error"><?php echo form_error('contactno'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Specification</label>
											<div class="controls">
												<input type="text" placeholder="Specification" name="specification" class="input-medium" value="<?php echo set_value('specification'); ?>"/>
												<span class="text-red error_message specification_error_msg error"><?php echo form_error('specification'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Qualifiacation</label>
											<div class="controls">
												<input type="text" placeholder="Qualifiacation" name="qualifiacation" class="input-medium" value="<?php echo set_value(''); ?>"/>
												<span class="text-red error_message qualifiacation_error_msg error"><?php echo form_error('qualifiacation'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Religion</label>
											<div class="controls">
												<input type="text" placeholder="Religion" name="religion" class="input-medium" value="<?php echo set_value('religion'); ?>" />
												<span class="text-red error_message religion_error_msg error"><?php echo form_error('religion'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								
								<div class="row-fluid">
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Employee ID</label>
											<div class="controls">
												<input type="text" placeholder="Employee ID" name="employeeid" class="input-medium" value="<?php echo set_value('employeeid', $EmployeeCustomID); ?>" readonly = "readonly;"/>
												<span class="text-red error_message employeeid_error_msg error"><?php echo form_error('employeeid'); ?></span>
											</div>
										</div>
									</div>
								
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Email ID</label>
											<div class="controls">
												<input type="text" placeholder="Email" name="emailid" class="input-medium" value="<?php echo set_value('emailid'); ?>" />
												<span class="text-red error_message emailid_error_msg error"><?php echo form_error('emailid'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Password</label>
											<div class="controls">
												<input type="text" placeholder="*********" class="input-medium" name="password" value="<?php echo set_value('password'); ?>" />
												<span class="text-red error_message password_error_msg error"><?php echo form_error('password'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Join Date</label>
											<div class="controls">
												<input type="text" placeholder="Join Date" name="joindate" class="input-medium date-picker" value="<?php echo set_value('joindate'); ?>" />
												<span class="text-red error_message joindate_error_msg error"><?php echo form_error('joindate'); ?></span>
											</div>
										</div>
									</div>
								
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Upload Photo</label>
											<div class="controls">
												<input type="file" id="uploadphoto" class="default uploadfile" name="uploadphoto" />
												<span class="text-red error_message uploadphoto_error_msg error"><?php echo form_error('uploadphoto'); ?></span>
											    <img id="imgInp" style="height:50px; width:50px; display:none;" src="" />
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Dob</label>
											<div class="controls">
												<input type="text" placeholder="Dob" name="dob" class="input-medium date-picker" value="<?php echo set_value('dob'); ?>"/>
												<span class="text-red error_message dob_error_msg error"><?php echo form_error('dob'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								<div class="row-fluid">
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Aadhar No</label>
											<div class="controls">
												<input type="text" placeholder="Aadhar No" name="aadharno" class="input-medium" value="<?php echo set_value('aadharno'); ?>" />
												<span class="text-red error_message aadharno_error_msg error"><?php echo form_error('aadharno'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">PAN Card No</label>
											<div class="controls">
												<input type="text" placeholder="PAN Card No" name="pancardno" class="input-medium" value="<?php echo set_value('pancardno'); ?>" />
												<span class="text-red error_message pancardno_error_msg error"><?php echo form_error('pancardno'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								</fieldset>
								
								
								<fieldset>
									<legend>Employee Profile</legend>
									<div class="row-fluid">
								
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Father Name</label>
												<div class="controls">
													<input type="text" placeholder="Father Name" class="input-medium" name="fathername" value="<?php echo set_value('fathername'); ?>">
													<span class="text-red error_message fathername_error_msg error"><?php echo form_error('fathername'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Mother Name</label>
												<div class="controls">
													<input type="text" placeholder="Mother Name" class="input-medium" name="mothernname" value="<?php echo set_value('mothernname'); ?>">
													<span class="text-red error_message mothernname_error_msg error"><?php echo form_error('mothernname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Contact Person Name</label>
												<div class="controls">
													<input type="text" placeholder="Contact Person Name" class="input-medium" name="contactpersonname" value="<?php echo set_value('contactpersonname'); ?>">
													<span class="text-red error_message contactpersonname_error_msg error"><?php echo form_error('contactpersonname'); ?></span>
												</div>
											</div>
										</div>

									</div>
									<div class="row-fluid">
								
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Contact Person Mobile No</label>
												<div class="controls">
													<input type="text" placeholder="Contact Person Mobile No" class="input-medium" name="contactpersonmobileno" value="<?php echo set_value('contactpersonmobileno'); ?>">
													<span class="text-red error_message contactpersonmobileno_error_msg error"><?php echo form_error('contactpersonmobileno'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Contact Person Relation</label>
												<div class="controls">
													<input type="text" placeholder="Contact Person Relation" class="input-medium" name="contactpersonrelation" value="<?php echo set_value('contactpersonrelation'); ?>">
													<span class="text-red error_message contactpersonrelation_error_msg error"><?php echo form_error('contactpersonrelation'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Marital Status</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" tabindex="1" id="maritalstatus" name="maritalstatus">
															<option value="">Please Select</option>
															<option value="SINGLE">SINGLE</option>
															<option value="MARRIED">MARRIED</option>
															<option value="DIVORCED">DIVORCED</option>
													</select>
													<span class="text-red error_message maritalstatus_error_msg error"><?php echo form_error('maritalstatus'); ?></span>
												</div>
											</div>
										</div>
									
									</div>
									<div class="row-fluid">
								
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Spouse Name</label>
												<div class="controls">
													<input type="text" placeholder="Spouse Name" class="input-medium" name="spousename" value="<?php echo set_value('spousename'); ?>">
													<span class="text-red error_message spousename_error_msg error"><?php echo form_error('spousename'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">No Of Children</label>
												<div class="controls">
													<input type="text" placeholder="No Of Children" class="input-medium" name="noofchildren" value="<?php echo set_value('noofchildren'); ?>">
													<span class="text-red error_message noofchildren_error_msg error"><?php echo form_error('noofchildren'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Anniversary Date</label>
												<div class="controls">
													<input type="text" placeholder="Anniversary Date" class="input-medium date-picker" name="anniversarydate" value="<?php echo set_value('anniversarydate'); ?>">
													<span class="text-red error_message anniversarydate_error_msg error"><?php echo form_error('anniversarydate'); ?></span>
												</div>
											</div>
										</div>
									
									</div>
								</fieldset>
								
								<fieldset>
									<legend>Permanent Address</legend>
									
									<div class="row-fluid">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Address One</label>
												<div class="controls">
													<textarea rows="1" placeholder="Adderess" class="input-medium" id="paddressone" name="paddressone" value="<?php echo set_value('paddressone'); ?>" ></textarea>
													<span class="text-red error_message paddressone_error_msg error"><?php echo form_error('paddressone'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Address Two</label>
												<div class="controls">
													<textarea rows="1" id="paddresstwo" placeholder="Adderess" class="input-medium" name="paddresstwo" value="<?php echo set_value('paddresstwo'); ?>"></textarea>
													<span class="text-red error_message paddresstwo_error_msg error"><?php echo form_error('paddresstwo'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">PIN</label>
												<div class="controls">
												<input type="text" placeholder="PIN Code" class="input-medium" id="ppin" name="ppin" value="<?php echo set_value('ppin'); ?>" />
												<span class="text-red error_message ppin_error_msg error"><?php echo form_error('ppin'); ?></span>
												</div>
											</div>
										</div>
								
									</div>
									<div class="row-fluid event-finder">

										<div class="span4">
											<div class="control-group">
												<label class="control-label">Country</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" tabindex="1" id="pcountry" name="pcountry" data-action="super_admin/school/school/getState">
													<option value="">Please Select</option>
													<?php if($CountryList) {
														foreach($CountryList as $Country){ ?>
											<option value="<?php echo $Country->country_id; ?>"><?php echo $Country->country_name; ?></option>	
														<?php } } ?>
													
												 </select>
												 <span class="text-red error_message pcountry_error_msg error"><?php echo form_error('pcountry'); ?></span>
											  </div>
											</div>
										</div>
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label">State</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select chzn-call chzn-select-sub" data-placeholder="Please Select" id="pstate" name="pstate" tabindex="1">
													<option value="">Please Select</option>
													<?php if($StateList){ 
													foreach($StateList as $State){ ?>
												<option value="<?php echo $State->state_id; ?>"><?php echo $State->state_name; ?></option>			
													<?php } } ?>
												 </select>
												 <span class="text-red error_message pstate_error_msg error"><?php echo form_error('pstate'); ?></span>
											  </div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">City</label>
											  <div class="controls">
												 <input type="text" placeholder="City" class="input-medium" id="pcity" name="pcity" value="<?php echo set_value('pcity'); ?>" />
												 <span class="text-red error_message pcity_error_msg error"><?php echo form_error('pcity'); ?></span>
											  </div>
											</div>
										</div>
									
									</div>	
								</fieldset>
								<fieldset>
									<legend>Temporary Address <input type="checkbox" class="group-checkable same_above_address" name="sameasabove"/> Same as Above</legend>
									<div class="row-fluid">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Address One</label>
												<div class="controls">
													<textarea rows="1" placeholder="Adderess" class="input-medium" id="taddressone" name="taddressone" value="<?php echo set_value('taddressone'); ?>" ></textarea>	
													<span class="text-red error_message taddressone_error_msg error"><?php echo form_error('taddressone'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Address Two</label>
												<div class="controls">
													<textarea rows="1" placeholder="Adderess" class="input-medium" id="taddresstwo" name="taddresstwo" value="<?php echo set_value('taddresstwo'); ?>" ></textarea>
													<span class="text-red error_message taddresstwo_error_msg error"><?php echo form_error('taddresstwo'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">PIN</label>
												<div class="controls">
												<input type="text" placeholder="PIN Code" class="input-medium" id="tpin" name="tpin" value="<?php echo set_value('tpin'); ?>" />
												<span class="text-red error_message tpin_error_msg error"><?php echo form_error('tpin'); ?></span>
												</div>
											</div>
										</div>
								
									</div>
									<div class="row-fluid event-finder">	
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Country</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" tabindex="1" id="tcountry" name="tcountry" data-action="super_admin/school/school/getState">
													<option value="">Please Select</option>
													<?php if($CountryList) {
														foreach($CountryList as $Country){ ?>
											<option value="<?php echo $Country->country_id; ?>"><?php echo $Country->country_name; ?></option>	
														<?php } } ?>
												 </select>
												 <span class="text-red error_message tcountry_error_msg error"><?php echo form_error('tcountry'); ?></span>
											  </div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">State</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select chzn-call chzn-select-sub" data-placeholder="Please Select" id="tstate" name="tstate" tabindex="1">
													<option value="">Please Select</option>
												 </select>
												 <span class="text-red error_message tstate_error_msg error"><?php echo form_error('tstate'); ?></span>
											  </div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">City</label>
											  <div class="controls">
												 <input type="text" placeholder="City" class="input-medium" id="tcity" name="tcity" value="<?php echo set_value('tcity'); ?>" />
												 <span class="text-red error_message tcity_error_msg error"><?php echo form_error('tcity'); ?></span>
											  </div>
											</div>
										</div>
									
									</div>
									
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" tabindex="1" name="employeestatus">
													<option value="">Please Select</option>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												 </select>
												 <span class="text-red error_message employeestatus_error_msg error"><?php echo form_error('employeestatus'); ?></span>
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