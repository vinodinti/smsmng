							
	<table id="grid-keep-selection" class=" table table-striped table-bordered" data-searchable="false" data-action="<?php echo base_url(); ?>super_admin/school/classtimetable/get-table-data">
		<thead>
			<tr>		
				<th data-column-id="class_time_table_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="branch_name" data-sortable="true" >Branch</th>
				<th data-column-id="class_name" data-sortable="true" >Class</th>
				<th data-column-id="section_name" data-sortable="true" >Section</th>
				<th data-column-id="day_fk_id" data-formatter="dayname" data-sortable="true" >Day</th>
				<th data-column-id="period_fk_id" data-formatter="periodname" data-sortable="true" >Period</th>
				<th data-column-id="start_time" data-converter="time" data-sortable="true" >Start</th>
				<th data-column-id="end_time" data-converter="time" data-sortable="true" >End</th>
				<th data-column-id="employee_full_name" data-formatter="eventadder" data-sortable="true" >Add Subject & Faculty</th>
				<th data-column-id="class_time_table_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="class_time_table_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table>
	<!--start popup model-->	
	<div id="myModal" class="widget modal fade" role="dialog">	
		<div class="event-pop-up"></div>
	</div>
	<!--end popup model-->
<?php /*					
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th>Branch Name</th>
                                    <th>Class Name</th>
									<th>Section Name</th>
									<th>Day Name</th>
									<th>Period Name</th>
									<th>Start</th>
									<th>End</th>
									<th>Add Subject & Faculty</th>
									<th class="hidden-phone">Create/Modify</th>
                                    <th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
						
							<tbody>
									<?php if($getClassTimeTableDetails)foreach($getClassTimeTableDetails as $ClassTimeTable){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $ClassTimeTable->class_time_table_id; ?>" /></td>
										<td class="center hidden-phone">
										<?php echo $ClassTimeTable->branch_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $ClassTimeTable->class_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $ClassTimeTable->section_name; ?>
										</td> 
										<td class="center hidden-phone">
										<?php echo getWeekName($ClassTimeTable->day_fk_id); ?>
										</td>
										<td class="center hidden-phone">
										<?php echo getPeriodName($ClassTimeTable->period_fk_id); ?>
										</td>
										<td class="center hidden-phone">
										<?php echo time_twentyFour_to_twelve($ClassTimeTable->start_time); ?>
										</td>
										<td class="center hidden-phone">
										<?php echo time_twentyFour_to_twelve($ClassTimeTable->end_time); ?>
										</td>
										<td class="center">
										<?php if($ClassTimeTable->employee_full_name){
										 echo $ClassTimeTable->employee_full_name ." (".$ClassTimeTable->subject_name.")"; 
										 }else{ ?>
										<button type="submit" class="btn btn-default btn-mini create-event-pop-up" data-toggle="modal" data-target="#myModal" data-id="<?php echo $ClassTimeTable->class_time_table_id; ?>" data-name="<?php echo getPeriodName($ClassTimeTable->period_fk_id) ?>" data-action="super_admin/school/classtimetable/get-class-time-table-subject">Add <?php echo getPeriodName($ClassTimeTable->period_fk_id); ?> Period</button>
										<?php } ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($ClassTimeTable->class_time_table_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($ClassTimeTable->class_time_table_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($ClassTimeTable->class_time_table_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($ClassTimeTable->class_time_table_modify_on); ?>
										</td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($ClassTimeTable->class_time_table_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
*/ ?>