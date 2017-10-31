<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ExamTimeTableModel extends CI_Model {
	
	public function getExamTimeTableDetails($PerPage = 0, $Offset = 0){
		/*
		return $this->db->query("SELECT rl.section_count, exmtmt.*, exm.school_exam_name, batc.school_batch_value, brc.branch_name, brcls.class_name, sub.subject_name FROM scmngs_school_exam_time_table as exmtmt 
		INNER JOIN scmngs_school_exam as exm ON exm.school_exam_id = exmtmt.school_exam_fk_id 
		INNER JOIN scmngs_school_batch as batc ON batc.school_batch_id = exmtmt.school_batch_fk_id 
		INNER JOIN scmngs_school_branch as brc ON brc.branch_id = exmtmt.branch_fk_id 
		INNER JOIN scmngs_school_branch_class as brcls ON brcls.class_id = exmtmt.class_fk_id 
		INNER JOIN scmngs_school_subjects as sub ON sub.subject_id=exmtmt.subject_fk_id
		LEFT JOIN (SELECT count(exmtmtsec.school_exam_time_table_fk_id) as section_count, exmtmtsec.school_exam_time_table_fk_id  FROM scmngs_school_exam_time_table_section as exmtmtsec GROUP BY exmtmtsec.school_exam_time_table_fk_id) rl ON rl.school_exam_time_table_fk_id = exmtmt.school_exam_time_table_id")->result();
		*/
		if($PerPage)
			$this->db->limit($PerPage, $Offset);
		$this->db->select("rl.section_count, exmtmt.*, exm.school_exam_name, batc.school_batch_value, brc.branch_name, brcls.class_name, sub.subject_name, exmtmt.school_exam_time_table_status as record_status");
		$this->db->from("school_exam_time_table as exmtmt");
		$this->db->join("school_exam as exm", "exm.school_exam_id = exmtmt.school_exam_fk_id", "INNER");
		$this->db->join("school_batch as batc", "batc.school_batch_id = exmtmt.school_batch_fk_id", "INNER");
		$this->db->join("school_branch as brc", "brc.branch_id = exmtmt.branch_fk_id", "INNER");
		$this->db->join("school_branch_class as brcls" , "brcls.class_id = exmtmt.class_fk_id", "INNER");
		$this->db->join("scmngs_school_subjects as sub", "sub.subject_id=exmtmt.subject_fk_id", "INNER");
		$this->db->join('(SELECT count(exmtmtsec.school_exam_time_table_fk_id) as section_count, exmtmtsec.school_exam_time_table_fk_id  FROM scmngs_school_exam_time_table_section as exmtmtsec GROUP BY exmtmtsec.school_exam_time_table_fk_id) as rl', 'rl.school_exam_time_table_fk_id = exmtmt.school_exam_time_table_id', 'left');
		$this->db->where(array("exmtmt.school_exam_time_table_status"=>0,"exmtmt.school_exam_time_table_status"=>1));
		$this->db->order_by("exmtmt.school_exam_time_table_id", "DESC");
		return $this->db->get('')->result();
	}
	public function getExamTimeTableDetailsCount(){
				$this->db->select("count(school_exam_time_table_id) as rowcount");
			    $this->db->where(array("school_exam_time_table_status"=>0,"school_exam_time_table_status"=>1));
		return  $this->db->get('school_exam_time_table')->row()->rowcount;
	}
	public function createExamTimeTable($InsertExamTimeTableData = NULL, $TimeTableSection = NULL){
		if($InsertExamTimeTableData){
			$this->db->trans_begin();
			$this->db->insert('school_exam_time_table', $InsertExamTimeTableData);
			$SchoolExamTimeTableID = $this->db->insert_id();
			if($TimeTableSection){
			$TotalCount = count($TimeTableSection);
				for($i=0; $i < $TotalCount; $i++){
					$TimeTableSection[$i]['school_exam_time_table_fk_id'] = $SchoolExamTimeTableID;
				}
			}
			$this->db->insert_batch('school_exam_time_table_section', $TimeTableSection);
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
	public function getEventExamTimeTableInfo($GetExamTimeTableInfo = NULL){
		if($GetExamTimeTableInfo){
			//brclssec.section_name
		$this->db->select("exmtmt.*, exm.school_exam_name, batc.school_batch_value, brc.branch_name, brcls.class_name, sub.subject_name");
		$this->db->from("school_exam_time_table as exmtmt");
		$this->db->join("school_exam as exm", "exm.school_exam_id = exmtmt.school_exam_fk_id", "INNER");
		$this->db->join("school_batch as batc", "batc.school_batch_id = exmtmt.school_batch_fk_id", "INNER");
		$this->db->join("school_branch as brc", "brc.branch_id = exmtmt.branch_fk_id", "INNER");
		$this->db->join("school_branch_class as brcls" , "brcls.class_id = exmtmt.class_fk_id", "INNER");
		
		$this->db->join("school_exam_time_table_section as exmsectmt", "exmsectmt.school_exam_time_table_fk_id=exmtmt.school_exam_time_table_id",  "INNER");
		
		//$this->db->join("school_branch_class_section as brclssec" , "brclssec.section_id = exmtmt.section_fk_id", "LEFT");
		$this->db->join("scmngs_school_subjects as sub", "sub.subject_id=exmtmt.subject_fk_id", "INNER");
			$this->db->where($GetExamTimeTableInfo);
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
	public function getExamTimeTableSection($SchoolExamTimeTableID = NULL){
		if($SchoolExamTimeTableID){
			$this->db->select("clssec.section_id, clssec.section_name");
			$this->db->from("scmngs_school_exam_time_table_section as exmsec");
			$this->db->join("scmngs_school_branch_class_section as clssec", "clssec.section_id = exmsec.section_fk_id", "INNER");
			$this->db->where("exmsec.school_exam_time_table_fk_id", $SchoolExamTimeTableID);
			return $this->db->get()->result();
		}return false;
	}
	
}