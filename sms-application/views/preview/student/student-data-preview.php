					<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget preview" style="display:;" id="previewid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> <?php echo $StudentInfo->student_first_name .' '. $StudentInfo->student_last_name; ?> </h4>
							<span class="tools">
								<a href="#"><i class="icon-remove previewcancel" title="Close" ></i></a>
							</span>
						</div>
						<div class="widget-body">
							<form class="form-horizontal">
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label">
												<img src="<?php echo base_url()."storage/student-photos/".$StudentInfo->student_photo; ?>"/>
											</label>
										</div>
									</div>
								</div>
							<fieldset>
								<legend>Branch</legend>
								<div class="row-fluid event-finder">	
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Branch Name </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $BranchName->branch_name; ?> </label>	
											</div>	
										</div>
									</div>
									
								</div>
							</fieldset>
							<fieldset>
									<legend>Profile</legend>
								<div class="row-fluid">	
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> First Name </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_first_name; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Middle Name </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_middle_name; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Last Name </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_last_name; ?> </label>
											</div>
										</div>
									</div>
				
								</div>
								<div class="row-fluid">
								
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Gender </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_gender=='M' ?"Male" : "Female"; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Caste </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_caste; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Sub Caste </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_sub_caste; ?> </label>
											</div>
										</div>
									</div>
									
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Dob </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo DateFormatCtrl($StudentInfo->student_dob); ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Religion </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_religion; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Mobile No </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_mobile; ?> </label>
											</div>
										</div>
									</div>
									
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Aadhar No </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_aadhar_no; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Socio Economical Status </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_socio_economical_status; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Family Income </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo-> 	student_socio_family_income; ?> </label>
											</div>
										</div>
									</div>
								</div>

								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Blood Group </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo-> 	student_blood_group; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Height </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_height; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Weight </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_weight; ?> </label>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Distance School to Home </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo-> 	student_distance_home_school; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Mode of Transport </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_mode_of_transport; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Mother Tongue </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_mother_tongue; ?> </label>
											</div>
										</div>
									</div>
								</div>

								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Nationality</b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_nationality; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Birth Place</b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_birth_place; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Roll No</b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_roll_no; ?> </label>
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Student ID (Unique ID)</b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_custom_id; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Email ID </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_email; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Admission Date </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo DateFormatCtrl($StudentInfo->student_admission_on); ?> </label>
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Admission Number </b></font></label>
											<div class="controls">
												<label class="control-label"><?php echo $StudentInfo->student_admission_number; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Insurance  </b></font></label>
											<div class="controls">
												<label class="control-label"><?php echo $StudentInfo->student_insurance; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Is Staying Hostel </b></font></label>
											<div class="controls">
												<label class="control-label"><?php echo $StudentInfo->is_staying_hostel; ?> </label>
											</div>
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Disability </b></font></label>
											<div class="controls">
												<label class="control-label"><?php echo $StudentInfo->student_disability; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Mole One </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_mole_one; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Mole Two </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $StudentInfo->student_mole_two; ?> </label>
											</div>
										</div>
									</div>
								</div>
								
								</fieldset>
								
								<fieldset>
									<legend>Personal Details</legend>
									<?php if($StudentPersonalInfo)foreach($StudentPersonalInfo as $StudentPersonal){
										if($StudentPersonal->parents_type == "MOTHER"){
											$Type =  "Mother's";
										}else if($StudentPersonal->parents_type == "FATHER"){
											$Type =  "Father's";
										}else{
											$Type =  "Guardian's";
										} ?>
										<div class="row-fluid">
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b><?php echo $Type; ?> Name </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $StudentPersonal->parents_name; ?> </label>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b> <?php echo $Type; ?> Occupation </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $StudentPersonal->parents_occupation; ?> </label>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b> Mobile No</b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $StudentPersonal->parents_mobile; ?> </label>
													</div>
												</div>
											</div>
										</div>
										<div class="row-fluid">
											<div class="span6">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b>Email ID</b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $StudentPersonal->parents_email; ?> </label>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b>Set Email </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $StudentPersonal->parents_set_email==1?"YES":"NO"; ?> </label>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</fieldset>
								
								<?php if($StudentAddress)foreach($StudentAddress as $Address) { ?>
								<fieldset>
									<legend><?php echo $Address->student_address_type=='P'?"Permanent Address":"Temporary Address"; ?></legend>
										<div class="row-fluid">	
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b> Address1 </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $Address->student_address_one; ?> </label>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b> Address2 </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $Address->student_address_two; ?> </label>
													</div>
												</div>
											</div>
											
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b> Municipal </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $Address->student_municipal; ?> </label>
													</div>
												</div>
											</div>
											
										</div>
									<div class="row-fluid">

										<div class="span4">
											<div class="control-group">
												<label class="control-label"> <font size="2px;"><b> Country </b></font></label>
												<div class="controls">
													<label class="control-label"> <?php echo getCountryName($Address->student_country)->country_name; ?> </label>
												</div>
											</div>
										</div>
										
										<div class="span4">
											<div class="control-group">
												<label class="control-label"> <font size="2px;"><b> State </b></font></label>
												<div class="controls">
													<label class="control-label"> <?php echo getStateName($Address->student_state)->state_name; ?> </label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label"> <font size="2px;"><b> City </b></font></label>
												<div class="controls">
													<label class="control-label"> <?php echo $Address->student_city; ?> </label>
												</div>
											</div>
										</div>
										
									</div>
									<div class="row-fluid">
										<div class="span4">
											<div class="control-group">
												<label class="control-label"> <font size="2px;"><b> PIN </b></font></label>
												<div class="controls">
													<label class="control-label"> <?php echo $Address->student_pincode; ?> </label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label"> <font size="2px;"><b> Police Station </b></font></label>
												<div class="controls">
													<label class="control-label"> <?php echo $Address->student_policestation; ?> </label>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
								<?php } ?>
								<div align="center">
									<button class="btn previewcancel" type="button">Cancel</button>
								</div>
							
							</form>
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->