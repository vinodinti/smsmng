	<table id="grid-keep-selection" class=" table table-striped table-bordered" data-searchable="false" data-action="<?php echo base_url(); ?>super_admin/school/examtimetable/get-table-data">
		<thead>
			<tr>		
				<th data-column-id="school_exam_time_table_id" data-type="numeric" data-identifier="true" data-visible="false">Sno</th>
				<th data-column-id="branch_name" data-sortable="true" >Branch</th>
				<th data-column-id="class_name" data-sortable="true" >Class</th>
				<th data-column-id="" data-formatter="eventpopup" data-sortable="true" >Section</th>
				<th data-column-id="school_batch_value" data-sortable="true" >Batch</th>
				<th data-column-id="school_exam_name" data-sortable="true" >Exam</th>
				<th data-column-id="subject_name" data-sortable="true" >Subject</th>
				<th data-column-id="school_exam_date" data-converter="datetime" data-sortable="true" >Exam Date</th>
				<th data-column-id="school_exam_start_time" data-converter="time" data-sortable="true" >Start</th>
				<th data-column-id="school_exam_end_time" data-converter="time" data-sortable="true" >End</th>
				<th data-column-id="school_exam_time_table_create_on" data-converter="datetime">Create On</th>
				<th data-column-id="record_status" data-formatter="status">Status</th>
			</tr>
		</thead>
	</table>
<?php /*
						<table class="table table-striped table-bordered" id="sample_1">
                            <thead>
                                <tr>
                                    <th style="width:8px;"><input type="checkbox" class="group-checkable check-select-all" data-set="#sample_1 .checkboxes" /></th>
									<th>Branch</th>
                                    <th>Class</th>
									<th>Section</th>
									<th>Batch</th>
									<th>Exam</th>
									<th>Subject</th>
									<th>Exam On</th>
									<th>Time</th>
									<th class="hidden-phone">Create/Modify</th>
									<th class="hidden-phone">Date</th>
                                    <th class="hidden-phone">Status</th>
                                </tr>
                            </thead>
							
							<tbody>
									<?php if($ExamTimeTableDetails)foreach($ExamTimeTableDetails as $ExamTimeTable){ ?>
									<tr class="odd gradeX">
										<td><input name="checkid" type="checkbox" class="checkboxes checkid" value="<?php echo $ExamTimeTable->school_exam_time_table_id; ?>" /></td>
										<td class="center hidden-phone">
										<?php echo $ExamTimeTable->branch_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $ExamTimeTable->class_name; ?>
										</td>
										<td class="center hidden-phone">
										<a class="event-plain-tool" href="#" data-id="<?php echo $ExamTimeTable->school_exam_time_table_id; ?>" data-toggle="tooltip" data-action="super_admin/school/examtimetable/get-exam-time-table-section" >
										<span class="badge badge-warning"><?php echo $ExamTimeTable->section_count; ?></span>
										</a>
											<!--<button data-action="super_admin/school/classtimetable/get-class-time-table-subject" data-name="3rd" data-id="9" data-target="#myModal" data-toggle="modal" class="btn btn-default btn-mini create-event-pop-up" type="submit">view <?php echo $ExamTimeTable->section_count; ?> Sections</button>-->
										</td>
										<td class="center hidden-phone">
										<?php echo $ExamTimeTable->school_batch_value; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo $ExamTimeTable->school_exam_name; ?>
										</td>							
										<td class="center hidden-phone">
										<?php echo $ExamTimeTable->subject_name; ?>
										</td>
										<td class="center hidden-phone">
										<?php echo DateFormatCtrl($ExamTimeTable->school_exam_date); ?>
										</td>
										<td class="center hidden-phone">
										<?php echo time_twentyFour_to_twelve($ExamTimeTable->school_exam_start_time) .' - '; ?>
										<?php echo time_twentyFour_to_twelve($ExamTimeTable->school_exam_end_time); ?>
										</td>
										<td class="center hidden-phone">
										<?php 
											 echo "Created By :". getRecordCreatedBy($ExamTimeTable->school_exam_time_table_create_by)."<br/>"; 
											 echo "Modified By :". getRecordCreatedBy($ExamTimeTable->school_exam_time_table_modify_by);
										?>
										</td>
										<td class="center hidden-phone">
										<?php echo "Created On  :".DateFormatCtrl($ExamTimeTable->school_exam_time_table_create_on)."<br/>";
											  echo "Modified On :".DateFormatCtrl($ExamTimeTable->school_exam_time_table_modify_on); ?>
										</td>
										<td class="center hidden-phone">
											<?php echo getRecordStatusIcons($ExamTimeTable->school_exam_time_table_status); ?>
										</td>
									</tr>
									<?php } ?>
                            </tbody>
                        </table>
*/ ?>

<style type="text/css">
	.bs-example{
    	margin: 200px 100px;
    }
    .bs-example a{
        margin: 25px;
        font-size: 20px;
    }
    /* Styles for custom tooltip template */
    .tooltip-head{
        color: #fff;
        background: #000;
        padding: 10px 10px 5px;
        border-radius: 4px 4px 0 0;
        text-align: center;
        margin-bottom: -2px; /* Hide default tooltip rounded corner from top */
    }
    .tooltip-head .glyphicon{
        font-size: 22px;
        vertical-align: bottom;
    }
    .tooltip-head h3{
        margin: 0;
        font-size: 18px;
    }
</style>