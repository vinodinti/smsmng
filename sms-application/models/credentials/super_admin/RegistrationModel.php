<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RegistrationModel extends CI_Model{
	
	public function createRegistration($InsertUserData = NULL, $InsertSchoolData = NULL, $InsertAddressData = NULL){
		if($InsertUserData && $InsertSchoolData && $InsertAddressData){
			$this->db->trans_begin();
			$this->db->insert('admin', $InsertUserData);
			$UserID = $this->db->insert_id();
			$this->db->insert('school', $InsertSchoolData);
			$SchoolID = $this->db->insert_id();
			$InsertAddressData['branch_create_by']=$UserID;
			$InsertAddressData['school_fk_id']=$SchoolID;
			$this->db->insert('school_branch', $InsertAddressData);
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
	public function checkUserIDEmailID($UserID = NULL){
		if($UserID){
			$this->db->select('count(*) as user_status');
			$this->db->where($UserID);
			$Result = $this->db->get('admin')->row();
			if($Result->user_status){
				return true;
			}return false;
		}return FALSE;
	}
	

}



