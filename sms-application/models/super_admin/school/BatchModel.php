<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BatchModel extends CI_Model {
	public function getBatchDetails($PerPage = 0, $Offset = 0){
		if($PerPage)
			$this->db->limit($PerPage, $Offset);
		$this->db->select("*, school_batch_status as record_status");
		$this->db->where(array("school_batch_status"=>0,"school_batch_status"=>1));
		$this->db->order_by("school_batch_id", "DESC");
		return $this->db->get('school_batch')->result();
	}
	public function getBatchDetailsCount(){
			    $this->db->select("count(school_batch_id) as rowcount");
			    $this->db->where(array("school_batch_status"=>0,"school_batch_status"=>1));
		return  $this->db->get('school_batch')->row()->rowcount;
	}
	public function createBatch($InsertBatchData = NULL){
		if($InsertBatchData){
		return	$this->db->insert('scmngs_school_batch', $InsertBatchData);
		}return false;
	}
	public function modifyBatch($UpdateBatchData = NULL, $BatchID = NULL){
		if($BatchID){
			$this->db->where($BatchID);
			return $this->db->update('school_batch', $UpdateBatchData);
		}return false;
	}
	public function getBatchInfo($BatchID = NULL){
		if($BatchID){
					$this->db->where(array("school_batch_id"=>$BatchID));
			return $this->db->get("school_batch")->row();
		}return false;
	}
	public function checkBatchName($BatchName = NULL){
		if($BatchName){
			$this->db->select('count(school_batch_value) as batch_status');
			$this->db->where("school_batch_value", $BatchName);
			$Result = $this->db->get('school_batch')->row();
			if($Result->batch_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function getBatchDateDetails($BatchID = NULL){
		if($BatchID){
			$this->db->select("school_batch_start_on, school_batch_end_on");
			$this->db->where(array('school_batch_id' => $BatchID));
			return $this->db->get('school_batch')->row();
		}return false;		
	}
	public function getMonths(){
		$this->db->query("set @start_date = '2017-08-01';
		set @end_date = '2018-07-01';
		set @months = -1;
		select DATE_FORMAT(date_range,'%M, %Y') AS result_date from (
		select (date_add(@start_date, INTERVAL (@months := @months +1 ) month)) as date_range
		from mysql.help_topic a limit 0,1000 ) a where a.date_range between @start_date and last_day(@end_date);");
	}
	public function deleteBatch($BatchRecIDS = NULL){
		if($BatchRecIDS){
				$this->db->set("school_batch_status", 2);
				$this->db->where_in("school_batch_id", $BatchRecIDS);
		return	$this->db->update("school_batch");	
		}return false;
	}
	public function trashBatch($BatchRecIDS = NULL){
		if($BatchRecIDS){
				$this->db->where_in("school_batch_id", $BatchRecIDS);
		return  $this->db->delete("school_batch");		
		}return false;
	}
}