<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModule extends CI_Model {
	
	public function getUserModuleList($MemberID = NULL){
		if($MemberID){
				$this->db->select('rules.module_attribute_fk_id');
				$this->db->from('scmngs_user_role as role');
				$this->db->join('scmngs_rules as rules', 'rules.role_fk_id = role.role_fk_id', 'INNER');
				$this->db->where(array('user_fk_id'=>$MemberID));
			$Result = $this->db->get()->row();
				if($Result->module_attribute_fk_id){
					$this->db->select('module_attribute_id as ModuleAttributeId, module_name as ModuleName, module_attribute_fk_id as ModuleAttributeFkId, module_img as ModuleImg, module_attribute_status as ModuleAttributeStatus');
					$this->db->where_in('module_attribute_id', explode(",",$Result->module_attribute_fk_id));
					return $this->db->get('module_attribute')->result();
				}return false;
	 
			}return FALSE;
	}
	public function getSchoolID(){
			   $this->db->select('school_id');
		return $this->db->get('school')->row()->school_id;
	}
	public function getRecordCreatedBy($CtreatedPersonID = NULL){
		if($CtreatedPersonID){
			return $this->db->query("SELECT IF(CONCAT(admin.firstname,' ',admin.lastname) !='', CONCAT(admin.firstname,' ',admin.lastname), CONCAT(emp.employee_first_name,' ',emp.employee_last_name)) AS record_create_person_name FROM `scmngs_record_activity` as recact
			LEFT JOIN scmngs_admin as admin ON admin.record_activity_fk_id = recact.record_activity_id
			LEFT JOIN scmngs_employee as emp ON emp.record_activity_fk_id = recact.record_activity_id
			WHERE recact.record_activity_id = '".$CtreatedPersonID."'")->row()->record_create_person_name;
		}return FALSE;
	}
	
}