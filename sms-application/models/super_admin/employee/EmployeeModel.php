<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmployeeModel extends CI_Model {
	
	public function getEmployeeDetails($PerPage = 0, $Offset = 0){
		if($PerPage)
			$this->db->limit($PerPage, $Offset);
		$this->db->select("emp.*,CONCAT(emp.employee_first_name,' ',emp.employee_middle_name,' ',emp.employee_last_name) as full_name, emp.employee_is_status as record_status, emp_sign.employee_email, emp_sign.employee_custom_id, brch.branch_name, dept.department_name, deptpost.department_posts_name");
		$this->db->from("employee as emp");
		$this->db->join("employee_signin as emp_sign", "emp_sign.employee_fk_id=emp.employee_id", "INNER");
		$this->db->join("scmngs_school_branch as brch", "brch.branch_id = emp.branch_fk_id");
		$this->db->join("school_department as dept", "dept.department_id=emp.department_fk_id", "LEFT");
		$this->db->join("school_department_posts as deptpost", "deptpost.department_posts_id=emp.department_posts_fk_id", "LEFT");
		$this->db->where(array("emp.employee_is_status"=>0, "emp.employee_is_status"=>1));
		$this->db->order_by("emp.employee_id", "DESC");
		return $this->db->get()->result();
	}
	public function getEmployeeDetailsCount(){
		$this->db->select("count(employee_id) as rowcount");
			    $this->db->where(array("employee_is_status"=>0,"employee_is_status"=>1));
		return  $this->db->get('employee')->row()->rowcount;
	}
	public function createEmployee($InsertEmployeeData = NULL, $InsertEmployeeLoginData = NULL, $InsertEmployeeAddress = NULL, $subjects = NULL){
		if($InsertEmployeeData && $InsertEmployeeLoginData && $InsertEmployeeAddress){
			$this->db->trans_begin();
			$this->db->insert('record_activity', array('record_activity_id'=>''));
			$RecordID = $this->db->insert_id();
			$InsertEmployeeData['record_activity_fk_id'] = $RecordID;
			$this->db->insert('employee', $InsertEmployeeData);
			$EmployeeID = $this->db->insert_id();
			
			if($subjects){
				foreach($subjects as $subject){
					$InsertEmployeeSubjects[]	=	array("subject_fk_id"=>$subject,
														  "employee_fk_id"=>$EmployeeID,
														  "employee_subject_status"=>1
													);
				}
			$this->db->insert_batch('employee_subject', $InsertEmployeeSubjects);
			}
			$InsertEmployeeLoginData['employee_fk_id'] = $EmployeeID;
			$this->db->insert('employee_signin', $InsertEmployeeLoginData);
			$InsertEmployeeAddress[0]['employee_fk_id'] = $EmployeeID;
			$InsertEmployeeAddress[1]['employee_fk_id'] = $EmployeeID;
			$this->db->insert_batch('employee_address', $InsertEmployeeAddress);
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
	public function getEmployeeSignInfo($EmployeeID = NULL){
		if($EmployeeID){
			$this->db->where('employee_fk_id', $EmployeeID);
			return $this->db->get('employee_signin')->row();
		}return false;	
	}
	public function getEmployeeInfo($EmployeeID = NULL){
		if($EmployeeID){
			$this->db->where('employee_id', $EmployeeID);
			return $this->db->get('employee')->row();
		}return false;	
	}
	public function getEmployeeAddressInfo($EmployeeID = NULL){
		if($EmployeeID){
			$this->db->where('employee_fk_id', $EmployeeID);
			return $this->db->get('employee_address')->result();
		}return false;	
	}
	public function getEmployeeDocumentInfo($EmployeeID = NULL){
		if($EmployeeID){
			$this->db->where('employee_fk_id', $EmployeeID);
			return $this->db->get('employee_documents')->result();
		}return false;	
	}
	public function checkEmployeeCustomID($EmployeeCustomID = NULL ){
		if($EmployeeCustomID){
			$this->db->select('count(*) as employee_status');
			$this->db->where($EmployeeCustomID);
			$Result = $this->db->get('employee_signin')->row();
			if($Result->employee_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function checkEmployeeEmailID($EmployeeEmailID){
		if($EmployeeEmailID){
			$this->db->select('count(*) as employee_status');
			$this->db->where($EmployeeEmailID);
			$Result = $this->db->get('employee_signin')->row();
			if($Result->employee_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getEmployeeCustomID(){
				  $this->db->select('@last_id := IF(ISNULL(MAX(employee_fk_id)), 1, MAX(employee_fk_id)+1) AS employee_custom_id');
		$Result = $this->db->get('scmngs_employee_signin')->row()->employee_custom_id;
		if($Result){
			return $Result;
		}return false;	 
	}
	public function getEmployeeAssignSubjects($SubjectID = NULL){
		if($SubjectID){
			$this->db->select("emp.employee_id, CONCAT(emp.employee_first_name,' ',emp.employee_middle_name,' ', emp.employee_last_name) as employee_full_name");
			$this->db->from("employee_subject as empsub");
			$this->db->join("employee as emp", "emp.employee_id=empsub.employee_fk_id", "INNER");
			$this->db->join("school_subjects as sub", "sub.subject_id=empsub.subject_fk_id","INNER");
			$this->db->where("sub.subject_id", $SubjectID);
			$Result = $this->db->get('')->result();
			return $Result;
		}return false;	 
	}
	public function deleteEmployee($EmployeeRecIDS = NULL){
		if($EmployeeRecIDS){
				$this->db->set("employee_is_status", 2);
				$this->db->where_in("employee_id", $EmployeeRecIDS);
		return	$this->db->update("employee");	
		}return false;
	}
	public function trashEmployee($EmployeeRecIDS = NULL){
		if($EmployeeRecIDS){
				$this->db->where_in("employee_id", $EmployeeRecIDS);
		return  $this->db->delete("employee");		
		}return false;
	}
	public function getBranchEmployeeList($BranchID = NULL){
		if($BranchID){
				$this->db->select("employee_id, employee_photo, branch_fk_id,CONCAT(employee_first_name,' ',employee_middle_name,' ',employee_last_name) as full_name");
				$this->db->where("branch_fk_id", $BranchID);
				$this->db->order_by("employee_id", "ASC");
		return 	$this->db->get("employee")->result();
		}return false;
	}
	
}