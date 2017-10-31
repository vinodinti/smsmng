<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GradeModel extends CI_Model {
	
	public function getGradeDetails($PerPage = 0, $Offset = 0){
		if($PerPage)
			$this->db->limit($PerPage, $Offset);
		$this->db->select("*, grade_status as record_status");
		$this->db->where(array("grade_status"=>0, "grade_status"=>1));
		$this->db->order_by("grade_id", "DESC"); 
		return $this->db->get('grade')->result();
	}
	public function getGradeDetailsCount(){
		$this->db->select("count(grade_id) as rowcount");
		$this->db->where(array("grade_status"=>0,"grade_status"=>1));
		return  $this->db->get('grade')->row()->rowcount;
	}
	public function getGradeInfo($GradeID = NULL){
		if($GradeID){
			$this->db->where('grade_id', $GradeID);
			return $this->db->get('grade')->row();
		}return false;
	}
	public function createGrade($InsertGradeData = NULL){
		if($InsertGradeData){
			$Result = $this->db->insert('grade', $InsertGradeData);
			return $Result;
		}return FALSE;
	}
	public function modifyGrade($UpdateGradeData, $GradeID){
		if($GradeID){
			$this->db->where($GradeID);
			return $this->db->update('grade', $UpdateGradeData);
		}return false;
	}
	public function checkGradeName($GradeName = NULL){
		if($GradeName){
					  $this->db->select('count(*) as grade_status');
					  $this->db->where($GradeName);
			$Result = $this->db->get('grade')->row();
			if($Result->grade_status){
				return true;
			}return false;
		}return FALSE;
	}
	public function deleteGrade($GradeRecIDS = NULL){
		if($GradeRecIDS){
				$this->db->set("grade_status", 2);
				$this->db->where_in("grade_id", $GradeRecIDS);
		return	$this->db->update("grade");	
		}return false;
	}
	public function trashGrade($GradeRecIDS = NULL){
		if($GradeRecIDS){
				$this->db->where_in("grade_id", $GradeRecIDS);
		return  $this->db->delete("grade");		
		}return false;
	}
	
}