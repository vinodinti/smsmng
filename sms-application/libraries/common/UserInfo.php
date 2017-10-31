<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserInfo{
	public function __construct() {
     $CI = & get_instance();
     $this->ci = $CI;
    }
	private function getMemberLoggedIn(){
		if($this->ci->session->userdata('is_logged_in')){
			return TRUE;
		}return false;
	}	
	public function getMemberId(){
		if($this->getMemberLoggedIn()){
			return $this->ci->session->userdata('member_id');
		}return false;
	}
	public function getMemberName(){
		if($this->getMemberLoggedIn()){
			return $this->ci->session->userdata('member_full_name');
		}return false;
	}
	public function getMemberEmail(){
		if($this->getMemberLoggedIn()){
			return $this->ci->session->userdata('member_email');
		}return false;
	}
	public function getMemberPhoto(){
		if($this->getMemberLoggedIn()){
			return $this->ci->session->userdata('member_photo');
		}return false;
	}
	public function getMemberType(){
		if($this->getMemberLoggedIn()){
			return $this->ci->session->userdata('member_type');
		}return false;
	}
	public function getMemberTypeId(){
		if($this->getMemberLoggedIn()){
			return $this->ci->session->userdata('member_type_id');
		}return false;
	}
	
}
