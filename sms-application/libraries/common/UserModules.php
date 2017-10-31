<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModules{
	
	public $ci;
    public function __construct() {
     $CI = & get_instance();
     $CI->load->model('user_modules/UserModule');
     $this->ci = $CI;
    }
	public function getMemberModules($MemberID = NULL){
		if($MemberID){
			return $this->ci->UserModule->getUserModuleList($MemberID);
		}return false;
	}
	public function getSchoolID(){
			return $this->ci->UserModule->getSchoolID();
	}
	public function getRecordCreatedBy($CtreatedPersonID = NULL){
		if($CtreatedPersonID){
			return $this->ci->UserModule->getRecordCreatedBy($CtreatedPersonID);
		}return false;
	}
	
}