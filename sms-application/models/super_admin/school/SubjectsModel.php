<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SubjectsModel extends CI_Model {
	
	public function getSubjectDetails($PerPage = 0, $Offset = 0){
		if($PerPage)
			$this->db->limit($PerPage, $Offset);
		$this->db->select("*, subject_status as record_status");
		$this->db->where(array("subject_status"=>0, "subject_status"=>1));
		$this->db->order_by("subject_id", "DESC"); 
		return $this->db->get('school_subjects')->result();
	}
	public function getSubjectDetailsCount(){
			$this->db->select("count(subject_id) as rowcount");
			$this->db->where(array("subject_status"=>0,"subject_status"=>1));
		return  $this->db->get('school_subjects')->row()->rowcount;
	}
	public function createSubject($InsertSubjectData = NULL){
		if($InsertSubjectData){
			return $this->db->insert('school_subjects', $InsertSubjectData);
		}return FALSE;
	}
	public function checkSubjectName($SubjectName = NULL){
		if($SubjectName){
					  $this->db->select('count(*) as section_status');
					  $this->db->where($SubjectName);
			$Result = $this->db->get('school_subjects')->row();
			if($Result->section_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getSubjectInfo($SubjectID = NULL){
		if($SubjectID){
			$this->db->where('subject_id', $SubjectID);
			return $this->db->get('school_subjects')->row();
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
	public function modifySubject($UpdateSubjectData = NULL, $SubjectID = NULL){
			if($SubjectID){
				   $this->db->where($SubjectID);
			return $this->db->update('school_subjects', $UpdateSubjectData);
		}return false;
	}
	public function getSubjectsList(){
		$this->db->select("subject_id, subject_name"); 
		return $this->db->get('school_subjects')->result();	
	}
	public function deleteSubjects($SubjectRecIDS = NULL){
		if($SubjectRecIDS){
				$this->db->set("subject_status", 2);
				$this->db->where_in("subject_id", $SubjectRecIDS);
		return	$this->db->update("school_subjects");	
		}return false;
	}
	public function trashSubjects($SubjectRecIDS = NULL){
		if($SubjectRecIDS){
				$this->db->where_in("subject_id", $SubjectRecIDS);
		return  $this->db->delete("school_subjects");		
		}return false;
	}
	
}