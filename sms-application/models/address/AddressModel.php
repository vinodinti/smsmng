<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AddressModel extends CI_Model {
	
	public function getCountryList(){		
			   $this->db->select('country_id, country_name');
		return $this->db->get('countries')->result();
	}
	public function getStateList($CountryID=NULL){
		if($CountryID){
				$this->db->select('state_id, state_name');
				$this->db->where('country_id', $CountryID);
		return  $this->db->get('states')->result();
		}return false;
	}
	public function getCityList($StateID=NULL){
		if($StateID){
				$this->db->select('city_id, city_name');
				$this->db->where('state_id', $StateID);
		return  $this->db->get('cities')->result();
		}return false;
	}
	public function getCountryName($CountryID = NULL){
		if($CountryID){
				$this->db->select('country_id, country_name');
				$this->db->where('country_id', $CountryID);
		return  $this->db->get('countries')->row();
		}return false;
	}
	public function getStateName($StateID = NULL){
		if($StateID){
				$this->db->select('state_id, state_name');
				$this->db->where('state_id', $StateID);
		return  $this->db->get('states')->row();
		}return false;
	}
	public function getCityName($CityID = NULL){
		if($StateID){
				$this->db->select('city_id, city_name');
				$this->db->where('city_id', $CityID);
		return  $this->db->get('cities')->row();
		}return false;
	}
}