<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StudentModel extends CI_Model {
	
	public function getStudentDetails(){
		$this->db->select("std.*,sig.student_custom_id");
		$this->db->from('student as std');
		$this->db->join('student_signin as sig', 'sig.student_fk_id = std.student_id','INNER');
		return $this->db->get()->result();
	}
	public function createStudent($InsertStudentData = NULL, $InsertStudentLoginData = NULL, $InsertStudentAddress = NULL, $InsertStudentParents = NULL, $StudentClassInfo = NULL){
		if($InsertStudentData && $InsertStudentLoginData && $InsertStudentAddress){
			$this->db->trans_begin();
			$this->db->insert('student', $InsertStudentData);
			$StudentID = $this->db->insert_id();
			$InsertStudentLoginData['student_fk_id'] = $StudentID;
			$this->db->insert('student_signin', $InsertStudentLoginData);
			$StudentClassInfo['student_fk_id'] = $StudentID;
			$this->db->insert('student_class', $StudentClassInfo);
			$InsertStudentAddress[0]['student_fk_id'] = $StudentID;
			$InsertStudentAddress[1]['student_fk_id'] = $StudentID;
			$this->db->insert_batch('student_address', $InsertStudentAddress);
			$InsertStudentParents[0]['student_fk_id'] = $StudentID;
			$InsertStudentParents[1]['student_fk_id'] = $StudentID;
			$InsertStudentParents[2]['student_fk_id'] = $StudentID;
			$this->db->insert_batch('student_parents', $InsertStudentParents);
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){
					$this->db->trans_rollback();
					return FALSE;
				}else{
					$this->db->trans_commit();
					return TRUE;
				}
		}return FALSE;

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
	public function getStudentSignInfo($StudentID = NULL){
		if($StudentID){
			$this->db->where('student_fk_id', $StudentID);
			return $this->db->get('student_signin')->row();
		}return false;	
	}
	public function getStudentInfo($StudentID = NULL){
		if($StudentID){
			$this->db->select('sig.student_email, sig.student_custom_id, std.*');
			$this->db->from("student as std");
			$this->db->join("student_signin as sig", "sig.student_fk_id = std.student_id", "INNER");
			$this->db->where('std.student_id', $StudentID);
			return $this->db->get()->row();
		}return false;	
	}
	public function getStudentPersonalInfo($StudentID = NULL){
		if($StudentID){
			$this->db->where('student_fk_id', $StudentID);
			return $this->db->get('student_parents')->result();
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
	public function modifyStudent($UpdateStudentData, $UpdateStudentLoginData, $UpdateStudentAddress){
		
	}
	public function createStudentPreviousSchoolData($InsertStudentPreviousSchoolData = NULL){
		if($InsertStudentPreviousSchoolData){
			return $this->db->insert("student_previous_academic_details", $InsertStudentPreviousSchoolData);
		}return false;
	}
	public function checkStudentPreviousSchoolExists($StudentPreviousID = NULL){
		if($StudentPreviousID){
			$this->db->select('count(*) as student_status');
			$this->db->where($StudentPreviousID);
			$Result = $this->db->get('student_previous_academic_details')->row();
			if($Result->student_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function createStudentAttachmentsData($InsertStudentAttachmentsData = NULL){
		if($InsertStudentAttachmentsData){
			return $this->db->insert_batch("student_documents", $InsertStudentAttachmentsData);
		}return false;
	}
}