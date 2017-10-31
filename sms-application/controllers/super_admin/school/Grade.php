<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/GradeModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/grade-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		$GradeID = $this->input->post('RecID');
		if($GradeID){
			$data['GradeInfo'] = $StudentBranchID = $this->GradeModel->getGradeInfo($GradeID);
			$this->load->view('preview/school/grade-data-preview', $data);	
		}
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$GradeDetails = $this->GradeModel->getGradeDetails($PerPage, $Offset);
		$RowsCount = $this->GradeModel->getGradeDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($GradeDetails), "total"=> $RowsCount,
					"rows"=>$GradeDetails
					);
		echo json_encode($data);
	}
	public function data_table(){
		//$data['GradeDetails'] = $this->GradeModel->getGradeDetails();
		$this->load->view('datatable/school/grade-data-table-view');
	}
	public function create(){
		$this->load->view('create/school/grade-create-view');
	}
	public function _isGradeNameExists($GradeNameKey = NULL){
		if($GradeNameKey){
			$GradeName = array('grade_name' => $GradeNameKey);
			$Result = $this->GradeModel->checkGradeName($GradeName);
			if($Result > 0){
				$this->form_validation->set_message('_isGradeNameExists', "Grade Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'totalmarks', 
				'label' => 'Total Marks',
				'rules' => 'trim|required|max_length[10]|numeric|xss_clean'
			),
			array(
				'field' => 'grademarks', 
				'label' => 'Grade Marks',
				'rules' => 'trim|required|max_length[10]|numeric|xss_clean'
			),
			array(
				'field' => 'gradename', 
				'label' => 'Grade Name',
				'rules' => 'trim|required|max_length[10]|callback__isGradeNameExists|xss_clean'
			),
			array(
				'field' => 'graderule', 
				'label' => 'Grade Rule',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'gradestatus', 
				'label' => 'Grade Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_grade(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			       
			$InsertGradeData = array("grade_marks"	  => $grademarks,
									 "total_marks"	  => $totalmarks,
									 "grade_name"	  => $gradename,
									 "grade_rule"	  => $graderule,
									 "grade_create_by" => $this->MemberID,
									 "grade_create_on" => date('Y-m-d H:i:s'),
									 "grade_status"	  => $gradestatus,
									);
			
			$ResultStatus = $this->GradeModel->createGrade($InsertGradeData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Grade Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Grade Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Grade Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Grade Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$GradeID = $this->input->post('RecID');
		if($GradeID){
			$data['GradeInfo'] = $StudentBranchID = $this->GradeModel->getGradeInfo($GradeID);
			$this->load->view('modify/school/grade-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($gradeid = NULL){
		$rules = array(
			array(
				  'field' => 'gradeid', 
				  'label' => 'Grade ID',
				  'rules' => 'trim|required|max_length[10]|numeric|xss_clean'
			),
			array(
				'field' => 'totalmarks', 
				'label' => 'Total Marks',
				'rules' => 'trim|required|max_length[6]|numeric|xss_clean'
			),
			array(
				'field' => 'grademarks', 
				'label' => 'Grade marks',
				'rules' => 'trim|required|max_length[6]|numeric|xss_clean'
			),
			array(
				'field' => 'gradename', 
				'label' => 'Grade Name',
				'rules' => 'trim|required|max_length[50]|callback__isModifyGradeNameExists['.$gradeid.']|xss_clean'
			),
			array(
				'field' => 'graderule',
				'label' => 'Grade Rule',
				'rules' => 'trim|required|max_length[3]|xss_clean'
			),
			array(
				'field' => 'gradestatus', 
				'label' => 'Grade Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);        
		return $rules;
	}
	public function _isModifyGradeNameExists($GradeName = NULL, $GradeID = NULL){
		if($GradeID)
			$this->db->where('grade_id !=', $GradeID);			
		$this->db->where(array('grade_name' => $GradeName));
		$Status = $this->db->get('grade');
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifyGradeNameExists', "Grade Name already Exists!");
			return FALSE;
		} else return TRUE;
	}
	public function update_grade(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation($this->input->post('gradeid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			    
			$UpdateGradeData = array('total_marks'   => $totalmarks,
									'grade_marks' 	  => $grademarks,
									'grade_name' 	  => $gradename,
									'grade_rule' 	  => $graderule,
									'grade_modify_by' => $this->MemberID,
									'grade_modify_on' => date('Y-m-d H:i:s'),
									'grade_status'	  => $gradestatus
									);
			$GradeID = array('grade_id' => $gradeid);
			$ResultStatus = $this->GradeModel->modifyGrade($UpdateGradeData, $GradeID);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated Grade Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated Grade Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated Grade Information!');
				$response = array('status' => 2, 'message' => 'Fail To Updated Grade Information!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function delete(){
		$GradeRecIDS = $this->input->post("recid");
		if(!empty($GradeRecIDS)){
			$ResultStatus = $this->GradeModel->deleteGrade($GradeRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Grade Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Grade Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Grade Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Grade Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Grade Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Grade Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$GradeRecIDS = $this->input->post("recid");
		if(!empty($GradeRecIDS)){
			$ResultStatus = $this->GradeModel->trashGrade($GradeRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Grade Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Grade Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Grade Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Grade Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Grade Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Grade Information!');
		}
		echo json_encode($response);
	}
	
	
}