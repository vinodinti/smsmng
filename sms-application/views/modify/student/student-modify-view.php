<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget editid" style="display:;" id="editid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Edit <?php echo $StudentInfo->student_first_name .' '. $StudentInfo->student_last_name; ?> </h4>
							
							<span class="tools">
								<a href="#"><i class="icon-remove editcancel" title="Close" ></i></a>
							</span>
						</div>
						<div class="widget-body">
							
							 <!-- BEGIN FORM-->
                            <form action="student/update-student" method="post" 
							class="form-horizontal ajax-form-file" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
								<fieldset>
									<legend>Student Branch Information</legend>
									<input type="hidden" name="studentid" value="<?php echo set_value('studentid', $StudentInfo->student_id); ?>">
									<span class="text-red error_message studentid_error_msg error"><?php echo form_error('studentid'); ?></span>
									<input type="hidden" id="delpath" class="default" name="delpath" value="<?php echo set_value('delpath',$StudentInfo->student_photo); ?>" />
									
									<input type="hidden" name="studentclassid" value="<?php echo set_value('studentclassid', $StudentClass->student_class_id); ?>">
									<span class="text-red error_message studentclassid_error_msg error"><?php echo form_error('studentclassid'); ?></span>
									
									<div class="row-fluid  event-finder">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Branch Name</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" name="branchid" tabindex="1" data-action="super_admin/school/branchclass/getClassList">
													<option value="">Please Select</option>
													<?php if($BranchList)foreach($BranchList as $Branch){?>
													<option <?php echo $StudentInfo->branch_fk_id==$Branch->branch_id?"selected='selected'":""; ?> value="<?php echo $Branch->branch_id; ?>"><?php echo $Branch->branch_name; ?></option>
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
													<?php if($ClassList)foreach($ClassList as $Class){ ?>
														<option <?php echo $StudentClass->class_fk_id==$Class->class_id?"selected='selected'":""; ?> value="<?php echo $Class->class_id; ?>"><?php echo $Class->class_name; ?></option>	
													<?php } ?>
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
													<?php if($SectionList)foreach($SectionList as $Section){ ?>
														<option <?php echo $StudentClass->section_fk_id==$Section->section_id?"selected='selected'":""; ?> value="<?php echo $Section->section_id; ?>"><?php echo $Section->section_name; ?></option>	
													<?php } ?>
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
														<option <?php echo $StudentClass->student_class_medium=="TELUGU"?"selected='selected'":""; ?> value="TELUGU">Telugu</option>
														<option <?php echo $StudentClass->student_class_medium=="ENGLISH"?"selected='selected'":""; ?> value="ENGLISH">English</option>
													</select>
													<span class="text-red error_message medium_error_msg error"><?php echo form_error('medium'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Admission On</label>
												<div class="controls">
													<input type="text" placeholder="Admission On" name="admissiondate" class="input-medium date-picker" value="<?php echo set_value('admissiondate', DateFormatCtrl($StudentInfo->student_admission_on)); ?>" />
													<span class="text-red error_message admissiondate_error_msg error"><?php echo form_error('admissiondate'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Admission Number</label>
												<div class="controls">
													<input type="text" placeholder="Admission Number" name="admissionnumber" class="input-medium" value="<?php echo set_value('admissionnumber', $StudentInfo->student_admission_number); ?>" />
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
														<option <?php echo $StudentClass->school_batch_fk_id==$Batch->school_batch_id?"selected='selected'":""; ?> value="<?php echo $Batch->school_batch_id; ?>"><?php echo $Batch->school_batch_value; ?></option>
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
													<?php if(getFileExists('storage/student-photos/'.$StudentInfo->student_photo)){ ?>
														<img id="imgInp" style="height:50px; width:50px;" src="<?php echo base_url().'storage/student-photos/'.$StudentInfo->student_photo; ?>" />
													<?php }else{ ?>
														<img id="imgInp" style="height:50px; width:50px; display:none;" src="" />
													<?php } ?>
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
												<input type="text" placeholder="First Name" name="firstname" class="input-medium" value="<?php echo set_value('firstname', $StudentInfo->student_first_name); ?>"/>
												<span class="text-red error_message firstname_error_msg error"><?php echo form_error('firstname'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Middle Name</label>
											<div class="controls">
												<input type="text" placeholder="Middle Name" name="middlename" class="input-medium" value="<?php echo set_value('middlename', $StudentInfo->student_middle_name); ?>"/>
												<span class="text-red error_message middlename_error_msg error"><?php echo form_error('middlename'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Last Name</label>
											<div class="controls">
												<input type="text" placeholder="Last Name" name="lastname" class="input-medium" value="<?php echo set_value('lastname', $StudentInfo->student_last_name); ?>"/>
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
													<option value="M" <?php echo $StudentInfo->student_gender == 'M' ? "selected='selected'":""; ?> >Male</option>
													<option value="F" <?php echo $StudentInfo->student_gender == 'F' ? "selected='selected'":""; ?> >Female</option>
												</select>
												<span class="text-red error_message gender_error_msg error"><?php echo form_error('gender'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Caste</label>
											<div class="controls">
												<input type="text" placeholder="Caste" name="castename" class="input-medium" value="<?php echo set_value('castename', $StudentInfo->student_caste); ?>" />
												<span class="text-red error_message castename_error_msg error"><?php echo form_error('castename'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Sub Caste</label>
											<div class="controls">
												<input type="text" placeholder="Sub Caste" name="subcastename" class="input-medium" value="<?php echo set_value('subcastename', $StudentInfo->student_sub_caste); ?>" />
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
												<input type="text" placeholder="Dob" name="dob" class="input-medium" value="<?php echo set_value('dob', DateFormatCtrl($StudentInfo->student_dob)); ?>"/>
												<span class="text-red error_message dob_error_msg error"><?php echo form_error('dob'); ?></span>
											</div>
										</div>
									</div>
								
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Religion</label>
											<div class="controls">
												<input type="text" placeholder="Religion" name="religion" class="input-medium" value="<?php echo set_value('religion', $StudentInfo->student_religion); ?>" />
												<span class="text-red error_message religion_error_msg error"><?php echo form_error('religion'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Mobile No</label>
											<div class="controls">
												<input type="text" placeholder="Mobile No" name="studentmobileno" class="input-medium" value="<?php echo set_value('studentmobileno', $StudentInfo->student_mobile); ?>" />
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
												<input type="text" placeholder="Aadhar Number" name="aadharno" class="input-medium" value="<?php echo set_value('aadharno', $StudentInfo->student_aadhar_no); ?>" />
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
													<option <?php echo $StudentInfo->student_socio_economical_status=="BPL"?"selected='selected'":""; ?> value="BPL">BPL</option>
													<option <?php echo $StudentInfo->student_socio_economical_status=="Non-BPL"?"selected='selected'":""; ?> value="Non-BPL">Non-BPL</option>
												</select>
												<span class="text-red error_message socioeconomicalstatus_error_msg error"><?php echo form_error('socioeconomicalstatus'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Family Income</label>
											<div class="controls">
												<input type="text" placeholder="Family Income" name="familyincome" class="input-medium" value="<?php echo set_value('familyincome', $StudentInfo->student_socio_family_income); ?>" />
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
												<input type="text" placeholder="Blood Group" name="bloodgroup" class="input-medium" value="<?php echo set_value('bloodgroup', $StudentInfo->student_blood_group); ?>" />
												<span class="text-red error_message bloodgroup_error_msg error"><?php echo form_error('bloodgroup'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Height</label>
											<div class="controls">
												<input type="text" placeholder="Height" name="height" class="input-medium" value="<?php echo set_value('height', $StudentInfo->student_height); ?>" />
												<span class="text-red error_message height_error_msg error"><?php echo form_error('height'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Weight</label>
											<div class="controls">
												<input type="text" placeholder="Sub Caste" name="weight" class="input-medium" value="<?php echo set_value('weight', $StudentInfo->student_weight); ?>" />
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
												<input type="text" placeholder="Distance School to Home" name="distanceschooltohome" class="input-medium" value="<?php echo set_value('distanceschooltohome', $StudentInfo->student_distance_home_school); ?>" />
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
													<option <?php echo $StudentInfo->student_mode_of_transport=="WALK"?"selected='selected'":""; ?> value="WALK">WALK</option>
													<option <?php echo $StudentInfo->student_mode_of_transport=="BICYCLE"?"selected='selected'":""; ?> value="BICYCLE">BICYCLE</option>
													<option <?php echo $StudentInfo->student_mode_of_transport=="AUTO"?"selected='selected'":""; ?> value="AUTO">AUTO</option>
													<option <?php echo $StudentInfo->student_mode_of_transport=="BUS"?"selected='selected'":""; ?> value="BUS">BUS</option>
													<option <?php echo $StudentInfo->student_mode_of_transport=="OTHERS"?"selected='selected'":""; ?> value="OTHERS">OTHERS</option>
												</select>
												<span class="text-red error_message modeoftransport_error_msg error"><?php echo form_error('modeoftransport'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Mother Tongue</label>
											<div class="controls">
												<input type="text" placeholder="Mother Tongue" name="mothertongue" class="input-medium" value="<?php echo set_value('mothertongue', $StudentInfo->	student_mother_tongue); ?>" />
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
												<input type="text" placeholder="Nationality" name="nationality" class="input-medium" value="<?php echo set_value('nationality', $StudentInfo->student_nationality); ?>"/>
												<span class="text-red error_message nationality_error_msg error"><?php echo form_error('nationality'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Birth Place</label>
											<div class="controls">
												<input type="text" placeholder="Birth Place" name="birthplace" class="input-medium" value="<?php echo set_value('birthplace', $StudentInfo->student_birth_place); ?>" />
												<span class="text-red error_message birthplace_error_msg error"><?php echo form_error('birthplace'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Roll No</label>
											<div class="controls">
												<input type="text" placeholder="Roll No" name="rollno" class="input-medium" value="<?php echo set_value('rollno', $StudentInfo->student_roll_no); ?>"/>
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
												<input type="text" placeholder="Student ID" name="studentid" class="input-medium" value="<?php echo set_value('studentid', $Student->student_custom_id); ?>" readonly = "readonly;"/>
												<span class="text-red error_message studentid_error_msg error"><?php echo form_error('studentid'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Email ID</label>
											<div class="controls">
												<input type="text" placeholder="Email Id" name="emailid" class="input-medium" value="<?php echo set_value('emailid', $Student->student_email); ?>"/>
												<span class="text-red error_message emailid_error_msg error"><?php echo form_error('emailid'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Disability</label>
											<div class="controls">
						<textarea placeholder="Disability" name="disability" class="input-medium"><?php echo set_value('disability', $StudentInfo->student_disability); ?></textarea>
												<span class="text-red error_message disability_error_msg error"><?php echo form_error('disability'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label">Mole One</label>
											<div class="controls">
												<textarea placeholder="Mole One" name="moleone" class="input-medium"><?php echo set_value('moleone', $StudentInfo->student_mole_one); ?></textarea>
												<span class="text-red error_message moleone_error_msg error"><?php echo form_error('moleone'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Mole Two</label>
											<div class="controls">
												<textarea placeholder="Mole Two" name="moletwo" class="input-medium"><?php echo set_value('moletwo', $StudentInfo->student_mole_two); ?></textarea>
												<span class="text-red error_message moletwo_error_msg error"><?php echo form_error('moletwo'); ?></span>
											</div>
										</div>
									</div>
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Student Insurance </label>
											<div class="controls">
												<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" tabindex="1" name="studentinsurance" >
													<option value="">Please Select</option>
													<option <?php echo $StudentInfo->student_insurance=="YES"?"selected='selected'":""; ?> value="YES">YES</option>
													<option <?php echo $StudentInfo->student_insurance=="NO"?"selected='selected'":""; ?> value="NO">NO</option>
												</select>
												<span class="text-red error_message studentinsurance_error_msg error"><?php echo form_error('studentinsurance'); ?></span>
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span4">	
										<div class="control-group">
											<label class="control-label">Is Staying Hostel</label>
											<div class="controls">
												<select class="input-medium m-wrap chzn-select chzn-call" data-placeholder="Please Select" tabindex="1" name="isstayinghostel" >
													<option value="">Please Select</option>
													<option <?php echo $StudentInfo->is_staying_hostel=="YES"?"selected='selected'":""; ?> value="YES">YES</option>
													<option <?php echo $StudentInfo->is_staying_hostel=="NO"?"selected='selected'":""; ?> value="NO">NO</option>
												</select>
												<span class="text-red error_message isstayinghostel_error_msg error"><?php echo form_error('isstayinghostel'); ?></span>
											</div>
										</div>
									</div>
									
								</div>
								
								</fieldset>
								
								<fieldset>
									<legend>Personal Details</legend>
										<input type="hidden" placeholder="Mother's ID" class="input-medium" name="motherid" value="<?php echo set_value('motherid', $StudentPersonalInfo[0]->parents_id); ?>">
										<span class="text-red error_message motherid_error_msg error"><?php echo form_error('mothername'); ?></span>
										<input type="hidden" placeholder="Father's ID" class="input-medium" name="fatherid" value="<?php echo set_value('fatherid', $StudentPersonalInfo[1]->parents_id); ?>">
										<span class="text-red error_message fatherid_error_msg error"><?php echo form_error('fatherid'); ?></span>
										<input type="hidden" placeholder="Guardians's ID" class="input-medium" name="guardiansid" value="<?php echo set_value('guardiansid', $StudentPersonalInfo[2]->parents_id); ?>">
										<span class="text-red error_message guardiansid_error_msg error"><?php echo form_error('guardiansid'); ?></span>
											
										<div class="row-fluid">
										
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mother's Name</label>
													<div class="controls">
														<input type="text" placeholder="Mother's Name" class="input-medium" name="mothername" value="<?php echo set_value('mothername', $StudentPersonalInfo[0]->parents_name); ?>">
														<span class="text-red error_message mothername_error_msg error"><?php echo form_error('mothername'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mother's Occupation</label>
													<div class="controls">
														<input type="text" placeholder="Mother's Occupation" class="input-medium" name="motheroccupation" value="<?php echo set_value('motheroccupation', $StudentPersonalInfo[0]->parents_occupation); ?>">
														<span class="text-red error_message motheroccupation_error_msg error"><?php echo form_error('motheroccupation'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mobile No</label>
													<div class="controls">
													<input type="text" placeholder="Mobile No" class="input-medium" name="mothermobileno" value="<?php echo set_value('mothermobileno', $StudentPersonalInfo[0]->parents_mobile); ?>" />
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
														<input type="text" placeholder="Email ID" name="motheremail" class="input-medium" value="<?php echo set_value('motheremail', $StudentPersonalInfo[0]->parents_email); ?>" />
														<span class="text-red error_message motheremail_error_msg error"><?php echo form_error('motheremail'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Set Email</label>
													<div class="controls">
														<input type="checkbox" name="setemailmother" class="input-medium" value="<?php echo set_value('setemailmother'); ?>" <?php echo $StudentPersonalInfo[0]->parents_set_email==1?"checked='checked'":""?> />
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
														<input type="text" placeholder="Father's Name" class="input-medium" name="fathername" value="<?php echo set_value('fathername', $StudentPersonalInfo[1]->parents_name); ?>">
														<span class="text-red error_message fathername_error_msg error"><?php echo form_error('fathername'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Father's Occupation</label>
													<div class="controls">
														<input type="text" placeholder="Father's Occupation" class="input-medium" name="fatheroccupation" value="<?php echo set_value('fatheroccupation', $StudentPersonalInfo[1]->parents_occupation); ?>">
														<span class="text-red error_message fatheroccupation_error_msg error"><?php echo form_error('fatheroccupation'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mobile No</label>
													<div class="controls">
													<input type="text" placeholder="Mobile No" class="input-medium" name="fathermobile" value="<?php echo set_value('fathermobile', $StudentPersonalInfo[1]->parents_mobile); ?>" />
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
														<input type="text" placeholder="Email ID" name="fatheremail" class="input-medium" value="<?php echo set_value('fatheremail', $StudentPersonalInfo[1]->parents_email); ?>" />
														<span class="text-red error_message fatheremail_error_msg error"><?php echo form_error('fatheremail'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Set Email</label>
													<div class="controls">
														<input type="checkbox" name="setemailfather" class="input-medium" value="<?php echo set_value('setemailfather'); ?>" 
														<?php echo $StudentPersonalInfo[1]->parents_set_email==1?"checked='checked'":""?> />
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
														<input type="text" placeholder="Guardian's Name" class="input-medium" name="guardianname" value="<?php echo set_value('guardianname', $StudentPersonalInfo[2]->parents_name); ?>">
														<span class="text-red error_message guardianname_error_msg error"><?php echo form_error('guardianname'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Guardian's Occupation</label>
													<div class="controls">
														<input type="text" placeholder="Guardian's Occupation" class="input-medium" name="guardianoccupation" value="<?php echo set_value('guardianoccupation', $StudentPersonalInfo[2]->parents_occupation); ?>">
														<span class="text-red error_message guardianoccupation_error_msg error"><?php echo form_error('guardianoccupation'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label">Mobile No</label>
													<div class="controls">
													<input type="text" placeholder="Mobile No" class="input-medium" name="guardianmobile" value="<?php echo set_value('guardianmobile', $StudentPersonalInfo[2]->parents_mobile); ?>" />
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
														<input type="text" placeholder="Email ID" name="guardianemail" class="input-medium" value="<?php echo set_value('guardianemail', $StudentPersonalInfo[2]->parents_email); ?>" />
														<span class="text-red error_message guardianemail_error_msg error"><?php echo form_error('guardianemail'); ?></span>
													</div>
												</div>
											</div>
											<div class="span4">	
												<div class="control-group">
													<label class="control-label">Set Email</label>
													<div class="controls">
														<input type="checkbox" name="setemailguardian" class="input-medium" value="<?php echo set_value('setemailguardian'); ?>"
														<?php echo $StudentPersonalInfo[2]->parents_set_email==1?"checked='checked'":""?>/>
														<span class="text-red error_message setemailguardian_error_msg error"><?php echo form_error('setemailguardian'); ?></span>
													</div>
												</div>
											</div>
										</div>
								</fieldset>
								

								<?php if($StudentAddress)foreach($StudentAddress as $Address) { ?>								
								<fieldset>
									<legend><?php echo $Address->student_address_type=='P'?"Permanent Address":"Temporary Address <input type='checkbox' class='group-checkable same_above_address' name='sameasabove'/> Same as Above"; ?>
									<?php if($Address->student_address_type=='P'){$ctrlname='p';}else{$ctrlname='t';} ?>
									</legend>
									
									<input type="hidden" placeholder="Student Address ID" class="input-medium" name="<?php echo $ctrlname; ?>studentaddressid" value="<?php echo set_value($ctrlname.'studentaddressid', $Address->student_address_id); ?>">
									<span class="text-red error_message <?php echo $ctrlname; ?>studentaddressid_error_msg error"><?php echo form_error($ctrlname.'studentaddressid'); ?></span>
									
									<div class="row-fluid">	
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Address One</label>
												<div class="controls">
												<textarea rows="1" placeholder="Adderess" class="input-medium" id="<?php echo $ctrlname; ?>addressone" name="<?php echo $ctrlname; ?>addressone"><?php echo set_value($ctrlname.'addressone', $Address->student_address_one); ?></textarea>
												<span class="text-red error_message <?php echo $ctrlname; ?>addressone_error_msg error"><?php echo form_error($ctrlname.'addressone'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Address Two</label>
												<div class="controls">
													<textarea rows="1" id="<?php echo $ctrlname; ?>addresstwo" placeholder="Adderess" class="input-medium" name="<?php echo $ctrlname; ?>addresstwo"><?php echo set_value($ctrlname.'addressone', $Address->student_address_two); ?></textarea>
													<span class="text-red error_message <?php echo $ctrlname; ?>addresstwo_error_msg error"><?php echo form_error($ctrlname.'addresstwo'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Municipal</label>
												<div class="controls">
												<input type="text" placeholder="Municipal" class="input-medium" id="<?php echo $ctrlname; ?>municipal" name="<?php echo $ctrlname; ?>municipal" value="<?php echo set_value($ctrlname.'municipal', $Address->student_municipal); ?>" />
												<span class="text-red error_message <?php echo $ctrlname; ?>municipal_error_msg error"><?php echo form_error($ctrlname.'municipal'); ?></span>
												</div>
											</div>
										</div>

									</div>
									<div class="row-fluid event-finder">

										<div class="span4">
											<div class="control-group">
												<label class="control-label">Country</label>
												<div class="controls">
													<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" tabindex="1" name="<?php echo $ctrlname; ?>country" data-action="super_admin/school/school/getState">
													<option value="">Please Select</option>
													<?php if($CountryList) {
													foreach($CountryList as $Country){ ?>
														<option value="<?php echo $Country->country_id; ?>" <?php echo $Country->country_id==$Address->student_country ? "selected='selected'":"" ?> ><?php echo $Country->country_name; ?></option>	
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
												
												<?php $StateList = getStateList($Address->student_country); ?>
													<select class="input-medium m-wrap chzn-select chzn-call chzn-select-sub" data-placeholder="Please Select" name="<?php echo $ctrlname; ?>state" tabindex="1">
														<option value="">Please Select</option>
														<?php if($StateList){ 
														foreach($StateList as $State){ ?>
													<option value="<?php echo $State->state_id; ?>" <?php echo $State->state_id==$Address->student_state ? "selected='selected'":"" ?>><?php echo $State->state_name; ?></option>			
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
												<input type="text" placeholder="City" class="input-medium" id="<?php echo $ctrlname; ?>city" name="<?php echo $ctrlname; ?>city" value="<?php echo set_value($ctrlname.'city', $Address->student_city); ?>" />
												<span class="text-red error_message <?php echo $ctrlname; ?>city_error_msg error"><?php echo form_error($ctrlname.'city'); ?></span>
												</div>
											</div>
										</div>
										
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label">PIN</label>
												<div class="controls">
													<input type="text" placeholder="PIN Code" class="input-medium" id="<?php echo $ctrlname; ?>pin" name="<?php echo $ctrlname; ?>pin" value="<?php echo set_value($ctrlname.'pin', $Address->student_pincode); ?>" />
													<span class="text-red error_message <?php echo $ctrlname; ?>pin_error_msg error"><?php echo form_error($ctrlname.'pin'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Police Station</label>
												<div class="controls">
												<input type="text" placeholder="Police Station" class="input-medium" id="<?php echo $ctrlname; ?>policestation" name="<?php echo $ctrlname; ?>policestation" value="<?php echo set_value($ctrlname.'policestation', $Address->student_policestation); ?>" />
												<span class="text-red error_message tpolicestation_error_msg error"><?php echo form_error($ctrlname.'policestation'); ?></span>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
								<?php } ?>
								
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