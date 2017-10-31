<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class FeesComponentModel extends CI_Model {
	
	public function getFeesComponentDetails(){
		
		$this->db->select("feescmp.*, scbatch.school_batch_value, brch.branch_name ,brcls.class_name");
		$this->db->from("fees_component as feescmp");
		$this->db->join("school_batch as scbatch", "scbatch.school_batch_id=feescmp.school_batch_fk_id", "INNER");
		$this->db->join("school_branch as brch", "brch.branch_id=feescmp.branch_fk_id", "INNER");
		$this->db->join("school_branch_class as brcls", "brcls.class_id = feescmp.class_fk_id", "INNER");
		return $this->db->get()->result();
	}
	public function createFeesComponent($InsertFeesComponentData = NULL, $feesmonth = NULL){
		if($InsertFeesComponentData){
			$this->db->trans_begin();
			$this->db->insert('fees_component', $InsertFeesComponentData);
			$feesComponentID = $this->db->insert_id();
			if(!empty($feesmonth)){
				$feesMonthYear = array();
				foreach($feesmonth as $MonthYear){
				$feesMonthYear[] = array("fees_component_fk_id" => $feesComponentID,
										"fees_month_name"	    => $MonthYear,
										"fees_month_status"	    => 1
									);
				}
			$this->db->insert_batch('fees_no_month', $feesMonthYear);
			}
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
	
}