<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/BranchModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/branch-view';
		$this->load->view('template', $data);
	}
	public function get_table_data(){
		$searchPhrase 	= $this->input->post("searchPhrase");
		$Current		= (int)$this->input->post("current");
		$PerPage		= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$BranchDetails  = $this->BranchModel->getBranchDetails($PerPage, $Offset);
		$RowsCount 		= $this->BranchModel->getBranchDetailsCount();
		$data = array("current"=> $Current, "rowCount"=> count($BranchDetails), "total"=> $RowsCount, "rows"=>$BranchDetails);
		echo json_encode($data);
	}
	public function data_table(){
		//$data["getBranchDetails"] = $this->BranchModel->getBranchDetails();
		$this->load->view('datatable/school/branch-data-table-view');
	}
	public function create(){
		$data['CountryList'] = getCountryList();
		$this->load->view('create/school/branch-create-view', $data);
	}
	public function _isBranchNameExists($key = NULL){
		if($key){
			$BranchName = array('branch_name'=>$key);
			$Result = $this->BranchModel->checkBranchName($BranchName);
			if($Result > 0){
				$this->form_validation->set_message('_isBranchNameExists', "Branch already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'branchname', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[30]|callback__isBranchNameExists|xss_clean'
			),
			array(
				'field' => 'recognitionno', 
				'label' => 'Recognition No', 
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'phoneno', 
				'label' => 'Phone No',
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'contactno', 
				'label' => 'Contact No',
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'addressone', 
				'label' => 'Addressone', 
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'addresstwo', 
				'label' => 'Addresstwo', 
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'pin', 
				'label' => 'Pin', 
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'country', 
				'label' => 'Country', 
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'state', 
				'label' => 'State', 
				'rules' => 'trim|required|max_length[30]|xss_clean'
			),
			array(
				'field' => 'branchstatus', 
				'label' => 'Branch Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_branch(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//Branch Info
			$InsertBranchData = array('school_fk_id'	=> getSchoolID(),
									'branch_name'		=> $branchname,
									'recognition_no'	=> $recognitionno,
									'branch_phone_no1'	=> $phoneno,
									'branch_phone_no2'	=> $contactno,
									'branch_address1'	=> $addressone,
									'branch_address2'	=> $addresstwo,
									'branch_country'	=> $country,
									'branch_state'		=> $state,
									'branch_city'		=> 0,
									'branch_pin'		=> $pin,
									'branch_type'		=> 'S',
									'branch_create_by'	=> $this->MemberID,
									'branch_create_on'	=> date('Y-m-d H:i:s'),
									'branch_status'		=> $branchstatus
									);
			
			$ResultStatus = $this->BranchModel->createBranch($InsertBranchData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created School Branch Details Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created School Branch Details Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create School Branch Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create School Branch Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$BranchID = $this->input->post('RecID');
		if($BranchID){
			$data['BranchInfo'] = $BranchInfo = $this->BranchModel->getBranchInfo($BranchID);
			$data['CountryList'] = getCountryList();
			if($BranchInfo->branch_country){
				$data['StateList'] = getStateList($BranchInfo->branch_country);
			}
			$this->load->view('modify/school/branch-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($branchid = NULL){
		$rules = array(
			array(
				'field' => 'branchid', 
				'label' => 'Branch ID', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'branchname', 
				'label' => 'School Name',
				'rules' => 'trim|required|max_length[50]|callback__isModifyBranchNameExists['. $branchid .']|xss_clean'
			),
			array(
				'field' => 'recognitionno', 
				'label' => 'School Recognition No', 
				'rules' => 'trim|max_length[20]|xss_clean'
			),
			array(
				'field' => 'phoneno', 
				'label' => 'Phone No', 
				'rules' => 'trim|required|max_length[15]|xss_clean'
			),
			array(
				'field' => 'contactno', 
				'label' => 'Contact No', 
				'rules' => 'trim|max_length[15]|xss_clean'
			),
			array(
				'field' => 'addressone', 
				'label' => 'Address One', 
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'addresstwo', 
				'label' => 'Address Two', 
				'rules' => 'trim|required|max_length[100]|xss_clean'
			),
			array(
				'field' => 'pin', 
				'label' => 'Pin Code', 
				'rules' => 'trim|max_length[6]|xss_clean'
			),
			array(
				'field' => 'country', 
				'label' => 'Country', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'state', 
				'label' => 'State', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'branchstatus', 
				'label' => 'Branch Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function _isModifyBranchNameExists($BranchName=NULL, $BranchID = NULL){
		
		if($BranchID)
			$this->db->where('branch_id !=', $BranchID);			
		$this->db->where(array('branch_name' => $BranchName));
		$Status = $this->db->get('school_branch');
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifyBranchNameExists', "Branch Name already Exists!");
			return FALSE;
		} else return TRUE;
		
	}
	public function update_branch(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation($this->input->post('branchid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//User Info
			
			$UpdateBranchData = array('branch_name'	   => $branchname,
									'recognition_no'   => $recognitionno,
									'branch_phone_no1' => $phoneno,
									'branch_phone_no2' => $contactno,
									'branch_address1'  => $addressone,
									'branch_address2'  => $addresstwo,
									'branch_country'   => $country,
									'branch_state'     => $state,
									'branch_city'      => 0,
									'branch_pin'       => $pin,
									'branch_modify_by' => $this->MemberID,
									'branch_modify_on' => date('Y-m-d H:i:s'),
									'branch_status'	   => $branchstatus
									);
			$BranchID  =	array("branch_id" => $branchid);
									
			$ResultStatus = $this->BranchModel->modifyBranch($UpdateBranchData, $BranchID);
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
	
	
	
}