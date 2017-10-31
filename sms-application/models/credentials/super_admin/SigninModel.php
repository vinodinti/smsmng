<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SigninModel extends CI_Model{
	public function checkLogin($LoginData = NULL){
		if($LoginData){	
			$Result = $this->db->query("CALL check_login('".$LoginData['emailid']."', '".$LoginData['password']."')");
			if($Result->num_rows() > 0){
				return $Result->row();
			}return false;
		}return false;
	}
}