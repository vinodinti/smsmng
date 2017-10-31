<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//Get getPageTitle
if( ! function_exists('getPageTitle')){
    function getPageTitle($PageName = NULL){
		if($PageName){
			$PageTitle = array('signin'			=> 'Signin',
							   'registration'   => 'Registration',
							   'dashboard'		=> 'Dashboard',
							   'school'			=> 'School',
							   'batch'			=> 'Batch',
							   'branch'			=> 'Branch',
							   'department'		=> 'Department',
							   'departmentpost' => 'Department Post',
							   'branchclass'	=> 'Class',
							   'branchclasssection'=> 'Section',
							   'examtimetable'  => 'Exam Time Table',
							   'classtimetable' => 'Class Time Table',
							   'subjects'		=> 'Subjects',
							   'grade'			=> 'Grade',
							   'employee'		=> 'Employee',
							   'student'		=> 'Student',
							   'feescomponent'	=> 'Fees Component',
							   'settings'		=> 'Settings'
							);
			if(isset($PageTitle[$PageName])){
				return $PageTitle[$PageName];
			}
			return false;
		}return false;
	}
}
//Get Css style sheets
if( ! function_exists('AccessCSS')){
    function AccessCSS($AccessCSS=NULL){
		
			$CSS = array('dashboard' => array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css'),
						'settings' => array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css',
											 'contents/css/chosen.css',
											 'contents/gritter/css/jquery.gritter.css'
											 ),
						'employee' => array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css',
											 'contents/css/chosen.css',
											 'contents/gritter/css/jquery.gritter.css',
											 'contents/css/datepicker.css'
											 ),
						'school' => array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css',
											 'contents/css/chosen.css',
											 'contents/gritter/css/jquery.gritter.css',
											 'contents/css/datepicker.css',
											 'contents/css/clockface.css',
											 'contents/css/timepicker.css'
											 ),
						'branch' => array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css',
											 'contents/css/chosen.css',
											 'contents/gritter/css/jquery.gritter.css'
											 ),
						'student' => array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css',
											 'contents/css/chosen.css',
											 'contents/gritter/css/jquery.gritter.css',
											 'contents/css/datepicker.css'
											 ),
						'classtimetable' => array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css',
											 'contents/css/chosen.css',
											 'contents/gritter/css/jquery.gritter.css',
											 'contents/css/datepicker.css',
											 'contents/css/clockface.css',
											 'contents/css/timepicker.css'
											 ),
						'examtimetable'	=>  array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css',
											 'contents/css/chosen.css',
											 'contents/gritter/css/jquery.gritter.css',
											 'contents/css/datepicker.css',
											 'contents/css/clockface.css',
											 'contents/css/timepicker.css'
											 ),
						'feescomponent'	=>  array('contents/css/bootstrap.min.css',
											 'contents/css/bootstrap-responsive.min.css',
											 'contents/css/font-awesome/css/font-awesome.css',
											 'contents/css/style.css',
											 'contents/css/style_responsive.css',
											 'contents/css/style_default.css',
											 'contents/css/chosen.css',
											 'contents/gritter/css/jquery.gritter.css',
											 'contents/css/datepicker.css',
											 'contents/css/clockface.css',
											 'contents/css/timepicker.css'
											 )
											 
					);
		if($CSS[$AccessCSS]){
			return $CSS[$AccessCSS];
		}return false;
	}
}

//Get Js style sheets
if( ! function_exists('AccessJS')){
    function AccessJS($AccessJS=NULL){
		$JS = array('dashboard' => array('contents/js/jquery-1.8.3.min.js',
										 'contents/js/bootstrap.min.js'),
					'settings' => array('contents/js/jquery-1.8.3.min.js',
										'contents/js/chosen.jquery.min.js',
										'contents/gritter/js/jquery.gritter.min.js',
										'contents/js/bootstrap.min.js',
										'contents/custom/custom.js',
										'contents/custom/jquery.dataTables.min.js'),
					'employee' => array('contents/js/jquery-1.8.3.min.js',
										'contents/js/chosen.jquery.min.js',
										'contents/gritter/js/jquery.gritter.min.js',
										'contents/js/bootstrap.min.js',
										'contents/custom/custom.js',
										'contents/custom/jquery.dataTables.min.js',
										'contents/js/bootstrap-datepicker.js'),
					'school' => array('contents/js/jquery-1.8.3.min.js',
										'contents/js/chosen.jquery.min.js',
										'contents/gritter/js/jquery.gritter.min.js',
										'contents/js/bootstrap.min.js',
										'contents/custom/custom.js',
										'contents/js/bootstrap-datepicker.js',
										'contents/js/clockface.js',
										'contents/js/bootstrap-timepicker.js'),
					'branch' => array('contents/js/jquery-1.8.3.min.js',
										'contents/js/chosen.jquery.min.js',
										'contents/gritter/js/jquery.gritter.min.js',
										'contents/js/bootstrap.min.js',
										'contents/custom/custom.js',
										'contents/custom/jquery.dataTables.min.js'),
					'student' => array('contents/js/jquery-1.8.3.min.js',
										'contents/js/chosen.jquery.min.js',
										'contents/gritter/js/jquery.gritter.min.js',
										'contents/js/bootstrap.min.js',
										'contents/custom/custom.js',
										'contents/custom/jquery.dataTables.min.js',
										'contents/js/bootstrap-datepicker.js'),
					'classtimetable' => array('contents/js/jquery-1.8.3.min.js',
										'contents/js/chosen.jquery.min.js',
										'contents/gritter/js/jquery.gritter.min.js',
										'contents/js/bootstrap.min.js',
										'contents/custom/custom.js',
										'contents/custom/jquery.dataTables.min.js',
										'contents/js/bootstrap-datepicker.js',
										'contents/js/clockface.js',
										'contents/js/bootstrap-timepicker.js'
										),
					'examtimetable' => array('contents/js/jquery-1.8.3.min.js',
										'contents/js/chosen.jquery.min.js',
										'contents/gritter/js/jquery.gritter.min.js',
										'contents/js/bootstrap.min.js',
										'contents/custom/custom.js',
										'contents/custom/jquery.dataTables.min.js',
										'contents/js/bootstrap-datepicker.js',
										'contents/js/clockface.js',
										'contents/js/bootstrap-timepicker.js'
										),
					'feescomponent' => array('contents/js/jquery-1.8.3.min.js',
										'contents/js/chosen.jquery.min.js',
										'contents/gritter/js/jquery.gritter.min.js',
										'contents/js/bootstrap.min.js',
										'contents/custom/custom.js',
										'contents/custom/jquery.dataTables.min.js',
										'contents/js/bootstrap-datepicker.js',
										'contents/js/clockface.js',
										'contents/js/bootstrap-timepicker.js'
										)
										
					);
		if($JS[$AccessJS]){
			return $JS[$AccessJS];
		}return false;
	}
}

//Get get Dashboard Url
if( ! function_exists('getDashboardUrl')){
    function getDashboardUrl($ModuleName = NULL){
		if($ModuleName){
		$UrlName = 	array('School'		=> base_url().'super_admin/school/school',
						 'Admission' 	=> base_url().'super_admin/',
						 'Employee'		=> base_url().'super_admin/',
						 'Finance'		=> base_url().'super_admin/',
						 'Students'		=> base_url().'super_admin/student/student',
						 'Parents'		=> base_url().'super_admin/',
						 'Email'		=> base_url().'super_admin/',
						 'Hostel'		=> base_url().'super_admin/',
						 'Transport'	=> base_url().'super_admin/',
						 'Library'		=> base_url().'super_admin/',
						 'Time Table'	=> base_url().'super_admin/',
						 'Class'		=> base_url().'super_admin/',
						 'Attendance'	=> base_url().'super_admin/',
						 'Examination'	=> base_url().'super_admin/',
						 'Cultural Activities'=>base_url().'super_admin/',
						 'Calender'		=> base_url().'super_admin/',
						 'Report'		=> base_url().'super_admin/',
						 'Notice'		=> base_url().'super_admin/',
						 'Settings'		=> base_url().'super_admin/settings'
						);
			if(isset($UrlName[$ModuleName])){
				return $UrlName[$ModuleName];
			}return false;
		}return false;
	}
}


//Get getSuccessMessage
if( ! function_exists('getSuccessMessage')){
    function getSuccessMessage(){
		$ci=& get_instance();
		if($ci->session->flashdata('success_message')){
		$SuccessMsg	= '<div class="alert alert-success" style="background-color:dff0d8">
							'.$ci->session->flashdata('success_message').'
					   </div>';
			return $SuccessMsg;
		}return false;
	}
}
//Get getErrorMessage
if( ! function_exists('getErrorMessage')){
    function getErrorMessage(){
		$ci=& get_instance();
		if($ci->session->flashdata('error_message')){
			$ErrorMsg = '<div class="alert alert-danger">
							'.$ci->session->flashdata('error_message').'
						</div>';
			return $ErrorMsg;
		}return false;
	}
}

//get Record Status
if( ! function_exists('getRecordStatus')){
    function getRecordStatus(){
		$RecordStatus = array( array('status_code_id'=>1, 'status_code_name'=>'Active', 'status_code_icon'=>'', 					  'status_code_status'=>1),
							   array('status_code_id'=>2, 'status_code_name'=>'InActive', 'status_code_icon'=>'', 'status_code_status'=>1)
							);
			 
		if($RecordStatus){
			return $RecordStatus;
		}return false;
	}
}
//get Record icons Status
if( ! function_exists('getRecordStatusIcons')){
    function getRecordStatusIcons($RecStatusID = NULL){
		$RecordStatus = array('0' => '<span class="badge badge-success"><i class="icon-ok"></i></span>',
							  '1' => '<span class="badge badge-success"><i class="icon-ok"></i></span>',
							  '2' => '<span class="badge badge-success"><i class="icon-ok"></i></span>'
						);
		if($RecordStatus){
			return $RecordStatus[$RecStatusID];
		}return false;
	}
}
//get Record Status Text using
if( ! function_exists('getRecordStatusText')){
    function getRecordStatusText($RecStatusID = NULL){
		$RecordStatus = array('0' => 'Inactive',
							  '1' => 'Active',
							  '2' => 'Delete',
							  '3' => 'Trash'
							  );
		if($RecordStatus){
			return $RecordStatus[$RecStatusID];
		}return false;
	}
}
//get event fire links for all
if( ! function_exists('getEventFireLinks')){
    function getEventFireLinks(){
		$ci=& get_instance();
		$UrlLinks = $ci->uri->segment(1).'/'.$ci->uri->segment(2).'/'.$ci->uri->segment(3).'/';
		return      '<span class="tools">
					   <a href="javascript:;" class="icon-chevron-down"></a>
					   <!--<a href="javascript:;" class="icon-remove"></a>-->
					</span>
					<span class="tools">
						<a>
						<i data-target="'.$UrlLinks.'data-preview" class="icon-search event-search" title="Advanced Search"></i></a>
					</span>
					<span class="tools">
						<a>
						<i class="icon-envelope" title="Email" ></i></a>
					</span>
					<span class="tools">
						<a>
						<i data-target="'.$UrlLinks.'delete" class="icon-trash event-delete" title="Delete"></i></a>
					</span>
					<span class="tools">
						<a>
						<i data-target="'.$UrlLinks.'data-preview" class="icon-external-link event-view" title="View" ></i></a>
					</span>
					<span class="tools">
						<a>
						<i  data-target="'.$UrlLinks.'update" class="icon-edit event-edit" title="Edit"></i></a>
					</span>
					<span class="tools" >
						<a><i class="icon-plus event-add" data-target="'.$UrlLinks.'create" title="Add"></i></a>
					</span>';
	}
}