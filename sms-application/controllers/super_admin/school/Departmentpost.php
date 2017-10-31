<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentPost extends CI_Controller{
	public $CI = NULL;
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/school/DepartmentPostModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		$data['body_content']	= 'school/department-post-view';
		$this->load->view('template', $data);
	}
	public function data_preview(){
		$DepartmentPostID = $this->input->post('RecID');
		if($DepartmentPostID){
			$data['DepartmentPostInfo'] = $DepartmentPostInfo = $this->DepartmentPostModel->getDepartmentPostInfo($DepartmentPostID);
			if($DepartmentPostInfo->department_fk_id){
				$this->load->model('super_admin/school/DepartmentModel');
				$data['departmentInfo'] = $this->DepartmentModel->getDepartmentInfo($DepartmentPostInfo->department_fk_id);
			}
			if($DepartmentPostInfo->branch_fk_id){
				$this->load->model('super_admin/school/BranchModel');
				$data['BranchList'] = $this->BranchModel->getBranchInfo($DepartmentPostInfo->branch_fk_id);	
			}
			$this->load->view('preview/school/department-post-preview-view.php', $data);	
		}	
	}
	public function get_table_data(){
		$searchPhrase = $this->input->post("searchPhrase");
		$Current	= (int)$this->input->post("current");
		$PerPage	= $this->input->post('rowCount') == -1 ? 0 : $this->input->post('rowCount');
		$Offset		= $this->input->post("current")<=1 ? 0 : $this->input->post('rowCount')*($this->input->post("current")-1);
		$DepartmentPostDetails = $this->DepartmentPostModel->getDepartmentPostDetails($PerPage, $Offset);
		$RowsCount = $this->DepartmentPostModel->getDepartmentPostDetailsCount();
		$data	   = array("current"=> $Current, "rowCount"=> count($DepartmentPostDetails), "total"=> $RowsCount,
					"rows"=>$DepartmentPostDetails
					);
		echo json_encode($data);	
	}
	public function data_table(){
		//$data['getDepartmentPostDetails'] = $this->DepartmentPostModel->getDepartmentPostDetails();
		$this->load->view('datatable/school/department-post-data-table-view');
	}
	public function getdepartmentlist(){
		
		$BranchID = $this->input->post('ID');
		if($BranchID){
			$this->load->model('super_admin/school/DepartmentModel');
			$DepartmentList = $this->DepartmentModel->getDepartmentList($BranchID);
			$response = array("subresult" => $DepartmentList,"status"=>true);
		}
		echo json_encode($response);
	}
	public function getdepartmentpostlist(){
		$DepartmentID = $this->input->post('ID');
		if($DepartmentID){
			$DepartmentPostList = $this->DepartmentPostModel->getdepartmentpostlist($DepartmentID);
			$response = array("subsubresult" => $DepartmentPostList,"status"=>true);
		}
		echo json_encode($response);
	}
	public function create(){
		$this->load->model('super_admin/school/BranchModel');
		$data['BranchList'] = $this->BranchModel->getBranchList();
		$this->load->view('create/school/department-post-create-view', $data);
	}
	public function _isDepartmentPostNameExists($key = NULL, $departmentid  = NULL){
		if($key){
			$DepartmentPostName = array('department_posts_name' => $key, 'department_fk_id '=>$departmentid);
			$Result = $this->DepartmentPostModel->checkDepartmentPostName($DepartmentPostName);
			if($Result > 0){
				$this->form_validation->set_message('_isDepartmentPostNameExists', "Department Post Name already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	private function setDataValidation($departmentid){
		$rules = array(
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'departmentid', 
				'label' => 'Department Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'departmentpostname', 
				'label' => 'Department Post Name',
				'rules' => 'trim|required|max_length[100]|callback__isDepartmentPostNameExists['.$departmentid.']|xss_clean'
			),
			array(
				'field' => 'departmentpoststatus', 
				'label' => 'Department Post Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_department_post(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation($this->input->post('departmentid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//DepartmentPostData Info
			$InsertDepartmentPostData = array('department_fk_id' 			=> $departmentid,
											  'branch_fk_id'				=> $branchid,
											  'department_posts_name'		=> $departmentpostname,
											  'department_posts_create_by'	=> $this->MemberID,
											  'department_posts_create_on'	=> date('Y-m-d H:i:s'),
											  'department_posts_status'		=> $departmentpoststatus
											);
			
			$ResultStatus = $this->DepartmentPostModel->createDepartmentPost($InsertDepartmentPostData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Department Post Details Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Department Post Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Department Post Details!');
				$response = array('status' => 2, 'message' => 'Fail To Create Department Post Details!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function update(){
		$DepartmentPostID = $this->input->post('RecID');
		if($DepartmentPostID){
			$data['DepartmentPostInfo'] = $DepartmentPostInfo = $this->DepartmentPostModel->getDepartmentPostInfo($DepartmentPostID);
			
			if($DepartmentPostInfo->branch_fk_id){
				$this->load->model('super_admin/school/DepartmentModel');
				$data['departmentInfo'] = $this->DepartmentModel->getDepartmentList($DepartmentPostInfo->branch_fk_id);
			}
			
			$this->load->model('super_admin/school/BranchModel');
			$data['BranchList'] = $this->BranchModel->getBranchList();
			$this->load->view('modify/school/department-post-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($departmentpostid = NULL, $departmentid){
		$rules = array(
			array(
				'field' => 'departmentpostid', 
				'label' => 'Department Post ID', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'branchid', 
				'label' => 'Branch Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'departmentid', 
				'label' => 'Department Name',
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'departmentpostname', 
				'label' => 'Department Post Name',
				'rules' => 'trim|required|max_length[100]|callback__isModifyDepartmentPostNameExists['. $departmentpostid.'-'.$departmentid.']|xss_clean'
			),
			array(
				'field' => 'departmentpoststatus', 
				'label' => 'Department Post Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function _isModifyDepartmentPostNameExists($DepartmentPostName=NULL, $DepartmentPost_DepartmentID = NULL){
	
		$DeptPostDeptID = explode('-', $DepartmentPost_DepartmentID);
		if($DeptPostDeptID[1])
			$this->db->where('department_fk_id =', $DeptPostDeptID[1]);
		if($DeptPostDeptID[0])
			$this->db->where('department_posts_id !=', $DeptPostDeptID[0]);			
		$this->db->where(array('department_posts_name' => $DepartmentPostName));
		$Status = $this->db->get('school_department_posts');
		
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifyDepartmentPostNameExists', "Department Post Name already Exists!");
			return FALSE;
		} else return TRUE;

	}
	public function update_department_post(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		$rules = $this->setModifyDataValidation($this->input->post('departmentpostid'), $this->input->post('departmentid'));
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//User Info
			
			$UpdateDepartmentPostData = array('branch_fk_id'		   	  => $branchid, 
											 'department_fk_id' 		  => $departmentid,
											 'department_posts_name'   	  => $departmentpostname,
											 'department_posts_modify_by' => $this->MemberID,
											 'department_posts_modify_on' => date('Y-m-d H:i:s'),
											 'department_posts_status'	  => $departmentpoststatus
											);
			$DepartmentPostID  =	array("department_posts_id" => $departmentpostid);
									
			$ResultStatus = $this->DepartmentPostModel->modifyDepartmentPost($UpdateDepartmentPostData, $DepartmentPostID);
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
		$DepartmentPostRecIDS = $this->input->post("recid");
		if(!empty($DepartmentPostRecIDS)){
			$ResultStatus = $this->DepartmentPostModel->deleteDepartmentPost($DepartmentPostRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Department Post Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Department Post Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Department Post Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Department Post Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Department Post Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Department Post Information!');
		}
		echo json_encode($response);
	}
	public function trash(){
		$DepartmentPostRecIDS = $this->input->post("recid");
		if(!empty($DepartmentPostRecIDS)){
			$ResultStatus = $this->DepartmentPostModel->trashDepartmentPost($DepartmentPostRecIDS);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Deleted Department Post Information Successfully!');
				$response = array('status' => true, 
								  'message' => 'Deleted Department Post Information Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Department Post Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Department Post Information!');
			}
		}else{
				$this->session->set_flashdata('error_message', 'Fail To Deleted Department Post Information!');
				$response = array('status' => 2, 'message' => 'Fail To Deleted Department Post Information!');
		}
		echo json_encode($response);
	}
	
	
}