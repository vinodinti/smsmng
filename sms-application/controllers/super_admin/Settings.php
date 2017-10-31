<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{
	public $CI = NULL;
	
	public function __construct(){
		parent::__construct();
		AutoRouting();
		$this->MemberID = $this->userinfo->getMemberId();
		$this->load->model('super_admin/SettingsModel');
		
		$this->CI = & get_instance();
	}
	public function index(){
		
		$data['body_content']	= 'settings-view';
		$this->load->view('template', $data);
	}
	public function setting_data_table(){
		
		return $this->SettingsModel->getRole();	
	}
	private function setDataValidation(){
		$rules = array(
			array(
				'field' => 'role_name', 
				'label' => 'Role Name', 
				'rules' => 'trim|required|max_length[30]|callback__isRoleNameExists|xss_clean'
			), 
			array(
				'field' => 'role_status', 
				'label' => 'Role Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_role(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		
		$rules = $this->setDataValidation();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//User Info
			$InsertRoleData = array('role_name'		 => $role_name,
									'role_create_on' => date('Y-m-d H:i:s'),
									'role_create_by' => $this->MemberID,
									'role_status'	 => $role_status
									);
			$ResultStatus = $this->SettingsModel->createRole($InsertRoleData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Role Name Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Role Name Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Role Name!');
				$response = array('status' => 2, 'message' => 'Fail To Create Role Name!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function _isRoleNameExists($key = NULL){
		if($key){
			$RoleName = array('role_name'=>$key);
			$Result = $this->SettingsModel->checkRoleName($RoleName);
			if($Result > 0){
				$this->form_validation->set_message('_isRoleNameExists', "RoleName already Exists!");
				return FALSE;
			}return TRUE;
		}
	}
	public function create(){
		$this->load->view('create/settings/settings-create-view');
	}
	public function update(){
		$RoleID = $this->input->post('RecID');
		if($RoleID){
			$data['roleInfo'] = $this->SettingsModel->getRoleInfo($RoleID);
			$this->load->view('modify/settings/settings-modify-view', $data);	
		}
	}
	private function setModifyDataValidation($role_id = NULL){
		$rules = array(
			array(
				'field' => 'role_id', 
				'label' => 'Role ID', 
				'rules' => 'trim|required|max_length[10]|xss_clean'
			),
			array(
				'field' => 'role_name', 
				'label' => 'Role Name', 
				'rules' => 'trim|required|max_length[30]|callback__isModifyRoleNameExists['. $role_id .']|xss_clean'
			), 
			array(
				'field' => 'role_status', 
				'label' => 'Role Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function update_role(){
		$this->load->library('form_validation');
		$this->load->helper('security');
		extract($this->security->xss_clean($_POST));
		$rules = $this->setModifyDataValidation($role_id);
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//User Info
			$UpdateRoleData = array('role_name'		 => $role_name,
									'role_modify_on' => date('Y-m-d H:i:s'),
									'role_modify_by' => $this->MemberID,
									'role_status'	 => $role_status
									);
			$ResultStatus = $this->SettingsModel->modifyRole($UpdateRoleData, $role_id);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Updated Role Name Successfully!');
				$response = array('status' => true, 
								  'message' => 'Updated Role Name Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Updated Role Name!');
				$response = array('status' => 2, 'message' => 'Fail To Updated Role Name!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
	}
	public function _isModifyRoleNameExists($RoleName=NULL, $RoleID = NULL){
		if($RoleID)
			$this->db->where('role_id !=', $RoleID);			
		$this->db->where(array('role_name' => $RoleName));
		$Status = $this->db->get('roles');
		if($Status->num_rows() > 0){
			$this->form_validation->set_message('_isModifyRoleNameExists', "Role Name already Exists!");
			return FALSE;
		} else return TRUE;
	}
	public function get_access_module(){
		$RoleID = $this->input->post('id');
		$RoleName = $this->input->post('name');
		if($RoleID){
			$data['roleid'] = $RoleID;
			$data['rolename'] = $RoleName;
			$data['rolemodules'] = $this->SettingsModel->getRoleModules();
		$this->load->view('create/settings/settings-create-access-module', $data);		
		}
	}
	private function setModuleValidation($modulename, $RoleName){
		$rules = array(
			array(
				'field' => 'roleid', 
				'label' => 'Role ID', 
				'rules' => 'trim|max_length[10]|xss_clean|callback__isModuleRuleExists['. $RoleName .']'
			),
			array(
				'field' => $modulename, 
				'label' => 'Module Name', 
				'rules' => 'trim|required|xss_clean'
			), 
			array(
				'field' => 'rulestatus', 
				'label' => 'Rule Status',
				'rules' => 'trim|required|max_length[1]|xss_clean'
			)
		);
		return $rules;
	}
	public function create_access_module(){
		
		$this->load->library('form_validation');
		$this->load->helper('security');
		extract($_POST);
		if(isset($modulename)){
			$modulename=$modulename;
		}else{
			$modulename="modulename";
		}
		$rules = $this->setModuleValidation($modulename, $rolename);
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() !== false){
			extract($this->security->xss_clean($_POST));
			//User Info
			$InsertRuleModuleData = array('role_fk_id'		 	   => $roleid,
										  'module_attribute_fk_id' => implode($modulename,","),
										  'rule_create_on' 		   => date('Y-m-d H:i:s'),
										  'rule_create_by' 		   => $this->MemberID,
										  'rule_status'	 		   => $rulestatus);
			$ResultStatus = $this->SettingsModel->createRuleModule($InsertRuleModuleData);
			if($ResultStatus){
				$this->session->set_flashdata('success_message', 'Created Role Name Successfully!');
				$response = array('status' => true, 
								  'message' => 'Created Role Name Successfully!',
								  //'redirect'=> base_url().'credentials/super_admin/signin'
								);
			}else{
				$this->session->set_flashdata('error_message', 'Fail To Create Role Name!');
				$response = array('status' => 2, 'message' => 'Fail To Create Role Name!');
			}
			
		} else {
			$response['errors'] = $this->form_validation->error_array();
		}
    	echo json_encode($response);
		
	}
	public function _isModuleRuleExists($key = NULL, $RoleName = NULL){
		if($key){
			$RuleID = array('role_fk_id'=>$key);
			$Result = $this->SettingsModel->checkModuleRule($RuleID);
			if($Result > 0){
				$this->form_validation->set_message('_isModuleRuleExists', "Modules are already Existed to ".$RoleName.".");
				return FALSE;
			}return TRUE;
		}
	}
	
}