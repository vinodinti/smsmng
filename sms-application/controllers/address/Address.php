<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Address extends CI_Controller{
	
	public function __construct(){
        parent::__construct();
		$this->load->model('address/AddressModel');
    }
	public function country(){
		echo 1;
	}
	public function state(){
		
	}
	public function city(){
		
	}
	
}



