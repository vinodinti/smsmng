<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Student</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="student/create-student" method="post" 
							class="form-horizontal ajax-form-file" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Student Branch Information</legend>
									
									<div class="row-fluid  event-finder">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" name="branchid" tabindex="1" data-action="super_admin/school/branchclass/getClassList">
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
												<label class="control-label">Class Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-sub chzn-call" data-placeholder="Please Select" name="classname" tabindex="1" data-action="super_admin/school/branchclasssection/getSectionList">
													<option value="">Please Select</option>
													</select>
													<span class="text-red error_message classname_error_msg error"><?php echo form_error('classname'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Section Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call chzn-call-sub" data-placeholder="Please Select" tabindex="1" name="sectionname" >
														<option value="">Please Select</option>
													</select>
													<span class="text-red error_message sectionname_error_msg error"><?php echo form_error('sectionname'); ?></span>
												</div>
											</div>
										</div>
								
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Medium</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" tabindex="1" name="medium" >
														<option value="">Please Select</option>
														<option value="TELUGU">Telugu</option>
														<option value="ENGLISH">English</option>
													</select>
													<span class="text-red error_message medium_error_msg error"><?php echo form_error('medium'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Admission On</label>
												<div class="controls">
													<input type="text" placeholder="Admission On" name="admissiondate" class="input-medium date-picker" value="<?php echo set_value('admissiondate'); ?>" />
													<span class="text-red error_message admissiondate_error_msg error"><?php echo form_error('admissiondate'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Admission Number</label>
												<div class="controls">
													<input type="text" placeholder="Admission Number" name="admissionnumber" class="input-medium" value="<?php echo set_value('admissionnumber'); ?>" />
													<span class="text-red error_message admissionnumber_error_msg error"><?php echo form_error('admissionnumber'); ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Batch</label>
												<div class="controls">
												
													<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" tabindex="1" name="batch" >
														<option value="">Please Select</option>
														<?php if($BatchDetails)foreach($BatchDetails as $Batch){?>
														<option value="<?php echo $Batch->school_batch_id; ?>"><?php echo $Batch->school_batch_value; ?></option>
														<?php } ?>
													</select>
													<span class="text-red error_message batch_error_msg error"><?php echo form_error('batch'); ?></span>
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
									</div>
								</fieldset>
							
								<fieldset>
									<legend> Student Information</legend>
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
											<label class="control-label">Caste</label>
											<div class="controls">
												<input type="text" placeholder="Caste" name="castename" class="input-medium" value="<?php echo set_value('castename'); ?>" />
												<span class="text-red error_message castename_error_msg error"><?php echo form_error('castename'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Sub Caste</label>
											<div class="controls">
												<input type="text" placeholder="Sub Caste" name="subcastename" class="input-medium" value="<?php echo set_value('subcastename'); ?>" />
												<span class="text-red error_message subcastename_error_msg error"><?php echo form_error('subcastename'); ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Dob</label>
											<div class="controls">
												<input type="text" placeholder="Dob" name="dob" class="input-medium date-picker" value="<?php echo set_value('dob'); ?>"/>
												<span class="text-red error_message dob_error_msg error"><?php echo form_error('dob'); ?></span>
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
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Mobile No</label>
											<div class="controls">
												<input type="text" placeholder="Mobile No" name="studentmobileno" class="input-medium" value="<?php echo set_value('studentmobileno'); ?>" />
												<span class="text-red error_message studentmobileno_error_msg error"><?php echo form_error('studentmobileno'); ?></span>
											</div>
										</div>
									</div> 
									
								</div>
								<div class="row-fluid">
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Aadhar No</label>
											<div class="controls">
												<input type="text" placeholder="Aadhar Number" name="aadharno" class="input-medium" value="<?php echo set_value('aadharno'); ?>" />
												<span class="text-red error_message aadharno_error_msg error"><?php echo form_error('aadharno'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Socio Economical Status</label>
											<div class="controls">
												<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" tabindex="1" name="socioeconomicalstatus" >
													<option value="">Please Select</option>
													<option value="BPL">BPL</option>
													<option value="Non-BPL">Non-BPL</option>
												</select>
												<span class="text-red error_message socioeconomicalstatus_error_msg error"><?php echo form_error('socioeconomicalstatus'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Family Income</label>
											<div class="controls">
												<input type="text" placeholder="Family Income" name="familyincome" class="input-medium" value="<?php echo set_value('familyincome'); ?>" />
												<span class="text-red error_message familyincome_error_msg error"><?php echo form_error('familyincome'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Blood Group</label>
											<div class="controls">
												<input type="text" placeholder="Blood Group" name="bloodgroup" class="input-medium" value="<?php echo set_value('bloodgroup'); ?>" />
												<span class="text-red error_message bloodgroup_error_msg error"><?php echo form_error('bloodgroup'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Height</label>
											<div class="controls">
												<input type="text" placeholder="Height" name="height" class="input-medium" value="<?php echo set_value('height'); ?>" />
												<span class="text-red error_message height_error_msg error"><?php echo form_error('height'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Weight</label>
											<div class="controls">
												<input type="text" placeholder="Sub Caste" name="weight" class="input-medium" value="<?php echo set_value('weight'); ?>" />
												<span class="text-red error_message weight_error_msg error"><?php echo form_error('weight'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Distance School to Home</label>
											<div class="controls">
												<input type="text" placeholder="Distance School to Home" name="distanceschooltohome" class="input-medium" value="<?php echo set_value('distanceschooltohome'); ?>" />
												<span class="text-red error_message distanceschooltohome_error_msg error"><?php echo form_error('distanceschooltohome'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Mode of Transport </label>
											<div class="controls">
												<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" tabindex="1" name="modeoftransport" >
													<option value="">Please Select</option>
													<option value="WALK">WALK</option>
													<option value="BICYCLE">BICYCLE</option>
													<option value="AUTO">AUTO</option>
													<option value="BUS">BUS</option>
													<option value="OTHERS">OTHERS</option>
												</select>
												<span class="text-red error_message modeoftransport_error_msg error"><?php echo form_error('modeoftransport'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Mother Tongue</label>
											<div class="controls">
												<input type="text" placeholder="Mother Tongue" name="mothertongue" class="input-medium" value="<?php echo set_value('mothertongue'); ?>" />
												<span class="text-red error_message mothertongue_error_msg error"><?php echo form_error('mothertongue'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Nationality</label>
											<div class="controls">
												<input type="text" placeholder="Nationality" name="nationality" class="input-medium"/>
												<span class="text-red error_message nationality_error_msg error"><?php echo form_error('nationality'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Birth Place</label>
											<div class="controls">
												<input type="text" placeholder="Birth Place" name="birthplace" class="input-medium"/>
												<span class="text-red error_message birthplace_error_msg error"><?php echo form_error('birthplace'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Roll No</label>
											<div class="controls">
												<input type="text" placeholder="Roll No" name="rollno" class="input-medium"/>
												<span class="text-red error_message rollno_error_msg error"><?php echo form_error('rollno'); ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Student ID (Unique ID)</label>
											<div class="controls">
												<input type="text" placeholder="Student ID" name="studentid" class="input-medium" value="<?php echo set_value('studentid', $StudentCustomID); ?>" readonly = "readonly;"/>
												<span class="text-red error_message studentid_error_msg error"><?php echo form_error('studentid'); ?></span>
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
												<input type="password" placeholder="*********" class="input-medium" name="password" value="<?php echo set_value('password'); ?>" />
												<span class="text-red error_message password_error_msg error"><?php echo form_error('password'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Disability</label>
											<div class="controls">
												<textarea placeholder="Disability" name="disability" class="input-medium"><?php echo set_value('disability'); ?></textarea>
												<span class="text-red error_message disability_error_msg error"><?php echo form_error('disability'); ?></span>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Mole One</label>
											<div class="controls">
												<textarea placeholder="Mole One" name="moleone" class="input-medium"><?php echo set_value('moleone'); ?></textarea>
												<span class="text-red error_message moleone_error_msg error"><?php echo form_error('moleone'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Mole Two</label>
											<div class="controls">
												<textarea placeholder="Mole Two" name="moletwo" class="input-medium"><?php echo set_value('moletwo'); ?></textarea>
												<span class="text-red error_message moletwo_error_msg error"><?php echo form_error('moletwo'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">

									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Student Insurance </label>
											<div class="controls">
												<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" tabindex="1" name="studentinsurance" >
													<option value="">Please Select</option>
													<option value="YES">YES</option>
													<option value="NO">NO</option>
												</select>
												<span class="text-red error_message studentinsurance_error_msg error"><?php echo form_error('studentinsurance'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Is Staying Hostel</label>
											<div class="controls">
												<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" tabindex="1" name="isstayinghostel" >
													<option value="">Please Select</option>
													<option value="YES">YES</option>
													<option value="NO">NO</option>
												</select>
												<span class="text-red error_message isstayinghostel_error_msg error"><?php echo form_error('isstayinghostel'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								</fieldset>
								
								<fieldset>
									<legend>Personal Details</legend>
									
										<div class="row-fluid">	
											
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mother's Name</label>
													<div class="controls">
														<input type="text" placeholder="Mother's Name" class="input-medium" name="mothername" value="<?php echo set_value('mothername'); ?>">
														<span class="text-red error_message mothername_error_msg error"><?php echo form_error('mothername'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mother's Occupation</label>
													<div class="controls">
														<input type="text" placeholder="Mother's Occupation" class="input-medium" name="motheroccupation" value="<?php echo set_value('motheroccupation'); ?>">
														<span class="text-red error_message motheroccupation_error_msg error"><?php echo form_error('motheroccupation'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mobile No</label>
													<div class="controls">
													<input type="text" placeholder="Mobile No" class="input-medium" name="mothermobileno" value="<?php echo set_value('mothermobileno'); ?>" />
													<span class="text-red error_message mothermobileno_error_msg error"><?php echo form_error('mothermobileno'); ?></span>
													</div>
												</div>
											</div>
											
										</div>
										<div class="row-fluid">	
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Email ID</label>
													<div class="controls">
														<input type="text" placeholder="Email ID" name="motheremail" class="input-medium" value="<?php echo set_value('motheremail'); ?>" />
														<span class="text-red error_message motheremail_error_msg error"><?php echo form_error('motheremail'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Set Email</label>
													<div class="controls">
														<input type="checkbox" name="setemailmother" class="input-medium"/>
														<span class="text-red error_message setemailmother_error_msg error"><?php echo form_error('setemailmother'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row-fluid">	
											
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Father's Name</label>
													<div class="controls">
														<input type="text" placeholder="Father's Name" class="input-medium" name="fathername" value="<?php echo set_value('fathername'); ?>">
														<span class="text-red error_message fathername_error_msg error"><?php echo form_error('fathername'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Father's Occupation</label>
													<div class="controls">
														<input type="text" placeholder="Father's Occupation" class="input-medium" name="fatheroccupation" value="<?php echo set_value('fatheroccupation'); ?>">
														<span class="text-red error_message fatheroccupation_error_msg error"><?php echo form_error('fatheroccupation'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mobile No</label>
													<div class="controls">
													<input type="text" placeholder="Mobile No" class="input-medium" name="fathermobile" value="<?php echo set_value('fathermobile'); ?>" />
													<span class="text-red error_message fathermobile_error_msg error"><?php echo form_error('fathermobile'); ?></span>
													</div>
												</div>
											</div>
											
										</div>
										<div class="row-fluid">	
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Email ID</label>
													<div class="controls">
														<input type="text" placeholder="Email ID" name="fatheremail" class="input-medium" value="<?php echo set_value('fatheremail'); ?>" />
														<span class="text-red error_message fatheremail_error_msg error"><?php echo form_error('fatheremail'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Set Email</label>
													<div class="controls">
														<input type="checkbox" name="setemailfather" class="input-medium" />
														<span class="text-red error_message setemailfather_error_msg error"><?php echo form_error('setemailfather'); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="row-fluid">	
											
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Guardian's Name</label>
													<div class="controls">
														<input type="text" placeholder="Guardian's Name" class="input-medium" name="guardianname" value="<?php echo set_value('guardianname'); ?>">
														<span class="text-red error_message guardianname_error_msg error"><?php echo form_error('guardianname'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Guardian's Occupation</label>
													<div class="controls">
														<input type="text" placeholder="Guardian's Occupation" class="input-medium" name="guardianoccupation" value="<?php echo set_value('guardianoccupation'); ?>">
														<span class="text-red error_message guardianoccupation_error_msg error"><?php echo form_error('guardianoccupation'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mobile No</label>
													<div class="controls">
													<input type="text" placeholder="Mobile No" class="input-medium" name="guardianmobile" value="<?php echo set_value('guardianmobile'); ?>" />
													<span class="text-red error_message guardianmobile_error_msg error"><?php echo form_error('guardianmobile'); ?></span>
													</div>
												</div>
												
											</div>
											
										</div>
										<div class="row-fluid">	
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Email ID</label>
													<div class="controls">
														<input type="text" placeholder="Email ID" name="guardianemail" class="input-medium" value="<?php echo set_value('guardianemail'); ?>" />
														<span class="text-red error_message guardianemail_error_msg error"><?php echo form_error('guardianemail'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Set Email</label>
													<div class="controls">
														<input type="checkbox" name="setemailguardian" class="input-medium" />
														<span class="text-red error_message setemailguardian_error_msg error"><?php echo form_error('setemailguardian'); ?></span>
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
												<label class="control-label">Municipal</label>
												<div class="controls">
												<input type="text" placeholder="Municipal" class="input-medium" id="pmunicipal" name="pmunicipal" value="<?php echo set_value('pmunicipal'); ?>" />
												<span class="text-red error_message pmunicipal_error_msg error"><?php echo form_error('pmunicipal'); ?></span>
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
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">PIN</label>
												<div class="controls">
												<input type="text" placeholder="PIN Code" class="input-medium" id="ppin" name="ppin" value="<?php echo set_value('ppin'); ?>" />
												<span class="text-red error_message ppin_error_msg error"><?php echo form_error('ppin'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Police Station</label>
												<div class="controls">
												<input type="text" placeholder="Police Station" class="input-medium" id="ppolicestation" name="ppolicestation" value="<?php echo set_value('ppolicestation'); ?>" />
												<span class="text-red error_message ppolicestation_error_msg error"><?php echo form_error('ppolicestation'); ?></span>
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
												<label class="control-label">Municipal</label>
												<div class="controls">
												<input type="text" placeholder="Municipal" class="input-medium" id="tmunicipal" name="tmunicipal" value="<?php echo set_value('tmunicipal'); ?>" />
												<span class="text-red error_message tmunicipal_error_msg error"><?php echo form_error('tmunicipal'); ?></span>
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
												<label class="control-label">PIN</label>
												<div class="controls">
												<input type="text" placeholder="PIN Code" class="input-medium" id="tpin" name="tpin" value="<?php echo set_value('tpin'); ?>" />
												<span class="text-red error_message tpin_error_msg error"><?php echo form_error('tpin'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Police Station</label>
												<div class="controls">
												<input type="text" placeholder="Police Station" class="input-medium" id="tpolicestation" name="tpolicestation" value="<?php echo set_value('tpolicestation'); ?>" />
												<span class="text-red error_message tpolicestation_error_msg error"><?php echo form_error('tpolicestation'); ?></span>
												</div>
											</div>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Status</label>
											  <div class="controls">
												 <select class="input-medium m-wrap chzn-select" data-placeholder="Please Select" tabindex="1" name="studentstatus">
													<option value="">Please Select</option>
													<option value="1">Active</option>
													<option value="0">Inactive</option>
												 </select>
												 <span class="text-red error_message studentstatus_error_msg error"><?php echo form_error('studentstatus'); ?></span>
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