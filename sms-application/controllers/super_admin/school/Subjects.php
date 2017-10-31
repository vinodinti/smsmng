<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/SubjectsModel');
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/subject-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		$SubjectID = $this->input->post('RecID');
		if($SubjectID){
			$data['SubjectInfo'] = $this->SubjectsModel->getSubjectInfo($SubjectID);
			$this->load->view('preview/school/subject-data-preview', $data);	
		}
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		//$Offset		= $this->input->post("current")==1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$SubjectDetails = $this->SubjectsModel->getSubjectDetails($PerPage, $Offset);
		$RowsCount = $this->SubjectsModel->getSubjectDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($SubjectDetails), "total"=> $RowsCount,
					"rows"=>$SubjectDetails
					);
		echo json_encode($data);	
	}
	public function data_table(){
		//$data['getSubjectDetails'] = $this->SubjectsModel->getSubjectDetails();
		$this->load->view('datatable/school/subject-data-table-view');
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->view('create/school/subject-create-view', $data);
	}
	public function _isSubjectNameExists($key = NULL){
		if($key){
			$SubjectName = array('subject_name' => $key);
			$Result = $this->SubjectsModel->checkSubjectName($SubjectName);
			if($Result > 0){
				$this->form_validation->set_message('_isSubjectNameExists', "Subject Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation($classid = NULL){
		$rules = array(
			array(
				'field' => 'subjectname', 
				'label' => 'Subject Name',
				'rules' => 'trim|required|max_length[50]|callback__isSubjectNameExists|xss_clean'
			),
			array(
				'field' => 'subjectstatus', 
				'label' => 'Subject Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function create_subject(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation($this->input->post('subjectname'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$InsertSubjectData = array('subject_name' 	   => $subjectname,
									   'subject_create_by' => $this->MemberID,
									   'subject_create_on' => date('Y-m-d H:i:s'),
									   'subject_status'	   => $subjectstatus
									);
			$ResultStatus = $this->SubjectsModel->createSubject($InsertSubjectData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Subject Name Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Subject Name Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Subject Name Details!');
				$response = array('status' => 2, 'message' => 'Fail To Subject Name Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$SubjectID = $this->input->post('RecID');
		if($SubjectID){
			$data['SubjectInfo'] = $this->SubjectsModel->getSubjectInfo($SubjectID);
			$this->load->view('modify/school/subject-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($subjectid = NULL){
		$rules = array(
			array(
				'field' => 'subjectid', 
				'label' => 'Subject ID',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'subjectname', 
				'label' => 'Subject Name',
				'rules' => 'trim|required|max_length[50]|callback__isModifySubjectNameExists['.$subjectid.']|xss_clean'
			),
			array(
				'field' => 'subjectstatus', 
				'label' => 'Subject Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function _isModifySubjectNameExists($SubjectName = NULL, $SubjectID = NULL){
		if($SubjectID)
			$this->db->where('subject_id !=', $SubjectID);			
		$this->db->where(array('subject_name' => $SubjectName));
		$Status = $this->db->get('school_subjects');
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifySubjectNameExists', "Subject Name already Exists!");
			return FALSE;
		} else return TRUE;
	}
	public function update_subject(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation($this->input->post('subjectid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$UpdateSubjectData = array('subject_name'	   => $subjectname,
									   'subject_modify_by' => $this->MemberID,
									   'subject_modify_on' => date('Y-m-d H:i:s'),
									   'subject_status'	   => $subjectstatus
									);
									
			$SubjectID = array('subject_id' => $subjectid);
			$ResultStatus = $this->SubjectsModel->modifySubject($UpdateSubjectData, $SubjectID);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated Subject Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated Subject Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated Subject Information!');
				$response = array('status' => 2, 'message' => 'Fail To Updated Subject Information!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function delete(){
		$SubjectRecIDS = $this->input->post("recid");
		if(!empty($SubjectRecIDS)){
			$ResultStatus = $this->SubjectsModel->deleteSubjects($SubjectRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Subject Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Subject Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Subject Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Subject Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Subject Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Subject Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$SubjectRecIDS = $this->input->post("recid");
		if(!empty($SubjectRecIDS)){
			$ResultStatus = $this->SubjectsModel->trashSubjects($SubjectRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Subject Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Subject Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Subject Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Subject Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Subject Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Subject Information!');
		}
		echo json_encode($response);
	}
	
}