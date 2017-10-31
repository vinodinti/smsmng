 <!-- BEGIN PAGE -->  
      <div id="main-content">
         <!-- BEGIN PAGE CONTAINER-->
         <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->   
            <div class="row-fluid">
			
               <div class="span12">
                   <!-- BEGIN THEME CUSTOMIZER-->
                   <div id="theme-change" class="hidden-phone">
                       <i class="icon-cogs"></i>
                        <span class="settings">
                            <span class="text">Theme:</span>
                            <span class="colors">
                                <span class="color-default" data-style="default"></span>
                                <span class="color-gray" data-style="gray"></span>
                                <span class="color-purple" data-style="purple"></span>
                                <span class="color-navy-blue" data-style="navy-blue"></span>
                            </span>
                        </span>
                   </div>
                
					<ul class="breadcrumb">
					   <li>  
                           <a title="Profile" class="event_request studentprofile"><i class="icon-user"></i> Profile </a> <span class="divider">&nbsp;</span>
                       </li>
					   <li>
                           <a title="Personal Information" class="event_request studentpersonaldetails"><i class="icon-user"></i> Personal Information </a> <span class="divider">&nbsp;</span>
                       </li>
					   <li>
                           <a title="Permanent Address" class="event_request studentaddressdetailsp"><i class="icon-user"></i> Permanent Address </a> <span class="divider">&nbsp;</span>
                       </li>
					   <li>
                           <a title="Temporary Address" class="event_request studentaddressdetailst"><i class="icon-user"></i> Temporary Address </a> <span class="divider">&nbsp;</span>
                       </li>
					   <li>
						   <a title="Email"><i class="icon-envelope"></i> Send to Email </a><span class="divider-last">&nbsp;</span>
					   </li>  
                    </ul>
		
				   
				   
                   <!-- END PAGE TITLE & BREADCRUMB-->
				   
			<!-- BEGIN ADVANCED TABLE widget-->
            <div class="row-fluid">	
                <div class="span12">
				
				
				<?php //Start creating edit preview ?>
				<div id="modify"></div>
				<?php //Start creating edit preview ?>
				
				
                    <!-- BEGIN EXAMPLE TABLE widget-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> <span id="event_title">Profile</span> </h4>
							
                            <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
							   <!--<a href="javascript:;" class="icon-remove"></a>-->
                            </span>
							
							
							
                        </div>
						 
						<div class="widget-body">
							<form class="form-horizontal">
								<fieldset class="event_response" id="studentprofile">
										<!--<legend>Profile</legend>-->
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
								
								<fieldset class="event_response" id="studentpersonaldetails" style="display:none;">
									<!--<legend>Personal Details</legend>-->
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
								<fieldset class="event_response" id="studentaddressdetails<?php echo $Address->student_address_type=='P'?'p':'t'?>" style="display:none;">
									<!--<legend><?php echo $Address->student_address_type=='P'?"Permanent Address":"Temporary Address"; ?></legend>-->
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
							</form>
							
						</div>
						
                    </div>
                    <!-- END EXAMPLE TABLE widget-->
                </div>
            </div>

            <!-- END ADVANCED TABLE widget-->
				   
				   
               </div>
            </div>
            <!-- END PAGE HEADER-->
               
         </div>
         <!-- END PAGE CONTAINER-->
		 
		 
      </div>
      <!-- END PAGE -->