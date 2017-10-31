<!-- BEGIN EXAMPLE TABLE widget-->
					<div class="widget" style="display:;" id="createid" class="create">	
						<div class="widget-title">
							<h4><i class="icon-reorder"></i> Create Certificates Details</h4>
							    <span class="tools">
									<a href="#"><i class="icon-remove createcancel" title="Close" ></i></a>
								</span>
						</div>
						<div class="widget-body">
							 <!-- BEGIN FORM-->
                            <form action="student/create-event-student-attachments-info" method="post" 
							class="form-horizontal ajax-form-file" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off" >
							
								<fieldset>
									<legend>School Information</legend>
									<input type="hidden" placeholder="Student ID" name="studentid" class="input-medium" value="<?php echo set_value('studentid', $StudentID); ?>"/>
									<span class="text-red error_message studentid_error_msg error"><?php echo form_error('studentid'); ?></span>
									
									<div class="row-fluid">	
									
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Document Title</label>
												<div class="controls">
													<input type="text" placeholder="Document Title" name="documenttitle[]" class="input-medium" value="<?php echo set_value('documenttitle'); ?>"/>
													<span class="text-red error_message documenttitle_error_msg error"><?php echo form_error('documenttitle'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<label class="control-label">Description</label>
												<div class="controls">
													<textarea placeholder="Description" name="docdescription[]" class="input-medium" value="<?php echo set_value('docdescription'); ?>"></textarea>
													<span class="text-red error_message docdescription_error_msg error"><?php echo form_error('docdescription'); ?></span>
												</div>
											</div>
										</div>
										<div class="span4">
											<div class="control-group">
												<div class="control">
													<input type="file" name="uploadphoto[]" class="default">
													<span class="text-red error_message uploadphoto_error_msg error"></span>	
												</div>
											</div>
										</div>
										<img class="add_field_button" title="Add" src="<?php echo base_url(); ?>contents/img/add.png">
									</div>
									
									<div id="SecondElement" class="input_fields_wrap"></div>
									
								</fieldset>

								<div align="center">
									<button class="btn btn-success" type="submit">Submit</button>
									<button class="btn createcancel" type="button">Cancel</button>
								</div>
								
							</form>	
							
						</div>
					</div>
					<!-- END EXAMPLE TABLE widget-->
<script type="text/javascript">
	$(".chzn-select").chosen();
	$(".chzn-select-deselect").chosen({allow_single_deselect:true});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 0; //initlal text box count
	//$(document).delegate('.add_field_button', 'click', function(e){
	$(add_button).live("click", function(e){	
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment			
			$('#SecondElement').append('<div class="row-fluid"><div class="span4"><div class="control-group"><label class="control-label">Document Title</label><div class="controls"><input type="text" placeholder="Document Title" name="documenttitle[]" class="input-medium"/><span class="text-red error_message documenttitle'+x+'_error_msg error"></span></div></div></div> <div class="span4"><div class="control-group"><label class="control-label">Description</label><div class="controls"><textarea placeholder="Description" name="docdescription[]" class="input-medium"></textarea><span class="text-red error_message docdescription'+x+'_error_msg error"></span></div></div></div> <div class="span4"><div class="control-group"><div class="control"><input type="file" name="uploadphoto[]" class="default"><span class="text-red error_message uploadphoto'+x+'_error_msg error"></span></div></div></div><img class="add_field_button" title="Add" src="<?php echo base_url(); ?>contents/img/add.png"><img title="Remove" class="remove_field" src="<?php echo base_url(); ?>contents/img/remove.png"></div>');
			//$(wrapper).append('<div><input type="text" name="mytext'+x+'"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
	
});





</script>