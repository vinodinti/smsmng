<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StudentModel extends CI_Model {
	
	public function getStudentDetails($PerPage = 0, $Offset =0){
		if($PerPage)
			$this->db->limit($PerPage, $Offset);
		$this->db->select("stdu.*, CONCAT(student_first_name,' ',student_middle_name,' ',student_last_name) as full_name , stdsig.student_email, stdsig.student_custom_id, r1.school_batch_id, r1.school_batch_value, r1.class_id, r1.class_name, r1.section_id, r1.section_name, r1.branch_name, stdu.student_status as record_status");
		$this->db->from("student as stdu");
		$this->db->join("student_signin as stdsig", " stdsig.student_fk_id = stdu.student_id", "INNER");
		$this->db->join('(SELECT  stdcls. student_fk_id, btch.school_batch_id, btch.school_batch_value, cls.class_id, cls.class_name, sect.section_id, sect.section_name, brch.branch_name
		FROM scmngs_student_class  as stdcls
		INNER JOIN scmngs_school_branch as brch ON brch.branch_id = stdcls.branch_fk_id
		INNER JOIN scmngs_school_batch as btch ON btch.school_batch_id=stdcls.school_batch_fk_id
		INNER JOIN scmngs_school_branch_class as cls ON cls.class_id=stdcls.class_fk_id
		INNER JOIN scmngs_school_branch_class_section as sect ON sect.section_id=stdcls.section_fk_id
		Order by stdcls.student_class_id desc limit 1) as r1', 'r1.student_fk_id = stdu.student_id', 'LEFT');
		$this->db->where(array("stdu.student_status"=>0,"stdu.student_status"=>1));
		$this->db->order_by("stdu.student_id", "DESC");
	return	$this->db->get("")->result();
		
		/*$this->db->select("std.*,sig.student_custom_id");
		$this->db->from('student as std');
		$this->db->join('student_signin as sig', 'sig.student_fk_id = std.student_id','INNER');
		return $this->db->get()->result();*/
	}
	public function getStudentDetailsCount(){
				$this->db->select("count(student_id) as rowcount");
			    $this->db->where(array("student_status"=>0, "student_status"=>1));
		return  $this->db->get('student')->row()->rowcount;
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
	public function getStudentClassInfo($StudentID = NULL){
		if($StudentID){
			$this->db->where('student_fk_id', $StudentID);
			$this->db->order_by('student_class_id', 'DESC');
			return $this->db->get('student_class')->row();
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
	public function modifyStudent($studentid = NULL, $UpdateStudentData = NULL, $UpdateStudentParent = NULL, $UpdateStudentLoginData = NULL, $UpdateStudentAddress = NULL, $UpdateStudentClassData = NULL){
		if($studentid){
			$this->db->trans_begin();
			$this->db->set($UpdateStudentData);
			$this->db->update('student',array('student_id' => $studentid));
			$this->db->set($UpdateStudentLoginData);
			$this->db->update('student_signin', array('student_fk_id' => $studentid));
			$this->db->set($UpdateStudentClassData);
			$this->db->where('student_class_id', $UpdateStudentClassData['student_class_id']);
			$this->db->update('student_class');
			$this->db->update_batch('student_parents', $UpdateStudentParent, "parents_id");
			$this->db->update_batch('student_address', $UpdateStudentAddress, "student_address_id");
			$this->db->trans_complete();
			if($this->db->trans_status() === FALSE){
					$this->db->trans_rollback();
					return FALSE;
				}else{
					$this->db->trans_commit();
					return TRUE;
				}
		}return false;
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
	public function deleteStudent($StudentRecIDS = NULL){
		if($StudentRecIDS){
				$this->db->set("student_status", 2);
				$this->db->where_in("student_id", $StudentRecIDS);
		return	$this->db->update("student");	
		}return false;
	}
	public function trashStudent($StudentRecIDS = NULL){
		if($StudentRecIDS){
				$this->db->where_in("student_id", $StudentRecIDS);
		return  $this->db->delete("student");		
		}return false;
	}
	
}