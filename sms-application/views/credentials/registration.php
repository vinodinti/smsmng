	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid" style="background-color:ffffff;">
		
		<div class="row-fluid" >
			<div class="span12">
				<!-- BEGIN PAGE TITLE & BREADCRUMB-->
				<h3 class="page-title">
					<small></small>
				</h3>
				
				<!-- BEGIN EXAMPLE TABLE widget-->
				<div class="widget create">	
					<div class="widget-title">
						<h4><i class="icon-reorder"></i> Registration </h4>
					</div>
					<div class="widget-body">
						
						 <!-- BEGIN FORM-->
						<form action="credentials/super_admin/registration/create-registration" method="post" class="form-horizontal ajax-form" accept-charset="utf-8" autocomplete="off" >
						<!--Start User Information-->
						<fieldset>
								<legend> User Information</legend>
							<div class="row-fluid">	
					
								<div class="span4">
									<div class="control-group">
										<label class="control-label">First Name</label>
										<div class="controls">
											<input type="text" placeholder="First Name" class="input-medium" name="firstname" value="">
											<span class="text-red error_message firstname_error_msg error"></span>
										</div>
									</div>
								</div>
							
								<div class="span4">
									<div class="control-group">
										<label class="control-label">Last Name</label>
										<div class="controls">
											<input type="text" placeholder="Last Name" class="input-medium" name="lastname" value="">
											<span class="text-red error_message lastname_error_msg error"></span>
										</div>
									</div>
								</div>
								
								<div class="span4">	
									<div class="control-group">
										<label class="control-label">Email ID</label>
										<div class="controls">
											<input type="text" placeholder="Email ID" class="input-medium" name="emailid" value="" autocomplete="off">
											<span class="text-red error_message emailid_error_msg error"></span>
										</div>
									</div>
								</div>
						
							
							</div>
							
							<div class="row-fluid">
							
								<div class="span4">	
									<div class="control-group">
										<label class="control-label">User ID</label>
										<div class="controls">
											<input type="text" placeholder="User Id" class="input-medium" name="userid" value="" autocomplete="off">
											<span class="text-red error_message userid_error_msg error"></span>
										</div>
									</div>
								</div>
								
								<div class="span4">	
									<div class="control-group">
										<label class="control-label">Password</label>
										<div class="controls">
											<input type="password" placeholder="*********" class="input-medium" name="password" value="" autocomplete="off"/>
											<span class="text-red error_message password_error_msg error"></span>
										</div>
									</div>
								</div>
								
								
							</div>
						</fieldset>
						<!--End User Information-->
						
						<!--Start School Information-->	
						<fieldset>
								<legend> School Information</legend>
							<div class="row-fluid">	
					
								<div class="span4">
									<div class="control-group">
										<label class="control-label">School Name</label>
										<div class="controls">
											<input type="text" placeholder="School Name" class="input-medium" name="schoolname" value="">
											<span class="text-red error_message schoolname_error_msg error"></span>
										</div>
									</div>
								</div>
							
								<div class="span4">
									<div class="control-group">
										<label class="control-label">Register No</label>
										<div class="controls">
											<input type="text" placeholder="Register No" class="input-medium" name="registrationno" value="">
											<span class="text-red error_message registrationno_error_msg error"></span>
										</div>
									</div>
								</div>
								
								<div class="span4">	
									<div class="control-group">
										<label class="control-label">Mobile No</label>
										<div class="controls">
											<input type="text" placeholder="Mobile No" class="input-medium" name="phoneno" value="">
											<span class="text-red error_message mobileno_error_msg error"></span>
										</div>
									</div>
								</div>
							
							</div>
							
							
						</fieldset>
						<!--End School Information-->
						
						<!--Start School Address Information-->
						<fieldset>
								<legend>School Address</legend>
								
								<div class="row-fluid">	
								
								<div class="span4">
									<div class="control-group">
										<label class="control-label">Address1</label>
										<div class="controls">
											<textarea rows="1" placeholder="Adderess" class="input-medium" id="address" name="address" value=""></textarea>
											<span class="text-red error_message address_error_msg error"></span>
										</div>
									</div>
								</div>
								
								<div class="span4">
									<div class="control-group">
										<label class="control-label">Address2</label>
										<div class="controls">
											<textarea rows="1" id="address" placeholder="Adderess" class="input-medium" name="address1" value=""></textarea>
											<span class="text-red error_message address1_error_msg error"></span>
										</div>
									</div>
								</div>
								
								<div class="span4">
									<div class="control-group">
										<label class="control-label">PIN</label>
										<div class="controls">
										<input type="text" placeholder="PIN Code" class="input-medium" id="pin" name="pin" value="">
										<span class="text-red error_message pin_error_msg error"></span>
										</div>
									</div>
								</div>
							
							</div>
							<div class="row-fluid">	
								
								<div class="span4">
									<div class="control-group">
										<label class="control-label">Country</label>
									  <div class="controls">
										<select class="input-medium chzn-select chzn-select-main" data-placeholder="Select" tabindex="1" name="country" data-action="<?php echo base_url(); ?>credentials/super_admin/registration/get-state-list" data-token="<?php echo $this->security->get_csrf_hash(); ?>">
											<option value=""></option> 
											<?php if($countryList)foreach($countryList as $country){?>
												<option value="<?php echo $country->country_id ?>"><?php echo $country->country_name ?></option>
											<?php } ?>
										</select>
										<span class="text-red error_message country_error_msg error"></span>
									  </div>
									</div>
								</div>
								
								<div class="span4">
									<div class="control-group">
										<label class="control-label">State</label>
									  <div class="controls">
										 <select class="input-medium chzn-select chzn-call chzn-select-sub" data-placeholder="Select" tabindex="1" name="state">
											<option value=""></option> 
										</select>
										<span class="text-red error_message state_error_msg error"></span>
									  </div>
									</div>
								</div>
							
							</div>	
						</fieldset>
						<!--End School Address Information-->	
							
							<div align="center">
								<button class="btn btn-success" type="submit">Submit</button>
								<button class="btn createcancel" type="button">Cancel</button>
							</div>
						</form>	
						
					</div>
				</div>
				<!-- END EXAMPLE TABLE widget-->
				   
			</div>
		</div>
			
	</div>
	<!-- END PAGE CONTAINER-->