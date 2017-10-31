	<table id="grid-keep-selection" class="table table-striped table-bordered" data-searchable="false" data-action="<?php echo base_url(); ?>super_admin/employee/employee/get-table-data">
		<thead>
			<tr>     
				<th data-column-id="employee_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="employee_photo" data-formatter="displayimg" data-type="numeric" data-identifier="true">Photo</th>
				<th data-column-id="employee_custom_id" data-type="numeric" data-identifier="true">Custom ID</th>
				<th data-column-id="full_name" data-identifier="true">Name</th>
				<th data-column-id="employee_email" data-identifier="true">Email</th>
				<th data-column-id="employee_mobile_no" data-type="numeric" data-identifier="true">Mobile</th>
				<th data-column-id="employee_qualifiacation" data-sortable="true" >Qualification</th>
				<th data-column-id="branch_name" data-sortable="true" >Branch</th>
				<th data-column-id="department_name" data-sortable="true" >Department Name</th>
				<th data-column-id="department_posts_name" data-sortable="true" >Post Name</th>
				<th data-column-id="employee_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="employee_is_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table>
<?php /*
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th>Photo</th>
									<th>ID</th>
									<th>Email ID</th>
                                    <th>Name</th>
									<th>Contact Info</th>
									<th>Qualification</th>
									<th class="hidden-phone">Create/Modify</th>
                                    <th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
							
							<tbody>
									<?php if($getEmployeeDetails)foreach($getEmployeeDetails as $Employee){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Employee->employee_id; ?>" /></td>
										<td class="center">
										<?php if(getFileExists('storage/staff-photos/'.$Employee->employee_photo)){ ?>
										<img style="height:50px; width:50px;" src="<?php echo base_url().'/storage/staff-photos/'.$Employee->employee_photo; ?>" />
										<?php } ?>
										</td>
										<td class="center">
										<?php echo $Employee->employee_custom_id; ?>
										</td>
										<td class="center">
										<?php echo $Employee->employee_email; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $Employee->employee_first_name .' '. $Employee->employee_last_name."<br/>"; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Contact No 1 :". $Employee->employee_mobile_no."<br/>"; ?>
										<?php echo "Contact No 2 :". $Employee->employee_contact_no; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Qualification :". $Employee->employee_qualifiacation."<br/>"; ?>
										<?php echo "Specification :". $Employee->employee_specification."<br/>"; ?>
										<?php echo "DOB :". DateFormatCtrl($Employee->employee_dob); ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($Employee->employee_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($Employee->employee_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($Employee->employee_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($Employee->employee_modify_on); ?></td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($Employee->employee_is_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
*/ ?>