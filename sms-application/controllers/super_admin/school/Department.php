<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/DepartmentModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/department-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		$DepartmentID = $this->input->post('RecID');
		if($DepartmentID){
			
			$data["DepartmentInfo"]= $this->DepartmentModel->getDepartmentInfo($DepartmentID);
			$this->load->view('preview/school/department-data-preview', $data);	
		}	
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$DepartmentDetails = $this->DepartmentModel->getDepartmentDetails($PerPage, $Offset);
		$RowsCount = $this->DepartmentModel->getDepartmentDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($DepartmentDetails), "total"=> $RowsCount,
					"rows"=>$DepartmentDetails
					);
		echo json_encode($data);
	}
	public function data_table(){
		//$data['getDepartmentDetails'] = $this->DepartmentModel->getDepartmentDetails();
		$this->load->view('datatable/school/department-data-table-view');
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->view('create/school/department-create-view', $data);
	}
	public function _isDepartmentNameExists($key = NULL, $branchid = NULL){
		if($key){
			$DepartmentName = array('department_name' => $key, 'branch_fk_id'=>$branchid);
			$Result = $this->DepartmentModel->checkDepartmentName($DepartmentName);
			if($Result > 0){
				$this->form_validation->set_message('_isDepartmentNameExists', "Department Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation($branchid){
		$rules = array(
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'departmentname', 
				'label' => 'Department Name',
				'rules' => 'trim|required|max_length[100]|callback__isDepartmentNameExists['.$branchid.']|xss_clean'
			),
			array(
				'field' => 'departmentstatus', 
				'label' => 'Department Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_department(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation($this->input->post('branchid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//DepartmentData Info
			$InsertDepartmentData = array('school_fk_id'		=> getSchoolID(),
										 'branch_fk_id'			=> $branchid,
										 'department_name'		=> $departmentname,
										 'department_create_by'	=> $this->MemberID,
										 'department_create_on'	=> date('Y-m-d H:i:s'),
										 'department_status'	=> $departmentstatus
										);
			
			$ResultStatus = $this->DepartmentModel->createDepartment($InsertDepartmentData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Department Details Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Department Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Department Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Department Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$DepartmentID = $this->input->post('RecID');
		if($DepartmentID){
			$data['DepartmentInfo'] = $this->DepartmentModel->getDepartmentInfo($DepartmentID);
			$this->load->model('super_admin/school/BranchModel');
			$data['BranchList'] = $this->BranchModel->getBranchList();
			$this->load->view('modify/school/department-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($branchid = NULL, $departmentid){
		$rules = array(
			array(
				'field' => 'departmentid', 
				'label' => 'Department ID', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'departmentname', 
				'label' => 'Department Name',
				'rules' => 'trim|required|max_length[50]|callback__isModifyDepartmentNameExists['. $branchid.'-'.$departmentid.']|xss_clean'
			),
			array(
				'field' => 'departmentstatus', 
				'label' => 'Department Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function _isModifyDepartmentNameExists($DepartmentName=NULL, $BranchID = NULL){
		$BranchDeptIDS = explode('-', $BranchID);
		if($BranchDeptIDS[1])
			$this->db->where('department_id !=', $BranchDeptIDS[1]);
		if($BranchDeptIDS[0])
			$this->db->where('branch_fk_id =', $BranchDeptIDS[0]);			
		$this->db->where(array('department_name' => $DepartmentName));
		$Status = $this->db->get('school_department');
		
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifyDepartmentNameExists', "Department Name already Exists!");
			return FALSE;
		} else return TRUE;
	}
	public function update_department(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation($this->input->post('branchid'), $this->input->post('departmentid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//User Info
			
			$UpdateDepartmentData = array('branch_fk_id'		=> $branchid,
										 'department_name'		=> $departmentname,
										 'department_modify_by'	=> $this->MemberID,
										 'department_modify_on'	=> date('Y-m-d H:i:s'),
										 'department_status'	=> $departmentstatus
										);
			$DepartmentID  =	array("department_id" => $departmentid);
									
			$ResultStatus = $this->DepartmentModel->modifyDepartment($UpdateDepartmentData, $DepartmentID);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated School Branch Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated School Branch Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated School Branch Information!');
				$response = array('status' => 2, 'message' => 'Fail To Updated School Branch Information!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function delete(){
		$DepartmentRecIDS = $this->input->post("recid");
		if(!empty($DepartmentRecIDS)){
			$ResultStatus = $this->DepartmentModel->deleteDepartment($DepartmentRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Department Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Department Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Department Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Department Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Department Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Department Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$DepartmentRecIDS = $this->input->post("recid");
		if(!empty($DepartmentRecIDS)){
			$ResultStatus = $this->DepartmentModel->trashDepartment($DepartmentRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Department Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Department Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Department Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Department Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Department Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Department Information!');
		}
		echo json_encode($response);
	}
	
	
}