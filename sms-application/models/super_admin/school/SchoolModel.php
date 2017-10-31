<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SchoolModel extends CI_Model {
	
	public function getSchoolDetails(){
		
		$this->db->select("sch.*, branch.*");
		$this->db->from('school as sch');
		$this->db->join('school_branch as branch', 'branch.branch_type = "M"', 'inner');
		return $this->db->get()->result();	
		
	}
	public function createBranch($InsertRoleData = NULL){
		if($InsertRoleData){
			return $this->db->insert('roles', $InsertRoleData);
		}return false;
	}
	public function checkBranchName($RoleName = NULL){
		if($RoleName){
			$this->db->select('count(*) as role_status');
			$this->db->where($RoleName);
			$Result = $this->db->get('roles')->row();
			if($Result->role_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getSchoolInfo($SchoolID=NULL){
		if($SchoolID){
			$this->db->select("sch.*, branch.*");
			$this->db->from('school as sch');
			$this->db->join('school_branch as branch', 'branch.branch_type = "M"', 'inner');
			$this->db->where('sch.school_id', $SchoolID);
			return $this->db->get()->row();
		}return false;
	}
	public function modifySchool($UpdateSchoolData = NULL, $SchoolBranchData = NULL, $SchooBranchID = NULL){	
		if($SchooBranchID['schoolID']){
					  $this->db->where("school_id", $SchooBranchID['schoolID']);
			$Result = $this->db->update("school", $UpdateSchoolData);
				if($SchooBranchID['branchID'] && $Result){
					$this->db->where("branch_id", $SchooBranchID['branchID']);
			$Result = $this->db->update("school_branch", $SchoolBranchData);
				}
			return $Result;	
		}return false;
	}

	
}