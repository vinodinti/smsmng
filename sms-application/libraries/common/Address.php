<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Address{
	
	public $ci;
    public function __construct() {
     $CI = & get_instance();
     $CI->load->model('address/AddressModel');
     $this->ci = $CI;
    }
	public function getCountryList(){
		return $this->ci->AddressModel->getCountryList();
	}
	public function getStateList($CountryID=NULL){
		if($CountryID){
			return $this->ci->AddressModel->getStateList($CountryID);
		}
		return false;
	}
	public function getCityList($StateID=NULL){
		if($StateID){
			return $this->ci->AddressModel->getCityList($StateID);	
		}
		return false;
	}
	public function getCountryName($CountryID = NULL){
		return $this->ci->AddressModel->getCountryName($CountryID );
	}
	public function getStateName($StateID = NULL){
		return $this->ci->AddressModel->getStateName($StateID);
	}
	
}