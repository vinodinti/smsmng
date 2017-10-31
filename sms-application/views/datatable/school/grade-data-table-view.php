	<table id="grid-keep-selection" class="table table-striped table-bordered" data-searchable="false" 
	data-action="<?php echo base_url(); ?>super_admin/school/grade/get-table-data">
		<thead>
			<tr>
				<th data-column-id="grade_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="grade_name" data-sortable="true" >Grade Name</th>
				<th data-column-id="total_marks" data-sortable="true" >Total Marks</th>
				<th data-column-id="grade_marks" data-sortable="true" >Grade Marks</th>
				<th data-column-id="grade_rule" data-sortable="true" >Grade Condition</th>
				<th data-column-id="grade_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="grade_status" data-formatter="status">Status</th>
			</tr>  
		</thead>
	</table>
<?php /*

						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th>Grade Name</th>
                                    <th>Total Marks</th>
									<th>Grade Marks</th>
									<th>Grade Condition</th>
									<th class="hidden-phone">Create/Modify</th>
									<th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
							
							<tbody>
									<?php if($GradeDetails)foreach($GradeDetails as $Grade){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $Grade->grade_id; ?>" /></td>
										<td class="center hidden-phone">
										<?php echo $Grade->grade_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $Grade->total_marks; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $Grade->grade_marks; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $Grade->grade_rule; ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($Grade->grade_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($Grade->grade_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($Grade->grade_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($Grade->grade_modify_on); ?>
										</td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($Grade->grade_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
*/ ?>