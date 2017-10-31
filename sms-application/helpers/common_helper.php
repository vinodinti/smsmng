<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//get Country List
if( ! function_exists('getCountryList')){
    function getCountryList(){
		$ci=& get_instance();
		$ci->load->library('common/Address');
		return $ci->address->getCountryList();
	}	
}
//get State List Based On CountryID
if( ! function_exists('getStateList')){
    function getStateList($CountryID=NULL){
		$ci=& get_instance();
		$ci->load->library('common/Address');
		if($CountryID){
			  return $ci->address->getStateList($CountryID);
		}return false;
	}	
}
//get Country Name
if( ! function_exists('getCountryName')){
    function getCountryName($CountryID = NULL){
		$ci=& get_instance();
		$ci->load->library('common/Address');
		return $ci->address->getCountryName($CountryID);
	}	
}
//get Country Name
if( ! function_exists('getStateName')){
    function getStateName($StateID = NULL){
		$ci=& get_instance();
		$ci->load->library('common/Address');
		return $ci->address->getStateName($StateID);
	}	
}

//get token name
if( ! function_exists('getTokenName')){
    function getTokenName(){
		$ci=& get_instance();
		return $ci->security->get_csrf_token_name();
	}	
}
//get token key
if( ! function_exists('getTokenKey')){
    function getTokenKey(){
		$ci=& get_instance();
		return $ci->security->get_csrf_hash();
	}	
}
//get Form Action Url
if( ! function_exists('getActionName')){
    function getActionName($ActionName = NULL){
		//$ci=& get_instance();
		$UrlName = array("signin"		=> "",
						 "dashboard" 	=> ""
						 );
		if($UrlName['ActionName']){
			return base_url().$UrlName['ActionName'];
		}return false;
	}	
}
//get Login User Email ID
if( ! function_exists('getMemberEmail')){
    function getMemberEmail(){
		$ci=& get_instance();
		$ci->load->library('common/UserInfo');
		return $ci->userinfo->getMemberEmail();
	}	
}

//get Login Person User ID
if( ! function_exists('getMemberId')){
    function getMemberId(){
		$ci=& get_instance();
		$ci->load->library('common/UserInfo');
		return $ci->userinfo->getMemberId();
	}	
}
//get Login Person User Full Name
if( ! function_exists('getMemberName')){
    function getMemberName(){
		$ci=& get_instance();
		$ci->load->library('common/UserInfo');
		return $ci->userinfo->getMemberName();
	}	
}
//get Login Person Photo
if( ! function_exists('getMemberPhoto')){
    function getMemberPhoto(){
		$ci=& get_instance();
		$ci->load->library('common/UserInfo');
		return $ci->userinfo->getMemberPhoto();
	}	
}
//get Login Person Modules
if( ! function_exists('getMemberModules')){
    function getMemberModules($MemberID = NULL){
		$ci=& get_instance();
		$ci->load->library('common/UserModules');
		return $ci->usermodules->getMemberModules($MemberID);
	}	
}

//get School ID
if( ! function_exists('getSchoolID')){
    function getSchoolID(){
		$ci=& get_instance();
		$ci->load->library('common/UserModules');
		return $ci->usermodules->getSchoolID();
	}	
}
//get Record Created Person Name
if( ! function_exists('getRecordCreatedBy')){
    function getRecordCreatedBy($CtreatedPersonID = NULL){
		if($CtreatedPersonID){
			$ci=& get_instance();
			$ci->load->library('common/UserModules');
			return $ci->usermodules->getRecordCreatedBy($CtreatedPersonID);
		}return false;
	}	
}


//Delete Files
if( ! function_exists('getDeleteFile')){
    function getDeleteFile($FilePath = NULL){
		if($FilePath){
			if(is_readable($FilePath) && unlink($FilePath)) {
				return true;
			}return false;
		}return false;
	}	
}
//Check File Exists
if( ! function_exists('getFileExists')){
    function getFileExists($FilePath = NULL){
		if($FilePath){
			if(is_readable($FilePath)) {
				return true;
			}return false;
		}return false;
	}	
}

//Check File Exists
//Start Week Name Function
if( ! function_exists('getWeekNames')){
    function getWeekNames(){
		$WeekNames = array( array('weekid'=>1, 'weekname'=>'Monday'),
						    array('weekid'=>2, 'weekname'=>'Tuesday'),
						    array('weekid'=>3, 'weekname'=>'Wednesday'),
						    array('weekid'=>4, 'weekname'=>'Thursday'),
						    array('weekid'=>5, 'weekname'=>'Friday'),
						    array('weekid'=>6, 'weekname'=>'Saturday'),
						    array('weekid'=>7, 'weekname'=>'Sunday')
						);
							
		return	$WeekNames;
	}	
}
if( ! function_exists('getWeekName')){
    function getWeekName($WeekID = NULL){
		if($WeekID){
			$WeekName = array("1"=>"Monday",
							  "2"=>"Tuesday",
							  "3"=>"Wednesday",
							  "4"=>"Thursday",
							  "5"=>"Friday",
							  "6"=>"Saturday",
							  "7"=>"Sunday"
							);
			return	$WeekName[$WeekID];
		}return false;
	}	
}
//End Week Name Function
//Start Period Name Function
if( ! function_exists('getPeriodNames')){
    function getPeriodNames(){
		$PeriodNames = array( array('periodid'=>1, 'periodname'=>'1st'),
						    array('periodid'=>2, 'periodname'=>'2nd'),
						    array('periodid'=>3, 'periodname'=>'3rd'),
						    array('periodid'=>4, 'periodname'=>'4th'),
						    array('periodid'=>5, 'periodname'=>'5th'),
						    array('periodid'=>6, 'periodname'=>'6th'),
						    array('periodid'=>7, 'periodname'=>'7th'),
							array('periodid'=>8, 'periodname'=>'8th'),
							array('periodid'=>9, 'periodname'=>'9th'),
							array('periodid'=>10, 'periodname'=>'10th')
						);					
		return	$PeriodNames;
	}	
}
if( ! function_exists('getPeriodName')){
    function getPeriodName($PeriodID = NULL){
		if($PeriodID){
			$PeriodName = array("1"=>"1st",
							  "2"=>"2nd",
							  "3"=>"3rd",
							  "4"=>"4th",
							  "5"=>"5th",
							  "6"=>"6th",
							  "7"=>"7th",
							  "8"=>"8th",
							  "9"=>"9th",
							  "10"=>"10th"
							);
			return	$PeriodName[$PeriodID];
		}return false;
	}	
}
//End Period Name Function
//
if( ! function_exists('GotoDashboard')){
    function GotoDashboard(){
		
		$ci=& get_instance();
		$ci->load->library('common/UserInfo');
		$MemberType = $ci->userinfo->getMemberType();
		
		switch($MemberType){
			case 'ADMIN':
				redirect('super_admin/dashboard');
			break;
			case 'MANAGER':
				redirect('manager/dashboard');
			break;
			case 'TEACHER':
				redirect('application/dashboard');
			break;
			case 'STUDENT':
				redirect('users/student/dashboard');
			break;
			case 'EMPLOYEE':
				$Department 	= MemberEmployeeDepartment();
				$SubDepartment 	= MemberEmployeeSubDepartment();
				switch($Department){
					case 'SALES':
						if($SubDepartment == 'SALESPERSON')
							redirect('sales/dashboard');
					break;
					case 'HR':
						if($SubDepartment == 'HRMANAGER')
							redirect('hr-manager/dashboard');
						if($SubDepartment == 'FRONTDESK')
							redirect('front-desk/dashboard');
					break;
					case 'FINANCE':
						if($SubDepartment == 'ACCOUNTANT')
							redirect('accountant/dashboard');
					break;
					case 'OPERATIONS':
						if($SubDepartment == 'OPERATIONMANAGER')
							redirect('operations/dashboard');
						if($SubDepartment == 'ECS')
							redirect('ecs/dashboard');
						if($SubDepartment == 'DOCUMENTS')
							redirect('documents/dashboard');
					break;
				}
			break;
			default: 
				$SessionData = array('is_logged_in', 'member_id', 'member_full_name', 'member_email', 'member_photo', 'member_type_id', 'member_type');
				$ci->session->unset_userdata($SessionData);
				redirect(base_url().'credentials/super_admin/signin');
		}
	}
}

if( ! function_exists('AutoRouting')){
    function AutoRouting(){
		$ci=& get_instance();
		$ci->load->library('common/UserInfo');
		if(!$ci->userinfo->getMemberId())
			redirect(base_url().'credentials/super_admin/signin');
		
		$MemberType = $ci->userinfo->getMemberType();		
		$Path 		= $ci->uri->segment(1);
		$UserPath 	= $ci->uri->segment(2);
		switch($MemberType){
			case 'ADMIN':
				if($Path != 'super_admin')
					redirect('super_admin/dashboard');
			break;
			case 'STAFF':
				if($UserPath != 'staff')
					redirect('staff/dashboard');
			break;
			case 'STUDENT':
				if($UserPath != 'student')
					redirect('users/student/dashboard');
			break;
			case 'EMPLOYEE':
				$Department 	= MemberEmployeeDepartment();
				$SubDepartment 	= MemberEmployeeSubDepartment();
				switch($Department){
					case 'SALES':
						if($SubDepartment == 'SALESPERSON' && $Path != 'sales')
							redirect('sales/dashboard');
					break;
					case 'HR':
						if($SubDepartment == 'HRMANAGER' && $Path != 'hr-manager')
							redirect('hr-manager/dashboard');
						if($SubDepartment == 'FRONTDESK' && $Path != 'front-desk')
							redirect('front-desk/dashboard');
					break;
					case 'FINANCE':
						if($SubDepartment == 'ACCOUNTANT' && $Path != 'accountant')
							  redirect('accountant/leads');
							//redirect('accountant/dashboard');
					break;
					case 'OPERATIONS':
						if($SubDepartment == 'OPERATIONMANAGER' && $Path != 'operations')
							redirect('operations/dashboard');
						if($SubDepartment == 'ECS' && $Path != 'ecs')
							redirect('ecs/dashboard');
						if($SubDepartment == 'DOCUMENTS' && $Path != 'documents')
							redirect('documents/dashboard');
					break;
					/*new empadmin */
					case 'ADMIN':
						if($SubDepartment == 'EMPADMIN' && $Path != 'emp-admin')
							redirect('emp-admin/dashboard');
					break;
					/*new empadmin */
				}
			break;	
			default: 
				$SessionData = array('is_logged_in', 'member_id', 'member_full_name', 'member_email', 'member_photo', 'member_type_id', 'member_type');
				$ci->session->unset_userdata($SessionData);
				redirect(base_url().'credentials/super_admin/signin');
		}
	}
}

if( ! function_exists('BootstrapCreatePagination')){
    function BootstrapCreatePagination($URL = '', $TotalRows = 0, $PerPage = 0, $Class = NULL){
		$ci=& get_instance();
		
		$ci->load->library('pagination');
		$config['base_url'] 		= $URL;
		$config['total_rows'] 		= $TotalRows;
		$config['per_page'] 		= $PerPage;
		$config['num_links'] 		= 5;
		$config['page_query_string']= TRUE;
		$config['full_tag_open'] 	= '<ul class="pagination'.($Class ? ' '.$Class : '').'">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a href="#">';
		$config['cur_tag_close'] 	= '</a></li>';
		$ci->pagination->initialize($config);
		return $ci->pagination->create_links();
	}
}