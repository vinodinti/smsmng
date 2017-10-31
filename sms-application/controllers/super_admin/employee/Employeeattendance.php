<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeAttendance extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/employee/EmployeeAttendanceModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'employee/employee-attendance-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		
		$EmployeeID = $this->input->post('RecID');
		if($EmployeeID){
			
			$this->load->view('preview/employee/employee-data-preview');	
		}
		
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$EmployeeDetails = $this->EmployeeAttendanceModel->getEmployeeAttendanceDetails($PerPage, $Offset);
		$RowsCount = $this->EmployeeAttendanceModel->getEmployeeAttendanceDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($EmployeeDetails), "total"=> $RowsCount,
					"rows"=>$EmployeeDetails
					);
		echo json_encode($data);
	}
	public function data_table(){
		//$data['getEmployeeDetails'] = $this->EmployeeAttendanceModel->getEmployeeDetails();
		$this->load->view('datatable/employee/employee-attendance-data-table-view');
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->view('create/employee/employee-attendance-create-view', $data);
	}
	private function setAttendanceDataValidation(){
		$rules = array(
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'attendancetype', 
				'label' => 'Section Name',
				'rules' => 'trim|required|max_length[7]|xss_clean'
			),
			array(
				'field' => 'attendancedate', 
				'label' => 'Attendance Date',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			)
		);
		return $rules;
	}
	public function get_branch_employee_attendance_list(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setAttendanceDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$Attendance = array("branch_id"		  => $branchid,
								"attendance_type" => $attendancetype,
								"attendance_date" => DateDmY_to_Ymd($attendancedate)
							);
			$EmployeeAttendanceList = $this->EmployeeAttendanceModel->getBranchEmployeeAttendanceList($Attendance);
			$EmployeeAttendanceTableContent = $this->eventEmployeeAttendanceContent($EmployeeAttendanceList, $attendancetype,$Attendance['attendance_date']);
			if($EmployeeAttendanceList){
				$this->session->set_flashdata('success_message', 'Employee Attendance Information!');
				$response = array('status' => true, 
								  'message' => 'Employee Attendance Information!',
								  'response_content' => $EmployeeAttendanceTableContent
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'No Records Found!');
				$response = array('status' => 2, 'message' => 'No Records Found!', 'response_content' => $EmployeeAttendanceTableContent);
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);	
	}
	public function eventEmployeeAttendanceContent($EmployeeAttendanceList, $AttendanceType, $AttendanceDate){
		$TimeTableMessase = '<form action="super_admin/employee/employeeattendance/create-employee-attendance" method="post" class="form-horizontal ajax-form" enctype="multipart/form-data" accept-charset="utf-8" autocomplete="off">
		<input name="attendancetype" type="hidden" value="'.$AttendanceType.'"/><input name="attendancedate" type="hidden" value="'.$AttendanceDate.'"/>
		<table class="table table-striped table-bordered" id="sample_1"><thead><tr>
		<th>Employee ID</th><th>Employee Name</th><th><input type="checkbox" class="check-select-all"></th></tr></thead><tbody>';
		if($EmployeeAttendanceList){
			foreach($EmployeeAttendanceList as $key => $EmployeeList){
				$Activate = $EmployeeList->employee_attendance!=""?"checked='checked'":"";
				$TimeTableMessase .= '<tr class="odd gradeX">';
				$TimeTableMessase .= "<td><input type='hidden' name='employeeid[]' value='". $EmployeeList->employee_id ."'><input type='hidden' name='attendanceid[]' value='". $EmployeeList->employee_attendance_id ."'>". $EmployeeList->employee_id ."</td>";
				$TimeTableMessase .= "<td>". $EmployeeList->full_name ."</td>";
				$TimeTableMessase .= "<td><input class='checkid' value='1' type='checkbox' name='attendance".$key."' ".$Activate."/></td>";
				$TimeTableMessase .= '</tr>';
			}	
		}else{
			$TimeTableMessase .= "<tr><td>No Records Found!</td></tr>";
		}	
			$TimeTableMessase .= "<tr><td></td><td><button type='submit' class='btn btn-success'>Submit</button></td><td></td></tr>";
			$TimeTableMessase .= "</tbody></table></form>";
		return $TimeTableMessase;
	}
	private function setDataValidation(){
		$rules = array( 
			array(
				'field' => 'attendancetype', 
				'label' => 'Attendance Type',
				'rules' => 'trim|required|max_length[8]|xss_clean'
			),
			array(
				'field' => 'attendancedate', 
				'label' => 'Attendance Date',
				'rules' => 'trim|required|max_length[11]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_employee_attendance(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$UpdateEmployeeAttendance = array();
			$InsertEmployeeAttendance = array();
			$Attendancetype = $attendancetype=="MORNING"?"employee_morning_attendance":"employee_noon_attendance";
			$AttendanceCreateOn = $attendancetype=="MORNING"?"employee_mrg_attendance_create_on":"employee_noon_attendance_create_on";
			foreach($employeeid as $key => $emp){
				$SetAttendance = $this->input->post('attendance'.$key)!=""?$this->input->post('attendance'.$key):0;
				if($emp && $attendanceid[$key]){
					$UpdateEmployeeAttendance[] = array("employee_attendance_id" => $attendanceid[$key],
														//"employee_fk_id"		 => $emp,
														$Attendancetype			 => $SetAttendance,
														"attendance_date_on"	 => $attendancedate,
														$AttendanceCreateOn 	 => date('Y-m-d H:i:s')
													);
					
				}else{
					$InsertEmployeeAttendance[] = array("employee_fk_id" 	 => $emp,
														$Attendancetype  	 => $SetAttendance,
														"attendance_date_on" => $attendancedate,
														$AttendanceCreateOn  => date('Y-m-d H:i:s')
													);
				}
			}
			
			if(!empty($InsertEmployeeAttendance)){
			$ResultStatus = $this->EmployeeAttendanceModel->createEmployeeAttendance($InsertEmployeeAttendance);	
			}
			if(!empty($UpdateEmployeeAttendance)){
			$ResultStatus = $this->EmployeeAttendanceModel->updateEmployeeAttendance($UpdateEmployeeAttendance);
			}
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Employee Attendance Details Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Employee Attendance Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Employee Attendance Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Employee Attendance Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}

	public function delete(){
		$AttendanceRecIDS = $this->input->post("recid");
		if(!empty($AttendanceRecIDS)){
			$ResultStatus = $this->EmployeeAttendanceModel->deleteEmployeeAttendance($AttendanceRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Employee Attendance Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Employee Attendance Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Employee Attendance!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Employee Attendance!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Employee Attendance!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Employee Attendance!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$AttendanceRecIDS = $this->input->post("recid");
		if(!empty($AttendanceRecIDS)){
			$ResultStatus = $this->EmployeeAttendanceModel->trashEmployeeAttendance($AttendanceRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Employee Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Employee Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Employee Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Employee Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Employee Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Employee Information!');
		}
		echo json_encode($response);
	}
	
}