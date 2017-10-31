<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExamTimeTable extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/ExamTimeTableModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/exam-time-table-view';
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
			$data['StudentAddress'] = $this->ExamTimeTableModel->getStudentAddressInfo($StudentID);
			$data['StudentDocuments'] = $this->ExamTimeTableModel->getStudentDocumentInfo($StudentID);
			$this->load->view('preview/school/exam-time-table-data-preview', $data);	
		}
		
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$ExamTimeTableDetails = $this->ExamTimeTableModel->getExamTimeTableDetails($PerPage, $Offset);
		$RowsCount = $this->ExamTimeTableModel->getExamTimeTableDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($ExamTimeTableDetails), "total"=> $RowsCount,
					"rows"=>$ExamTimeTableDetails
					);
		echo json_encode($data);
	}
	public function data_table(){
		$data['ExamTimeTableDetails'] = $this->ExamTimeTableModel->getExamTimeTableDetails();
		$this->load->view('datatable/school/exam-time-table-data-table-view', $data);
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->model('super_admin/school/batchmodel');
		$data['BatchDetails'] = $this->batchmodel->getBatchDetails();
		$this->load->model('super_admin/school/subjectsmodel');
		$data['SubjectsList'] = $this->subjectsmodel->getSubjectsList();
		$this->load->model('super_admin/school/exammodel');
		$data['ExamList'] = $this->exammodel->getExamList();
		
		$this->load->view('create/school/exam-time-table-create-view', $data);
	}
	public function _isClassNameExists($key = NULL, $BranchID = NULL){
		if($key && $BranchID){
			$ClassBranchName = array('class_name' => $key, 'branch_fk_id' => $BranchID);
			$Result = $this->ExamTimeTableModel->checkClassName($ClassBranchName);
			if($Result > 0){
				$this->form_validation->set_message('_isClassNameExists', "Class Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation(){
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
				'rules' => 'trim|max_length[10]|xss_clean'
			),
			array(
				'field' => 'subjectname', 
				'label' => 'Subject Name',
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
				'field' => 'examname', 
				'label' => 'Exam Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'examon', 
				'label' => 'Exam On',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'batchname', 
				'label' => 'Batch Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'examtimetablestatus', 
				'label' => 'Class Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function create_exam_time_table(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			       
			$InsertExamTimeTableData = array("school_exam_fk_id "			   => $examname,
											"branch_fk_id"					   => $branchname,
											"class_fk_id"					   => $classname,
											//"section_fk_id"				   => $sectionname,
											"subject_fk_id"					   => $subjectname,
											"school_exam_date"				   => DateDmY_to_Ymd($examon),
											"school_exam_start_time" 		   => time_twelve_to_twentyFour($starttime),
											"school_exam_end_time"	 		   => time_twelve_to_twentyFour($endtime),
											"school_batch_fk_id"	 		   => $batchname,
											"school_exam_time_table_create_by" => $this->MemberID,
											"school_exam_time_table_create_on" => date('Y-m-d H:i:s'),
											"school_exam_time_table_status"	   => $examtimetablestatus
										);
			$TimeTableSection = array();
			if(isset($sectionname)){
				foreach($sectionname as $secname){
				$TimeTableSection[]	= array("section_fk_id"=>$secname, "school_exam_time_table_section_status"=>1);
				}
			}else{
				$TimeTableSection[]	= array("section_fk_id"=>0, "school_exam_time_table_section_status"=>1);
			}
			
			$ResultStatus = $this->ExamTimeTableModel->createExamTimeTable($InsertExamTimeTableData, $TimeTableSection);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Exam Time Table Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Exam Time Table Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Exam Time Table Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Exam Time Table Details!');
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
			$data['ClassInfo'] = $StudentBranchID = $this->ExamTimeTableModel->getClassInfo($ClassID);
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
			$ResultStatus = $this->ExamTimeTableModel->modifyClass($UpdateClassData, $ClassID);
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
			$ClassList = $this->ExamTimeTableModel->getClassList($BranchID);
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
			$ResultStatus = $this->ExamTimeTableModel->create_employee_subjects_time_table($InsertAssignSubjectTimeTable);
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
		$this->load->model('super_admin/school/batchmodel');
		$data['BatchDetails'] = $this->batchmodel->getBatchDetails();
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
			$ResultStatus = $this->ExamTimeTableModel->getEventExamTimeTableInfo($GetExamTimeTableInfo);
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
			$SectionNames = $this->ExamTimeTableModel->getExamTimeTableSection($SchoolExamTimeTableID);
			
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