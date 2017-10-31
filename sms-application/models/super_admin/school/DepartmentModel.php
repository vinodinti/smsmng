<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DepartmentModel extends CI_Model {
	
	public function getDepartmentDetails($PerPage=0, $Offset=0){	
			if($PerPage)
				$this->db->limit($PerPage, $Offset);
			$this->db->select("dept.*, branch.*, dept.department_status as record_status");
			$this->db->from("school_department as dept");
			$this->db->join('school_branch as branch', 'branch.branch_id=dept.branch_fk_id', 'INNER');
			$this->db->where(array("dept.department_status"=>0, "dept.department_status"=>1));
			$this->db->order_by("dept.department_id", "DESC"); 
	return  $this->db->get('')->result();	
	}
	public function getDepartmentDetailsCount(){
				$this->db->select("count(department_id) as rowcount");
			    $this->db->where(array("department_status"=>0,"department_status"=>1));
		return  $this->db->get('school_department')->row()->rowcount;
	}
	public function createDepartment($InsertDepartmentData = NULL){
		if($InsertDepartmentData){
			return $this->db->insert('school_department', $InsertDepartmentData);
		}return false;
	}
	public function checkDepartmentName($DepartmentName = NULL){
		if($DepartmentName){
			$this->db->select('count(*) as department_status');
			$this->db->where($DepartmentName);
			$Result = $this->db->get('school_department')->row();
			if($Result->department_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getDepartmentInfo($DepartmentID = NULL){
		if($DepartmentID){
				   $this->db->join('school_branch', 'branch_id=branch_fk_id', 'INNER');
				   $this->db->where(array('department_id' => $DepartmentID));
			return $this->db->get('school_department')->row();
		}return false;
	}
	public function modifyDepartment($UpdateDepartmentData = NULL, $DepartmentID = NULL){
		if($DepartmentID){
				   $this->db->where($DepartmentID);
			return $this->db->update('school_department', $UpdateDepartmentData);
		}return false;
	}
	public function getDepartmentList($BranchID = NULL){
		if($BranchID){
				   $this->db->select('department_id, department_name');
				   $this->db->where(array('branch_fk_id' => $BranchID));
			return $this->db->get('school_department')->result();
		}return false;
	}
	public function deleteDepartment($DepartmentRecIDS = NULL){
		if($DepartmentRecIDS){
				$this->db->set("department_status", 2);
				$this->db->where_in("department_id", $DepartmentRecIDS);
		return	$this->db->update("school_department");	
		}return false;
	}
	public function trashDepartment($DepartmentRecIDS = NULL){
		if($DepartmentRecIDS){
				$this->db->where_in("department_id", $DepartmentRecIDS);
		return  $this->db->delete("school_department");		
		}return false;	
	}
	
}