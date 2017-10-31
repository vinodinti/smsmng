<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DashboardModel extends CI_Model {
	
	public function getClassInformation($StudentID = NULL){
		if($StudentID){
				   $this->db->select("class_fk_id, student_fk_id, branch_fk_id, section_fk_id, school_batch_fk_id");
				   $this->db->where("student_fk_id", $StudentID);
				   $this->db->order_by("student_class_id", "DESC");
			return $this->db->get("student_class")->row();
		}return false;
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