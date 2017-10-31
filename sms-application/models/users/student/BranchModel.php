<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BranchModel extends CI_Model {
	
	public function getBranchDetails(){	
			   $this->db->order_by("branch_id", "DESC"); 
		return $this->db->get('school_branch')->result();		
	}
	public function createBranch($InsertBranchData = NULL){
		if($InsertBranchData){
			return $this->db->insert('school_branch', $InsertBranchData);
		}return false;
	}
	public function checkBranchName($BranchName = NULL){
		if($BranchName){
			$this->db->select('count(*) as branch_status');
			$this->db->where($BranchName);
			$Result = $this->db->get('school_branch')->row();
			if($Result->branch_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getBranchInfo($BranchID=NULL){
		if($BranchID){
				   $this->db->where(array('branch_id'=>$BranchID));
			return $this->db->get('school_branch')->row();
		}return false;
	}
	public function modifyBranch($UpdateBranchData = NULL, $BranchID = NULL){
		if($BranchID){
				   $this->db->where($BranchID);
			return $this->db->update('school_branch', $UpdateBranchData);
		}return false;
	}
	public function getBranchList(){
		return $this->db->get('school_branch')->result();		
	}
	
}