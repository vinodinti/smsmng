<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchClassSection extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/BranchClassSectionModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/section-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		$SectionID = $this->input->post('RecID');
		if($SectionID){
			$data['SectionInfo'] = $SectionInfo = $StudentBranchID = $this->BranchClassSectionModel->getSectionInfo($SectionID);
			if($SectionInfo->class_fk_id){
				$this->load->model('super_admin/school/BranchClassModel');
				$data['ClassInfo'] = $this->BranchClassModel->getClassInfo($SectionInfo->class_fk_id);
			}
			if($SectionInfo->branch_fk_id){
				$this->load->model('super_admin/school/BranchModel');
				$data['BranchInfo'] = $this->BranchModel->getBranchInfo($SectionInfo->branch_fk_id);	
			}	
			$this->load->view('preview/school/section-data-preview', $data);	
		}	
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$SectionDetails = $this->BranchClassSectionModel->getSectionDetails($PerPage, $Offset);
		$RowsCount = $this->BranchClassSectionModel->getSectionDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($SectionDetails), "total"=> $RowsCount,
					"rows"=>$SectionDetails
					);
		echo json_encode($data);	
	}
	public function data_table(){
		//$data['getSectionDetails'] = $this->BranchClassSectionModel->getSectionDetails();
		$this->load->view('datatable/school/section-data-table-view');
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->view('create/school/section-create-view', $data);
	}
	public function _isSectionNameExists($key = NULL, $classid = NULL){
		if($key && $classid){
			$BranchClassSectionName = array('section_name' => $key, 'class_fk_id' => $classid);
			$Result = $this->BranchClassSectionModel->checkSectionName($BranchClassSectionName);
			if($Result > 0){
				$this->form_validation->set_message('_isSectionNameExists', "Section Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation($classid = NULL){
		$rules = array(
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'classname', 
				'label' => 'Class Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'sectionname', 
				'label' => 'Section Name',
				'rules' => 'trim|required|max_length[50]|callback__isSectionNameExists['.$classid.']|xss_clean'
			),
			array(
				'field' => 'sectionstatus', 
				'label' => 'Section Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function create_section(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation($this->input->post('classname'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$InsertSectionData = array('class_fk_id' 	   => $classname,
									   'section_name'	   => $sectionname,
									   'section_create_by' => $this->MemberID,
									   'section_create_on' => date('Y-m-d H:i:s'),
									   'section_status'	   => $sectionstatus
									);
			$ResultStatus = $this->BranchClassSectionModel->createSection($InsertSectionData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Section Name Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Class Name Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Section Class Name Details!');
				$response = array('status' => 2, 'message' => 'Fail To Section Class Name Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$SectionID = $this->input->post('RecID');
		if($SectionID){
			$this->load->model('super_admin/school/BranchModel');
			$data['BranchList'] = $this->BranchModel->getBranchList();
			$data['SectionInfo'] = $SectionInfo = $StudentBranchID = $this->BranchClassSectionModel->getSectionInfo($SectionID);
			
			$this->load->model('super_admin/school/BranchClassModel');
			$data['ClassList'] = $this->BranchClassModel->getClassList($SectionInfo->branch_fk_id);
			
			$this->load->view('modify/school/section-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($classid = NULL, $sectionid = NULL){
		$rules = array(
			array(
				'field' => 'sectionid', 
				'label' => 'Section Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'classname', 
				'label' => 'Class Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'sectionname', 
				'label' => 'Section Name',
				'rules' => 'trim|required|max_length[50]|callback__isModifySectionNameExists['.$classid.'-'.$sectionid.']|xss_clean'
			),
			array(
				'field' => 'sectionstatus', 
				'label' => 'Section Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function _isModifySectionNameExists($SectionName = NULL, $ClassSectionID = NULL){
		$ClassSectionIDS = explode('-', $ClassSectionID);
		if($ClassSectionIDS[0])
			$this->db->where('class_fk_id =', $ClassSectionIDS[0]);
		if($ClassSectionIDS[1])
			$this->db->where('section_id !=', $ClassSectionIDS[1]);			
		$this->db->where(array('section_name' => $SectionName));
		$Status = $this->db->get('school_branch_class_section');
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifySectionNameExists', "Section Name already Exists!");
			return FALSE;
		} else return TRUE;
	}
	public function update_section(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation($this->input->post('classname'), $this->input->post('sectionid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$UpdateSectionData = array('class_fk_id' 	   => $classname,
									   'section_name'	   => $sectionname,
									   'section_modify_by' => $this->MemberID,
									   'section_modify_on' => date('Y-m-d H:i:s'),
									   'section_status'	   => $sectionstatus
									);
									
			$SectionID = array('section_id' => $sectionid);
			$ResultStatus = $this->BranchClassSectionModel->modifySection($UpdateSectionData, $SectionID);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated Section Section Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated Section Section Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated Section Section Information!');
				$response = array('status' => 2, 'message' => 'Fail To Updated Section Section Information!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function getSectionList(){
		$ClassID = $this->input->post('ID');
		if($ClassID){
			$SectionList = $this->BranchClassSectionModel->getSectionList($ClassID);
			$response = array("subsubresult" => $SectionList,"status"=>true);
		}
		echo json_encode($response);
	}
	public function delete(){
		$SectionRecIDS = $this->input->post("recid");
		if(!empty($SectionRecIDS)){
			$ResultStatus = $this->BranchClassSectionModel->deleteBranchClass($SectionRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Section Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Section Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Section Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Section Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Section Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Section Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$SectionRecIDS = $this->input->post("recid");
		if(!empty($SectionRecIDS)){
			$ResultStatus = $this->BranchClassSectionModel->trashBranchClass($SectionRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Section Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Section Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Section Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Section Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Section Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Section Information!');
		}
		echo json_encode($response);
	}
	
	
}