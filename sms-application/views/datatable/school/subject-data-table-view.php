	<table id="grid-keep-selection" class="table table-striped table-bordered" data-searchable="false" 
	data-action="<?php echo base_url(); ?>super_admin/school/subjects/get-table-data">
		<thead>
			<tr>
				<th data-column-id="subject_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="subject_name" data-sortable="true" >Subject Name</th>
				<th data-column-id="subject_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="subject_status" data-formatter="status">Status</th>
			</tr>  
		</thead>
	</table>
<?php /*
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th>Subject Name</th>
									<th class="hidden-phone">Create/Modify</th>
                                    <th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
							
							<tbody>
									<?php if($getSubjectDetails)foreach($getSubjectDetails as $Subject){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Subject->subject_id; ?>" /></td>
										<td class="center hidden-phone">
											<?php echo $Subject->subject_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($Subject->subject_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($Subject->subject_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($Subject->subject_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($Subject->subject_modify_on); ?>
										</td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($Subject->subject_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
*/ ?>