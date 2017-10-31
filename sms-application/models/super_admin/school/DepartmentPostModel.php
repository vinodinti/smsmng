<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DepartmentPostModel extends CI_Model {
	
	public function getDepartmentPostDetails($PerPage = 0, $Offset =0){
				if($PerPage)
					$this->db->limit($PerPage, $Offset);
				$this->db->select("*, department_posts_status as record_status");
				$this->db->from("school_department_posts as deptpost");
				$this->db->join('school_department as dept', 'dept.department_id=deptpost.department_fk_id', 'INNER');
				$this->db->where(array("department_posts_status"=>0,"department_posts_status"=>1));
				$this->db->order_by("deptpost.department_posts_id", "DESC"); 
		return  $this->db->get('')->result();
	}
	public function getDepartmentPostDetailsCount(){
				$this->db->select("count(department_posts_id) as rowcount");
			    $this->db->where(array("department_posts_status"=>0,"department_posts_status"=>1));
		return  $this->db->get('school_department_posts')->row()->rowcount;
	}
	public function createDepartmentPost($InsertDepartmentPostData = NULL){
		if($InsertDepartmentPostData){
			return $this->db->insert('school_department_posts', $InsertDepartmentPostData);
		}return false;
	}
	public function checkDepartmentPostName($DepartmentPostName){
		if($DepartmentPostName){
			$this->db->select('count(*) as department_post_status');
			$this->db->where($DepartmentPostName);
			$Result = $this->db->get('school_department_posts')->row();
			if($Result->department_post_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getDepartmentPostInfo($DepartmentPostID = NULL){
		if($DepartmentPostID){
				   $this->db->where(array('department_posts_id' => $DepartmentPostID));
			return $this->db->get('school_department_posts')->row();
		}return false;
	}
	public function getdepartmentpostlist($DepartmentID = NULL){
		if($DepartmentID){
				   $this->db->select('department_posts_id, department_posts_name');
				   $this->db->where(array('department_fk_id' => $DepartmentID));
			return $this->db->get('school_department_posts')->result();
		}return false;
		
	}
	public function modifyDepartmentPost($UpdateDepartmentPostData, $DepartmentPostID){
		if($DepartmentPostID){
				   $this->db->where($DepartmentPostID);
			return $this->db->update('school_department_posts', $UpdateDepartmentPostData);
		}return false;
	}
	public function deleteDepartmentPost($DepartmentPostRecIDS = NULL){
		if($DepartmentPostRecIDS){
				$this->db->set("department_posts_status", 2);
				$this->db->where_in("department_posts_id", $DepartmentPostRecIDS);
		return	$this->db->update("school_department_posts");	
		}return false;
	}
	public function trashDepartmentPost($DepartmentPostRecIDS = NULL){
		if($DepartmentPostRecIDS){
				$this->db->where_in("department_posts_id", $DepartmentPostRecIDS);
		return  $this->db->delete("school_department_posts");		
		}return false;
	}
	
}