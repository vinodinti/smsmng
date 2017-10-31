<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BranchClassModel extends CI_Model {
	
	public function getClassDetails($PerPage = 0, $Offset = 0){
		if($PerPage)
				$this->db->limit($PerPage, $Offset);
		$this->db->select("brch_class.*,brch.*,brch_class.class_status as record_status");
		$this->db->from("school_branch_class as brch_class");
		$this->db->join("school_branch as brch","brch.branch_id=brch_class.branch_fk_id");
		$this->db->where(array("brch_class.class_status"=>0,"brch_class.class_status"=>1));
		$this->db->order_by("brch_class.branch_fk_id", "DESC");
		return $this->db->get('')->result();
	}
	public function getClassDetailsCount(){
			$this->db->select("count(class_id) as rowcount");
			$this->db->where(array("class_status"=>0,"class_status"=>1));
		return  $this->db->get('school_branch_class')->row()->rowcount;
	}
	public function createClass($InsertClassData = NULL){
		if($InsertClassData){
			return $this->db->insert('school_branch_class', $InsertClassData);
		}return FALSE;
	}
	public function checkClassName($ClassBranchName = NULL){
		if($ClassBranchName){
					  $this->db->select('count(*) as class_status');
					  $this->db->where($ClassBranchName);
			$Result = $this->db->get('school_branch_class')->row();
			if($Result->class_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getClassInfo($ClassID = NULL){
		if($ClassID){
			$this->db->where('class_id', $ClassID);
			return $this->db->get('school_branch_class')->row();
		}return false;	
	}
	public function modifyClass($UpdateClassData = NULL, $ClassID = NULL){
			if($ClassID){
				   $this->db->where($ClassID);
			return $this->db->update('school_branch_class', $UpdateClassData);
		}return false;
	}
	public function getClassList($BranchID = NULL){
		if($BranchID){
				  $this->db->select('class_id, class_name');
				  $this->db->where('branch_fk_id', $BranchID);
		$Result = $this->db->get('school_branch_class')->result();
			if($Result){
				return $Result;
			}return false;
		}return false;	 
	}
	public function deleteBranchClass($BranchClassRecIDS = NULL){
		if($BranchClassRecIDS){
				$this->db->set("class_status", 2);
				$this->db->where_in("class_id", $BranchClassRecIDS);
		return	$this->db->update("school_branch_class");	
		}return false;
	}
	public function trashBranchClass($BranchClassRecIDS = NULL){
		if($BranchClassRecIDS){
				$this->db->where_in("class_id", $BranchClassRecIDS);
		return  $this->db->delete("school_branch_class");		
		}return false;
	}
	
}