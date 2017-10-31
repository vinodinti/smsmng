<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SettingsModel extends CI_Model {
	
	public function getRole(){
		
		$this->db->select("role.*, CONCAT((user.firstname),(' '),(user.lastname)) as create_by");
		$this->db->from('roles as role');
		$this->db->join('admin as user', 'user.user_id = role.role_create_by', 'inner'); 
		return $this->db->get()->result();	
		
	}
	public function createRole($InsertRoleData = NULL){
		if($InsertRoleData){
			return $this->db->insert('roles', $InsertRoleData);
		}return false;
	}
	public function checkRoleName($RoleName = NULL){
		if($RoleName){
			$this->db->select('count(*) as role_status');
			$this->db->where($RoleName);
			$Result = $this->db->get('roles')->row();
			if($Result->role_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getRoleInfo($RoleID = NULL){
		if($RoleID){
			   $this->db->where(array("role_id"=>$RoleID));
		return $this->db->get('roles')->row();
		}return false;
	}
	public function modifyRole($UpdateRoleData = NULL, $role_id = NULL){
		if($role_id){
				$this->db->where('role_id',$role_id);
		return	$this->db->update('roles',$UpdateRoleData);
		}return false;
	}
	public function getRoleModules(){
		return $this->db->get('module_attribute')->result();
	}
	public function createRuleModule($InsertRuleModuleData=NULL){
		if($InsertRuleModuleData){
			return $this->db->insert("rules", $InsertRuleModuleData);
		}return FALSE;
	}
	public function checkModuleRule($RuleID=NULL){
		if($RuleID){
			$this->db->select('count(*) as rule_status');
			$this->db->where($RuleID);
			$Result = $this->db->get('rules')->row();
			if($Result->rule_status){
				return true;
			}return false;
		}return FALSE;
	}
	
}