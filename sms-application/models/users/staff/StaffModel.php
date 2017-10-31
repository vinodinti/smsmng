<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StaffModel extends CI_Model {
	
	public function getClassTimeTableDetails(){

		$this->db->select("titable.*, brc.branch_name, brcls.class_name, brclssec.section_name, CONCAT(emp.employee_first_name,' ', emp.employee_middle_name,' ',emp.employee_last_name) as employee_full_name, sub.subject_name");
		$this->db->from("school_branch_class_time_table as titable");
		$this->db->join("school_branch as brc", "brc.branch_id = titable.branch_fk_id", "INNER");
		$this->db->join("school_branch_class as brcls" , "brcls.class_id = titable.class_fk_id", "INNER");
		$this->db->join("school_branch_class_section as brclssec" , "brclssec.section_id = titable.section_fk_id", "INNER");
		$this->db->join("employee_assign_subject_time_table as empsub" , "empsub.class_time_table_fk_id = titable.class_time_table_id", "LEFT");
		$this->db->join("scmngs_employee as emp", "emp.employee_id=empsub.employee_fk_id", "LEFT");
		$this->db->join("scmngs_school_subjects as sub", "sub.subject_id=empsub.employee_subject_fk_id", "LEFT");
		return $this->db->get('')->result();
		
	}
	public function createClassTimeTable($InsertClassTimeTableData = NULL){
		if($InsertClassTimeTableData){
			return $this->db->insert('school_branch_class_time_table', $InsertClassTimeTableData);
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
	public function create_employee_subjects_time_table($InsertAssignSubjectTimeTable = NULL){
		if($InsertAssignSubjectTimeTable){
			return $this->db->insert('employee_assign_subject_time_table', $InsertAssignSubjectTimeTable);
		}return FALSE;
	}
	public function getEventTimeTableInfo($GetTimeTableInfo = NULL){
		if($GetTimeTableInfo){
			$this->db->select("titable.*, CONCAT(emp.employee_first_name,' ', emp.employee_middle_name,' ',emp.employee_last_name) as employee_full_name, sub.subject_name");
			$this->db->from("school_branch_class_time_table as titable");
			//brc.branch_name, brcls.class_name, brclssec.section_name,
			//$this->db->join("school_branch as brc", "brc.branch_id = titable.branch_fk_id", "INNER");
			//$this->db->join("school_branch_class as brcls" , "brcls.class_id = titable.class_fk_id", "INNER");
			//$this->db->join("school_branch_class_section as brclssec" , "brclssec.section_id = titable.section_fk_id", "INNER");
			$this->db->join("employee_assign_subject_time_table as empsub" , "empsub.class_time_table_fk_id = titable.class_time_table_id", "LEFT");
			$this->db->join("scmngs_employee as emp", "emp.employee_id=empsub.employee_fk_id", "LEFT");
			$this->db->join("scmngs_school_subjects as sub", "sub.subject_id=empsub.employee_subject_fk_id", "LEFT");
			$this->db->order_by("titable.period_fk_id", "asc");
			$this->db->where($GetTimeTableInfo);
			return $this->db->get('')->result();
		}return false;
	}
	public function getWeeks(){
		return $this->db->get("school_week")->result();
	}
	public function getWeekName($WeekID = NULL){
		if($WeekID){
					$this->db->where("week_id", $WeekID);
			return $this->db->get("school_week")->row();
		}return false;
	}
	public function getPeriods(){
		return $this->db->get("school_period")->result();
	}
	public function getPeriodName($PeriodID = NULL){
		if($PeriodID){
					$this->db->where("period_id", $WeekID);
			return $this->db->get("school_period")->row();
		}return false;
	}
	
}