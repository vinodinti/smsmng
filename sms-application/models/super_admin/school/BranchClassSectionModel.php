<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BranchClassSectionModel extends CI_Model {
	
	public function getSectionDetails($PerPage = 0, $Offset = 0){
		if($PerPage)
				$this->db->limit($PerPage, $Offset);
		$this->db->select("sect.*,cls.class_id,cls.class_name,brch.branch_id,brch.branch_name, sect.section_status as record_status");
		$this->db->from("school_branch_class_section as sect");
		$this->db->join("school_branch_class as cls", "cls.class_id=sect.class_fk_id", "INNER");
		$this->db->join("school_branch as brch", "brch.branch_id=cls.branch_fk_id", "INNER");
		$this->db->where(array("sect.section_status"=>0,"sect.section_status"=>1));
		$this->db->order_by("sect.section_id", "DESC"); 
		return $this->db->get('')->result();	
	}
	public function getSectionDetailsCount(){
			$this->db->select("count(section_id) as rowcount");
			$this->db->where(array("section_status"=>0,"section_status"=>1));
		return  $this->db->get('school_branch_class_section')->row()->rowcount;
	}
	public function createSection($InsertSectionData = NULL){
		if($InsertSectionData){
			return $this->db->insert('school_branch_class_section', $InsertSectionData);
		}return FALSE;
	}
	public function checkSectionName($BranchClassSectionName = NULL){
		if($BranchClassSectionName){
					  $this->db->select('count(*) as section_status');
					  $this->db->where($BranchClassSectionName);
			$Result = $this->db->get('school_branch_class_section')->row();
			if($Result->section_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getSectionInfo($SectionID = NULL){
		if($SectionID){
			$this->db->from('school_branch_class_section as sec');
			$this->db->join('school_branch_class as cls', 'cls.class_id = sec.class_fk_id', 'INNER');
			$this->db->where('sec.section_id', $SectionID);
			return $this->db->get()->row();
		}return false;	
	}
	public function getStudentAddressInfo($StudentID = NULL){
		if($StudentID){
			$this->db->where('student_fk_id', $StudentID);
			return $this->db->get('student_address')->result();
		}return false;	
	}
	public function getStudentDocumentInfo($StudentID = NULL){
		if($StudentID){
			$this->db->where('student_fk_id', $StudentID);
			return $this->db->get('student_documents')->result();
		}return false;	
	}
	public function checkStudentCustomID($StudentCustomID = NULL){
		if($StudentCustomID){
			$this->db->select('count(*) as student_status');
			$this->db->where($StudentCustomID);
			$Result = $this->db->get('student_signin')->row();
			if($Result->student_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function checkStudentEmailID($StudentEmailID = NULL){
		if($StudentEmailID){
			$this->db->select('count(*) as student_status');
			$this->db->where($StudentEmailID);
			$Result = $this->db->get('student_signin')->row();
			if($Result->student_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getStudentCustomID(){
				$this->db->select('@last_id := IF(ISNULL(MAX(student_fk_id)), 1, MAX(student_fk_id)+1) AS student_custom_id');
		$Result = $this->db->get('student_signin')->row()->student_custom_id;
		if($Result){
			return $Result;
		}return false;	 
	}
	public function modifySection($UpdateSectionData = NULL, $SectionID = NULL){
			if($SectionID){
				   $this->db->where($SectionID);
			return $this->db->update('school_branch_class_section', $UpdateSectionData);
		}return false;
	}
	public function getSectionList($ClassID = NULL){
		if($ClassID){
				   $this->db->select('section_id, section_name');
				   $this->db->where('class_fk_id', $ClassID);
			return $this->db->get('school_branch_class_section')->result();
		}return false;
	}
	public function deleteBranchClass($SectionRecIDS = NULL){
		if($SectionRecIDS){
				$this->db->set("section_status", 2);
				$this->db->where_in("section_id", $SectionRecIDS);
		return	$this->db->update("school_branch_class_section");	
		}return false;
	}
	public function trashBranchClass($SectionRecIDS = NULL){
		if($SectionRecIDS){
				$this->db->where_in("section_id", $SectionRecIDS);
		return  $this->db->delete("school_branch_class_section");		
		}return false;
	}
	
}