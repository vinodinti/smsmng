 </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div id="footer">
		<div id="block_load">
			<img id="loadingimg" src="<?php echo base_url(); ?>contents/js/img/loader.gif">
		</div>
       2013 &copy; Admin Lab Dashboard.
      <div class="span pull-right">
         <span class="go-top"><i class="icon-arrow-up"></i></span>
      </div>
   </div>

	<style type="text/css">
     .pie {
          position: absolute;
          width: 17px;
          height: 17px;
          -moz-border-radius: 50px;
          -webkit-border-radius: 50px;
          -o-border-radius: 50px;
          border-radius: 50px;
		  border:1px solid #24aaf5;
     }
     .hold {
          position: absolute;
          width: 17px;
          height: 17px;
          -moz-border-radius: 50px;
          -webkit-border-radius: 50px;
          -o-border-radius: 50px;
          border-radius: 50px;
          /*clip: rect(0px, 100px, 100px, 50px);*/
     }
     #pieSlice1 .pie {
          background-color: #24aaf5;
          -webkit-transform:rotate(50deg);
          -moz-transform:rotate(50deg);
          -o-transform:rotate(50deg);
          transform:rotate(270deg);
		  
     }
     .pieContainer {
          /*height: 100px;*/
     }
     .pieBackground {
          background-color: #ffffff;
          position: absolute;
          width: 17px;
          height: 17px;
          -moz-border-radius: 50px;
          -webkit-border-radius: 50px;
          -o-border-radius: 50px;
          border-radius: 50px;
          -moz-box-shadow: -1px 1px 3px #000;
          /*-webkit-box-shadow: -1px 1px 3px #000;*/
          -o-box-shadow: -1px 1px 3px #000;
		  border: 1px solid #24aaf5;
          /*box-shadow: -1px 1px 3px #000;*/
		 
     } 
</style>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS -->    
   <!-- Load javascripts at bottom, this will reduce page load time -->
   <?php $add_js = AccessJS($this->uri->segment(2));
	if(isset($add_js)) {
		if(is_array($add_js)){
			foreach($add_js as $js)
				echo '<script src="'.base_url().$js.'" ></script>'."\n";
		} else 
			echo '<script src="'.base_url().$add_js.'" ></script>'."\n";
	} 
	?>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example2"></table>

	
	<link href="<?php echo base_url(); ?>contents/custom/boost/jquery.bootgrid.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>contents/custom/boost/Examples.css" rel="stylesheet" type="text/css" />
	
	<script src="<?php echo base_url(); ?>contents/custom/boost/jquery.bootgrid.js" ></script>
	<script src="<?php echo base_url(); ?>contents/custom/boost/moment.min.js" ></script>
	<script type="text/javascript">
	function getPeriodName(PeriodID = NULL){
		if(PeriodID){
		var PeriodName = { "1":"1st", "2":"2nd", "3":"3rd", "4":"4th", "5":"5th", "6":"6th", "7":"7th", "8":"8th", "9":"9th","10":"10th"};
			return	PeriodName[PeriodID];
		}return false;
	}
	function getWeekName(WeekID = NULL){
		if(WeekID){
			WeekName = {"1":"Monday", "2":"Tuesday", "3":"Wednesday", "4":"Thursday", "5":"Friday", "6":"Saturday", "7":"Sunday"};
			return	WeekName[WeekID];
		}return false;
	}
	function getAttendanceImage(Attendance = NULL){
		if(Attendance==2){
		//return '<img title="active" src="<?php echo base_url(); ?>contents/img/active.png" width="15px;" height="15px;">';
		return '<div class="pieContainer"><div class="pieBackground"></div><div id="pieSlice1" class="hold"><div class="pie" style="clip: rect(0px, 25px, 100px, 0px);"></div></div></div>';
		}else if(Attendance==1){
		return '<div class="pieContainer"><div class="pieBackground"></div><div id="pieSlice1" class="hold"><div class="pie" style="clip: rect(0px, 9px, 100px, 0px);"></div></div></div>';
		}else{
		return '';
		}
	}
	function getLogAttendanceImage(Attendance = NULL){
		if(Attendance==2){
		return '<img title="active" src="<?php echo base_url(); ?>contents/img/active.png" width="15px;" height="15px;">';
		}else if(Attendance==1){
		return '<span class="badge badge-warning">L</span>';
		}else{
		return '<span class="badge badge-important">L</span>';
		}
	}
	function getImage(Type = NULL, ImgUrl = NULL){
		if(Type =="STUDENT" && ImgUrl!=""){
			var image_url = "<?php echo base_url()."storage/student-photos/"; ?>"+ImgUrl;	
			var http = new XMLHttpRequest();
				http.open('HEAD', image_url, false);
				http.send();	
			if(http.status != 404){
				return "<img src='"+image_url+"' style='width:50px; height:50px;'>";	
			}else{
				return "<img src='<?php echo base_url()."storage/student-photos/"; ?>avatar.jpg' style='width:50px; height:50px;'>";	
			}		
		}else if(Type =="EMP" && ImgUrl!=""){
			var image_url = "<?php echo base_url()."storage/staff-photos/"; ?>"+ImgUrl;	
			var http = new XMLHttpRequest();
				http.open('HEAD', image_url, false);
				http.send();	
			if(http.status != 404){
				return "<img src='"+image_url+"' style='width:50px; height:50px;'>";	
			}else{
				return "<img src='<?php echo base_url()."storage/student-photos/"; ?>avatar.jpg' style='width:50px; height:50px;'>";	
			}		
		}else{
			return "<img src='<?php echo base_url()."storage/student-photos/"; ?>avatar.jpg' style='width:50px; height:50px;'>";
		}
	}
	var Status = "";
	function recordStatus(Status){
		if(Status == 0){
			//inactive
			return '<span title="inactive" class="badge badge-success"><i class="icon-ok"></i></span>';
		}else if(Status == 1){
			//active
			return '<img title="active" src="<?php echo base_url(); ?>contents/img/active.png" width="15px;" height="15px;">';
		}else if(Status == 2){
			//delete
			return '<span title="delete" class="badge badge-success"><i class="icon-ok"></i></span>';
		}else{
			//trash
			return '<span class="badge badge-success"><i class="icon-ok"></i></span>';
		}	
	}
	var $urlval = $("#grid-keep-selection").attr('data-action');
    $("#grid-keep-selection").on("load.rs.jquery.bootgrid", function() {
       $('#block_load').show();//loadingimg
	}).bootgrid({
		templates		: {	search:"" },
		ajax			: true,
		contentType		: "application/json",
		ajaxSettings	: { method: "POST", cache: false, type: "POST", timeout	: 3000 },
		searchSettings	: { delay: 200, characters: 3, searchable: false },
        post			: function (){
            /* To accumulate custom parameter with the request object */
							return { id		: "b0df282a-0d67-40e5-8558-c9e93b7befed",
									 token	: steveApp.data.tokenKey,
								};
							},
        url				: $urlval,
        selection		: true,
        multiSelect		: true,
        rowSelect		: true,
        keepSelection	: true,
        formatters		: {
							"status": function(column, row){
							return recordStatus(row.record_status);
							},
							"dayname": function(column, row){
							return getWeekName(row.day_fk_id);
							},
							"periodname": function(column, row){
							return getPeriodName(row.period_fk_id);
							},
							"eventadder": function(column, row){
								if(row.employee_full_name){
									return row.employee_full_name+"<br/>"+row.subject_name
								}else{
								return '<button type="submit" class="btn btn-default btn-mini create-event-pop-up" data-toggle="modal" data-target="#myModal" data-id="'+row.class_time_table_id+'" data-name="'+getPeriodName(row.period_fk_id)+'" data-action="super_admin/school/classtimetable/get-class-time-table-subject">Add '+getPeriodName(row.period_fk_id)+' Period</button>';	
								}
							},
							"eventpopup": function(column, row){
								return '<a class=\"event-plain-tool\" data-id=\"'+row.school_exam_time_table_id+'\" data-toggle=\"tooltip\" data-action=\"super_admin/school/examtimetable/get-exam-time-table-section\" ><span class=\"badge badge-warning\">'+row.section_count+'</span></a>';
							},
							"displayimg": function(column, row){
								if(row.student_photo){
									return getImage("STUDENT", row.student_photo);
								}else if(row.employee_photo){
									return getImage("EMP", row.employee_photo);
								}
							},
							"attendancedisplayimg": function(column, row){
								//if(row.attendance){
									return getAttendanceImage(row.attendance);
								//}else if(row.attendance){
									//return getAttendanceImage(row.attendance);
								//}
							},
							"attendancelog": function(column, row){
								//if(row.attendance){
									return getLogAttendanceImage(row.attendance);
								//}else if(row.attendance){
									//return getAttendanceImage(row.attendance);
								//}
							}

						},
		converters		: { datetime: {
							from: function (value) { return moment(value);},
							to: function (value) { return value?moment(value).format("DD/MM/YYYY"):''; }
							},
							time:{
								from: function (value){return moment(value);},
								to: function (value){return value?moment(value, "h:mm:ss").format("hh:mm A"):'';}
							}
						}
	    
    }).on("selected.rs.jquery.bootgrid", function(e, rows){
        /*var rowIds = [];
		for (var i = 0; i < rows.length; i++){rowIds.push(rows[i].id);}alert("Select: " + rowIds.join(","));*/
    }).on("deselected.rs.jquery.bootgrid", function(e, rows){
        /*var rowIds = [];
        for (var i = 0; i < rows.length; i++){rowIds.push(rows[i].id);}alert("Deselect: " + rowIds.join(","));*/
    }).on("loaded.rs.jquery.bootgrid", function() {
        $('#block_load').hide();//loadingimg
		//start exam time table
		$("#grid-keep-selection, .event-plain-tool").on('click', function () {
			
			var $this = $(this);
			var $form = $('<form>', { 'action': '', 'target': '_top' }).append(
			$('<input>', {'name': steveApp.data.tokenName,'value': steveApp.data.tokenKey, 'type': 'hidden' }),
			$('<input>', {'name': 'ID','value': $(this).attr('data-id'), 'type': 'hidden' })
			);
			$('#block_load').show();
			//e.preventDefault(e);
			$.post(baseUrl+$(this).attr('data-action') , $form.serialize() , function(response, status, jqXHR){
				if ( status == "error" ) {
					server_message(jqXHR.status);
				}else{
				   //$("#modify").html(response);
					//$this.popover({title: 'vinod<img src="">',content: "sdaf", html : true}).popover('show');
					$this.popover({title: response.title, content: response.content, html : true}).popover('show');
				}
				$('#block_load').hide();
				
			}, 'json');

		});
		//end exam time table
		//start class time tabel 
		$("#grid-keep-selection, .create-event-pop-up").on('click', function () {
			
			$('#myModal').modal('show');//event for display model pop up
			var $form = $('<form>', { 'action': '', 'target': '_top' }).append(
			$('<input>', {'name': steveApp.data.tokenName,'value': steveApp.data.tokenKey, 'type': 'hidden' }),
			$('<input>', {'name': 'RecID','value': $(this).attr('data-id'), 'type': 'hidden' }),
			$('<input>', {'name': 'RecName','value': $(this).attr('data-name'), 'type': 'hidden' })
			);
			var targeturl = baseUrl+$(this).attr("data-action");
			$('#block_load').show();
			//e.preventDefault(e);
			$.post(targeturl , $form.serialize() , function(response, status, jqXHR){
				
				if ( status == "error" ) {
					server_message(jqXHR.status);
				}else{
				   $(".event-pop-up").html(response);	
				}
				$('#block_load').hide();
				
			});
			
		});
		//end class time tabel
    });
	</script>
		
	<script type="text/javascript">
		
		$(".chzn-select").chosen(); 
		$(".chzn-select-deselect").chosen({allow_single_deselect:true});
		
		//Start Create
		$(document).delegate('.icon-plus', 'click', function(){
			$("#createid").show();
		});
		$(document).delegate('.createcancel', 'click', function(){
			$("#createid").hide();
		});
		//End Create
		//Start Edit
		$(document).delegate('.editcancel', 'click', function(){
			$("#editid").hide();
		});
		//End Edit
		//Start Preview
		$(document).delegate('.previewcancel', 'click', function(){
			$(".preview").hide();
		});
		//End Preview
		$(document).delegate('.modulecancel', 'click', function(){
			$("#moduleid").hide();
		});
		
	</script>
</body>
<!-- END BODY -->
</html>