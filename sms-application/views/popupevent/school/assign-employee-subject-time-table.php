<!--model pop up-->
	<div class="widget-title">
		<h4><i class="icon-reorder"></i> Create <?php echo $PeriodName; ?> </h4>
		<span class="tools">
			<a href="#" class="close" data-dismiss="modal"><i class="icon-remove createcancel" title="Close" ></i></a>
		</span>
	</div>
	<div class="widget-body">
		<form action="super_admin/school/classtimetable/create-employee-subjects-time-table" method="post" 
		class="form-horizontal ajax-form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
		
			<input type="hidden" name="classtimetableid" class="input-medium" value="<?php echo set_value('classtimetableid', $ClassTimeTableID); ?>"/>
			<span class="text-red error_message classtimetableid_error_msg error"><?php echo form_error('classtimetableid'); ?></span>
			
			<div class="row-fluid event-finder">
			
				<div class="span12">
					<div class="control-group">
						<label class="control-label">Subject Name</label>
						<div class="controls">
							<select class="input-medium m-wrap chzn-select chzn-select-main" data-placeholder="Please Select" tabindex="1" name="subjectname" data-action="super_admin/employee/employee/getemployeeassignsubjects">
								<option value="">Please Select</option>
								<?php foreach($getSubjectsList as $getSubjects){?>
								<option value="<?php echo $getSubjects->subject_id; ?>"><?php echo $getSubjects->subject_name; ?></option>
								<?php } ?>
							</select>
							<span class="text-red error_message subjectname_error_msg error"><?php echo form_error('sectionname'); ?></span>
						</div>
					</div>
				</div>
				<div class="span12">
					<div class="control-group">
						<label class="control-label">Employee Name</label>
						<div class="controls">
							<select class="input-medium m-wrap chzn-select chzn-call chzn-select-sub" data-placeholder="Please Select" tabindex="1" name="employeename" >
								<option value="">Please Select</option>
							</select>
							<span class="text-red error_message employeename_error_msg error"><?php echo form_error('employeename'); ?></span>
						</div>
					</div>
				</div>
			</div>
			<div align="center">
				<button class="btn btn-success" type="submit">Submit</button>
				<button class="btn createcancel" type="button"  data-dismiss="modal">Cancel</button>
			</div>
					
		</form>
	</div>
<!--model pop up-->
<script type="text/javascript">
	$(".chzn-select").chosen();
	$(".chzn-select-deselect").chosen({allow_single_deselect:true});
</script>