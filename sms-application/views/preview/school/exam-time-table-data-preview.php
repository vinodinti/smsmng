					<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget preview" style="display:;" id="previewid">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> <?php echo $EmployeeInfo->employee_first_name .' '. $EmployeeInfo->employee_last_name; ?> </h4>
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
												<img src="<?php echo base_url()."storage/staff-photos/".$EmployeeInfo->employee_photo; ?>"/>
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
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Department Name </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $DepartmentName->department_name; ?> </label>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Department Post Name </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $DepartmentPostName->department_posts_name; ?> </label>
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
												<label class="control-label"> <?php echo $EmployeeInfo->employee_first_name; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Last Name </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $EmployeeInfo->employee_last_name; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Gender </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $EmployeeInfo->employee_gender=='M' ?"Male" : "Female"; ?> </label>
											</div>
										</div>
									</div>
								
								</div>
								
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Dob </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo DateFormatCtrl($EmployeeInfo->employee_dob); ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Mobile No </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $EmployeeInfo->employee_mobile_no; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Contact No </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $EmployeeInfo->employee_contact_no; ?> </label>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Specification </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $EmployeeInfo->employee_specification; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Qualification </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $EmployeeInfo->employee_qualifiacation; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Religion </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $EmployeeInfo->employee_religion; ?> </label>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="row-fluid">
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Employee ID </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $Employee->employee_custom_id; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Email ID </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo $Employee->employee_email; ?> </label>
											</div>
										</div>
									</div>
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Join Date </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo DateFormatCtrl($EmployeeInfo->employee_join_on); ?> </label>
											</div>
										</div>
									</div>
									
								</div>
								
								</fieldset>
								
								<fieldset>
									<legend>Guardians</legend>
									
										<div class="row-fluid">	
											
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b> Guardian Type </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $EmployeeInfo->employee_guardians_type; ?> </label>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b> Guardian Name </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $EmployeeInfo->employee_guardian_name; ?> </label>
													</div>
												</div>
											</div>
											<div class="span4">
												<div class="control-group">
													<label class="control-label"> <font size="2px;"><b> Guardian Mobile No </b></font></label>
													<div class="controls">
														<label class="control-label"> <?php echo $EmployeeInfo->employee_guardian_mobile; ?> </label>
													</div>
												</div>
											</div>
								
										</div>
								</fieldset>
								
								<?php if($EmployeeAddress)foreach($EmployeeAddress as $Address) { ?>
								
								<fieldset>
									<legend><?php echo $Address->employee_address_type=='P'?"Permanent Address":"Temporary Address"; ?></legend>
									
									<div class="row-fluid">	
										<div class="span4">
											<div class="control-group">
												<label class="control-label"> <font size="2px;"><b> Address1 </b></font></label>
												<div class="controls">
													<label class="control-label"> <?php echo $Address->employee_address_one; ?> </label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label"> <font size="2px;"><b> Address2 </b></font></label>
												<div class="controls">
													<label class="control-label"> <?php echo $Address->employee_address_two; ?> </label>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label"> <font size="2px;"><b> PIN </b></font></label>
												<div class="controls">
													<label class="control-label"> <?php echo $Address->employee_pincode; ?> </label>
												</div>
											</div>
										</div>
								
									</div>
								<div class="row-fluid">

									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> Country </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo getCountryName($Address->employee_country)->country_name; ?> </label>
											</div>
										</div>
									</div>
									
									<div class="span4">
										<div class="control-group">
											<label class="control-label"> <font size="2px;"><b> State </b></font></label>
											<div class="controls">
												<label class="control-label"> <?php echo getStateName($Address->employee_state)->state_name; ?> </label>
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