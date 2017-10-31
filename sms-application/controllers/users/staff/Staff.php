<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		//AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('users/staff/StaffModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/class-time-table-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		
		$StudentID = $this->input->post('RecID');
		if($StudentID){
			$data['Student'] = $this->StudentModel->getStudentSignInfo($StudentID);
			$data['StudentInfo'] = $StudentBranchID = $this->StudentModel->getStudentInfo($StudentID);
			if($StudentBranchID->branch_fk_id){
			$this->load->model('super_admin/school/BranchModel');
		    $data['BranchName'] = $this->BranchModel->getBranchInfo($StudentBranchID->branch_fk_id);
			}
			$data['StudentAddress'] = $this->StaffModel->getStudentAddressInfo($StudentID);
			$data['StudentDocuments'] = $this->StaffModel->getStudentDocumentInfo($StudentID);
			$this->load->view('preview/school/class-time-table-data-preview', $data);	
		}
		
	}
	public function data_table(){
		$data['getClassTimeTableDetails'] = $this->StaffModel->getClassTimeTableDetails();
		$this->load->view('datatable/school/class-time-table-data-table-view', $data);
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$data['WeekList'] = $this->StaffModel->getWeeks();
		$data['PeriodList'] = $this->StaffModel->getPeriods();
		$this->load->model('super_admin/school/BatchModel');
		$data['BatchDetails'] = $this->BatchModel->getBatchDetails();
		$this->load->view('create/school/class-time-table-create-view', $data);
	}
	public function _isClassNameExists($key = NULL, $BranchID = NULL){
		if($key && $BranchID){
			$ClassBranchName = array('class_name' => $key, 'branch_fk_id' => $BranchID);
			$Result = $this->StaffModel->checkClassName($ClassBranchName);
			if($Result > 0){
				$this->form_validation->set_message('_isClassNameExists', "Class Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation($branchid = NULL){
		$rules = array(
			array(
				'field' => 'branchname', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'classname', 
				'label' => 'Class Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'sectionname', 
				'label' => 'Section Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'dayname', 
				'label' => 'Day Name',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			),
			array(
				'field' => 'starttime', 
				'label' => 'Day Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'endtime', 
				'label' => 'Day Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'periodname', 
				'label' => 'Period Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'batchname', 
				'label' => 'Batch Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'classtimetablestatus', 
				'label' => 'Class Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function create_class_time_table(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation($this->input->post('branchid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			       
			$InsertClassTimeTableData = array('branch_fk_id'	  		  => $branchname,
											 'class_fk_id' 	  			  => $classname,
											 'section_fk_id' 	  		  => $sectionname,
											 'school_batch_fk_id'		  => $batchname,
											 'day_fk_id' 	  			  => $dayname,
											 'start_time' 	  			  => time_twelve_to_twentyFour($starttime),
											 'end_time' 	  			  => time_twelve_to_twentyFour($endtime),
											 'period_fk_id' 	  		  => $periodname,
											 'class_time_table_create_by' => $this->MemberID,
											 'class_time_table_create_on' => date('Y-m-d H:i:s'),
											 'class_time_table_status'	  => $classtimetablestatus
										);
			$ResultStatus = $this->StaffModel->createClassTimeTable($InsertClassTimeTableData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Class Time Table Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Class Time Table Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Class Time Table Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Class Time Table Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$ClassID = $this->input->post('RecID');
		if($ClassID){
			$this->load->model('super_admin/school/BranchModel');
			$data['BranchList'] = $this->BranchModel->getBranchList();
			$data['ClassInfo'] = $StudentBranchID = $this->StaffModel->getClassInfo($ClassID);
			$this->load->view('modify/school/class-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($classid = NULL, $branchid){
		$rules = array(
			array(
				  'field' => 'classid', 
				  'label' => 'Class ID',
				  'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'classname', 
				'label' => 'Class Name',
				'rules' => 'trim|required|max_length[50]|callback__isModifyClassNameExists['. $classid.'-'.$branchid.']|xss_clean'
			),
			array(
				'field' => 'classstatus', 
				'label' => 'Class Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function _isModifyClassNameExists($ClassName = NULL, $ClassBranchID = NULL){
		$ClassBranchIDS = explode('-', $ClassBranchID);
		if($ClassBranchIDS[0])
			$this->db->where('class_id !=', $ClassBranchIDS[0]);
		if($ClassBranchIDS[1])
			$this->db->where('branch_fk_id =', $ClassBranchIDS[1]);			
		$this->db->where(array('class_name' => $ClassName));
		$Status = $this->db->get('school_branch_class');
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifyClassNameExists', "Class Name already Exists!");
			return FALSE;
		} else return TRUE;
	}
	public function update_class(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation($this->input->post('classid'), $this->input->post('branchid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$UpdateClassData = array('branch_fk_id'   => $branchid,
									'class_name' 	  => $classname,
									'class_modify_by' => $this->MemberID,
									'class_modify_on' => date('Y-m-d H:i:s'),
									'class_status'	  => $classstatus
									);
			$ClassID = array('class_id' => $classid);
			$ResultStatus = $this->StaffModel->modifyClass($UpdateClassData, $ClassID);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated Branch Class Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated Branch Class Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated Branch Class Information!');
				$response = array('status' => 2, 'message' => 'Fail To Updated Branch Class Information!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function getClassList(){
		$BranchID = $this->input->post('ID');
		if($BranchID){
			$ClassList = $this->StaffModel->getClassList($BranchID);
			$response = array("subresult" => $ClassList,"status"=>true);
		}
		echo json_encode($response);
	}
	public function get_class_time_table_subject(){
		$ClassTimeTableID = $this->input->post('RecID');
		$PeriodName = $this->input->post('RecName');
		if($ClassTimeTableID){
			$data['ClassTimeTableID'] = $ClassTimeTableID;
			$data['PeriodName'] = $PeriodName;
			$this->load->model('super_admin/school/subjectsmodel');
			$data['getSubjectsList'] = $this->subjectsmodel->getSubjectsList();
			$this->load->view('/popupevent/school/assign-employee-subject-time-table', $data);
		}
	}
	private function setEmployeeSubjectsTimeTableDataValidation(){
		$rules = array(
			array(
				  'field' => 'classtimetableid', 
				  'label' => 'Class Time Table ID',
				  'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				  'field' => 'subjectname', 
				  'label' => 'Subject Name',
				  'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'employeename', 
				'label' => 'Employee Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function create_employee_subjects_time_table(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setEmployeeSubjectsTimeTableDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$InsertAssignSubjectTimeTable = array('class_time_table_fk_id'=>$classtimetableid,
									'employee_subject_fk_id'   => $subjectname,
									'employee_fk_id' 	  => $employeename,
									'employee_assign_subject_time_table_status'=>1
									);
			$ResultStatus = $this->StaffModel->create_employee_subjects_time_table($InsertAssignSubjectTimeTable);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Create Employee Subject Time Table Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Create Employee Subject Time Table Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Employee Subject Time Table Information!');
				$response = array('status' => 2, 'message' => 'Fail To Create Employee Subject Time Table Information!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function create_event_time_table_info(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->model('super_admin/school/BatchModel');
		$data['BatchDetails'] = $this->BatchModel->getBatchDetails();
		$this->load->view('event/timetable/class-time-table-info-view', $data);
	}
	private function setEventTimeTableDataValidation(){
		$rules = array(
			array(
				  'field' => 'branchname', 
				  'label' => 'Branch Name',
				  'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				  'field' => 'classname', 
				  'label' => 'Class Name',
				  'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'sectionname', 
				'label' => 'Section Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'batchname', 
				'label' => 'Batch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			)
		);      
		return $rules;
	}
	public function get_event_time_table_info(){
			$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setEventTimeTableDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			  
			$GetTimeTableInfo = array('titable.branch_fk_id='  => $branchname,
									  'titable.class_fk_id='   => $classname,
									  'titable.section_fk_id=' => $sectionname,
									  'school_batch_fk_id='	   => $batchname
									);
			$ResultStatus = $this->StaffModel->getEventTimeTableInfo($GetTimeTableInfo);
			$TimeTableContent = $this->eventTimeTableContent($ResultStatus);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Employee Subject Time Table Information!');
				$response = array('status' => true, 
								  'message' => 'Employee Subject Time Table Information!',
								  'response_content' => $TimeTableContent
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'No Records Found!');
				$response = array('status' => 2, 'message' => 'No Records Found!', 'response_content' => $TimeTableContent);
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function eventTimeTableContent($ResultStatus){
		$WeekList 	= $this->StaffModel->getWeeks();
		$PeriodList = $this->StaffModel->getPeriods();
		//head section
		$TimeTableMessase = '<table class="table table-striped table-bordered" id="sample_1"><thead><tr><th></th>';
		$PeriodNames = array();
		foreach($PeriodList as $Period){
			foreach($ResultStatus as $Result){
				if($Period->period_id==$Result->period_fk_id){
					if(!(in_array($Result->period_fk_id, $PeriodNames))){
								$TimeTableMessase .= '<th>'.$Period->period_name.'</th>';
								$PeriodNames[] = $Result->period_fk_id;
							}
				}
			}
		}
		$TimeTableMessase .= '</tr></thead><tbody>';
		//body section
			if($ResultStatus){
				$WeekNames = array();
				
				foreach($WeekList as $WeekName){
					foreach($ResultStatus as $Result){
						if($WeekName->week_id==$Result->day_fk_id){
							
							if(!(in_array($Result->day_fk_id, $WeekNames))){
								$TimeTableMessase .= '<tr class="odd gradeX"><td>'.$WeekName->week_name.'</td>';
								$WeekNames[] = $Result->day_fk_id;
							}
					$TimeTableMessase .= "<td>". time_twentyFour_to_twelve($Result->start_time) ."-". time_twentyFour_to_twelve($Result->end_time).' '.$Result->employee_full_name .' '. $Result->subject_name ."</td>";
					
						}
					}
					$TimeTableMessase .= "</tr>";
				} 
			}else{
				$TimeTableMessase .= "<td>No Records Found!</td>";
			}	
		$TimeTableMessase .= "</tbody></table>";
		return $TimeTableMessase;
	}
	
}