<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FeesComponent extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/feescomponent/FeesComponentModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'feescomponent/fees-component-view';
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
			$data['StudentAddress'] = $this->FeesComponentModel->getStudentAddressInfo($StudentID);
			$data['StudentDocuments'] = $this->FeesComponentModel->getStudentDocumentInfo($StudentID);
			$this->load->view('preview/school/exam-time-table-data-preview', $data);	
		}
		
	}
	public function data_table(){
		$data['FeesComponentDetails'] = $this->FeesComponentModel->getFeesComponentDetails();
		$this->load->view('datatable/feescomponent/fees-component-data-table-view', $data);
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->model('super_admin/school/BatchModel');
		$data['BatchDetails'] = $this->BatchModel->getBatchDetails();
		$this->load->view('create/feescomponent/fees-component-create-view', $data);
	}
	public function getfeesmonthsdetais(){
		$BatchID = $this->input->post("ID");
		$this->load->model('super_admin/school/BatchModel');
		$BatchDetails = $this->BatchModel->getBatchDateDetails($BatchID);
		if($BatchDetails->school_batch_start_on){
		$start    = (new DateTime($BatchDetails->school_batch_start_on))->modify('first day of this month');
		$end      = (new DateTime($BatchDetails->school_batch_end_on))->modify('first day of next month');
		$interval = DateInterval::createFromDateString('1 month');
		$period   = new DatePeriod($start, $interval, $end);
		foreach ($period as $dt) {
			echo "<input class='group-checkable chk-fees-months' type='checkbox' name='feesmonth[]' value='".$dt->format("M-Y")."'> ".$dt->format("M-Y")." &nbsp;</checkbox>";
			}
		}
		echo "<span class='text-red error_message feesmonth_error_msg error'>".form_error('feesmonth')."</span>";
	}
	public function _isClassNameExists($key = NULL, $BranchID = NULL){
		if($key && $BranchID){
			$ClassBranchName = array('class_name' => $key, 'branch_fk_id' => $BranchID);
			$Result = $this->FeesComponentModel->checkClassName($ClassBranchName);
			if($Result > 0){
				$this->form_validation->set_message('_isClassNameExists', "Class Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'batchname', 
				'label' => 'Batch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'classname', 
				'label' => 'Class Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'feesname', 
				'label' => 'Fees Name',
				'rules' => 'trim|required|max_length[25]|xss_clean'
			),
			array(
				'field' => 'feesamount', 
				'label' => 'Fees Amount',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'feesinterval', 
				'label' => 'Fees Interval',
				'rules' => 'trim|required|max_length[15]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_fees_component(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$InsertFeesComponentData = array("school_batch_fk_id" => $batchname,
											 "branch_fk_id"	  	  => $branchid,
											 "class_fk_id"	  	  => $classname,
											 "fees_name"	  	  => $feesname,
											 "fees_amount"	  	  => $feesamount,
											 "fees_interval"	  => $feesinterval,
											 "fees_create_by" 	  => $this->MemberID,
											 "fees_create_on" 	  => date('Y-m-d H:i:s'),
											 "fees_status "	  	  => 1,
											);
			
			$ResultStatus = $this->FeesComponentModel->createFeesComponent($InsertFeesComponentData, $feesmonth);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Fees Component Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Fees Component Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Fees Component Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Fees Component Details!');
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
			$data['ClassInfo'] = $StudentBranchID = $this->FeesComponentModel->getClassInfo($ClassID);
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
			$ResultStatus = $this->FeesComponentModel->modifyClass($UpdateClassData, $ClassID);
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
			$ClassList = $this->FeesComponentModel->getClassList($BranchID);
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
			$ResultStatus = $this->FeesComponentModel->create_employee_subjects_time_table($InsertAssignSubjectTimeTable);
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
	public function create_event_exam_time_table_info(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->model('super_admin/school/BatchModel');
		$data['BatchDetails'] = $this->BatchModel->getBatchDetails();
		$this->load->model('super_admin/school/exammodel');
		$data['ExamList'] = $this->exammodel->getExamList();
		
		$this->load->view('event/timetable/class-exam-time-table-info-view', $data);
	}
	private function setEventExamTimeTableDataValidation(){
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
				'rules' => 'trim|max_length[50]|xss_clean'
			),
			array(
				'field' => 'examname', 
				'label' => 'Exam Name',
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
	public function get_event_exam_time_table_info(){
			$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setEventExamTimeTableDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			  
			$GetExamTimeTableInfo = array('exmtmt.branch_fk_id='   	   => $branchname,
										  'exmtmt.class_fk_id='        => $classname,
										  'exmsectmt.section_fk_id='   => $sectionname ? $sectionname : 0,
										  'exmtmt.school_exam_fk_id='  => $examname,
										  'exmtmt.school_batch_fk_id=' => $batchname
										);
			$ResultStatus = $this->FeesComponentModel->getEventExamTimeTableInfo($GetExamTimeTableInfo);
			$ExamTimeTableContent = $this->eventExamTimeTableContent($ResultStatus);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Exam Time Table Information!');
				$response = array('status' => true, 
								  'message' => 'Exam Time Table Information!',
								  'response_content' => $ExamTimeTableContent
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'No Records Found!');
				$response = array('status' => 2, 'message' => 'No Records Found!', 'response_content' => $ExamTimeTableContent);
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function eventExamTimeTableContent($ResultStatus){
		//head section
		$TimeTableMessase = '<table class="table table-striped table-bordered" id="sample_1"><thead><tr><th>Subject</th><th>Exam On</th><th>Time</th></tr></thead><tbody>';
			if($ResultStatus){
				foreach($ResultStatus as $ExamTimeTable){
				$TimeTableMessase .=	'<tr class="odd gradeX">										
											<td class="center">'.$ExamTimeTable->subject_name.'</td>
											<td class="center">'.DateFormatCtrl($ExamTimeTable->school_exam_date).'</td>
											<td class="center">'.time_twentyFour_to_twelve($ExamTimeTable->school_exam_start_time).' - '.time_twentyFour_to_twelve($ExamTimeTable->school_exam_end_time).'</td></tr>';
				}
			}else{
				$TimeTableMessase .= '<td>No Records Found!</td>';
			}
		$TimeTableMessase .= '</tbody></table>';
		return $TimeTableMessase;
	}
	public function get_exam_time_table_section(){
		$SchoolExamTimeTableID = $this->input->post('ID');
		if($SchoolExamTimeTableID){
			$SectionNames = $this->FeesComponentModel->getExamTimeTableSection($SchoolExamTimeTableID);
			
			$SectionTableMessase = '<table class="table table-striped table-bordered" id="sample_1"><tbody>';
			if(isset($SectionNames)){
				foreach($SectionNames as $Section){
				$SectionTableMessase .=	'<tr class="odd gradeX"><td class="center">'.$Section->section_name.'</td></tr>';
				}
			}else{
				$SectionTableMessase .= '<tr class="odd gradeX"><td>No Records Found!</td></tr>';
			}
			$SectionTableMessase .= '</tbody></table>';	
			
			$response = array("title" => "", "content"=> $SectionTableMessase,"status"=>true);
		}
		echo json_encode($response);
	}
	
}