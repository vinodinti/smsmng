	<table id="grid-keep-selection" class="table table-striped table-bordered" data-searchable="false" data-action="<?php echo base_url(); ?>super_admin/student/student/get-table-data">
		<thead>
			<tr>		
				<th data-column-id="student_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="student_photo" data-formatter="displayimg" data-type="numeric" data-identifier="true">Photo</th>
				<th data-column-id="student_admission_number" data-type="numeric" data-identifier="true">Admission No</th>
				<th data-column-id="full_name" data-identifier="true">Name</th>
				<th data-column-id="student_mobile" data-type="numeric" data-identifier="true">Mobile</th>
				<th data-column-id="school_batch_value" data-sortable="true" >Batch</th>
				<th data-column-id="branch_name" data-sortable="true" >Branch</th>
				<th data-column-id="class_name" data-sortable="true" >Class</th>
				<th data-column-id="section_name" data-sortable="true" >Section</th>
				<th data-column-id="student_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="student_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table>

<?php /*
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th class="hidden-phone">Photo</th>
									<th class="hidden-phone">ID</th>
                                    <th>Name</th>
									<th>Contact Info</th>
									<th>Qualification</th>
									<th class="hidden-phone">Create/Modify</th>
                                    <th class="hidden-phone">Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
							
							<tbody>
									<?php if($getStudentDetails)foreach($getStudentDetails as $Student){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Student->student_id; ?>" /></td>
										<td>
										<?php if(getFileExists('storage/student-photos/'.$Student->student_photo)){ ?>
										<img style="height:50px; width:50px;" src="<?php echo base_url().'storage/student-photos/'.$Student->student_photo; ?>" />
										<?php } ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $Student->student_custom_id; ?>
										</td>
										<td class="center">
										<?php echo $Student->student_first_name .' '.$Student->student_middle_name .' '. $Student->student_last_name ."<br/>"; ?>
										</td>
										<td class="center">
										<?php echo "Contact No 1 :". $Student->student_mobile ."<br/>"; ?>
										</td>
										<td class="center">
										<?php echo "DOB :". DateFormatCtrl($Student->student_dob); ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($Student->student_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($Student->student_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($Student->student_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($Student->student_modify_on); ?></td>
										<td>
											<?php echo getRecordStatusIcons($Student->student_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
*/ ?>