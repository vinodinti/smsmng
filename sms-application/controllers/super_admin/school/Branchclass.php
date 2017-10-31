<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchClass extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/BranchClassModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/class-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		$ClassID = $this->input->post('RecID');
		if($ClassID){
			$data['ClassInfo'] = $BranchID = $this->BranchClassModel->getClassInfo($ClassID);
			if($BranchID->branch_fk_id){
				$this->load->model('super_admin/school/BranchModel');
				$data['BranchInfo'] = $this->BranchModel->getBranchInfo($BranchID->branch_fk_id);	
			}
			$this->load->view('preview/school/class-data-preview', $data);	
		}	
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$BranchClassDetails = $this->BranchClassModel->getClassDetails($PerPage, $Offset);
		$RowsCount = $this->BranchClassModel->getClassDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($BranchClassDetails), "total"=> $RowsCount,
					"rows"=>$BranchClassDetails
					);
		echo json_encode($data);	
	}
	public function data_table(){
		$data['getClassDetails'] = $this->BranchClassModel->getClassDetails();
		$this->load->view('datatable/school/class-data-table-view', $data);
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->view('create/school/class-create-view', $data);
	}
	public function _isClassNameExists($key = NULL, $BranchID = NULL){
		if($key && $BranchID){
			$ClassBranchName = array('class_name' => $key, 'branch_fk_id' => $BranchID);
			$Result = $this->BranchClassModel->checkClassName($ClassBranchName);
			if($Result > 0){
				$this->form_validation->set_message('_isClassNameExists', "Class Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation($branchid = NULL){
		$rules = array(
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[50]|xss_clean'
			),
			array(
				'field' => 'classname', 
				'label' => 'Class Name',
				'rules' => 'trim|required|max_length[50]|callback__isClassNameExists['.$branchid.']|xss_clean'
			),
			array(
				'field' => 'classstatus', 
				'label' => 'Class Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		        
		return $rules;
	}
	public function create_class(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation($this->input->post('branchid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			
			$InsertClassData = array('branch_fk_id'	  => $branchid,
									'class_name' 	  => $classname,
									'class_create_by' => $this->MemberID,
									'class_create_on' => date('Y-m-d H:i:s'),
									'class_status'	  => $classstatus
								);
			$ResultStatus = $this->BranchClassModel->createClass($InsertClassData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Class Name Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Class Name Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Class Name Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Class Name Details!');
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
			$data['ClassInfo'] = $StudentBranchID = $this->BranchClassModel->getClassInfo($ClassID);
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
			$ResultStatus = $this->BranchClassModel->modifyClass($UpdateClassData, $ClassID);
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
			$ClassList = $this->BranchClassModel->getClassList($BranchID);
			$response = array("subresult" => $ClassList,"status"=>true);
		}
		echo json_encode($response);
	}
	public function delete(){
		$BranchClassRecIDS = $this->input->post("recid");
		if(!empty($BranchClassRecIDS)){
			$ResultStatus = $this->BranchClassModel->deleteBranchClass($BranchClassRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Branch Class Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Branch Class Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Branch Class Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Branch Class Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Branch Class Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Branch Class Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$BranchClassRecIDS = $this->input->post("recid");
		if(!empty($BranchClassRecIDS)){
			$ResultStatus = $this->BranchClassModel->trashBranchClass($BranchClassRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Branch Class Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Branch Class Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Branch Class Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Branch Class Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Branch Class Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Branch Class Information!');
		}
		echo json_encode($response);
	}
	
}